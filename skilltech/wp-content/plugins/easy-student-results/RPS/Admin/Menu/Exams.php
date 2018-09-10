<?php
if ( !defined( 'WPINC' ) ) {
	die();
}

class RPS_Admin_Menu_Exams extends RPS_Admin_Menu_MenuAbstract {

	public static function getInstance( $page ) {
		if( self::$instance == null ) {
			self::$instance = new self;
			//self::$instance->pagehook = $slug;
			self::$instance->page = $page;
		}

		return self::$instance;
	}

	/**
	 * This function will hold all html related functions
	 */
	public function mainDiv() {
		if( isset($_REQUEST['page']) && $_REQUEST['page'] === $this->page ) {
			ob_start();
			if(isset($_REQUEST['add_new']) ){
				$this->addNew();
			}
			elseif (isset ($_REQUEST['edit'])) {
				$this->edit();
			}
			elseif (isset($_REQUEST['delete'])){
				$this->delete();
			}
			else {
				$this->showExamList();

			}
			$content = ob_get_clean();
			global $wpdb;
			//$wpdb->show_errors();
			//$wpdb->print_error();
			echo $this->getHeader();
			echo $content;
			echo $this->getFooter();
		}
	}

	private function delete_cache() {
		$transient = "rps_exam_list_data";
		delete_transient($transient);
	}

	private function addNew() {
		if ( ! empty( $_POST ) && check_admin_referer( 'create_exams_nonce', 'create_exams' ) ) {
			global $wpdb;
			$data['name']       = ( isset( $_POST['name'] ) )       ? (string) stripslashes( $_POST['name'] ) : '';
			$data['exam_month'] = ( isset( $_POST['exam_month'] ) ) ? (string) stripslashes( $_POST['exam_month'] ) : '01';
			$data['exam_year']  = ( isset( $_POST['exam_year'] ) )  ? (int) $_POST['exam_year'] : date('Y');
			$data['display']     = ( isset( $_POST['display'] ) )     ? (int) $_POST['display']  : 1;
			$data['active']     = ( isset( $_POST['active'] ) )     ? (int) $_POST['active']  : 1;


			//check for empty name
			if( $data['name'] === "" ) {
				$this->error['name'] = __("Please Enter Exam Name.", $this->TD);
			} else {
				//check name, exam_month, year already exists or not

				$sql = $wpdb->prepare("SELECT * FROM {$wpdb->rps_exam} WHERE `name`=%s AND exam_month=%s AND exam_year=%s",
					array($data['name'], $data['exam_month'], $data['exam_year']));
				$row = $wpdb->get_row($sql,ARRAY_A);
				if( $row !== NULL ) {
					$this->messages[] = __("Exam name already exist... Please enter another exam name or exam month or exam year.", $this->TD);
				}
			}

			if ( empty( $this->messages ) && empty( $this->error ) ) {
				$data['added'] = time();
				$format = array('%s', '%s', '%d', '%d', '%d', '%d');
				if ( $wpdb->insert( $wpdb->rps_exam, $data, $format ) ) {
					$this->delete_cache();
					$this->messages[] = __("Exam Inserted Successfully.", $this->TD);
					$this->showExamList();
				}
				else {
					$wpdb->show_errors();
					$wpdb->print_error();
					$this->formTable($data);
				}
			}
			else {
				$this->formTable($data);
			}
		}
		else {
			$this->formTable();
		}
	}

	private function edit() {
		global $wpdb;
		$id = isset($_GET['edit']) ? (int) stripslashes($_GET['edit']) : '';

		if ( ! empty( $_POST ) && check_admin_referer( 'edit_exams_nonce', 'edit_exams' ) ) {
			$data['name']       = ( isset( $_POST['name'] ) )       ? (string) stripslashes( $_POST['name'] ) : '';
			$data['exam_month']   = ( isset( $_POST['exam_month'] ) )   ? (string) stripslashes( $_POST['exam_month'] ) : '01';
			$data['exam_year']   = ( isset( $_POST['exam_year'] ) )   ? (int) $_POST['exam_year'] : date('Y');
			$data['display'] = ( isset( $_POST['display'] ) )   ? (int) $_POST['display']  : 1;
			$data['active'] = ( isset( $_POST['active'] ) )   ? (int) $_POST['active']  : 1;

			//check for empty name
			if( $data['name'] === "" ) {
				$this->error['name'] = __("Please Enter Exam Name.", $this->TD);
			} else {
				//check name, exam_month, year already exists or not

				$sql = $wpdb->prepare("SELECT * FROM {$wpdb->rps_exam} WHERE `name`=%s AND exam_month=%s AND exam_year=%s AND id != %d",
					array($data['name'], $data['exam_month'], $data['exam_year'], $id));
				$row = $wpdb->get_row($sql,ARRAY_A);
				if( $row !== NULL ) {
					$this->messages[] = __("Exam name already exist... Please enter another exam name or exam month or exam year.", $this->TD);
				}
			}

			if ( empty($this->messages) && empty($this->error) ) {
				$format = array( '%s', '%s', '%d', '%d', '%d' );
				$where = array( 'id' => $id );
				$format_where = array( '%d' );

				if ( $wpdb->update( $wpdb->rps_exam, $data, $where, $format, $format_where ) ) {
					$this->delete_cache();
					$this->messages[] = __("Exam Updated Successfully.", $this->TD);
					$this->showExamList();
				}
				else {
					$this->messages[] = __("Nothing is updated", $this->TD);
					$this->showExamList();
				}
			} else {
				$this->formTable($data);
			}

		} else {
			$sql = "SELECT * FROM {$wpdb->rps_exam} WHERE id=$id";
			$data = $wpdb->get_row($sql,ARRAY_A);
			$this->formTable($data);
		}
	}

	private function delete() {
        $exam_id = isset($_GET['delete']) ? intval( $_GET['delete'] ) : 0;
        global $wpdb;

        $option = get_option( RPS_Result_Management::PLUGIN_SLUG . '_basics', array() );
        if ( isset($option['user_role']) && $option['user_role'] != ''
            && in_array($option['user_role'], array('manage_options','edit_pages','publish_posts','edit_posts','read')) ) {
            $role = $option['user_role'];
        } else {
            $role = 'manage_options';
        }

		if ( current_user_can($role) && isset($_GET['delete_exam']) && wp_verify_nonce($_GET['delete_exam'], 'delete_exam_' . $exam_id)) {
			//get all exam record id associated with this exam_id
			$query = $wpdb->prepare("SELECT id FROM `{$wpdb->rps_exam_record}` WHERE exam_id=%d", array($exam_id));
			$exam_record_ids = $wpdb->get_col($query, 0);

			if ( is_array($exam_record_ids) && !empty($exam_record_ids) ) {
			    $exam_record_ids_string = implode(', ', $exam_record_ids);
			    //first delete all metadata for this exam id
                $query = "DELETE FROM `{$wpdb->rps_exam_record_meta}` WHERE `exam_record_id` in ($exam_record_ids_string)";
                $wpdb->query($query);

                //then delete all the marks table data
                $query = "DELETE FROM `{$wpdb->rps_marks}` WHERE `exam_record_id` in ($exam_record_ids_string)";
                $wpdb->query($query);

                //then delete exam_record table data
                $query = "DELETE FROM `{$wpdb->rps_exam_record}` WHERE id in ($exam_record_ids_string) LIMIT 1";
                $wpdb->query($query);
			}

			//now delete exam entry
            $query = $wpdb->prepare("DELETE FROM `{$wpdb->rps_exam}` WHERE id = %d LIMIT 1", array($exam_id));
			$wpdb->query($query);

			//delete transient cache
		    define(RPS_Result_Management::PLUGIN_SLUG . '_delete_transient', true);
		    RPS_Helper_Function::delete_transient();

			$url = esc_url_raw( add_query_arg( array( 'page' => $this->page, 'deleted' => $exam_id ),  admin_url('admin.php?')) );

			RPS_Helper_Function::javascript_redirect($url);

		}
	}

	private function formTable($data = array() ) {
		if ( isset($_REQUEST['edit']) && $_REQUEST['edit'] != "" ) {
			$nonce = wp_nonce_field( 'edit_exams_nonce' , 'edit_exams', true, false );
			$readonly = "readonly='readonly'";
			$disabled = "disabled='disabled'";
		}
		else {
			$nonce = wp_nonce_field( 'create_exams_nonce' , 'create_exams', true, false );
			$readonly = "";
			$disabled = "";
		}
		if ( empty( $data ) ) {
			$data['name'] = '';
			$data['exam_month'] = '';
			$data['exam_year'] = '';
			$data['display'] = '1';
			$data['active'] = '1';
		}
		?>
		<form method="post" action="">
			<?php echo $nonce; ?>

			<table class="form-table">
				<tbody>

				<tr class="form-field form-required">
					<th scope="row" valign="top">
						<label for="name"><?php _e('Exam Name', $this->TD); ?></label>
					</th>
					<td>
						<input name="name" id="name" type="text" size="40" aria-required="true" value="<?php echo $data['name'];   ?>" />
						<p><?php _e('This name will be displayed on frontend search form and other places. Exam name should be unique. eg Exam 2015', $this->TD); ?></p>
						<?php if(isset($this->error['name'])) echo '<p style="color:red;"><strong>' . $this->error['name'] . '</strong></p>';  ?>
					</td>
				</tr>

				<tr class="form-field form-required">
					<th scope="row" valign="top">
						<label for="exam_month"><?php _e('Exam Month', $this->TD) ?></label>
					</th>
					<td>
						<select name="exam_month" id="exam_month" class="postform">
							<?php
							$months = array(
								'01' => 'January',
								'02' => 'February',
								'03' => 'March',
								'04' => 'April',
								'05' => 'May',
								'06' => 'June',
								'07' => 'July',
								'08' => 'August',
								'09' => 'September',
								'10' => 'October',
								'11' => 'November',
								'12' => 'December'
							);

							foreach ($months as $key => $month ) {
								$selected = $data['exam_month'] == $key ? 'selected="selected"': '';
								printf('<option value="%s" %s>%s</option>', $key, $selected, __($month, $this->TD));
							}
							?>
						</select>
						<p><?php _e('Select Exam Month', $this->TD); ?></p>
						<?php if(isset($this->error['exam_month'])) echo '<p style="color:red;"><strong>' . $this->error['exam_month'] . '</strong></p>';  ?>
					</td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row" valign="top">
						<label for="exam_year"><?php _e('Select Exam Year', $this->TD); ?></label>
					</th>
					<td>
						<select name="exam_year" id="exam_year">
							<?php
							$current = date('Y');
							$past = $current - 10;
							if($data['exam_year'] == '') {
								$year_selected = $current;
							} else {
								$year_selected = $data['exam_year'];
							}
							for (; $past<=$current+10; $past++) {
								echo "<option value='{$past}' ".selected($year_selected, $past, false).">{$past}</option>";
							}
							?>
						</select>
						<p><?php _e('Exam Year', $this->TD); ?></p>
						<?php if(isset($this->error['exam_year'])) echo '<p style="color:red;"><strong>' . $this->error['exam_year'] . '</strong></p>';  ?>
					</td>
				</tr>

				<tr class="form-field form-required">
					<th scope="row" valign="top">
						<label for="display"><?php _e('Display on frontend Search Box', $this->TD); ?></label>
					</th>
					<td>
						<select name="display" id="display" class="postform">
							<option value='1' <?php selected($data['display'], "1"); ?>><?php _e('Show', $this->TD); ?></option>
							<option value='2' <?php selected($data['display'], "2");  ?>><?php _e('Hide', $this->TD); ?></option>
						</select>
						<p><?php _e('Show/Hide exam on frontend search box.', $this->TD); ?></p>
						<?php if(isset($this->error['enable'])) echo '<p style="color:red;"><strong>' . $this->error['enable'] . '</strong></p>';  ?>
					</td>
				</tr>
				<tr class="form-field">
					<th scope="row" valign="top">
						<label for="active"><?php _e('Active', $this->TD); ?></label>
					</th>
					<td>
						<select name="active" id="active" class="postform">
							<option value='1' <?php selected($data['active'], "1"); ?>><?php _e('Active', $this->TD); ?></option>
							<option value='2' <?php selected($data['active'], "2");  ?>><?php _e('Inactive', $this->TD) ?></option>
						</select>
						<p><?php _e('If status is <strong>Active</strong>, you can add result for this exam.', $this->TD);  ?></p>
						<?php if(isset($this->error['active'])) echo '<p style="color:red;"><strong>' . $this->error['active'] . '</strong></p>';  ?>
					</td>
				</tr>
				</tbody>
			</table>

			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php if(isset($_REQUEST['edit'])) { echo __("Update Exam", $this->TD); } else { echo  __("Add New Exam", $this->TD); } ?>"/>
				<?php echo '<a href="' . esc_url_raw( add_query_arg(array('page' => $this->page),  admin_url('admin.php?')) ) .'" class="button button-secondary">' . __('Back', $this->TD) . '</a>';  ?>
			</p>

		</form>
		<?php
	}

	private function showExamList(){
		$table = new RPS_Admin_Menu_ExamTable();
		//Fetch, prepare, sort, and filter our data...
		$table->prepare_items();
		?>
		<form id="movies-filter" method="get">
			<!-- For plugins, we also need to ensure that the form posts back to our current page -->
			<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			<!-- Now we can render the completed list table -->
			<?php $table->display() ?>
		</form>
		<?php
	}

	private function getHeader() {
		if(isset($_REQUEST['add_new']) && $_REQUEST['add_new'] != ""){
			$title = __("Add New Exam", $this->TD);

		}
		elseif(isset ($_REQUEST['edit']) && $_REQUEST['edit'] != ""){
			$title = __("Edit Exam", $this->TD);
		}
		//else {
		$link = '<a href="' . esc_url_raw( add_query_arg( array('add_new' => '1', 'page' => $this->page ),  admin_url('admin.php?') ) ) .'" class="add-new-h2">' . __('Add New', $this->TD) . '</a>';
		$title = __("Exam Lists ", $this->TD) . $link ;

		// }
		?>
		<div class="wrap">
		<div id="icon-edit" class="icon32 icon32-posts-post">&nbsp;</div>
		<h2><?php echo $title; ?></h2>
		<br class="clear">
		<?php
		$str = '';
		if(!empty($this->messages)){
			$str .= "<div id='message' class='updated fade'><p>";
			foreach ($this->messages as $key => $msg):
				$str .= "$msg <br>";
			endforeach;
			$str .= "</p></div>";
		}
		?>
		<?php echo $str; ?>
		<?php
		if(isset($_REQUEST['updated'])){
			echo "<div id='message' class='updated fade'><p>" . __('Updated', $this->TD) . "</p></div>";
		}
		if( isset($_REQUEST['deleted']) ) {
			echo '<div id="message" class="updated notice notice-success is-dismissible below-h2">';
			echo __('<p>Exam Deleted Successfully.</p>', $this->TD);
			echo '<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
		}
		?>

		<?php
	}

	private function getFooter(){
		echo "</div>";
		?>
		<script type="application/javascript">
        	jQuery(function($){
        		var exam_id = 0;

				$('.delete_exam').click(function() {
					var th = $(this);
					exam_id = th.data('exam_id');
					var str = 'Are you sure you want to delete <strong>' + th.data('exam_name') +'</strong> ? All result data associated with this exam will be deleted too and all data will be permanently lost.'
					$('#deleteResultModalBody').html(str);
					$('#deleteResultModal').modal('show');

					return false;
				});
				$('#deleteResultModal').on('click', '#confirmDeleteResult', function() {
					var url = $('a.exam_id_'+ exam_id).first().attr('href');
					exam_id = null;
					window.location = url;
					//console.log(url);
				});
        	});
		</script>
		<div class="rps_result">
			<div class="modal fade" tabindex="-1" role="dialog" id="deleteResultModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Exam</h4>
				  </div>
				  <div class="modal-body">
					<p id="deleteResultModalBody"></p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="confirmDeleteResult">Delete</button>
				  </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
		<?php
	}

	/**
     * This function will load all required css, js and other function on wp hook
     */
    public function onLoadPage() {
        //die('called');
        wp_register_style( 'rps_bootstrap',     RPS_Result_Management::URL() . '/assets/bootstrap-3.3.5/css/bootstrap.css', array(), '3.3.5' );
        wp_register_script( 'rps_bootstrap',    RPS_Result_Management::URL() . '/assets/bootstrap-3.3.5/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', true);
        $this->loadCss();
        $this->loadJs();
    }

    private function loadCss() {
        wp_enqueue_style( 'rps_bootstrap' );
        add_action('admin_footer', array( $this, 'wpFooter' ));
    }

    private function loadJs() {
        wp_enqueue_script('rps_bootstrap');
    }

    public function wpFooter() {

        ?>
        <style type="text/css" rel="stylesheet">
            .wp-list-table th#sl {
                width: 50px;
            }
            a.action_button {
            	margin-bottom: 5px !important;
            }
            @media (min-width: 768px) {
            	.modal-dialog {
            		margin: 5% auto !important;
            	}
            }

            .modal-dialog {
            	margin: 5% auto !important;
            }

        </style>
        <?php
    }
}


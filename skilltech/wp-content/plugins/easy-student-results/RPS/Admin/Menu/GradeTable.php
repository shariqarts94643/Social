<?php
if ( !defined( 'WPINC' ) ) {
    die();
}

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class RPS_Admin_Menu_GradeTable extends \WP_List_Table {
    private $TD, $sl, $page;

    function __construct() {
        global $status, $page;
        //$this->helper = new RPS_Helper_Function();
        //$this->dbs = new RPS_Helper_DBS();
        $this->page = RPS_Admin_Menu_Main::getPage('grade');
        $this->TD =  RPS_Result_Management::TD;
        $this->sl = 1;
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'exam',     //singular name of the listed records
            'plural'    => 'exams',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );
        
        
    }
    
    function get_columns() {
        $columns = array(
            'grade_id'      =>  __('Grade ID', $this->TD), //Render a checkbox instead of text
            'grade'         => __('Alphabetic Grade', $this->TD),
            'marks'         => __('Marks', $this->TD),
            'grade_point'   => __('Grade Point', $this->TD),
            'grade_classification'  => __('Grade Classification', $this->TD),
            'active'        => __('Active', $this->TD),
            'updated'       => __('Updated', $this->TD),
        );
        return $columns;
    }
    
    function column_grade_id($item) {
        //echo $item['id'];
        //echo $column_name;
        return sprintf( '<strong>%d</strong>', $item->id );
    }
    
    function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case 'grade':
                $edit_link = esc_url_raw( add_query_arg(array( 'page' => $this->page, 'edit' => $item->id ), 'admin.php?') );
                $item_name = "<a href='$edit_link'>{$item->grade}</a>";
                $actions = array (
                    'edit'      => sprintf(__('<a href="?page=%s&edit=%s" class="edit">Edit</a>', $this->TD),$_REQUEST['page'],$item->id),
                    'delete'      => sprintf(__('<a href="?page=%s&delete=%s" class="delete">Delete</a>', $this->TD),$_REQUEST['page'],$item->id),
                );
                return sprintf('%1$s %2$s',
                    /*$1%s*/ $item_name,
                    /*$2%s*/ $this->row_actions($actions)
                );
            case 'updated':
            case 'marks':
            case 'grade_point':
            case 'grade_classification':
                return sprintf('%s',$item->$column_name);
            
            case 'active':
                if($item->$column_name === '1')
                    $str = "Active";
                elseif($item->$column_name === '2') 
                    $str = "Inactive";
                return sprintf('%s',$str);
                
        }
    }
    
    
    function get_sortable_columns() {
        $sortable_columns = array(
            //'grade'     => array('grade',false),     //true means it's already sorted
        );
        return $sortable_columns;
    }
    
    function get_bulk_actions() {
        $actions = array(
            //'delete'    => 'Delete'
        );
        return $actions;
    }
    
    function process_bulk_action() {
        
        //Detect when a bulk action is being triggered...
        if( 'delete' === $this->current_action() ) {
            echo('Items deleted (or they would be if we had items to delete)!');
        }
        
    }
    
    function extra_tablenav( $which ) {
        if ( $which == "top" ) {

        }
        if ( $which == "bottom" ) {
            //The code that goes after the table is there
            //echo"Hi, I'm after the table";
        }
    }
    
    function prepare_items() {
	    global $wpdb;
        $this->process_bulk_action();

	    //count total value
        //$totalitems = $wpdb->get_var('SELECT count(*) as cnt FROM `' . $wpdb->batch .'`');
        
        
        /* -- Preparing your query -- */
        $query = "SELECT * FROM $wpdb->rps_grade ";

        /* -- Order By Parameter -- */


        
        
        /* -- Pagination parameters -- */
        $totalitems = $wpdb->query($query); //return the total number of affected rows
        $perpage = 20;
        $paged = !empty($_GET["paged"]) ? stripslashes($_GET["paged"]) : '';
        if(empty($paged) || !RPS_Helper_Function::is_numeric($paged) || $paged<=0 ){ $paged=1; }
        $totalpages = ceil($totalitems/$perpage);
        if(!empty($paged) && !empty($perpage)){
                $offset=($paged-1)*$perpage;
            $query.=' LIMIT '.(int)$offset.','.(int)$perpage;
        }
        
        /* -- Register the Columns -- */
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        
	/* -- Register the pagination -- */
        $this->set_pagination_args( array(
                "total_items" => $totalitems,
                "total_pages" => $totalpages,
                "per_page" => $perpage,
        ) );
        //echo $query;
	/* -- Fetch the items -- */
        $this->items = $wpdb->get_results($query);
    }
}


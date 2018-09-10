<div id="footer-wrapper" class="widgetized-style-1 footer-dark footer-box footer-custom-bkg-color footer-color-bkg-dark-grey">
    <footer id="footer">
        <div class="container">
            <div class="row">
               <ul class="footer-widget-container col-md-3 col-sm-12">
                   <?php dynamic_sidebar( 'footer_1' ); ?>
               </ul>
                
                <ul class="footer-widget-container col-md-3 col-sm-12">
                    <?php dynamic_sidebar( 'footer_2' ); ?>
                </ul>
                <ul class="footer-widget-container col-md-3 col-sm-12">
                    <?php dynamic_sidebar( 'footer_3' ); ?>
                </ul>
                <ul class="footer-widget-container col-md-3 col-sm-12">
                    <?php dynamic_sidebar( 'footer_4' ); ?>
                </ul>
            </div>
            <div class="row mb-0">
                <div id="copyright-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p>Brandwill Agency - <?php echo date("Y"); ?></p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="" class="to-top">To top <i class="fa fa-chevron-up"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


</div>
<!-- #content-wrapper -->




<?php wp_footer(); ?>

<script>
	
	
	
	$('#toggleMenu').click(function() {
		$('.header-wrapper').toggleClass('active');
		$('#toggleMenu').toggleClass('active');

		var txt = $(".header-wrapper").is('.active') ? 'Go Back' : 'Show Sidebar';
		$(this).text(txt);
	});

	// LEFT MENU - MULTI LEVEL MENU
	var menuEl = document.getElementById('ml-menu'),
		mlmenu = new MLMenu(menuEl, {
			backCtrl: true
		});
</script>



</body>

</html>
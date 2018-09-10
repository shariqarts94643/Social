<!-- Footer -->
<footer id="footer" class="footer divider layer-overlay overlay-dark-8">
    <div class="container pt-70 pb-40">
        <div class="row">
           
            <div class="col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </div>
            
            <div class="col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer_2' ); ?>
            </div>
            
            <div class="col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer_3' ); ?>
            </div>
            
            <div class="col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer_4' ); ?>
            </div>
            
        </div>
    </div>
    <div class="footer-bottom" data-bg-color="#2b2d3b">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-md-12">
                    <p class="font-12 text-black-777 m-0 sm-text-center"></p>Copyright ©<?php echo date("Y"); ?>2017 Skill-Tech. All Rights Reserved</div>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>

</div>
<!-- end wrapper -->
<?php wp_footer(); ?>

<script>
function myMenu() {
    var x = document.getElementById("menu-main-menu");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
    </script>

</body>
    
</html>



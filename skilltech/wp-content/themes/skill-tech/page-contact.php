<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

    <!-- Start main-content -->
    <div class="main-content">
        
        <?php

        if (have_posts()) :
           while (have_posts()) :
              the_post(); ?>
                
                <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?php the_post_thumbnail_url(); ?>">
                    <div class="container pt-120 pb-60">
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="text-theme-colored2 font-36"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
        <?php   endwhile;
        endif;

        ?>

        

        <!-- Section: Have Any Question -->
        <section class="divider">
            <div class="container pt-60 pb-60">
                <div class="section-title mb-60">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="esc-heading small-border text-center">
                                <h3>Have any Questions?</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="contact-info text-center">
                                <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
                                <h4>Call Us</h4>
                                <h6 class="text-gray">Phone: <?php the_field('call_us'); ?></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="contact-info text-center">
                                <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
                                <h4>Head Office</h4>
                                <h6 class="text-gray"><?php the_field('address'); ?></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="contact-info text-center">
                                <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                                <h4>Email</h4>
                                <h6 class="text-gray"><?php the_field('email'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Contact -->
        <section class="divider bg-lighter">
            <div class="container">
                <div class="row pt-30">
                    <div class="col-md-7">
                        <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>

                        <!-- Contact Form -->
                        <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
                            <?php the_field('contact_form'); ?>
                        </form>

                    </div>
                    
                    <div class="col-md-5">
                       <form name="change" action="">
                           <select class="form-control" name="options" onchange="document.getElementById('google_map').src = this.options[this.selectedIndex].value" style="font-size: 18px">
                              <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d855.5180880104438!2d75.8708970944378!3d30.94054373875845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a849e7e6b8e7f%3A0xfe86abeec1ed144a!2sSkillTech+Computer+and+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533198467413">View Our Branches</option>
                               <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d855.5180880104438!2d75.8708970944378!3d30.94054373875845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a849e7e6b8e7f%3A0xfe86abeec1ed144a!2sSkillTech+Computer+and+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533198467413">New Kailash nagar</option>
                               <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5315.781571032613!2d75.8848207068627!3d30.9132479531114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x69d6d2ee75bd3d54!2sSkillTech+Computer+%26+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533198993039">Adarsh Nagar</option>
                               <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1905.856540225221!2d75.8702217807817!3d30.902897899820765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a9b4000000001%3A0xb0641627f480692d!2sSkillTech+Computer+and+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533199331318">Janakpuri</option>
                               <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2346.1702448936003!2d75.85441004807494!3d30.911625943216414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a830ae799a3b9%3A0x4f4749043338f4be!2sSkill-Tech+Computer+%26+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533199719511">Islam Ganj</option>
                               <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113640.1291584673!2d86.74249607429661!3d25.923115778471384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcd72cb2100aaed76!2sSkill+-+Tech+Computer+%26+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533199456575">Bihar</option>
                           </select>
                       </form>
                        <!-- Google Map HTML Codes -->                        
                        <iframe id="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d855.5180880104438!2d75.8708970944378!3d30.94054373875845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a849e7e6b8e7f%3A0xfe86abeec1ed144a!2sSkillTech+Computer+and+Coaching+Institute!5e0!3m2!1sen!2ssa!4v1533198467413" width="100%" height="500" frameborder="5" style="border:5" allowfullscreen></iframe>
                        
                        <!-- Google Map Javascript Codes -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php get_footer(); ?>
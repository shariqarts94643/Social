<?php get_header(); ?>

<div class="contact-page-full-screen fullscreen-section page-content custom-background color-background dark bkg-black-3 container-no-padding column-no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xs-12 contact-map-container">
                <div id="map"></div>
            </div>
            <div class="col-md-6 col-xs-12 contact-container">
                <div class="contact-container-inner">
                    <div class="row mb-60">
                        <div class="col-md-12 h-serif-font triggerAnimation animated" data-animate="fadeInUp">
                            <h1>Contact us</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-info-container">
                                <span class="icon-container">
                                    <img class="svg-turquoise" src="<?php echo get_template_directory_uri() . '/img/svg/map-icon.svg'; ?>" alt="">
                                </span>
                                <ul class="contact-info-list">
                                  	<?php the_field('address'); ?>
                                </ul>
                            </div>
                            <div class="contact-info-container">
                                <span class="icon-container">
                                    <img src="<?php echo get_template_directory_uri() . '/img/svg/phone-icon.svg'; ?>" class="svg-turquoise" alt=""/>
                                </span>
                                <ul class="contact-info-list">
                                  	<?php the_field('phone'); ?>
                                </ul>
                            </div>
                            <div class="contact-info-container">
                                <span class="icon-container">
                                    <img src="<?php echo get_template_directory_uri() . '/img/svg/email-icon.svg'; ?>" class="svg-turquoise" alt=""/>
                                </span>
                                <ul class="contact-info-list">
                                  	<?php the_field('emails'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-form">
                                <?php 
                                if ( have_posts() ) {
                                    while ( have_posts() ) {
                                        the_post(); 
                                        the_content();
                                        } // end while
                                } // end if
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
<script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';

                //CONTACT FORM AJAX
                VolcannoInclude.contactFormAjax('contact-us');

                // GOOGLE MAPS START
                window.marker = null;

                function initialize() {
                    var map;

                    var Jeddah = new google.maps.LatLng(<?php the_field('latitude'); ?>, <?php the_field('longitude'); ?>);
                    

                    var style = [
                        {
                            "featureType": "all",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        }
                    ];

                    var mapOptions = {
                        // SET THE CENTER
                        center: Jeddah,
                        // SET THE MAP STYLE & ZOOM LEVEL
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        zoom: 17,
                        // SET THE BACKGROUND COLOUR
                        backgroundColor: "#eeeeee",
                        // REMOVE ALL THE CONTROLS EXCEPT ZOOM
                        panControl: true,
                        zoomControl: true,
                        mapTypeControl: true,
                        scaleControl: true,
                        streetViewControl: true,
                        overviewMapControl: true,
                        scrollwheel: false,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL
                        }

                    };
                    map = new google.maps.Map(document.getElementById('map'), mapOptions);

                    // SET THE MAP TYPE
                    var mapType = new google.maps.StyledMapType(style, {name: "Grayscale"});
                    map.mapTypes.set('grey', mapType);
                    map.setMapTypeId('grey');
                    var marker = new google.maps.Marker({
                        position:Jeddah,
                        icon:'<?php get_stylesheet_directory_uri() . '/img/pin-blue@2x.png'; ?>',
                        animation:google.maps.Animation.BOUNCE});
  marker.setMap(map);
                }

                google.maps.event.addDomListener(window, 'load', initialize);
                
                // LEFT MENU - MULTI LEVEL MENU
                var menuEl = document.getElementById('ml-menu'),
              	mlmenu = new MLMenu(menuEl, {
			backCtrl : true 
		});

            });
            /* ]]> */
        </script>
<?php
$bdwebteam_options               = Helper::bdwebteam_get_options();
$bdwebteam_offcanvas_menu_args   = Helper::bdwebteam_offcanvas_menu_args();
$phoneNumber                = preg_replace("/[^0-9+]/", '', $bdwebteam_options['phone']);
$faxNumber                  = preg_replace("/[^0-9+]/", '', $bdwebteam_options['fax']);
$header_layout              = Helper::bdwebteam_header_layout();
$sidenav_class              = ($header_layout['header_style'] == '2') ? 'side-nav__left' : '';
$unique_id                  = esc_attr( vitax_unique_id( 'search-' ) );
$bdwebteam_search_offcanvas      = ( $bdwebteam_options['bdwebteam_search_placeholders'] ) ? $bdwebteam_options['bdwebteam_search_placeholders'] : 'Search ...';
 
$bdwebteam_active_onepage = bdwebteam_get_acf_data( "bdwebteam_active_onepage");
$bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args2();

?>
<div class="offcanvas offcanvas-end header-offcanvasmenu" tabindex="-1" id="offcanvasMenuRight">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
         
        <form  id="<?php echo esc_attr($unique_id); ?>" class="side-nav-search-form blog-search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
            <div class="bdwebteam-search blog-search form-group">
                <input class="search-field"  type="text"  name="s"  placeholder="<?php echo esc_attr( $bdwebteam_search_offcanvas ); ?>" value="<?php echo get_search_query(); ?>"/>
                <button type="submit" class="side-nav-search-btn"><i class="fal fa-search"></i></button>
            </div>
        </form>      
        <div class="row ">
            <?php if (has_nav_menu('offcanvas')) { ?>
                <!-- Start Left Bar  -->
                  <div class="col-lg-5 col-xl-6">
                    <?php  if ( $bdwebteam_active_onepage == 'yes' ) { ?>
                      <?php if (has_nav_menu('primary')) {
                         wp_nav_menu($bdwebteam_nav_menu_args);
                    } ?> 
                <?php }else{ ?> 
                     <?php 
                        if (has_nav_menu('offcanvas')) {
                            wp_nav_menu( array(
                                'theme_location' => 'offcanvas',
                                'container' => 'div',
                                'menu_class' => "main-navigation list-unstyled",
                                'fallback_cb' => false
                                )
                             ); 
                        }
                    ?> 

                <?php } ?>  
                </div>
                <!-- End Left Bar  -->
            <?php } ?>               
            <div class="col-lg-7 col-xl-6">
                <div class="contact-info-wrap">
                    <div class="contact-inner">
                        <address class="address">
                            <?php
                            if ($bdwebteam_options['address_field_title']) { ?>
                                <span class="title"> <?php echo bdwebteam_kses_intermediate( $bdwebteam_options['address_field_title'] ); ?> </span>
                            <?php } ?>
                            <?php
                            if ($bdwebteam_options['address']) {
                            ?>
                                <p class="m-b-xs-30 mid grey-dark-three"><?php echo bdwebteam_kses_intermediate($bdwebteam_options['address']); ?></p>
                            <?php
                            }
                            ?>
                        </address>
                        <address class="address">
                            <?php
                            if ($bdwebteam_options['call_now_field_title']) { ?>
                                <span class="title"> <?php echo bdwebteam_kses_intermediate($bdwebteam_options['call_now_field_title']); ?> </span>
                            <?php } ?>

                            <?php
                            if ($bdwebteam_options['phone']) {
                            ?>
                                 
                                <a class="tel" href="tel:<?php echo bdwebteam_kses_intermediate($phoneNumber); ?>"><i class="fas fa-phone"></i><?php echo bdwebteam_kses_intermediate($bdwebteam_options['phone']); ?>
                                </a>
                             
                            <?php
                            }
                            ?>
                            <?php
                            if ($bdwebteam_options['fax']) {
                            ?> 
                                <a class="tel" href="tel:<?php echo bdwebteam_kses_intermediate($faxNumber); ?>"><i class="fas fa-fax"></i><?php echo bdwebteam_kses_intermediate($bdwebteam_options['fax']); ?>
                                </a>
                                
                            <?php
                            }
                            ?>
                            <?php
                            if ($bdwebteam_options['email']) {
                            ?> 
                                <a class="tel" href="mailto:<?php echo bdwebteam_kses_intermediate($bdwebteam_options['email']); ?>"><i class="fas fa-envelope"></i><?php echo bdwebteam_kses_intermediate($bdwebteam_options['email']); ?>
                                </a>
                                
                            <?php
                            }
                            ?>
                        </address>
                    </div> 
                      <?php if(!empty($bdwebteam_options['bdwebteam_enable_social']) ){ ?>    

                        <?php if (!empty( $bdwebteam_options['bdwebteam_social_icons'] ) ) { ?>
                            <div class="contact-inner">
                            <?php
                            if ($bdwebteam_options['social_title']) { ?>
                                <h5 class="title"><?php echo esc_html( $bdwebteam_options['social_title'] ); ?></h5>
                            <?php } ?>

                                <div class="contact-social-share">
                                    <ul class="social-share list-unstyled">
                                        <?php
                                        foreach ($bdwebteam_options['bdwebteam_social_icons'] as $key => $value) {
                                            if ($value != '') {
                                                echo '<li><a class="' . esc_html($key) . ' social-icon" href="' . esc_url($value) . '"  target="_blank"><i class="fab fa-' . esc_html($key) . '"></i></a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- End of .side-nav-inner -->
                        <?php } ?>   
                      <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

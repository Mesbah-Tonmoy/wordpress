<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

// Get Value
$bdwebteam_options = Helper::bdwebteam_get_options();
$bdwebteam_active_onepage = get_field( "bdwebteam_active_onepage");
if ( $bdwebteam_active_onepage == 'yes' ) { 
    $bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args_onepage();
}else{ 
    $bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args();
}
$bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args();
// Get logo
$logo       = empty($bdwebteam_options['bdwebteam_light_head_logo']['url'] ) ? Helper::get_img( 'logo/logo.png' ) :$bdwebteam_options['bdwebteam_light_head_logo']['url'];
$darklogo   = empty($bdwebteam_options['bdwebteam_dark_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-3.svg' ) :$bdwebteam_options['bdwebteam_dark_header_logo']['url'];
$stickylogo  = empty($bdwebteam_options['bdwebteam_sticky_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$bdwebteam_options['bdwebteam_sticky_header_logo']['url'];
$bdwebteam_button_layout = Helper::bdwebteam_header_button_layout();


$shopping_cart           = $bdwebteam_button_layout['shopping_cart'];
$bdwebteam_enable_offcanvas   = $bdwebteam_button_layout['offcanvas_button'];
$header_button          = $bdwebteam_button_layout['header_button'];
$button_url             = $bdwebteam_button_layout['header_button_url'];

?>
<header class="header bdwebteam-header header-style-4">
    <div id="bdwebteam-sticky-placeholder"></div>
    <div class="bdwebteam-mainmenu">
        <div class="container">
            <div class="header-navbar">
               <div class="header-logo">
                    <?php if (isset( $bdwebteam_options['bdwebteam_logo_type'] )): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="<?php echo esc_attr__( 'home', 'vitax' ); ?>">

                            <?php if ('image' == $bdwebteam_options['bdwebteam_logo_type']): ?>  
                                <?php if($bdwebteam_options['bdwebteam_dark_header_logo']){ ?>                      
                                    <img src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?> 

                        <?php else: ?>

                            <?php if ('text' == $bdwebteam_options['bdwebteam_logo_type']): ?>
                                <?php echo esc_html($bdwebteam_options['bdwebteam_logo_text']); ?>
                            <?php endif ?>
                        <?php endif ?>

                    </a>
                <?php else: ?>
                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="<?php echo esc_attr__( 'home', 'vitax' ); ?>">
                            <?php if (isset($bdwebteam_options['bdwebteam_logo_text']) ? $bdwebteam_options['bdwebteam_logo_text'] : '') {
                                echo esc_html($bdwebteam_options['bdwebteam_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>
                    <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) { ?>
                        <p class="site-description"><?php echo esc_html($description); ?> </p>
                    <?php } ?>
                <?php endif ?>
            </div>
                <div class="header-main-nav" id="mobilemenu-popup">
                 <div class="d-block d-lg-none">
                    <div class="mobile-nav-header">
                        <div class="mobile-nav-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                              <img class="light-mode" src="<?php echo esc_url( $stickylogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                              <img class="dark-mode" src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                        <button class="mobile-menu-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                 <?php if (has_nav_menu('primary')) {
                    wp_nav_menu($bdwebteam_nav_menu_args);
                    } ?>

                </div>
                <div class="header-action">
                    <ul class="list-unstyled">
                       
                        <?php if ("no" !== $shopping_cart && "0" !== $shopping_cart):?>
                        <li>        
                                <?php global $woocommerce;
                            $minicart_icon = isset($bdwebteam_options['minicart_icon']) ? $bdwebteam_options['minicart_icon'] : false;
                            ?>
                            <?php if (class_exists('woocommerce') && $minicart_icon): ?>
                                <div class="ax-search-area">
                                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i class="far fa-shopping-cart"></i><span
                                                class="aw-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
                                </div>
                            <?php endif; ?>
                        </li>
                           <?php endif; ?>
                           
                           <?php if ("no" !== $header_button && "0" !== $header_button):?>
                            <li class="header-btn">
                                <a href="<?php echo esc_url( $button_url ); ?>" class="bdwebteam-btn btn-fill-primary"><?php echo esc_html($bdwebteam_options['button_txt']); ?> </a>
                            </li>
                        <?php endif; ?>
                            <li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
                                <button class="btn-wrap btn-dark" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </li>
                         <?php  if (isset($bdwebteam_options['show_ld_switcher_form_user_end'])) {
                            if ($bdwebteam_options['show_ld_switcher_form_user_end'] === 'on' || $bdwebteam_options['show_ld_switcher_form_user_end'] == 1) {
                            ?> 
                            <li class="my_switcher d-block d-lg-none">
                                <ul>
                                    <li title="Light Mode">
                                        <a href="javascript:void(0)" class="setColor light" data-theme="light">
                                            <i class="fal fa-lightbulb-on"></i>
                                        </a>
                                    </li>
                                    <li title="Dark Mode">
                                        <a href="javascript:void(0)" class="setColor dark" data-theme="dark">
                                            <i class="fas fa-moon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                          <?php  }
                        } 
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

$bdwebteam_options        = Helper::bdwebteam_get_options();
$bdwebteam_active_onepage = '';
$bdwebteam_active_onepage = bdwebteam_get_acf_data( "bdwebteam_active_onepage");
if ( $bdwebteam_active_onepage == 'yes' ) { 
    $bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args_onepage();
}else{ 
    $bdwebteam_nav_menu_args = Helper::bdwebteam_nav_menu_args();
}
$bdwebteam_button_layout = Helper::bdwebteam_header_button_layout();
$logo               = empty($bdwebteam_options['bdwebteam_light_head_logo']['url'] ) ? Helper::get_img( 'logo-dark.png' ) :$bdwebteam_options['bdwebteam_light_head_logo']['url'];
$darklogo           = empty($bdwebteam_options['bdwebteam_dark_header_logo']['url'] ) ? Helper::get_img( 'logo-dark.png' ) :$bdwebteam_options['bdwebteam_dark_header_logo']['url'];
$stickylogo         = empty($bdwebteam_options['bdwebteam_sticky_header_logo']['url'] ) ? Helper::get_img( 'logo-dark.png' ) :$bdwebteam_options['bdwebteam_sticky_header_logo']['url'];


$shopping_cart           = $bdwebteam_button_layout['shopping_cart'];
$bdwebteam_enable_offcanvas   = $bdwebteam_button_layout['offcanvas_button'];
$header_button          = $bdwebteam_button_layout['header_button'];
$button_url             = $bdwebteam_button_layout['header_button_url'];
 

?> 
 <header class="header bdwebteam-header header-style-1">
    <div id="bdwebteam-sticky-placeholder"></div>
    <div class="header header-style-2">
                <div class="header-mainmenu">
                    <div class="container-fluid">
                        <div class="header-navbar ">

                            <div class="header-main-nav">
                                <div class="header-logo">
                                    <a href="index.html"><img class="light-version-logo" src="http://localhost/wordpress/wp-content/themes/vitax/assets/media/logo-dark.png" alt="logo"></a>
                                    <a href="index.html"><img class="dark-version-logo" src="http://localhost/wordpress/wp-content/themes/vitax/assets/media/logo-dark.png" alt="logo"></a>
                                    <a href="index.html"><img class="sticky-logo" src="../../assets/media/logo-dark.png" alt="logo"></a>
                                </div>

                                <div class="header-main-nav">
                                    <!-- Start Mainmanu Nav -->
                                    <nav class="mainmenu-nav" id="mobilemenu-popup">
                                        <div class="d-block d-lg-none">
                                            <div class="mobile-nav-header">
                                                <div class="mobile-nav-logo">
                                                    <a href="index.html">
                                                        <img class="light-mode" src="assets/media/logo-mobile-dark.png" alt="Site Logo">
                                                        <img class="dark-mode" src="assets/media/logo-mobile-light.png " alt="Site Logo">
                                                    </a>
                                                </div>
                                                <button class="mobile-menu-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
                                            </div>
                                        </div>
                                        <ul class="mainmenu" id="onepagenav">
                                            <li class="nav-item">
                                                <a class="scroll active" href="#main-wrapper">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="scroll" href="#services">Services</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="scroll" href="#about">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="scroll" href="#project">Project</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="scroll" href="#review">Review</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="scroll" href="#contact">Contact</a>
                                            </li>

                                        </ul>
                                    </nav>
                                    <!-- End Mainmanu Nav -->
                                </div>
                            </div>
                            <div class="header-action">
                                <ul class="header-action-icon  d-flex">
                                    <li class="color-switcher">
                                        <ul>
                                            <li title="Light Mode">
                                                <a href="javascript:void(0)" class="btn-wrap btn-layout-light setColor light" data-theme="light">
                                                    <i class="fal fa-lightbulb-on"></i>
                                                </a>
                                            </li>
                                            <li title="Dark Mode">
                                                <a href="javascript:void(0)" class="btn-wrap btn-layout-light setColor dark" data-theme="dark">
                                                    <i class="fas fa-moon"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hide-mobile">
                                        <div class="btn-box-wrp">
                                            <a href="#" class="btn-layout-dark">
                                                <span>Get A Quote </span> <i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="sidemenu-btn d-lg-block d-none">
                                        <button class="btn-wrap btn-layout-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuRight">
                                            <span></span>
                                            <span></span>

                                        </button>
                                    </li>
                                    <li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
                                        <button class="btn-wrap btn-layout-light" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                                            <span></span>
                                            <span></span>

                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
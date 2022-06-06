<?php
$bdwebteam_options = Helper::bdwebteam_get_options();
$preloader_default_image = BDWEBTEAM__THEME_URI . '/assets/images/preloader.gif';
if ( $bdwebteam_options['bdwebteam_preloader'] !== 'no' ) {
    if ( !empty( $bdwebteam_options['bdwebteam_preloader_image']['url'] ) ) {
        $preloader_img = $bdwebteam_options['bdwebteam_preloader_image']['url'];
        echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
    }else{
        echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url($preloader_default_image) . ');"></div>';
    }
}
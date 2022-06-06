<?php
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */
  
$bdwebteam_options = Helper::bdwebteam_get_options();
$bdwebteam_footer_bottom_menu_args = Helper::bdwebteam_footer_bottom_menu_args();
$lineclass = (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) ? " has-footer-elementor" : " has-no-footer-elementor";
$allowed_tags = wp_kses_allowed_html( 'post' );
$footer_top_layout              = Helper::bdwebteam_footer_top_layout();
$footer_top_area                = $footer_top_layout['footer_top_area'];

if ( "no" !== $footer_top_area && "0" !== $footer_top_area && !is_404()) { 
    $footer_top_on = "  no-padding" ;
}else{
   $footer_top_on = " has-no-footer-top" ; 
}
?>
    <footer class="footer-area">
                <div class="footer-bottom">
                    <div class="container">
                        <div class="footer-copyright-wrp align-items-center">
                            <div class="footer-copyright">
                                <div class="copyright-text">Copyright & Design By @bdwebteam - 2022</div>
                            </div>

                            <div class="footer-back-to-wrp">
                                <div class="footer-back-to-top">
                                    <a href="#main-wrapper" id="back-to-top"><span>Back To Top</span> <i class="fas fa-long-arrow-alt-up"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
</div>
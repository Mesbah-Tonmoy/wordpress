<?php
/*
***************************************************************
*  Social sharing icons
***************************************************************
*/

if ( ! function_exists('axil_sharing_icon_links') ) {
 function axil_sharing_icon_links( ) {

  global $post;
  $axil_options = Helper::axil_get_options();

  $html = '<ul class="social-share-transparent justify-content-end">';

   // facebook
   $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
   $html .= '<li><a href="'. esc_url( $facebook_url ) .'" target="_blank" class="aw-facebook"><i class="fab fa-facebook-f"></i></a></li>';

   // twitter
   $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
   $html .= '<li><a href="'. esc_url( $twitter_url ) .'" target="_blank" class="aw-twitter"><i class="fab fa-twitter"></i></a></li>';

   // linkedin
   $linkedin_url = 'https://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<li><a href="'. esc_url( $linkedin_url ) .'" target="_blank" class="aw-linkdin"><i class="fab fa-linkedin-in"></i></a></li>';

   $html .= '<li><button class="axilcopyLink" title="'. esc_html('Copy Link', 'axil-elements') .'" data-link="'. esc_url(get_permalink()) .'"><i class="fas fa-link"></i></button></li>';

  $html .= '</ul>';

  echo wp_kses_post($html);

 }
}


if ( ! function_exists('axil_sharing_icon_links_bottom') ) {
    function axil_sharing_icon_links_bottom( ) {

        global $post;
        $axil_options = Helper::axil_get_options();

       $html = '<div class="d-flex flex-wrap align-content-start h-100">
        <div class="position-sticky sticky-top">
        <div class="post-details__social-share">
        <span class="share-on-text">'. esc_html('Share on:', 'axil-elements') .'</span>
        <div class="social-share">';


        // facebook
        $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
        $html .= '<a href="'. esc_url( $facebook_url ) .'" target="_blank" class="aw-facebook"><i class="fab fa-facebook-f"></i></a>';

        // twitter
        $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
        $html .= '<a href="'. esc_url( $twitter_url ) .'" target="_blank" class="aw-twitter"><i class="fab fa-twitter"></i></a>';

        // linkedin
        $linkedin_url = 'https://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
        $html .= '<a href="'. esc_url( $linkedin_url ) .'" target="_blank" class="aw-linkdin"><i class="fab fa-linkedin-in"></i></a>';


      
        $html .= '</div>';       
        $html .= '</div></div></div>';       


        echo wp_kses_post($html);

    }
}
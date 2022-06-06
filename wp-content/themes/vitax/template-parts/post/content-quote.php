<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */
$bdwebteam_options = Helper::bdwebteam_get_options();
$bdwebteam_quote_author_name = bdwebteam_get_acf_data("bdwebteam_quote_author_name");
$bdwebteam_quote_author = !empty($bdwebteam_quote_author_name) ? $bdwebteam_quote_author_name : get_the_author();
$bdwebteam_quote_author_name_designation = bdwebteam_get_acf_data("bdwebteam_quote_author_name_designation");
$sidebar = Helper::bdwebteam_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';
$post_share_icon = (isset($bdwebteam_options['bdwebteam_show_post_share_icon'])) ? $bdwebteam_options['bdwebteam_show_post_share_icon'] : 'yes';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content-block post-list-view format-quote mt--30'); ?>>
     <div class="blog-grid blog-without-thumb blog-quote-post">
        <h5 class="title"><a href="<?php the_permalink(); ?>">“ <?php the_title(); ?> ”</a></h5>          
          <?php Helper::bdwebteam_quote_postmeta(); ?>  
    </div>
</div>
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

$bdwebteam_options = Helper::bdwebteam_get_options();
 
$sidebar = Helper::bdwebteam_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';
$post_share_icon = (isset($bdwebteam_options['bdwebteam_show_post_share_icon'])) ? $bdwebteam_options['bdwebteam_show_post_share_icon'] : 'yes';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid blog-style-2">
        <?php if(has_post_thumbnail()){ ?>
            <div class="post-thumnbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($thumb_size) ?>
                </a>
            </div>
        <?php } ?> 
        <div class="post-content"> 
            <div class="post-top-meta"> 
                <?php Helper::bdwebteam_postmeta(); ?> 
            </div>
            <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php the_excerpt();?>
        </div>
         
           <?php if ( $bdwebteam_options['bdwebteam_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="bdwebteam-btn btn-borderd btn-large"><?php  echo esc_attr( $bdwebteam_options['bdwebteam_read_more_btn_txt'] );?></a>
            <?php } ?>
          
    </div>
</div>

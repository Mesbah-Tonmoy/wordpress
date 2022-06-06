<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

$custom_link = bdwebteam_get_acf_data("bdwebteam_custom_link");
$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$bdwebteam_options = Helper::bdwebteam_get_options();
$sidebar = Helper::bdwebteam_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::bdwebteam_postmeta(); ?>
         <?php if(has_post_thumbnail()){ ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($thumb_size) ?>
                </a>
            </div>
        <?php } ?>    
          
            <?php the_excerpt();?>
            <?php if ( $bdwebteam_options['bdwebteam_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="bdwebteam-btn btn-borderd btn-large"><?php  echo esc_attr( $bdwebteam_options['bdwebteam_read_more_btn_txt'] );?></a>
            <?php } ?>
            
    </div>
</div>

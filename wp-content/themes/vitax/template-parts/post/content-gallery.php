<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

$images = bdwebteam_get_acf_data("bdwebteam_gallery_image");

$bdwebteam_options = Helper::bdwebteam_get_options();
$sidebar = Helper::bdwebteam_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';

$post_share_icon = (isset($bdwebteam_options['bdwebteam_show_post_share_icon'])) ? $bdwebteam_options['bdwebteam_show_post_share_icon'] : 'yes';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>
<!-- Start Post List  -->

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid blog-thumb-slide <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::bdwebteam_postmeta(); ?> 
         <?php
            if($images){ ?>
                <div class="post-thumbnail">
                      <div class="slick-slider slick-arrow-nav slick-dot-nav" data-slick='{"infinite": true, "autoplay": true, "arrows": true, "dots": true, "slidesToShow": 1}'>
                    <?php foreach( $images as $image ): ?>
                        <div class="slick-slide">
                            <a href="<?php the_permalink(); ?>">
                                <img class="w-100"  src="<?php echo esc_url( $image['sizes'][$thumb_size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php } else { ?> 
                <?php if(has_post_thumbnail()){ ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail($thumb_size) ?>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?> 
            <?php the_excerpt();?>
            <?php if ( $bdwebteam_options['bdwebteam_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="bdwebteam-btn btn-borderd btn-large"><?php echo esc_attr( $bdwebteam_options['bdwebteam_read_more_btn_txt'] );?></a>
            <?php } ?>

    </div>
</div>

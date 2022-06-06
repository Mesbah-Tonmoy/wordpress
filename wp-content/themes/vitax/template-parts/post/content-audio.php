<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

$audio_url = bdwebteam_get_acf_data("bdwebteam_upload_audio");
$bdwebteam_options = Helper::bdwebteam_get_options();
$sidebar = Helper::bdwebteam_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::bdwebteam_postmeta(); ?>
         <?php if(has_post_thumbnail()){ ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($thumb_size) ?>
                </a>
            </div>
        <?php } ?> 
        <?php if( $audio_url ): ?>
            <audio controls>
                <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                <?php esc_html_e('Your browser does not support the audio tag.', 'vitax'); ?>
            </audio>
        <?php endif; ?>
        <?php the_excerpt();?>
         <?php if ( $bdwebteam_options['bdwebteam_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="bdwebteam-btn btn-borderd btn-large"><?php  echo esc_attr( $bdwebteam_options['bdwebteam_read_more_btn_txt'] );?></a>
            <?php } ?>
    </div>
</div>


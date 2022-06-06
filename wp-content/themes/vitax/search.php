<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vitax
 */

get_header();
// Get Value
$bdwebteam_options = Helper::bdwebteam_get_options();
$bdwebteam_blog_sidebar_class = ($bdwebteam_options['bdwebteam_blog_sidebar'] === 'no') || !is_active_sidebar( 'sidebar-1' )  ? 'col-lg-10 offset-lg-1 col-md-12 col-12':'col-lg-8 col-md-12 col-12';
?>
<!-- Start Blog Area  -->
<div class="bdwebteam-blog-area section-padding-equal">
    <div class="container">
        <div class="row row-40">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $bdwebteam_options['bdwebteam_blog_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-md-12 col-12 bdwebteam-sidebar">
                   
                    <?php dynamic_sidebar(); ?>
                   
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($bdwebteam_blog_sidebar_class); ?>">

                <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/post/content', get_post_format() );

                    endwhile;

                    bdwebteam_blog_pagination();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $bdwebteam_options['bdwebteam_blog_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-md-12 col-12 bdwebteam-sidebar">
                    
                    <?php dynamic_sidebar(); ?>
                    
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog Area  -->
<?php
get_footer();
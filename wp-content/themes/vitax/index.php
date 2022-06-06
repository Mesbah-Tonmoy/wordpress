<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

get_header();
// Get Value
$bdwebteam_options = Helper::bdwebteam_get_options();
$bdwebteam_blog_sidebar_class = ($bdwebteam_options['bdwebteam_blog_sidebar'] === 'no') || !is_active_sidebar( 'sidebar-1' ) ? 'col-lg-12 bdwebteam-post-wrapper':'col-lg-8 bdwebteam-post-wrapper';
?>
<!-- Start Blog Area  -->
<div class="bdwebteam-blog-area section-padding-equal">
    <div class="container">
        <div class="row row-40">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $bdwebteam_options['bdwebteam_blog_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                    <aside class="bdwebteam-sidebar">                           
                        <?php dynamic_sidebar(); ?>                           
                    </aside>
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
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                    <aside class="bdwebteam-sidebar">                       
                        <?php dynamic_sidebar(); ?>                       
                    </aside>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog Area  -->
<?php
get_footer();
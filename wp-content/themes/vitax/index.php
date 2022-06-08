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

            <div class="breadcrumb-banner2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading heading-left">
                                <h2 class="title">Get In Touch</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="breadcrumb-left">
                                <ul class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li>|</li>
                                    <li>Service Details</li>
                                </ul>
                            </div>
                            <div class="title-border">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled shape-group-4">
                    <li class="shape shape-1"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/shape/cline-1.png' ); ?>" alt="Comments"></li>
                </ul>
            </div>

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

                    endwhile; ?>
                    <div class="blog-grid blog-quote">
                        <blockquote>
                            <h4 class="title"><a href="blog-quote.html">Dharma Home Suites at Novia offers
                                    fully plain & furnished</a></h4>
                        </blockquote>
                    </div>
                    <?php bdwebteam_blog_pagination();

                else :
                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>              
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $bdwebteam_options['bdwebteam_blog_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                <div class="sidebar-widget sidebar-break-lg">
                                <div class="widget widget-author">
                                    <h5 class="widget-title title-borderd">About Me</h5>
                                    <div class="author-info">
                                        <div class="thumb">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/blog/author-1.jpg' ); ?>" alt="Rosalina D. Willaimson">
                                        </div>
                                        <div class="content">
                                        <h6 class="author-name"> <?php printf('<a class="hover-flip-item-wrapper" href="%1$s"><span class="hover-flip-item"><span data-text="%2$s">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta() ))), get_the_author_meta('display_name', get_the_author_meta( 'ID' ))); ?></h6>
                                            <p>Lorem ipsum dolor sit amet, consect etur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            <ul class="social-icon list-unstyled">
                                                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://www.behance.net/"><i class="fab fa-behance"></i></a></li>
                                                <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="https://linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-search">
                                    <h5 class="widget-title title-borderd">Search Here</h5>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search your keyword...">
                                        <button class="search-btn" type="button"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="widget widget-post">
                                    <h5 class="widget-title title-borderd">Popular Feeds</h5>
                                    <div class="widget-post-list">
                                        <div class="single-post">
                                            <div class="thumb">
                                                <a href="single-blog.html">
                                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/blog/blog-7.jpg' ); ?>" alt="Post Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="single-blog.html">Lorem ipsum dolor sit ci sed do something.</a></h6>
                                                <div class="post-date"><i class="fas fa-calendar-alt"></i> 24th March 2021</div>
                                            </div>
                                        </div>
                                        <div class="single-post">
                                            <div class="thumb">
                                                <a href="single-blog.html">
                                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/blog/blog-8.jpg' ); ?>" alt="Post Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="single-blog.html">Lorem ipsum dolor sit ci sed do something.</a></h6>
                                                <div class="post-date"><i class="fas fa-calendar-alt"></i> 24th March 2021</div>
                                            </div>
                                        </div>
                                        <div class="single-post">
                                            <div class="thumb">
                                                <a href="single-blog.html">
                                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/blog/blog-9.jpg' ); ?>" alt="Post Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="single-blog.html">Lorem ipsum dolor sit ci sed do something.</a></h6>
                                                <div class="post-date"><i class="fas fa-calendar-alt"></i> 24th March 2021</div>
                                            </div>
                                        </div>
                                        <div class="single-post">
                                            <div class="thumb">
                                                <a href="single-blog.html">
                                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/blog/blog-10.jpg' ); ?>" alt="Post Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="single-blog.html">Lorem ipsum dolor sit ci sed do something.</a></h6>
                                                <div class="post-date"><i class="fas fa-calendar-alt"></i> 24th March 2021</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-category">
                                    <h5 class="widget-title title-borderd">Categories</h5>
                                    <ul class="category-list list-unstyled">
                                        <li><a href="blog.html">Business<span>26</span></a></li>
                                        <li><a href="blog.html">Consultant<span>30</span></a></li>
                                        <li><a href="blog.html">Creative<span>71</span></a></li>
                                        <li><a href="blog.html">UI/UX<span>56</span></a></li>
                                        <li><a href="blog.html">Technology<span>60</span></a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-tag">
                                    <h5 class="widget-title title-borderd">Latest Tags</h5>
                                    <ul class="tags-list list-unstyled">
                                        <li><a href="#">Popular</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">UX</a></li>
                                        <li><a href="#">Usability</a></li>
                                        <li><a href="#">Develop</a></li>
                                        <li><a href="#">Icon</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Consult</a></li>
                                        <li><a href="#">Kit</a></li>
                                        <li><a href="#">Keyboard</a></li>
                                        <li><a href="#">Mouse</a></li>
                                        <li><a href="#">Tech</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-ad-banner">
                                    <h5 class="widget-title title-borderd">Sponsor Ads</h5>
                                    <a href="#"><img src="assets/media/others/widget-ad-1.jpg" alt="Ad"></a>
                                </div>
                            </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog Area  -->
<?php
get_footer();
<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

// Get Value

$bdwebteam_options = Helper::bdwebteam_get_options();
$sidebar = Helper::bdwebteam_sidebar_options();
$bdwebteam_single_blog_sidebar_class = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? ' col-lg-12':' col-lg-8';
$alignwide = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'wp-block-image alignwide':'';

$images = bdwebteam_get_acf_data('bdwebteam_gallery_image');
$audio_url = bdwebteam_get_acf_data('bdwebteam_upload_audio');
$custom_link = bdwebteam_get_acf_data('bdwebteam_custom_link');

$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$bdwebteam_quote_author_name = bdwebteam_get_acf_data("bdwebteam_quote_author_name");
$bdwebteam_quote_author = !empty($bdwebteam_quote_author_name) ? $bdwebteam_quote_author_name : get_the_author();
$bdwebteam_quote_author_name_designation = bdwebteam_get_acf_data("bdwebteam_quote_author_name_designation");
$video_url = bdwebteam_get_acf_data("bdwebteam_video_link");
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'bdwebteam-single-blog-thumb':'bdwebteam-blog-md';
$header_layout = Helper::bdwebteam_post_banner_style();

// Review
$review_area = bdwebteam_get_acf_data('bdwebteam_post_review_box');
$review_box_position = bdwebteam_get_acf_data('bdwebteam_post_review_box_position');

?>
<section class="service-section-padding">
                <div class="container">
                    <div class="row row-35">
                        <div class="col-lg-12">
                            <div class="single-service bg-color-light">
                                <div class="single-service-thumbnail">
                                    <img src="assets/media/services/sd2.jpg" alt="Service">
                                </div>
                                <div class="single-service-content">
                                    <h3 class="title">Get Service</h3>
                                    <p>Welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or obligations of business it will frequently occur that pleasures have to be repudiated & annoyances that accepted. The wise man there fore always holds in these matters to this principle.</p>
                                    <blockquote>
                                        Manufacturing industry became a key sector of production and labour in European and North American countries during the Industrial Revolution,upsetting previous mercantile and feudal economies. The Industrial Revolution, which took place from the 18th to 19th centuries.
                                    </blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    <div class="service-process">
                                        <div class="row row-30 align-items-center">
                                            <div class="col-xl-6 col-sm-6">
                                                <div class="single-box">
                                                    <h4 class="title">Get Service</h4>
                                                    Manufacturing industry became a key sector of production and labour in European and North American countries during the Industrial Revolution,upsetting previous mercantile and feudal economies. The Industrial Revolution, which took place from the 18th to 19th centuries.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-sm-6">
                                                <div class="single-box">
                                                    <img src="assets/media/project/1.jpg" alt="Service">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <div class="share-icon">
                                        <span>Share:</span>
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-discord"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
get_footer();
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vitax
 */
get_header();
// Get Value
$bdwebteam_options = Helper::bdwebteam_get_options();
$error_image = $bdwebteam_options['bdwebteam_404_banner']['url'];
$error_image  = empty($bdwebteam_options['bdwebteam_404_banner']['url'] ) ? Helper::get_img( 'banner/404.png' ) :$bdwebteam_options['bdwebteam_404_banner']['url'];
?>
<section class="error-page onepage-screen-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                 <?php if(!empty($bdwebteam_options['bdwebteam_404_banner']['url'])){ ?> 
                <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                    <img src="<?php echo esc_url( $error_image );?>" alt="<?php echo esc_attr__( '404', 'vitax' ); ?>">
                </div>
                 <?php } ?>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">                    
                    <?php if(!empty($bdwebteam_options['bdwebteam_404_title'])){ ?> <h1 class="title"><?php echo esc_html( $bdwebteam_options['bdwebteam_404_title'] );?></h1> <?php } ?>
                     <?php if(!empty($bdwebteam_options['bdwebteam_404_subtitle'])){ ?> 
                        <p><?php echo esc_html( $bdwebteam_options['bdwebteam_404_subtitle'] );?></p>
                     <?php } ?>

                    <?php if($bdwebteam_options['bdwebteam_enable_go_back_btn'] == 'yes'){ ?> 

                    <a href="<?php echo esc_url( home_url( '/' ) );?>" class="bdwebteam-btn btn-fill-primary"><?php echo esc_html( $bdwebteam_options['bdwebteam_button_text'] );?>
                        
                    </a>
                <?php } ?>

                </div>
            </div>
        </div>
    </div>
<?php if(!empty($bdwebteam_options['bdwebteam_404_other_shape_enable'])){ ?> 
    <ul class="shape-group-8 list-unstyled">
        <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/bubble-9.png" alt="<?php echo esc_attr__( 'Bubble', 'vitax' ); ?>">
        </li>
        <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/bubble-27.png" alt="<?php echo esc_attr__( 'Bubble', 'vitax' ); ?>">
        </li>
        <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/line-4.png" alt="<?php echo esc_attr__( 'Line', 'vitax' ); ?>">
        </li>
        <li class="shape shape-4" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/bubble-10.png" alt="<?php echo esc_attr__( 'Bubble', 'vitax' ); ?>">
        </li>
    </ul>
    <?php } ?>
</section>
<?php
get_footer();

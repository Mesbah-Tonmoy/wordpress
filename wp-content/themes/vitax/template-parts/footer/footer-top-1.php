<?php
/**
 * Template part for displaying footer top layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitax
 */

// Get Value
$bdwebteam_options              = Helper::bdwebteam_get_options();
$ot_footer_top_area        = $bdwebteam_options['bdwebteam_footer_top_enable'];
$title                     = (!empty($bdwebteam_options['bdwebteam_ft_title'])) ? $bdwebteam_options['bdwebteam_ft_title'] : "";
$subtitle                  = (!empty($bdwebteam_options['bdwebteam_ft_sub_title'])) ? $bdwebteam_options['bdwebteam_ft_sub_title'] : "";
$btntext                   = (!empty($bdwebteam_options['bdwebteam_ft_btn_txt'])) ? $bdwebteam_options['bdwebteam_ft_btn_txt'] : "";
$btnurl                    = (!empty($bdwebteam_options['bdwebteam_ft_btn_url'])) ? $bdwebteam_options['bdwebteam_ft_btn_url'] : "";
$pcimg              = empty( $bdwebteam_options['bdwebteam_ft_btn_img']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img']['url'];
$pcimg1             = empty( $bdwebteam_options['bdwebteam_ft_btn_img1']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img1']['url'];
$pcimg2             = empty( $bdwebteam_options['bdwebteam_ft_btn_img2']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img2']['url'];
$pcimg3             = empty( $bdwebteam_options['bdwebteam_ft_btn_img3']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img3']['url'];
$pcimg4             = empty( $bdwebteam_options['bdwebteam_ft_btn_img4']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img4']['url'];
$pcimg5             = empty( $bdwebteam_options['bdwebteam_ft_btn_img5']['url'] ) ? '' :$bdwebteam_options['bdwebteam_ft_btn_img5']['url'];
$bdwebteam_ft_btn_img_id = isset($bdwebteam_options['bdwebteam_ft_btn_img']['id']) && !empty($bdwebteam_options['bdwebteam_ft_btn_img']['id']) ? $bdwebteam_options['bdwebteam_ft_btn_img']['id'] : "";
$pcimg_alt_text     = get_post_meta($bdwebteam_ft_btn_img_id , '_wp_attachment_image_alt', true);
$has_img            = (!empty($bdwebteam_options['bdwebteam_footer_top_img_enable'])) ? 'has-image' : "has-no-image";
?>
<section class="section call-to-action-area <?php echo esc_attr( $has_img ); ?>">
    <div class="container">
        <div class="call-to-action">
           <div class="section-heading heading-light">
                 <?php if(!empty($subtitle) ){ ?>    
                        <span class="subtitle"><?php echo esc_html($subtitle); ?></span>
                 <?php } ?> 
                <?php if(!empty($title) ){ ?> 
                     <h2 class="title"><?php echo esc_html($title); ?></h2>
                <?php } ?> 
                <?php if(!empty($btnurl) ){ ?> 
                    <a href="<?php echo esc_url($btnurl); ?>" class="bdwebteam-btn btn-large btn-fill-white"><?php echo esc_html($btntext); ?></a>
                <?php } ?> 
            </div>
                <?php if(!empty($bdwebteam_options['bdwebteam_footer_top_img_enable']) ){ ?>  
                   <div class="thumbnail">
                        <div class="larg-thumb" data-sal="zoom-in" data-sal-duration="600" data-sal-delay="100"> 
                             <img class="dark-logo" src="<?php echo esc_url( $pcimg ); ?>" alt="<?php echo esc_attr($pcimg_alt_text); ?>">
                        </div> 
                         <ul class="list-unstyled small-thumb">
                             <?php if(!empty( $pcimg1 ) ){ ?>
                                <li class="shape shape-1" data-sal="slide-right" data-sal-duration="800" data-sal-delay="400">
                                    <img class="paralax-image" src="<?php echo esc_url( $pcimg1 ); ?>" alt="<?php echo esc_attr('right image', 'vitax');?>">
                                </li>
                            <?php } ?>
                             <?php if(!empty( $pcimg2 ) ){ ?>
                                <li class="shape shape-2" data-sal="slide-left" data-sal-duration="800" data-sal-delay="300">
                                    <img class="paralax-image" src="<?php echo esc_url( $pcimg2 ); ?>" alt="<?php echo esc_attr('Left Image', 'vitax');?>">
                                </li>
                            <?php } ?> 
                        </ul>  
                    </div>   
              <?php } ?> 
        </div>
    </div>
     <?php if(!empty($bdwebteam_options['bdwebteam_footer_top_shape_group_enable']) ){ ?>   
        <ul class="list-unstyled shape-group-9">
            <li class="shape shape-1"><img src="<?php echo Helper::get_img( 'footer/bubble-12.png'); ?>" alt="<?php echo esc_attr('bubble-12', 'vitax');?>"></li>
            <li class="shape shape-2"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'vitax');?>"></li>
            <li class="shape shape-3"><img src="<?php echo Helper::get_img( 'footer/bubble-13.png'); ?>" alt="<?php echo esc_attr('bubble-13', 'vitax');?>"></li>
            <li class="shape shape-4"><img src="<?php echo Helper::get_img( 'footer/bubble-14.png'); ?>" alt="<?php echo esc_attr('bubble-14', 'vitax');?>"></li>
            <li class="shape shape-5"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'vitax');?>"></li>
            <li class="shape shape-6"><img src="<?php echo Helper::get_img( 'footer/bubble-15.png'); ?>" alt="<?php echo esc_attr('bubble-15', 'vitax');?>"></li>
            <li class="shape shape-7"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'vitax');?>"></li>
        </ul>
    <?php } ?> 
</section>

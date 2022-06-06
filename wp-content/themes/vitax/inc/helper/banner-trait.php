<?php
/**
 * @author  bdwebteamtheme
 * @since   1.0
 * @version 1.0
 * @package vitax
 */
trait BannerTrait
{
 /** layout settings */
    public static function bdwebteam_layout_settings()
    { 
     
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id = get_the_id();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'bdwebteam_page';
                    break;
                case 'post':
                    $themepfix = 'bdwebteam_single_post';
                    break;
                case 'bdwebteam_team':
                    $themepfix = 'bdwebteam_team_single';
                    break;
                case 'bdwebteam-projects':
                    $themepfix = 'bdwebteam_projects_single';
                    break;
                case 'bdwebteam_services':
                    $themepfix = 'bdwebteam_services_single';
                    break; 
                case 'bdwebteam-case-study':
                    $themepfix = 'bdwebteam_case_study_single';
                    break;               
                case 'product':
                    $themepfix = 'bdwebteam_products';
                    break;
                default:
                    $themepfix = 'bdwebteam_single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'bdwebteam_blog';
            }elseif (is_search()) {
                $themepfix = 'bdwebteam_blog';
            } elseif (is_post_type_archive("bdwebteam_team") || is_tax("bdwebteam_team_category")) {
                $themepfix = 'bdwebteam_team_archive';
            } elseif (is_post_type_archive("bdwebteam_services") || is_tax("bdwebteam_services_category")) {
                $themepfix = 'bdwebteam_services_archive';           
            } elseif (is_post_type_archive("bdwebteam-projects") || is_tax("bdwebteam-projects-category")) {
                $themepfix = 'bdwebteam_projects_archive'; 
            } elseif (is_post_type_archive("bdwebteam-case-study") || is_tax("bdwebteam-case-studies-cat")) {
                $themepfix = 'bdwebteam_case_study_archive';
            } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
                $themepfix = 'bdwebteam_shop';
            } else {
                $themepfix = 'bdwebteam_blog';
            }
        }
        return $themepfix;
    } 

    /**
     * @return array
     * Banner Layout
     */

    public static function bdwebteam_banner_layout()
    {
        $bdwebteam_options = Helper::bdwebteam_get_options();
        $size = 'full';
       
        $themepfix         = BDWEBTEAM__THEME_FIX;
        $condipfix         = Helper::bdwebteam_layout_settings();

        if (is_single() || is_page()) {

            $banner_style   = bdwebteam_get_acf_data('bdwebteam_select_banner_style');
            $banner_style   = (!empty($banner_style)) ? $banner_style : $bdwebteam_options[$condipfix . '_banner_template'];

            $sub_title        = bdwebteam_get_acf_data('bdwebteam_custom_sub_title');
            $sub_title        = ( empty( $sub_title ) ) ? $bdwebteam_options[$condipfix . '_subtitle'] : $sub_title;

            $banner_shape = bdwebteam_get_acf_data('bdwebteam_select_banner_shape');   
           
            $banner_shape_id = isset($bdwebteam_options[$condipfix . '_banner_img']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_img']['id']) ? $bdwebteam_options[$condipfix . '_banner_img']['id'] : "";


            $banner_shape = (!empty($banner_shape)) ? $banner_shape : $banner_shape_id ;

            if ( !empty($banner_shape)) {
                $thumbnail_url = wp_get_attachment_image_src( $banner_shape, $size );
                $banner_shape = $thumbnail_url[0];
            } else {
                $banner_shape =  $bdwebteam_options[$condipfix . '_banner_shape']['url'];
            }

            $banner_shape2 = bdwebteam_get_acf_data('bdwebteam_select_banner_shape2');   
             $banner_shape2_id = isset($bdwebteam_options[$condipfix . '_banner_shape2']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_shape2']['id']) ? $bdwebteam_options[$condipfix . '_banner_shape2']['id'] : "";

            $banner_shape2 = (!empty($banner_shape2)) ? $banner_shape2 : $banner_shape2_id;

            if ( !empty($banner_shape2)) {
                $thumbnail_url2 = wp_get_attachment_image_src( $banner_shape2, $size );
                $banner_shape2 = $thumbnail_url2[0];
            } else {
                $banner_shape2 =  $bdwebteam_options[$condipfix . '_banner_shape2']['url'];
            }
           
            $banner_img = bdwebteam_get_acf_data('bdwebteam_select_banner_img');   

            $banner_id = isset($bdwebteam_options[$condipfix . '_banner_img']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_img']['id']) ? $bdwebteam_options[$condipfix . '_banner_img']['id'] : "";

            $banner_img = (!empty($banner_img)) ? $banner_img : $banner_id;
            $image_alt = get_post_meta($banner_img, '_wp_attachment_image_alt', TRUE);


            if ( !empty($banner_img)) {
                $thumbnail_url = wp_get_attachment_image_src( $banner_img, $size );
                $banner_img = $thumbnail_url[0];
            } else {
                $banner_img =  $bdwebteam_options[$condipfix . '_banner_img']['url'];
            }
            $banner_img   = empty( $banner_img ) ? Helper::get_img( 'banner/banner-thumb-3.png' ) :$banner_img;
            
             $breadcrumbs = bdwebteam_get_acf_data('bdwebteam_breadcrumbs_enable');
             $breadcrumbs = (!empty($breadcrumbs)) ? $breadcrumbs : $bdwebteam_options[$condipfix . '_breadcrumb_enable'];
            
             $banner_area = bdwebteam_get_acf_data('bdwebteam_title_wrapper_show');
             $banner_area = (!empty($banner_area)) ? $banner_area : $bdwebteam_options[$condipfix . '_banner_enable'];

        } elseif (is_home() || is_archive() || is_search() || is_404()) {       
            
            $sub_title    =  $bdwebteam_options[$condipfix . '_subtitle'];
           
           $banner_img = isset($bdwebteam_options[$condipfix . '_banner_img']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_img']['id']) ? $bdwebteam_options[$condipfix . '_banner_img']['id'] : "";
           $banner_shape = isset($bdwebteam_options[$condipfix . '_banner_shape']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_shape']['id']) ? $bdwebteam_options[$condipfix . '_banner_shape']['id'] : "";
 
            $image_alt = get_post_meta($banner_img, '_wp_attachment_image_alt', TRUE);
            if ( !empty($banner_shape)) {
            $thumbnail_url = wp_get_attachment_image_src( $banner_shape, $size );
            $banner_shape = $thumbnail_url[0];
            } else {
                $banner_shape =  $bdwebteam_options[$condipfix . '_banner_shape']['url'];
            }

            if ( !empty($banner_img)) {
            $thumbnail_url = wp_get_attachment_image_src( $banner_img, $size );
                $banner_img = $thumbnail_url[0];
            } else {
                $banner_img =  $bdwebteam_options[$condipfix . '_banner_img']['url'];
            }
           
            $breadcrumbs = $bdwebteam_options[$condipfix . '_breadcrumb_enable'];
            $banner_area = $bdwebteam_options[$condipfix . '_banner_enable'];
            $banner_style = $bdwebteam_options[$condipfix . '_banner_template']; 
 
            $banner_shape2 = isset($bdwebteam_options[$condipfix . '_banner_shape2']['id']) && !empty($bdwebteam_options[$condipfix . '_banner_shape2']['id']) ? $bdwebteam_options[$condipfix . '_banner_shape2']['id'] : "";
            
            if ( !empty($banner_shape2)) {
                $thumbnail_url2 = wp_get_attachment_image_src( $banner_shape2, $size );
                $banner_shape2 = $thumbnail_url2[0];
            }else {
                $banner_shape2 =  $bdwebteam_options[$condipfix . '_banner_shape2']['url'];
            } 

        } 

        $banner_layout = [
            'banner_area'   => $banner_area,           
            'banner_img'    => $banner_img,
            'sub_title'     => $sub_title,
            'breadcrumbs'   => $breadcrumbs,
            'banner_shape'  => $banner_shape,
            'banner_style'  => $banner_style,
            'banner_shape2'  => $banner_shape2,
            'image_alt'  => $image_alt,
        ];

        return $banner_layout;

    }
    
}



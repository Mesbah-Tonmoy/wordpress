<?php

/**
 * @author  bdwebteamtheme
 * @since   1.0
 * @version 1.0
 * @package vitax
 */
trait LayoutTrait
{

    public static function get_sidebar_http_options(){
          if ( isset( $_GET['sidebar'] ) ) {
            if ( $_GET['sidebar'] == 'left' ) {
                $layout  = 'left-sidebar';
            }
            if ( $_GET['sidebar'] == 'right' ) {
               $layout = 'right-sidebar';
            }
            if ( $_GET['sidebar'] == 'full' ) {
                $layout = 'full-width';
            }
              return $layout;
       
        }
    }

    public static function bdwebteam_left_get_sidebar()
    {
        $layout_abj = Helper::bdwebteam_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'left-sidebar') {
            get_sidebar();
        }
        return;
    }

    public static function bdwebteam_right_get_sidebar()
    {
        $layout_abj = Helper::bdwebteam_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'right-sidebar') {
            get_sidebar();
        }
        return;
    }

    /**
     * @return array
     * Header Layout
     */
    public static function bdwebteam_header_layout()
    {
        $vitax_options = Helper::bdwebteam_get_options();
        $themepfix = BDWEBTEAM__THEME_FIX;

        /**
         * Get Page Options value
         */
        if(class_exists('ACF')){
            $header_area = get_field($themepfix .  '_show_header');
            $header_style = get_field( $themepfix . "_select_header_style");
            $header_sticky = get_field( $themepfix . "_header_sticky");
           
        }

        /**
         * Set Condition
         */
        $header_area = (empty($header_area)) ? $vitax_options['bdwebteam_enable_header'] : $header_area;
        $header_style = (empty($header_style) ||  $header_style == "0") ? $vitax_options['bdwebteam_select_header_template'] : $header_style;
        $header_sticky = (empty($header_sticky)) ? $vitax_options['bdwebteam_header_sticky'] : $header_sticky;
       
        /**
         * Load Value
         */
        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,
           
        ];
        return $header_layout;

    }


    /**
     * @return array
     * Header Layout
     */
    public static function bdwebteam_header_button_layout()
    {
        $vitax_options = Helper::bdwebteam_get_options();
        $themepfix = 'bdwebteam';

        /**
         * Get Page Options value
         */
        if(class_exists('ACF')){
            $shopping_cart = bdwebteam_get_acf_data($themepfix .  '_shopping_cart');
            $offcanvas_button = bdwebteam_get_acf_data( $themepfix . "_enable_offcanvas_button");
            $header_button = bdwebteam_get_acf_data( $themepfix . "_header_button");           
            $header_button_url = bdwebteam_get_acf_data( $themepfix . "_header_button_url");           
        }

        /**
         * Set Condition
         */
        $shopping_cart = (empty($shopping_cart)) ? $vitax_options['minicart_icon'] : $shopping_cart;
        $offcanvas_button = (empty($offcanvas_button)) ? $vitax_options['bdwebteam_enable_offcanvas'] : $offcanvas_button;
        $header_button = (empty($header_button)) ? $vitax_options['bdwebteam_enable_button'] : $header_button;
        $header_button_url = (empty($header_button_url)) ? $vitax_options['button_url'] : $header_button_url;
       
       
        /**
         * Load Value
         */
        $header_button_layout = [
            'shopping_cart' => $shopping_cart,
            'offcanvas_button' => $offcanvas_button,
            'header_button' => $header_button,
            'header_button_url' => $header_button_url,
           
        ];
        return $header_button_layout;

    }

    /**
     * @return array
     * Header Top Layout
     */
    public static function bdwebteam_header_top_layout()
    {
        $vitax_options = Helper::bdwebteam_get_options();
        $themepfix = BDWEBTEAM__THEME_FIX;

        /**
         * Get Page Options value
         */
        if(class_exists('ACF')){
            $header_area = bdwebteam_get_acf_data($themepfix .  '_show_header');
            $header_style = bdwebteam_get_acf_data( $themepfix . "_select_header_style");
            $header_sticky = bdwebteam_get_acf_data( $themepfix . "_header_sticky");
            
        } 

        /**
         * Set Condition
         */
        $header_top_area = (empty($header_top_area)) ? $vitax_options['bdwebteam_header_top_enable'] : $header_top_area;
        $header_top_style = (empty($header_top_style) ||  $header_top_style == "0") ? $vitax_options['bdwebteam_select_header_top_template'] : $header_top_style;

        /**
         * Load Value
         */
        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,
            
        ];
        return $header_layout;

    }

    /**
     * @return array
     * Footer Layout
     */
    public static function bdwebteam_footer_layout()
    {
        $vitax_options = Helper::bdwebteam_get_options();

        /**
         * Get Page Options value
         */
        $footer_area = bdwebteam_get_acf_data('bdwebteam_show_footer');
       $footer_style = bdwebteam_get_acf_data('bdwebteam_select_footer_style');

        /**
         * Set Condition
         */
        $footer_area = (empty($footer_area)) ? $vitax_options['bdwebteam_footer_enable'] : $footer_area;
        $footer_style = (empty($footer_style) ||  $footer_style == "0") ? $vitax_options['bdwebteam_select_footer_template'] : $footer_style;

        /**
         * Load Value
         */
        $footer_layout = [
            'footer_area' => $footer_area,
            'footer_style' => $footer_style,
        ];
        return $footer_layout;

    }

    /**
    * @return array
    * Footer Layout
    */
    public static function bdwebteam_shop_notification_enable()
    {
        $vitax_options = Helper::bdwebteam_get_options();

        /**
         * Get Page Options value
         */
        $bdwebteam_shop_notification_enable = bdwebteam_get_acf_data('bdwebteam_shop_notification_enable');    

        /**
         * Set Condition
         */
        $bdwebteam_shop_notification_enable = (empty($bdwebteam_shop_notification_enable)) ? $vitax_options['bdwebteam_shop_notification_enable'] : $bdwebteam_shop_notification_enable;
      
        /**
         * Load Value
         */
        $bdwebteam_shop_notification_enable = [
            'shop_notification' => $bdwebteam_shop_notification_enable,            
        ];
        return $bdwebteam_shop_notification_enable;
    }

    /**
     * @return array
     * Footer Layout
     */
    public static function bdwebteam_post_banner_style()
    {
        $vitax_options = Helper::bdwebteam_get_options();

        /**
         * Get Page Options value
         */
        $post_banner_style = bdwebteam_get_acf_data('select_banner_style');
        $bdwebteam_single_post_style = (isset($vitax_options['bdwebteam_single_post_style'])) ? $vitax_options['bdwebteam_single_post_style'] : "";

        /**
         * Set Condition
         */
        $post_banner_style = (empty($post_banner_style) ||  $post_banner_style == "0") ? $bdwebteam_single_post_style : $post_banner_style;

        /**
         * Load Value
         */
        $post_banner_layout = [
            'post_banner_style' => $post_banner_style,
        ];
        return $post_banner_layout;

    }    

 
    /**
     * @return array
     * Footer Layout
     */ 

    public static function bdwebteam_footer_top_layout()
    {
        $bdwebteam_options = Helper::bdwebteam_get_options();

        /**
         * Get Page Options value
         */
        $footer_top_area = bdwebteam_get_acf_data('bdwebteam_show_footer_top');

        $footer_top_style = bdwebteam_get_acf_data('bdwebteam_select_footer_top_style');
        $bdwebteam_footer_top_style =  $bdwebteam_options['bdwebteam_select_footer_top_template'];

        /**
         * Set Condition
         */
        $footer_top_style = (empty($footer_top_style) ||  $footer_top_style == "0") ? $bdwebteam_footer_top_style : $footer_top_style;
        /**
         * Set Condition
         */
        $footer_top_area = ( empty( $footer_top_area ) ) ? $bdwebteam_options['bdwebteam_footer_top_enable'] : $footer_top_area;

        /**
         * Load Value
         */
        $footer_top_layout = [
            'footer_top_area' => $footer_top_area,
            'footer_top_style' => $footer_top_style,
        ];
        return $footer_top_layout;

    }
 

    // Sidebar
    public static function bdwebteam_sidebar_options()
    {

        $vitax_options = Helper::bdwebteam_get_options();

        /**
         * Get Page Options value
         */
        $select_sidebar = bdwebteam_get_acf_data('select_sidebar');

        /**
         * Set Condition
         */
        $sidebar = (empty($select_sidebar) ||  $select_sidebar == "0") ? $vitax_options['bdwebteam_single_pos'] : $select_sidebar;

        return $sidebar;

    }

    // Menu Option
    public static function bdwebteam_logos()
    {
        $vitax_options = self::bdwebteam_get_options();
        // Logo
        $bdwebteam_dark_logo = empty($vitax_options['logo']['url']) ? self::get_img('logo-black.svg') : $vitax_options['logo']['url'];
        $bdwebteam_light_logo = empty($vitax_options['logo_light']['url']) ? self::get_img('logo-white.svg') : $vitax_options['logo_light']['url'];
        $bdwebteam_logo_symbol = empty($vitax_options['logo_symbol']['url']) ? self::get_img('logo-symbol.svg') : $vitax_options['logo_symbol']['url'];

        $menu_option = [
            'bdwebteam_dark_logo' => $bdwebteam_dark_logo,
            'bdwebteam_light_logo' => $bdwebteam_light_logo,
            'bdwebteam_logo_symbol' => $bdwebteam_logo_symbol
        ];
        return $menu_option;
    }

    // Page layout style
    public static function bdwebteam_layout_style()
    {
        $themepfix = BDWEBTEAM__THEME_FIX;
        $vitax_options = self::bdwebteam_get_options();
        $condipfix = self::layout_settings();

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $vitax_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $vitax_options[$condipfix . "_layout"] : $layout;
        }

        return $layout;
    }

    // layout style
    public static function bdwebteam_layout_style_all()
    {
        $themepfix = BDWEBTEAM__THEME_FIX;
        $vitax_options = self::bdwebteam_get_options();
        $condipfix = self::layout_settings();
        $sidebar 	= Helper::bdwebteam_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 bdwebteam-main' : 'col-xl-12 bdwebteam-main';

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $vitax_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $vitax_options[$condipfix . "_layout"] : $layout;
        }


        if ( isset( $_GET['sidebar'] ) ) {
            if ( $_GET['sidebar'] == 'left' ) {
                $layout  = 'left-sidebar';
            }
            if ( $_GET['sidebar'] == 'right' ) {
               $layout = 'right-sidebar';
            }
            if ( $_GET['sidebar'] == 'full' ) {
                $layout = 'full-width';
            }
        }

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-item';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-12';
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    // layout style
    public static function bdwebteam_layout_custom_taxonomy()
    {
        $vitax_options = self::bdwebteam_get_options();
        $condipfix = self::layout_settings();
        $layout = $vitax_options[$condipfix . "_layout"];
        $sidebar 	= Helper::bdwebteam_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 bdwebteam-main' : 'col-xl-12 bdwebteam-main';

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-4';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-lg-6';
        }

        if ( isset( $_GET['sidebar'] ) ) {
            if ( $_GET['sidebar'] == 'left' ) {
                $layout  = 'left-sidebar';
            }
            if ( $_GET['sidebar'] == 'right' ) {
               $layout = 'right-sidebar';
            }
            if ( $_GET['sidebar'] == 'full' ) {
                $layout = 'full-width';
            }
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout ; 
         }

    /**  Footer Options */
    public static function bdwebteam_active_footer()
    {
        $vitax_options = Helper::bdwebteam_get_options();
        if (!$vitax_options['footer_area']) {
            return false;
        }
        $footer_column = $vitax_options['footer_column'];
        for ($i = 1; $i <= $footer_column; $i++) {
            if (is_active_sidebar('footer-' . $i)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Custom Sidebar
     */
    public static function get_custom_sidebar_fields()
    {
         $themepfix = 'vitax';
        $sidebar_fields = array();
        $sidebar_fields['sidebar'] = esc_html__('Sidebar', 'vitax');
        $sidebar_fields['widgets-shop'] = esc_html__('shop', 'vitax');
        $sidebars = get_option("{$themepfix}_custom_sidebars", array());
        if ($sidebars) {
            foreach ($sidebars as $sidebar) {
                $sidebar_fields[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_fields;
    }
  
   /**
     * @return array
     * Banner Layout
     */
    public static function bdwebteam_banner_info()
    {
        $bdwebteam_options = Helper::bdwebteam_get_options();
        $size = 'full';

        $banner_area = bdwebteam_get_acf_data('tv_title_wrapper_show');
        $banner_area = (!empty($banner_area)) ? $banner_area : $bdwebteam_options[$condipfix . '_banner_enable'];

        $condipfix         = Helper::bdwebteam_layout_settings();  
        $sub_title        = bdwebteam_get_acf_data('bdwebteam_custom_sub_title');
        $sub_title        = ( empty( $sub_title ) ) ? $bdwebteam_options[$condipfix . '_subtitle'] : $sub_title;

        $banner_img = bdwebteam_get_acf_data('bdwebteam_select_banner_img');   
        $banner_img = (!empty($banner_img)) ? $banner_img : $bdwebteam_options[$condipfix . '_banner_img']['id'];
        if ( !empty($banner_img)) {
            $thumbnail_url = wp_get_attachment_image_src( $banner_img, $size );
            $banner_img = $thumbnail_url[0];
        } else {
            $banner_img =  $bdwebteam_options[$condipfix . '_banner_img']['url'];
        }
        $banner_img        = "background-image:url({$banner_img});";        
        $breadcrumbs = bdwebteam_get_acf_data('bdwebteam_breadcrumbs_enable');        
        $breadcrumbs = (!empty($breadcrumbs)) ? $breadcrumbs : $bdwebteam_options[$condipfix . '_breadcrumb_enable'];

        $banner_layout = [
            'banner_area'   => $banner_area,           
            'banner_img'    => $banner_img,
            'sub_title'     => $sub_title,
            'breadcrumbs'   => $breadcrumbs,
        ];

        return $banner_layout;

    }
 
    /** layout settings */
    public static function layout_settings()
    {
        if (is_single() || is_page()) {
            $post_type = get_post_type();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                    break;
                case 'post':
                    $themepfix = 'single_post';
                    break;
                default:
                    $themepfix = 'single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'author';
            } elseif (is_search()) {
                $themepfix = 'search';
            } elseif (is_post_type_archive("team") || is_tax("team_category")) {
                $themepfix = 'team_archive';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }
    
    public static function bdwebteam_pagination( $max_num_pages = false ) {
        global $wp_query;

        $max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
        $max = intval( $max );

        /** Stop execution if there's only 1 page */
        if( $max <= 1 ) return;

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

        /** Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
        include BDWEBTEAM__FREAMWORK_DIRECTORY . 'pagination.php';
    }
  
}
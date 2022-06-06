<?php
/**
 * vitax functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vitax
 */

define('BDWEBTEAM__THEME_URI', get_template_directory_uri());
define('BDWEBTEAM__THEME_DIR', get_template_directory());
define('BDWEBTEAM__CSS_URL', get_template_directory_uri() . '/assets/css/');
define('BDWEBTEAM__JS_URL', get_template_directory_uri() . '/assets/js/');
define('BDWEBTEAM__ADMIN_CSS_URL', get_template_directory_uri() . '/assets/admin/css/');
define('BDWEBTEAM__ADMIN_JS_URL', get_template_directory_uri() . '/assets/admin/js/');
define('BDWEBTEAM__FREAMWORK_DIRECTORY', BDWEBTEAM__THEME_DIR . '/inc/');
define('BDWEBTEAM__FREAMWORK_HELPER', BDWEBTEAM__THEME_DIR . '/inc/helper/');
define('BDWEBTEAM__FREAMWORK_OPTIONS', BDWEBTEAM__THEME_DIR . '/inc/options/');
define('BDWEBTEAM__FREAMWORK_CUSTOMIZER', BDWEBTEAM__THEME_DIR . '/inc/customizer/');
define('BDWEBTEAM__THEME_FIX', 'bdwebteam');
define('BDWEBTEAM__FREAMWORK_LAB', BDWEBTEAM__THEME_DIR . '/inc/lab/');
define('BDWEBTEAM__FREAMWORK_TP', BDWEBTEAM__THEME_DIR . '/template-parts/');
define('BDWEBTEAM__IMG_URL', BDWEBTEAM__THEME_URI . '/assets/images/');
define('BDWEBTEAM__WOOCMMERCE', BDWEBTEAM__THEME_DIR . '/woocommerce/custom/');

do_action( 'vitax_theme_init' );


$bdwebteam_theme_data = wp_get_theme();
define('BDWEBTEAM__VERSION', (WP_DEBUG) ? time() : $bdwebteam_theme_data->get('Version'));

if (!function_exists('vitax_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function vitax_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on vitax, use a find and replace
         * to change 'vitax' to the name of your theme in all the template files.
         */
        load_theme_textdomain('vitax', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary'       => esc_html__('Primary', 'vitax'),
            'offcanvas'     => esc_html__('Offcanvas Menu', 'vitax'),             
            'footerbottom' => esc_html__('Footer Bottom Menu (No depth supported)', 'vitax'),
            
           
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */    
       
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Post Format
         */
         add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );
        add_editor_style( array( 'style-editor.css', bdwebteam_fonts_url() ) );
        add_theme_support('responsive-embeds');
        add_theme_support('wp-block-styles');
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
        add_theme_support( 'vitax' );
         remove_theme_support( 'widgets-block-editor' );
        // for gutenberg support
        add_theme_support( 'align-wide' );

        // Editor color palette.

        $black     = '#000000';
        $dark_gray = '#28303D';
        $gray      = '#39414D';
        $green     = '#D1E4DD';
        $blue      = '#D1DFE4';
        $purple    = '#D1D1E4';
        $red       = '#E4D1D1';
        $orange    = '#E4DAD1';
        $yellow    = '#EEEADD';
        $white     = '#FFFFFF';
        

        add_theme_support( 'editor-color-palette', array(
            array(
                'name' => esc_html__( 'Primary', 'vitax' ),
                'slug' => 'vitax-primary',
                'color' => '#5956E9',
            ),
            array(
                'name' => esc_html__( 'Secondary', 'vitax' ),
                'slug' => 'vitax-secondary',
                'color' => '#6865FF',
            ),
            array(
                'name' => esc_html__( 'Tertiary', 'vitax' ),
                'slug' => 'vitax-tertiary',
                'color' => '#C75C6F',
            ),
            array(
                'name' => esc_html__( 'White', 'vitax' ),
                'slug' => 'vitax-white',
                'color' => '#ffffff',
            ),
            array(
                'name' => esc_html__( 'Dark', 'vitax' ),
                'slug' => 'vitax-dark',
                'color' => '#27272E',
            ),
        ) );

        add_theme_support( 'editor-font-sizes', array(
            array(
                'name' => esc_html__( 'Small', 'vitax' ),
                'size' => 12,
                'slug' => 'small'
            ),
            array(
                'name' => esc_html__( 'Normal', 'vitax' ),
                'size' => 16,
                'slug' => 'normal'
            ),
            array(
                'name' => esc_html__( 'Large', 'vitax' ),
                'size' => 36,
                'slug' => 'large'
            ),
            array(
                'name' => esc_html__( 'Huge', 'vitax' ),
                'size' => 50,
                'slug' => 'huge'
            )
        ) );

        add_theme_support(
            'editor-gradient-presets',
            array(
                array(
                    'name'     => esc_html__( 'Purple to yellow', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
                    'slug'     => 'purple-to-yellow',
                ),
                array(
                    'name'     => esc_html__( 'Yellow to purple', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
                    'slug'     => 'yellow-to-purple',
                ),
                array(
                    'name'     => esc_html__( 'Green to yellow', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
                    'slug'     => 'green-to-yellow',
                ),
                array(
                    'name'     => esc_html__( 'Yellow to green', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
                    'slug'     => 'yellow-to-green',
                ),
                array(
                    'name'     => esc_html__( 'Red to yellow', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
                    'slug'     => 'red-to-yellow',
                ),
                array(
                    'name'     => esc_html__( 'Yellow to red', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
                    'slug'     => 'yellow-to-red',
                ),
                array(
                    'name'     => esc_html__( 'Purple to red', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
                    'slug'     => 'purple-to-red',
                ),
                array(
                    'name'     => esc_html__( 'Red to purple', 'vitax' ),
                    'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
                    'slug'     => 'red-to-purple',
                ),
            )
        );


        /**
         * Add Custom Image Size
         */

        add_image_size('bdwebteam-single-blog-thumb', 1600, 750, true); // blog single  
        add_image_size('bdwebteam-project-lg', 610, 460, true); 
        add_image_size('bdwebteam-project-vlg', 600, 700, true); 
        add_image_size('bdwebteam-thumbnail-sm', 100, 80, true);       
        add_image_size('bdwebteam-blog-sm', 300, 240, true);   
        add_image_size('bdwebteam-blog-md', 850, 450, true);
        add_image_size('bdwebteam-team-sm', 128, 128, true);

    }
endif;
add_action('after_setup_theme', 'vitax_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vitax_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('vitax_content_width', 640);
}

add_action('after_setup_theme', 'vitax_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "scripts.php");
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "wpshout-defer-scripts.php");

/**
 * Global Functions
 */
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "global-functions.php");

/**
 * Register Custom Widget Area
 */
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "widget-area-register.php");

/**
 * Register Custom Fonts
 */
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "register-custom-fonts.php");

/**
 * TGM
 */
require_once(BDWEBTEAM__FREAMWORK_DIRECTORY . "tgm-config.php");

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/underscore/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/underscore/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/underscore/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/underscore/jetpack.php';
}

/**
* Helper Template
*/
require_once(BDWEBTEAM__FREAMWORK_HELPER . "menu-area-trait.php");
require_once(BDWEBTEAM__FREAMWORK_HELPER . "layout-trait.php");
require_once(BDWEBTEAM__FREAMWORK_HELPER . "option-trait.php");
require_once(BDWEBTEAM__FREAMWORK_HELPER . "meta-trait.php");
require_once(BDWEBTEAM__FREAMWORK_HELPER . "banner-trait.php");

/**
* Helper
*/
require_once(BDWEBTEAM__FREAMWORK_HELPER . "helper.php");

/**
* Options
*/
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "theme/option-framework.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "page-options.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "post-format-options.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "user-extra-meta.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "menu-options.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "team-extra-meta.php");
require_once(BDWEBTEAM__FREAMWORK_OPTIONS . "post-format-options.php");

/**
* Customizer
*/
require_once(BDWEBTEAM__FREAMWORK_CUSTOMIZER . "color.php");

/**
* Lab
*/
require_once(BDWEBTEAM__FREAMWORK_LAB . "class-tgm-plugin-activation.php");

/**
* Nav Walker
*/
require_once(BDWEBTEAM__FREAMWORK_LAB . "aw-nav-menu-walker.php");
require_once(BDWEBTEAM__FREAMWORK_LAB . "aw-mobile-menu-walker.php");
require_once(BDWEBTEAM__FREAMWORK_TP . "title/breadcrumb.php");
require_once(BDWEBTEAM__FREAMWORK_LAB . "bdwebteam-post-views.php");

// WooCommerce
if (class_exists('WooCommerce')) {
    require_once(BDWEBTEAM__WOOCMMERCE . "wooc-functions.php");
    require_once(BDWEBTEAM__WOOCMMERCE . "wooc-hooks.php");
}

add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

add_action( 'elementor/frontend/after_register_styles',function() {
foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
wp_deregister_style( 'elementor-icons-fa-' . $style );
}
}, 20 );

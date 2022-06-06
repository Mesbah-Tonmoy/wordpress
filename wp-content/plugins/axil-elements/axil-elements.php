<?php
/*
Plugin Name: Bdwebteam Elements
Plugin URI: https://www.bdwebteamtheme.com
Description: Bdwebteam Elements Plugin for vitax Theme
Version: 1.2.2
Author: BdwebteamTheme
Author URI: https://www.bdwebteamtheme.com
*/

if (!defined('ABSPATH')) exit;

if (!defined('VITAX_ELEMENTS')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'));
    define('VITAX_ELEMENTS', $plugin_data['version']);
    define('VITAX_ELEMENTS_SCRIPT_VER', (WP_DEBUG) ? time() : VITAX_ELEMENTS);
    define('VITAX_ELEMENTS_THEME_PREFIX', 'bdwebteam-elements');
    define('VITAX_PT_PREFIX', 'bdwebteam');
    define('VITAX_ELEMENTS_BASE_DIR', plugin_dir_path(__FILE__)); 
    defined('VITAX_ELEMENTS_ACTIVED') or define('VITAX_ELEMENTS_ACTIVED', (bool) function_exists('WC'));
    define('VITAX_ELEMENTS_BASE_URL', plugins_url('/', __FILE__));
}

class vitax_elements
{

    public $plugin = 'bdwebteam-elements';
    public $action = 'vitax_theme_init';
    protected static $instance;

    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'load_textdomain'), 20);
        add_action($this->action, array($this, 'after_theme_loaded'));
       
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function after_theme_loaded()
    {
       
        require_once VITAX_ELEMENTS_BASE_DIR . 'lib/wp-svg/init.php'; 
        require_once VITAX_ELEMENTS_BASE_DIR . 'lib/navmenu-icon/init.php';
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/custom-post.php');
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/social-share.php');
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/widgets/custom-widget-register.php');
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/allow-svg.php');        
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/sidebar-generator.php');       
        include_once(VITAX_ELEMENTS_BASE_DIR. '/include/common-functions.php');        
        if (did_action('elementor/loaded')) {
            require_once VITAX_ELEMENTS_BASE_DIR . 'elementor/init.php';
            require_once VITAX_ELEMENTS_BASE_DIR . 'elementor/helper.php'; 
        }

    }
    
    public function load_textdomain()
    {
        load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
}

vitax_elements::instance();

/**
 * Escapeing
 */
if ( !function_exists('bdwebteam_escapeing')) {
    function bdwebteam_escapeing($html){
        return $html;
    }
}

function vitax_enqueue_editor_scripts(){

    wp_enqueue_style('vitax-element-addons-editor', VITAX_ELEMENTS_BASE_URL . 'assets/css/editor.css', null, '1.0');
    
}
add_action( 'elementor/editor/after_enqueue_scripts', 'vitax_enqueue_editor_scripts');
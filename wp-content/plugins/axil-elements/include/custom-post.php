<?php
include_once( VITAX_ELEMENTS_BASE_DIR . '/include/custom-post-type-base.php');
/**
 * Megamenu
 */
$megamenu_args = array(
    'menu_icon' => 'dashicons-editor-kitchensink'
);
//$megamenu = new Bdwebteam_Register_Custom_Post_Type( 'Megamenu', 'Mega Menus', $megamenu_args);

add_action('init', 'register_bdwebteam_team_postype');
function register_bdwebteam_team_postype()
    {
    $prefix             = VITAX_PT_PREFIX;

        $bdwebteam_options           = Helper::bdwebteam_get_options();

    $team_slug          = ( !empty($bdwebteam_options['team_slug']) )? $bdwebteam_options['team_slug'] :'team';
    $team_cat_slug      = ( !empty($bdwebteam_options['team_cat_slug']) )? $bdwebteam_options['team_cat_slug'] :'team-cat';

    $labels = array(
        'name'                  => esc_html__('Team',                   'bdwebteam-elements'),
        'singular_name'         => esc_html__('Team',                   'bdwebteam-elements'),
        'add_new'               => esc_html__('Add New',                'bdwebteam-elements'),
        'add_new_item'          => esc_html__('Add New Team',           'bdwebteam-elements'),
        'edit_item'             => esc_html__('Edit Team',              'bdwebteam-elements'),
        'new_item'              => esc_html__('New Team',               'bdwebteam-elements'),
        'view_item'             => esc_html__('View Team',              'bdwebteam-elements'),
        'search_items'          => esc_html__('Search Team',            'bdwebteam-elements'),
        'not_found'             => esc_html__('No Team found',          'bdwebteam-elements'),
        'not_found_in_trash'    => esc_html__('No Team found in Trash', 'bdwebteam-elements'),
        'parent_item_colon'     => ''
    );
    
    register_post_type("{$prefix}_team", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false,   
        'show_in_rest'          => true, // To use Gutenberg editor.    
        'menu_position'         => 10,
        'menu_icon'             => 'dashicons-universal-access-alt',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),        
        'rewrite'               => array( 'slug' => esc_html__($team_slug , 'bdwebteam-elements' )),
    ));

    $labels = array(
        'name'              => _x( 'Team Categories', 'team categories',            'bdwebteam-elements' ),
        'singular_name'     => _x( 'Team Category', 'team category',                'bdwebteam-elements' ),
        'search_items'      => esc_html__('Search Team Categories' ,                'bdwebteam-elements'),
        'all_items'         => esc_html__('All Team Categories' ,                   'bdwebteam-elements'),
        'parent_item'       => esc_html__('Parent Team Category' ,                  'bdwebteam-elements'),
        'parent_item_colon' => esc_html__('Parent Team Category:' ,                 'bdwebteam-elements'),
        'edit_item'         => esc_html__('Edit Team Category' ,                    'bdwebteam-elements'),
        'update_item'       => esc_html__('Update Team Category' ,                  'bdwebteam-elements'),
        'add_new_item'      => esc_html__('Add New Team Category' ,                 'bdwebteam-elements'),
        'new_item_name'     => esc_html__('New Team Category Name' ,                'bdwebteam-elements'),
        'menu_name'         => esc_html__('Category' ,                         'bdwebteam-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
       
        'rewrite'           => array( 'slug' => $team_cat_slug  ),

    );
    register_taxonomy( "{$prefix}_team_category", array( "{$prefix}_team" ), $args );    
}

add_action('init', 'register_bdwebteam_service_postype');
function register_bdwebteam_service_postype()
    {
    $prefix                     = VITAX_PT_PREFIX;
        $bdwebteam_options           = Helper::bdwebteam_get_options();
    $service_slug               = (!empty($bdwebteam_options['services_slug']))? $bdwebteam_options['services_slug'] :'services';
    $service_cat_slug           = (!empty($bdwebteam_options['services_cat_slug']))? $bdwebteam_options['services_cat_slug'] :'services-cat'; 

    $labels = array(
        'name'                  => esc_html__('Services',                   'bdwebteam-elements'),
        'singular_name'         => esc_html__('Services',                   'bdwebteam-elements'),
        'add_new'               => esc_html__('Add New',                    'bdwebteam-elements'),
        'add_new_item'          => esc_html__('Add New Services',           'bdwebteam-elements'),
        'edit_item'             => esc_html__('Edit Services',              'bdwebteam-elements'),
        'new_item'              => esc_html__('New Services',               'bdwebteam-elements'),
        'view_item'             => esc_html__('View Services',              'bdwebteam-elements'),
        'search_items'          => esc_html__('Search Services',            'bdwebteam-elements'),
        'not_found'             => esc_html__('No Services found',          'bdwebteam-elements'),
        'not_found_in_trash'    => esc_html__('No Services found in Trash', 'bdwebteam-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}_services", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'menu_position'         => 11,
        'menu_icon'             => 'dashicons-list-view',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array( 'slug' => esc_html__($service_slug , 'bdwebteam-elements' )),
    ));
    $labels = array(
        'name'              => _x( 'Services Categories', 'services categories',        'bdwebteam-elements' ),
        'singular_name'     => _x( 'Services Category', 'services category',            'bdwebteam-elements' ),
        'search_items'      => esc_html__('Search Services Categories' ,                'bdwebteam-elements'),
        'all_items'         => esc_html__('All Services Categories' ,                   'bdwebteam-elements'),
        'parent_item'       => esc_html__('Parent Services Category' ,                  'bdwebteam-elements'),
        'parent_item_colon' => esc_html__('Parent Services Category:' ,                 'bdwebteam-elements'),
        'edit_item'         => esc_html__('Edit Services Category' ,                    'bdwebteam-elements'),
        'update_item'       => esc_html__('Update Services Category' ,                  'bdwebteam-elements'),
        'add_new_item'      => esc_html__('Add New Services Category' ,                 'bdwebteam-elements'),
        'new_item_name'     => esc_html__('New Services Category Name' ,                'bdwebteam-elements'),
        'menu_name'         => esc_html__('Category' ,                         'bdwebteam-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $service_cat_slug  ),
    );
    register_taxonomy( "{$prefix}_services_category", array( "{$prefix}_services" ), $args );    
}

add_action('init', 'register_bdwebteam_projects_postype');

function register_bdwebteam_projects_postype()
    {
    $prefix                     = VITAX_PT_PREFIX;
    $bdwebteam_options           = Helper::bdwebteam_get_options();
    $projects_slug              = ( !empty($bdwebteam_options['project_slug']) )? $bdwebteam_options['project_slug'] :'projects';
    $projects_cat_slug          = ( !empty($bdwebteam_options['projects_cat_slug']) )? $bdwebteam_options['projects_cat_slug'] :'projects-cat';   

    $labels = array(
        'name'                  => esc_html__('Projects',                   'bdwebteam-elements'),
        'singular_name'         => esc_html__('Projects',                   'bdwebteam-elements'),
        'add_new'               => esc_html__('Add New',                    'bdwebteam-elements'),
        'add_new_item'          => esc_html__('Add New Projects',           'bdwebteam-elements'),
        'edit_item'             => esc_html__('Edit Projects',              'bdwebteam-elements'),
        'new_item'              => esc_html__('New Projects',               'bdwebteam-elements'),
        'view_item'             => esc_html__('View Projects',              'bdwebteam-elements'),
        'search_items'          => esc_html__('Search Projects',            'bdwebteam-elements'),
        'not_found'             => esc_html__('No Projects found',          'bdwebteam-elements'),
        'not_found_in_trash'    => esc_html__('No Projects found in Trash', 'bdwebteam-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}-projects", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'menu_position'         => 12,
        'menu_icon'             => 'dashicons-grid-view',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array('slug' => esc_html__($projects_slug , 'bdwebteam-elements')),
    ));
    $labels = array(
        'name'              => _x( 'Projects Categories', 'projects categories',        'bdwebteam-elements' ),
        'singular_name'     => _x( 'Projects Category', 'projects category',            'bdwebteam-elements' ),
        'search_items'      => esc_html__('Search Projects Categories' ,                'bdwebteam-elements'),
        'all_items'         => esc_html__('All Projects Categories' ,                   'bdwebteam-elements'),
        'parent_item'       => esc_html__('Parent Projects Category' ,                  'bdwebteam-elements'),
        'parent_item_colon' => esc_html__('Parent Projects Category:' ,                 'bdwebteam-elements'),
        'edit_item'         => esc_html__('Edit Projects Category' ,                    'bdwebteam-elements'),
        'update_item'       => esc_html__('Update Projects Category' ,                  'bdwebteam-elements'),
        'add_new_item'      => esc_html__('Add New Projects Category' ,                 'bdwebteam-elements'),
        'new_item_name'     => esc_html__('New Projects Category Name' ,                'bdwebteam-elements'),
        'menu_name'         => esc_html__('Category' ,                         'bdwebteam-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $projects_cat_slug  ),
    );
    register_taxonomy( "{$prefix}-projects-category", array( "{$prefix}-projects" ), $args );    
}



add_action('init', 'register_bdwebteam_case_studies_postype');

function register_bdwebteam_case_studies_postype()
    {
    $prefix                     = VITAX_PT_PREFIX;
    $bdwebteam_options               = Helper::bdwebteam_get_options();
    $case_studies_slug          = ( !empty( $bdwebteam_options['case_studies_slug']) )? $bdwebteam_options['case_studies_slug'] :'case-study';
    $case_studies_cat_slug      = ( !empty( $bdwebteam_options['case_studies_cat_slug']) )? $bdwebteam_options['case_studies_cat_slug'] :'case-study-cat';   

    $labels = array(
        'name'                  => esc_html__('Case Study',                   'bdwebteam-elements'),
        'singular_name'         => esc_html__('Case Study',                   'bdwebteam-elements'),
        'add_new'               => esc_html__('Add New',                    'bdwebteam-elements'),
        'add_new_item'          => esc_html__('Add New Case Study',           'bdwebteam-elements'),
        'edit_item'             => esc_html__('Edit Case Study',              'bdwebteam-elements'),
        'new_item'              => esc_html__('New Case Study',               'bdwebteam-elements'),
        'view_item'             => esc_html__('View Case Study',              'bdwebteam-elements'),
        'search_items'          => esc_html__('Search Case Study',            'bdwebteam-elements'),
        'not_found'             => esc_html__('No Case Study found',          'bdwebteam-elements'),
        'not_found_in_trash'    => esc_html__('No Case Study found in Trash', 'bdwebteam-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}-case-study", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'menu_position'         => 12,
        'menu_icon'             => 'dashicons-sos',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array('slug' => esc_html__($case_studies_slug , 'bdwebteam-elements')),
    ));
    $labels = array(
        'name'              => _x( 'Categories', 'case-study categories',        'bdwebteam-elements' ),
        'singular_name'     => _x( 'Categories', 'case-study category',            'bdwebteam-elements' ),
        'search_items'      => esc_html__('Search Case Study Categories' ,                'bdwebteam-elements'),
        'all_items'         => esc_html__('All Case Study Categories' ,                   'bdwebteam-elements'),
        'parent_item'       => esc_html__('Parent Case Study Categories' ,                  'bdwebteam-elements'),
        'parent_item_colon' => esc_html__('Parent Case Study Categories:' ,                 'bdwebteam-elements'),
        'edit_item'         => esc_html__('Edit Case Study Categories' ,                    'bdwebteam-elements'),
        'update_item'       => esc_html__('Update Case Study Categories' ,                  'bdwebteam-elements'),
        'add_new_item'      => esc_html__('Add New Case Study Categories' ,                 'bdwebteam-elements'),
        'new_item_name'     => esc_html__('New Case Study Categories Name' ,                'bdwebteam-elements'),
        'menu_name'         => esc_html__('Categories' ,                         'bdwebteam-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $case_studies_cat_slug ),
    );
    register_taxonomy( "{$prefix}-case-studies-cat", array( "{$prefix}-case-study" ), $args );    
}






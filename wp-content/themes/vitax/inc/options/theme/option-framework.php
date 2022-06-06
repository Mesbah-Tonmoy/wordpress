<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}
$opt_name = BDWEBTEAM__THEME_FIX . '_options';
$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Theme Options', 'vitax'),
    'page_title' => esc_html__('Theme Options', 'vitax'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin barff
    'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => BDWEBTEAM__THEME_FIX . '_options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => '&nbsp;',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'hide_expand' => true,
    // This variable determines if the ‘Expand Options’ buttons is visible on the options panel.
);

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'vitax'),
    'id' => 'bdwebteam_general',
    'icon' => 'el el-cog',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('General Setting', 'vitax'),
    'id' => 'bdwebteam-general-setting',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(
      

        array(
            'id' => 'active_dark_mode',
            'type' => 'switch',
            'title' => esc_html__('Switch to Dark Mode', 'vitax'),
            'on' => esc_html__('Yes', 'vitax'),
            'off' => esc_html__('No', 'vitax'),
            'default' => false,
        ),
        array(
            'id' => 'show_ld_switcher_form_user_end',
            'type' => 'switch',
            'title' => esc_html__('Enabled Dark/Light Switcher Form User End', 'vitax'),
            'on' => esc_html__('Enabled', 'vitax'),
            'off' => esc_html__('Disabled', 'vitax'),
            'default' => true,
        ),

        array(
            'id' => 'bdwebteam_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Select Logo Type', 'vitax'),
            'subtitle' => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work. (Note: Used when Transparent Header is enabled.)', 'vitax'),
            'options' => array(
                'image' => 'Image',
                'text' => 'Text',
            ),
            'default' => 'image',
        ),
        array(
            'id' => 'bdwebteam_light_head_logo',
            'title' => esc_html__('Default Light Logo', 'vitax'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'vitax'),
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'logo/logo.svg'
            ),
            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ), 

        array(
            'id' => 'bdwebteam_light_head_logo2',
            'title' => esc_html__('Default Light Logo 2', 'vitax'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'vitax'),
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'logo/logo-2.svg'
            ),
            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ),

        array(
            'id' => 'bdwebteam_dark_header_logo',
            'title' => esc_html__('Header Dark Logo', 'vitax'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'vitax'),
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'logo/logo-3.svg'
            ),
            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'bdwebteam_sticky_header_logo',
            'title' => esc_html__('Header sticky Logo', 'vitax'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'vitax'),
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'logo/logo-2.svg'
            ),
            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ),
       
        array(
            'id' => 'bdwebteam_logo_max_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Logo Height', 'vitax'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
            'width' => false,
            'output' => array(
                'max-height' => '.header-logo img'
            ),
            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'bdwebteam_logo_padding',
            'type' => 'spacing',
            'title' => esc_html__('Logo Padding', 'vitax'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the logo. (Note: Used when Transparent Header is enabled.)', 'vitax'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => 'px',
                'padding-right' => 'px',
                'padding-bottom' => 'px',
                'padding-left' => 'px',
                'units' => 'px',
            ),

            'output'         => array('.header-logo a, .menu-item.logo a'),

            'required' => array('bdwebteam_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'bdwebteam_logo_text',
            'type' => 'text',
            'required' => array('bdwebteam_logo_type', 'equals', 'text'),
            'title' => esc_html__('Site Title', 'vitax'),
            'subtitle' => esc_html__('Enter your site title here. (Note: Used when Transparent Header is enabled.)', 'vitax'),
            'default' => get_bloginfo('name')
        ),
        array(
            'id' => 'bdwebteam_logo_text_font',
            'type' => 'typography',
            'title' => esc_html__('Site Title Font Settings', 'vitax'),
            'required' => array('bdwebteam_logo_type', 'equals', 'text'),
            'google' => true,
            'subsets' => false,
            'line-height' => false,
            'text-transform' => true,
            'transition' => false,
            'text-align' => false,
            'preview' => false,
            'all_styles' => true,
            'output' => array('.header-logo a, .haeder-default .header-logo a'),
            'units' => 'px',
            'subtitle' => esc_html__('Controls the font settings of the site title. (Note: Used when Transparent Header is enabled.)', 'vitax'),
            'default' => array(
                'google' => true,
            )
        ),
        // End logo
        array(
            'id' => 'bdwebteam_scroll_to_top_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'vitax'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Yes', 'vitax'),
                'no' => esc_html__('No', 'vitax'),
            ),
            'default' => 'yes'
        ),
       
       

        array(
            'id' => 'bdwebteam_preloader_image',
            'type' => 'media',
            'title' => esc_html__('Preloader Image', 'vitax'),
            'subtitle' => esc_html__('Please upload your choice of preloader image. Transparent GIF format is recommended', 'vitax'),
            'default' => array(
                'url' => BDWEBTEAM__THEME_URI . '/assets/images/preloader.gif'
            ),
            'required' => array('bdwebteam_preloader', 'equals', 'yes')
        ),
     
        array(
                'id'            => 'services_slug',
                'type'          => 'text',
                'title'         => esc_html__('Service Slug',  'vitax'),
                'subtitle'      => esc_html__('Change the service url slug',  'vitax'),
                'default'       => 'services',
            ),     

            array(
                'id'            => 'services_cat_slug',
                'type'          => 'text',
                'title'         => esc_html__('Service Categories Slug',  'vitax'),
                'subtitle'      => esc_html__('Change the service Categories url slug',  'vitax'),
                'default'       => 'services-cat',
            ),

             array(
                'id' => 'project_slug',
                'type' => 'text',
                'title' => esc_html__('Project Slug',  'vitax'),
                'subtitle' => esc_html__('Change the project url slug',  'vitax'),
                'default' => 'projects',
            ),

             array(
                'id' => 'projects_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Projects Categories Slug',  'vitax'),
                'subtitle' => esc_html__('Change the projects Categories url slug',  'vitax'),
                'default' => 'projects-cat',
            ),           

             array(
                'id' => 'case_studies_slug',
                'type' => 'text',
                'title' => esc_html__('Case Study Slug',  'vitax'),
                'subtitle' => esc_html__('Change the Case Study url slug',  'vitax'),
                'default' => 'case-study',
            ),
             array(
                'id' => 'case_studies_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Case Study Categories Slug',  'vitax'),
                'subtitle' => esc_html__('Change the Case Study Categories url slug',  'vitax'),
                'default' => 'case-study-cat',
            ),             

            array(
                'id' => 'team_slug',
                'type' => 'text',
                'title' => esc_html__('Team Slug',  'vitax'),
                'subtitle' => esc_html__('Change the slug name',  'vitax'),
                'default' => 'team',
            ),      
            array(
                'id' => 'team_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Team Categories Slug',  'vitax'),
                'subtitle' => esc_html__('Change the Categories slug name',  'vitax'),
                'default' => 'team-cat',
            ),


    )
));



Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Contact & Socials', 'vitax'),
        'id' => 'socials_section',
        'heading' => esc_html__('Contact & Socials', 'vitax'),
        'subtitle' => esc_html__('In case you want to hide any field, just keep that field empty', 'vitax'),
        'icon' => 'el el-twitter',
        'subsection' => false,
        'fields' => array(
            array(
                'id' => 'address_field_title',
                'type' => 'text',
                'title' => esc_html__('Address Field Title', 'vitax'),
                'default' => esc_html__('Contact information', 'vitax'),
            ),
            array(
                'id' => 'address',
                'type' => 'textarea',
                'title' => esc_html__('Address', 'vitax'),
                'default' => esc_html__('Theodore Lowe, Ap #867-859 Sit Rd, Azusa New York', 'vitax'),
            ),
            array(
                'id' => 'call_now_field_title',
                'type' => 'text',
                'title' => esc_html__('Call Now Field Title', 'vitax'),
                'default' => esc_html__('We are available 24/ 7. Call Now.', 'vitax'),
            ),
            array(
                'id' => 'phone',
                'type' => 'text',
                'title' => esc_html__('Phone', 'vitax'),
                'default' => '(888) 456-2790',
            ),
            array(
                'id' => 'fax',
                'type' => 'text',
                'title' => esc_html__('Fax', 'vitax'),
                'default' => '(121) 255-53333',
            ),
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => esc_html__('Email', 'vitax'),
                'validate' => 'email',
                'default' => 'example@domain.com',
            ),
            array(
                'id' => 'social_title',
                'type' => 'text',
                'title' => esc_html__('Social Title', 'vitax'),
                'default' => esc_html__('Follow us', 'vitax'),
            ),

            array(
                'id' => 'bdwebteam_footer_social_enable',
                'type' => 'switch',
                'title' => esc_html__('Social Enable', 'vitax'),
                'subtitle' => esc_html__('Enable or disable the footer top area.', 'vitax'),
                'default' => false,
            ),         

            array(
                'id' => 'bdwebteam_social_icons',
                'type' => 'sortable',
                'title' => esc_html__('Social Icons', 'vitax'),
                'subtitle' => esc_html__('Enter social links to show the icons', 'vitax'),
                'mode' => 'text',
                'label' => true,
                'required' => array('bdwebteam_footer_social_enable', 'equals', true),
                'options' => array(
                    'facebook-f' => '',
                    'twitter' => '',
                    'pinterest-p' => '',
                    'linkedin-in' => '',
                    'instagram' => '',
                    'vimeo-v' => '',
                    'dribbble' => '',
                    'behance' => '',
                    'youtube' => '',
                ),
                'default' => array(
                    'facebook-f' => 'https://www.facebook.com/',
                    'twitter' => 'https://twitter.com/',
                    'pinterest-p' => 'https://pinterest.com/',
                    'linkedin-in' => 'https://linkedin.com/',
                    'instagram' => 'https://instagram.com/',
                    'vimeo-v' => 'https://vimeo.com/',
                    'dribbble' => 'https://dribbble.com/',
                    'behance' => 'https://behance.com/',
                    'youtube' => '',
                ),
            )
        )
    )
);


/**
 * Header
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Header', 'vitax'),
        'id' => 'header_id',
        'icon' => 'el el-minus',
        'fields' => array(
            array(
                'id' => 'bdwebteam_enable_header',
                'type' => 'switch',
                'title' => esc_html__('Header', 'vitax'),
                'subtitle' => esc_html__('Enable or disable the header area.', 'vitax'),
                'default' => true
            ),

            array(
                'id' => 'bdwebteam_header_sticky',
                'type' => 'switch',
                'title' => esc_html__('Enable Sticky Header ', 'vitax'),
                'subtitle' => esc_html__('Enable to activate the sticky header.', 'vitax'),
                'default' => false,
                'required' => array('bdwebteam_enable_header', 'equals', true),
            ),
          
            // Header Custom Style
            array(
                'id' => 'bdwebteam_select_header_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Header Layout', 'vitax'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Header Layout 1', 'vitax'),
                        'title' => esc_html__('Header Layout 1', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Header Layout 2', 'vitax'),
                        'title' => esc_html__('Header Layout 2', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Header Layout 3', 'vitax'),
                        'title' => esc_html__('Header Layout 3', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/3.png',
                    ), 
                    '4' => array(
                        'alt' => esc_html__('Header Layout 4', 'vitax'),
                        'title' => esc_html__('Header Layout 4 ( Dark layout)', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/4.png',
                    ),
                 
                ),
                'default' => '1',
                'required' => array('bdwebteam_enable_header', 'equals', true),
            ),
           
            array(
                'id' => 'bdwebteam_enable_offcanvas',
                'type' => 'switch',
                'title' => esc_html__('Header offcanvas', 'vitax'),
                'subtitle' => esc_html__('Enable or disable header offcanvas Icon.', 'vitax'),
                'default' => false,
                'required' => array('bdwebteam_enable_header', 'equals', true),

                'required' => array(
                    array('bdwebteam_enable_header', 'equals', true),
                    array('bdwebteam_select_header_template', 'not', '4'),
                ),

            ),   

            array(
                'id' => 'bdwebteam_search_placeholders',
                'type' => 'text',
                'title' => esc_html__('Search Placeholders',  'vitax'),
                'subtitle' => esc_html__('Change Search Placeholdersse',  'vitax'),
                'default' => esc_html__('Search ...',  'vitax'),                 
                 'required' => array('bdwebteam_enable_offcanvas', 'equals', true),
            ),     


             array(
                'id' => 'bdwebteam_enable_social',
                'type' => 'switch',
                'title' => esc_html__('Offcanvas Social', 'vitax'),
                'subtitle' => esc_html__('Enable or disable header social Icon.', 'vitax'),
                'default' => false,
                'required' => array('bdwebteam_enable_offcanvas', 'equals', true),
            ),   
          
             array(
                'id' => 'bdwebteam_enable_menu_social',
                'type' => 'switch',
                'title' => esc_html__('Menu Social', 'vitax'),
                'subtitle' => esc_html__('Enable or disable header social Icon.', 'vitax'),
                'default' => false,
               'required' => array(
                    array('bdwebteam_enable_header', 'equals', true),
                    array('bdwebteam_select_header_template', 'equals', '3'),
                ),
            ),   
        

            array(
                'id' => 'bdwebteam_enable_button',
                'type' => 'switch',
                'title' => esc_html__('Header button', 'vitax'),
                'subtitle' => esc_html__('Enable or disable header button.', 'vitax'),
                'default' => false,
                 
                'required' => array(
                    array('bdwebteam_enable_header', 'equals', true),
                     
                ), 
            ),


            array(
                'id' => 'button_txt',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'vitax'),
                'default' => esc_html__('Lets Talk', "vitax"),
                'required' => array('bdwebteam_enable_button', 'equals', true),
            ),

            array(
                'id' => 'button_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'vitax'),
                'default' => '#',
                'required' => array('bdwebteam_enable_button', 'equals', true),
            ),
        
          array(
                'id' => 'minicart_icon',
                'type' => 'switch',
                'title' => esc_html__('Cart Icon', 'vitax'),
                'on' => esc_html__('Enabled', 'vitax'),
                'off' => esc_html__('Disabled', 'vitax'),
                'default' => false,
            ),
        )
    ));

/**
 * Page Banner/Title section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Pages Banner', 'vitax'),
    'id' => 'bdwebteam_banner_section',
    'icon' => 'el el-website',
    'fields' => array(
         
        array(
            'id' => 'bdwebteam_page_banner_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
            'default' => true,
        ),      
           
        array(
            'id' => 'bdwebteam_page_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1 ( without image and shape )', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2 ( Shape )', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3 ( Image )', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_page_banner_enable', 'equals', true),
        ),
        
       array(
            'id' => 'bdwebteam_page_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
            'required' => array('bdwebteam_page_banner_enable', 'equals', true),
           
        ),

       array(
         'id' => 'bdwebteam_page_banner_img',
         'title' => esc_html__('Archive Banner Image', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_page_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),    

     array(
        'id' => 'bdwebteam_page_banner_image_size',
        'type' => 'dimensions',
        'units_extended' => true,
        'units' => array('rem', 'px', '%'),
        'title' => esc_html__('Banner Image Width', 'vitax'),
        'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
        'height' => false,
        'output' => array(
            'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_page_image_size img'
        ),
        
       'required' => array(
         array('bdwebteam_page_banner_template', 'not', '1'),
         array('bdwebteam_page_banner_template', 'not', '3'),
      ),
    ),

      array(
         'id' => 'bdwebteam_page_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',             
          'required' => array(
             array('bdwebteam_page_banner_template', 'not', '2'),
             array('bdwebteam_page_banner_template', 'not', '3'),
          ),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'bdwebteam_page_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_page_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-9.png'
         ),   
        
     ), 
      
        array(
            'id' => 'bdwebteam_page_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
               'required' => array(
                 array('bdwebteam_page_banner_template', 'not', '2'),
                 array('bdwebteam_page_banner_template', 'not', '3'),
              ),
        ),

          array(
            'id' => 'bdwebteam_page_banner_other_shape_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner Shape Disable', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
            'default' => true,
        ),      

       
    )
));


/**
 * Case Study Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Case Study', 'vitax'),
    'id' => 'bdwebteam_case_study_archive',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'vitax'),
    'id' => 'bdwebteam_case_study_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'bdwebteam_case_study_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),

        array(
            'id' => 'bdwebteam_case_study_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                    '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_case_study_archive_banner_enable', 'equals', true),
        ),      
       array(
            'id' => 'bdwebteam_case_study_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the Case Study page.', 'vitax'),
            'default' => esc_html__('All case_study', 'vitax'),
             'required' => array('bdwebteam_case_study_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_case_study_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
              'required' => array(
                 array('bdwebteam_case_study_archive_banner_template', 'not', '1'),
                
              ),
           
        ),


       array(
         'id' => 'bdwebteam_case_study_archive_banner_img',
         'title' => esc_html__('Archive Banner Image', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_case_study_archive_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),   
    array(
        'id' => 'bdwebteam_case_study_archive_image_size',
        'type' => 'dimensions',
        'units_extended' => true,
        'units' => array('rem', 'px', '%'),
        'title' => esc_html__('Banner Image Width', 'vitax'),
        'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
        'height' => false,
        'output' => array(
            'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_case_study_archive_image_size img'
        ),
        
       'required' => array(
         array('bdwebteam_case_study_archive_banner_template', 'not', '1'),
         array('bdwebteam_case_study_archive_banner_template', 'not', '3'),
      ),
    ),
      array(
         'id' => 'bdwebteam_case_study_archive_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',
         'required' => array(
                 array('bdwebteam_case_study_archive_banner_template', 'not', '2'),
                 array('bdwebteam_case_study_archive_banner_template', 'not', '3'),
              ),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'bdwebteam_case_study_archive_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_case_study_archive_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
         ),   
        
     ), 
           array(
             'id' => 'bdwebteam_case_study_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

        array(
            'id' => 'bdwebteam_case_study_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
            'required' => array(
                    array('bdwebteam_case_study_archive_banner_template', 'not', '2'),
                    array('bdwebteam_case_study_archive_banner_template', 'not', '3'),
                 ),
        ),
          array(
            'id' => 'bdwebteam_case_study_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Case Study Post par Page', 'vitax'),
            'default' => '6',
             'required' => array('bdwebteam_case_study_archive_banner_enable', 'equals', true),
           
        ),

        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'vitax'),
    'id' => 'bdwebteam_case_study_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'bdwebteam_case_study_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'vitax'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
         'default' => true,
     ),      
       
        
        array(
            'id' => 'bdwebteam_case_study_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_case_study_single_banner_enable', 'equals', true),
        ),
         array(
            'id' => 'bdwebteam_case_study_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
           'required' => array(
                    array('bdwebteam_case_study_single_banner_template', 'not', '1'),
                     
                 ),
           
        ),
        array(
            'id' => 'bdwebteam_case_study_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
            'required' => array(
                    array('bdwebteam_case_study_single_banner_template', 'not', '2'),
                    array('bdwebteam_case_study_single_banner_template', 'not', '3'),
                 ),
        ),
   
       array(
         'id' => 'bdwebteam_case_study_single_banner_img',
         'title' => esc_html__('Archive Banner Image', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_case_study_single_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),   
       array(
           'id' => 'bdwebteam_case_study_single_image_size',
           'type' => 'dimensions',
           'units_extended' => true,
           'units' => array('rem', 'px', '%'),
           'title' => esc_html__('Banner Image Width', 'vitax'),
           'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
           'height' => false,
           'output' => array(
               'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_case_study_single_image_size img'
           ),
           
          'required' => array(
            array('bdwebteam_case_study_single_banner_template', 'not', '1'),
            array('bdwebteam_case_study_single_banner_template', 'not', '3'),
         ),
       ),

      array(
         'id' => 'bdwebteam_case_study_single_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',
         'required' => array(
                 array('bdwebteam_case_study_single_banner_template', 'not', '2'),
                 array('bdwebteam_case_study_single_banner_template', 'not', '3'),
              ),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'bdwebteam_case_study_single_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'vitax'),           
         'type' => 'media',
          'required' => array('bdwebteam_case_study_single_banner_template', 'not', '1'),
         'default' => array(
          'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
         ),   
        
     ), 
       
        array(
             'id' => 'bdwebteam_case_study_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

    )
));



/**
 * Case Study Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Services', 'vitax'),
    'id' => 'bdwebteam_services',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'vitax'),
    'id' => 'bdwebteam_services_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'bdwebteam_services_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      
        array(
            'id' => 'bdwebteam_services_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_services_archive_banner_enable', 'equals', true),
        ),      
       array(
            'id' => 'bdwebteam_services_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the Services page.', 'vitax'),
            'default' => esc_html__('All services', 'vitax'),
             'required' => array('bdwebteam_services_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_services_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
             'required' => array(
                 array('bdwebteam_services_archive_banner_template', 'not', '1'),
                 
              ),
           
        ),

        array(
            'id' => 'bdwebteam_services_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
                 array('bdwebteam_services_archive_banner_template', 'not', '2'),
                 array('bdwebteam_services_archive_banner_template', 'not', '3'),
              ),
        ),

          array(
            'id' => 'bdwebteam_services_archive_banner_img',
            'title' => esc_html__('Archive Banner Image', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_services_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
          array(
              'id' => 'bdwebteam_services_archive_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'vitax'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_services_archive_image_size img'
              ),
              
             'required' => array(
               array('bdwebteam_services_archive_banner_template', 'not', '1'),
               array('bdwebteam_services_archive_banner_template', 'not', '3'),
            ),
          ),
         array(
            'id' => 'bdwebteam_services_archive_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',

             'required' => array(
                 array('bdwebteam_services_archive_banner_template', 'not', '2'),
                 array('bdwebteam_services_archive_banner_template', 'not', '3'),
              ),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
            ),   
           
        ),   
        
         array(
            'id' => 'bdwebteam_services_archive_banner_shape2',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_services_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
            ),   
           
        ), 


        array(
             'id' => 'bdwebteam_services_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ),  

       


          array(
            'id' => 'bdwebteam_services_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Case Study Post par Page', 'vitax'),
            'default' => '6',
             'required' => array('bdwebteam_services_archive_banner_enable', 'equals', true),
           
        ),
          array(
            'id' => 'bdwebteam_services_btn_txt',
            'type' => 'text',
            'title' => esc_html__('Services Button Text', 'vitax'),
            'default' => 'Find out more',
             'required' => array('bdwebteam_services_archive_banner_enable', 'equals', true),
           
        ),
          
           array(
              'id'       => 'bdwebteam_services_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'bdwebteam_services_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'bdwebteam_services_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '12',
          ), 
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'vitax'),
    'id' => 'bdwebteam_services_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'bdwebteam_services_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'vitax'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
         'default' => true,
     ),      

         array(
            'id' => 'bdwebteam_services_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
               '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_services_single_banner_enable', 'equals', true),
        ),

        array(
            'id' => 'bdwebteam_services_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
            'required' => array(
                     array('bdwebteam_services_single_banner_template', 'not', '1'),
                      
                  ),
           
        ),

        array(
            'id' => 'bdwebteam_services_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
            'required' => array(
                     array('bdwebteam_services_single_banner_template', 'not', '2'),
                     array('bdwebteam_services_single_banner_template', 'not', '3'),
                  ),
        ),
       
           array(
             'id' => 'bdwebteam_services_single_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_services_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
            array(
              'id' => 'bdwebteam_services_single_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'vitax'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_services_single_image_size img'
              ),
              
             'required' => array(
               array('bdwebteam_services_single_banner_template', 'not', '1'),
               array('bdwebteam_services_single_banner_template', 'not', '3'),
            ),
          ),
          array(
             'id' => 'bdwebteam_services_single_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media', 

            'required' => array(
                     array('bdwebteam_services_single_banner_template', 'not', '2'),
                     array('bdwebteam_services_single_banner_template', 'not', '3'),
                  ),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_services_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_services_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   
         
     array(
             'id' => 'bdwebteam_services_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ),  


       
    )
));


/**
 * Team Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Team', 'vitax'),
    'id' => 'bdwebteam_team_section',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'vitax'),
    'id' => 'bdwebteam_team_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
     'fields' => array(
           array(
             'id' => 'bdwebteam_team_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

        array(
            'id' => 'bdwebteam_team_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'vitax'),
                   'title' => esc_html__('Banner Layout 1', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_team_archive_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'bdwebteam_team_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'vitax'),
            'default' => esc_html__('All services', 'vitax'),
             'required' => array('bdwebteam_team_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_team_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
              'required' => array(
              array('bdwebteam_team_archive_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'bdwebteam_team_archive_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_team_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'bdwebteam_team_archive_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'vitax'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_team_archive_image_size img'
               ),
               
              'required' => array(
                array('bdwebteam_team_archive_banner_template', 'not', '1'),
                array('bdwebteam_team_archive_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'bdwebteam_team_archive_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
               
             'required' => array(
              array('bdwebteam_team_archive_banner_template', 'not', '2'),
              array('bdwebteam_team_archive_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_team_archive_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_team_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'bdwebteam_team_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
              array('bdwebteam_team_archive_banner_template', 'not', '2'),
              array('bdwebteam_team_archive_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'bdwebteam_team_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ),  

        array(
            'id' => 'bdwebteam_team_archive_designation_display',
            'type' => 'switch',
            'title' => esc_html__('Designation', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the Designation area.', 'vitax'),
            'default' => true,
           
        ),  
        array(
            'id' => 'bdwebteam_team_archive_department_display',
            'type' => 'switch',
            'title' => esc_html__('Department', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the Department area.', 'vitax'),
            'default' => true,
           
        ), 
        array(
            'id' => 'bdwebteam_team_archive_social_display',
            'type' => 'switch',
            'title' => esc_html__('Social Display', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the Social area.', 'vitax'),
            'default' => true,
           
        ),
          array(
            'id' => 'bdwebteam_team_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Team  Post par Page', 'vitax'),
            'default' => '6', 
           
        ),


          array(
              'id'       => 'bdwebteam_team_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'bdwebteam_team_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'bdwebteam_team_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '12',
          ), 
         
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'vitax'),
    'id' => 'bdwebteam_team_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'bdwebteam_team_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'vitax'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
         'default' => true,
     ),      

        array(
            'id' => 'bdwebteam_team_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_team_single_banner_enable', 'equals', true),
        ), 
        
        array(
            'id' => 'bdwebteam_team_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
             'required' => array(
              array('bdwebteam_team_single_banner_template', 'not', '1'),
               
           ),
           
        ),

        array(
            'id' => 'bdwebteam_team_single_banner_img',
            'title' => esc_html__('Archive Banner Image', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_team_single_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
          array(
            'id' => 'bdwebteam_team_single_image_size',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Banner Image Width', 'vitax'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
            'height' => false,
            'output' => array(
                'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_team_single_image_size img'
            ),
            
           'required' => array(
             array('bdwebteam_team_single_banner_template', 'not', '1'),
             array('bdwebteam_team_single_banner_template', 'not', '3'),
          ),
        ),
         array(
            'id' => 'bdwebteam_team_single_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',
            
           'required' => array(
              array('bdwebteam_team_single_banner_template', 'not', '2'),
              array('bdwebteam_team_single_banner_template', 'not', '3'),
           ),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-10.png'
            ),   
           
        ),   
          array(
             'id' => 'bdwebteam_team_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_team_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),    
         ),   

        array(
            'id' => 'bdwebteam_team_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
              array('bdwebteam_team_single_banner_template', 'not', '2'),
              array('bdwebteam_team_single_banner_template', 'not', '3'),
           ),
        ),
        array(
             'id' => 'bdwebteam_team_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ),  
       
    )
));



/**
 * Projects Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Projects', 'vitax'),
    'id' => 'bdwebteam_projects_section',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'vitax'),
    'id' => 'bdwebteam_projects_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'bdwebteam_projects_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

        array(
            'id' => 'bdwebteam_projects_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ), 
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_projects_archive_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'bdwebteam_projects_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the projects page.', 'vitax'),
            'default' => esc_html__('All Projects', 'vitax'),
             'required' => array('bdwebteam_projects_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_projects_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
               
           'required' => array(
              array('bdwebteam_projects_archive_banner_template', 'not', '1'),               
           ),
           
        ),

         array(
            'id' => 'bdwebteam_projects_archive_banner_img',
            'title' => esc_html__('Archive Banner Image', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_projects_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   

           array(
             'id' => 'bdwebteam_projects_archive_image_size',
             'type' => 'dimensions',
             'units_extended' => true,
             'units' => array('rem', 'px', '%'),
             'title' => esc_html__('Banner Image Width', 'vitax'),
             'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
             'height' => false,
             'output' => array(
                 'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_projects_archive_image_size img'
             ),
             
            'required' => array(
              array('bdwebteam_projects_archive_banner_template', 'not', '1'),
              array('bdwebteam_projects_archive_banner_template', 'not', '3'),
           ),
         ),
         array(
            'id' => 'bdwebteam_projects_archive_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',
            
           'required' => array(
              array('bdwebteam_projects_archive_banner_template', 'not', '2'),
              array('bdwebteam_projects_archive_banner_template', 'not', '3'),
           ),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-10.png'
            ),   
           
        ),   
          array(
             'id' => 'bdwebteam_projects_archive_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_projects_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   
        array(
            'id' => 'bdwebteam_projects_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
               
           'required' => array(
              array('bdwebteam_projects_archive_banner_template', 'not', '2'),
              array('bdwebteam_projects_archive_banner_template', 'not', '3'),
           ),
        ),
        array(
             'id' => 'bdwebteam_projects_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ),  

        array(
            'id' => 'bdwebteam_projects_archive_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'vitax'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'vitax'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'vitax'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'vitax'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'vitax'),
                ),
            ),
            'default' => 'right',
        ),

        
          array(
            'id' => 'bdwebteam_projects_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Projects Post par Page', 'vitax'),
            'default' => '6',
             'required' => array('bdwebteam_projects_archive_banner_enable', 'equals', true),
           
        ),
        array(
              'id'       => 'bdwebteam_projects_archive_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'bdwebteam_projects_archive_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'bdwebteam_projects_archive_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'vitax'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'vitax' ),
                  '6'  => esc_html__( '2 Col', 'vitax' ),
                  '4'  => esc_html__( '3 Col', 'vitax' ),
                  '3'  => esc_html__( '4 Col', 'vitax' ),
                  '2'  => esc_html__( '6 Col', 'vitax' ),
              ),
              'default'  => '12',
          ), 
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'vitax'),
    'id' => 'bdwebteam_projects_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'bdwebteam_projects_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'vitax'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
         'default' => true,
     ),      
        array(
            'id' => 'bdwebteam_projects_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
           
            'required' => array('bdwebteam_projects_single_banner_enable', 'equals', true),
           
        ),
         array(
            'id' => 'bdwebteam_projects_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_projects_single_banner_enable', 'equals', true),
        ),

         array(
             'id' => 'bdwebteam_projects_single_subtitle',
             'type' => 'text',
             'title' => esc_html__('Default Sub Title', 'vitax'),
             
             'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Vitax.', 'vitax'),
               'required' => array(
                array('bdwebteam_projects_single_banner_template', 'not', '1'),
                 
             ),
         ),
      
           array(
             'id' => 'bdwebteam_projects_single_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_projects_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   

             array(
               'id' => 'bdwebteam_projects_single_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'vitax'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_projects_single_image_size img'
               ),
               
              'required' => array(
                array('bdwebteam_projects_single_banner_template', 'not', '1'),
                array('bdwebteam_projects_single_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'bdwebteam_projects_single_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
             'required' => array(
                array('bdwebteam_projects_single_banner_template', 'not', '2'),
                array('bdwebteam_projects_single_banner_template', 'not', '3'),
             ),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_projects_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_projects_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   

        array(
            'id' => 'bdwebteam_projects_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
            'required' => array(
                array('bdwebteam_projects_single_banner_template', 'not', '2'),
                array('bdwebteam_projects_single_banner_template', 'not', '3'),
             ),
        ),
        array(
             'id' => 'bdwebteam_projects_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ), 
       
    )
));


/**
 * Blog Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'vitax'),
    'id' => 'bdwebteam_blog_section',
    'icon' => 'el el-file-edit',
));

/**
 * Blog Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'vitax'),
    'id' => 'bdwebteam_blog_genaral',
    'icon' => 'el el-edit',
    'subsection' => true,
    'fields' => array(

          array(
             'id' => 'bdwebteam_blog_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      


        array(
            'id' => 'bdwebteam_blog_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
               '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_blog_banner_enable', 'equals', true),
        ), 
        array(
            'id' => 'bdwebteam_blog_title',
            'type' => 'text',
            'title' => esc_html__('Blog Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'vitax'),
            'default' => esc_html__('Blog', 'vitax'),
             'required' => array('bdwebteam_blog_banner_enable', 'equals', true),
        ), 
        array(
            'id' => 'bdwebteam_blog_subtitle',
            'type' => 'text',
            'title' => esc_html__('Default Sub Title', 'vitax'),
            
            'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Vitax.', 'vitax'),
            'required' => array(
                array('bdwebteam_blog_banner_template', 'not', '1'),
               
             ),
        ),

         array(
            'id' => 'bdwebteam_blog_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
              'required' => array(
                array('bdwebteam_blog_banner_template', 'not', '2'),
                array('bdwebteam_blog_banner_template', 'not', '3'),
             ),
        ),

          
        array(
             'id' => 'bdwebteam_blog_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_blog_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
          array(
            'id' => 'bdwebteam_blog_image_size',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Banner Image Width', 'vitax'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
            'height' => false,
            'output' => array(
                'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_blog_image_size img'
            ),
            
           'required' => array(
             array('bdwebteam_blog_banner_template', 'not', '1'),
             array('bdwebteam_blog_banner_template', 'not', '3'),
          ),
        ),
          array(
             'id' => 'bdwebteam_blog_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
             'required' => array(
                array('bdwebteam_blog_banner_template', 'not', '2'),
                array('bdwebteam_blog_banner_template', 'not', '3'),
             ),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_blog_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_blog_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 
        array(
             'id' => 'bdwebteam_blog_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ), 

        array(
            'id' => 'bdwebteam_blog_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'vitax'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'vitax'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'vitax'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'vitax'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'vitax'),
                ),
            ),
            'default' => 'right',
        ),
        array(
            'id' => 'bdwebteam_show_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'vitax'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'bdwebteam_show_post_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'vitax'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'yes',
        ),   
        array(
            'id' => 'bdwebteam_read_time_view',
            'type' => 'button_set',
            'title' => esc_html__('Post Read Time ', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Post Read of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ), 
         array(
            'id' => 'bdwebteam_read_time_view_txt',
            'type' => 'text',
            'title' => esc_html__('Default  Min Read Text', 'vitax'),
            
            'default' => esc_html__(' min read', 'vitax'),
            'required' => array(
                array('bdwebteam_read_time_view', 'not', 'no'),
               
             ),
        ),
        array(
            'id' => 'bdwebteam_show_post_view',
            'type' => 'button_set',
            'title' => esc_html__('Post Min Read Text', 'vitax'), 
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),


             
       array(
            'id' => 'bdwebteam_show_blog_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Tags of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),      
       array(
            'id' => 'bdwebteam_show_post_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Categoriesof blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),

       array(
           'id' => 'bdwebteam_read_more_btn',
           'type' => 'button_set',
           'title' => esc_html__('Post Read More ', 'vitax'),
           'subtitle' => esc_html__('Show or hide the Post Read More Button.', 'vitax'),
           'options' => array(
               'yes' => esc_html__('Show', 'vitax'),
               'no' => esc_html__('Hide', 'vitax'),
           ),
           'default' => 'no',
       ), 
        array(
           'id' => 'bdwebteam_read_more_btn_txt',
           'type' => 'text',
           'title' => esc_html__('Read More Button Text', 'vitax'),
           
           'default' => esc_html__(' Read More', 'vitax'),
           'required' => array(
               array('bdwebteam_read_more_btn', 'not', 'no'),
              
            ),
       ),

    )
));

/**
 * Single Post
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'vitax'),
    'id' => 'bdwebteam_single_post_details_id',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(

    array(
             'id' => 'bdwebteam_single_post_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

            array(
            'id' => 'bdwebteam_single_post_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'vitax'),
                    'title' => esc_html__('Banner Layout 1', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'vitax'),
                    'title' => esc_html__('Banner Layout 2', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'vitax'),
                    'title' => esc_html__('Banner Layout 3', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_single_post_banner_enable', 'equals', true),
        ), 
        
      
            array(
            'id' => 'bdwebteam_single_post_subtitle',
            'type' => 'text',
            'title' => esc_html__('Default Sub Title', 'vitax'),
            
            'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Vitax.', 'vitax'),
            'required' => array(
                array('bdwebteam_single_post_banner_template', 'not', '1'),
                 
             ),
        ),


         array(
            'id' => 'bdwebteam_single_post_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
                array('bdwebteam_single_post_banner_template', 'not', '2'),
                array('bdwebteam_single_post_banner_template', 'not', '3'),
             ),
        ),
 
          array(
            'id' => 'bdwebteam_single_post_banner_img',
            'title' => esc_html__('Archive Banner Image', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_single_post_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
            array(
              'id' => 'bdwebteam_single_post_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'vitax'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_single_post_image_size img'
              ),
              
             'required' => array(
               array('bdwebteam_single_post_banner_template', 'not', '1'),
               array('bdwebteam_single_post_banner_template', 'not', '3'),
            ),
          ),
         array(
            'id' => 'bdwebteam_single_post_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',                 
             'required' => array(
                array('bdwebteam_single_post_banner_template', 'not', '2'),
                array('bdwebteam_single_post_banner_template', 'not', '3'),
             ),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
            ),   
           
        ),   
       
         array(
            'id' => 'bdwebteam_single_post_banner_shape2',
            'title' => esc_html__('Archive Banner Shape', 'vitax'),           
            'type' => 'media',
             'required' => array('bdwebteam_single_post_banner_template', 'not', '1'),
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
            ),   
           
        ),    

          array(
             'id' => 'bdwebteam_blog_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ), 

         array( 
              'id' => 'bdwebteam_single_post_banner_other_shape_enable',
              'type' => 'switch',
              'title' => esc_html__('Banner Shape Disable', 'vitax'),
              'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
              'default' => true,
          ), 
        array(
            'id' => 'bdwebteam_single_pos',
            'type' => 'image_select',
            'title' => esc_html__('Blog Details Sidebar', 'vitax'),
            'subtitle' => esc_html__('Choose your favorite layout', 'vitax'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'vitax'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'vitax'),
                ),
                'full' => array(
                    'alt' => esc_html__('No Sidebar', 'vitax'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'vitax'),
                ),
            ),
            'default' => 'full',
        ), 
    


    array(
            'id' => 'bdwebteam_show_single_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'vitax'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'bdwebteam_show_post_single_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'vitax'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'yes',
        ),   
        array(
            'id' => 'bdwebteam_show_post_single_view',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'vitax'),
            'subtitle' => esc_html__('Show or hide the post Reading Time.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),
             
       array(
            'id' => 'bdwebteam_show_blog_single_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Tags of blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),      
       array(
            'id' => 'bdwebteam_show_post_single_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Categoriesof blog post.', 'vitax'),
            'options' => array(
                'yes' => esc_html__('Show', 'vitax'),
                'no' => esc_html__('Hide', 'vitax'),
            ),
            'default' => 'no',
        ),
    

        array(
            'id' => 'bdwebteam_blog_details_show_author_info',
            'type' => 'switch',
            'title' => esc_html__('Show Author Info', 'vitax'),
            'subtitle' => esc_html__('Show or hide the Author Info box of single post.', 'vitax'),
            'default' => false,
        ),
       
        
       
  
    )
));

/**
 * footer Top
 */

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'vitax'),
    'id' => 'bdwebteam_footer_top_section',
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'bdwebteam_footer_top_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Top', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the footer top area.', 'vitax'),
            'default' => false,
        ),

            array(
                'id' => 'bdwebteam_select_footer_top_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Footer Top Layout', 'etrade'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Footer Top Layout 1', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 1', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer Top Layout 2', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 2', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer Top Layout 3', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 3', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/3.png',
                    ),
                     
                ),
                'default' => '1',
                'required' => array('bdwebteam_footer_top_enable', 'equals', true),
            ),
        
        array(
            'id' => 'bdwebteam_ft_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'vitax'),
            'default' => 'Lets Work Together',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '1'),
        ), 
        array(
            'id' => 'bdwebteam_ft_sub_title',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'vitax'),
            'default' => 'Need a successful project?',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '1'),
        ),

        array(
            'id' => 'bdwebteam_ft_btn_txt',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'vitax'),
            'default' => esc_html__('Estimate Project', 'vitax'),
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '1'),
        ),
        array(
            'id' => 'bdwebteam_ft_btn_url',
            'type' => 'text',
            'title' => esc_html__('Button Url', 'vitax'),
            'default' => '#',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '1'),
        ),

        array(
            'id' => 'bdwebteam_footer_top_img_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Top Image Enable', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the footer top Image Group area.', 'vitax'),
            'default' => '1',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '1'),
        ),  

        array(
            'id' => 'bdwebteam_ft_btn_img',
            'title' => esc_html__('Footer Top Image', 'vitax'),            
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'footer/chat-group.png'
            ),
            'required' => array('bdwebteam_footer_top_img_enable', 'equals', true),
        ),
 
        array(
            'id' => 'bdwebteam_ft_btn_img1',
            'title' => esc_html__('Image 1', 'vitax'),            
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'footer/laptop-poses.png'
            ),
          'required' => array('bdwebteam_footer_top_img_enable', 'equals', true),
        ),
       
        array(
            'id' => 'bdwebteam_ft_btn_img2',
            'title' => esc_html__('Image 2', 'vitax'),            
            'type' => 'media',
            'default' => array(
                'url' => BDWEBTEAM__IMG_URL . 'footer/bill-pay.png'
            ),
            'required' => array('bdwebteam_footer_top_img_enable', 'equals', true),
        ),
  

        array(
            'id' => 'bdwebteam_footer_top_shape_group_enable',
            'type' => 'switch',
            'title' => esc_html__(' Shape Group', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the footer Shape Group area', 'vitax'),
            'default' => true,
            'required' => array('bdwebteam_footer_top_img_enable', 'equals', true),
        ),      
  
        array(
            'id' => 'bdwebteam_ft_title2',
            'type' => 'text',
            'title' => esc_html__('Title', 'vitax'),
            'default' => 'Want to talk to a marketing expert?',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '2'),
        ), 
        array(
            'id' => 'bdwebteam_ft_sub_title2',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'vitax'),
            'default' => 'Need a successful project?',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '2'),
        ),
        array(
            'id' => 'bdwebteam_ft_btn_txt2',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'vitax'),
            'default' => esc_html__('Contact With Us', 'vitax'),
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '2'),
        ),
        array(
            'id' => 'bdwebteam_ft_btn_url2',
            'type' => 'text',
            'title' => esc_html__('Button Url', 'vitax'),
            'default' => '#',
            'required' => array('bdwebteam_select_footer_top_template', 'equals', '2'),
        ),

        

    )
));


/**
 * Footer section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'vitax'),
    'id' => 'bdwebteam_footer_section',
    'icon' => 'el el-photo',
    'fields' => array(
        array(
            'id' => 'bdwebteam_footer_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the footer area.', 'vitax'),
            'default' => true,
        ),     
          // Header Custom Style
            array(
                'id' => 'bdwebteam_select_footer_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Footer Layout', 'vitax'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Footer Layout 1', 'vitax'),
                        'title' => esc_html__('Footer Layout 1', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer Layout 2', 'vitax'),
                        'title' => esc_html__('Footer Layout 2', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer Layout 3', 'vitax'),
                        'title' => esc_html__('Footer Layout 3', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/3.png',
                    ),
                 
                ),
                'default' => '2',
                'required' => array('bdwebteam_footer_enable', 'equals', true),
            ),  
        array(
            'id' => 'bdwebteam_footer_footerbottom',
            'type' => 'switch',
            'title' => esc_html__('Footer Bottom Menu', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the footer Menu.', 'vitax'),
            'default' => false,
            'required' => array('bdwebteam_footer_enable', 'equals', true),            
        ),
         array(
            'id' => 'bdwebteam_copyright_contact',
            'type' => 'editor',
            'title' => esc_html__('Copyright Content', 'vitax'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 5,
            ),
            'default' => '© 2022. All rights reserved by <a href="https://bdwebteamthemes.com/" target="_blank" rel="noopener">Bdwebteamthemes.</a>',
            'required' => array('bdwebteam_footer_enable', 'equals', true),
        ),
      
    )
));

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Under Construction', 'vitax'),
        'id' => 'under_construction_sttings_section',
        'heading' => esc_html__('Under Construction', 'vitax'),
        'icon' => 'el el-error-alt',
         
        'fields' => array(
            array(
                'id'                    => 'under_construction_mode_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Under Construction / Coming Soon Mode', 'vitax'),
                'subtitle'              => esc_html__('If enable, the frontend shows maintenance / coming soon mode page only.', 'vitax'),
                'options'               => array(
                    'on'                => 'Enable',
                    'off'               => 'Disable'
                ),
                'default'               => 'off'
            ),
            array(
                'id' => 'under_construction_title_text',
                'type' => 'text',
                'title' => esc_html__('Page Title', 'vitax'),
                'default' => esc_html__('Our new website is on its way', 'vitax'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id' => 'under_construction_subtitle_text',
                'type' => 'text',
                'title' => esc_html__('Sub Title', 'vitax'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'vitax'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_mailchimp_form_shortcode',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp Form Shortcode', 'vitax' ),
                'subtitle' => esc_html__( 'Use the shortcode that create Mailchimp Form', 'vitax' ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

            array(
                'id'       => 'under_construction_page_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Image', 'vitax' ),
                 'default' => array(
                    'url' => BDWEBTEAM__IMG_URL . 'coming-soon/coming-soon.png'
            ), 
            'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

            array(
                'id'       => 'under_construction_page_shape',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Shape', 'vitax' ),
                'default'  => array(
                    'url' => BDWEBTEAM__IMG_URL . 'coming-soon/bubble-28.png'
                ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_page_line',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Line', 'vitax' ),
                'default'  => array(
                    'url' => BDWEBTEAM__IMG_URL . 'coming-soon/line-4.png'
                ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

             array(
                'id' => 'cd_days',
                'type' => 'text',            
                'title' => esc_html__('Countdown Days label', 'vitax'),            
                'default' => 'Days',
                'required'              => array('under_construction_mode_enable','equals', 'on'),

            ),
            array(
                'id' => 'cd_hour',
                'type' => 'text',            
                'title' => esc_html__('Countdown Hour label', 'vitax'),    
                
                'default' => 'Hour',
                'required'    => array('under_construction_mode_enable','equals', 'on'),        
            ),
            array(
                'id' => 'cd_minute',
                'type' => 'text',            
                'title' => esc_html__('Countdown Minute label', 'vitax'),            
                'default' => 'Minute',
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id' => 'cd_second',
                'type' => 'text',            
                'title' => esc_html__('Countdown Second label', 'vitax'),            
                'default' => 'Second',
                'required'              => array('under_construction_mode_enable','equals', 'on'),

            ),

             array(
                'id'          => 'under_construction_date',
                'type'        => 'date',
                'title'       => __('Date Option', 'vitax'), 
                'subtitle'    => __('No validation can be done on this field type', 'vitax'),
                'desc'        => __('This is the description field, again good for additional info.', 'vitax'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
                'placeholder' => 'Click to enter a date'

            ),
            
        )
    ) );

/**
 * 404 error page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'vitax'),
    'id' => 'bdwebteam_error_page',
    'icon' => 'el el-eye-close',
    'fields' => array(
        array(
            'id' => 'bdwebteam_404_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'vitax'),
            'subtitle' => esc_html__('Add your Default title.', 'vitax'),
            'value' => 'Page not Found',
            'default' => esc_html__('Page not Found', 'vitax'),
        ),

        array(
            'id' => 'bdwebteam_404_subtitle',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'vitax'),
            'subtitle' => esc_html__('Add your custom subtitle.', 'vitax'),
            'default' => esc_html__('Sorry, but the page you were looking for could not be found.', 'vitax'),
        ),

        array(
            'id' => 'bdwebteam_enable_go_back_btn',
            'type' => 'button_set',
            'title' => esc_html__('Button', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the go to home page button.', 'vitax'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'yes'
        ),

        array(
            'id' => 'bdwebteam_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'vitax'),
            'subtitle' => esc_html__('Set the custom text of go to home page button.', 'vitax'),
            'default' => esc_html__('Back to Homepage', 'vitax'),
            'required' => array('bdwebteam_enable_go_back_btn', 'equals', 'yes'),
        ),
         array(
            'id' => 'bdwebteam_404_banner',
            'title' => esc_html__(' Banner Image', 'vitax'),           
            'type' => 'media',             
            'default' => array(
             'url' => BDWEBTEAM__IMG_URL . 'banner/404.png'
            ),   
           
        ),   

          array( 
              'id' => 'bdwebteam_404_other_shape_enable',
              'type' => 'switch',
              'title' => esc_html__('404 Others Shape Disable', 'vitax'),
              'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
              'default' => true,
          ),  
    )
));

/**
 * Typography
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'vitax'),
    'id' => 'bdwebteam_fonts',
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'bdwebteam_h1_typography',
            'type' => 'typography',
            'title' => esc_html__('H1 Heading Typography (Default size: 56px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H1 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h1, .h1'),
        ),
        array(
            'id' => 'bdwebteam_h2_typography',
            'type' => 'typography',
            'title' => esc_html__('H2 Heading Typography (Default size: 50px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H2 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h2, .h2'),
        ),
        array(
            'id' => 'bdwebteam_h3_typography',
            'type' => 'typography',
            'title' => esc_html__('H3 Heading Typography (Default size: 35px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H3 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h3, .h3'),
        ),
        array(
            'id' => 'bdwebteam_h4_typography',
            'type' => 'typography',
            'title' => esc_html__('H4 Heading Typography (Default size: 26px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H4 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h4, .h4'),
        ),
        array(
            'id' => 'bdwebteam_h5_typography',
            'type' => 'typography',
            'title' => esc_html__('H5 Heading Typography (Default size: 22px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H5 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h5, .h5'),
        ),
        array(
            'id' => 'bdwebteam_h6_typography',
            'type' => 'typography',
            'title' => esc_html__('H6 Heading Typography (Default size: 16px)', 'vitax'),
            'subtitle' => esc_html__('Controls the typography settings of the H6 heading.', 'vitax'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h6, .h6'),
        ),

        array(
            'id' => 'bdwebteam_b3_typography',
            'type' => 'typography',
            'title' => esc_html__('Body Typography (Default size: 18px)', 'vitax'),
            'subtitle' => esc_html__('B3 is used in subtitle, paragraph, footer link and body', 'vitax'),
            'google' => true,
            'subsets' => false,
            'word-spacing' => true,
            'letter-spacing' => true,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'output' => array('body, p'),
            'units' => 'px',
        ),


    )
) );

/**
 * WooCommerce
 */
if ( class_exists( 'WooCommerce' ) ) {

    Redux::setSection($opt_name, array(
        'title' => esc_html__('WooCommerce', 'vitax'),
        'id' => 'woo_Settings_section',
        'icon' => 'el el-shopping-cart',
    ));
    /**
     * WooCommerce Archive
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('General', 'vitax'),
        'id' => 'wc_sec_general',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'wc_general_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Shop Sidebar', 'vitax'),
                'subtitle' => esc_html__('Choose your favorite shop layout', 'vitax'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'vitax'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'vitax'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'vitax'),
                    ),
                ),
                'default' => 'no',
            ),
            array(
                'id'       => 'wc_num_product_per_row',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Row', 'vitax' ),
                'default'  => '3',
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'vitax' ),
                'default'  => '12',
            ),

         array(
             'id' => 'bdwebteam_shop_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
             'default' => true,
         ),      

             array(
            'id' => 'bdwebteam_shop_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'vitax'),
                   'title' => esc_html__('Banner Layout 1', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_shop_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'bdwebteam_shop_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'vitax'),
            'default' => esc_html__('All services', 'vitax'),
             'required' => array('bdwebteam_shop_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_shop_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
              'required' => array(
              array('bdwebteam_shop_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'bdwebteam_shop_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_shop_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'bdwebteam_shop_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'vitax'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_shop_image_size img'
               ),
               
              'required' => array(
                array('bdwebteam_shop_banner_template', 'not', '1'),
                array('bdwebteam_shop_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'bdwebteam_shop_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
               
             'required' => array(
              array('bdwebteam_shop_banner_template', 'not', '2'),
              array('bdwebteam_shop_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_shop_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_shop_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'bdwebteam_shop_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
              array('bdwebteam_shop_banner_template', 'not', '2'),
              array('bdwebteam_shop_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'bdwebteam_shop_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ), 

        )
    ));
    /**
     * WooCommerce Single Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Product Single Page', 'vitax'),
        'id' => 'wc_sec_product',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'bdwebteam_products_banner_enable',
                'type' => 'switch',
                'title' => esc_html__('Banner', 'vitax'),
                'subtitle' => esc_html__('Enable or disable the banner area.', 'vitax'),
                'default' => true,
            ),     
              array(
            'id' => 'bdwebteam_products_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'vitax'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'vitax'),
                   'title' => esc_html__('Banner Layout 1', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'vitax'),
                   'title' => esc_html__('Banner Layout 2', 'vitax'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('bdwebteam_products_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'bdwebteam_products_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'vitax'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'vitax'),
            'default' => esc_html__('All services', 'vitax'),
             'required' => array('bdwebteam_products_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'bdwebteam_products_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'vitax'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'vitax'),
              'required' => array(
              array('bdwebteam_products_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'bdwebteam_products_banner_img',
             'title' => esc_html__('Archive Banner Image', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_products_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'bdwebteam_products_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'vitax'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'vitax'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-bdwebteam_products_image_size img'
               ),
               
              'required' => array(
                array('bdwebteam_products_banner_template', 'not', '1'),
                array('bdwebteam_products_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'bdwebteam_products_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
               
             'required' => array(
              array('bdwebteam_products_banner_template', 'not', '2'),
              array('bdwebteam_products_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'bdwebteam_products_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'vitax'),           
             'type' => 'media',
              'required' => array('bdwebteam_products_banner_template', 'not', '1'),
             'default' => array(
              'url' => BDWEBTEAM__IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'bdwebteam_products_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'vitax'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'vitax'),
            'default' => true,
             'required' => array(
              array('bdwebteam_products_banner_template', 'not', '2'),
              array('bdwebteam_products_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'bdwebteam_products_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'vitax'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'vitax'),
             'default' => true,
         ), 
         


            array(
                'id' => 'wc_single_product_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Single Product Sidebar', 'vitax'),
                'subtitle' => esc_html__('Choose your favorite shop layout', 'vitax'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'vitax'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'vitax'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'vitax'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'vitax'),
                    ),
                ),
                'default' => 'no',
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
        )
    ));
    /**
     * WooCommerce Cart Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Cart page', 'vitax'),
        'id' => 'wc_sec_cart',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'vitax' ),
                'on'       => esc_html__( 'Show', 'vitax' ),
                'off'      => esc_html__( 'Hide', 'vitax' ),
                'default'  => true,
            ),
        )
    ));

}  

<?php
/**
 * @author  bdwebteamtheme
 * @since   1.0
 * @version 1.0
 * @package vitax
 */

class TGM_Config {
    public $prfx = BDWEBTEAM__THEME_FIX;  
    public $path = "https://new.bdwebteamthemes.com/themes/vitax/demo/plugins/";

	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'bdwebteam_tgn_plugins' ) );
	}

	public function bdwebteam_tgn_plugins(){
		$plugins = array(	
			array(
				'name'         => esc_html__('Bdwebteam Elements','vitax'),
				'slug'         => 'bdwebteam-elements',
				'source'       => 'bdwebteam-elements.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			array(
				'name'         => esc_html__('Vitax Demo','vitax'),
				'slug'         => 'vitax-demo',
				'source'       => 'vitax-demo.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),				
            array(
                'name'      => esc_html__('Advanced Custom Fields Pro', 'vitax'),
                'slug'      => 'advanced-custom-fields-pro',
                'source'	=> 'advanced-custom-fields-pro.zip',
                'required'  => true,
            ),	
            				
			// Repository
			array(
				'name'     => esc_html__('Redux Framework','vitax'),
				'slug'     => 'redux-framework',
				'required' => true,
			),				
			
			array(
				'name'     => esc_html__('Elementor Page Builder','vitax'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','vitax'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress','vitax'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
            array(
                'name'      => esc_html__('One Click Demo', 'vitax'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('WooCommerce', 'vitax'),
                'slug'      => 'woocommerce',
                'required'  => false,
            ) 
     );

		$config = array(
			'id'           => $this->prfx,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prfx . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;
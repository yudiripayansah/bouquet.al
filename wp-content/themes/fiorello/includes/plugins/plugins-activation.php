<?php

if(!function_exists('fiorello_mikado_register_required_plugins')) {
    /**
     * Registers theme required and optional plugins. Hooks to tgmpa_register hook
     */
    function fiorello_mikado_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'fiorello'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'version'            => '6.6.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'fiorello'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '6.4.11',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Fiorello Core', 'fiorello'),
                'slug'               => 'fiorello-core',
                'source'             => get_template_directory().'/includes/plugins/fiorello-core.zip',
                'version'            => '1.1.3',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Fiorello Instagram Feed', 'fiorello'),
                'slug'               => 'fiorello-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/fiorello-instagram-feed.zip',
                'version'            => '2.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Fiorello Twitter Feed', 'fiorello'),
                'slug'               => 'fiorello-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/fiorello-twitter-feed.zip',
                'version'            => '1.0.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'     => esc_html__( 'WooCommerce Plugin', 'fiorello' ),
		        'slug'     => 'woocommerce',
		        'required' => false
	        ),
	        array(
		        'name'     => esc_html__( 'Contact Form 7', 'fiorello' ),
		        'slug'     => 'contact-form-7',
		        'required' => false
	        ),
	        array(
		        'name'     => esc_html__( 'Envato Market', 'fiorello' ),
		        'slug'     => 'envato-market',
		        'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
		        'required' => false
	        )
        );

        $config = array(
            'domain'           => 'fiorello',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'fiorello'),
                'menu_title'                      => esc_html__('Install Plugins', 'fiorello'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'fiorello'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'fiorello'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'fiorello'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'fiorello'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'fiorello'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'fiorello'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'fiorello'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'fiorello'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'fiorello'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'fiorello'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'fiorello'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'fiorello'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'fiorello'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'fiorello'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'fiorello'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'fiorello_mikado_register_required_plugins');
}
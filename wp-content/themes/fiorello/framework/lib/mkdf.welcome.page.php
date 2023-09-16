<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'FiorelloMikadoWelcomePage' ) ) {
	class FiorelloMikadoWelcomePage {
		
		/**
		 * Singleton class
		 */
		private static $instance;
		
		/**
		 * Get the instance of FiorelloMikadoWelcomePage
		 *
		 * @return self
		 */
		public static function getInstance() {
			if ( ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		/**
		 * Constructor
		 */
		private function __construct() {
			
			// Theme activation hook
			add_action( 'after_switch_theme', array( $this, 'initActivationHook' ) );
			
			// Welcome page redirect on theme activation
			add_action( 'admin_init', array( $this, 'welcomePageRedirect' ) );
			
			// Add welcome page into theme options
			add_action( 'admin_menu', array( $this, 'addWelcomePage' ), 12 );
			
			//Enqueue theme welcome page scripts
			add_action( 'fiorello_mikado_action_admin_scripts_init', array( $this, 'enqueueStyles' ) );
		}
		
		/**
		 * Init hooks on theme activation
		 */
		function initActivationHook() {
			
			if ( ! is_network_admin() ) {
				set_transient( '_fiorello_mikado_welcome_page_redirect', 1, 30 );
			}
		}
		
		/**
		 * Redirect to welcome page on theme activation
		 */
		function welcomePageRedirect() {
			
			// If no activation redirect, bail
			if ( ! get_transient( '_fiorello_mikado_welcome_page_redirect' ) ) {
				return;
			}
			
			// Delete the redirect transient
			delete_transient( '_fiorello_mikado_welcome_page_redirect' );
			
			// If activating from network, or bulk, bail
			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}
			
			// Redirect to welcome page
			wp_safe_redirect( add_query_arg( array( 'page' => 'fiorello_mikado_welcome_page' ), esc_url( admin_url( 'themes.php' ) ) ) );
			exit;
		}
		
		/**
		 * Add welcome page
		 */
		function addWelcomePage() {
			
			add_theme_page(
				esc_html__( 'About', 'fiorello' ),
				esc_html__( 'About', 'fiorello' ),
				current_user_can( 'edit_theme_options' ),
				'fiorello_mikado_welcome_page',
				array( $this, 'welcomePageContent' )
			);
			
			remove_submenu_page( 'themes.php', 'fiorello_mikado_welcome_page' );
		}
		
		/**
		 * Print welcome page content
		 */
		function welcomePageContent() {
			$mkdf_theme              = wp_get_theme();
			$mkdf_theme_name         = esc_html( $mkdf_theme->get( 'Name' ) );
			$mkdf_theme_description  = esc_html( $mkdf_theme->get( 'Description' ) );
			$mkdf_theme_version      = $mkdf_theme->get( 'Version' );
			$mkdf_theme_screenshot   = file_exists( MIKADO_ROOT_DIR . '/screenshot.png' ) ? MIKADO_ROOT . '/screenshot.png' : MIKADO_ROOT . '/screenshot.jpg';
			$mkdf_welcome_page_class = 'mkdf-welcome-page-' . MIKADO_PROFILE_SLUG;
			?>
			<div class="wrap about-wrap mkdf-welcome-page <?php echo esc_attr( $mkdf_welcome_page_class ); ?>">
				<div class="mkdf-welcome-page-content">
					<div class="mkdf-welcome-page-logo">
						<img src="<?php echo esc_url( fiorello_mikado_get_skin_uri() . '/assets/img/logo.png' ); ?>" alt="<?php esc_attr_e( 'Profile Logo', 'fiorello' ); ?>" />
					</div>
					<h1 class="mkdf-welcome-page-title">
						<?php echo sprintf( esc_html__( 'Welcome to %s', 'fiorello' ), $mkdf_theme_name ); ?>
						<small><?php echo esc_html( $mkdf_theme_version ) ?></small>
					</h1>
					<div class="about-text mkdf-welcome-page-text">
						<?php echo sprintf( esc_html__( 'Thank you for installing %s - %s! Everything in %s is streamlined to make your website building experience as simple and fun as possible. We hope you love using it to make a spectacular website.', 'fiorello' ),
							$mkdf_theme_name,
							$mkdf_theme_description,
							$mkdf_theme_name
						); ?>
						<img src="<?php echo esc_url( $mkdf_theme_screenshot ); ?>" alt="<?php esc_attr_e( 'Theme Screenshot', 'fiorello' ); ?>" />
						
						<h4><?php esc_html_e( 'Useful Links:', 'fiorello' ); ?></h4>
						<ul class="mkdf-welcome-page-links">
							<li>
								<a href="<?php echo sprintf('https://%s.ticksy.com/', MIKADO_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'Support Forum', 'fiorello' ); ?></a>
							</li>
							<li>
								<a href="<?php echo sprintf('http://fiorello.%s-themes.com/documentation/', MIKADO_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'fiorello' ); ?></a>
							</li>
							<li>
								<a href="<?php echo sprintf('https://themeforest.net/user/%s-themes/portfolio/', MIKADO_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'All Our Themes', 'fiorello' ); ?></a>
							</li>
							<li>
								<a href="<?php echo add_query_arg( array( 'page' => 'install-required-plugins&plugin_status=install' ), esc_url( admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'Install Required Plugins', 'fiorello' ); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php
		}
		
		/**
		 * Enqueue theme welcome page scripts
		 */
		function enqueueStyles() {
			wp_enqueue_style( 'fiorello-mikado-welcome-page-style', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-welcome-page.css' );
		}
	}
}

FiorelloMikadoWelcomePage::getInstance();
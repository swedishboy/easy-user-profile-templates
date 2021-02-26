<?php
/*
Plugin Name: Easy User Profile Templates
Plugin URI: https://github.com/swedishboy/easy-user-profile-templates
Description: Templates for login, registration, profile pages for users according to your theme. Based on Theme My Login 6.4.17
Version: 1.0
Author: Easy User Profile Templates
Author URI: https://github.com/swedishboy/easy-user-profile-templates
Text Domain: easy-user-profile
Domain Path: /languages
*/

// Allow custom functions file
if ( file_exists( WP_PLUGIN_DIR . '/easy-user-profile-custom.php' ) )
	include_once( WP_PLUGIN_DIR . '/easy-user-profile-custom.php' );

if ( ! defined( 'THEME_MY_LOGIN_PATH' ) ) {
	define( 'THEME_MY_LOGIN_PATH', dirname( __FILE__ ) );
}

// Require a few needed files
require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt-common.php' );
require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt-abstract.php' );
require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt.php' );
require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt-template.php' );
require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt-widget.php' );

// Instantiate Theme_My_Login singleton
Theme_My_Login::get_object();

if ( is_admin() ) {
	require_once( THEME_MY_LOGIN_PATH . '/admin/class-eupt-admin.php' );

	// Instantiate Theme_My_Login_Admin singleton
	Theme_My_Login_Admin::get_object();
}

if ( is_multisite() ) {
	require_once( THEME_MY_LOGIN_PATH . '/includes/class-eupt-ms-signup.php' );

	// Instantiate Theme_My_Login_MS_Signup singleton
	Theme_My_Login_MS_Signup::get_object();
}

if ( ! function_exists( 'theme_my_login' ) ) :
/**
 * Displays a TML instance
 *
 * @see Theme_My_Login::shortcode() for $args parameters
 * @since 6.0
 *
 * @param string|array $args Template tag arguments
 */
function theme_my_login( $args = '' ) {
	echo Theme_My_Login::get_object()->shortcode( wp_parse_args( $args ) );
}
endif;

?>

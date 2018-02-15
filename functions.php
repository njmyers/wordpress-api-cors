<?php

/*

Plugin Name: WP API Cors
Plugin URI: http://github.com:njmyers/wordpress-api-cors
Description: Add cors to wp-api
Version: 0.1.0
Author: Nick Myers

 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function my_customize_rest_cors() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
		header( 'Access-Control-Allow-Methods: GET' );
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Expose-Headers: Link', true );
		return $value;
	} );
};

add_action( 'rest_api_init', 'my_customize_rest_cors', 15 );

?>
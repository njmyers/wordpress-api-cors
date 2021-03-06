<?php

add_action( 'admin_init', 'wordpress_cors_settings' );

function wordpress_cors_settings() {
	register_setting( 'cors-settings', 'enable_cors' );
	register_setting( 'cors-settings', 'enable_link' );
	register_setting( 'cors-settings', 'enabled_domains' );
	register_setting( 'cors-settings', 'allow_methods' );
}

add_action('admin_menu', 'wordpress_cors_menu');

function wordpress_cors_menu() {
	add_menu_page('Wordpress Cors', 'Wordpress Cors', 'administrator', 'wordpress-cors', 'wordpress_cors_settings_page', 'dashicons-admin-generic');
};

function wordpress_cors_settings_page() {
	?>
	<form method="post" action="options.php">
		<?php settings_fields('cors-setting');
		do_settigs_sections('cors-setting'); ?>
	<p>Enable Cors</p>
	<input type="checkbox" name="enable_cors" value="0" <?php checked( '1', get_option( 'enable_cors') ); ?> />
};

		<?php submit_button(); ?>
	</form>
	<?php
};


?>
<?php

// register post types
$options = get_option('pixtypes_settings');
//var_dump($options);
if ( isset($options["enable_portfolio"]) && $options["enable_portfolio"] ) {

	// go through each theme and activate portfolio post types

	if ( empty($options["themes"]) || !array($options["themes"])) return;
	$theme_types = $options["themes"];
	foreach ( $theme_types as $key => $theme ) {

		// post types
		if ( isset( $theme['post_types'] ) && is_array( $theme['post_types'] ) ) {
			foreach ( $theme['post_types'] as $post_type => $post_type_args ) {
				register_post_type( $post_type, $post_type_args );
			}
		}

		// taxonomies
		if ( isset( $theme['taxonomies'] ) && is_array( $theme['taxonomies'] ) ) {
			foreach ( $theme['taxonomies'] as $tax => $tax_args) {

				$tax_post_types = $tax_args['post_types'];

				// remove "post_types", isn't a register_taxonomy argument we are just using it for post type linking
				unset( $tax_args['post_types'] );
				$console_this = register_taxonomy( 'cityhub_portfolio_cat', $tax_post_types, $tax_args );
			}
		}

	}
}

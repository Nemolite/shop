<?php
/**
 * Initialize the custom Theme Options.
 *
 * @package OptionTree
 */

add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @since 2.0
 */
function custom_theme_options() {

	// OptionTree is not loaded yet, or this is not an admin request.
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() ) {
		return false;
	}

	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option( ot_settings_id(), array() );

	/**
	 * Custom settings array that will eventually be
	 * passes to the OptionTree Settings API Class.
	 */
	$custom_settings = array(
		'contextual_help' => array(
			'content' => array(
				array(
					'id'      => 'option_types_help',
					'title'   => __( 'Option Types', 'theme-text-domain' ),
					'content' => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>',
				),
			),
			'sidebar' => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>',
		),
		'sections'        => array(
			/*
			array(
				'id'    => 'option_types',
				'title' => __( 'Option Types', 'theme-text-domain' ),
			),
			*/
			array(
				'id'    => 'slider_to_main',
				'title' => __( 'Слайдер на главной', 'theme-text-domain' ),
			),
			array(
				'id'    => 'social_to_footer',
				'title' => __( 'Ссылки на социальные сети в футере', 'theme-text-domain' ),
			),
		),
		'settings'        => array(
			/**
			 * Slider to main
			 */
			array(
				'id'           => 'main_slide_1',
				'label'        => __( 'Для первого слайда', 'theme-text-domain' ),
				'desc'         => sprintf( __( 'Изображение первого слайда', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'Send to OptionTree', 'theme-text-domain' ) ), 'FTP' ),			
				'type'         => 'upload',
				'section'      => 'slider_to_main',	
				'operator'     => 'and',
			),
			array(
				'id'           => 'main_slide_2',
				'label'        => __( 'Для второго слайда', 'theme-text-domain' ),
				'desc'         => sprintf( __( 'Изображение второго слайда', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'Send to OptionTree', 'theme-text-domain' ) ), 'FTP' ),			
				'type'         => 'upload',
				'section'      => 'slider_to_main',	
				'operator'     => 'and',
			),

			array(
				'id'           => 'main_slide_3',
				'label'        => __( 'Для третьего слайда', 'theme-text-domain' ),
				'desc'         => sprintf( __( 'Изображение третьего слайда', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'Send to OptionTree', 'theme-text-domain' ) ), 'FTP' ),			
				'type'         => 'upload',
				'section'      => 'slider_to_main',	
				'operator'     => 'and',
			),

			/**
			 * Ссылки на социальные сети в футере
			 */
			array(
				'id'           => 'facebook',
				'label'        => __( 'facebook', 'theme-text-domain' ),
				'desc'         => __( 'Ссылка на facebook', 'theme-text-domain' ),	
				'type'         => 'text',
				'section'      => 'social_to_footer',
				'operator'     => 'and',
			),
			array(
				'id'           => 'twitter',
				'label'        => __( 'twitter', 'theme-text-domain' ),
				'desc'         => __( 'Ссылка на twitter', 'theme-text-domain' ),
				'type'         => 'text',
				'section'      => 'social_to_footer',
				'operator'     => 'and',
			),
			array(
				'id'           => 'youtube',
				'label'        => __( 'youtube', 'theme-text-domain' ),
				'desc'         => __( 'Ссылка на youtube', 'theme-text-domain' ),
				'type'         => 'text',
				'section'      => 'social_to_footer',
				'operator'     => 'and',
			),
			array(
				'id'           => 'linkedin',
				'label'        => __( 'linkedin', 'theme-text-domain' ),
				'desc'         => __( 'Ссылка на linkedin', 'theme-text-domain' ),
				'type'         => 'text',
				'section'      => 'social_to_footer',
				'operator'     => 'and',
			),

			array(
				'id'           => 'pinterest',
				'label'        => __( 'pinterest', 'theme-text-domain' ),
				'desc'         => __( 'Ссылка на pinterest', 'theme-text-domain' ),
				'type'         => 'text',
				'section'      => 'social_to_footer',
				'operator'     => 'and',
			),
			
			/**
			 * Demo
			 */
			
		),
	);

	// Allow settings to be filtered before saving.
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	// Settings are not the same update the DB.
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings );
	}

	// Lets OptionTree know the UI Builder is being overridden.
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}

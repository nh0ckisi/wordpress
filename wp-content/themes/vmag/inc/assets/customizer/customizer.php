<?php
/**
 * VMag Theme Customizer.
 *
 * @package VMag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vmag_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('header_image');

	/*------------------------------------------------------------------------------------*/
		/**
		 * Theme Info section
		 */
		$wp_customize->add_section(
	        'vmag_theme_info_section',
	        array(
	            'title'		=> esc_html__( 'Theme Info', 'vmag' ),
	            'priority'  => 1,
	        )
	    );

	    // More Themes
	    $wp_customize->add_setting(
	        'vmag_theme_info', 
	        array(
	            'type'              => 'theme_info',
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_attr',
	        )
	    );
	    $wp_customize->add_control( new Vmag_Info_Custom_Control( 
	        $wp_customize ,
	        'vmag_theme_info',
	            array(
	              'label' => __( 'Theme Information' , 'vmag' ),
	              'section' => 'vmag_theme_info_section',
	            )
	        )
	    );
}
add_action( 'customize_register', 'vmag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vmag_customize_preview_js() {
	wp_enqueue_script( 'vmag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'vmag_customize_preview_js' );

/**
 * Added customizer scripts
 */
function vmag_customizer_script() {
	wp_enqueue_script( 'vmag-customizer-script', get_template_directory_uri() .'/inc/js/customizer-scripts.js', array("jquery","jquery-ui-draggable"),'', true  );

	wp_enqueue_style( 'vmag-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css', array(), '1.0.0' );

}
add_action( 'customize_controls_enqueue_scripts', 'vmag_customizer_script' );
<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package themely framework
 */

/**
 * Display upgrade notice on customizer page
 */
function verb_lite_prefix_upsell_notice() {

	// Enqueue the script
	wp_enqueue_script(
		'prefix-customizer-upsell',
		get_template_directory_uri() . '/js/upsell.js',
		array(), '1.0.0',
		true
	);

	// Localize the script
	wp_localize_script(
		'prefix-customizer-upsell',
		'prefixL10n',
		array(
			'prefixURL'	=> esc_url( 'https://www.themely.com/themes/verb/' ),
			'prefixLabel'	=> __( 'View Pro Version', 'verb-lite' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'verb_lite_prefix_upsell_notice' );


/**
 * Display Themely Blog Feed
 */
add_action( 'wp_dashboard_setup', 'verb_lite_dashboard_setup_function' );
function verb_lite_dashboard_setup_function() {
    add_meta_box( 'verb_lite_dashboard_widget', 'Themely News & Updates', 'verb_lite_dashboard_widget_function', 'dashboard', 'side', 'high' );
}
function verb_lite_dashboard_widget_function() {
    echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
          'url' => esc_url( 'https://www.themely.com/feed/' ),
          'title' => 'Themely News & Updates',
          'items' => 3,
          'show_summary' => 1,
          'show_author' => 0,
          'show_date' => 1
     ));
     echo '</div>';
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function verb_lite_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'verb_lite_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function verb_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'verb_lite_body_classes' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function verb_lite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'verb_lite_setup_author' );


/* Load theme welcome screen */

require get_template_directory() . '/inc/welcome/theme-welcome.php';
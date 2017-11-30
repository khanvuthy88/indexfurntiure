<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package indexfurinture
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function indexfurniture_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'indexfurniture_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function indexfurniture_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'indexfurniture_pingback_header' );


function idf_get_thumbnail_url( $size = 'full' ) {
	global $post;
	if (has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
		return $image[0];
	}

	// use first attached image
	$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
	if (!empty($images)) {
		$image = reset($images);
		$image_data = wp_get_attachment_image_src( $image->ID, $size );
		return $image_data[0];
	}

	// use no preview fallback
	if ( file_exists( get_template_directory().'/images/nothumb-'.$size.'.png' ) )
		return get_template_directory_uri().'/images/nothumb-'.$size.'.png';
	else
		return '';
}

/*-----------------------------------------------------------------------------------*/
/*  Excerpt
/*-----------------------------------------------------------------------------------*/

// Increase max length

function idf_excerpt_length($length) {
	return 100;
}
add_filter('excerpt_length', 'idf_excerpt_length', 20);

// Remove [...] and shortcodes

function idf_custom_excerpt($output) {
	return preg_replace('/\[[^\]]*]/', '', $output);
}
add_filter('get_the_excerpt', 'idf_custom_excerpt');

// Truncate string to x letters/words

function idf_truncate($str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;') {
	if ($units == 'letters') {
		if (mb_strlen($str) > $length) {
			return mb_substr($str, 0, $length) . $ellipsis;
		} else {
			return $str;
		}
	} else {
		$words = explode(' ', $str);
		if (count($words) > $length) {
			return implode(" ", array_slice($words, 0, $length)) . $ellipsis;
		} else {
			return $str;
		}
	}
}

if (!function_exists('idf_excerpt')) {
	function idf_excerpt($limit = 40) {
		return esc_html(idf_truncate(get_the_excerpt() , $limit, 'words'));
	}
}
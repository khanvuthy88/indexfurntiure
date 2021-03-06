<?php
/**
 * indexfurinture functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package indexfurinture
 */

if ( ! function_exists( 'indexfurniture_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function indexfurniture_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on indexfurinture, use a find and replace
		 * to change 'indexfurniture' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'indexfurniture', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('featured', 292, 400, true); //featured area
		add_image_size('featured1', 400, 250, true); //latest post thumb
		add_image_size('featured2', 240, 150, true); //latest post thumb medium
		add_image_size('featured3', 160, 100, true); //latest post thumb small
		add_image_size('featuredfull', 830, 450, true); //single post thumb
		add_image_size('related', 160, 100, true); //related
		add_image_size('widgetthumb', 100, 62, true); //widget
		add_image_size('widgetfull', 300, 200, true); //widget full
		add_image_size('slider', 234, 146, true); //footer carousel

		add_action( 'init', 'indexfurniture_wp_review_thumb_size', 11 );
		function indexfurniture_wp_review_thumb_size() {
			add_image_size( 'wp_review_large', 300, 200, true );
			add_image_size( 'wp_review_small', 100, 62, true );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'indexfurniture' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'indexfurniture_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'indexfurniture_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function indexfurniture_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indexfurniture_content_width', 640 );
}
add_action( 'after_setup_theme', 'indexfurniture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function indexfurniture_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'indexfurniture' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'indexfurniture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'indexfurniture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function indexfurniture_scripts() {
	wp_enqueue_style( 'indexfurniture-style', get_stylesheet_uri() );
	wp_enqueue_style('indexfurniture-custome',get_template_directory_uri().'/css/rd-navbar.css');

	wp_enqueue_script('indexfurniture-core-js',get_template_directory_uri().'/js/core.min.js',array(),'',true);

	wp_enqueue_script( 'indexfurniture-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('indexfurniture-script',get_template_directory_uri().'/js/script.js',array(),'',true);
	wp_enqueue_script( 'indexfurniture-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'indexfurniture_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


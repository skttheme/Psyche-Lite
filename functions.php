<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'psyche_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function psyche_lite_setup() {
	$GLOBALS['content_width'] = apply_filters( 'psyche_lite_content_width', 640 );
	load_theme_textdomain( 'psyche-lite', get_stylesheet_directory_uri() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 46,
		'width'       => 138,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'psyche-lite' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f7fafc'
	) );
} 
endif; // psyche_lite_setup
add_action( 'after_setup_theme', 'psyche_lite_setup' );

function psyche_lite_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'psyche-lite' ),
		'description'   => esc_html__( 'Appears on sidebar', 'psyche-lite' ),
		'id'            => 'fc-dcr-sidebar',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'psyche-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'psyche-lite' ),
		'id'            => 'fc-1-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'psyche-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'psyche-lite' ),
		'id'            => 'fc-2-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'psyche-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'psyche-lite' ),
		'id'            => 'fc-3-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'psyche-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'psyche-lite' ),
		'id'            => 'fc-4-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'psyche_lite_widgets_init' );


add_action( 'wp_enqueue_scripts', 'psyche_lite_enqueue_styles' );
function psyche_lite_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'psyche_lite_child_styles', 99);
function psyche_lite_child_styles() {
  wp_enqueue_style( 'psyche-lite-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function psyche_lite_admin_style() {
  wp_enqueue_script('psyche-lite-admin-script', get_stylesheet_directory_uri()."/js/psyche-lite-admin-script.js");
}
add_action('admin_enqueue_scripts', 'psyche_lite_admin_style');

function psyche_lite_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_psyche_lite_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'psyche-lite-about-page-style', get_stylesheet_directory_uri() . '/css/psyche-lite-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'psyche_lite_admin_about_page_css_enqueue' );

function psyche_lite_admin_css_style() {
  wp_enqueue_style('psyche-lite-admin-style', get_stylesheet_directory_uri()."/css/psyche-lite-admin-style.css");
}
add_action('admin_enqueue_scripts', 'psyche_lite_admin_css_style');

function psyche_lite_dequeue_decor_lite_custom_js() {
	wp_dequeue_script( 'vet-clinic-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01062020', true );
	wp_dequeue_script( 'vet-clinic-lite-customscripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	wp_dequeue_style( 'vet-clinic-lite-animation-style', get_template_directory_uri()."/css/animation.css" );
}
add_action( 'wp_enqueue_scripts', 'psyche_lite_dequeue_decor_lite_custom_js', 20 );

add_action( 'wp_enqueue_scripts', 'psyche_lite_child_navigation', 99);
function psyche_lite_child_navigation() {
  wp_enqueue_script('psyche-lite-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true );
  wp_enqueue_script( 'psyche-lite-child-navigation', get_stylesheet_directory_uri(). '/js/navigation.js');
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'psyche_lite_activation_notice' );
}
function psyche_lite_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="psyche-lite-notice-container">
        	<div class="psyche-lite-notice-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="psyche-lite-notice-content">
            <div class="psyche-lite-notice-heading"><?php echo esc_html__('Thank you for installing Psyche Lite!', 'psyche-lite'); ?></div>
            <p class="largefont"><?php echo esc_html__('Psyche Lite comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'psyche-lite'); ?></p>
            </div>
            <div class="psyche-lite-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'psyche_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function psyche_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function psyche_lite_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'psyche_lite_load_dashicons', 999);

/**
 * Retrieve webfont URL to load fonts locally.
 */
/**
* Enqueue theme fonts.
*/
function psyche_lite_fonts() {
$fonts_url = psyche_lite_get_fonts_url();

// Load Fonts if necessary.
if ( $fonts_url ) {
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	wp_enqueue_style( 'psyche-lite-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
}
}
add_action( 'wp_enqueue_scripts', 'psyche_lite_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'psyche_lite_fonts', 1 );
 
function psyche_lite_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
		'Anton:200,300,400,500,600,700,800',
		'Oswald:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'psyche_lite_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

define('PSYCHE_LITE_SKTTHEMES_URL','https://www.sktthemes.org');
define('PSYCHE_LITE_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/psychotherapist-wordpress-theme/');
define('PSYCHE_LITE_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-psychologist-wordpress-theme/');
define('PSYCHE_LITE_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/vet-clinic-lite-doc/');
define('PSYCHE_LITE_SKTTHEMES_LIVE_DEMO','https://sktperfectdemo.com/themepack/psychiatrist/');
define('PSYCHE_LITE_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('PSYCHE_LITE_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function psyche_lite_remove_parent_function(){	 
	remove_action( 'admin_notices', 'vet_clinic_lite_activation_notice');
	remove_action( 'admin_menu', 'vet_clinic_lite_abouttheme');
	remove_action( 'customize_register', 'vet_clinic_lite_customize_register');
	remove_action( 'wp_enqueue_scripts', 'vet_clinic_lite_custom_css');
}
add_action( 'init', 'psyche_lite_remove_parent_function' );

function psyche_lite_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'vet_clinic_lite_setup' );
}
add_action( 'after_setup_theme', 'psyche_lite_remove_parent_theme_stuff', 0 );

function psyche_lite_unregister_widgets_area(){
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'psyche_lite_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';

function psyche_lite_enqueue_comment_reply_script() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'psyche_lite_enqueue_comment_reply_script' );
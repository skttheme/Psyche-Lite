<?php
/**
 * Psyche Lite Theme Customizer
 *
 * @package Psyche Lite
 */
 
function psyche_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'psyche_lite_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'psyche_lite_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'psyche_lite_custom_header_setup' );
if ( ! function_exists( 'psyche_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see psyche_lite_custom_header_setup().
 */
function psyche_lite_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header .container{
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // psyche_lite_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function psyche_lite_customize_register( $wp_customize ) {
	//Add a class for titles
    class psyche_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#6f4b27',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','psyche-lite'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#f0f0f0',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Header Background Color','psyche-lite'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
	))
	);

	$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#bebebe',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Copyright Text Color','psyche-lite'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);

	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Topbar','psyche-lite'),					
			'priority'		=> null
	));
	
	$wp_customize->add_setting('header_desciption',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_desciption',array(
			'label'	=> esc_html__('Left Side Description','psyche-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'header_desciption'
	));	
	
	$wp_customize->add_setting('header_timing',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_timing',array(
			'label'	=> esc_html__('Header Timing','psyche-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'header_timing'
	));

	$wp_customize->add_setting('header_phonenumbertext',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_phonenumbertext',array(
			'label'	=> esc_html__('Phone Number','psyche-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'header_phonenumbertext'
	));	
	
	// Hide Header Topbar
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'psyche_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show Topbar In Header','psyche-lite'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Header Topbar	 
	 
	$wp_customize->add_section('header_button',array(
			'title'	=> esc_html__('Header Button','psyche-lite'),					
			'priority'		=> null
	));
	
	$wp_customize->add_setting('header_button_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_button_text',array(
			'label'	=> esc_html__('Button Text','psyche-lite'),
			'section'	=> 'header_button',
			'setting'	=> 'header_button_text'
	));	
	
	$wp_customize->add_setting('header_button_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_button_link',array(
			'label'	=> esc_html__('Button Link','psyche-lite'),
			'section'	=> 'header_button',
			'setting'	=> 'header_button_link'
	));

	// Hide Header Button
	$wp_customize->add_setting('hide_header_button',array(
			'sanitize_callback' => 'psyche_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_button', array(
    	   'section'   => 'header_button',    	 
		   'label'	=> esc_html__('Uncheck To Show Header Button In Header','psyche-lite'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Header Button	 
	 
 
	// Transparent Header
	$wp_customize->add_section('header_transparent',array(
			'title'	=> esc_html__('Homepage Header Transparent','psyche-lite'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('option_header_transparent',array(
			'sanitize_callback' => 'psyche_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'option_header_transparent', array(
		   'section'   => 'header_transparent',    	 
		   'label'	=> esc_html__('Uncheck To Enable Transparent Header.','psyche-lite'),
		   'type'      => 'checkbox'
	 ));	
	 // Transparent Header		  	 

	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','psyche-lite'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','psyche-lite'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'psyche_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 450) For Better Resolution.','psyche-lite'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Category / Archive And Single Post Banner Settings','psyche-lite'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,

			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','psyche-lite'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'psyche_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Category / Archive And Single Post. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 450) For Better Resolution.','psyche-lite'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	

	$wp_customize->add_section('footer_text_copyright',array(
			'title'	=> esc_html__('Footer Copyright Text','psyche-lite'),				
			'priority'		=> null
	));
	
	$wp_customize->add_setting('footer_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','psyche-lite'),
			'section'	=> 'footer_text_copyright',
			'setting'	=> 'footer_text'
	));		 
}
add_action( 'customize_register', 'psyche_lite_customize_register' );
//Integer
function psyche_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function psyche_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function psyche_lite_custom_css() {
    wp_enqueue_style(
        'psyche-lite-custom-style',
        get_stylesheet_directory_uri() . '/css/psyche-lite-custom-style.css'  
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 
		$header_trans = esc_html(get_theme_mod('option_header_transparent', 1));
		$header_trans_inner = esc_html(get_theme_mod('option_inner_header_transparent', 1));
		
		
        $custom_css = "
					#sidebar ul li a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.tagcloud a,
					.blocksbox:hover h3,
					.rdmore a,
					.header-phone-number,
					#sidebar li a:hover,
					.main-navigation ul li ul li a,					
					.footer-row .cols-3 ul li a:hover,
					.footer-row .cols-3 ul li.current_page_item a,
					.footer-row .cols-3 ul li.current-menu-item a
					{ 
						 color: {$color} !important;
					}
					
					#sidebar h2::after, #sidebar h3::after, #sidebar h4::after, #sidebar h5::after, #sidebar h6::after, #sidebar h6 #sidebar label::after, #sidebar .wp-block-search__label::after{background: {$color} !important;}

					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.designs-thumb,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.social-icons a:hover,
					.cart-customlocation:hover .custom-cart-count
					{ 
					   background-color: {$color} !important;
					}

					.titleborder span:after, .sticky{border-bottom-color: {$color} !important;}
					.header .container{background-color:{$headerbgcolor} !important;}
					.copyright-txt{color: {$footertextcolor} !important;}	
					.main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus {background-color: {$color} !important;}			
				";
        wp_add_inline_style( 'psyche-lite-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'psyche_lite_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function psyche_lite_customize_preview_js() {
	wp_enqueue_script( 'psyche_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'psyche_lite_customize_preview_js' );
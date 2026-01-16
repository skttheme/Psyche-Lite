<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Psyche Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content_navigator">
<?php esc_html_e( 'Skip to content', 'psyche-lite' ); ?>
</a>
<?php
	$header_trans = esc_html(get_theme_mod('option_header_transparent', 1));
	$showpagebanner = esc_html(get_theme_mod('inner_page_banner_option', 1));
	$showpostbanner = esc_html(get_theme_mod('inner_post_banner_option', 1));
	$pagethumb = esc_html(get_theme_mod('inner_page_banner_thumb'));
	$postthumb = esc_html(get_theme_mod('inner_post_banner_thumb'));	

	$headerdescription = esc_html(get_theme_mod('header_desciption'));
	$phonenumber = esc_html(get_theme_mod('header_phonenumbertext'));	
	$headertiming = esc_html(get_theme_mod('header_timing'));
	$hideheadertopbar = esc_html(get_theme_mod('hide_header_topbar', 1));	
	
	$headerbtntext = esc_html(get_theme_mod('header_button_text'));	
	$headerbuttonlink = esc_html(get_theme_mod('header_button_link'));
	$hideheaderbtn = esc_html(get_theme_mod('hide_header_button', 1));	

	$hmp_fb_link = esc_url(get_theme_mod('hmp_fb_link')); 
	$hmp_twitt_link = esc_url(get_theme_mod('hmp_twitt_link'));
	$hmp_linked_link = esc_url(get_theme_mod('hmp_linked_link'));
	$hmp_insta_link = esc_url(get_theme_mod('hmp_insta_link'));
	$hidehomepagesocial = esc_url(get_theme_mod('hide_homepage_social_icon', 1));	
?>
<div id="main-set">

<?php if( $hideheadertopbar == '') { ?>
<div class="head-info-area">
  <div class="center">
  		<?php 
		if (!empty($headerdescription)) { ?>
        	<div class="left"><span class="phntp"><?php echo esc_html($headerdescription); ?></span></div>
        <?php } ?>
        <div class="right"> 
        	<?php 
				if (!empty($headertiming)) { ?>
            <span class="phntp phntp1"><img src="<?php echo esc_url(get_stylesheet_directory_uri());?>/images/icon-time.png"> <?php echo esc_html($headertiming); ?></span>
            <?php } ?>
            <?php 
				if (!empty($phonenumber)) { ?>
            <span class="suptp"><img src="<?php echo esc_url(get_stylesheet_directory_uri());?>/images/header-phone.png"> <a href="<?php echo esc_html_e('tel:','psyche-lite');?> <?php echo esc_html($phonenumber); ?>"><?php echo esc_html($phonenumber); ?></a></span>
            <?php } ?>
     	</div>
        <div class="clear"></div>
  </div>
</div>
<?php } ?>


<div class="header <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transheader');}?>">	
	<div class="container">
    <div class="logo">
		<?php psyche_lite_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <div id="logo-main">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
        </div>
    </div> 
        <div id="navigation"><nav id="site-navigation" class="main-navigation">
				<button type="button" class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
		<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary', 'menu_class' => 'primary-menu menu' ) ); ?>
			</nav>
            </div>
			
            <?php if( $hideheaderbtn == '') { ?>
            <div class="srcrt">
                <div class="header-content-right">
                    <div class="skt-header-extras">
            		<div class="skt-header-button">
                    	<?php if (!empty($headerbuttonlink)) { ?><a href="<?php echo esc_url($headerbuttonlink);?>" target="_blank"><?php } ?><?php if (!empty($headerbtntext)) { ?><img src="<?php echo esc_url(get_stylesheet_directory_uri());?>/images/appointment-icon.png"> <?php echo esc_html($headerbtntext); ?><?php } ?><?php if (!empty($headerbuttonlink)) { ?></a><?php } ?>
                    </div>
        		</div>
                </div>
            </div>
            <?php } ?>
            
        <div class="clear"></div> 
  </div>
  <div class="clear"></div> 
  </div><!--main-set-->
  <?php if( !is_home() && !is_front_page() && is_page()) {?>
      <div class="clear"></div>	
      <div class="inner-banner-thumb">
      	<?php if($showpagebanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($pagethumb)){ ?>
            <img src="<?php echo esc_url($pagethumb); ?>" />
            <?php } } ?>
        <?php } ?>    
        <div class="banner-container"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>   
        <div class="clear"></div>
      </div>
  <?php } ?>
  <?php if( !is_home() && !is_front_page() && !is_page() && is_single() && 'post' == get_post_type()) {?>
      <div class="clear"></div>
      <div class="inner-banner-thumb">
      	<?php if($showpostbanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }  } ?>
         <?php } ?>   
        <div class="banner-container"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>
      
  <?php } ?>  
  <?php if (is_category() || is_archive()) { ?>
  <div class="clear"></div>
  <div class="inner-banner-thumb">
      	<?php if($showpostbanner == '') {?>
        <?php 
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }   ?>
         <?php } ?>   
        <div class="banner-container">
  	    <?php if ( class_exists( 'WooCommerce' ) ) {
		if(is_shop()) {
			?><h1><?php woocommerce_page_title(); ?></h1><?php
		}else{
		?><h1><?php the_archive_title(); ?></h1><?php	
		}
	}else{ ?>
    <h1><?php the_archive_title(); ?></h1>
    <?php } ?>	
  </div>
        <div class="clear"></div>
      </div>
  <?php } ?>
  <div class="clear"></div>  
  
<?php if( $hidehomepagesocial == '') { ?>  
<?php if( !is_home() && is_front_page()) { ?>
<div class="slider-social-area">
            <span class="suptp"><div class="hdrscl social-icons"><?php 
		if (!empty($hmp_fb_link)) { ?>
        <a title="<?php echo esc_attr__('Facebook','psyche-lite'); ?>" class="fb" target="_blank" href="<?php echo esc_url($hmp_fb_link); ?>"></a> 
        <?php } 		
		if (!empty($hmp_twitt_link)) { ?>
        <a title="<?php echo esc_attr__('Twitter','psyche-lite'); ?>" class="tw" target="_blank" href="<?php echo esc_url($hmp_twitt_link); ?>"></a>
        <?php } 
		 if (!empty($hmp_linked_link)) { ?> 
        <a title="<?php echo esc_attr__('Linkedin','psyche-lite'); ?>" class="in" target="_blank" href="<?php echo esc_url($hmp_linked_link); ?>"></a>
        <?php } ?> 
        <?php
		if (!empty($hmp_insta_link)) { ?> 
        <a title="<?php echo esc_attr__('Instagram','psyche-lite'); ?>" class="insta" target="_blank" href="<?php echo esc_url($hmp_insta_link); ?>"></a>
        <?php } ?>    </div></span>
            </div>
<?php } ?>  
<?php } ?>
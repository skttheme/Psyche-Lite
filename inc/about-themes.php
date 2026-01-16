<?php
//about theme info
add_action( 'admin_menu', 'psyche_lite_abouttheme' );
function psyche_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'psyche-lite'), esc_html__('About Theme', 'psyche-lite'), 'edit_theme_options', 'psyche_lite_guide', 'psyche_lite_mostrar_guide');   
} 
//guidline for about theme
function psyche_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'psyche-lite'); ?>
		   </div>
          <p><?php esc_html_e('Psyche Lite is flexible. It is also scalable WordPress theme designed for professionals in mind science, behavioral science, and cognitive psychology. Built with the drag-and-drop Elementor builder, it offers effortless customization for experts in psychotherapy, psychoanalysis, and neuroscience. Its SEO-friendly structure ensures better visibility, making it ideal for showcasing psychological studies, human behavior research, and cognitive science insights. Whether you focus on mental study, psychological analysis, or therapy services, Psyche Lite provides a seamless and professional platform to engage your audience effectively for reiki and healing.','psyche-lite'); ?></p>
          <a href="<?php echo esc_url(PSYCHE_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'psyche-lite'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(PSYCHE_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'psyche-lite'); ?></a> | 
				<a href="<?php echo esc_url(PSYCHE_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'psyche-lite'); ?></a> | 
				<a href="<?php echo esc_url(PSYCHE_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'psyche-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(PSYCHE_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'psyche-lite'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>
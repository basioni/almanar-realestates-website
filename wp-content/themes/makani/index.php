<?php 
	get_header();
	global $makani_options;
?>
    <!-- ========== Search Module ========== -->
	 <div class="site-showcase">
           <?php
            if ( $makani_options[ 'makani_slider_type' ] == 'post-slider' ) {
                  get_template_part( 'partials/home/slider' );
            } elseif ( $makani_options[ 'makani_slider_type' ] == 'properties-slider' ) {
                  get_template_part( 'partials/home/slider-two' );
			 }?>
           <?php  get_template_part( 'partials/search/form' ); ?>
    </div>

   <main class="main cd-main-content">
     <div class="content full">     
		<?php     
        $layout = $makani_options['makani_home_sections']['enabled'];
        if ($layout): foreach ($layout as $key=>$value) {
            switch($key) {
                /* ========== services ========== */
                case 'services':  get_template_part( 'partials/home/services', 'services' ); 
                break;
                /* ==========Featured Properties ========== */
                case 'featured': get_template_part( 'partials/home/featured', 'featured' );
                break;
                /* ========== how-it-works ========== */
                case 'how-it-works': get_template_part( 'partials/home/how-it-works', 'how-it-works' );
                break;
               /* ========== Properties ========== */
                case 'properties': get_template_part( 'partials/home/properties', 'properties' );    
                break; 
                /* ========== contact ========== */
                case 'contact': get_template_part( 'partials/home/contact', 'contact' );    
                break; 
				/* ========== news ========== */
                case 'news': get_template_part( 'partials/home/news', 'news' );    
                break;
				/* ========== partner ========== */
                case 'partner': get_template_part( 'partials/home/partner', 'partner' );    
                break;
            }
        }
        endif; ?> 
 	 </div> 
   </main>     
<?php get_footer(); ?>
<?php 
get_header();
global $makani_options;

global $gallery_images_exists;
$gallery_images_exists = false;
?>

   <section class="header-breadcrumb parallax-single" data-type="background" data-speed="3">
     <div class="parallax-overlay"></div>
        <div class="breadcrumb wow bounceInDown animated"  data-wow-delay="0.3s">
            <div class="container">
            <h3>
			<?php if(function_exists('breadcrumbs')) : ?>
			<?php breadcrumbs() ?>
            <?php endif; ?>
            </h3>
            </div>
        </div>
    </section>

   <section class="content-pages cd-main-content">
      <div class="container" >
         <div class="row">
             <div class="col-lg-8 col-md-12 col-xs-12">
              <?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				global $makani_single_property;
				$makani_single_property = new makani_Property( get_the_ID() );	?>
                
                <?php get_template_part( 'partials/property/single/properties-details' );  ?>
                  
                  
               <div class="card-noeffect wow fadeInUp">
                    <?php /* images */
					if ( $makani_options[ 'makani_property_images' ] ) {
						get_template_part( 'partials/property/single/property-images' );
					}?>
                    
                  <div class="card-block"> 
                       
                       <?php /* conten */
                        if ( $makani_options[ 'makani_property_details' ] ) { ?>
                           <p><?php the_content(); ?></p>
                        <?php }?>
                        
                       <?php /* Features */
                        if ( $makani_options[ 'makani_property_features' ] ) {
                            get_template_part( 'partials/property/single/features' );
                        }?>
                  </div><!-- card-block --> 
                  <?php /* Video */
					if ( $makani_options[ 'makani_property_video' ] ) {
						get_template_part( 'partials/property/single/video' );
					}?>
                    <?php /* map */
					if ( $makani_options[ 'makani_property_map' ] ) {
						get_template_part( 'partials/property/single/map' );
					}?>
                  <div class="card-footer">
                     <div class="row">
                       
                       <?php /* date */
                        if ( $makani_options[ 'makani_property_date' ] ) { ?>
                           <div class="col-md-6">
                              <time><?php the_time('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                           </div>
                        <?php }?>
                        
                        <?php /* share */
                        if ( $makani_options[ 'makani_property_share' ] ) { ?>
                           <div class="col-md-6">
                             <?php get_template_part( 'partials/home/share'); ?>
                           </div> 
                        <?php }?>
                        
                     </div>   
                   </div><!-- card-footer --> 
                 </div> 

			   <?php /* agent */
                if ( $makani_options[ 'makani_property_agent' ] ) {
                    get_template_part( 'partials/property/single/agent-information' );
                }?>
                <?php /* similar */
                if ( $makani_options[ 'makani_similar_properties' ] ) {
                    get_template_part( 'partials/property/single/similar-properties' );
                }?>   
				
                <?php /* Comments */
                if ( $makani_options[ 'makani_property_comments' ] ) { ?>
                   <section class="card-noeffect wow fadeInUp">
                    <?php if ( comments_open() || '0' != get_comments_number() ) : comments_template(); endif; }?>
                   </section>
                <?php endwhile;
				endif; ?>  
                
             </div><!-- col-md-8 col-xs-12 -->
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'property-sidebar' ) ) {
                dynamic_sidebar( 'property-sidebar' );
                } ?>
             </aside>
         </div><!-- row -->  
     </div><!-- container --> 
	</section>  

<?php get_footer(); ?>
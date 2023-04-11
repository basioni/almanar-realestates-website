<?php
/*
 * Template Name: featured
 */ 
get_header();
global $makani_options;


$featured_properties_args = array(
    'post_type' => 'property',
    'meta_query' => array(
        array(
            'key' => 'makani_featured',
            'value' => 1,
        )
    )
);
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
             <div class="archive col-lg-8 col-md-12 col-xs-12">
             <?php $featured_properties_query = new WP_Query( $featured_properties_args );
				if ( $featured_properties_query->have_posts() ) :
				?>
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
					<div class="cbp-vm-options">
                    	<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected tooltip-top fade-animation" data-title="أفقى" data-view="cbp-vm-view-list"><i class="ion-android-list"></i></a>
						<a href="#" class="cbp-vm-icon cbp-vm-grid tooltip-top fade-animation" data-title="راسى" data-view="cbp-vm-view-grid" ><i class="ion-grid"></i></a>

					</div>
					<ul>
                     <?php
						while ( $featured_properties_query->have_posts() ) :
						$featured_properties_query->the_post();
						$featured_property = new makani_Property( get_the_ID() );  ?>
							<li>
                            <div class="card">
                            
                                 <div class="figure-effect ">
                                  <figure class="effect-apollo">
                                    <?php makani_thumbnail( 'properties-thumbnail' ) ?>
                                    <figcaption>
                                    <?php $makani_property_price = get_post_meta(get_the_ID(), 'makani_property_price', true);
									$makani_property_price_postfix = get_post_meta(get_the_ID(), 'makani_property_price_postfix', true);
									if ( !empty( $makani_property_price ) ) { ?>
										<p>
										<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price ) ); ?>
										<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price_postfix ) ); ?>
										</p>
									 <?php } ?>
                                    <a href="<?php the_permalink(); ?>">View more</a>
                                  </figcaption>			
                                </figure>
                               </div>
                               
                             <div class="card-block"> 
                             
                                <div class="card-title">
                                    <h4><a href="<?php the_permalink(); ?>"> <?php echo get_makani_custom_excerpt( get_the_title(), 6 ); ?></a></h4>
                                                                    
                                    <?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
                                    if ( !empty( $makani_property_address ) ) { ?>
                                    <h5>
                                        <i class="icon icon-Pointer"></i>
                                        <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
                                    </h5>
                                    <?php }	?>
                                                    
                                  <a href="<?php the_permalink(); ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a>
                                </div><!-- card-title --> 
                            
                                
                                 
                                  <div class="row details">
                                      <div class="col-sm-12">
                                         <h6><i class="icon icon-Agenda"></i>
                                         تاريخ الاضافة : <?php the_time( "d / m / Y" ); ?>
                                        </h6>
                                     </div> 
                                     <div class="col-sm-12">
                                         <h6><i class="icon  icon-Edit"></i>
                                         تاريخ أخر تعديل : <?php the_modified_time( "d/m/Y" ); ?>
                                        </h6>
                                     </div> 
                                     
                                     <div class="col-sm-12">
                                         <h6><i class="icon icon-Pencil"></i>
                                         <?php $pub_status = get_post_status(); ?>
                                         حالة النشر : <?php echo strtoupper( $pub_status ); ?>
                                        </h6>
                                     </div> 
                                      
                                  </div>
                            
                            
                              </div><!-- card-block --> 
                                 <div class="card-footer">
                                 <div class="row">
                                   <div class="col-md-6">
                                      <time><?php the_date(' d / m / Y'); ?><i class="icon icon-Agenda"></i></time>
                                   </div>
                                   <div class="col-md-6">
                                    <?php get_template_part( 'partials/home/share'); ?> 
                                    </div> 
                                 </div>   
                               </div><!-- card-foote --> 
                             </div>
                            </li><!-- featured-item -->
						 <?php endwhile;
						makani_pagination( $featured_properties_query );
						 wp_reset_postdata();  ?>


                  </ul>
				</div>
                <?php
endif;
?>
             </div>
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'property-sidebar' ) ) {
                dynamic_sidebar( 'property-sidebar' );
                } ?>
             </aside>
             
         </div><!-- row -->  
     </div><!-- container --> 
	</section>
                       
<?php get_footer(); ?>
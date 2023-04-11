<?php 
/*
 * Single agent page
 */
get_header();
global $makani_options;
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
        <div class="container">
         <div class="row">
             <div class="col-lg-8 col-md-12 col-xs-12">
             
                            <?php if ( have_posts() ) : while ( have_posts() ) :  the_post();  ?>
                              <?php get_template_part( 'partials/agent/single/agent-info' ); ?>
                              <?php the_content(); ?>
                           <?php endwhile; endif;

                          
                            global $paged;
                            $properties_list_arg = array(
                                'post_type' => 'property',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'meta_query' => array(
                                    array(
                                        'key' => 'makani_agents',
                                        'value' => get_the_ID(), 
                                        'compare' => '='
                                    )
                                ),
                            );

                    $properties_list_query = new WP_Query( $properties_list_arg );
                    if ( $properties_list_query->have_posts() ) : ?>
                    <section class="related-post card-noeffect cbp-vm-view-grid">
                       <div class="container">
                          <div class="row">
                            <h3>عقارات الوكيل <?php the_title(); ?> </h3>
                            <div class="divider"><span></span></div>
                            </div>
                            <ul>
							<?php global $property_list_counter;
                                $property_list_counter = 1;
                                while ( $properties_list_query->have_posts() ) :
                                    $properties_list_query->the_post(); 
									 get_template_part( 'partials/property/templates/property-for-grid' ); 
									 $property_list_counter++;
                                endwhile;
                                makani_pagination( $properties_list_query );
                                wp_reset_postdata();
                            endif; ?>
                          </ul>  
                       </div>
                    </section> 
                        
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

                        
                       
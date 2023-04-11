<?php
global $makani_options;
$number_of_featured_properties = intval( $makani_options[ 'makani_featured_number' ] );
if( !$number_of_featured_properties ) {
    $number_of_featured_properties = 3;
}
$featured_properties_args = array(
    'post_type' => 'property',
    'posts_per_page' => $number_of_featured_properties,
    'meta_query' => array(
        array(
            'key' => 'makani_featured',
            'value' => 1,
        )
    )
);
$featured_properties_query = new WP_Query( $featured_properties_args );
if ( $featured_properties_query->have_posts() ) :
?>
<section class="featured">
 <div class="container">
  <div class="row">
     <?php
     if ( ! empty( $makani_options[ 'makani_featured_title' ] ) ) {   ?>
     <h3><?php echo esc_html( $makani_options[ 'makani_featured_title' ] ); ?></h3><div class="divider"><span></span></div>
     <?php  }  ?>
    </div><!-- row --> 
    <div id="owl-demo" class="owl-carousel  wow fadeInLeft animated" data-wow-offset="10" data-wow-delay="0.4s">

            <?php
            while ( $featured_properties_query->have_posts() ) :
            $featured_properties_query->the_post();
            $featured_property = new makani_Property( get_the_ID() );  ?>
                <div class="featured-item item">
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
                            <h4><a href="<?php the_permalink(); ?>"><?php echo get_makani_custom_excerpt( get_the_title(), 5 ); ?></a></h4>
                            <?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
							if ( !empty( $makani_property_address ) ) { ?>
							<h5>
                            <i class="icon icon-Pointer"></i>
							<?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
                            <?php
							$city_term = $featured_property->get_taxonomy_first_term( 'property-city', 'all' );
							if ( $city_term ) {  ?> 
							<a href="<?php echo esc_url( get_term_link( $city_term ) ); ?>">
							   / <?php echo esc_html( $city_term->name ); ?>
							</a>
							<?php } ?>
                            </h5>
						   <?php }	?>
                        
                           <a href="<?php the_permalink(); ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a>
                        </div><!-- card-title --> 
                          <?php include TEMPLATEPATH.'/partials/home/properties-details.php'; ?>
                         <?php if($post->post_content != "") : ?>
                           <p class="sub-title"><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
                        <?php endif; ?>
                     </div><!-- card-block --> 
                    <div class="card-footer">
                     <div class="row">
                       <div class="col-md-6">
                    	  <time><?php the_time('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                       </div>
                       <div class="col-md-6 no-padding">
                         <?php get_template_part( 'partials/home/share'); ?>
                        </div> 
                     </div>   
                   </div><!-- card-foote --> 
                 </div><!-- card --> 
               </div><!-- featured-item -->
             <?php endwhile;
             wp_reset_postdata();  ?>
      
       </div><!-- owl-carousel --> 
  </div><!-- container -->  
</section><!-- Featured Properties-->
       
<?php
endif;
?>
<div class="clearfix"></div>
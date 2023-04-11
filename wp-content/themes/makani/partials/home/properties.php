<?php
global $makani_options;
$number_of_properties = intval( $makani_options[ 'makani_properties_number' ] );
if( !$number_of_properties ) {
    $number_of_properties = 10;
}
$properties_args = array(
    'post_type' => 'property',
    'posts_per_page' => $number_of_properties,
);

$properties_query = new WP_Query( $properties_args );
if ( $properties_query->have_posts() ) :
?>
<section class="container recently-offer">
   <div class="row">
     <?php
     if ( ! empty( $makani_options[ 'makani_properties_title' ] ) ) {   ?>
     <h3><?php echo esc_html( $makani_options[ 'makani_properties_title' ] ); ?></h3><div class="divider"><span></span></div>
     <?php  }  ?>
    <div class="masonry-wrapper">
	<?php
    while ( $properties_query->have_posts() ) :
    $properties_query->the_post();
    $featured_property = new makani_Property( get_the_ID() ); 
    $makani_featured = get_post_meta(get_the_ID(), 'makani_featured', true);  ?>          

    <?php  if (  $makani_featured != '1' ) { ?>
         <div class="col-sm-6 item-masonry" >
                 <div class="card wow fadeInUp">
                 
                   <?php  if (has_post_thumbnail()) {  ?>
                     <div class="figure-effect">
                      <figure class="effect-winston">
						<?php echo the_post_thumbnail( 'properties-thumbnail' ); ?>
						<figcaption>
							<p class="gallery">
                              <a href="<?php $thumbnail_id=get_the_post_thumbnail($post->ID); preg_match ('/src="(.*)" class/',$thumbnail_id,$link); echo $link[1]; ?>" rel="prettyPhoto[gallery1]" title="<?php the_title(); ?>"><i class="icon icon-Search"></i></a>
                              <a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i></a>
							</p>
						</figcaption>			
					 </figure>
                    </div>
                   <?php } ?> 
                    <div class="card-block"> 
                        <h5><?php echo get_makani_custom_excerpt( get_the_title(), 7 ); ?></h5>
                        
						<?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
                        if ( !empty( $makani_property_address ) ) { ?>
                        <h6 class="sub-address">
                            <i class="icon icon-Pointer"></i>
                            <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
                            <?php
                            $city_term = $featured_property->get_taxonomy_first_term( 'property-city', 'all' );
                            if ( $city_term ) {  ?> 
                            <a href="<?php echo esc_url( get_term_link( $city_term ) ); ?>">
                               / <?php echo esc_html( $city_term->name ); ?>
                            </a>
                            <?php } ?>
                        </h6>
                        <?php }	?>
                         
                        <?php if($post->post_content != "") : ?>
                           <p class="sub-title"><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
                        <?php endif; ?>
                        
                        <?php include TEMPLATEPATH.'/partials/home/properties-details.php'; ?>
                     </div><!-- featured-item --> 
                    <div class="card-footer">
                    <div class="row">
                      <div class="col-md-6"><a href="<?php the_permalink(); ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a></div>
                      <div class="col-md-6">
                         <?php get_template_part( 'partials/home/share'); ?>
                        </div> 
                     </div>   
                        
                   </div><!-- card-foote --> 
                 </div><!-- card -->   
                </div>
                
    <?php } ?>
    
    <?php endwhile;
    wp_reset_postdata();  ?>
   </div><!-- masonry-wrapper -->  
  </div> <!-- row -->  
</section>     
<?php  endif; ?>
<div class="clearfix"></div>









                
             
           
<?php
global $makani_options;
$makani_slider_number = intval( $makani_options[ 'makani_slider_number' ] );
if( !$number_of_slider ) {
	$number_of_slider = 3;
}
$slider_args = array(
	'post_type' => 'property',
	'posts_per_page' => $makani_slider_number ,
	 'meta_query' => array(
        array(
            'key' => 'makani_silder_property',
            'value' => 1,
        )
    )
);
$slider_query = new WP_Query( $slider_args );
if ( $slider_query->have_posts() ) { ?>

   <div class="slider-mask overlay-transparent"></div>  
       <div id="owl-demo-slider" class="slider owl-carousel owl-theme">
		<?php
		while ( $slider_query->have_posts() ) :
            $slider_query->the_post();
            $featured_property = new makani_Property( get_the_ID() );  ?>
		
           <div class="item">
			<?php if (has_post_thumbnail()) {
            the_post_thumbnail('slider-thumbnail');
        
            } elseif (!empty( $makani_options['makani_banner_image']['url'] )) {
            ?>
             <div class="slider-mask overlay-transparent"></div>
            <img src="<?php echo $makani_options['makani_banner_image']['url']; ?>" alt="<?php the_title(); ?>" class="bigbanner_image" />
            
            <?php 
            } else { ?>
                <div class="slider-mask overlay-transparent"></div>
                <img src="<?php bloginfo ('template_url'); ?>/img/banner-image.jpg" alt="<?php the_title(); ?>" class="bigbanner_image" />
            <?php } ?>
            
            
          <div class="slider-content">
                <div class="container">
                    <div class="properties-content details slider-details">
                        <h3 class="properties-title animated4">
                        <a href="<?php the_permalink(); ?>"><?php echo get_makani_custom_excerpt( get_the_title(), 15 ); ?></a>
                        </h3>
                                    
   <?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
	if ( !empty( $makani_property_address ) ) { ?>
	<h5 class="animated6 slider-address">
        <i class="icon icon-Pointer"></i>
        <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
        <?php $city_term = $featured_property->get_taxonomy_first_term( 'property-city', 'all' );
        if ( $city_term ) {  ?> 
        <?php echo esc_html( $city_term->name ); ?>
        <?php } ?>
	</h5>
	<?php }	?>
                                                       
                                    	
    <?php $makani_property_price = get_post_meta(get_the_ID(), 'makani_property_price', true);
	$makani_property_price_postfix = get_post_meta(get_the_ID(), 'makani_property_price_postfix', true);
	if ( !empty( $makani_property_price ) ) { ?>
		 <h5 class="animated3"><svg class="cost-svg"><use xlink:href="#cost-svg"/></svg>
		<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price ) ); ?>
		<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price_postfix ) ); ?>
		</h5>
	 <?php } ?>
        

   <?php
	$status_term = $featured_property->get_taxonomy_first_term( 'property-status', 'all' );
	if ( $status_term ) {  ?>
		<h5 class="animated3"><svg class="stuts-svg"><use xlink:href="#stuts-svg"/></svg> 
		<?php echo esc_html( $status_term->name ); ?>
		</h5>
	<?php } ?>
   
     
	<?php
    $type_term = $featured_property->get_taxonomy_first_term( 'property-type', 'all' );
    if ( $type_term ) {  ?>
         <h5 class="animated3"><svg class="type-svg"><use xlink:href="#type-svg"/></svg> 
         <?php echo esc_html( $type_term->name ); ?>
         </h5>
    <?php } ?>
    
    
              

                                    </div><!-- properties-content--> 
                                </div>
                           </div>
                      </div><!-- item  -->  
        <?php endwhile; ?>
    </div><!--  owl-demo-slider  -->
                  
    <?php
    } elseif (!empty( $makani_options['makani_banner_image']['url'] )) {
    ?>
    <div class="slider-mask overlay-transparent"></div>
    <img src="<?php echo $makani_options['makani_banner_image']['url']; ?>" alt="" class="banner_image" />
   
    <?php  } else { ?>
    <img src="<?php bloginfo ('template_url'); ?>/img/banner-image.jpg" alt="" class="banner_image" />
    <?php } ?>



<?php
global $makani_options;
$makani_slider_category =  $makani_options[ 'makani_slider_category' ] ;
$makani_slider_number = intval( $makani_options[ 'makani_slider_number' ] );
if( !$number_of_slider ) {
	$number_of_slider = 3;
}
$slider_args = array(
	'post_type' => 'post',
	'cat' => $makani_slider_category ,
	'posts_per_page' => $makani_slider_number
);
$slider_query = new WP_Query( $slider_args );
if ( $slider_query->have_posts() ) {	
?>

   <div class="slider-mask overlay-transparent"></div>  
   <div id="owl-demo-slider" class="slider owl-carousel owl-theme">
    <?php
       while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
        
          <div class="item"> 
                        <?php if (has_post_thumbnail()) {
							  
					     echo the_post_thumbnail();
					   
						} elseif (!empty( $makani_options['makani_banner_image']['url'] )) {?>
						<div class="slider-mask overlay-transparent"></div>
						<img src="<?php echo $makani_options['makani_banner_image']['url']; ?>" alt="" class="banner_image" />
                        
						<?php  } else { ?>
                        <img src="<?php bloginfo ('template_url'); ?>/img/banner-image.jpg" alt="" class="banner_image" />
                        <?php } ?>
						
                      <div class="slider-content">
                          <div class="container">
                                <div class="properties-content">
                                   <h3 class="properties-title animated4"><a href="#"><?php echo get_makani_custom_excerpt( get_the_title(), 18 ); ?></a></h3>
                                   <h4 class="animated5"><?php echo get_makani_custom_excerpt( get_the_content(), 18 ); ?></h4>	
                                </div><!-- properties-content--> 
                            </div>
                      </div>
                  </div><!-- item  -->  
     <?php endwhile; 
	 
	 } elseif (!empty( $makani_options['makani_banner_image']['url'] )) {?>
    <div class="slider-mask overlay-transparent"></div>
    <img src="<?php echo $makani_options['makani_banner_image']['url']; ?>" alt="" class="banner_image" />
    
    <?php  } else { ?>
    <img src="<?php bloginfo ('template_url'); ?>/img/banner-image.jpg" alt="" class="banner_image" />
    <?php } ?>
	 
	  ?>
    </div><!--  owl-demo-slider  -->
    
    

   
    
<?php
global $makani_options;
$makani_services_category =  $makani_options[ 'makani_services_category' ] ;
$number_of_services = intval( $makani_options[ 'makani_services_number' ] );
if( !$number_of_services ) {
	$number_of_services = 3;
}
$servise_args = array(
	'post_type' => 'post',
	'cat' => $makani_services_category ,
	'posts_per_page' => $number_of_services
);
?>
<section class="services features-list">
  <div class="container">
     <?php
     if ( ! empty( $makani_options[ 'makani_services_title' ] ) ) {   ?>
     <h3><?php echo esc_html( $makani_options[ 'makani_services_title' ] ); ?></h3><div class="divider"><span></span></div>
     <?php  }  ?>
     
      <?php
     if ( ! empty( $makani_options[ 'makani_services_subtitle' ] ) ) {   ?>
     <p class="col-md-9 col-sm-12"><?php echo ( $makani_options[ 'makani_services_subtitle' ] ); ?></p>
     <?php  }  ?>
     
  </div><!-- container --> 
  <div class="container">
    <?php 
	$servise_query = new WP_Query( $servise_args );
	if ( $servise_query->have_posts() ) {	
     while ($servise_query->have_posts()) : $servise_query->the_post(); ?>
         
          <article class="col-md-4 col-xs-12 wow flipInY" data-wow-offset="10" data-wow-delay="0.4s">
             <div class="servise-item servise1">
                <?php  if (has_post_thumbnail()) {  ?>
                   <span style="background:url(<?php $thumbnail_id=get_the_post_thumbnail($post->ID); preg_match ('/src="(.*)" class/',$thumbnail_id,$link); echo $link[1]; ?>) no-repeat top;"></span>
                <?php } ?>
                <h4><?php echo get_makani_custom_excerpt( get_the_title(), 3 ); ?></h4>
                <p><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
             </div><!-- servise1 --> 
          </article><!-- col-md-4 col-xs-12  --> 
               
	<?php endwhile; } ?>

   </div><!-- container --> 
</section><!-- services-->
 <div class="clearfix"></div>
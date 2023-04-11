<?php
global $makani_options;
$makani_news_category =  $makani_options[ 'makani_news_category' ] ;
$number_of_news = intval( $makani_options[ 'makani_news_number' ] );
if( !$number_of_news ) {
	$number_of_news = 3;
}
$news_args = array(
	'post_type' => 'post',
	'cat' => $makani_news_category ,
	'posts_per_page' => $number_of_news
);
?>
<!-- ==========news ========== -->
<section class="news">
 <div class="container">
 
  <div class="row">
   <?php
     if ( ! empty( $makani_options[ 'makani_news_title' ] ) ) {   ?>
     <h3><?php echo esc_html( $makani_options[ 'makani_news_title' ] ); ?></h3><div class="divider"><span></span></div>
     <?php  }  ?>
  </div><!-- row --> 
  <div class="row">
    <?php 
	$news_query = new WP_Query( $news_args );
	if ( $news_query->have_posts() ) {	
     while ($news_query->have_posts()) : $news_query->the_post(); ?>
         
         <div class="col-md-4 col-sm-12 col-xs-12 wow flipInY pull-right">
                   <div class="card newblock">
                          <?php makani_thumbnail( 'properties-thumbnail' ) ?>
                          <div class="card-block">
                          <h4><a href="<?php the_permalink(); ?>"><?php echo get_makani_custom_excerpt( get_the_title(), 6 ); ?></a></h4>
                          <time><?php the_time('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                      </div><!-- card-block -->
                   </div><!-- newblock -->
                </div><!-- col-md-4 col-sm-12 col-xs-12 -->
               
	<?php endwhile;
	 } 
	 wp_reset_postdata(); ?> 
   </div><!-- row -->      
 </div><!-- container -->
</section>  
 <div class="clearfix"></div>
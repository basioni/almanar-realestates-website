<?php
/*
 * Template Name: news
 */ 
get_header();
global $makani_options;

$makani_news_category =  $makani_options[ 'makani_news_category' ] ;
if( !$number_of_news ) {
}
$news_args = array(
	'post_type' => 'post',
	'cat' => $makani_news_category ,
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
             
<section class="news">
 <div class="container">
  <div class="row">
    <?php 
	$news_query = new WP_Query( $news_args );
	if ( $news_query->have_posts() ) {	
     while ($news_query->have_posts()) : $news_query->the_post(); ?>
         
         <div class="col-md-6 col-sm-12 col-xs-12 wow flipInY pull-right">
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
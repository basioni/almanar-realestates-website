<?php 
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
              <?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="card-noeffect">
                
                   <?php  if (has_post_thumbnail()) {  ?>
                      <figure class="no-effectimg">
						<?php echo the_post_thumbnail( 'properties-thumbnail' ); ?>
					 </figure>
                   <?php } ?> 
                   
                  <div class="card-block"> 
                       <p><?php the_content(); ?></p>
                  </div><!-- card-block --> 
               
                  
                  <div class="card-footer">
                     <div class="row">
                       <div class="col-md-6">
                          <time><?php the_date('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                       </div>
                       <div class="col-md-6">
                          <?php get_template_part( 'partials/home/share'); ?>
                       </div> 
                     </div>   
                   </div><!-- card-footer --> 
                 </div> 

                 <?php /* Comments */
                if ( $makani_options[ 'makani_property_comments' ] ) { ?>
                   <section class="card-noeffect wow fadeInUp">
                    <?php if ( comments_open() || '0' != get_comments_number() ) : comments_template(); endif; }?>
                   </section>
                <?php endwhile;
				endif; ?> 
                               
             </div><!-- col-md-8 col-xs-12 -->
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'default-page-sidebar' ) ) {
                dynamic_sidebar( 'default-page-sidebar' );
                } ?>
             </aside>
         </div><!-- row -->  
     </div><!-- container --> 
	</section>  

<?php get_footer(); ?>
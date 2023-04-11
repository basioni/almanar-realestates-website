<?php
if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();
    $post_type = get_post_type( get_the_ID() );?>
         
    <li>
      <div class="card">
         <div class="figure-effect ">
          <figure class="effect-apollo">
            <?php makani_thumbnail( 'properties-thumbnail' ) ?>
            <figcaption>
            <a href="<?php the_permalink(); ?>">View more</a>
          </figcaption>			
        </figure>
       </div>
       
        <div class="card-block"> 
            <div class="card-title">
                <h4><a href="<?php the_permalink(); ?>"> <?php echo get_makani_custom_excerpt( get_the_title(), 6 ); ?></a></h4>
              <a href="<?php the_permalink(); ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a>
            </div><!-- card-title --> 
        
            <?php if($post->post_content != "") : ?>
               <p class="sub-title"><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
            <?php endif; ?>
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
       </div><!-- card-foote --> 
     </div>
    </li>

    <?php endwhile;
    global $wp_query;
    makani_pagination( $wp_query );
else :
    makani_nothing_found();
endif;
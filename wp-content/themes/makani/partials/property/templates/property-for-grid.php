<?php
global $makani_options;
global $post;
$grid_property = new makani_Property( get_the_ID() ); ?>
<li>
<div class="card fav-post wow fadeInUp">
                     
     <div class="figure-effect ">
      <?php
             /*
             * Remove from favorites - only for favorites page template
             */
            if( is_page_template( 'templates/favorites.php' ) && is_user_logged_in() ) { ?>
                <div class="trash-favorite">
                    <a class="remove-from-favorite" 
                       data-property-id="<?php the_ID(); ?>"
                       href="<?php echo admin_url('admin-ajax.php'); ?>"
                       title="<?php _e( 'Remove from favorites', 'makani' ); ?>">
                        <i class="ion-ios-trash"></i>
                    </a>
                </div>
            <?php }?>
			
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
        <h4><a href="<?php the_permalink(); ?>"> <?php echo get_makani_custom_excerpt( get_the_title(), 6 ); ?></a></h4>
                                        
		<?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
        if ( !empty( $makani_property_address ) ) { ?>
        <h5>
            <i class="icon icon-Pointer"></i>
            <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
        </h5>
        <?php }	?>
                        
      <a href="<?php the_permalink(); ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a>
    </div><!-- card-title --> 
  
       <div class="row details">
          <?php makani_property_meta( $grid_property, array( 'exclude' => array( 'id' ) ) ); ?>
      </div>



	   <?php if($post->post_content != "") : ?>
       <p class="sub-title"><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
       <?php endif; ?>


     </div><!-- card-block --> 
     <div class="card-footer">
     <div class="row">
       <div class="col-md-6">
          <time><?php the_date(' d / m / Y'); ?><i class="icon icon-Agenda"></i></time>
       </div>
       <div class="col-md-6">
        <?php get_template_part( 'partials/home/share'); ?> 
        </div> 
     </div>   
   </div><!-- card-foote --> 
 </div>
</li>




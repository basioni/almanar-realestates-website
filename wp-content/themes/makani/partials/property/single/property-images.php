<?php $makani_image_one = get_post_meta(get_the_ID(), 'makani_property_images', true); 
 if ( empty( $makani_image_one ) ) { ?>
<figure class="no-effectimg">
		<?php makani_thumbnail( 'properties-thumbnail' ) ?>
</figure>
<?php  }?>
		
 <?php $portfolio_image_one = get_post_meta( $post->ID, 'makani_property_images', false ); 
 if ( ! empty( $makani_image_one ) ) { ?>
 
 <div id="owl-single" class="owl-carousel">
 <?php $image_id = wp_get_attachment_image_src($portfolio_image_one);
 foreach($portfolio_image_one as $image_id) { 
 $image_attributes = wp_get_attachment_image_src( $image_id , 'full'); ?>
  <div class="figure-effect">
	<figure class="effect-winston">
		<?php echo '<img src="' . $image_attributes[0] . '" />'; ?>

	<figcaption>
		 <p class="gallery gallery-single">
		 <a href="<?php echo $image_attributes[0] ;?>" rel="prettyPhoto[gallery1]" title="<?php the_title(); ?>"><i class="icon icon-Search"></i></a>
		</p>
	</figcaption>			
</figure>
</div><!-- item -->
 <?php } ?> 
               
</div>
<?php  }?>
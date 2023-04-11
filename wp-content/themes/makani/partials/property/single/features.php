<?php
global $post;
$features = get_the_terms( $post->ID, 'property-feature' );
if ( !empty( $features ) && is_array( $features ) && !is_wp_error( $features ) ) { ?>
<div class="all-features-single">
	<?php
    foreach( $features as $single_feature ) { ?>
    <div class="meta-inner-wrapper col-md-4 col-xs-6">  
     <?php   echo '<i class="ion-android-done"></i><a href="' . get_term_link( $single_feature->slug, 'property-feature' ) .'"> <span class="meta-item-label">'. $single_feature->name . ' </span></a>';  ?>
   </div>
   <?php } ?>
 </div>   
<?php } ?>



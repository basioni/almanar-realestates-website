<div class="row details">
    <?php $makani_property_price = get_post_meta(get_the_ID(), 'makani_property_price', true);
	$makani_property_price_postfix = get_post_meta(get_the_ID(), 'makani_property_price_postfix', true);
	if ( !empty( $makani_property_price ) ) { ?>
	<div class="col-sm-4">
		<h6><svg class="cost-svg"><use xlink:href="#cost-svg"/></svg>
		<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price ) ); ?>
		<?php echo stripslashes( htmlspecialchars_decode( $makani_property_price_postfix ) ); ?>
		</h6>
	</div>
	 <?php } ?>
     
    <?php
	$status_term = $featured_property->get_taxonomy_first_term( 'property-status', 'all' );
	if ( $status_term ) {  ?>
	  <div class="col-sm-4">
		<h6><svg class="stuts-svg"><use xlink:href="#stuts-svg"/></svg> 
		<a href="<?php echo esc_url( get_term_link( $status_term ) ); ?>"><?php echo esc_html( $status_term->name ); ?></a>
		 </h6>
	 </div>
	<?php } ?>
   
     
	<?php
    $type_term = $featured_property->get_taxonomy_first_term( 'property-type', 'all' );
    if ( $type_term ) {  ?>
    <div class="col-sm-4">
         <h6><svg class="type-svg"><use xlink:href="#type-svg"/></svg> 
         <a href="<?php echo esc_url( get_term_link( $type_term ) ); ?>"><?php echo esc_html( $type_term->name ); ?></a>
         </h6>
    </div>
    <?php } ?>
     
     
      <?php $makani_property_size = get_post_meta(get_the_ID(), 'makani_property_size', true);
		$makani_property_size_postfix = get_post_meta(get_the_ID(), 'makani_property_size_postfix', true);
		if ( !empty( $makani_property_size ) ) { ?>
		<div class="col-sm-4">
		   <h6><svg class="draft-svg"><use xlink:href="#draft-svg"/></svg>
			 <?php echo stripslashes( htmlspecialchars_decode( $makani_property_size ) ); ?>
			 <?php echo stripslashes( htmlspecialchars_decode( $makani_property_size_postfix ) ); ?>
		   </h6>
		 </div>
	 <?php } ?>
                        
      
    <?php $makani_property_bedrooms = get_post_meta(get_the_ID(), 'makani_property_bedrooms', true);
		if ( !empty( $makani_property_bedrooms ) ) { ?>
		<div class="col-sm-4">
			<h6><svg class="bed-svg"><use xlink:href="#bed-svg"/></svg> 
			<?php echo stripslashes( htmlspecialchars_decode( $makani_property_bedrooms ) ); ?>
			</h6>
		 </div>
	<?php }	?>   
       
       
    <?php $makani_property_bathrooms = get_post_meta(get_the_ID(), 'makani_property_bathrooms', true);
		if ( !empty( $makani_property_bathrooms ) ) { ?>
		<div class="col-sm-4">
			<h6><svg class="bath-svg"><use xlink:href="#bath-svg"/></svg> 
			  <?php echo stripslashes( htmlspecialchars_decode( $makani_property_bathrooms ) ); ?>
			</h6>
		 </div>   
	<?php }	?>               
 </div>
 
                         
                        
						
                        
      
                       
                        
                        
                        
                        
                        
                         
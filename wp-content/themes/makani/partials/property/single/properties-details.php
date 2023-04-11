<?php global $makani_single_property;
				$makani_single_property = new makani_Property( get_the_ID() );	?>
<div class="card-noeffect single-title wow bounceInDown ">
                    <h4><?php the_title(); ?></h4>
				   <?php
                    $type_term = $makani_single_property->get_taxonomy_first_term( 'property-type', 'all' );
                    if ( !empty (  $type_term )) {  ?>
                         <h5><svg class="type-svg"><use xlink:href="#type-svg"/></svg> 
                         <?php echo esc_html( $type_term->name ); ?>
                         </h5>
                    <?php } ?>
    
				   <?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
                    if ( !empty( $makani_property_address ) ) { ?>
                     <h5><i class="icon icon-Pointer"></i>
                        <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?> /
                        <?php $city_term = $makani_single_property->get_taxonomy_first_term( 'property-city', 'all' );
                        if ( $city_term ) {  ?> 
                        <?php echo esc_html( $city_term->name ); ?>
                        <?php } ?>
                    </h5>
                    <?php }	?>
    
    
                    <div class="row">
                      <div class="col-md-3 col-xs-4 no-padding">
                        <div class=" btn-singletit">               
                            
						   <?php $makani_property_price = get_post_meta(get_the_ID(), 'makani_property_price', true);
                            $makani_property_price_postfix = get_post_meta(get_the_ID(), 'makani_property_price_postfix', true);
                            if ( !empty( $makani_property_price ) ) { ?>
                                 <h6><svg class="cost-svg"><use xlink:href="#cost-svg"/></svg>
                                <?php echo stripslashes( htmlspecialchars_decode( $makani_property_price ) ); ?>
                                <?php echo stripslashes( htmlspecialchars_decode( $makani_property_price_postfix ) ); ?>
                                </h6>
                             <?php } ?>
	 
				            <?php get_template_part( 'partials/property/single/favorite-and-print' ); ?>
                        </div>
                     </div>
                      <div class="col-md-9 col-xs-8 title-details">
                      
						<?php $makani_property_bedrooms = get_post_meta(get_the_ID(), 'makani_property_bedrooms', true);
                            if ( !empty( $makani_property_bedrooms ) ) { ?>
                               <div class="col-sm-2 no-padding">
                                 <h6><svg class="bed-svg"><use xlink:href="#bed-svg"/></svg> 
                                    <?php echo stripslashes( htmlspecialchars_decode( $makani_property_bedrooms ) ); ?>
                                 </h6>
                               </div>
                        <?php }	?>   
    
    
						 <?php $makani_property_bathrooms = get_post_meta(get_the_ID(), 'makani_property_bathrooms', true);
                            if ( !empty( $makani_property_bathrooms ) ) { ?>
                             <div class="col-sm-2 no-padding">
                                <h6><svg class="bath-svg"><use xlink:href="#bath-svg"/></svg> 
                                  <?php echo stripslashes( htmlspecialchars_decode( $makani_property_bathrooms ) ); ?>
                                </h6>
                             </div>   
                        <?php }	?>  
                           
						<?php
                        $status_term = $makani_single_property->get_taxonomy_first_term( 'property-status', 'all' );
                        if ( !empty ( $status_term )) {  ?>
                          <div class="col-sm-4 no-padding pull-right">
                            <h6><svg class="stuts-svg"><use xlink:href="#stuts-svg"/></svg> 
                            <a href="<?php echo esc_url( get_term_link( $status_term ) ); ?>"><?php echo esc_html( $status_term->name ); ?></a>
                             </h6>
                         </div>
                        <?php } ?>
    
						 <?php $makani_property_size = get_post_meta(get_the_ID(), 'makani_property_size', true);
                            $makani_property_size_postfix = get_post_meta(get_the_ID(), 'makani_property_size_postfix', true);
                            if ( !empty( $makani_property_size ) ) { ?>
                            <div class="col-sm-4 no-padding pull-right">
                               <h6><svg class="draft-svg"><use xlink:href="#draft-svg"/></svg>
                                 <?php echo stripslashes( htmlspecialchars_decode( $makani_property_size ) ); ?>
                                 <?php echo stripslashes( htmlspecialchars_decode( $makani_property_size_postfix ) ); ?>
                               </h6>
                             </div>
                         <?php } ?>
     
                         </div><!-- col-md-8 col-xs-12-->
                  </div><!-- row -->                    
                </div><!-- single-title -->
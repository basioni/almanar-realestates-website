<?php global $makani_options; ?>
   <!-- ========== sign-member ========== -->
      <div data-type="background" data-speed="3" class="sign-member parallax">
        <div class="parallax-overlay"></div>
            <div class="container parallax-container">
            <div class="row">
                    <h3>هل لديك عقار للبيع أو الإيجار؟</h3>
                    <div class="divider"><span></span></div>
                    
                    <div class="col-md-6 col-sx-12 wow fadeInLeft animated">
                     <div class="sign-memberblock">
                        <div class="col-md-2 col-xs-2 no-padding">
                           		
            <?php  $add_property_page = "";
			if ( isset($makani_options['makani_submit_property_page']) && !empty( $makani_options['makani_submit_property_page'] ) ) {
				$add_property_page = get_permalink( $makani_options[ 'makani_submit_property_page' ] );
			}
            ?>
            <a href="<?php echo esc_url( $add_property_page ); ?>" class="btn hvr-icon-back"></a>
                                
                         </div>
                         <div class="sign-memberblocktxt col-md-10 col-xs-10">
                              <h4> <i class="ion-clipboard"></i> أضف تفاصيل العقار</h4>
                              <p><?php echo $makani_options['makani_add_property_title2']; ?></p>
                           </div>
                       </div><!-- sign-memberblock --> 
                    </div><!-- col-md-6 col-sx-12 -->
                    
                    <div class="col-md-6 col-sx-12 wow fadeInRight animated">
                       <div class="sign-memberblock">
                         <div class="col-md-2 col-xs-2 no-padding">
                         
							<?php if ( is_user_logged_in() ) { 
                            if ( !empty( $edit_profile_url ) ) { ?>
                               <a href="<?php echo esc_url( $edit_profile_url ); ?>" class="btn hvr-icon-back"></a>
                             <?php }
                             } else { ?>
                              <a href="#login-modal" data-toggle="modal" class="btn hvr-icon-back"></a>
                            <?php } ?>
        
                         </div>
                         <div class="sign-memberblocktxt col-md-10 col-xs-10">
                               <h4> <i class="ion-checkmark"></i> تسجيل الدخول</h4>
                               <p><?php echo $makani_options['makani_add_property_title']; ?></p>
                         </div>
                       </div><!-- sign-memberblock --> 
                    </div><!-- col-md-6 col-sx-12 -->
                     
                </div><!-- row --> 
            </div><!-- container --> 
       </div><!-- sign-member --> 
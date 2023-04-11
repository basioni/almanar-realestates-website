<?php global $makani_options; ?>
    <!-- ========== contact ========== -->
     <div class="container"> 
          <div class="contact"> 
             <h3><?php echo $makani_options['contact-form-title'] ;?></h3>
              <div data-type="background" data-speed="3" class="parallax2">
                  <div class="parallax-overlay"></div>
             </div><!-- parallax -->
             
			 <?php
             if ( ! empty( $makani_options[ 'contact-phone' ] ) ) {   ?>
             <div class="contact-phone">
                <i class="ion-android-call"></i><p><?php echo esc_html( $makani_options['contact-phone'] ); ?></p>
             </div>
             <?php  }  ?>
             
             
             <div class="contact-form wow fadeInRight " >
              <?php $contact_form_index = $makani_options['contact-form-index'] ; ?>
                <?php  echo do_shortcode( $contact_form_index ); ?>
             </div><!-- contact-form -->  
       </div><!-- contact --> 
    </div><!-- container --> 
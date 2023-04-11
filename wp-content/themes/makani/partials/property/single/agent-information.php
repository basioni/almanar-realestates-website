<?php
 global $makani_options;
 $makani_agent_display_option = get_post_meta(get_the_ID(), 'makani_agent_display_option', true);

		if ( $makani_agent_display_option == 'agent_info' ) {
			 echo '';
		} elseif ( $makani_agent_display_option == 'my_profile_info' ) {
			  echo '';
		} else {
             echo '';
		}
 ?>
<?php
global $makani_options;
global $makani_single_property;
$agent_id = intval( $makani_single_property->get_agent_id() );

if ( $agent_id > 0 ) {

    $makani_agent = new makani_Agent( $agent_id );
    $agent_post = get_post( $agent_id );
    $agent_permalink = get_permalink( $agent_id );
    ?>
    
    <!-- ==========agent ========== -->
    <section class="agent card-noeffect">
        <div class="container">
              <div class="col-md-7 col-xs-12 pull-right">
                  <?php if ( has_post_thumbnail( $agent_id ) ) {?>
                        <figure class="agent-image">
                            <a href="<?php echo esc_url( $agent_permalink ); ?>" >
                            <?php echo get_the_post_thumbnail( $agent_id, 'makani-agent-thumbnail'); ?>
                            </a>
                        </figure>
                    <?php } ?>
            
                
                <h3><a href="<?php echo esc_url( $agent_permalink ); ?>"><?php echo esc_html( $agent_post->post_title ); ?></a></h3>
                
                <?php $agent_job_title = $makani_agent->get_job_title();
                if ( !empty( $agent_job_title ) ) { ?>
                  <h4><?php echo esc_html( $agent_job_title ); ?> </h4>
                <?php } ?>
               
                 <ul class="social-footer social-agent">
                   
                    <?php 
                    $facebook_url = $makani_agent->get_facebook();
                    if ( !empty( $facebook_url ) ) { ?>
                    <li class="facebook">
                       <a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank"><i class="ion-social-facebook"></i></a>
                    </li> 
                    <?php } ?>
                
                    
                    <?php 
                    $twitter_url = $makani_agent->get_twitter();
                    if ( !empty( $twitter_url ) ) { ?>
                    <li class="twitter">
                      <a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank"><i class="ion-social-twitter"></i></a>
                    </li>
                    <?php } ?>
                
                    <?php $google_url = $makani_agent->get_google();
                    if ( !empty( $google_url ) ) { ?>
                       <li class="googleplus">
                          <a href="<?php echo esc_url( $google_url ); ?>" target="_blank"><i class="ion-social-googleplus"></i></a>
                        </li>
                     <?php } ?>
    
    
                   <?php $instagram_url = $makani_agent->get_instagram();
                    if ( !empty( $instagram_url ) ) {?>
                        <li class="linkedin">
                            <a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank">
                               <i class="ion-social-instagram-outline"></i>
                            </a>
                        </li>
                    <?php } ?>
                
                    <?php $linkedin_url = $makani_agent->get_linkedin();
                    if ( !empty( $linkedin_url ) ) { ?>
                        <li class="linkedin">
                          <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank"><i class="ion-social-linkedin"></i></a>
                        </li>
                    <?php } ?>
                </ul>
                
                
                <?php  if ( ! is_singular( 'agent' ) ) {
                    echo apply_filters( 'the_content', get_makani_custom_excerpt( $agent_post->post_content ) );  ?>
                   <a class="btn" href="<?php echo esc_url( $agent_permalink ); ?>">الملف الشخصى</a>
                <?php } ?>
       
       
              </div><!-- col-md-7 col-xs-12 -->
              <div class="col-md-5 col-xs-12">
                 <ul class="contact-agent">
                    <?php $mobile = $makani_agent->get_mobile();
					if ( !empty( $mobile ) ) {?> 
                    <li><i class="ion-ios-telephone-outline"></i><?php echo esc_html( $mobile ); ?> </li>
					<?php }  ?>
			
                    <?php $office_phone = $makani_agent->get_office_phone(); 
					if ( !empty( $office_phone ) ) { ?>
					<li><i class="ion-iphone"></i><?php echo esc_html( $office_phone ); ?> </li>
					<?php }  ?>
			
					<?php $fax = $makani_agent->get_fax();
                    if ( !empty( $fax ) ) { ?>
                    <li><i class="ion-social-whatsapp-outline"></i> <?php  echo esc_html( $fax ); ?> </li>
                    <?php }  ?>
			
					<?php $office_address = $makani_agent->get_office_address();
                    if ( !empty( $office_address ) ) { ?>
                     <li><i class="ion-ios-email-outline"></i> <?php echo esc_html( $office_address ); ?> </li>
                    <?php } ?>
                </ul>
              </div><!-- col-md-5 col-xs-12 -->
        </div><!-- container -->
    </section>    

    
<?php } ?>



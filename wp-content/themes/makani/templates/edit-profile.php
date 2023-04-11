<?php
/**
 * Template Name: Edit Profile
 */

global $current_user, $wp_roles;
$error = array();    
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }
    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
		
     if ( !empty( $_POST['mobile_number'] ) )
        update_user_meta( $current_user->ID, 'mobile_number', esc_attr( $_POST['mobile_number'] ) );
	 if ( !empty( $_POST['office_number'] ) )
        update_user_meta( $current_user->ID, 'office_number', esc_attr( $_POST['office_number'] ) );
	 if ( !empty( $_POST['fax_number'] ) )
        update_user_meta( $current_user->ID, 'fax_number', esc_attr( $_POST['fax_number'] ) );
	 if ( !empty( $_POST['facebook_url'] ) )
        update_user_meta( $current_user->ID, 'facebook_url', esc_attr( $_POST['facebook_url'] ) );
	 if ( !empty( $_POST['twitter_url'] ) )
        update_user_meta( $current_user->ID, 'twitter_url', esc_attr( $_POST['twitter_url'] ) );
     if ( !empty( $_POST['google_plus_url'] ) )
        update_user_meta( $current_user->ID, 'google_plus_url', esc_attr( $_POST['google_plus_url'] ) );
	if ( !empty( $_POST['linkedin_url'] ) )
        update_user_meta( $current_user->ID, 'linkedin_url', esc_attr( $_POST['linkedin_url'] ) );
	if ( !empty( $_POST['instagram_url'] ) )
        update_user_meta( $current_user->ID, 'instagram_url', esc_attr( $_POST['instagram_url'] ) );
	if ( !empty( $_POST['pinterest_url'] ) )
        update_user_meta( $current_user->ID, 'pinterest_url', esc_attr( $_POST['pinterest_url'] ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}
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
      <div class="container" >
         <div class="row">
         
             <div class="archive col-lg-8 col-md-12 col-xs-12">
			    <div class="card-noeffect user-profile">
	
                
                
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>">
           <div class="entry-content entry">
            <?php the_content(); ?>
            <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
            <?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                
                <div class="row">
                           <div class="col-md-6 col-xs-12 pull-right">
                                <div class="form-option">
                                   <label for="display_name">أسم المستخدم *</label>
                                   <input class="form-control text-input" name="display_name" type="text" id="display_name" value="<?php the_author_meta( 'display_name', $current_user->ID ); ?>" />              
                                </div>
                            </div>
                           <div class="col-md-6 col-xs-12">
                                <div class="form-option">
                                  <label for="email">البريد الالكترونى *</label>
                                  <input class="form-control text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" required />

                                </div>
                            </div>
                     </div>  <!-- .row --> 
                     
                <div class="row">
                            <div class="col-md-6 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="first-name">الأسم الاول</label>
                                     <input class="form-control text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-option">
                                    <label for="last-name">الأسم الأخير</label>
                                    <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                                </div>
                            </div>
                       </div> <!-- .row -->  
                       
                <div class="row">
                           <div class="col-md-6 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="pass1">تغيير كلمة السر</label>
                                    <input class="form-control text-input" name="pass1" type="password" id="pass1" />
                                </div>
                            </div>
                           <div class="col-md-6 col-xs-12">
                                <div class="form-option">
                                   <label for="pass2">تأكيد كلمة السر</label>
                                   <input class="form-control text-input" name="pass2" type="password" id="pass2" />
                                </div>
                             </div>  
                       </div> <!-- row -->
                 
                <div class="row">
                           <div class="col-md-4 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="mobile_number">رقم الجوال</label>
                                    <input class="form-control text-input" name="mobile_number" type="text" id="mobile_number" value="<?php the_author_meta( 'mobile_number', $current_user->ID ); ?>" />
                                </div>
                            </div>
                           <div class="col-md-4 col-xs-12">
                                <div class="form-option">
                                    <label for="office_number">رقم المكتب</label>
                                    <input class="form-control text-input" name="office_number" type="text" id="office_number" value="<?php the_author_meta( 'office_number', $current_user->ID ); ?>" />
                                </div>
                            </div>
                           <div class="col-md-4 col-xs-12">
                                <div class="form-option">
                                    <label for="fax_number">رقم الفاكس</label>
                                    <input class="form-control text-input" name="fax_number" type="text" id="fax_number" value="<?php the_author_meta( 'fax_number', $current_user->ID ); ?>" />
                                </div>
                            </div>
                      </div> <!-- .row --> 
                              
                <div class="row">
                            <div class="col-md-4 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="facebook_url">رابط الفيس بوك</label>
                                    <input class="form-control text-input" name="facebook_url" type="text" id="facebook_url" value="<?php the_author_meta( 'facebook_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-option">
                                    <label for="twitter_url">رابط توتير</label>
                                    <input class="form-control text-input" name="twitter_url" type="text" id="twitter_url" value="<?php the_author_meta( 'twitter_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-option">
                                    <label for="google_plus_url">رابط جوجل بلس</label>
<input class="form-control text-input" name="google_plus_url" type="text" id="google_plus_url" value="<?php the_author_meta( 'google_plus_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                        </div><!-- .row -->
                     
                <div class="row">
                            <div class="col-md-4 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="linkedin_url">رابط لينكد ان</label>
                                    <input class="form-control text-input" name="linkedin_url" type="text" id="linkedin_url" value="<?php the_author_meta( 'linkedin_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            
                             <div class="col-md-4 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="instagram_url">رابط انستجرام</label>
                                    <input class="form-control text-input" name="instagram_url" type="text" id="instagram_url" value="<?php the_author_meta( 'instagram_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            
                             <div class="col-md-4 col-xs-12 pull-right">
                                <div class="form-option">
                                    <label for="pinterest_url">رابط بنترست </label>
                                    <input class="form-control text-input" name="pinterest_url" type="text" id="pinterest_url" value="<?php the_author_meta( 'pinterest_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            
                     </div><!-- .row -->
                     
                     <div class="row">
                       <div class="col-md-12 col-xs-12">
                                <div class="form-option">
                                    <label for="description"><?php _e('السيرة الذاتية', 'makani') ?></label>
                        <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                </div>
                            </div>
                     </div>  <!-- .row -->  
                     
                    <?php 
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user); 
                    ?>
                    <p class="form-submit">
                        <?php echo $referer; ?>
                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="تعديل" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
            <?php endif; ?>
        </div><!-- .entry-content -->
    </div><!-- .hentry .post -->
    <?php endwhile; ?>
<?php else: ?>
    <p class="no-data">
        <?php _e('عفوا لا يوجد صفحة ', 'profile'); ?>
    </p><!-- .no-data -->
<?php endif; ?>


                 </div><!-- card-noeffect user-profile  -->
             </div><!-- archive col-lg-8  -->
        
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'property-sidebar' ) ) {
                dynamic_sidebar( 'property-sidebar' );
                } ?>
             </aside>
             
         </div><!-- row -->  
     </div><!-- container --> 
	</section>
     

<?php get_footer(); ?>
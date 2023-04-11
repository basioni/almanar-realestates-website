<?php
/*
 * Template Name: Submit Property
 */
global $makani_options;
$postTitleError = '';

	if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
		  // Start with basic array
		if(trim($_POST['postTitle']) === '') {
			$postTitleError = 'Please enter a title.';
			$hasError = true;
		} else {
			$postTitle = trim($_POST['postTitle']);
		}
	
		
	    $post_information = array(
                'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
		    	'post_content' => esc_attr(strip_tags($_POST['postContent'])),
                'post_type'     => 'property' ,
                'post_status' => 'pending'
        );
        $post_id =  wp_insert_post($post_information );
		  
		update_post_meta( $post_id, 'makani_property_price', sanitize_text_field( $_POST['makani_property_price'] ) );
		update_post_meta( $post_id, 'makani_property_price_postfix', sanitize_text_field( $_POST['makani_property_price_postfix'] ) );
		update_post_meta($post_id, 'makani_property_size', esc_attr( $_POST['makani_property_size'] ) );
		update_post_meta($post_id, 'makani_property_size_postfix', esc_attr( $_POST['makani_property_size_postfix'] ) );
		
		update_post_meta($post_id, 'makani_property_bedrooms', esc_attr( $_POST['makani_property_bedrooms'] ) );
		update_post_meta($post_id, 'makani_property_bathrooms', esc_attr( $_POST['makani_property_bathrooms'] ) );
	
		update_post_meta($post_id, 'makani_property_address', sanitize_text_field( $_POST['makani_property_address'] ) );
		update_post_meta($post_id, 'makani_property_location',  $_POST['makani_property_location'] );
	
		update_post_meta( $post_id, 'makani_video_url', esc_attr( $_POST['makani_video_url'] ) );
	
	
		update_post_meta( $post_id, 'makani_attachments', $_POST['makani_attachments']  );
		update_post_meta( $post_id, 'makani_property_images', $_POST['makani_property_images']  );


        wp_set_object_terms( $post_id, intval( $_POST['type'] ), 'property-type' );
        wp_set_object_terms( $post_id, intval( $_POST['city'] ), 'property-city' );
        wp_set_object_terms( $post_id, intval( $_POST['status'] ), 'property-status' );
        

		// Attach 
		if( isset( $_POST['features'] ) ) {
			if( ! empty( $_POST['features'] ) && is_array( $_POST['features'] ) ) {
				$property_features = array();
				foreach( $_POST['features'] as $property_feature_id ) {
					$property_features[] = intval( $property_feature_id );
				}
				wp_set_object_terms( $post_id , $property_features, 'property-feature' );
			}
		}
		
       // Agent 
                update_post_meta( $post_id, 'makani_agent_display_option', $_POST['makani_agent_display_option']);
                update_post_meta( $post_id, 'makani_agent', $_POST['agent_id'] );
    }

if (!isset($_FILES['file-1']['name'][1]{1}))
{
      $postContentError = 'من فضلك ارفع صور الاعلان  الاربعه';
      $validMsg = $postContentError;
      $error = true ;
 }
 if(!$error){
	$tags = $_POST['post_tags'];

	$post_information = array(
		'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
		'post_content' => esc_attr(strip_tags($_POST['postContent'])),
		'tags_input'    =>   array($tags),
		'post-type' => 'post',
		'post_status' => 'pending'
	);

   if ($_FILES)
	 {
		 $newContainer = array() ;
		 $fRef = $_FILES['file-1'];
		 $meta_type = array(
			'_thumbnail_id',
			'makani_property_images',
			'makani_property_images',
		 );
		 foreach($_FILES['file-1']['name'] as $key => $value){
			$sFile = array(
				'name' => $fRef['name'][$key],
				'type' => $fRef['type'][$key],
				'tmp_name' => $fRef['tmp_name'][$key],
				'error' => $fRef['error'][$key],
				'size' => $fRef['size'][$key]
			);	
			$_FILES = array('file-1' => $sFile); 
			foreach($_FILES as $kf => $vf){
				$newupload = insert_attachment($kf,$post_id,$meta_type[$key], true);
			 }
		 } 
	  }
}  

  
	$my_properties_url = get_permalink( $makani_options[ 'makani_my_properties_page' ] );
	if($post_id) {
		if ( !empty( $my_properties_url ) ) {
			$separator = ( parse_url( $my_properties_url, PHP_URL_QUERY ) == NULL ) ? '?' : '&';
			$parameter = ( $updated_successfully ) ? 'property-updated=true' : 'property-added=true';
			wp_redirect( $my_properties_url . $separator . $parameter );
		}
	}
?>

<?php get_header(); ?>
<section class="header-breadcrumb parallax-archive" data-type="background" data-speed="3">
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
       <div class="container">
         <div class="card-noeffect submit-property">
			<?php if( is_user_logged_in() ): ?>
              <form action="" id="primaryPostForm" method="POST"  enctype="multipart/form-data" >
            
                <div class="col-md-8 col-xs-12 pull-right">
                  <input type="text" name="postTitle" id="postTitle" placeholder="عنوان رئيسى" value="<?php if(isset($_POST['postTitle'])) echo $_POST['postTitle'];?>" class="required" />
               </div> 
                <div class="col-md-4 col-xs-12">
                  <input type="text" placeholder="السعر" name="makani_property_price" id="makani_property_price" value="<?php if(isset($_POST['makani_property_price'])) echo $_POST['makani_property_price'];?>" /> 
                  <input type="text" placeholder="العملة " name="makani_property_price_postfix" id="makani_property_price_postfix" value="<?php if(isset($_POST['makani_property_price_postfix'])) echo $_POST['makani_property_price_postfix'];?>" /> 
                </div>
                
                <div class="col-md-4 col-xs-12">
                  <input type="text" placeholder="المساحة" name="makani_property_size" id="makani_property_size" value="<?php if(isset($_POST['makani_property_size'])) echo $_POST['makani_property_size'];?>" /> 
                  <input type="text" placeholder="وحدة القياس" name="makani_property_size_postfix" id="makani_property_size_postfix" value="<?php if(isset($_POST['makani_property_size_postfix'])) echo $_POST['makani_property_size_postfix'];?>" />
               </div>
                <div class="col-md-4 col-xs-12">
                     <div class="select-contanier">
                        <select name="type" id="type" class="form-control c-select">
                            <option selected="selected" value="-1">قم باختيار النوع</option>
                            <?php $type_terms = get_terms( 'property-type', array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                    'parent' => 0,
                                )
                            );
                            makani_hierarchical_id_options( 'property-type', $type_terms, -1 );  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="select-contanier">
                        <select name="status" id="status" class="form-control c-select">
                            <option selected="selected" value="-1">قم باختيار الحالة</option>
                            <?php $status_terms = get_terms( 'property-status', array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                    'parent' => 0,
                                )
                            );
                            makani_hierarchical_id_options( 'property-status', $status_terms, -1 );  ?>
                        </select>
                    </div>
                </div>
                
                
                <div class="col-md-4 col-xs-12">  
                  <input type="text" placeholder="عدد الغرف" name="makani_property_bedrooms" id="makani_property_bedrooms" value="<?php if(isset($_POST['makani_property_bedrooms'])) echo $_POST['makani_property_bedrooms'];?>" /> 
                  <input type="text" placeholder="عدد دورات المياة" name="makani_property_bathrooms" id="makani_property_bathrooms" value="<?php if(isset($_POST['makani_property_bathrooms'])) echo $_POST['makani_property_bathrooms'];?>" /> 
               </div>
                <div class="col-md-4 col-xs-12">  
                  <input type="text" placeholder="رابط الفيديو" name="makani_video_url" id="makani_video_url" value="<?php if(isset($_POST['makani_video_url'])) echo $_POST['makani_video_url'];?>" /> 
               </div>
                <div class="col-md-4 col-xs-12">
                    <div class="select-contanier">
                        <select name="city" id="city" class="form-control c-select">
                            <option selected="selected" value="-1">قم باختيار المدينة</option>
                            <?php $location_terms = get_terms( 'property-city', array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                    'parent' => 0,
                                )
                            );
                            makani_hierarchical_id_options( 'property-city', $location_terms, -1 ); ?>
                        </select>
                    </div>
                </div>
                   
                    
                <div class="col-lg-6 col-xs-12">
                    <div class="form-option">
                        <div class="map-wrapper">
                  <input type="text" placeholder=" العنوان بالتفصيل" name="makani_property_address" id="makani_property_address" value="<?php if(isset($_POST['makani_property_address'])) echo $_POST['makani_property_address'];?>" /> 
                            <button class="btn-default goto-address-button" type="button" value="makani_property_address">ابحث</button>
                            <div class="map-canvas" style="width:100%; height:280px;"></div>
                            <input type="hidden" name="location" class="map-coordinate" value="<?php echo esc_attr( $makani_options[ 'makani_property_location' ] ); ?>"/>
                        </div>
                    </div>
                </div>
             
                        
                <div class="col-lg-6 col-xs-12 submit-checkbox">
                    <div class="form-option">
                            <?php
                            // Property features
                            $features_terms = get_terms( 'property-feature', array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                )
                            );
        
                            if ( ! empty( $features_terms ) && ! is_wp_error( $features_terms ) ) {
                                foreach ( $features_terms as $feature ) {  ?>
                                
                                 <div class="all-checkbox col-md-6 col-xs-6 no-padding-left "> 
                                 <div class="checkbox">
                                    <input type="checkbox" name="features[]" id="feature-<?php echo $feature->term_id ?>" value="<?php echo $feature->term_id ?>" />
                                    <label for="feature-<?php echo $feature->term_id ?>"></label>
                                  </div>
                                 <span class="checkbox-inline"><?php echo( $feature->name ) ?> </span>
                               </div>
                                           
                               <?php }
                            } ?>
                    </div>
                </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
              
              <div class="box">
					<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" tabindex="30" data-multiple-caption="{count} files selected" multiple />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>رفع الصور</span></label>
				</div>
                
            
                     
                </div> 
                
                 <div class="col-md-12">
                        <textarea name="postContent" id="postContent" value="<?php if(isset($_POST['postContent'])) echo $_POST['postContent'];?>" /></textarea>
                   </div> 
                    
                     
                    
                    
                   <div class="col-md-12">
                        <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        <button type="submit" class="btn">أضف </button>
                     </div> 
        
                    
                </form>
           <?php 
            else:
                makani_message( __( 'عفوا', 'makani' ), __( 'يجب تسجيل الدخول', 'makani' ) );
            endif;  ?>
      </div><!-- card-noeffect -->
     </div><!-- container --> 
	</section>
<?php get_footer(); ?>
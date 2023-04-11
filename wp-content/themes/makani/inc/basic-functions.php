<?php
/*-----------------------------------------------*
makani_get_post_meta
/*-----------------------------------------------*/
if( ! function_exists( 'makani_get_post_meta' ) ) :
    function makani_get_post_meta( $key, $args = array(), $post_id = null ) {

        $post_id = empty( $post_id ) ? get_the_ID() : $post_id;
        $args = wp_parse_args( $args, array( 'type' => 'text', 'multiple' => false, ) );
        if ( in_array( $args['type'], array('checkbox_list', 'file', 'file_advanced', 'image', 'image_advanced', 'plupload_image', 'thickbox_image') ) ) {
            $args['multiple'] = true;
        }
        $meta = get_post_meta( $post_id, $key, !$args['multiple'] );
        if (in_array($args['type'], array('file', 'file_advanced'))) {

            if ( is_array( $meta ) && !empty( $meta ) ) {
                $files = array();
                foreach ($meta as $id) {
                    // Get only info of existing attachments
                    if (get_attached_file($id)) {
                        $files[$id] = makani_get_file_info($id);
                    }
                }
                $meta = $files;
            }
        } elseif (in_array($args['type'], array('image', 'plupload_image', 'thickbox_image', 'image_advanced'))) {
            if (is_array($meta) && !empty($meta)) {
                $images = array();
                foreach ($meta as $id) {
                    // Get only info of existing attachments
                    if (get_attached_file($id)) {
                        $images[$id] = makani_get_file_info($id, $args);
                    }
                }
                $meta = $images;
            }
        } elseif ('taxonomy_advanced' == $args['type']) {
            if (!empty($args['taxonomy'])) {
                $term_ids = array_map('intval', array_filter(explode(',', $meta . ',')));
                // Allow to pass more arguments to "get_terms"
                $func_args = wp_parse_args(array(
                    'include' => $term_ids,
                    'hide_empty' => false,
                ), $args);
                unset($func_args['type'], $func_args['taxonomy'], $func_args['multiple']);
                $meta = get_terms($args['taxonomy'], $func_args);
            } else {
                $meta = array();
            }
        } elseif ( 'taxonomy' == $args['type'] ) {
            $meta = empty( $args['taxonomy'] ) ? array() : wp_get_post_terms( $post_id, $args['taxonomy'] );
        }
        return $meta;
    }
endif;
/*-----------------------------------------------*
makani_get_file_info ( uploaded file information )
/*-----------------------------------------------*/
if( ! function_exists( 'makani_get_file_info' ) ) :
    function makani_get_file_info( $file_id, $args = array() ) {
        $args = wp_parse_args( $args, array(
            'size' => 'thumbnail',
        ) );
        $img_src = wp_get_attachment_image_src( $file_id, $args['size'] );
        if ( ! $img_src ) {
            return false;
        }
        $attachment = get_post( $file_id );
        $path       = get_attached_file( $file_id );
        return array(
            'ID'          => $file_id,
            'name'        => basename( $path ),
            'path'        => $path,
            'url'         => $img_src[0],
            'width'       => $img_src[1],
            'height'      => $img_src[2],
            'full_url'    => wp_get_attachment_url( $file_id ),
            'title'       => $attachment->post_title,
            'caption'     => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'alt'         => get_post_meta( $file_id, '_wp_attachment_image_alt', true ),
        );
    }
endif;
/*===================================================================================*
Profile 
/*===================================================================================*/
if( !function_exists( 'makani_profile_image_upload' ) ) {
    function makani_profile_image_upload( ) {
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'makani_allow_upload' ) ) {
            $ajax_response = array(
                'success' => false ,
                'reason' => __( 'Security check failed!', 'makani' )
            );
            echo json_encode( $ajax_response );
            die;
        }
        $submitted_file = $_FILES['makani_upload_file'];
        $uploaded_image = wp_handle_upload( $submitted_file, array( 'test_form' => false ) );  

        if ( isset( $uploaded_image['file'] ) ) {
            $file_name          =   basename( $submitted_file['name'] );
            $file_type          =   wp_check_filetype( $uploaded_image['file'] );   

            $attachment_details = array(
                'guid'           => $uploaded_image['url'],
                'post_mime_type' => $file_type['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file_name ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            $attach_id      =   wp_insert_attachment( $attachment_details, $uploaded_image['file'] );    
            $attach_data    =   wp_generate_attachment_metadata( $attach_id, $uploaded_image['file'] );   
            wp_update_attachment_metadata( $attach_id, $attach_data );                                   
            $thumbnail_url = makani_get_profile_image_url( $attach_data ); 

            $ajax_response = array(
                'success'   => true,
                'url' => $thumbnail_url,
                'attachment_id'    => $attach_id
            );
            echo json_encode( $ajax_response );
            die;

        } else {
            $ajax_response = array(
                'success' => false,
                'reason' => __( 'Image upload failed!', 'makani' )
            );
            echo json_encode( $ajax_response );
            die;
        }
    }
    add_action( 'wp_ajax_profile_image_upload', 'makani_profile_image_upload' );
}
/*-----------------------------------------------*
makani_get_profile_image_url
/*-----------------------------------------------*/
if( !function_exists( 'makani_get_profile_image_url' ) ) {
    function makani_get_profile_image_url( $attach_data ) {
        $upload_dir         =   wp_upload_dir();
        $image_path_array   =   explode( '/', $attach_data['file'] );
        $image_path_array   =   array_slice( $image_path_array, 0, count( $image_path_array ) - 1 );
        $image_path         =   implode( '/', $image_path_array );
        $thumbnail_name     =   null;
        if ( isset( $attach_data['sizes']['makani-agent-thumbnail'] ) ) {
            $thumbnail_name     =   $attach_data['sizes']['makani-agent-thumbnail']['file'];
        } else {
            $thumbnail_name     =   $attach_data['sizes']['thumbnail']['file'];
        }
        return esc_url( $upload_dir['baseurl'] . '/' . $image_path . '/' . $thumbnail_name );
    }
}
/*-----------------------------------------------*
makani_update_profile
/*-----------------------------------------------*/

if( !function_exists( 'makani_profile_image_upload' ) ) {
    /**
     *  Profile image upload handler
     */
    function makani_profile_image_upload( ) {

        // Verify Nonce
        $nonce = $_REQUEST['nonce'];
        if ( ! wp_verify_nonce( $nonce, 'makani_allow_upload' ) ) {
            $ajax_response = array(
                'success' => false ,
                'reason' => __( 'Security check failed!', 'makani' )
            );
            echo json_encode( $ajax_response );
            die;
        }

        $submitted_file = $_FILES['makani_upload_file'];
        $uploaded_image = wp_handle_upload( $submitted_file, array( 'test_form' => false ) );   //Handle PHP uploads in WordPress, sanitizing file names, checking extensions for mime type, and moving the file to the appropriate directory within the uploads directory.

        if ( isset( $uploaded_image['file'] ) ) {
            $file_name          =   basename( $submitted_file['name'] );
            $file_type          =   wp_check_filetype( $uploaded_image['file'] );   //Retrieve the file type from the file name.

            // Prepare an array of post data for the attachment.
            $attachment_details = array(
                'guid'           => $uploaded_image['url'],
                'post_mime_type' => $file_type['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file_name ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            $attach_id      =   wp_insert_attachment( $attachment_details, $uploaded_image['file'] );       // This function inserts an attachment into the media library
            $attach_data    =   wp_generate_attachment_metadata( $attach_id, $uploaded_image['file'] );     // This function generates metadata for an image attachment. It also creates a thumbnail and other intermediate sizes of the image attachment based on the sizes defined
            wp_update_attachment_metadata( $attach_id, $attach_data );                                      // Update metadata for an attachment.

            $thumbnail_url = makani_get_profile_image_url( $attach_data ); // returns escaped url

            $ajax_response = array(
                'success'   => true,
                'url' => $thumbnail_url,
                'attachment_id'    => $attach_id
            );
            echo json_encode( $ajax_response );
            die;

        } else {
            $ajax_response = array(
                'success' => false,
                'reason' => __( 'Image upload failed!', 'makani' )
            );
            echo json_encode( $ajax_response );
            die;
        }

    }
    add_action( 'wp_ajax_profile_image_upload', 'makani_profile_image_upload' );
}



if( !function_exists( 'makani_get_profile_image_url' ) ) {
    /**
     * Get thumbnail url based on attachment data
     * @param $attach_data
     * @return string
     */
    function makani_get_profile_image_url( $attach_data ) {
        $upload_dir         =   wp_upload_dir();
        $image_path_array   =   explode( '/', $attach_data['file'] );
        $image_path_array   =   array_slice( $image_path_array, 0, count( $image_path_array ) - 1 );
        $image_path         =   implode( '/', $image_path_array );
        $thumbnail_name     =   null;
        if ( isset( $attach_data['sizes']['makani-agent-thumbnail'] ) ) {
            $thumbnail_name     =   $attach_data['sizes']['makani-agent-thumbnail']['file'];
        } else {
            $thumbnail_name     =   $attach_data['sizes']['thumbnail']['file'];
        }
        return esc_url( $upload_dir['baseurl'] . '/' . $image_path . '/' . $thumbnail_name );
    }
}



if( !function_exists( 'makani_update_profile' ) ) {
    /**
     * Edit profile request handler
     */
    function makani_update_profile() {

        // Get user info
        global $current_user;
        get_currentuserinfo();

        // Array for errors
        $errors = array();

        if( wp_verify_nonce( $_POST['user_profile_nonce'], 'update_user' ) ) {

            // profile-image-id
            // Update profile image
            if ( !empty( $_POST['profile-image-id'] ) ) {
                $profile_image_id = intval( $_POST['profile-image-id'] );
                update_user_meta( $current_user->ID, 'profile_image_id', $profile_image_id );
            } else {
                delete_user_meta( $current_user->ID, 'profile_image_id' );
            }

            // Update first name
            if ( !empty( $_POST['first-name'] ) ) {
                $user_first_name = sanitize_text_field( $_POST['first-name'] );
                update_user_meta( $current_user->ID, 'first_name', $user_first_name );
            } else {
                delete_user_meta( $current_user->ID, 'first_name' );
            }

            // Update last name
            if ( !empty( $_POST['last-name'] ) ) {
                $user_last_name = sanitize_text_field( $_POST['last-name'] );
                update_user_meta( $current_user->ID, 'last_name', $user_last_name );
            } else {
                delete_user_meta( $current_user->ID, 'last_name' );
            }

            // Update display name
            if ( !empty( $_POST['display-name'] ) ) {
                $user_display_name = sanitize_text_field( $_POST['display-name'] );
                $return = wp_update_user( array(
                    'ID' => $current_user->ID,
                    'display_name' => $user_display_name
                ) );
                if ( is_wp_error( $return ) ) {
                    $errors[] = $return->get_error_message();
                }
            }

            // Update user email
            if ( !empty( $_POST['email'] ) ){
                $user_email = is_email( sanitize_email ( $_POST['email'] ) );
                if ( !$user_email )
                    $errors[] = __( 'Provided email address is invalid.', 'makani' );
                else {
                    $email_exists = email_exists( $user_email );    // email_exists returns a user id if a user exists against it
                    if( $email_exists ) {
                        if( $email_exists != $current_user->ID ){
                            $errors[] = __('Provided email is already in use by another user. Try a different one.', 'makani');
                        } else {
                            // no need to update the email as it is already current user's
                        }
                    } else {
                        $return = wp_update_user( array ('ID' => $current_user->ID, 'user_email' => $user_email ) );
                        if ( is_wp_error( $return ) ) {
                            $errors[] = $return->get_error_message();
                        }
                    }
                }
            }

            // update user description
            if ( !empty( $_POST['description'] ) ) {
                $user_description = sanitize_text_field( $_POST['description'] );
                update_user_meta( $current_user->ID, 'description', $user_description );
            } else {
                delete_user_meta( $current_user->ID, 'description' );
            }

            // Update mobile number
            if ( !empty( $_POST['mobile-number'] ) ) {
                $user_mobile_number = sanitize_text_field( $_POST['mobile-number'] );
                update_user_meta( $current_user->ID, 'mobile_number', $user_mobile_number );
            } else {
                delete_user_meta( $current_user->ID, 'mobile_number' );
            }

            // Update office number
            if ( !empty( $_POST['office-number'] ) ) {
                $user_office_number = sanitize_text_field( $_POST['office-number'] );
                update_user_meta( $current_user->ID, 'office_number', $user_office_number );
            } else {
                delete_user_meta( $current_user->ID, 'office_number' );
            }

            // Update fax number
            if ( !empty( $_POST['fax-number'] ) ) {
                $user_fax_number = sanitize_text_field( $_POST['fax-number'] );
                update_user_meta( $current_user->ID, 'fax_number', $user_fax_number );
            } else {
                delete_user_meta( $current_user->ID, 'fax_number' );
            }

            // Update facebook url
            if ( !empty( $_POST['facebook-url'] ) ) {
                $facebook_url = esc_url_raw( sanitize_text_field( $_POST['facebook-url'] ) );
                update_user_meta( $current_user->ID, 'facebook_url', $facebook_url );
            } else {
                delete_user_meta( $current_user->ID, 'facebook_url' );
            }

            // Update twitter url
            if ( !empty( $_POST['twitter-url'] ) ) {
                $twitter_url = esc_url_raw( sanitize_text_field( $_POST['twitter-url'] ) );
                update_user_meta( $current_user->ID, 'twitter_url', $twitter_url );
            } else {
                delete_user_meta( $current_user->ID, 'twitter_url' );
            }

            // Update google plus url
            if ( !empty( $_POST['google-plus-url'] ) ) {
                $google_plus_url = esc_url_raw( sanitize_text_field( $_POST['google-plus-url'] ) );
                update_user_meta( $current_user->ID, 'google_plus_url', $google_plus_url );
            } else {
                delete_user_meta( $current_user->ID, 'google_plus_url' );
            }

            // Update linkedIn url
            if ( !empty( $_POST['linkedin-url'] ) ) {
                $linkedin_url = esc_url_raw( sanitize_text_field( $_POST['linkedin-url'] ) );
                update_user_meta( $current_user->ID, 'linkedin_url', $linkedin_url );
            } else {
                delete_user_meta( $current_user->ID, 'linkedin_url' );
            }

            // todo: add instagram and pin

            // Update user password
            if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
                if ( $_POST['pass1'] == $_POST['pass2'] ) {
                    $return = wp_update_user( array(
                        'ID' => $current_user->ID,
                        'user_pass' => $_POST['pass1']
                    ) );
                    if ( is_wp_error( $return ) ) {
                        $errors[] = $return->get_error_message();
                    }
                } else {
                    $errors[] = __('The passwords you entered do not match.  Your password is not updated.', 'makani');
                }
            }

            // if everything is fine
            if ( count( $errors ) == 0 ) {

                //action hook for plugins and extra fields saving
                do_action( 'edit_user_profile_update', $current_user->ID );

                $response = array(
                    'success' => true,
                    'message' => __( 'Profile information is updated successfully!', 'makani' ),
                );
                echo json_encode( $response );
                die;
            }

        } else {
            $errors[] = __('Security check failed!', 'makani');
        }

        // in case of errors
        $response = array(
            'success' => false,
            'errors' => $errors
        );
        echo json_encode( $response );
        die;

    }
    add_action( 'wp_ajax_makani_update_profile', 'makani_update_profile' );    // only for logged in user
}



if ( !function_exists( 'makani_log' ) ) {
    /**
     * Log a given message to wp-content/debug.log file, if debug is enabled from wp-config.php file
     *
     * @param $message
     */
    function makani_log( $message ) {
        if ( WP_DEBUG === true ) {
            if ( is_array( $message ) || is_object( $message ) ) {
                error_log( print_r( $message, true ) );
            } else {
                error_log( $message );
            }
        }
    }
}






if( !function_exists( 'makani_highlighted_message' ) ) :
    function makani_highlighted_message( $heading = '', $message = '' ) {
        echo '<div class="makani-highlighted-message">';
        if ( !empty( $heading ) ) {
            echo '<h4>' . $heading . '</h4>';
        }
        if ( !empty( $message ) ) {
            echo '<p>' . $message . '</p>';
        }
        echo '<i class="fa fa-times close-message"></i>';
        echo '</div>';

    }
endif;

/*===================================================================================*
comment
/*===================================================================================*/
if ( ! function_exists( 'makani_theme_comment' ) ) {
    function makani_theme_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="pingback">
                    <p><?php _e('Pingback:', 'makani'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'makani'), ' '); ?></p>
                </li>
                <?php
                break;
            default : ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="author-photo">
                        <a class="avatar" href="<?php comment_author_url(); ?>">
                            <?php echo get_avatar( $comment, 68, '', '', array( 'class' => 'img-circle', ) ); ?>
                        </a>
                    </div>

                    <div class="comment-wrapper">
                        <div class="comment-meta">
                            <div class="comment-author vcard">
                                <h5 class="fn"><?php echo get_comment_author_link(); ?></h5>
                            </div>
                            <div class="comment-metadata">
                                <time datetime="<?php comment_time('c'); ?>"><?php printf( __( '%1$s', 'makani' ), get_comment_date() ); ?></time>
                            </div>
                        </div>

                        <div class="comment-content">
                            <?php comment_text(); ?>
                        </div>

                        <div class="reply">
                            <?php comment_reply_link( array_merge( array( 'before' => '' ), array( 'depth' => $depth , 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div>
                    </div>

                </article>
                <?php  break;
        endswitch;
    }
}
/*===================================================================================*
makani_pagination
/*===================================================================================*/
if ( ! function_exists( 'makani_pagination' ) ) :
    function makani_pagination( $query ) {
        echo "<div class='pagination'>";
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url ( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_text' => __( '<i class="ion-chevron-right"></i>', 'makani' ),
            'next_text' => __( '<i class="ion-chevron-left"></i>', 'makani' ),
            'current' => max( 1, get_query_var ( 'paged' ) ),
            'total' => $query->max_num_pages,
        ) );
        echo "</div>";
    }
endif;
/*===================================================================================*
makani_message
/*===================================================================================*/
if( !function_exists( 'makani_message' ) ) :
    function makani_message( $heading = '', $message = '' ) {

        echo '<div class="makani-message">';
        if ( !empty( $heading ) ) {
            echo '<h3>' . $heading . '</h3>';
        }
        if ( !empty( $message ) ) {
            echo '<p>' . $message . '</p>';
        }
        echo '</div>';
    }
endif;
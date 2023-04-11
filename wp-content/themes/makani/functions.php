<?php
/*-----------------------------------------------*
@	Template Name: makani theme v.4.4
@	Theme URI: http://motivoweb.com/
@	Description: Designed by mona  http://motivoweb.com/
@	Version:  4.4
@	Author:mona m.kamal
/*-----------------------------------------------*/
/*-----------------------------------------------*
menu
/*-----------------------------------------------*/
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'القائمة الرئيسية' ),
	  'footer-menu' => __( 'قائمة الفوتر' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


/**
 * Custom class for parent menu
 */
add_filter( 'wp_nav_menu_objects', 'aviators_menu_class' );

function aviators_menu_class( $items ) {
	$parents = array();

	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'has-children';
		}
	}

	return $items;
}

/*-----------------------------------------------*
Add Redux Framework
/*-----------------------------------------------*/
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/sample/sample-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/sample/sample-config.php' );
}
require_once( dirname( __FILE__ ) . '/framework/loader.php' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*-----------------------------------------------*
// insert_attachment fornt end / meta-boxes
/*-----------------------------------------------*/
function insert_attachment($file_handler,$post_id, $meta_type='_thumbnail_id',$setthumb=true)
 {
	    // check to make sure its a successful upload
	    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
	 
	    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	 
	    $attach_id = media_handle_upload( $file_handler, $post_id );

	    if ($setthumb){ 
		       add_post_meta($post_id, $meta_type,$attach_id, false);

	      }

	    return $attach_id;
 }
/*-----------------------------------------------*
// makani_THEME
/*-----------------------------------------------*/
define( 'makani_THEME_VERSION', '1.0.0' );
require_once ( get_template_directory() . '/inc/real-estate/includes/class-makani-real-estate.php' );
require_once ( get_template_directory() . '/inc/basic-functions.php' );
require_once ( get_template_directory() . '/inc/real-estate-functions.php' );
/* Widgets */
include_once ( get_template_directory() . '/inc/widgets/advance-search-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/featured-properties-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/facebook-like-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/news-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/contact-widget.php' );
/* breadcrumb */
include_once ( get_template_directory() . '/inc/breadcrumb.php' );

/*-----------------------------------------------*
//makani_excerpt
/*-----------------------------------------------*/
if( !function_exists( 'makani_excerpt' ) ) {
    /* Output excerpt for given number of words */
    function makani_excerpt( $len=15, $trim = "&hellip;" ) {
        echo get_makani_excerpt( $len, $trim );
    }
}
if( !function_exists( 'get_makani_excerpt' ) ) {
    /* Return excerpt for given number of words. */
    function get_makani_excerpt( $len=15, $trim = "&hellip;" ) {
        $limit = $len+1;
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        $num_words = count( $excerpt );
        if ( $num_words >= $len ) {
            $last_item = array_pop( $excerpt );
        } else {
            $trim="";
        }
        $excerpt = implode( " ", $excerpt ) . $trim ;
        return $excerpt;
    }
}
if( !function_exists( 'get_makani_custom_excerpt' ) ) {
    /* Return excerpt for given number of words from custom contents */
    function get_makani_custom_excerpt( $contents, $len = 15, $trim = "&hellip;" ){
        $limit = $len+1;
        $excerpt = explode( ' ', $contents, $limit );
        $num_words = count( $excerpt );
        if( $num_words >= $len ){
            $last_item = array_pop( $excerpt );
        } else {
            $trim = "";
        }
        $excerpt = implode( " ", $excerpt ) . $trim;
        return $excerpt;
    }
}

/*-----------------------------------------------*
post-thumbnails
/*-----------------------------------------------*/
if (function_exists('add_theme_support'))
add_theme_support('post-thumbnails');
		
if ( function_exists( 'add_image_size' ) ){
add_image_size( 'slider-thumbnail', 9999, 550, true );
add_image_size( 'servise-thumbnail', 50, 150, true );
add_image_size( 'properties-thumbnail', 360 , 250, true );
add_image_size( 'makani-grid-thumbnail', 660,600, true);
add_image_size( 'makani-agent-thumbnail', 220, 220, true);
add_image_size( 'post-thumbnail', 220, 215, true);
}
/*-----------------------------------------------*/
// image place holder
/*-----------------------------------------------*/
if( !function_exists('get_makani_image_placeholder')){
    /* Return place holder image */
    function get_makani_image_placeholder( $image_size, $image_class = 'img-responsive' ){
        global $_wp_additional_image_sizes;
        $holder_width = 0;
        $holder_height = 0;
        $holder_text = get_bloginfo('name');
        if ( in_array( $image_size , array( 'thumbnail', 'medium', 'large' ) ) ) {
            $holder_width = get_option( $image_size . '_size_w' );
            $holder_height = get_option( $image_size . '_size_h' );
        } elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {
            $holder_width = $_wp_additional_image_sizes[ $image_size ]['width'];
            $holder_height = $_wp_additional_image_sizes[ $image_size ]['height'];
        }
        if( intval( $holder_width ) > 0 && intval( $holder_height ) > 0 ) {
            $place_holder_final_url = esc_url( add_query_arg( array(
                'text' => urlencode( $holder_text )
            ), sprintf(
                '//placehold.it/%dx%d',
                $holder_width,
                $holder_height
            ) ) );
            return sprintf( '<img class="%s" src="%s" />', $image_class, $place_holder_final_url );
        }
        return '';
    }
}

if( !function_exists( 'makani_image_placeholder' ) ) {
    /* Display place holder image. */
    function makani_image_placeholder( $image_size, $image_class = 'img-responsive' ) {
        echo get_makani_image_placeholder( $image_size, $image_class );
    }
}

if( !function_exists( 'makani_thumbnail' ) ) :
    /* Display thumbnail*/
    function makani_thumbnail( $size = 'makani-grid-thumbnail' ) {
        ?>
        <a href="<?php the_permalink(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( $size, array( 'class' => 'img-responsive' ) );
            } else {
                makani_image_placeholder( $size, 'img-responsive' );
            }
            ?>
        </a>
    <?php
    }
endif;
/*-----------------------------------------------*
//makani_modal
/*-----------------------------------------------*/
if( !function_exists( 'makani_modal_login' ) ) :
    function makani_modal_login(){
        if ( ! is_user_logged_in() ) {
            get_template_part( 'partials/members/modal-login' );
        }
    }
    add_action( 'wp_footer', 'makani_modal_login', 5 );
endif;

/*-----------------------------------------------*
// makani_theme_setup
/*-----------------------------------------------*/
if ( ! function_exists( 'makani_theme_setup' ) ) :
    function makani_theme_setup() {
        add_theme_support( 'automatic-feed-links' );       // Add RSS feed links to head.
        /* theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us. */
        add_theme_support( 'title-tag' );
        /* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
    }
    add_action( 'after_setup_theme', 'makani_theme_setup' );
endif; // makani_theme_setup

/*-----------------------------------------------*
// wp_enqueue_style
/*-----------------------------------------------*/
if ( ! function_exists( 'makani_enqueue_styles' ) ) :
    function makani_enqueue_styles() {
        if ( ! is_admin() ) :
            $makani_template_directory_uri = get_template_directory_uri();
            // font awesome
            wp_enqueue_style(
                'font-awesome',
                $makani_template_directory_uri . '/css/bootstrap.css',
                array(),
                '4.3.0'
            );
            // animate css
            wp_enqueue_style(
                'animate',
                $makani_template_directory_uri . '/css/animate.min.css',
                array(),
                makani_THEME_VERSION
            );
			// main styles
            wp_enqueue_style(
                'makani-main',
                $makani_template_directory_uri . '/css/style.css',
                array( ),
                makani_THEME_VERSION
            );
        endif; }
endif; // makani_enqueue_styles
add_action ( 'wp_enqueue_scripts', 'makani_enqueue_styles' );
/*-----------------------------------------------*
// wp_enqueue_script
/*-----------------------------------------------*/
if ( ! function_exists( 'makani_enqueue_scripts' ) ) :
    function makani_enqueue_scripts() {
        if ( ! is_admin() ) :
            $makani_template_directory_uri = get_template_directory_uri();
	
			 wp_enqueue_script('jquery-ui', $makani_template_directory_uri . '/js/jquery-ui.min.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('bootstrap', $makani_template_directory_uri . '/js/bootstrap.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
             wp_enqueue_script('nav1', $makani_template_directory_uri . '/js/jquery.mobile.custom.min.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			   wp_enqueue_script('nav2', $makani_template_directory_uri . '/js/main.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
    
			 wp_enqueue_script('easing', $makani_template_directory_uri . '/js/easing.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('prettyPhoto', $makani_template_directory_uri . '/js/prettyPhoto.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('carousel', $makani_template_directory_uri . '/js/owl.carousel.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('masonry', $makani_template_directory_uri . '/js/masonry.pkgd.min.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('nicescroll', $makani_template_directory_uri . '/js/jquery.nicescroll.min.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('cbpViewModeSwitch', $makani_template_directory_uri . '/js/cbpViewModeSwitch.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('wow', $makani_template_directory_uri . '/js/wow.min.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			 wp_enqueue_script('theme', $makani_template_directory_uri . '/js/theme.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			 
			  wp_enqueue_script('edit-profile', $makani_template_directory_uri . '/js/wp/makani-edit-profile.js', 
			 array( 'jquery' ),makani_THEME_VERSION, true);
			
            // maps.google
            if( is_singular( 'property' )
                || is_page_template( 'contact-us.php' )
                || is_page_template( 'templates/properties-grid.php' )
                || is_page_template( 'templates/submit-property.php' )
                || is_tax( 'property-city' )
                || is_tax( 'property-status' )
                || is_tax( 'property-type' )
                || is_tax( 'property-feature' )
                || is_post_type_archive( 'property' ) ) {

                wp_enqueue_script(
                    'google-map-api',
                    '//maps.google.com/maps/api/js?v=3',
                    array(),'',  false
				);
            }
            // favorites
            if ( is_singular( 'property' ) || is_page_template( 'templates/favorites.php' ) ) {
                wp_enqueue_script(
                    'makani-favorites',
                    $makani_template_directory_uri . '/js/wp/makani-favorites.js',
                    array( 'jquery' ), makani_THEME_VERSION,  true 
			);
          
            }
			
			 // submit property
            if( is_page_template( 'templates/submit-property.php' )) {
                wp_enqueue_script(
                    'makani-property-submit',
                    $makani_template_directory_uri . '/js/wp/makani-property-submit.js',
                    array( 'jquery' ), makani_THEME_VERSION,  true
              );
			  
			    wp_enqueue_script(
                    'custom-file-input',
                    $makani_template_directory_uri . '/js/custom-file-input.js',
                    array( 'jquery' ), makani_THEME_VERSION,  true
              );
			  
						 
             // edit profile
            if ( is_page_template( 'templates/edit-profile.php' ) ) {
                wp_enqueue_script(
                    'makani-edit-profile',
                    $makani_template_directory_uri . '/js/wp/makani-edit-profile.js',
                    array( 'jquery' ), makani_THEME_VERSION,  true
                );

                $edit_profile_data = array(
                    'ajaxURL' => admin_url( 'admin-ajax.php' ),
                    'uploadNonce' => wp_create_nonce ( 'makani_allow_upload' ),
                    'fileTypeTitle' => __( 'Valid file formats', 'makani' ),
                );
                wp_localize_script( 'makani-edit-profile', 'editProfile', $edit_profile_data );

            }
			
			

       } endif;
    } endif; // makani_enqueue_scripts
add_action ( 'wp_enqueue_scripts', 'makani_enqueue_scripts' );
/*-----------------------------------------------*
// Comment reply script
/*-----------------------------------------------*/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
/*-----------------------------------------------*
// register_sidebar
/*-----------------------------------------------*/
if( !function_exists( 'makani_theme_sidebars' ) ) :
    function makani_theme_sidebars( ) {
        // Location: Sidebar Pages
        register_sidebar(array(
            'name'=>__('الشريط الجانبى للصفحات','makani'),
            'id' => 'default-page-sidebar',
            'description' => __('Widget area for default page template sidebar.','makani'),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        // Location: Sidebar Property
        register_sidebar(array(
            'name'=>__('الشريط الجانبى للعقارات','makani'),
            'id' => 'property-sidebar',
            'description' => __('Widget area for property detail page sidebar.','makani'),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    add_action( 'widgets_init', 'makani_theme_sidebars' );
endif;
/*-----------------------------------------------*
// ajax login-register
/*-----------------------------------------------*/
function ajax_auth_init(){	
	wp_register_script('validate-script', get_template_directory_uri() . '/js/wp/jquery.validate.js', array('jquery') ); 
    wp_enqueue_script('validate-script');
    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/js/wp/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('برجاء الانتظار.....')
    ));
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
  
function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );
	auth_user_login($_POST['username'], $_POST['password'], 'Login'); 
    die();
}

function ajax_register(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );
		
    $info = array();
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
    $info['user_pass'] = sanitize_text_field($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
	
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;
		
		if(in_array('empty_user_login', $error))
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
		elseif(in_array('existing_user_login',$error))
			echo json_encode(array('loggedin'=>false, 'message'=>__('اسم المستخدم موجود مسبقا')));
		elseif(in_array('existing_user_email',$error))
        echo json_encode(array('loggedin'=>false, 'message'=>__('هذا البريد الاكلترونى موجود مسبقا')));
    } else {
	  auth_user_login($info['nickname'], $info['user_pass'], 'Registration');       
    }

    die();
}

function auth_user_login($user_login, $password, $login){
	$info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = true;
	
	$user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('يوجد خطأ فى اسم المستخدم او كلمة المرور')));
    } else {
		wp_set_current_user($user_signon->ID); 
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' successful, redirecting...')));
    }
	die();
}
/*-----------------------------------------------*
// Register plugins
/*-----------------------------------------------*/
add_action( 'tgmpa_register', 'aviators_register_required_plugins' );
require_once 'inc/class-tgm-plugin-activation.php';
function aviators_register_required_plugins() {
	$plugins = array(
		array(
            'name'                  => 'Meta Box',
            'slug'                  => 'meta-box',
            'required'              => true,
            'is_automatic'          => true,
        ),
        array(
            'name'                  => 'Contact Form 7',
            'slug'                  => 'contact-form-7',
            'required'              => true,
            'is_automatic'          => true,
        ),
		array(
			'name'                  => 'WordPress Importer',
			'slug'                  => 'wordpress-importer',
			'required'              => false,
			'is_automatic'          => true,
		),
	);
	tgmpa( $plugins );
}
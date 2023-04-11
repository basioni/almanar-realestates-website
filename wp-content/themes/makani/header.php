<!DOCTYPE html>
<html>
  <head>
     <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>;charset=<?php bloginfo('charset') ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    
    <title>
    <?php
    global $page, $paged;
    wp_title( '|', true, 'right' );
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'wpestate' ), max( $paged, $page ) );
    ?>
    </title>
    <?php global $makani_options; ?>
    <!-- ========== favicon ========== -->
    <?php 
	if(empty( $makani_favicon )) : ?>
    <link rel="shortcut icon" href="<?php bloginfo ('template_url'); ?>/img/favicon.ico" /> 
	<?php
	else : ?><link rel="shortcut icon" href="<?php echo $makani_favicon; ?>" /><?php
	endif;
	?>
    <!-- ========== THEM CSS ========== -->
    <?php require_once( get_template_directory() . '/css/dynamic-css.php' ); ?>
    <?php  $makani_color_switch = $makani_options[ 'makani_color_switch' ] ;  ?>
    <?php if (true == $makani_color_switch ): ?>
           <link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/color/blue.css" id="color-switcher" />
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
 <body>
     <?php  $makani_page_loader = $makani_options[ 'makani_page_loader' ] ;  ?>
	<?php if (true == $makani_page_loader ): ?>
    <div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="loader"></div>
			</div>
		</div>
	</div><!-- End Loading  -->
   <?php endif; ?>

    <div class="header_container">
    <div class="topheader fullwidth_container style-top-bar">
       <div class="container">
        <ul class="pull-right login-header">
        <?php
        if ( is_user_logged_in() ) {

            $edit_profile_url = "";
            $my_properties_url = "";
            $favorites_url = "";

			if ( isset($makani_options['makani_edit_profile_page']) && !empty( $makani_options['makani_edit_profile_page'] ) ) {
				$edit_profile_url = get_permalink( $makani_options[ 'makani_edit_profile_page' ] );
			}
			if ( isset($makani_options['makani_my_properties_page']) && !empty($makani_options['makani_my_properties_page' ] ) ) {
				$my_properties_url = get_permalink ( $makani_options[ 'makani_my_properties_page' ] );
			}
			if ( isset($makani_options['makani_favorites_page' ]) && !empty($makani_options['makani_favorites_page' ] ) ) {
				$favorites_url = get_permalink ( $makani_options[ 'makani_favorites_page' ] );
			}
			if ( isset($makani_options['makani_submit_property_page' ]) && !empty($makani_options['makani_submit_property_page' ] ) ) {
				$submit_property_url = get_permalink ( $makani_options[ 'makani_submit_property_page' ] );
			}
			
		?>
        
        <li><a href="<?php echo wp_logout_url( esc_url( home_url('/') ) ); ?>"><span class="icon icon-User"></span><?php _e( 'تسجيل الخروج', 'makani' ); ?></a></li>
        
		<?php
        if ( !empty( $edit_profile_url ) ) { ?>
        <li><a href="<?php echo esc_url( $edit_profile_url ); ?>"><span class="icon ion-android-contact"></span>الملف الشخصى</a></li>
        <?php }
        
        if ( !empty( $my_properties_url ) ) { ?>
        <li><a href="<?php echo esc_url( $my_properties_url ); ?>"><span class="icon ion-ios-home-outline"></span>عقارى</a></li>
        <?php }
        
        if ( !empty( $favorites_url ) ) { ?>
        <li><a href="<?php echo esc_url( $favorites_url ); ?>"><span class="icon ion-android-favorite-outline"></span>المفضلة</a>
        </li>
        <?php }
        
        if ( !empty( $submit_property_url ) ) { ?>
        <li><a href="<?php echo esc_url( $submit_property_url ); ?>"><span class="icon ion-ios-compose-outline"></span>ادخال عقار</a>        </li>
        <?php }
    
     } else {
     ?>
     <li>
     <a class="login-register-link" href="#login-modal" data-toggle="modal"><span class="icon icon-Users"></span></span>تسجيل الدخول</a>
     </li>
    <?php } ?>
    </ul>
        <ul class="pull-left social-top social-media">
            <?php get_template_part( 'partials/home/social-media' ); ?>
        </ul>
       </div><!-- container -->
      </div><!-- topheader -->
    <header class="cd-main-header logo_and_menu">
      <div class="container">
        <div class="cd-logo col-md-3 col-sm-12">
        <?php
        $makani_site_name  = get_bloginfo( 'name' );
        $makani_tag_line   = get_bloginfo ( 'description' );

        if ( !empty( $makani_options['makani_logo'] ) && !empty( $makani_options['makani_logo']['url'] ) ) {?>
        <a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( $makani_options['makani_logo']['url'] ); ?>" alt="<?php echo esc_attr( $makani_site_name ); ?>" /></a>
        
		<?php } else { ?>
	
       <h1><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php echo esc_html( $makani_site_name ); ?></a></h1>
	   <h2><?php echo esc_html( $makani_tag_line ); ?></h2>
       
	   <?php } ?>
       
        </div>
		<ul class="cd-header-buttons">
			<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
		</ul> <!-- cd-header-buttons -->
        <nav class="cd-nav col-md-9 col-sm-12">
                <?php
                     wp_nav_menu( array(
                    'menu'              => 'main-menu',
                    'theme_location'    => 'main-menu',
					'menu_class'      => 'cd-primary-nav is-fixed',
					'menu_id'         => 'cd-primary-nav',
                     )
                    );
                 ?>
        </nav> <!-- cd-nav -->
		<?php  $makani_search_icon = $makani_options[ 'makani_search_icon' ] ;  ?>
        <?php if (true == $makani_search_icon ): ?>
         <li class="makani_search_icon"><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
         <div id="cd-search" class="cd-search">
              <form role="search" method="get" action="<?php bloginfo('url') ; ?> ">
               <input type="search"  value="" name="s" id="search" placeholder="اكتب كلمة البحث هنا" />
              </form>
            </div>
       <?php endif; ?>
   
      </div><!-- container -->
	</header>
   </div> <!-- header_container -->
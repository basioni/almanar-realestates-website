<?php
/*
 * Template Name: Favorites
 */
get_header();
global $makani_options;
?>
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
    <div class="container" >
         <div class="row">
             <div class="archive col-lg-8 col-md-12 col-xs-12">
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
					<div class="cbp-vm-options">
                    	<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected tooltip-top fade-animation" data-title="أفقى" data-view="cbp-vm-view-list"><i class="ion-android-list"></i></a>
						<a href="#" class="cbp-vm-icon cbp-vm-grid tooltip-top fade-animation" data-title="راسى" data-view="cbp-vm-view-grid" ><i class="ion-grid"></i></a>

					</div>
					<ul>
        <?php if( is_user_logged_in() ):
        $user_id = get_current_user_id();
        $favorite_properties = get_user_meta( $user_id, 'favorite_properties' );
        $total_favorites = count( $favorite_properties );

        if( $total_favorites > 0 ):
            global $makani_options;

            $number_of_properties = intval( $makani_options[ 'makani_favorites_properties_number' ] );
            if ( !$number_of_properties ) {
                $number_of_properties = 6;
            }
            global $paged;
            $favorites_properties_args = array(
                'post_type' => 'property',
                'posts_per_page' => $number_of_properties,
                'post__in' => $favorite_properties,
                'orderby' => 'post__in',
                'paged' => $paged,
            );
            $favorites_properties_args = apply_filters( 'makani_sort_properties', $favorites_properties_args );
            $favorites_query = new WP_Query( $favorites_properties_args );

            global $found_properties;
            $found_properties = $favorites_query->found_posts;
            
            if ( $favorites_query->have_posts() ) :
                global $property_grid_counter;
                $property_grid_counter = 1;
                echo '<div class="row">';
                while ( $favorites_query->have_posts() ) :
                    $favorites_query->the_post();
                    get_template_part( 'partials/property/templates/property-for-grid' );
                    $property_grid_counter++;
                endwhile;
                echo '</div>';
                makani_pagination( $favorites_query );
                wp_reset_postdata();
            endif;
        else:
            makani_message( __( 'للأسف', 'makani' ), __( 'لا يوجد اى عقارات فى قائمة المفضلة الأن', 'makani' ) );
        endif;
    else:
        makani_message( __( 'عفوا', 'makani' ), __( 'يجب تسجيل الدخول', 'makani' ) );
    endif;  ?>
    

					</ul>
				</div>
             </div>
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'property-sidebar' ) ) {
                dynamic_sidebar( 'property-sidebar' );
                } ?>
             </aside>
             
         </div><!-- row -->  
     </div><!-- container --> 
	</section>
     

<?php get_footer();?>
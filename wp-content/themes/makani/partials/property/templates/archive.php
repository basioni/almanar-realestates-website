<?php 
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
                         <?php
                            $number_of_properties = intval( $makani_options[ 'makani_archive_properties_number' ] );
                            if ( !$number_of_properties ) {
                                $number_of_properties = 6;
                            }
                            global $wp_query;
                            global $paged;
                            $sort_query_args = array(
                                'posts_per_page'    => $number_of_properties,
                                'paged'             => $paged,
                            );
                            if ( have_posts() ) :
                                global $property_list_counter;
                                $property_list_counter = 1;

                                while ( have_posts() ) : the_post();
                                        get_template_part( 'partials/property/templates/property-for-grid' );
                                 $property_list_counter++;
                                endwhile;
                                makani_pagination( $wp_query );
                            endif; ?>
                            
                            
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
                       
<?php
get_footer();
?>


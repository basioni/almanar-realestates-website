<?php
/*
 * Template Name: Agents List
 */
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
             <div class="col-lg-8 col-md-12 col-xs-12">
              <?php
				$number_of_agents = intval( get_post_meta( get_the_ID(), 'makani_agents_per_page', true ) );
				if ( !$number_of_agents ) {
					$number_of_agents = 6;
				}
				global $paged;
				$agents_query = array(
					'post_type' => 'agent',
					'posts_per_page' => $number_of_agents,
					'paged' => $paged
				);
				$agents_list_query = new WP_Query( $agents_query );
				if ( $agents_list_query->have_posts() ) :
	
					global $agent_list_counter;
					$agent_list_counter = 1;
					
					while ( $agents_list_query->have_posts() ) :
						$agents_list_query->the_post();
						get_template_part( 'partials/agent/agent-info' );
						$agent_list_counter++;
					endwhile;
					wp_reset_postdata();
				else:
					?><h4>لا يوجد وكيل عقارات</h4>
				<?php endif; ?>
				<?php makani_pagination( $agents_list_query ); ?>
          
             </div><!-- col-md-8 col-xs-12 -->
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'default-page-sidebar' ) ) {
                dynamic_sidebar( 'default-page-sidebar' );
                } ?>
             </aside>
         </div><!-- row -->  
     </div><!-- container --> 
	</section>
    
    
<?php get_footer(); ?>
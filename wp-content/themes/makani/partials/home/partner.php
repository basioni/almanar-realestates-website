<?php
global $makani_options;
$number_of_partners = intval( $makani_options[ 'makani_partner_number' ] );
if( !$number_of_partners ) {
    $number_of_partners = 10;
}

$partners_query_args = array(
    'post_type' => 'partners',
    'posts_per_page' => $number_of_partners
);

$partners_query = new WP_Query( $partners_query_args );
if ( $partners_query->have_posts() ) :   ?>
    <!-- ========== partner========== -->
     <section class="partner">
       <div class="container">
        <div class="row">
		  <?php
         if ( ! empty( $makani_options[ 'makani_partner_title' ] ) ) {   ?>
         <h3><?php echo esc_html( $makani_options[ 'makani_partner_title' ] ); ?></h3>
         <div class="divider"><span></span></div>
         <?php  }  ?>
         </div><!-- row -->             
                    
          <div id="owl-demo-partner" class="owl-carousel ">
					<?php
					while ( $partners_query->have_posts() ) :
					$partners_query->the_post(); ?>
					
                    
                   <?php $makani_partner_link = get_post_meta(get_the_ID(), 'makani_partner_url' , true ) ; ?>
		           <div class="item">
                       <a href="<?php echo ($makani_partner_link ); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                   </div><!-- partner-item -->
                   <?php   endwhile;
                    wp_reset_postdata(); ?>
                        
    </div><!-- owl-carousel --> 
  </div><!-- container -->  
</section><!-- partner --> 

<?php  endif;



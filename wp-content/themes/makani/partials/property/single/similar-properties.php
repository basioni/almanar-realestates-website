<?php
global $makani_options;
global $makani_single_property;

$number_of_similar_properties = intval( $makani_options[ 'makani_similar_properties_number' ] );
if ( empty( $number_of_similar_properties ) ) {
    $number_of_similar_properties = 2;
}

$similar_properties_args = array(
    'post_type' => 'property',
    'posts_per_page' => $number_of_similar_properties,
    'post__not_in' => array( $makani_single_property->get_post_ID() ),
    'post_parent__not_in' => array( $makani_single_property->get_post_ID() ),
    'orderby' => 'rand',
);

$tax_query = array();

// Main Post Property Type
$type_terms = get_the_terms( $makani_single_property->get_post_ID(), "property-type" );
if ( !empty( $type_terms ) && is_array( $type_terms ) ) {
    $types_array = array();
    foreach( $type_terms as $type_term ) {
        $types_array[] = $type_term->term_id;
    }
    $tax_query[] = array(
        'taxonomy'  => 'property-type',
        'field'     => 'id',
        'terms'     => $types_array
    );
}

// Main Post Property Status
$status_terms = get_the_terms( $makani_single_property->get_post_ID(), "property-status" );
if ( !empty( $status_terms ) && is_array( $status_terms ) ) {
    $statuses_array = array();
    foreach( $status_terms as $status_term ) {
        $statuses_array[] = $status_term->term_id;
    }
    $tax_query[] = array(
        'taxonomy' => 'property-status',
        'field' => 'id',
        'terms' => $statuses_array
    );
}

$tax_count = count( $tax_query );   
if ( $tax_count > 1 ) {
    $tax_query['relation'] = 'OR';  // add OR relation if more than one
}

if ( $tax_count > 0 ) {
    $similar_properties_args['tax_query'] = $tax_query;   // add taxonomies query
}

$similar_properties_query = new WP_Query( $similar_properties_args );
if ( $similar_properties_query->have_posts() ) :  ?>

   <section class="related-post card-noeffect wow fadeInUp">
       <div class="container">
       
          <div class="row">
            <?php
            if ( !empty( $makani_options['makani_similar_properties_title'] ) ) {  ?>
            <h3><?php echo esc_html( $makani_options['makani_similar_properties_title'] ); ?></h3>
            <div class="divider"><span></span></div>
            <?php } ?>
           </div><!-- row --> 
          
           <?php  while ( $similar_properties_query->have_posts() ) :
			$similar_properties_query->the_post();
			$similar_property = new makani_Property( $post->ID ); ?>
			
                <div class="col-sm-6 col-xs-12">
                   <div class="card related-post-block">
                          <?php makani_thumbnail( 'post-thumbnail' ); ?>
                          <div class="card-block">
                          <h4><a href="<?php the_permalink(); ?>"><?php echo get_makani_custom_excerpt( get_the_title(), 5 ); ?></a></h4>
                          <time><?php the_time('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                      </div><!-- card-block -->
                   </div><!-- newblock -->
                </div><!-- col-sm-6 col-xs-12 -->
                
			<?php endwhile; ?>
            
       </div><!-- container -->
     </section>
<?php endif;
wp_reset_postdata(); ?>
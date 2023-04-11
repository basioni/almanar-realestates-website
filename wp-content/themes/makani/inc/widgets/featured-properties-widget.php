<?php
global $makani_options;
if ( !class_exists( 'makani_Featured_Properties_Widget' ) ) {  
   class makani_Featured_Properties_Widget extends WP_Widget {
    public function __construct(){
            $widget_ops = array(
                'classname' => 'makani_Featured_Properties_Widget',
                'description' => __('Displays random or recent featured properties.','makani')
            );
            parent::__construct( 'makani_Featured_Properties_Widget', __('makani Featured Properties','makani'), $widget_ops );
        }
		


       function widget($args, $instance) {
            extract($args);
            $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
			echo '	<div class="aside-block featured-aside wow fadeInUp">';
		if ( empty( $title ) ) {
			$title = false;
		}
		
		if ( $title ):
			echo ' <div class="title"> <h3> ' . $title . ' </h3><div class="divider"><span></span></div></div>';
		endif;
	 
            // number of properties
			$number_of_featured_properties = intval( $makani_options[ 'makani_featured_number' ] );
			if( !$number_of_featured_properties ) {
				$number_of_featured_properties = 3;
			}

            $featured_args = array(
                'post_type' => 'property',
                'posts_per_page' => $number_of_featured_properties,
                'meta_query' => array(
                    array(
                        'key' => 'makani_featured',
                        'value' => 1,
                    )
                )
            );

            $featured_query = new WP_Query($featured_args);
            echo $before_widget;

            if( $featured_query->have_posts() ): ?>
                <div id="owl-featured-aside" class="owl-carousel">
       
                    <?php
                    while($featured_query->have_posts()):
                        $featured_query->the_post();
                        $featured_property = new makani_Property( get_the_ID() );
                        ?>
  
           <div class="card">
                 <div class="figure-effect ">
                  <figure class="effect-apollo">
                   <?php makani_thumbnail( 'post-thumbnail' ) ?>
                    <figcaption>
                        <p><?php $featured_property->price() ?></p>
                        <a href="<?php the_permalink(); ?>">View more</a>
                    </figcaption>			
                </figure>
                </div>
                <div class="card-block"> 
                    <div class="card-title">
                        <h4><a href="<?php the_permalink() ?>"><?php echo get_makani_custom_excerpt( get_the_title(), 7 ); ?></a></h4>
                        <?php $makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);
                        if ( !empty( $makani_property_address ) ) { ?>
                        <h5>
                            <i class="icon icon-Pointer"></i>
                            <?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) ); ?>
                            <?php
                            $city_term = $featured_property->get_taxonomy_first_term( 'property-city', 'all' );
                            if ( $city_term ) {  ?> 
                               / <?php echo esc_html( $city_term->name ); ?>
                            <?php } ?>
                        </h5>
                        <?php }	?>
                        
                        
                        <a href="<?php the_permalink() ?>" class="btn-material"><i class="ion-ios-arrow-left"></i></a>
                    </div><!-- card-title --> 
                    <?php include TEMPLATEPATH.'/partials/home/properties-details.php'; ?>

                     <p><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
                 </div><!-- card-block --> 
                <div class="card-footer">
                 <div class="row">
                   <div class="col-md-6">
                      <time><?php the_date(' d / m / Y'); ?><i class="icon icon-Agenda"></i></time>
                   </div>
                   <div class="col-md-6 no-padding">
                     <?php get_template_part( 'partials/home/share'); ?>
                    </div> 
                 </div>   
               </div><!-- card-foote --> 
             </div><!-- card --> 
        
    
                        <?php
                    endwhile;
                    ?>
           </div><!-- owl-carousel -->   
		  <?php else: ?>
          <?php endif;
          wp_reset_postdata(); ?>
        
        </div><!-- aside-block --> 
		<?php  } 

        function form ( $instance ) {
		$instance = wp_parse_args ( (array) $instance, array ( 'title' => __ ( 'عقارات متشابهة', 'makani' ) ) );
		$title = esc_attr ( $instance[ 'title' ] );	?>
		<p>
        <label for="<?php echo esc_attr( $this->get_field_id ( 'title' ) ); ?>"><?php _e ( 'Widget Title', 'makani' ); ?></label>
        <input id="<?php echo esc_attr( $this->get_field_id ( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name ( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat"/>
		</p>
		<?php }
        function update ( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'title' ] = strip_tags ( $new_instance[ 'title' ] );
            return $instance;
        }
      }
    }


if( !function_exists( 'makani_register_featured_properties_widget' ) ) :
    function makani_register_featured_properties_widget() {
        register_widget( 'makani_Featured_Properties_Widget' ); }
    add_action( 'widgets_init', 'makani_register_featured_properties_widget' );
endif;
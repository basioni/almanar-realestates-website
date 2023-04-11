<?php
if ( !class_exists('makani_Property_Search_Widget') ) {
    class makani_Property_Search_Widget extends WP_Widget {
	public function __construct () {
		$widget_ops = array ( 'classname' => 'makani_Property_Search_Widget', 'description' => __ ( 'This widget displays properties search form.', 'makani' ) );
		parent::__construct ( 'makani_Property_Search_Widget', __ ( 'makani Property Search', 'makani' ), $widget_ops );
	} 
	
	function widget ( $args, $instance ) {
		global $makani_options;
		echo '<div class="aside-block search-aside wow fadeInUp">';
		extract ( $args );
		$title = apply_filters ( 'widget_title', $instance[ 'title' ] );
		if ( empty( $title ) ) {
			$title = false;
		}
		
		if ( $title ):
			echo ' <h3> ' . $title . ' </h3><div class="divider"><span></span></div>';
		endif;
		
		
		$search_fields = $makani_options[ 'makani_search_fields' ][ 'enabled' ];
		$search_page = $makani_options[ 'makani_search_page' ];
		if ( ( 0 < count ( $search_fields ) ) && ( ! empty( $search_page ) ) ) { ?>
        
                <form action="<?php echo get_permalink ( $search_page ); ?>" method="get">
                <?php foreach ( $search_fields as $key => $val ) {
                 switch ( $key ) { 
				 
				         case 'location': ?>
                         <div class="select-contanier">
                            <select name="city" id="select-property-city" class="form-control c-select">
                                     <?php makani_generate_taxonomy_options( 'property-city', __( 'المدينة', 'makani' ) );?>
                             </select>
                        </div>
                        <?php break; ?>


                        <?php case 'status': ?>
                           <div class="select-contanier">
                            <select name="status" id="select-status" class="form-control c-select">
                            <?php makani_generate_taxonomy_options( 'property-status', __( 'الغرض', 'makani' ) );?>
                            </select>
                           </div>
                        <?php break;

                        case 'type': ?>
                            <div class="select-contanier">
                                <select name="type" id="select-property-type" class="form-control c-select ">
                                  <?php makani_generate_taxonomy_options( 'property-type', __( 'الوحدات', 'makani' ) ); ?>
                                </select>
                            </div>
                        <?php break;


                        case 'min-max-price': ?>
                           <div class="select-contanier">
                                <select name="min-price" id="select-min-price" class="form-control c-select">
                                    <?php makani_minimum_prices_options(); ?>
                                </select>
                           </div>
                           <div class="select-contanier">
                                <select name="max-price" id="select-max-price" class="form-control c-select">
                                    <?php makani_maximum_prices_options(); ?>
                                </select>
                           </div>
                           
                
                        <?php break;

                        case 'min-max-area': ?>
                           <div class="select-contanier">
                             <input type="text" name="min-area" id="min-area" pattern="[0-9]+" value="<?php echo isset($_GET['min-area'])?$_GET['min-area']:''; ?>" placeholder="<?php _e('Min Area (sq ft)', 'makani'); ?>" title="<?php _e('Please only provide digits!','makani'); ?>"  class="form-control"/>
                            </div>
                           <div class="select-contanier">
                            <input type="text" name="max-area" id="max-area" pattern="[0-9]+" value="<?php echo isset($_GET['max-area'])?$_GET['max-area']:''; ?>" placeholder="<?php _e('Max Area (sq ft)', 'makani'); ?>" title="<?php _e('Please only provide digits!','makani'); ?>" class="form-control" />
                            </div>
                        <?php break;
                    }
                } ?>
                
               <?php
                if ( $makani_options[ 'makani_search_features' ] ) { ?>
                        <?php  $all_features = get_terms( 'property-feature' );
                        if ( !empty( $all_features ) && !is_wp_error( $all_features ) ) {
                            $required_features_slugs = array();
                            if ( isset( $_GET[ 'features' ] ) ) {
                                $required_features_slugs = $_GET[ 'features' ];
                            }
                            if ( 0 < count ( $all_features ) ) {  ?>
                             <div class="row">
                             
                                <?php  foreach ( $all_features as $feature ) {
                                    $checked = '';
                                    if ( in_array( $feature->slug, $required_features_slugs ) ) {
                                        $checked = 'checked';
                                    } ?>
                                    <div class="all-checkbox col-md-6 col-xs-6 no-padding-left"> 
                                     <div class="checkbox">
                                        <input type="checkbox" name="features[]" id="feature-<?php echo $feature->slug ?>" value="<?php echo $feature->slug ?>" <?php $checked ?> />
                                        <label for="feature-<?php echo $feature->slug ?>"></label>
                                      </div>
                                     <span class="checkbox-inline"><?php echo( $feature->name ) ?> </span>
                                   </div>
                               <?php } ?>
                                
                                
                            </div>
                        <?php  }  } ?>
                    <?php } ?>
               
               <button type="submit" class="btn btn-search">
                    <i class="icon icon-Search"></i>البحث
               </button>
           </form>
        
                
        <?php  } ?>
        </div><!-- aside-block -->
       <?php }
      
	    function form ( $instance ) {
		$instance = wp_parse_args ( (array) $instance, array ( 'title' => __ ( 'البحث عن العقارات', 'makani' ) ) );
		$title = esc_attr ( $instance[ 'title' ] );
		?>
        
		<p>
        <label for="<?php echo esc_attr( $this->get_field_id ( 'title' ) ); ?>"><?php _e ( 'Widget Title', 'makani' ); ?></label>
        <input id="<?php echo esc_attr( $this->get_field_id ( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name ( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat"/>
		</p>
	<?php
	}
	function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags ( $new_instance[ 'title' ] );
		return $instance;
	}
  }
}

if( !function_exists( 'makani_register_property_search_widget' ) ) :
    function makani_register_property_search_widget() {
        register_widget( 'makani_Property_Search_Widget' );
    }
    add_action( 'widgets_init', 'makani_register_property_search_widget' );
endif;
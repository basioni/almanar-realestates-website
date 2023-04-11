<?php
if ( !class_exists( 'makani_contact_Widget' ) ) {  
   class makani_contact_Widget extends WP_Widget {
    public function __construct(){
            $widget_ops = array(
                'classname' => 'makani_contact_Widget',
                'description' => __('Displays recent contact .','makani')
            );
            parent::__construct( 'makani_contact_Widget', __('makani contact','makani'), $widget_ops );
        }
		


       function widget($args, $instance) {
            extract($args);
            $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
			echo '	<div class="aside-block contact-aside wow fadeInUp">';
		if ( empty( $title ) ) {
			$title = false;
		}
		global $makani_options;
       $contact_form_page = $makani_options['contact-form-page'] ; 

		if ( $title ):
			echo '<div class="header-contact">
                  <h3> ' . $title . ' </h3>
                  <i class="ion-paper-airplane"></i>
                  <div class="parallax-overlay"></div>
                </div>';
		  endif; ?>
          
         <?php  echo do_shortcode( $contact_form_page ); ?>
           
        </div><!-- aside-block --> 
		<?php  } 

        function form ( $instance ) {
		$instance = wp_parse_args ( (array) $instance, array ( 'title' => __ ( ' أتصل بنا ', 'makani' ) ) );
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


if( !function_exists( 'makani_register_contact_widget' ) ) :
    function makani_register_contact_widget() {
        register_widget( 'makani_contact_Widget' ); }
    add_action( 'widgets_init', 'makani_register_contact_widget' );
endif;
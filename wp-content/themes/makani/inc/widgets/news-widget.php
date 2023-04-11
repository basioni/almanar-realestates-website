<?php
global $makani_options;
if ( !class_exists( 'makani_news_Widget' ) ) {  
   class makani_news_Widget extends WP_Widget {
    public function __construct(){
            $widget_ops = array(
                'classname' => 'makani_news_Widget',
                'description' => __('Displays recent news .','makani')
            );
            parent::__construct( 'makani_news_Widget', __('makani news','makani'), $widget_ops );
        }
		


       function widget($args, $instance) {
            extract($args);
            $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
			echo '	<div class="aside-block  news-aside wow fadeInUp">';
		if ( empty( $title ) ) {
			$title = false;
		}
		
		if ( $title ):
			echo '<h3> ' . $title . ' </h3><div class="divider"><span></span></div>';
		endif;
	 
            $makani_news_category =  $makani_options[ 'makani_news_category' ] ;
			$number_of_news = intval( $makani_options[ 'makani_news_number' ] );
			if( !$number_of_news ) {
				$number_of_news = 3;
			}

            $news_args = array(
				'post_type' => 'post',
				'cat' => $makani_news_category ,
				'posts_per_page' => $number_of_news
			);
						



            $news_query = new WP_Query($news_args);
            echo $before_widget;

            if( $news_query->have_posts() ): ?>
       
               <?php
                    while($news_query->have_posts()):
                        $news_query->the_post();
                        $news_property = new makani_Property( get_the_ID() );
                        ?>
  
                  <div class="news-aside-block">
                       <h4><a href="<?php the_permalink(); ?>"><?php echo get_makani_custom_excerpt( get_the_title(),5 ); ?></a></h4>
                       <time><?php the_time('d/m/Y'); ?><i class="icon icon-Agenda"></i></time>
                       <p><?php echo get_makani_custom_excerpt( get_the_content(), 17 ); ?></p>
                   </div>
                
    
           <?php endwhile;  ?>
           
                   
                   
                
		  <?php else: ?>
          <?php endif;
          wp_reset_postdata(); ?>
        
        </div><!-- aside-block --> 
		<?php  } 

        function form ( $instance ) {
		$instance = wp_parse_args ( (array) $instance, array ( 'title' => __ ( 'أخر الأخبار ', 'makani' ) ) );
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


if( !function_exists( 'makani_register_news_widget' ) ) :
    function makani_register_news_widget() {
        register_widget( 'makani_news_Widget' ); }
    add_action( 'widgets_init', 'makani_register_news_widget' );
endif;
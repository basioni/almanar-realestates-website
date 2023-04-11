<?php
	class makani_Widget_Facebook_Like extends WP_Widget {
	
		function makani_Widget_Facebook_Like() {		
			$widget_ops = array('classname' => 'makani_widget-facebook-like', 'description' => __('Custom widget for facebook like box', 'codeex_theme_name'));	
			parent::__construct('FacebookLikeBox', __('makani: Facebook Like Box', 'codeex_theme_name'), $widget_ops);		
		}
	
		function widget($args, $instance) {	
		echo '<div class="aside-block wow fadeInUp">';	
			extract($args);		
			$title = apply_filters('widget_title', $instance['title']);		
			if (empty($title)) $title = false;					
				$instance_makani_page_url = array();
				
				$makani_page_url = 'makani_page_url';
				$instance_makani_page_url = isset($instance[$makani_page_url]) ? esc_attr($instance[$makani_page_url]) : '';

				echo $before_widget;	
				if ($title) {						
					echo $before_title;
					echo $title;
					echo $after_title;						
				}				

				?>	

				<!--FACEBOOK LIKE BOX-->

				<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $instance_makani_page_url; ?>&amp;width=230&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=261707003862099" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:230px;" allowTransparency="true"></iframe>
                
                
</div><!-- aside-block -->
				<?php
					echo $after_widget.'';				
				}
			
				function update($new_instance, $old_instance) {				
					$instance = $old_instance;				
					$instance['title'] = strip_tags($new_instance['title']);
					$instance['makani_page_url'] = strip_tags($new_instance['makani_page_url']);			
					return $instance;				
				}
			
				function form($instance) {				
					$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
					$instance_makani_page_url = array();
					
					$makani_page_url = 'makani_page_url';
					$instance_makani_page_url = isset($instance[$makani_page_url]) ? esc_attr($instance[$makani_page_url]) : '';										
				?>
					<div>			
						<div>
							<p><label for="<?php echo $this -> get_field_id($makani_page_url); ?>"><?php _e('Facebook Page URL', 'codeex_theme_name'); ?></label>
							<input class="widefat" type="text" id="<?php echo $this -> get_field_id($makani_page_url); ?>" name="<?php echo $this -> get_field_name($makani_page_url); ?>" value="<?php echo $instance_makani_page_url; ?>">		
							</p>											
						</div>		
					</div>
		<?php
				}			
		}


		function makani_widgets_facebook_like() {			
			register_widget('makani_Widget_Facebook_Like');			
		}
		add_action('widgets_init', 'makani_widgets_facebook_like');
?>
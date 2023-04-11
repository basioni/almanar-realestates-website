<?php $makani_video_url = get_post_meta(get_the_ID(), 'makani_video_url', true); 
 if ( ! empty( $makani_video_url ) ) { ?>
 <iframe width="100%" height="360" src="https://www.youtube.com/embed/<?php echo $makani_video_url ;?>" frameborder="0" allowfullscreen></iframe>
<?php  }?>
 




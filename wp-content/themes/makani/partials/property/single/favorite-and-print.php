<ul>
    <?php if ( is_user_logged_in() ) {
		
        if ( is_added_to_favorite( get_current_user_id(), get_the_ID() ) ) { ?>
        
        <li class="tooltip-bottom fade-animation" data-title="اعجاب">
            <a id="add-to-favorite" class="add-to-fav added" href="#"><i class="icon icon-Heart"></i></a>
        </li>
        
        <?php } else { ?>
        <li class="tooltip-bottom fade-animation" data-title="اعجاب">
            <a id="add-to-favorite" class="add-to-fav" href="#"><i class="icon icon-Heart"></i></a>
        </li>
        
        <?php do_action( 'makani_add_to_favorites' );  }
        } else { ?>
        
        <li class="tooltip-bottom fade-animation" data-title="اعجاب">
            <a class="add-to-fav" href="#login-modal" data-toggle="modal"><i class="icon icon-Heart"></i></a>
        </li>
        
    <?php } ?>
    
    
    <li class="tooltip-bottom fade-animation" data-title="تحميل">
      <?php $attachment_id = get_post_meta(get_the_ID(), 'makani_attachments', true); ?>
      <?php $file_path = wp_get_attachment_url( $attachment_id );
	  if ( $file_path ) {
		$file_type = wp_check_filetype( $file_path );  ?>
        <a target="_blank" href="<?php echo $file_path ?>"> <i class="icon icon-Download"></i>
			<?php makani_get_file_icon( $file_type['ext'] ); get_the_title( $attachment_id ) ?>
        </a>
      <?php } ?>
   </li>
      
   <li class="tooltip-bottom fade-animation" data-title="طباعة">
      <a href="javascript:window.print()"><i class="icon icon-FileBox"></i></a>
   </li>
</ul>        
       
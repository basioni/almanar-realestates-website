<div class="share btn"><i class="icon icon-Share"></i> 
    <div class="share-links">
      <div class="socials">
         <ul>
         
          <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="ion-social-facebook"></a></li>
          <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" class="ion-social-googleplus"></a></li>
          <li><a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title() .' '. get_permalink()); ?>" target="_blank" class="ion-social-twitter"></a></li>
          
         </ul>
      </div>
   </div>
</div><!-- share btn -->
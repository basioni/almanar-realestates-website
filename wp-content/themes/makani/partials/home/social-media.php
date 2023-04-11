 <?php global $makani_options; ?>
 
            <?php
				$facebook_link = $makani_options['facebook-link'];
				if(!empty($facebook_link)) {?>
                <li class="facebook one"><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="ion-social-facebook"></i></a></li>
            <?php } ?>
            <?php
				$twitter_link = $makani_options['twitter-link'];
				if(!empty($twitter_link)) {?>
                <li class="twitter two"><a href="<?php echo $twitter_link; ?>" target="_blank"><i class="ion-social-twitter"></i></a></li>
            <?php } ?>
            <?php
				$google_plus_link = $makani_options['google-plus-link'];
				if(!empty($google_plus_link)) {?>
                <li class="googleplus three"><a href="<?php echo $google_plus_link; ?>" target="_blank"><i class="ion-social-googleplus"></i></a></li>
            <?php } ?>
            <?php
				$instagram_link = $makani_options['instagram-link'];
				if(!empty($instagram_link)) {?>
                <li class="linkedin"><a href="<?php echo $instagram_link; ?>" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
            <?php } ?>
            <?php
				$skype_link = $makani_options['skype-link'];
				if(!empty($skype_link)) {?>
                <li class="skype"><a class="col-sm-10" href="skype:<?php echo $skype_link ;?>?userinfo"><i class="ion-social-skype"></i></a></li>
            <?php } ?>
            <?php
				$youtube_link = $makani_options['youtube-link'];
				if(!empty($youtube_link)) {?>
                <li class="youtube"><a href="<?php echo $youtube_link; ?>" target="_blank"><i class="ion-social-youtube"></i></a></li>
            <?php } ?>
            <?php
				$linkedin_link = $makani_options['linkedin-link'];
				if(!empty($linkedin_link)) {?>
                <li class="linkedin"><a href="<?php echo $linkedin_link; ?>" target="_blank"><i class="ion-social-linkedin"></i></a></li>
            <?php } ?>
            <?php
				$pinterest_link = $makani_options['pinterest-link'];
				if(!empty($pinterest_link)) {?>
                <li class="pinterest"><a href="<?php echo $pinterest_link; ?>" target="_blank"><i class="ion-social-pinterest"></i></a></li>
            <?php } ?>
            <?php
				$vimeo_link = $makani_options['vimeo-link'];
				if(!empty($vimeo_link)) {?>
                <li class="vimeo"><a href="<?php echo $vimeo_link; ?>" target="_blank"><i class="ion-social-vimeo"></i></a></li>
            <?php } ?>
            <?php
				$dribbble_link = $makani_options['dribbble-link'];
				if(!empty($dribbble_link)) {?>
                <li class="dribbble"><a href="<?php echo $dribbble_link; ?>" target="_blank"><i class="ion-social-dribbble-outline"></i></a></li>
            <?php } ?>

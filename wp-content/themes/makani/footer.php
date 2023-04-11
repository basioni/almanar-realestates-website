<?php global $makani_options; ?>
 <div class="clearfix"></div>
    <footer>
        <div class="container"> 
             <div class="row">
                 <div class="col-lg-3 col-md-6 col-xs-12 about-footer">
                 	<div class="cd-logo footer-logo">
					   <?php
                        $makani_site_name  = get_bloginfo( 'name' );
                        $makani_tag_line   = get_bloginfo ( 'description' );
                
                        if ( !empty( $makani_options['makani_footer_logo'] ) && !empty( $makani_options['makani_footer_logo']['url'] ) ) {?>
                        <img src="<?php echo esc_url( $makani_options['makani_footer_logo']['url'] ); ?>" alt="<?php echo esc_attr( $makani_site_name ); ?>" />
                        <?php } else { ?>
                        
                       <h3><?php echo esc_html( $makani_site_name ); ?></h3>
                       <h4><?php echo esc_html( $makani_tag_line ); ?></h4>
                       <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                      
					<?php if ( ! empty( $makani_options[ 'makani_footer_about' ] ) ) {  ?>
                     <p><?php echo $makani_options[ 'makani_footer_about' ] ; ?> </p>
                    <?php  }  ?>
                 
                 
                 <?php  $mail_feedburner_switch = $makani_options[ 'mail-feedburner_switch' ] ;  ?>
				 <?php if (true == $mail_feedburner_switch ): ?>
                    <div class="mail-list">   
                                     <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" 
                       onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=
                       <?php echo $makani_options['mail-feedburner'];  ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                                       <input type="hidden" value="<?php echo $makani_options['mail-feedburner'];  ?>" name="uri"/>
                                       <input type="hidden" name="loc" value="en_US">
                                       <input type="submit" value="&#xf2c3;"  class="">
                                       <input type="text" class="form-control no-border" name="email" title="البريد الالكتروني" placeholder="قم بكتابة بريدك الالكترونى">
                                    </form>
                                </div><!-- mail-list -->
                 <?php endif; ?>
       
                 </div><!-- cd-logo --> 
                 
                 <div class="col-lg-2 col-md-6 col-xs-12 link-footer">
                   <?php if ( ! empty( $makani_options[ 'footer_menu_title' ] ) ) {  ?>
                     <h4><?php echo $makani_options[ 'footer_menu_title' ] ; ?> </h4>
                  <?php  }  ?>
                   
					<?php wp_nav_menu( array(
                    'menu'              => 'footer-menu',
                    'theme_location'    => 'footer-menu',
                    'menu_class'        => 'footer-menu',
                    ));?>
                    
                 </div><!-- col-md-3 -->
                 <div class="col-lg-4 col-md-6 col-xs-12 morelink-footer">
                  <?php if ( ! empty( $makani_options[ 'footer_menu_title2' ] ) ) {  ?>
                     <h4><?php echo $makani_options[ 'footer_menu_title2' ] ; ?> </h4>
                  <?php  }  ?>
                  <ul>
                  
 <?php 
$number_of_featured_properties = intval( $makani_options[ 'makani_featured_number' ] );
if( !$number_of_featured_properties ) {
    $number_of_featured_properties = 3;
}
$featured_properties_args = array(
    'post_type' => 'property',
    'posts_per_page' => $number_of_featured_properties,
    'meta_query' => array(
        array(
            'key' => 'makani_featured',
            'value' => 1,
        )
    )
);
$featured_properties_query = new WP_Query( $featured_properties_args );
if ( $featured_properties_query->have_posts() ) :
?>

            <?php
            while ( $featured_properties_query->have_posts() ) :
            $featured_properties_query->the_post();
            $featured_property = new makani_Property( get_the_ID() );  ?>
               <li><a href="<?php the_permalink(); ?>" class="hvr-icon-forward"><?php echo get_makani_custom_excerpt( get_the_title(), 5 ); ?></a></li>
             <?php endwhile;
             wp_reset_postdata();  ?>
      

<?php endif; ?>
 </ul>
                      
                   
                   
                   
                 </div><!-- col-md-3 -->
                 <div class="col-lg-3 col-md-6 col-xs-12 contact-footer">
                   <h4>اتصل بنا </h4>
                     <ul class="contact-info-footer">
						<?php if ( ! empty( $makani_options[ 'contact-mail' ] ) ) {  ?>
                         <li class="en"><i class="icon ion-ios-email"></i>
						 <?php echo $makani_options[ 'contact-mail' ] ;?></li>
                       <?php  }  ?>
                       
                       <?php if ( ! empty( $makani_options[ 'contact-phone1' ] ) ) {  ?>
                         <li class="en"><i class="icon ion-android-call"></i>
						 <?php echo $makani_options[ 'contact-phone1' ] ;?></li>
                       <?php  }  ?>
                       
                       <?php if ( ! empty( $makani_options[ 'contact-phone2' ] ) ) {  ?>
                         <li class="en"><i class="icon ion-android-phone-portrait"></i>
						 <?php echo $makani_options[ 'contact-phone2' ] ;?></li>
                       <?php  }  ?>
                        
                     </ul>
                     <ul class="social-footer social-media">
                        <?php get_template_part( 'partials/home/social-media' ); ?>
                    </ul>
                 </div><!-- col-md-3 -->
                 
             </div><!-- container --> 
        </div><!-- container --> 
        <div class="copy-right">
            <div class="container">
         		 <h4> <?php echo $makani_options[ 'makani_copyright_html' ] ; ?>/ تصميم و تطوير  <a href="http://motivoweb.com/">motivoweb</a></h4>
           </div><!-- container -->  
        </div>
    </footer>
    
	<?php  $makani_color_switch = $makani_options[ 'makani_color_switch' ] ;  ?>
    <?php if (true == $makani_color_switch ): ?>
        <div id="colorchanger">
                        <a class="colorbox colorblue" href="?theme=blue" title="Blue Theme"></a>
                        <a class="colorbox colorgreen" href="?theme=green" title="Green Theme"></a>
                        <a class="colorbox colororange" href="?theme=orange" title="Orange Theme"></a>
                    </div> 
        <div id="open-switcher" style="display: none;"><i class="icon ion-paintbrush"></i></div>
        <div id="close-switcher" style="display: block;"><i class="icon ion-android-color-palette"></i></div>
        <div id="demo-colors" style="left: 0px;">
          <div id="demo-wrapper">
                  <h2>الوان القالب</h2>
                  <ul>
                      <li class="dark" data-path="<?php bloginfo ('template_url'); ?>/css/color/dark.css"></li>
                      <li class="orange" data-path="<?php bloginfo ('template_url'); ?>/css/color/orange.css"></li>
                      <li class="violet" data-path="<?php bloginfo ('template_url'); ?>/css/color/violet.css"></li>
                      <li class="yellow" data-path="<?php bloginfo ('template_url'); ?>/css/color/yellow.css"></li>
                      <li class="gren" data-path="<?php bloginfo ('template_url'); ?>/css/color/gren.css"></li>
                  </ul>
                  <div class="clearfix"></div>
                  <p data-path="<?php bloginfo ('template_url'); ?>/demo/default.css">قم باستعادة التنسيق الاساسى للقالب</p>
             </div>
          </div>
    <?php endif; ?>
       
  
	<div class="cd-overlay"></div>
    <!-- ========== main jQuery ========== -->
    <script src="<?php bloginfo ('template_url'); ?>/js/jquery.min.js"></script>

     <div style="display:none">
   		<svg version="1.1" id="type-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="25px" height="25px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path d="M86.12,55.498H37.268c-1.51-7.658-6.906-13.332-13.352-13.332c-7.614,0-13.786,7.908-13.786,17.666
	s6.172,17.666,13.786,17.666c6.77,0,12.388-6.256,13.554-14.5h29.326c-0.104,0.402-0.177,0.816-0.177,1.25v8.699l3.333-0.006V68.75
	h2.333v4.248h2.542v-5.332h2.333v5.332h1.958V68.75h2.333v4.373l3.917,0.027v-8.902c0-0.434-0.073-0.848-0.177-1.25h0.927
	c2.071,0,3.75-1.678,3.75-3.75C89.87,57.178,88.191,55.498,86.12,55.498z M23.917,69.307c-3.376,0-6.115-4.242-6.115-9.475
	s2.738-9.475,6.115-9.475c3.377,0,6.114,4.242,6.114,9.475S27.294,69.307,23.917,69.307z M54.913,19.112
	c1.332-0.001,2.41,1.078,2.41,2.409v24.041l7.426-7.426c0.941-0.941,2.467-0.941,3.408,0c0.941,0.94,0.941,2.466,0,3.407
	l-11.539,11.54c-0.941,0.94-2.467,0.94-3.408,0l-11.539-11.54c-0.471-0.471-0.705-1.087-0.707-1.704
	c0-0.617,0.236-1.233,0.707-1.703c0.941-0.941,2.467-0.941,3.408,0l7.426,7.426V21.521C52.505,20.19,53.583,19.111,54.913,19.112z"
	/>
</svg>
        <svg version="1.1" id="stuts-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="18px" height="18px"  viewBox="0 0 406.903 406.903" style="enable-background:new 0 0 406.903 406.903;" xml:space="preserve">
        <path d="M406.464,126.505l-10.625-74.086c-2.982-20.79-21.06-36.468-42.052-36.468c-2.013,0-4.046,0.145-6.051,0.432L273.65,27.008
            c-11.237,1.611-21.175,7.503-27.981,16.589c-6.806,9.085-9.667,20.277-8.055,31.514c2.224,15.509,12.846,28.172,26.812,33.606
            l-3.514,4.779l-8.542-3.752c-23.15-41.025-67.153-68.793-117.523-68.793C60.493,40.952,0,101.445,0,175.796
            c0,74.358,60.493,134.846,134.847,134.846c26.587,0,51.401-7.736,72.313-21.073l92.796,92.798
            c5.725,5.722,13.227,8.585,20.728,8.585c7.503,0,15.006-2.863,20.729-8.585c11.448-11.448,11.448-30.01,0-41.457l-92.796-92.799
            c7.841-12.293,13.727-25.942,17.263-40.501c2.974,0.653,6.015,0.99,9.102,0.99c13.471,0,26.275-6.478,34.251-17.328l22.9-31.152
            c7.87,9.164,19.521,14.923,32.238,14.921c2.021,0,4.062-0.146,6.052-0.433c11.239-1.61,21.177-7.502,27.984-16.589
            C405.215,148.934,408.076,137.742,406.464,126.505z M134.847,263.74c-48.492,0-87.944-39.449-87.944-87.943
            c0-48.493,39.452-87.943,87.944-87.943c5.26,0,10.413,0.466,15.422,1.355c-1.883,1.46-3.657,3.075-5.285,4.853l-57.211,62.465
            c-15.826,17.281-14.643,44.218,2.638,60.047c7.856,7.195,18.048,11.157,28.7,11.157c11.892,0,23.316-5.027,31.346-13.795
            l36.65-40.016l34.673,15.229C215.328,231.329,178.801,263.74,134.847,263.74z M366.599,149.861c-0.842,0.121-1.68,0.18-2.506,0.18
            c-8.565,0.001-16.049-6.293-17.301-15.018l-4.492-31.321l-53.488,72.763c-4.853,6.602-13.638,8.951-21.138,5.658l-87.189-38.294
            l-48.744,53.222c-3.452,3.768-8.173,5.68-12.91,5.68c-4.222,0-8.456-1.518-11.815-4.594c-7.127-6.528-7.613-17.598-1.085-24.726
            l57.21-62.465c5.062-5.526,13.081-7.216,19.942-4.203l85.832,37.696l46.163-62.799l-33.19,4.761
            c-9.565,1.372-18.435-5.271-19.807-14.839c-1.372-9.566,5.271-18.435,14.838-19.807l74.087-10.625
            c9.563-1.369,18.435,5.271,19.807,14.838l10.626,74.086C382.81,139.621,376.167,148.49,366.599,149.861z"/>
        </svg>
        <svg version="1.1" id="cost-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="23px" height="23px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
        <path d="M76.492,62.067L39.4,24.977c-0.404-0.404-0.951-0.631-1.522-0.631h-13.58c-0.979-1.243-2.293-2.308-3.84-3.075
            c-3.722-1.85-7.915-1.545-10.2,0.738c-0.422,0.422-0.77,0.904-1.031,1.433c-0.844,1.697-0.757,3.714,0.243,5.677
            c0.964,1.894,2.673,3.521,4.815,4.584c0.961,0.477,1.953,0.808,2.935,1.002v10.298c0.001,0.571,0.228,1.12,0.632,1.523
            l37.091,37.091c0.841,0.842,2.204,0.842,3.046,0l18.504-18.504C77.333,64.273,77.333,62.909,76.492,62.067z M17.852,24.977
            c-0.403,0.403-0.631,0.952-0.631,1.522v6.741c-0.768-0.176-1.541-0.448-2.297-0.823c-1.867-0.927-3.351-2.329-4.174-3.95
            c-0.789-1.548-0.873-3.106-0.237-4.386c0.192-0.389,0.447-0.745,0.761-1.056c1.854-1.854,5.368-2.046,8.546-0.468
            c0.968,0.48,1.828,1.089,2.552,1.789h-2.997C18.803,24.345,18.256,24.572,17.852,24.977z M22.59,29.716
            c0.576-0.577,1.293-0.93,2.041-1.062c0.066,0.796-0.062,1.557-0.399,2.238c-0.192,0.389-0.448,0.745-0.762,1.057
            c-0.525,0.526-1.188,0.913-1.937,1.169C21.313,31.922,21.664,30.641,22.59,29.716z M28.005,35.131c-1.495,1.495-3.92,1.495-5.415,0
            c-0.21-0.21-0.389-0.439-0.538-0.682c0.934-0.325,1.768-0.817,2.435-1.484c0.422-0.422,0.77-0.904,1.031-1.433
            c0.439-0.884,0.621-1.854,0.558-2.857c0.707,0.146,1.382,0.492,1.93,1.041C29.5,31.211,29.5,33.635,28.005,35.131z M90.718,60.799
            L72.215,79.303c-0.842,0.841-2.206,0.841-3.047,0l-0.937-0.938l11.537-11.539c0.809-0.808,1.254-1.881,1.254-3.023
            s-0.444-2.216-1.253-3.023L42.679,23.688c-0.81-0.808-1.883-1.252-3.022-1.252h-8.21v-0.251c0-0.571,0.228-1.119,0.632-1.523
            c0.404-0.403,0.95-0.631,1.521-0.631h2.998c-0.725-0.699-1.586-1.309-2.552-1.789c-3.179-1.578-6.693-1.386-8.547,0.468
            c-0.313,0.311-0.567,0.667-0.762,1.056c-0.092,0.188-0.165,0.382-0.227,0.581c-0.409-0.261-0.827-0.509-1.265-0.729
            c0.063-0.165,0.126-0.331,0.205-0.491c0.264-0.528,0.61-1.01,1.033-1.433c2.283-2.283,6.479-2.587,10.2-0.738
            c1.546,0.767,2.861,1.832,3.839,3.075h13.581c0.569,0,1.118,0.228,1.522,0.631l37.091,37.091
            C91.56,58.595,91.56,59.959,90.718,60.799z"/>
        </svg>
        <svg version="1.1" id="bed-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" 
	 viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
<g id="Layer_1">
	<g>
		<path d="M44.4,17.2c-1.4,0-2.5,1.1-2.5,2.5V26h-36V14.7c0-1.4-1.1-2.5-2.6-2.5s-2.6,1.1-2.6,2.5V35c0,1.4,1.1,2.5,2.6,2.5
			s2.6-1.1,2.6-2.5v-2.9h36V35c0,1.4,1.1,2.5,2.5,2.5s2.5-1.1,2.5-2.5V19.7C46.9,18.3,45.8,17.2,44.4,17.2z"/>
		<circle cx="11.4" cy="20.5" r="3.6"/>
		<path d="M19.4,24.1h17.2c1.8,0,3.2-1.5,3.2-3.2c0-1.8-1.4-3.2-3.2-3.2H19.4c-1.8,0-3.2,1.5-3.2,3.2C16.2,22.6,17.7,24.1,19.4,24.1
			z"/>
	</g>
</g>
</svg>
		<svg version="1.1" id="bath-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="15px" 
	 viewBox="0 0 26 26" enable-background="new 0 0 48 48" xml:space="preserve">
<g>
	<path d="M25,12V4c0-1.608-1.065-4-4-4c-2.469,0-3.604,1.692-3.905,3.187C15.901,3.571,15.031,4.678,15.031,6
		h5.938c0-1.242-0.764-2.303-1.847-2.746C19.31,2.676,19.786,2,21,2c1.826,0,1.992,1.537,2,2v8H1c-0.552,0-1,0.448-1,1v1
		c0,0.553,0.448,1,1,1v3c0,2.168,1.829,4.297,3.944,4.855C4.845,23.344,4.59,24,4,24c-0.552,0-1,0.447-1,1s0.448,1,1,1
		c1.727,0,2.745-1.456,2.955-3h12.089c0.211,1.544,1.229,3,2.955,3c0.553,0,1-0.447,1-1s-0.447-1-1-1
		c-0.59,0-0.845-0.656-0.944-1.145C23.171,22.297,25,20.168,25,18v-3c0.553,0,1-0.447,1-1v-1C26,12.448,25.553,12,25,12z M23,18
		c0,1.43-1.57,3-3,3H6c-1.402,0-3-1.598-3-3v-3h20V18z M15.454,7.121l0.061-0.242c0.066-0.269,0.334-0.432,0.606-0.364
		c0.269,0.067,0.431,0.338,0.364,0.606l-0.061,0.242c-0.057,0.228-0.261,0.379-0.485,0.379c-0.04,0-0.08-0.005-0.121-0.015
		C15.55,7.66,15.388,7.389,15.454,7.121z M14.966,9.075l0.098-0.391c0.066-0.268,0.333-0.433,0.606-0.364
		c0.269,0.067,0.431,0.338,0.364,0.606l-0.098,0.391c-0.057,0.228-0.261,0.379-0.485,0.379c-0.04,0-0.08-0.005-0.121-0.015
		C15.062,9.614,14.899,9.342,14.966,9.075z M14.515,10.879l0.061-0.242c0.066-0.268,0.334-0.433,0.606-0.364
		c0.269,0.067,0.431,0.338,0.364,0.606l-0.061,0.242C15.429,11.349,15.225,11.5,15,11.5c-0.04,0-0.08-0.005-0.121-0.015
		C14.61,11.418,14.448,11.146,14.515,10.879z M20.546,7.121c0.066,0.268-0.096,0.539-0.364,0.606
		c-0.04,0.01-0.081,0.015-0.121,0.015c-0.225,0-0.429-0.151-0.485-0.379l-0.061-0.242c-0.066-0.268,0.096-0.539,0.364-0.606
		c0.262-0.069,0.539,0.095,0.606,0.364L20.546,7.121z M21.034,9.075c0.066,0.268-0.096,0.539-0.364,0.606
		c-0.04,0.01-0.081,0.015-0.121,0.015c-0.225,0-0.429-0.151-0.485-0.379l-0.098-0.391C19.9,8.658,20.062,8.387,20.33,8.32
		c0.262-0.07,0.539,0.096,0.606,0.364L21.034,9.075z M20.818,10.273c0.265-0.07,0.539,0.096,0.606,0.364l0.061,0.242
		c0.066,0.268-0.096,0.539-0.364,0.606C21.081,11.495,21.04,11.5,21,11.5c-0.225,0-0.429-0.151-0.485-0.379l-0.061-0.242
		C20.388,10.611,20.55,10.34,20.818,10.273z M17.5,7.25V7c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v0.25
		c0,0.276-0.224,0.5-0.5,0.5S17.5,7.526,17.5,7.25z M17.5,8.806c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v0.389
		c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5V8.806z M17.5,10.75c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5V11
		c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5V10.75z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
		<svg version="1.1" id="draft-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" x="0px" y="0px"
             viewBox="0 0 475.902 475.902"  enable-background="new 0 0 48 48" xml:space="preserve">
        <g>
            <path d="M13.734,51.167l0.016,0.016c0.26,0.61,0.545,0.878,0.545,0.878l0.179-0.187l121.847,116.539v307.488
                h327.663V18.669H136.321v53.405L61.855,0.86l-0.366,0.382C59.018,0.34,45.094-4.806,25.707,15.467S12.726,48.737,13.734,51.167
                L13.734,51.167z M353.354,336.7h69.987v98.559h-69.987V336.7z M353.354,151.775h19.305h10.096h27.434h11.242h1.91v176.796h-69.987
                V151.775z M353.354,59.312h11.177v84.334h-11.177V59.312z M390.883,59.312h11.177v84.334h-11.177V59.312z M423.341,143.646h-1.91
                h-11.242V59.312h13.152V143.646z M382.755,143.646h-10.096V59.312h10.096V143.646z M345.225,143.646h-10.161V59.312h10.161V143.646
                z M315.759,59.312h11.177v84.334h-11.177V59.312z M176.964,59.312h130.667v84.334h-42.675v8.129h42.675h27.434h10.161v176.796
                v8.129v98.559h-53.852v-18.85h-16.257v18.85h-98.153V283.864h12.803v-16.257h-12.803v-60.322l7.34,7.023
                c1.796-8.99,8.348-20.053,16.639-29.515c10.006-11.437,21.573-19.622,30.376-21.858l-54.356-51.99V59.312z"/>
            <path d="M204.455,187.191c-11.453,13.315-15.818,24.768-16.038,30.539c-0.065,1.756,3.877,3.983,4.576,3.983
                c0.016,0,0.033,0,0.041,0l9.307,1.114l6.934,0.829l31.653,3.796c0-0.016-0.016-0.033-0.016-0.057
                c-0.187-2.365,0.894-5.121,2.967-7.56c1.008-1.179,3.65-3.796,6.942-4.032l-9.031-30.807l-1.951-6.657l-2.43-8.307
                c0.146-1.829-1.951-4.178-2.536-4.178C229.011,165.862,216.363,173.34,204.455,187.191z M230.58,175.632l1.463,4.999l1.951,6.657
                l7.064,24.093c-1.561,1.195-2.707,2.414-3.365,3.195c-1.081,1.268-1.992,2.609-2.731,3.975l-24.719-2.959l-6.934-0.829
                l-5.918-0.707c1.626-4.991,5.69-12.794,13.225-21.557C218.606,183.192,225.995,178.014,230.58,175.632z"/>
            <path d="M246.227,227.582c0.041,0.057,0.041,0.146,0.089,0.195l7.332,6.137
                c0.471,0.39,2.203,0.951,3.853,0.951c1.105,0,2.17-0.252,2.788-0.967c1.544-1.78-0.26-5.788-1.049-6.446l-7.332-6.137
                c-0.171-0.146-0.398-0.211-0.667-0.211c-0.049,0-0.106,0.024-0.154,0.033c-0.935,0.081-2.26,0.902-3.398,2.219
                C246.244,225.021,245.666,226.81,246.227,227.582z"/>
            <polygon points="275.116,293.57 291.373,293.57 291.373,267.607 263.834,267.607 263.834,283.864 
                275.116,283.864 	"/>
            <rect x="215.062" y="267.607" width="23.475" height="16.257"/>
            <rect x="275.116" y="318.866" width="16.257" height="23.475"/>
            <rect x="275.116" y="367.637" width="16.257" height="23.475"/>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        </svg>
     </div>
    <?php wp_footer(); ?>
  </body>
</html>
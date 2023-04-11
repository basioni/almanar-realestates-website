<?php
/*
Template Name: contact-us
*/
get_header(); 
global $makani_options;  ?>

<?php
$makani_submit_location_coordinates =  $makani_options['makani_submit_location_coordinates']; 
$makani_submit_address = $makani_options['makani_submit_address']; 
$makani_zoom_location = $makani_options['makani_zoom_location'];  

 if ( ! empty( $makani_submit_location_coordinates ) ) { ?>
 <section class="header-map">
    <div style="overflow:hidden;height:500px;width:100%;">
     <div id="map_canvas" style="height:500px;width:100%;"></div>
        <style>#map_canvas img{max-width:none!important;background:none!important}</style>
        <a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">wordpress themes</a>
    </div>
    <script type="text/javascript"> 
      var styleArray = [
        {
          featureType: "all",
          stylers: [
           { saturation: -90 }
          ]
        },{
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [
            { hue: "#00ffee" },
            { saturation: 50 }
          ]
        },{
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];
    // icon
    var icon = {
        url: "<?php bloginfo ('template_url'); ?>/img/map-marker.png", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    // mapTypeId
    function init_map(){
        var myOptions = {
        zoom: <?php echo ( $makani_zoom_location ) ; ?>,
        scrollwheel: false,
        styles: styleArray,
        center:new google.maps.LatLng(<?php echo ( $makani_submit_location_coordinates ) ; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo ( $makani_submit_location_coordinates ) ; ?>) ,
            icon: icon
            });
        infowindow = new google.maps.InfoWindow({content:"<?php echo stripslashes( htmlspecialchars_decode( $makani_submit_address ) );?>" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
    </script>
  
</section> 
<?php  } else {?>

<section class="header-breadcrumb parallax-single" data-type="background" data-speed="3">
     <div class="parallax-overlay"></div>
        <div class="breadcrumb wow bounceInDown animated"  data-wow-delay="0.3s">
            <div class="container">
            <h3>
			<?php if(function_exists('breadcrumbs')) : ?>
			<?php breadcrumbs() ?>
            <?php endif; ?>
            </h3>
            </div>
        </div>
    </section>
    
<?php } ?>


	<section class="content-pages cd-main-content"> 
         <div class="container">
         <div class="row">
             <div class="col-md-6 col-xs-12 pull-right wow fadeInRight animated">
              <div class="card contact-info">
                 <h3>تواصل معنا</h3>
                 <ul class="social-footer social-media">
                     <?php get_template_part( 'partials/home/social-media' ); ?>
                </ul>
                
                <?php
				$contact_info = $makani_options['contact-info'];
				if(!empty($contact_info)) {?>
                <p><?php echo $contact_info; ?></p>
                <?php } ?>
            
                <ul class="contact-agent">
					<?php
                    $contact_phone1 = $makani_options['contact-phone1'];
                    if(!empty($contact_phone1)) {?>
                    <li><i class="ion-ios-telephone-outline"></i><?php echo $contact_phone1; ?></li>
                    <?php } ?>
                    <?php
                    $contact_phone2 = $makani_options['contact-phone2'];
                    if(!empty($contact_phone2)) {?>
                    <li><i class="ion-iphone"></i><?php echo $contact_phone2; ?></li>
                    <?php } ?>
                    <?php
                    $contact_whatsapp = $makani_options['contact-whatsapp'];
                    if(!empty($contact_whatsapp)) {?>
                    <li><i class="ion-social-whatsapp-outline"></i><?php echo $contact_whatsapp; ?></li>
                    <?php } ?>
                    <?php
                    $contact_mail = $makani_options['contact-mail'];
                    if(!empty($contact_mail)) {?>
                    <li><i class="ion-ios-email-outline"></i><?php echo $contact_mail; ?></li>
                    <?php } ?>
                </ul>
               </div><!-- card contact-info -->
             </div><!-- col-md-6 col-xs-12 -->
             
             <div class="col-md-6 col-xs-12 wow fadeInLeft animated">
                <div class="aside-block contact-aside contact-form-page">
                 <div class="header-contact">
                  <h3>اتصل بنا</h3>
                  <i class="ion-paper-airplane"></i>
                  <div class="parallax-overlay"></div>
                </div>
               <?php $contact_form_page = $makani_options['contact-form-page'] ;  ?>
               <?php  echo do_shortcode( $contact_form_page ); ?>
                </div><!-- aside-block -->
             </div>
             
         </div><!-- row -->  
     </div><!-- container --> 
	</section>  

<?php get_footer(); ?>
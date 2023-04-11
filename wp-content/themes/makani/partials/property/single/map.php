<?php $makani_property_location = get_post_meta(get_the_ID(), 'makani_property_location', true);
$makani_property_address = get_post_meta(get_the_ID(), 'makani_property_address', true);

 if ( ! empty( $makani_property_location ) ) { ?>
 
<section class="property-location-section clearfix">

    <div style="overflow:hidden;height:400px;width:100%;">
    <div id="gmap_canvas" style="height:400px;width:100%;"></div>
        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
        <a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">wordpress themes</a>
    </div>
    <script type="text/javascript"> 
    // Specify features and elements to define styles.
      var styleArray = [
        {
          featureType: "all",
          stylers: [
           { saturation: -80 }
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
        zoom:8,
        scrollwheel: false,
        styles: styleArray,
        center:new google.maps.LatLng(<?php echo ( $makani_property_location ) ; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo ( $makani_property_location ) ; ?>) ,
            icon: icon
            });
        infowindow = new google.maps.InfoWindow({content:"<?php echo stripslashes( htmlspecialchars_decode( $makani_property_address ) );?>" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
    </script>

</section> 
 
 
<?php  }?>
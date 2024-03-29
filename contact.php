
<script >
jQuery(function($){
    "use strict";

    var SLZ = window.SLZ || {};
    

    /*=======================================
    =             MAIN FUNCTION             =
    =======================================*/

    SLZ.mainFunction = function(){

        /*Google map*/
		<?php $gpp=explode(',', $restotparametres['gmap']);?>
		
        var myLatLng = {lat: <?php echo $gpp[0];?>, lng: <?php echo $gpp[1];?>};
        var markerLatLng = {lat: <?php echo $gpp[0];?>, lng: <?php echo $gpp[1];?>};
        var customMapType = new google.maps.StyledMapType(
            [
                {
                    "featureType": "water",
                    "stylers": [
                        { "color": "#f0f3f6" }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",  
                    "stylers": [
                        { "color": "#adb3b7" }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.icon",
                    "stylers": [
                      { "hue": "#ededed" }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "stylers": [
                        { "color": "#c8cccf" }
                    ]
                },
                {
                    "featureType": "road.local",
                    "stylers": [
                        { "color": "#e6e6e6" }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        { "color": "#ffffff" }
                    ]
                },
                {
                    "elementType": "labels.text",
                    "stylers": [
                        { "weight": 0.1 },
                      { "color": "#6d6d71" }
                    ]
                }
            ], 
            {
                name: 'Custom Style'
        });
        var customMapTypeId = 'custom_style';

        var mapProp = {
            center: myLatLng,
            zoom:16,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            draggable: false,
            disableDefaultUI: true,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
            }
        };
        function initialize() {
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            map.mapTypes.set(customMapTypeId, customMapType);
            map.setMapTypeId(customMapTypeId);
            var image = {
                url: 'assets/images/map-marker-128.png',
                // size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(40, 40)
            };
            var marker = new google.maps.Marker({
                position: markerLatLng,
                map: map,
                animation:google.maps.Animation.BOUNCE, 
                icon: image,
                title: 'RBS TRAVEL'
            });

            var contentString = '';

            var infowindow = new google.maps.InfoWindow({
               content: contentString
            });

            marker.addListener('click', function() {
               // infowindow.open(map, marker);
               $('.btn-open-map').parents('.wrapper-info').toggle(200);
               // $('#googleMap').css('pointer-events', 'none');
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $('.btn-open-map').click(function(event) {
            /* Act on the event */
            $(this).parents('.wrapper-info').toggle(400);
            $('#googleMap').css('pointer-events', 'auto');
            if($(window).width() > 462) {
                mapProp = {
                    center: markerLatLng,
                    zoom:16,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    disableDefaultUI: true,
                    mapTypeControlOptions: {
                      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
                    }
                };
            }
            else {
                mapProp = {
                    center: markerLatLng,
                    zoom:15,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    mapTypeControlOptions: {
                      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
                    }
                };
            } 

            initialize();
        });
    };

    /*======================================
    =            INIT FUNCTIONS            =
    ======================================*/
    
    $(document).ready(function(){
        SLZ.mainFunction();
    });
    
    /*=====  End of INIT FUNCTIONS  ======*/
});</script>
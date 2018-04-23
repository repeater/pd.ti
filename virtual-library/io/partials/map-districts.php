<?php
/*
 * @package WordPress
 * @subpackage syrup
 */
$districts = simple_fields_fieldgroup('districts',8);
$districts_json = json_encode($districts);
?>
<div id="map-districts"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh6V12o3U4GPysAvtBQBl47EP7__lx1Tc"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb-jeP9p-WkTFGpypeilCjI_jt8O_nfIc"></script> -->
<script type="text/javascript">
function initialize() {
    var ww = window.innerWidth;
    if (ww > 1200) {
        setZoom = 4;
    } else if (ww > 800) {
        setZoom = 3;
    } else {
        setZoom = 3;
    }
    var mapOptions = {
      center: { lat: 39.828211, lng: -98.579571},
      zoom: setZoom,
      draggable: false,
      mapTypeControl: false,
      streetViewControl: false,
      scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById('map-districts'),
        mapOptions);
    var markers = [];
    var infoWindows = [];
    var infowindow = null;
    var markerData = <?php echo $districts_json; ?>;
    for (i = 0; i < markerData.length; ++i) {
        markers[i] = new google.maps.Marker({
            position: new google.maps.LatLng(markerData[i]['latitude'], markerData[i]['longitude']),
            map: map,
            draggable: false,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                strokeColor: '#723e98',
                strokeWeight: 7,
                scale: 10
            },
            cursor: 'default'
        });
        infoWindows[i] = "\
        <div class='inside-info'>\
            <p class='info-header'><strong>" + markerData[i]['city'] + "</strong></p>\
            <div>" + markerData[i]['address'] + "</div>\
        </div>";
    }
    // console.log(markers);
    var infowindow = new google.maps.InfoWindow({
      content: ''
    });
    google.maps.event.addListener(infowindow, "closeclick", function(e) {
        // jQuery('#map-title').removeClass('title-hide');
    });
    // var markersLength = markers.length;
    // for (var i=0; i<markersLength; i++) {
    //     addInfoWindow(i);
    // }
    // function addInfoWindow(idx){
    //     google.maps.event.addListener(markers[idx], "click", function(e) {
    //         // jQuery('#map-title').addClass('title-hide');
    //         infowindow.setContent(infoWindows[idx]);
    //         infowindow.open(map, markers[idx]);
    //     });
    // }
    google.maps.Map.prototype.clearOverlays = function() {
        for (var i = 0; i < markers.length; i++ ) {
            markers[i].setMap(null);
        };
    }

    var styles = [
        {
            "featureType": "all",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#333333"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 20
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.country",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "administrative.country",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#00b3e3"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#00b3e3"
                },
                {
                    "weight": "1"
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#eeeeee"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#ff0000"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "geometry",
            "stylers": [
                {
                    "gamma": "0.00"
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dedede"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#ff0000"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#00b3e3"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#00b3e3"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f2f2f2"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e9e9e9"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }
    ];
    map.setOptions({styles: styles});
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

/**
 * Created by Luis Ernesto Assandri on 03/06/16.
 */

// Load google map

var map = new google.maps.Map(document.getElementById("gmap"), {
    center: new google.maps.LatLng(40.463667, -3.749220),
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl: false,
    streetViewControl: true,
    mapTypeControl: false
});

var styles = [
    {
        stylers: [
            {hue: "#000000"},
            {saturation: -100}
        ]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [
            {lightness: 100},
            {visibility: "simplified"}
        ]
    }, {
        featureType: "poi",
        stylers: [
            {visibility: "off"}
        ]
    }, {
        featureType: "administrative.country",
        elementType: "labels",
        stylers: [
            {visibility: "off"}
        ]
    }, {
        featureType: "administrative.neighborhood",
        elementType: "labels",
        stylers: [
            {visibility: "off"}
        ]
    }, {
        featureType: "administrative.land_parcel",
        elementType: "labels",
        stylers: [
            {visibility: "off"}
        ]
    }, {
        featureType: "administrative.locality",
        elementType: "labels",
        stylers: [
            {visibility: "off"}
        ]
    }, {
        featureType: "transit.station.bus",
        elementType: "labels",
        stylers: [
            {"visibility": "off"}
        ]
    }, {
        featureType: "transit.station.train",
        elementType: "labels",
        stylers: [
            {"visibility": "on"}
        ]
    }
];

map.setOptions({styles: styles});

// Start the geocoder

var geocoder = new google.maps.Geocoder();

// Get the address to search

var address = document.getElementById('input-address').value;

// Get the lat and lon
var geo= document.getElementById('geolocalizacion').value;
geo = geo.split(',', 2);
var plat = geo[0];
var plon =geo[1];

if (plat != "" & plon != "")
{
    var paddress = document.getElementById('address').value;

    geocodeAddress(geocoder, map, paddress);
}

// Find the geoposition when the button is clicked

document.getElementById('search-address').addEventListener('click', function ()
{
    // Get the address

    var address = document.getElementById('input-address').value;

    geocodeAddress(geocoder, map, address);
});

// Make the fields readonly

//document.getElementById('geolocalizacion').readOnly = true;

//document.getElementById('address').readOnly = true;

// Initialize the previous window

var previousWindow = false;

function geocodeAddress(geocoder, resultsMap, address)
{
    geocoder.geocode({'address': address}, function (results, status)
    {
        if (status === google.maps.GeocoderStatus.OK)
        {
            // Center the map on the new pin

            resultsMap.setCenter(results[0].geometry.location);

            // Put the marker

            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location,
                //icon: '/marketvisit/backend/web/favicon.ico'
            });

            // Content of the window

            var contentString =
                '<div id="content">' +
                '<h4>' + results[0].formatted_address + '</h4>' +
                '<span>' + results[0].geometry.location + '</span>' +
                '<br><br>' +
                '<button type="button" id="copyLocBut" onclick="bindLocationData()" class="m10left btn btn-primary">' +
                '<span class="glyphicon glyphicon-copy"></span></button>' +
                '<input type="hidden" id="lat" value="' + results[0].geometry.location.lat() + '">' +
                '<input type="hidden" id="lng" value="' + results[0].geometry.location.lng() + '">' +
                    '<br><br>' +
                '<input type="hidden" id="googleAddress" value="' + results[0].formatted_address + '">' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            // Open the window when click on the pin

            marker.addListener('click', function ()
            {
                previousWindow.close();
                previousWindow = infowindow;
                infowindow.open(map, marker);
            });

            // Close the previous window

            if (previousWindow)
            {
                previousWindow.close();
            }

            previousWindow = infowindow;

            infowindow.open(map, marker);

            if (results[0].geometry.viewport)
            {
                map.fitBounds(results[0].geometry.viewport);
            }
        }
        else
        {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
function bindLocationData() {
    document.getElementById('geolocalizacion').setAttribute('value', document.getElementById('lat').value+','+document.getElementById('lng').value);
    document.getElementById('address').setAttribute('value', document.getElementById('googleAddress').value);
    
}
/**
 * Created by Enric Borrallo on 04/01/17.
 */
map.addListener('click', function (e) {
    placeMarker(e.latLng);
});
var marker;
function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
    var geocoder = new google.maps.Geocoder;
    var loc = location.toString().substring(1, location.toString().length - 1);
    // alert(loc);
    geocodeLatLng(geocoder, map, loc);
}
function geocodeLatLng(geocoder, map, infowindow) {
    var input = infowindow;
    var latlngStr = input.split(',', 2);
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function (results, status) {
        if (status === 'OK') {
            if (results[1]) {
                //alert(results[1].formatted_address);
                //document.getElementById('latitude').setAttribute('value', latlngStr[0]);
                //document.getElementById('longitude').setAttribute('value', latlngStr[1]);
                document.getElementById('geolocalizacion').setAttribute('value',input);
                    document.getElementById('address').setAttribute('value', results[1].formatted_address);
            } else {
                window.alert('No results found');
            }
        } else {
            window.alert('Geocoder failed due to: ' + status);
        }
    });
}
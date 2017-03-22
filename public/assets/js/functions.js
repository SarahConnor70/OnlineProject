var map;
var panel;
var initialize;
var calculate;
var direction;
var labels      = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var icon        = {
    url: "http://www.onlineformapro.com/templates/corporate_response/favicon.ico",
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor

};


initialize = function(){
  var latLng = new google.maps.LatLng(47.63771, 6.15067 ); // Correspond au coordonnées de OnlineFormaPro
  var myOptions = {
    zoom      : 14, // Zoom par défaut
    center    : latLng, // Coordonnées de départ de la carte de type latLng 
    mapTypeId : google.maps.MapTypeId.ROADMAP, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
    maxZoom   : 20
  };
  
  map      = new google.maps.Map(document.getElementById('map'), myOptions);
  panel    = document.getElementById('panel');
  
  var marker = new google.maps.Marker({
    position : latLng,
    map      : map,
    title    : "Vesoul OnlineFormaPro",
    icon     : icon
  });

  var infoWindow = new google.maps.InfoWindow({
    content  : "OnlineFormaPro Vesoul",
    position : latLng
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.open(map,marker);
  });
  
  google.maps.event.addListener(infoWindow, 'domready', function(){ // infoWindow est biensûr notre info-bulle
    jQuery("#tabs").tabs();
  });
  
  direction = new google.maps.DirectionsRenderer({
    map   : map,
    panel : panel // Dom element pour afficher les instructions d'itinéraire
  });

};

calculate = function(ville){
    var tab    = [];
    var origin = "Vesoul OnlineFormaPro" // Le point départ
    var map    = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(47.63771, 6.15067 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var labelIndex = 0;
    for (var i = 0; i < ville.length; i++) {
        tab.push({
              location: ville[i]["name"] + ", FR",
              stopover: true
        });

        marker = new google.maps.Marker({
          position: new google.maps.LatLng(ville[i]["lat"], ville[i]["long"]),
          map: map,
          icon: ville[i]["name"] == "OnlineFormaPro Vesoul" ? icon : "",
          label: labels[labelIndex++ % labels.length]
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(ville[i]["name"]);
            infowindow.open(map, marker);
          }
        })(marker, i));
    }
    var rendererOptions = {
        preserveViewport: true,         
        suppressMarkers:true
    };
    var directionsService = new google.maps.DirectionsService();
    var request = {
        origin: origin,
        destination: origin,
        waypoints: tab,
        optimizeWaypoints: true,
        travelMode: 'DRIVING'
    };

    var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
    directionsDisplay.setMap(map);
    document.getElementById('panel').innerHTML = "";
    directionsDisplay.setPanel(document.getElementById('panel'));

    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(result);
        }
    });
};

initialize();
createMarqueur( tMarker, map);

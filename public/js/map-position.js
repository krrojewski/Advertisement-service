function showMapPosition(latitude, longitude) {
    lat = latitude; //szerokosc
    lon = longitude; //dlugosc
    latlon = new google.maps.LatLng(lat, lon)
    mapholder = document.getElementById('mapholder')
    mapholder.style.height = '250px';
    mapholder.style.width = '250px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
  
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"Produkt znajduje się tutaj!"});
}

/* Określanie punktów na mapie */
function distance(latitude, longitude, adLatitude, adLongitude){
    
var destinationA = new google.maps.LatLng(latitude, longitude);
var destinationB = new google.maps.LatLng(adLatitude, adLongitude);

var service = new google.maps.DistanceMatrixService();
service.getDistanceMatrix(
  {
    origins: [destinationA],
    destinations: [destinationB],
    travelMode: 'DRIVING', //połaczenie drogami ulicznymi
    unitSystem: google.maps.UnitSystem.METRIC, //system metryczny
    avoidHighways: true, //unika autostrad
    avoidTolls: true, //unika platnych przejazdow
  }, callback);
  }
  
function callback(response, status) { //przetwarza odpowiedź
        //alert(status);
    if (status == 'OK') {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;

    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      for (var j = 0; j < results.length; j++) {
        var element = results[j];
        var distance = element.distance.text; //dystans miedzy punktami
        var duration = element.duration.text; //czas trwania podrozy
        var from = origins[i];
        var to = destinations[j];
        document.getElementById("distance").innerHTML = distance;
        document.getElementById("duration").innerHTML = duration; 
      }
    }
  }
}

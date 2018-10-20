<?php
$servername = "localhost";
$username = "id5480653_humzasqldatabase";
$password = "humzarocks";
$dbname = "id5480653_sqlmaps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "DROP TABLE `latlng` DROP `lat`, DROP `lng`";
error_reporting(0);
$lati = $_POST["lat"];
$lngi= $_POST["long"];

$sql = "INSERT INTO casalatlng (lat, lng)
VALUES ('$lati', '$lngi')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} 
// else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="casamarker.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="download-button-master/css/normalize.css">
    <link rel="stylesheet" href="download-button-master/css/demo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Ignite: Tag Your Spots</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height:60%;
        }
        /* Optional: Makes the sample page fill the window. */
        html,
       
        body {
            height: 100%;
            margin: 4px 4px 4px 4px;
            padding: 0;
            background-image: url(http://www.titanblockchain.com/images/bg.jpg), radial-gradient(ellipse farthest-corner, #555, #999);
            /* background-image: url("bumpty.jpg");
            height: 100%; 
            /* Center and scale the image nicely */
            /* background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */ 
        }
        #floating-panel {
            position: absolute fixed;
            top: 15px;
            left: 4.65%;
            z-index: 5;
            /* background-color: #999; */
            padding: 5px;
            border: 1px solid white;
            text-align: center;
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
        .btn-glass {
  flex-grow: 1;
  text-align: center;
  display: inline-block;
  color: rgba(255, 255, 255, 0.7);
  text-decoration: none;
  padding: 1em 2em;
  font-family: Lato;
  font-weight: 300;
  border: 1px dotted transparent;
  letter-spacing: 0.98pt;
  text-transform: uppercase;
  transition: background-position 2s cubic-bezier(0, 1, 0, 1), border-color 500ms, background-color 500ms;
  position: relative;
  background-attachment: fixed, scroll;
  background-size: 100vw 100vh, cover;
  background-position: center center, 0 0;
  background-image: repeating-linear-gradient(-45deg, rgba(255, 255, 255, 0) 8%, rgba(255, 255, 255, 0.075) 10%, rgba(255, 255, 255, 0.075) 14%, rgba(255, 255, 255, 0.15) 14%, rgba(255, 255, 255, 0.15) 15%, rgba(255, 255, 255, 0.075) 17%, rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0.075) 40%, rgba(255, 255, 255, 0.15) 42%, rgba(255, 255, 255, 0) 43%, rgba(255, 255, 255, 0) 55%, rgba(255, 255, 255, 0.075) 60%, rgba(255, 255, 255, 0.075) 66%, rgba(255, 255, 255, 0.15) 66%, rgba(255, 255, 255, 0.075) 70%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%), radial-gradient(ellipse farthest-corner, transparent, rgba(0, 0, 0, 0.2) 110%);
}
.btn-glass:hover {
  background-position: -100vw 0, 0 0;
}
.btn-glass:active {
  background-position: -75vw 0, 0 0;
  border-style: solid;
}
.nav-light {
  background-color: white;
}
.nav-light .btn-glass {
  color: #585858;
  background-color: rgba(17, 17, 17, 0);
}
.nav-light .btn-glass:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #000000;
  background-color: #111111;
}
.nav-light .btn-glass:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(17, 17, 17, 0.5);
}
.nav-light .btn-glass.btn-primary {
  color: #6ab1d1;
  background-color: rgba(42, 143, 189, 0);
}
.nav-light .btn-glass.btn-primary:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #1c607e;
  background-color: #2A8FBD;
}
.nav-light .btn-glass.btn-primary:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(42, 143, 189, 0.5);
}
.nav-light .btn-glass.btn-success {
  color: #a5c75f;
  background-color: rgba(127, 175, 27, 0);
}
.nav-light .btn-glass.btn-success:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #4f6d11;
  background-color: #7FAF1B;
}
.nav-light .btn-glass.btn-success:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(127, 175, 27, 0.5);
}
.nav-light .btn-glass.btn-warning {
  color: #fccd69;
  background-color: rgba(251, 184, 41, 0);
}
.nav-light .btn-glass.btn-warning:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #d49104;
  background-color: #FBB829;
}
.nav-light .btn-glass.btn-warning:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(251, 184, 41, 0.5);
}
.nav-light .btn-glass.btn-danger {
  color: #f56558;
  background-color: rgba(240, 35, 17, 0);
}
.nav-light .btn-glass.btn-danger:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #aa180b;
  background-color: #F02311;
}
.nav-light .btn-glass.btn-danger:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(240, 35, 17, 0.5);
}
.nav-light .btn-glass.btn-info {
  color: #98e9f0;
  background-color: rgba(108, 223, 234, 0);
}
.nav-light .btn-glass.btn-info:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #29d0e0;
  background-color: #6CDFEA;
}
.nav-light .btn-glass.btn-info:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(108, 223, 234, 0.5);
}
.nav-dark {
  background-color: #444;
}
.nav-dark .btn-glass {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(17, 17, 17, 0);
}
.nav-dark .btn-glass:hover {
  border-color: #000000;
  background-color: #111111;
}
.nav-dark .btn-glass:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(17, 17, 17, 0.5);
}
.nav-dark .btn-glass.btn-primary {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(42, 143, 189, 0);
}
.nav-dark .btn-glass.btn-primary:hover {
  border-color: #1c607e;
  background-color: #2A8FBD;
}
.nav-dark .btn-glass.btn-primary:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(42, 143, 189, 0.5);
}
.nav-dark .btn-glass.btn-success {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(127, 175, 27, 0);
}
.nav-dark .btn-glass.btn-success:hover {
  border-color: #4f6d11;
  background-color: #7FAF1B;
}
.nav-dark .btn-glass.btn-success:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(127, 175, 27, 0.5);
}
.nav-dark .btn-glass.btn-warning {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(251, 184, 41, 0);
}
.nav-dark .btn-glass.btn-warning:hover {
  border-color: #d49104;
  background-color: #FBB829;
}
.nav-dark .btn-glass.btn-warning:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(251, 184, 41, 0.5);
}
.nav-dark .btn-glass.btn-danger {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(240, 35, 17, 0);
}
.nav-dark .btn-glass.btn-danger:hover {
  border-color: #aa180b;
  background-color: #F02311;
}
.nav-dark .btn-glass.btn-danger:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(240, 35, 17, 0.5);
}
.nav-dark .btn-glass.btn-info {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(108, 223, 234, 0);
}
.nav-dark .btn-glass.btn-info:hover {
  border-color: #29d0e0;
  background-color: #6CDFEA;
}
.nav-dark .btn-glass.btn-info:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(108, 223, 234, 0.5);
}
nav.btn-bar {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
}
:root {
  font-family: 'Open Sans', sans;
  font-size: 11pt;
  line-height: 1.6;
  min-height: 100vh;
  /* background-attachment: fixed, scroll; */
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/49914/grit-fs8.png), radial-gradient(ellipse farthest-corner, #555, #999);
}
/* body {
  width: 75vw;
  margin: 4em auto;
  line-height: inherit;
} */
article {
  padding: 0;
  border: 2px solid transparent;
  border-radius: 2px;
  box-sizing: border-box;
  background-color: white;
  box-shadow: 0 1ex 1em rgba(0, 0, 0, 0.3);
}
code {
  font-family: monospace;
  display: inline-block;
  padding: 0.5ex 1ch 0.25ex 1ch;
  background-color: #ccc;
  border-radius: 1ex;
  margin: 0 0.5ch;
}
article + article {
  margin-top: 4em;
}
article section {
  margin: 2em;
}
article > section > h2 {
  font-family: 'Lato';
  font-weight: 800;
  font-size: 1.3em;
  margin-bottom: 0.8em;
}
article > section > p {
  margin-bottom: 1em;
  text-indent: 2ch;
}
article > section > p:first-child,
article > section > h2 + p {
  text-indent: 0;
}
        h1 {
            text-align: center;
            margin-bottom: 2;
            padding-bottom: 2;
        }
    </style>
</head>
<h1>
    Tag Your Spots
</h1>

<body>
    <!-- <div id="floating-panel" class= "btn-bar nav-dark"style="margin-top: 0px">
        <input onclick="clearMarkers();" type=button class="btn btn-glass btn-primary" value="Hide Markers">
        <input onclick="showMarkers();" type=button class="btn btn-glass btn-success" value="Show All Markers">
        <input onclick="deleteMarkers();" type=button class="btn btn-glass btn-danger" value="Delete Markers">
    </div> -->
    <input id="pac-input" class="controls" type="text" placeholder="Search A Location">
    <div id="map"></div>
    <script>
        var lati;
        var lngi;
        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = { lat: 43.6532, lng: -79.3832 };
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: haightAshbury,
                mapTypeId: 'terrain'
            });
            map.addListener('click', function (event) {
                addMarker(event.latLng);
            });
            
            var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
            });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          
          places.forEach(function(place) {
              if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
              }
              if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
          });

          map.fitBounds(bounds);
        });
        }
        var iconBase = 'https://sites.google.com/site/imagesurlsite/home/';
        var icons = {
            defaultTag: {
                icon: iconBase + 'casa%20marker.png'
            },
        }
        
        function addMarker(location) {
          
            var marker = new google.maps.Marker({
                position: location,
                draggable: true,
                animation: google.maps.Animation.DROP,
                icon: 'https://sites.google.com/site/imagesurlsite/home/casamarker%20(2).png',
                map: map
            });
            markers.push(marker);
            var lati = marker.getPosition().lat();
            var lngi = marker.getPosition().lng();
            console.log(lati, lngi);
            //AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "map.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("lat=" + lati + "&long=" + lngi );
            
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function showMarkers() {
            setMapOnAll(map);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
            console.clear();
        }
        function submitfunction(){
            
            window.location.href="banner.html";
        }
    </script>

    <div class="download-button-container">

        <button onclick="setTimeout(submitfunction, 5500)" class="download-button" style="margin: 0px 0px 100px 0px; position:relative">
            <span class="button-text-real hidden">Submit Your Tags</span>
            <span class="button-icon">
                <span class="button-linear-progress">
                    <span class="button-linear-progress-bar"></span>
                </span>
                <svg class="button-icon-svg" viewBox="0 0 60 60">
                    <path class="button-icon-path button-icon-path-square" d="M 20 40 l 0 -20 l 20 0 l 0 20 Z" style="stroke-dashoffset: 160; stroke-dasharray: 80, 104, 32;"></path>
                    <path class="button-icon-path button-icon-path-line" d="M 40 20 l -20 20" style="stroke-dashoffset: 56.5685; stroke-dasharray: 28.2843, 28.2843, 28.2843;"></path>
                </svg>
            </span>
        </button>

        <svg class="border-svg" width="240px" height="100px" viewBox="0 0 240 100">
            <path class="border-path hidden" d="M 40 3.5 a 36.5 36.5 0 0 0 -36.5 36.5 a 36.5 36.5 0 0 0 36.5 36.5 C 70 76.5 90 76.5 120 76.5 S 170 76.5 200 76.5 a 36.5 36.5 0 0 0 36.5 -36.5 a 36.5 36.5 0 0 0 -36.5 -36.5 Z"></path>
        </svg>
        <span class="button-text button-text-download">Submit Your Tags</span>
        <span class="button-text button-text-done">Done!</span>
        <div class="button-wave"></div>
        <div class="button-progress-container">
            <svg class="button-svg">
                <path class="button-circular-progress" d="M 50 50 m 0 -32.5 a 32.5 32.5 0 0 1 0 65 a 32.5 32.5 0 0 1 0 -65" style="stroke-dashoffset: 408.375; stroke-dasharray: 204.187, 204.187, 0;"></path>
            </svg>
            <span class="button-ball"></span>
        </div>
    </div>
    <a href="index.html">Go back</a>
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoE_s6twEzo_weIsuubSG9fiUfiAfoXpc&libraries=places&callback=initMap"
    async defer></script>
    <script src="download-button-master/js/anime.min.js"></script>
    <script src="download-button-master/js/segment.min.js"></script>
    <script src="download-button-master/js/demo.js"></script>
</body>

</html>
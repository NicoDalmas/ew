@extends('layout')

<!-- Leaflet css -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>


<!--Leaflet JS -->
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
crossorigin=""></script>


@section('title')

@section('content')
    
<h1>Mapa</h1>


<div id="mapid"></div>

<style>
    #mapid { 
	    width: 1200px;
	    height: 550px;
	    box-shadow: 5px 5px 5px #888;
  		}
</style>

<script>
    var map = L.map('mapid').setView([-32.9576,-60.6655], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    	minZoom: 12,
    	maxZoom: 16,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

</script>


<!-- 	GOOGLE MAP
		<div class="mapouter">
			<div class="gmap_canvas">
				<iframe width="1200" height="580" id="gmap_canvas" src="https://maps.google.com/maps?q=rosario&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by 
				<a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
			</div>

			<style>.mapouter{position:relative;text-align:right;height:580px;width:1200px;}.gmap_canvas {overflow:hidden;background:none!important;height:580px;width:1200px;}
			</style>
		</div>
 -->  


@endsection
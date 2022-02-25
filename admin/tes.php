<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<style type="text/css">
	html, body { width:100%;padding:0;margin:0; }
	.container { width:95%;max-width:980px;padding:1% 2%;margin:0 auto }
	#lat, #lon { text-align:right }
	#map { width:100%;height:50%;padding:0;margin:0; }
	.address { cursor:pointer }
	.address:hover { color:#AA0000;text-decoration:underline }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.1/dist/esri-leaflet.js"
integrity="sha512-JmpptMCcCg+Rd6x0Dbg6w+mmyzs1M7chHCd9W8HPovnImG2nLAQWn3yltwxXRM7WjKKFFHOAKjjF2SC4CgiFBg=="
crossorigin=""></script>

<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.css"
integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.js"
integrity="sha512-vZbMwAf1/rpBExyV27ey3zAEwxelsO4Nf+mfT7s6VTJPUbYmD2KSuTRXTxOFhIYqhajaBU+X5PuFK1QJ1U9Myg=="
crossorigin=""></script>

<div class="container">
	<input type="hidden" name="lon" id="lon" size=12 value="" class="form-control" id="inputCity">


	<input type="hidden" name="lat" id="lat" size=12 value=""
	class="form-control" id="inputCity">
	<div class="col-md-4">
		<div id="search">
			<label>Cari Alamat</label>
			<input placeholder="Cari Alamat" type="text" name="addr" class="form-control" value="" id="addr" size="58" />
			<button style="margin-top: 10px; margin-bottom: 10px" class="btn btn-light" type="button" onclick="addr_search();">Search</button>
			<div id="results"></div>
		</div>
	</div>
	<div id="map"></div>
	<style type="text/css">
		html, body { width:100%;padding:0;margin:0; }
		.container { width:100%;max-width:980px;padding:1% 2%;margin:0 auto }
		#lat, #lon { text-align:right }
		#map { width:100%;height:225px;padding:0;margin:0; }
		.address { cursor:pointer }
		.address:hover { color:#AA0000;text-decoration:underline }
	</style>
</div>
<script type="text/javascript">


// New York
var startlat = -7.80119450	;
var startlon = 110.36491700;

var options = {
	center: [startlat, startlon],
	zoom: 9
}

document.getElementById('lat').value = startlat;
document.getElementById('lon').value = startlon;

var map = L.map('map', options);
var nzoom = 200	;

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
	var lat = myMarker.getLatLng().lat.toFixed(8);
	var lon = myMarker.getLatLng().lng.toFixed(8);
	var czoom = map.getZoom();
	if(czoom < 18) { nzoom = czoom + 2; }
	if(nzoom > 18) { nzoom = 18; }
	if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
	document.getElementById('lat').value = lat;
	document.getElementById('lon').value = lon;
	myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
});

function chooseAddr(lat1, lng1)
{
	myMarker.closePopup();
	map.setView([lat1, lng1],18);
	myMarker.setLatLng([lat1, lng1]);
	lat = lat1.toFixed(8);
	lon = lng1.toFixed(8);
	document.getElementById('lat').value = lat;
	document.getElementById('lon').value = lon;
	myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
}

function myFunction(arr)
{
	var out = "<br />";
	var i;

	if(arr.length > 0)
	{
		for(i = 0; i < arr.length; i++)
		{
			out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
		}
		document.getElementById('results').innerHTML = out;
	}
	else
	{
		document.getElementById('results').innerHTML = "Sorry, no results...";
	}

}

function addr_search()
{
	var inp = document.getElementById("addr");
	var xmlhttp = new XMLHttpRequest();
	var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
	xmlhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			var myArr = JSON.parse(this.responseText);
			myFunction(myArr);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}


</script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
	tinymce.init({
		selector: '#mytextarea'
	});
</script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
   <style type="text/css">
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
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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
  <link href="lib/select2/css/select2.min.css" rel="stylesheet">
  <div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="index.php">Peduli Diri</a>
      <span class="breadcrumb-item active">Edit data</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Edit data</h4>
  </div>

  <div class="br-pagebody">
    <div class="br-section-wrapper">


      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <?php
            date_default_timezone_set("Asia/Jakarta");
            $jam = date ("H:i");
            $tgl=date('d-m-Y');
            $id=$_GET['id'];
            $nik=$_SESSION['nik'];
            include 'koneksi.php';
            $ambil=$koneksi->query("SELECT * FROM catatan WHERE id_catatan='$id'");
            $pecah=$ambil->fetch_assoc()?>

            <label for="inputEmail4">Tanggal</label>
            <input name="tgl" readonly="" type="text" value="<?php echo $tgl?>" class="form-control" id="inputEmail4" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Jam</label>
            <input name="jam"  readonly="" type="text" class="form-control" id="inputPassword4" value="<?php echo $jam?>" >

          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Lokasi Yang Dituju</label>
          <input name="lokasi" type="text" value="<?php echo $pecah['lokasi']?> " class="form-control" id="inputAddress" placeholder="Toko Bunga Freesia">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Suhu Tubuh</label>
          <input name="suhu" type="text" value="<?php echo $pecah['suhu']?> " class="form-control number" id="inputAddress2" placeholder="36">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cari Alamat</label>
            <input placeholder="Cari Alamat" type="text" name="addr" class="form-control" value="" id="addr"  type="text" class="form-control" id="inputCity">
            <button style="margin-top: 10px; margin-bottom: 5px" class="btn btn-primary" type="button" onclick="addr_search();">Search</button>

          </div>
          
          <div class="form-group col-md-6">
            <label for="inputZip">Alamat</label>
            <div style="margin-top: -22px" id="results"></div>
          </div>
        </div>
        
        <div class="col-md-12">
          <input type="hidden" value="<?php echo $pecah['lon'] ?> " name="lon" id="lon" size=12 value="" class="form-control" id="inputCity">


          <input type="hidden" value="<?php echo $pecah['lat'] ?> " name="lat" id="lat" size=12 value=""
          class="form-control" id="inputCity">
          <div id="map"></div>
          <style type="text/css">
            #lat, #lon { text-align:right }
            #map { width:100%;height:225px;}
            .address { cursor:pointer }
            .address
          </style>
        </div>
        <button style="margin-top: 50px" name="tambah" class="btn btn-primary">Edit</button>
      </form>
      <?php
      include 'koneksi.php';
      if (isset($_POST['tambah'])) 
      {
        $tgl=$_POST['tgl'];
        $jam=$_POST['jam'];
        $suhu=$_POST['suhu'];
        $lon=$_POST['lon'];
        $lat=$_POST['lat'];
        $lokasi=$_POST['lokasi'];

        $query = "UPDATE catatan SET lokasi='$lokasi',suhu='$suhu',lat='$lat',lon='$lon' WHERE id_catatan= '$id'";
        $result = mysqli_query($koneksi,$query);

        echo "<script>alert('berhasil Mengedit Catatan')</script>";
        echo "<script>location='index.php?halaman=catatan'</script>";

      }
      ?>
    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
  
  <script type="text/javascript">
    window.onload = function() { jam(); }

    function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h +':'+ m +':'+ s;

      setTimeout('jam()', 1000);
    }

    function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
    }
  </script>
  <script>

    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

              // Select2
              $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            });
          </script>
          <script type="text/javascript">
            <?php 
            $lo=$pecah['lat'];
            $la=$pecah['lon'];
            ?>


// New York
var startlat = <?php echo $lo?> ;
var startlon = <?php echo $la?> ;

var options = {
  center: [startlat, startlon],
  zoom: 9
}

document.getElementById('lat').value = startlat;
document.getElementById('lon').value = startlon;

var map = L.map('map', options);
var nzoom = 200 ;

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
 <script>
        $('input.number').keyup(function(event) {
            // skip for arrow keys

            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{2})+(?!\d))/g, ".")
            ;
            });
        });
    </script>
<?php
session_start();
include 'koneksi.php';
$nik=$_SESSION['nik'];
$ambil=$koneksi->query("SELECT * FROM data WHERE nik='$nik'");
$benar=$ambil->fetch_assoc();
if ($benar > 0) 
{

    echo "<script>location='index.php'</script>";

}
else
{

}
?>
<!doctype html>
<html lang="en">

<head>
    <style type="text/css">
        <style>

        .image_area {
          position: relative;
      }

      img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg{
        max-width: 1000px !important;
    }

    .overlay {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.5);
      overflow: hidden;
      height: 0;
      transition: .5s ease;
      width: 100%;
  }

  .image_area:hover .overlay {
      height: 50%;
      cursor: pointer;
  }

  .text {
      color: #333;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
  }
  
</style>
</style>
<meta charset="utf-8" />
<title>Dashboard | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesdesign" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- datepicker -->
<link href="assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

<!-- jvectormap -->
<link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

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

</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto');




    button:focus,

    /*----------step-wizard------------*/






    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
        position: relative;
        margin-bottom: 50px;
        text-align: center;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: relative;
        width: 75%;
        left: 15%;
        right: 0;
        top: 15px;
        z-index: 1;
    }
    .connecting-line::after{
     content: '';
     position: absolute;
     background-color: #0e97cb;
     height: 100%;
     width: 0%;
     z-index: 0;
     left: 0%;
     bottom: 0%;
 }






 span.round-tab {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    border-radius: 50%;
    background: #2389d1;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 16px;
    color: #f3f4f7;
    font-weight: 500;
    border: 1px solid #ddd;
}

.wizard li.active span.round-tab {
    background: #ffffff;
    color: #156faf;
    border-color: #0d6587;
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
.wizard .nav-tabs > li.active > a i{
    color: #000000;
}

.wizard .nav-tabs > li {
    width: 25%;
    position: relative;
}

.wizard .nav-tabs > li::after {
    content: " ";
    position: absolute;
    left: -42%;
    opacity: 1;
    margin: 0 auto;
    bottom: -15px;
    width: 0;
    height: 2px;
    background-color: #0e97cb;
    transition: 0.3s ease-in-out;
    z-index: 1;
}
.wizard .nav-tabs > li:first-child:after{
    display: none;
}
.wizard .nav-tabs > li.active::after {
    width: 100%;
}

.wizard .nav-tabs > li a {
    width: 30px;
    height: 30px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
    background-color: transparent;
    position: relative;
    top: 0;
}
.wizard .nav-tabs > li a i{
    position: absolute;
    top: -15px;
    font-style: normal;
    font-weight: 400;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    font-weight: 700;
    color: #000;
}

.wizard .nav-tabs > li a:hover {
    background: transparent;
}

.wizard .tab-pane {
    position: relative;
    padding-top: 20px;
}


.wizard h3 {
    margin-top: 0;
}
.prev-step,
.next-step{
    font-size: 13px;
    padding: 8px 25px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
}
.prev-step:disabled{
    background-color: #fdfdfd;
    color: rgb(7, 7, 7);
    border: 1px solid #0e97cb;
    
}
.btn-submit{
    font-size: 13px;
    padding: 8px 25px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
    background-color: #0e97cb;
    color: white;
}
.shadow {
    box-shadow: 0 0.3rem 0.5rem rgba(0,0,0,0.25)!important;
}
.next-step {
    background-color: #0e97cb;
    color: white;
}
.next-step:hover,.btn-submit:hover,.prev-step:hover{
    background-color: #fdfdfd;
    color: rgb(7, 7, 7);
    border: 1px solid #0e97cb;
}
.prev-step {
    background-color: #0e97cb;
    color: rgb(250, 250, 250);
    
}

.skip-btn{
    background-color: #cec12d;
}
.step-head{
    font-size: 20px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
.term-check{
    font-size: 14px;
    font-weight: 400;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 40px;
    margin-bottom: 0;
}



</style>

<body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">
                    <div class="float-right">

                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-tune"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">Smith</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Billing</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>

                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-dark.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-light.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">
                                            Dashboard
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Elements <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-mega-menu-xl px-2" aria-labelledby="topnav-uielement">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="dropdown-item-text font-weight-semibold font-size-16">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-box"></i></div> UI Elements</div>

                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                                                <a href="ui-badge.html" class="dropdown-item">Badge</a>
                                                                <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                                <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                                <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                                                <a href="ui-navs.html" class="dropdown-item">Navs</a>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div>
                                                                    <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs &amp; Accordions</a>
                                                                    <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                                    <a href="ui-images.html" class="dropdown-item">Images</a>
                                                                    <a href="ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                                                    <a href="ui-pagination.html" class="dropdown-item">Pagination</a>
                                                                    <a href="ui-popover-tooltips.html" class="dropdown-item">Popover & Tooltips</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="dropdown-item-text font-weight-semibold font-size-16">
                                                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-layer-group"></i></div> Advanced UI</div>

                                                            <div>
                                                                <a href="advanced-alertify.html" class="dropdown-item">Alertify</a>
                                                                <a href="advanced-rating.html" class="dropdown-item">Rating</a>
                                                                <a href="advanced-nestable.html" class="dropdown-item">Nestable</a>
                                                                <a href="advanced-rangeslider.html" class="dropdown-item">Range Slider</a>
                                                                <a href="advanced-sweet-alert.html" class="dropdown-item">Sweet-Alert</a>
                                                                <a href="advanced-lightbox.html" class="dropdown-item">Lightbox</a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Components <div class="arrow-down"></div>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                                    <div class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <div class="d-inline-block icons-sm mr-2"><i class="uim uim-comment-message"></i></div> Email
                                                            <div class="arrow-down"></div>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                            <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                                            <a href="email-read.html" class="dropdown-item">Email Read</a>
                                                            <a href="email-compose.html" class="dropdown-item">Email Compose</a>
                                                        </div>
                                                    </div>
                                                    <a href="calendar.html" class="dropdown-item">
                                                        <div class="d-inline-block icons-sm mr-2"><i class="uim uim-schedule"></i></div> Calendar</a>
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-object-ungroup"></i></div>Icons
                                                                <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-icon">
                                                                <a href="icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                                                <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                                                <a href="icons-fontawesome.html" class="dropdown-item">Font awesome 5</a>
                                                                <a href="icons-themify.html" class="dropdown-item">Themify</a>
                                                                <a href="icons-unicons.html" class="dropdown-item">Unicons - Dual Tone</a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-table"></i></div>Tables
                                                                <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                                <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                                                <a href="tables-datatable.html" class="dropdown-item">Data Tables</a>
                                                                <a href="tables-responsive.html" class="dropdown-item">Responsive Table</a>
                                                                <a href="tables-editable.html" class="dropdown-item">Editable Table</a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-document-layout-left"></i></div>Forms
                                                                <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                                <a href="form-elements.html" class="dropdown-item">Form Elements</a>
                                                                <a href="form-validation.html" class="dropdown-item">Form Validation</a>
                                                                <a href="form-advanced.html" class="dropdown-item">Form Advanced</a>
                                                                <a href="form-editors.html" class="dropdown-item">Form Editors</a>
                                                                <a href="form-uploads.html" class="dropdown-item">Form File Upload</a>
                                                                <a href="form-mask.html" class="dropdown-item">Form Mask</a>
                                                                <a href="form-summernote.html" class="dropdown-item">Summernote</a>
                                                            </div>
                                                        </div>

                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-chart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-chart-pie"></i></div>Charts
                                                                <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-chart">
                                                                <a href="charts-morris.html" class="dropdown-item">Morris</a>
                                                                <a href="charts-apex.html" class="dropdown-item">Apex</a>
                                                                <a href="charts-chartist.html" class="dropdown-item">Chartist</a>
                                                                <a href="charts-chartjs.html" class="dropdown-item">Chartjs</a>
                                                                <a href="charts-flot.html" class="dropdown-item">Flot</a>
                                                                <a href="charts-sparkline.html" class="dropdown-item">Sparkline</a>
                                                                <a href="charts-knob.html" class="dropdown-item">Jquery Knob</a>
                                                            </div>
                                                        </div>

                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-maps" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-comment-plus"></i></div>Maps
                                                                <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-maps">
                                                                <a href="maps-google.html" class="dropdown-item">Google map</a>
                                                                <a href="maps-vector.html" class="dropdown-item">Vector map</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Extra pages <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-more">
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Authentication <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                                <a href="auth-login.html" class="dropdown-item">Login</a>
                                                                <a href="auth-register.html" class="dropdown-item">Register</a>
                                                                <a href="auth-recoverpw.html" class="dropdown-item">Recover Password</a>
                                                                <a href="auth-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Utility <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                                                <a href="pages-starter.html" class="dropdown-item">Starter Page</a>
                                                                <a href="pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                                                <a href="pages-comingsoon.html" class="dropdown-item">Coming Soon</a>
                                                                <a href="pages-timeline.html" class="dropdown-item">Timeline</a>
                                                                <a href="pages-gallery.html" class="dropdown-item">Gallery</a>
                                                                <a href="pages-faqs.html" class="dropdown-item">FAQs</a>
                                                                <a href="pages-pricing.html" class="dropdown-item">Pricing</a>
                                                                <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                                                <a href="pages-500.html" class="dropdown-item">Error 500</a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Layouts <div class="arrow-down"></div>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                                                <a href="layouts-vertical.html" class="dropdown-item">Vertical</a>
                                                                <a href="layouts-topbar-light.html" class="dropdown-item">Light Topbar</a>
                                                                <a href="layouts-topbar-dark.html" class="dropdown-item">Dark Topbar</a>
                                                                <a href="layouts-full-width.html" class="dropdown-item">Full width</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>


                    </header>

                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->
                    <div class="main-content">

                        <div class="page-content">

                            <!-- Page-Title -->
                            <div style="height: 30vh;" class="page-title-box">
                                <div class="container-fluid">
                                    <div class="row align-items-center">


                                        <div class="col-md-12">
                                            <div class=" d-none d-md-block">
                                                <div class="dropdown">
                                            <!-- <button style="width: 100%" class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-settings-outline mr-1"></i> Settings
                                            </button> -->
                                            <div style="height: 50px; border-radius: 50px" class="card">
                                                <h6 style="margin-top: 15px; margin-left: 30px" class="text-left">
                                                    <i style="margin-right: 10px; margin-top: -5px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16" style>
                                                          <path style='color: #ffb100' d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                      </svg>
                                                  </i>
                                              Silahkan lengkapi profil untuk dapat mengakses seluruh platform Peduli diri!</h6>
                                          </div>
                                          <div>
                                              <h1 style="color: white"><b>Peduli Diri</b></h1><br>
                                              
                                          </div>

                                          
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- end page title end breadcrumb -->

                  <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">

                                    <div style="padding: 50px" class="wizard">
                                        <div class="wizard-inner">
                                            <div class="connecting-line"></div>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li  role="presentation" class="active">
                                                    <a  href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                                    aria-expanded="true"><span  class="round-tab">1 </span> <i>Informasi Pribadi</i></a>
                                                </li>
                                                
                                                <li role="presentation" class="disabled">
                                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                                        class="round-tab">2</span> <i>Unggah Foto</i></a>
                                                    </li>
                                                    <li role="presentation" class="disabled">
                                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                                            class="round-tab">3</span> <i>Riwayat Penyakit</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span
                                                                class="round-tab">4</span> <i>Perjanjian Pengguna</i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="container">


                                                    <form enctype="multipart/form-data"  role="form" method="post" class="login-box">
                                                        <div class="tab-content" id="main_form">
                                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                                <h4 class="text-center" style="margin-bottom: 50px; margin-top: 50px">Informasi Pribadi</h4>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Lengkap (Sesuai KTP)</label>
                                                                            <input disabled="" required="" class="form-control" type="text" name="nama" value="<?php echo $_SESSION['nama']?>"  placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input disabled="" class="form-control" value="<?php echo $_SESSION['email']?>" type="text" name="email" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-top: 30px" class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>NIK</label>
                                                                            <input class="form-control" value="<?php echo $_SESSION['nik']?>" type="text" name="nik" placeholder="">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div style="margin-top: 30px" class="form-group">
                                                                            <label>Jenis Kelamin</label>
                                                                            <select name="kelamin" required="" name="country" class="form-control" id="country">
                                                                                <option>Silahkan Pilih Jenis Kelamin</option>
                                                                                <option value="laki-laki">Laki - Laki</option>
                                                                                <option value="perempuan">Perempuan</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div style="margin-top: 30px" class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nomor Handphone</label>
                                                                            <input  required="" class="form-control" type="text" name="hp" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div style="margin-top: 30px" class="form-group">
                                                                            <label>Agama</label>
                                                                            <select  required="" name="agama" class="form-control" id="country">
                                                                                <option>Silahkan Pilih Agama Anda</option>
                                                                                <option value="Islam">Islam</option>
                                                                                <option value="Kristen (Protestan)">Kristen (Protestan)</option>
                                                                                <option value="kristen (Katolik)">kristen (Katolik)</option>
                                                                                <option value="Hindu">Hindu</option>
                                                                                <option value="Budha">Budha</option>
                                                                                <option value="Konghucu">Konghucu</option>
                                                                                <option value="Lainnya">Lainnya</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-top: 30px" class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tempat Lahir</label>
                                                                            <input  required="" class="form-control" type="text" name="tempat_lahir" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div style="margin-top: 30px" class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tanggal Lahir :</label>
                                                                            <input name="tanggal_lahir"  required="" class="form-control" type="date" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="lon" id="lon" size=12 value="" class="form-control" id="inputCity">


                                                                        <input type="hidden" name="lat" id="lat" size=12 value=""
                                                                        class="form-control" id="inputCity">
                                                                        <div class="col-md-12">
                                                                            <div id="search">
                                                                                <label>Cari Alamat</label>
                                                                                <input placeholder="Cari Alamat" type="text" name="addr" class="form-control" value="" id="addr" size="58" />
                                                                                <button style="margin-top: 10px; margin-bottom: 10px" class="btn btn-light" type="button" onclick="addr_search();">Search</button>
                                                                                <div id="results"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card
                                                                        ">
                                                                        <div id="map"></div>
                                                                        
                                                                    </div>
                                                                    <style type="text/css">
                                                                        html, body { width:100%;padding:0;margin:0; }
                                                                        .container { width:100%;max-width:980px;padding:1% 2%;margin:0 auto }
                                                                        #lat, #lon { text-align:right }
                                                                        #map { width:100%;height:225px;padding:0;margin:0; }
                                                                        .address { cursor:pointer }
                                                                        .address:hover { color:#AA0000;text-decoration:underline }
                                                                    </style>

                                                                    
                                                                </div>


                                                            </div>
                                                            <ul style="margin-top: 80px" class=" text-right list-inline pull-left">
                                                                <li><button type="button" class="default-btn prev-step shadow  " disabled >Kembali</button> <button type="button" class="default-btn next-step">Lanjut</button></li>
                                                            </ul>
                                                        </div>
                                                        
                                                        <div class="tab-pane" role="tabpanel" id="step3">
                                                            <h4 class="text-center">Unggah Foto</h4>
                                                            <div class="row">
                                                                <div style="margin-top: 100px" class="row"><form method="post">
                                                                    <label for="upload_image">
                                                                        <img style="height: 300px" src="http://localhost/ukk/admin/Images/IMG_20220213_165531-removebg.png" id="uploaded_image" class="img-responsive img-circle" />
                                                                        <div class="overlay">
                                                                            <div class="text">Click to Change Profile Image</div>
                                                                        </div>
                                                                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                                                    </label>
                                                                </form>
                                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">??</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="img-container">
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <img src="" id="sample_image" />
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="preview"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul style="margin-top: 80px" class=" text-right list-inline pull-left">
                                                            <li><button type="button" class="default-btn prev-step shadow  " disabled >Kembali</button> <button type="button" class="default-btn next-step">Lanjut</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step4">

                                                        <h4 style="margin-bottom: 50px; margin-top: 50px" class="text-center">Riwayat Penyakit</h4>
                                                        <div class="row">

                                                            <h4 class="header-title">Tinymce wysihtml5</h4>
                                                            <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript
                                                                plugin that makes it easy to create simple, beautiful wysiwyg editors
                                                            with the help of wysihtml5 and Twitter Bootstrap.</p>

                                                            <form method="post">
                                                                <textarea name="riwayat" id="elm1" name="area"></textarea>
                                                            </form>

                                                        </div>


                                                        <ul style="margin-top: 80px" class=" text-right list-inline pull-left">
                                                            <li><button type="button" class="default-btn prev-step shadow  " disabled >Kembali</button> <button type="button" class="default-btn next-step">Lanjut</button></li>
                                                        </ul>

                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step5">
                                                        <h4 style="margin-bottom: 50px; margin-top: 50px" class="text-center">Perjanjian yesus</h4>
                                                        <div class="row">

                                                            <h4 class="header-title">Tinymce wysihtml5</h4>
                                                            <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript
                                                                plugin that makes it easy to create simple, beautiful wysiwyg editors
                                                            with the help of wysihtml5 and Twitter Bootstrap.</p>


                                                            <textarea style="width: 1000px; height: 200px" name="area">
                                                                I. PENTING! INI ADALAH PERJANJIAN HUKUM YANG MENGIKAT ("Perjanjian" ini). HARAP BACA SYARAT DAN KETENTUAN PENGGUNAAN INI DENGAN SAKSAMA SEBELUM MENGGUNAKAN SITUS INI.

                                                                Perjanjian ini mengatur penggunaan Anda atas situs Internet ini yang berada di hilton.com (secara bersama-sama disebut sebagai "Situs") dan dibuat oleh dan antara Hilton Worldwide Holdings Inc. (disebut di sini sebagai "HWI" atau "kami") dan Anda, atas nama diri Anda sendiri dan pembeli, anggota, atau pemasok yang telah Anda daftarkan ("Anda"). Dengan menggunakan, melihat, mentransmisikan, menyimpan cache, menyimpan dan/atau memanfaatkan Situs, layanan, atau fungsi yang ditawarkan di atau oleh Situs dan/atau konten Situs dengan cara apa pun, Anda telah menyetujui masing-masing dan semua syarat dan ketentuan yang tercantum di bawah ini, dan melepaskan hak untuk mengklaim ambiguitas atau kesalahan dalam Perjanjian ini. Apabila Anda tidak menyetujui masing-masing dan semua syarat dan ketentuan ini, harap tidak menggunakan Situs dan segera meninggalkan Situs. Kami berhak, atas kewenangan mutlak kami semata, untuk mengubah, memodifikasi, menambah, atau menghapus bagian-bagian dari syarat ini setiap saat tanpa pemberitahuan dan, kecuali dinyatakan lain, perubahan tersebut akan berlaku dengan segera; oleh karena itu, periksalah syarat ini secara berkala untuk melihat perubahan. Dengan terus menggunakan Situs setelah posting perubahan pada Perjanjian ini berarti Anda menerima perubahan tersebut.

                                                                II. PEMENUHAN SYARAT

                                                                Situs hanya tersedia untuk individu atau entitas yang dapat membentuk kontrak yang mengikat secara hukum berdasarkan hukum yang berlaku. Tanpa membatasi hal tersebut di atas, Situs dan layanan yang ditawarkan oleh Situs tidak tersedia bagi anak di bawah umur. Apabila Anda tidak memenuhi syarat, Anda tidak boleh menggunakan Situs. Anda menjamin bahwa Anda berusia delapan belas (18) tahun atau lebih untuk memesan kamar di Situs ini. Apabila Anda berusia di bawah delapan belas tahun, Anda dapat menghubungi hotel secara langsung untuk meminta bantuan.

                                                                Anda juga menjamin bahwa Anda secara hukum diizinkan untuk melakukan reservasi perjalanan dan/atau membeli baik untuk Anda ataupun untuk orang lain yang Anda wakili. Anda hanya dapat menggunakan Situs ini untuk melakukan reservasi atau pembelian yang sah dan tidak akan menggunakan Situs ini untuk tujuan lain apa pun, termasuk tanpa batasan, untuk melakukan reservasi yang spekulatif, palsu, atau menipu, ataupun reservasi untuk mengantisipasi permintaan.

                                                                Kami berhak untuk membatalkan atau memodifikasi reservasi yang terlihat bahwa pelanggan terlibat dalam tindakan penipuan atau tidak pantas ataupun dalam keadaan lain yang terlihat bahwa reservasi itu mengandung atau dihasilkan dari kesalahan atau dari upaya untuk menghindari kebijakan, syarat, atau ketentuan HWI atau hotel.

                                                                Anda memahami bahwa penggunaan berlebihan dan penyalahgunaan fasilitas reservasi Situs ini dapat mengakibatkan akses Anda ditolak ke fasilitas tersebut.

                                                                Reservasi yang dilakukan oleh satu atau lebih individu ataupun oleh agen di Situs, atas nama satu atau lebih tamu yang diajukan, dan melibatkan lebih dari sembilan (9) kamar di hotel yang sama untuk masa inap yang sama, harus dilakukan secara langsung melalui hotel. Apabila pemesanan lebih dari sembilan (9) kamar di hotel yang sama untuk masa inap yang sama dilakukan dengan metode lain, kami berhak untuk membatalkan atau memberlakukan persyaratan tambahan pada reservasi tersebut.

                                                                Beberapa harga memiliki persyaratan pemenuhan syarat khusus seperti keanggotaan Hilton Honors, AAA, atau AARP. Merupakan tanggung jawab Anda untuk memverifikasi bahwa Anda memenuhi syarat untuk harga yang telah Anda pesan. Hotel tidak berkewajiban untuk menyetujui harga jika Anda tidak memenuhi syarat.

                                                            </textarea>


                                                        </div>
                                                        <div style="margin-top: 30px; margin-left: -15px" class="custom-control custom-checkbox">
                                                            <input name="setuju" type="checkbox" class="custom-control-input" id="invalidCheck" required>
                                                            <label class="custom-control-label" for="invalidCheck">Saya Menyetujuinya</label>
                                                            <div class="invalid-feedback">
                                                                Kamu Harus Menyetujuinya sebeleum melanjutkan.
                                                            </div>
                                                        </div>


                                                        <ul style="margin-top: 80px" class=" text-right list-inline pull-left">
                                                            <li><button type="button" class="default-btn prev-step shadow  " disabled >Kembali</button> <button name="gaskan" class="btn btn-primary">Lanjut</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </form>
                                            <?php 
                                            include 'koneksi.php';
                                            if (isset($_POST['gaskan'])) 
                                            {


                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $nik =$_POST['nik'];
                                                $lo = $_POST['lon'];
                                                $la = $_POST['lat'];
                                                $kelamin = $_POST['kelamin'];
                                                $hp = $_POST['hp'];
                                                $agama = $_POST['agama'];
                                                $tempat_lahir = $_POST['tempat_lahir'];
                                                $tanggal_lahir = $_POST['tanggal_lahir'];
                                                $riwayat = $_POST['riwayat'];
                                                $setuju = $_POST['setuju'];






                                                $query = "INSERT INTO data VALUES ('','$nik','$kelamin','$hp','$agama','$tempat_lahir','$tanggal_lahir','$lo','$la','','$riwayat','$setuju')";
                                                $result = mysqli_query($koneksi,$query);

                                                echo "<script>alert('berhasil menambahkan data')</script>";
                                                echo "<script>location='index.php'</script>";
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <!-- end row -->


                        <!-- end row -->


                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom rightbar-nav-tab nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-3 active" data-toggle="tab" href="#chat-tab" role="tab">
                        <i class="mdi mdi-message-text font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#tasks-tab" role="tab">
                        <i class="mdi mdi-format-list-checkbox font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-settings font-size-22"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="chat-tab" role="tabpanel">

                    <form class="search-bar py-4 px-3">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>

                    <h6 class="px-4 py-3 mt-2 bg-light">Group Chats</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                            <span class="mb-0 mt-1">App Development</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                            <span class="mb-0 mt-1">Office Work</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                            <span class="mb-0 mt-1">Personal Group</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                            <span class="mb-0 mt-1">Freelance</span>
                        </a>
                    </div>

                    <h6 class="px-4 py-3 mt-4 bg-light">Favourites</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-10.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Andrew Mackie</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Rory Dalyell</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-9.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jaxon Dunhill</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h6 class="px-4 py-3 mt-4 bg-light">Other Chats</h6>

                    <div class="p-2 pb-4">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jackson Therry</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Charles Deakin</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Ryan Salting</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Sean Howse</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Dean Coward</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Hayley East</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    <h6 class="p-3 mb-0 mt-4 bg-light">Working Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <h6 class="p-3 mb-0 mt-4 bg-light">Upcoming Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <div class="p-3 mt-2">
                        <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
                    </div>

                </div>
                <div class="tab-pane" id="settings-tab" role="tabpanel">
                    <h6 class="px-4 py-3 bg-light">General Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Online Status</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check1" name="settings-check1" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check1">Show your status to all</label>
                        </div>

                        <h6 class="mt-4">Auto Updates</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check2" name="settings-check2" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check2">Keep up to date</label>
                        </div>

                        <h6 class="mt-4">Backup Setup</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check3" name="settings-check3">
                            <label class="custom-control-label font-weight-normal" for="settings-check3">Auto backup</label>
                        </div>

                    </div>

                    <h6 class="px-4 py-3 mt-2 bg-light">Advanced Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Application Alerts</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check4" name="settings-check4" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check4">Email Notifications</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check5" name="settings-check5">
                            <label class="custom-control-label font-weight-normal" for="settings-check5">SMS Notifications</label>
                        </div>

                        <h6 class="mt-4">API</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check6" name="settings-check6">
                            <label class="custom-control-label font-weight-normal" for="settings-check6">Enable access</label>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- datepicker -->
    <script src="assets/libs/air-datepicker/js/datepicker.min.js"></script>
    <script src="assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script> 

    <!-- Jq vector map -->
    <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>
    <script>
        function prevEle(state)
        {
            $('.wizard .nav-tabs li:nth-child('+state+')').removeClass('active');
            $('.wizard .nav-tabs li.active:nth-child('+(state-1)+')').find('a[data-toggle="tab"]').click();
        }
    </script>

    <script type="text/javascript">
        // ------------step-wizard-------------
        $(document).ready(function () {
            $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);

        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {


        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);
        // $('.connecting-line').hasClass('w-66').addClass('w-100');
        // $('.connecting-line').hasClass('w-33').addClass('w-66');
        
        
        
        
        



        
    });
    // $(".prev-step").click(function (e) {

    //     var active = $('.wizard .nav-tabs li.active');
    //     prevTab(active);

    // });
});

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }


$('.nav-tabs').on('click', 'li', function() {
    /*$('.nav-tabs li.active').removeClass('active');*/
    $(this).addClass('active');
});



</script>
<script type="text/javascript">


// New York
var startlat = -7.80119450  ;
var startlon = 110.36491700;

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

    $(document).ready(function(){

        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function(event){
            var files = event.target.files;

            var done = function(url){
                image.src = url;
                $modal.modal('show');
            };

            if(files && files.length > 0)
            {
                reader = new FileReader();
                reader.onload = function(event)
                {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview:'.preview'
            });
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function(){
            canvas = cropper.getCroppedCanvas({
                width:400,
                height:400
            });

            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var base64data = reader.result;
                    $.ajax({
                        url:'tes3.php',
                        method:'POST',
                        data:{image:base64data},
                        success:function(data)
                        {
                            $modal.modal('hide');
                            $('#uploaded_image').attr('src', data);
                        }
                    });
                };
            });
        });
        
    });
</script>
<!--tinymce js-->
<script src="assets/libs/tinymce/tinymce.min.js"></script>

<!--ck editor js-->
<script src="assets/libs/ckeditor4/ckeditor.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>
</body>
</html>
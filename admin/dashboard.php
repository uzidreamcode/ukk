<?php
session_start();
include 'koneksi.php';

$nik=$_SESSION['nik'];
$ambil_foto=$koneksi->query("SELECT * FROM data_foto WHERE nik='$nik'");
$pecah_foto=$ambil_foto->fetch_assoc();
?>
<?php
$ambil_user=$koneksi->query("SELECT * FROM user WHERE nik='$nik' ");
$pecah_user=$ambil_user->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Email Inbox | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                <img class="rounded-circle header-profile-user" src="<?php echo $pecah_foto['foto']?> " alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $pecah_user['nama_lengkap']?></span>
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
                            <div class="page-title-box">
                                <div class="container-fluid">
                                    <div class="row align-items-">
                                        <div class="col-md-3">
                                            <img style="  display: block;
                                            margin-left: auto;
                                            margin-right: auto;
                                            width: 50%; background-color: black"  class="rounded-circle"  src="<?php echo $pecah_foto['foto']?>">
                                            <h1 style="text-align: center; margin-top: 30px; font-size: x-large" class="page-title mb-1  ">
                                                <?php echo $pecah_user['nama_lengkap'];
                                                ?>
                                            </h1>
                                            <h5 style="text-align: center; margin-top: 10px;" class="page-title mb-1  ">
                                                <?php echo $pecah_user['nik'];
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class=" d-none d-md-block">
                                                <div class="dropdown">
                                                    <div class="border border-light" style="height: 50px; border-radius: 50px" class="card">
                                                        <h6 style="margin-top: 15px; margin-left: 30px; color: white"  class="text-left">

                                                        Dashboard</h6>
                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia/ menampilkan jam sekarang?>
                                                        <h6 style="margin-top: -25px; margin-right: 30px;  color: white"  class="text-right">

                                                            <?php echo date('l, d-m-Y  H:i');?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 style="color: white; margin-top: 30px"><b>Aplikasi Peduli Diri</b></h1>
                                                <h5 style="color: white; margin-top: 20px"><i style="margin-right: 10px" class="fas fa-user"></i> Informasi Pribadi</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end page title end breadcrumb -->

                                <div class="page-content-wrapper">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="card h-100">
                                                    <div class="card-body email-leftbar">

                                                        <a href="email-compose.html" class="btn btn-danger btn-block btn-rounded waves-effect waves-light"><i class="mdi mdi-plus mr-1"></i> Compose</a>

                                                        <div class="mail-list mt-4">
                                                            <a href="#" class="active"><i class="mdi mdi-inbox mr-2"></i> Inbox <span class="ml-1 float-right">(18)</span></a>
                                                            <a href="#"><i class="mdi mdi-star-outline mr-2"></i>Starred</a>
                                                            <a href="#"><i class="mdi mdi-diamond-stone mr-2"></i>Important</a>
                                                            <a href="#"><i class="mdi mdi-file-outline mr-2"></i>Draft</a>
                                                            <a href="#"><i class="mdi mdi-send-check-outline mr-2"></i>Sent Mail</a>
                                                            <a href="#"><i class="mdi mdi-trash-can-outline mr-2"></i>Trash</a>
                                                        </div>

                                                        <div>
                                                            <h6 class="mt-4">Labels</h6>

                                                            <div class="mail-list mt-1">
                                                                <a href="#"><span class="mdi mdi-circle-outline mr-2 text-info"></span>Theme Support</a>
                                                                <a href="#"><span class="mdi mdi-circle-outline mr-2 text-warning"></span>Freelance</a>
                                                                <a href="#"><span class="mdi mdi-circle-outline mr-2 text-primary"></span>Social</a>
                                                                <a href="#"><span class="mdi mdi-circle-outline mr-2 text-danger"></span>Friends</a>
                                                                <a href="#"><span class="mdi mdi-circle-outline mr-2 text-success"></span>Family</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-9">
                                                <div class="row mt-2 mt-xl-0">
                                                    <div class="col-md-6">
                                                        <div style="border-radius: 15px" class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <h5>Welcome Back !</h5>
                                                                        <p class="text-muted">Xoric Dashboard</p>

                                                                        <div class="mt-4">
                                                                            <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-5 ml-auto">
                                                                        <div>
                                                                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                                                            <lottie-player src="https://assets1.lottiefiles.com/animated_stickers/lf_tgs_vvt5UT.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div style="border-radius: 15px" class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <h5>Welcome Back !</h5>
                                                                        <p class="text-muted">Xoric Dashboard</p>

                                                                        <div class="mt-4">
                                                                            <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-5 ml-auto">
                                                                        <div>
                                                                            <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-0">
                                                    <div class="card-body">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#custom-primary" role="tab">
                                                                    <i class="mdi mdi-inbox mr-2 align-middle font-size-18"></i> <span class="d-none d-md-inline-block">Primary</span> 
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#custom-social" role="tab">
                                                                    <i class="mdi mdi-account-group-outline mr-2 align-middle font-size-18"></i> <span class="d-none d-md-inline-block"> Social</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#custom-promotion" role="tab">
                                                                    <i class="mdi mdi-tag-multiple mr-2 align-middle font-size-18"></i> <span class="d-none d-md-inline-block">Promotion</span>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content pt-3">
                                                            <div class="tab-pane active" id="custom-primary" role="tabpanel">
                                                                <ul class="message-list mb-0">
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk1">
                                                                                <label for="chk1" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Peter, me (3)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hello – <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                                                            </a>
                                                                            <div class="date">Mar 6</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk2">
                                                                                <label for="chk2" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Susanna (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-warning badge mr-2">Freelance</span>Since you asked... and i'm
                                                                                inconceivably bored at the train station –
                                                                                <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                                            </a>
                                                                            <div class="date">Mar. 6</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk3">
                                                                                <label for="chk3" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Web Support Dennis</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Re: New mail settings – 
                                                                                <span class="teaser">Will you answer him asap?</span>
                                                                            </a>
                                                                            <div class="date">Mar 7</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk4">
                                                                                <label for="chk4" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (2)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Off on Thursday - 
                                                                                <span class="teaser">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4  4 mar 2014 at 5:55 pm</span>
                                                                            </a>
                                                                            <div class="date">Mar 4</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk5">
                                                                                <label for="chk5" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Medium</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>This Week's Top Stories – 
                                                                                <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk6">
                                                                                <label for="chk6" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Death to Stock</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Montly High-Res Photos – 
                                                                                <span class="teaser">To create this month's pack, we hosted a party with local musician Jared Mahone here in Columbus, Ohio.</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>

                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk7">
                                                                                <label for="chk7" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Randy, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-success badge mr-2">Family</span>Last pic over my village – 
                                                                                <span class="teaser">Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                                            </a>
                                                                            <div class="date">5:01 am</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk8">
                                                                                <label for="chk8" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Andrew Zimmer</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Mochila Beta: Subscription Confirmed
                                                                                – <span class="teaser">You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk9">
                                                                                <label for="chk9" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Infinity HR</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Sveriges Hetaste sommarjobb –
                                                                                <span class="teaser">Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter iSverige.</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk10">
                                                                                <label for="chk10" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Revibe</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-danger badge mr-2">Friends</span>Weekend on Revibe – 
                                                                                <span class="teaser">Today's Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span>
                                                                            </a>
                                                                            <div class="date">Feb 27</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk11">
                                                                                <label for="chk11" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Erik, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Regarding our meeting – 
                                                                                <span class="teaser">That's great, see you on Thursday!</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk12">
                                                                                <label for="chk12" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">KanbanFlow</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>Task assigned: Clone ARP's website
                                                                                – <span class="teaser">You have been assigned a task by Alex@Work on the board Web.</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk13">
                                                                                <label for="chk13" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Tobias Berggren</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Let's go fishing! – 
                                                                                <span class="teaser">Hey, You wanna join me and Fred at the lake tomorrow? It'll be awesome.</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk14">
                                                                                <label for="chk14" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Charukaw, me (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hey man – <span class="teaser">Nah man sorry i don't. Should i get it?</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk15">
                                                                                <label for="chk15" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Home again! – <span class="teaser">That's just perfect! See you tomorrow.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk16">
                                                                                <label for="chk16" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Stack Exchange</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">1 new items in your Stackexchange inbox
                                                                                – <span class="teaser">The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="custom-social" role="tabpanel">
                                                                <ul class="message-list mb-0">
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk17">
                                                                                <label for="chk17" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Andrew Zimmer</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Mochila Beta: Subscription Confirmed
                                                                                – <span class="teaser">You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk18">
                                                                                <label for="chk18" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Peter, me (3)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hello – <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                                                            </a>
                                                                            <div class="date">Mar 6</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk19">
                                                                                <label for="chk19" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Web Support Dennis</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Re: New mail settings – 
                                                                                <span class="teaser">Will you answer him asap?</span>
                                                                            </a>
                                                                            <div class="date">Mar 7</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk20">
                                                                                <label for="chk20" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (2)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Off on Thursday - 
                                                                                <span class="teaser">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4  4 mar 2014 at 5:55 pm</span>
                                                                            </a>
                                                                            <div class="date">Mar 4</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk21">
                                                                                <label for="chk21" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Medium</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>This Week's Top Stories – 
                                                                                <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk22">
                                                                                <label for="chk22" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Susanna (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-warning badge mr-2">Freelance</span>Since you asked... and i'm
                                                                                inconceivably bored at the train station –
                                                                                <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                                            </a>
                                                                            <div class="date">Mar. 6</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk23">
                                                                                <label for="chk23" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Infinity HR</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Sveriges Hetaste sommarjobb –
                                                                                <span class="teaser">Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter iSverige.</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk24">
                                                                                <label for="chk24" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Death to Stock</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Montly High-Res Photos – 
                                                                                <span class="teaser">To create this month's pack, we hosted a party with local musician Jared Mahone here in Columbus, Ohio.</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>

                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk25">
                                                                                <label for="chk25" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Randy, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-success badge mr-2">Family</span>Last pic over my village – 
                                                                                <span class="teaser">Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                                            </a>
                                                                            <div class="date">5:01 am</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk26">
                                                                                <label for="chk26" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Erik, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Regarding our meeting – 
                                                                                <span class="teaser">That's great, see you on Thursday!</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk27">
                                                                                <label for="chk27" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">KanbanFlow</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>Task assigned: Clone ARP's website
                                                                                – <span class="teaser">You have been assigned a task by Alex@Work on the board Web.</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk28">
                                                                                <label for="chk28" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Tobias Berggren</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Let's go fishing! – 
                                                                                <span class="teaser">Hey, You wanna join me and Fred at the lake tomorrow? It'll be awesome.</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk29">
                                                                                <label for="chk29" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Charukaw, me (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hey man – <span class="teaser">Nah man sorry i don't. Should i get it?</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk30">
                                                                                <label for="chk30" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Home again! – <span class="teaser">That's just perfect! See you tomorrow.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk31">
                                                                                <label for="chk31" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Revibe</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-danger badge mr-2">Friends</span>Weekend on Revibe – 
                                                                                <span class="teaser">Today's Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span>
                                                                            </a>
                                                                            <div class="date">Feb 27</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk32">
                                                                                <label for="chk32" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Stack Exchange</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">1 new items in your Stackexchange inbox
                                                                                – <span class="teaser">The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="custom-promotion" role="tabpanel">
                                                                <ul class="message-list mb-0">
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk33">
                                                                                <label for="chk33" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Peter, me (3)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hello – <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                                                            </a>
                                                                            <div class="date">Mar 6</div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk34">
                                                                                <label for="chk34" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Susanna (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-warning badge mr-2">Freelance</span>Since you asked... and i'm
                                                                                inconceivably bored at the train station –
                                                                                <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                                            </a>
                                                                            <div class="date">Mar. 6</div>
                                                                        </div>
                                                                    </li>


                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk35">
                                                                                <label for="chk35" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Medium</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>This Week's Top Stories – 
                                                                                <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk36">
                                                                                <label for="chk36" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (2)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Off on Thursday - 
                                                                                <span class="teaser">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4  4 mar 2014 at 5:55 pm</span>
                                                                            </a>
                                                                            <div class="date">Mar 4</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk37">
                                                                                <label for="chk37" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Death to Stock</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Montly High-Res Photos – 
                                                                                <span class="teaser">To create this month's pack, we hosted a party with local musician Jared Mahone here in Columbus, Ohio.</span>
                                                                            </a>
                                                                            <div class="date">Feb 28</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk38">
                                                                                <label for="chk38" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Web Support Dennis</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Re: New mail settings – 
                                                                                <span class="teaser">Will you answer him asap?</span>
                                                                            </a>
                                                                            <div class="date">Mar 7</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk39">
                                                                                <label for="chk39" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Randy, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-success badge mr-2">Family</span>Last pic over my village – 
                                                                                <span class="teaser">Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                                            </a>
                                                                            <div class="date">5:01 am</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk40">
                                                                                <label for="chk40" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Andrew Zimmer</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Mochila Beta: Subscription Confirmed
                                                                                – <span class="teaser">You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk41">
                                                                                <label for="chk41" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Infinity HR</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Sveriges Hetaste sommarjobb –
                                                                                <span class="teaser">Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter iSverige.</span>
                                                                            </a>
                                                                            <div class="date">Mar 8</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk42">
                                                                                <label for="chk42" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Revibe</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-danger badge mr-2">Friends</span>Weekend on Revibe – 
                                                                                <span class="teaser">Today's Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span>
                                                                            </a>
                                                                            <div class="date">Feb 27</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk43">
                                                                                <label for="chk43" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Erik, me (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Regarding our meeting – 
                                                                                <span class="teaser">That's great, see you on Thursday!</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk44">
                                                                                <label for="chk44" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">KanbanFlow</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-primary badge mr-2">Social</span>Task assigned: Clone ARP's website
                                                                                – <span class="teaser">You have been assigned a task by Alex@Work on the board Web.</span>
                                                                            </a>
                                                                            <div class="date">Feb 24</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk45">
                                                                                <label for="chk45" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Tobias Berggren</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Let's go fishing! – 
                                                                                <span class="teaser">Hey, You wanna join me and Fred at the lake tomorrow? It'll be awesome.</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk46">
                                                                                <label for="chk46" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Charukaw, me (7)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">Hey man – <span class="teaser">Nah man sorry i don't. Should i get it?</span>
                                                                            </a>
                                                                            <div class="date">Feb 23</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="unread">
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk47">
                                                                                <label for="chk47" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">me, Peter (5)</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject"><span class="badge-info badge mr-2">Support</span>Home again! – <span class="teaser">That's just perfect! See you tomorrow.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="col-mail col-mail-1">
                                                                            <div class="checkbox-wrapper-mail">
                                                                                <input type="checkbox" id="chk48">
                                                                                <label for="chk48" class="toggle"></label>
                                                                            </div>
                                                                            <a href="#" class="title">Stack Exchange</a>
                                                                        </div>
                                                                        <div class="col-mail col-mail-2">
                                                                            <a href="#" class="subject">1 new items in your Stackexchange inbox
                                                                                – <span class="teaser">The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                                                            </a>
                                                                            <div class="date">Feb 21</div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row justify-content-end">
                                            <div class="col-xl-9">
                                                <div class="row my-4">
                                                    <div class="col-7">
                                                        Showing 1 - 20 of 1,524
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="btn-group float-right">
                                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                    </div>
                                    <!-- end container-fluid -->
                                </div> 
                                <!-- end page-content-wrapper -->
                            </div>
                            <!-- End Page-content -->


                            <footer class="footer">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            2020 © Xoric.
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-sm-right d-none d-sm-block">
                                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
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


                    <script src="assets/js/app.js"></script>
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
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

</body>
</html>

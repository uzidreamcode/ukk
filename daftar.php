<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Tabib HTML5 Health Directory Template</title>
    <meta name="author" content="Nile-Theme">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="directory, doctor, doctor directory, Health directory, listing, map, medical, medical directory, professional directory, reservation, reviews">
    <meta name="description" content="Health Care & Medical Services Directory">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,700,400i,500%7CDancing+Script:700%7CDancing+Script:700" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- owl Carousel assets -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- hover anmation -->
    <link rel="stylesheet" href="assets/css/hover-min.css">
    <!-- flag icon -->
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- colors -->
    <link rel="stylesheet" href="assets/css/colors/main.css">
    <!-- elegant icon -->
    <link rel="stylesheet" href="assets/css/elegant_icon.css">

    <!-- jquery library  -->
    <script  src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Maps library  -->
    <script  src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script  src="assets/js/jquery.gomap-1.3.3.min.js"></script>

    <!-- fontawesome  -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


</head>

<body>

    <header class="background-white box-shadow">
        <div class="container header-in">


            <div class="row">
                <div class="col-lg-2 col-md-12">
                    <a id="logo" href="index.html" class="d-inline-block margin-tb-15px"><img src="assets/img/logo-1.png" alt=""></a>
                    <a class="mobile-toggle padding-13px background-main-color" href="#"><i class="fas fa-bars"></i></a>
                </div>
                <div class="col-lg-7 col-md-12 position-inherit">
                    
                        <ul id="menu-main" class="nav-menu float-lg-right link-padding-tb-20px">
                            <li><a href="index.php">Beranda</a>
                                
                            </li>
                            
                            
                            <li ><a href="blog.php">Artikel</a>
                                
                            </li>
                            <li><a href="tentang.php">Tentang Kami</a>
                                
                            </li>
                            <li><a href="hubungi.php">Hubungi Kami</a></li>
                        </ul>
                    
                </div>
                <div class="col-lg-3 col-md-12">
                    <hr class="margin-bottom-0px d-block d-sm-none">
                    
                  <a href="page-login.html" class="margin-tb-20px d-inline-block text-up-small float-left float-lg-right"><i class="far fa-user"></i>  Login</a>
              </div>
          </div>

      </div>
  </header>
  <!-- // Header  -->

  <div id="page-title" class="padding-tb-30px gradient-white">
    <div class="container text-center">
        <ol class="breadcrumb opacity-5">
            <li><a href="#">Home</a></li>
            <li class="active">Sing Up</li>
        </ol>
        <h1 class="font-weight-300">Daftar</h1>
    </div>
</div>

<div class="container margin-bottom-100px">
    <!--======= log_in_page =======-->
    <div id="log-in" class="site-form log-in-form box-shadow border-radius-10">

        <div class="form-output">

            <form method="post">
                <div class="form-group label-floating">
                    <label class="control-label">Nama</label>
                    <input class="form-control" placeholder="" name="nama" type="text">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">NIK</label>
                    <input onkeypress="return hanyaAngka(event)" maxlength="16" class="form-control" placeholder="" name="nik" type="text">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Email</label>
                    <input class="form-control" placeholder="" name="email" type="email">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Password</label>
                    <input class="form-control" placeholder="" name="password" type="text">
                </div>





                <button name="daftar" class="btn btn-md btn-primary full-width">Daftar</button>

                <div class="or"></div>




                <p>you have an account? <a href="login.php"> Login</a> </p>
            </form>
            <?php
            include 'koneksi.php';

            if (isset($_POST['daftar'])) 
            {
               $nama=$_POST['nama'];
               $password=$_POST['password'];
               $email=$_POST['email'];
               $nik=$_POST['nik'];

               $koneksi->query("INSERT INTO user VALUES('','$nik','$email','$password') ");
               echo "<script>alert('berhasil mendaftar')</script>";
                echo "<script>location='admin'</script>";
       }
       ?>

   </div>
</div>
<!--======= // log_in_page =======-->

</div>

<footer class="padding-tb-100px background-main-color">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a class="d-inline-block margin-tb-15px"><img src="assets/img/logo-2.png" alt=""></a>
            </div>
            <div class="col-lg-4">
                <p class="text-white opacity-7">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="col-lg-6">
                <ul class="footer-menu margin-tb-15px margin-lr-0px padding-0px list-unstyled float-lg-right">
                    <li><a href="#" class="text-white">Featured</a></li>
                    <li><a href="#" class="text-white">Feedback</a></li>
                    <li><a href="#" class="text-white">Ask a Question</a></li>
                    <li><a href="#" class="text-white">Team</a></li>
                </ul>
            </div>
        </div>
        <hr class="border-white opacity-4 margin-tb-45px">
        <div class="row">
            <div class="col-lg-6">
                <p class="margin-0px text-white opacity-7 sm-mb-15px">© 2018 tabib Health Directory | All Right Reserved. </p>
            </div>
            <div class="col-lg-6">
                <ul class="social-icon style-2 float-lg-right">
                    <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a class="youtube" href="#"><i class="fab fa-youtube"></i></a></li>
                    <li class="list-inline-item"><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a class="google" href="#"><i class="fab fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">

function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 16 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
</script>
<script  src="assets/js/sticky-sidebar.js"></script>
<script  src="assets/js/YouTubePopUp.jquery.js"></script>
<script  src="assets/js/owl.carousel.min.js"></script>
<script  src="assets/js/imagesloaded.min.js"></script>
<script  src="assets/js/wow.min.js"></script>
<script  src="assets/js/custom.js"></script>
<script  src="assets/js/popper.min.js"></script>
<script  src="assets/js/bootstrap.min.js"></script>
</body>

</html>

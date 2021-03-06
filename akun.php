<?php 

include $_SERVER['DOCUMENT_ROOT'].'/Rebellion/connect.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
@$sess = $_SESSION['username'];
$tu3 = mysqli_query($conn, "SELECT * FROM tb_laundry  WHERE username='$sess'");
$tu2 = mysqli_query($conn, "SELECT * FROM tb_laundry INNER JOIN tb_foto_laundry ON tb_foto_laundry.id_foto_laundry = tb_laundry.id_foto_laundry WHERE username='$sess'");
// untuk menampilkan semua data yg ada pada tb_laundry berdasarkan session
$tu = mysqli_query($conn, "SELECT * FROM tb_laundry INNER JOIN tb_detail_kategori ON tb_detail_kategori.id_laundry = tb_laundry.id_detail_kategori INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_detail_kategori.id_kategori WHERE username='$sess'");
// untuk menampilkan data lapak kategori lebih dari satu berdasarkan session

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clean in Click</title>
	  <link rel="icon" href="images/icon.jpg" type="images/icon.jpg">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
    <style>
      .customImages{
        height: 303px;
        width: 100%;
        overflow: hidden;
      }
    </style>
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm"><?php echo date("Y-m-d")?></a></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <?php if(@$sess == null){
                ?>
                <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Masuk</a></li>
                <li class="list-inline-item"><a href="register.php">Daftar</a></li>
                <?php }else{ ?>
                <li class="list-inline-item"><a href="edit/customer-account.php"><?php echo $_SESSION['username']; ?></a></li>
                <li class="list-inline-item"><a href="pembayaran/pembayaran2.php">Pembayaran</a></li>
                <li class="list-inline-item"><a href="keluar_aksi.php">Keluar</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?php echo @$sess;?></h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="cek_login.php" method="post">
                  <div class="form-group">
                    <input id="email-modal" type="text" placeholder="username" name="username" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password-modal" type="password" placeholder="password" name="password" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      
      <?php include "navbar.php" ?>
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active"><?php echo @$sess; ?></li>
                </ol>
            </div>
              </nav>
            
           <!--  DATA MASING-MASING KATALOG LAPAK  -->
            <div class="col-lg-12 order-1 order-lg-2">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <?php while($dat = mysqli_fetch_array($tu2)){ ?>
                    <div class="item"> 
                      <img src="img/<?= $dat['foto'] ?>" alt="" class="img-fluid customImages">
                    </div><?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box">
                    <?php
                    while($data = mysqli_fetch_array($tu3)){ ?>                    
                    <h1 class="text-center"><?php echo $data['nama_laundry']; ?></h1>
                    <p class="goToDescription"><?php echo $data['alamat']; ?></p>
                    <p class="price">Kategori Laundry</p>
                      <div class="row">
                        <?php

                        while($p2 = mysqli_fetch_array($tu)){ ?>
                        <hr class="my-1">
                        <div class="col-lg-4">
                          <p class="text-center btn-outline-success"><?php echo $p2['jenis_kategori']; ?></p>
                        </div>
                        <?php } ?>
                      </div>
                    <p class="text-center buttons p-2"><a href="https://web.whatsapp.com/send?phone=<?php echo $data['no_telp'];?>&text=Permisi,%20apa%20laundry%20ini%20bersedia%20untuk%20saya%20gunakan%20jasanya%20?" class="btn btn-primary"><i class="fa fa-phone"></i>Hubungi Laundry</a></p>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">




                    <button class="owl-thumb-item"><img src="img/utap.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="img/utap.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="img/utap.jpg" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="details" class="box">
                <p></p>
                <h4>Deskripsi Laundry</h4>
                <p><strong><?php echo $data['deskripsi_laundry'];?></strong></p>
              <?php } ?>
                
                <hr>
              </div>
              
              
            </div>
            <!-- /.col-md-9-->
          </div>
        </div>
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <?php include "footer.php" ?>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->

  </body>
</html>
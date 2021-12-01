<!DOCTYPE html>
<?php
session_start();
include "koneksi.php";
?>
<?php
if (!isset($_SESSION['loggedin'])) : ?>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>D'Borong Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="?page=home">D'Borong Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
    $page = @$_GET['page'];
    if ($page == "home") {
      include "page/homeg.php";
    } else {
      include "page/homeg.php";
    }
    ?>
  <?php else : ?>

    <?php
  include "koneksi.php";
  $cekuserlogin = $_SESSION['username'];
  $level = $_SESSION['level'];
  $ses_sql = mysqli_query($koneksi, "select * from admin where username='$_SESSION[username]'");
  $row = mysqli_fetch_assoc($ses_sql);
  $ses_sql1 = mysqli_query($koneksi, "select * from admin where idadmin='$_SESSION[idadmin]'");
  $row1 = mysqli_fetch_assoc($ses_sql1);
  $nama = $row1['nama'];
  $gambar = $row1['gambar'];
  $result = mysqli_query($koneksi, "SELECT count(*) as cart from pesan_produk WHERE idadmin='$_SESSION[idadmin]'");
  $data = mysqli_fetch_assoc($result);
  ?>
    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>D'Borong Shop</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/shop-homepage.css" rel="stylesheet">

    </head>

    <body class="bg-light">
      <!-- Page Content -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container mw-100">
          <a class="navbar-brand" href="#">D'Borong Shop</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
      
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= $gambar; ?>" width="40" height="40" class="rounded-circle"> <?= $nama; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Username : <?= $row['username']; ?></a>
          <a class="dropdown-item" href="#">Saldo : Rp.<?php echo number_format($row['saldo']); ?></a>
          <a class="dropdown-item" href="?page=settings">Settings</a>
          <a class="dropdown-item" href="?page=isi_saldo">Isi Saldo</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>   
    </ul>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="?page=home">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=checkout">Checkout</a>
              </li>
              <li class="nav-item">
              <a class="nav-link btn btn-success btn-sm" href="?page=keranjang_belanja">
                    <span style="color: white;">Keranjang Belanja</span>
                    <span class="badge badge-light"><?= $data['cart']; ?></span>
                </a>
              </li>
              
  </div>
            </ul>
          </div>
        </div>
      </nav>
      <?php
      $page = @$_GET['page'];
      if ($page == "home") {
        include "page/home.php";
      } elseif ($page == "detail_produk") {
        include "page/detail_produk.php";
      } elseif ($page == "kategori_produk") {
        include "page/kategori_produk.php";
      } elseif ($page == "daftar_pembelian") {
        include "page/daftar_pembelian.php";
      } elseif ($page == "daftar_pembelian") {
        include "page/daftar_pembelian.php";
      } elseif ($page == "checkout") {
        include "page/checkout.php";
      } elseif ($page == "isi_saldo") {
        include "page/isi_saldo.php";
      } elseif ($page == "saldo_finish") {
        include "page/saldo_finish.php";
      } elseif ($page == "proses_order") {
        include "page/proses_order.php";
      } elseif ($page == "keranjang_belanja") {
        include "page/keranjang_belanja.php";
      } elseif ($page == "cara_berbelanja") {
        include "page/cara_berbelanja.php";
      } elseif ($page == "order_finish") {
        include "page/order_finish.php";
      } elseif ($page == "settings") {
        include "page/settings.php";
      } else {
        include "page/home.php";
      }
      ?>
    <?php endif; ?>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

  </html>
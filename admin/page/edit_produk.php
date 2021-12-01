<?php
include "../koneksi.php";
$cekuserlogin = $_SESSION['username'];
$level = $_SESSION['level'];
$ses_sql = mysqli_query($koneksi, "select * from admin where username='$_SESSION[username]'");
$row = mysqli_fetch_assoc($ses_sql);
?>
<?php
if ($level == 'pengunjung') {
  header('Location: ../index.php');
  exit;
} else { ?>
<style>
.form-control {
	border-color: #eee;
	min-height: 41px;
	box-shadow: none !important;
}
.form-control:focus {
	border-color: #5cd3b4;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 50%;
	margin: 0 auto;
	padding: 30px 0;
}
.signup-form h2 {
	color: #333;
	margin: 0 0 30px 0;
	display: inline-block;
	padding: 0 30px 10px 0;
	/* border-bottom: 3px solid #5cd3b4; */
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group row {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 14px;
	line-height: 2;
}
.signup-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3390FF;
	border: none;
	margin-top: 20px;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: grey;
	outline: none !important;
}
.signup-form a {
	color: #5cd3b4;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cd3b4;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
</style>
<body>
<div class="signup-form">
<?php
$idproduk = mysqli_real_escape_string($koneksi, @$_GET['idproduk']);
$proses = mysqli_real_escape_string($koneksi, @$_GET['proses']);
if ($proses == "update") {
    $idkategoriproduk = mysqli_real_escape_string($koneksi, $_POST['idkategoriproduk']);
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $deskripsi_singkat = mysqli_real_escape_string($koneksi, $_POST['deskripsi_singkat']);

    $nama_gambar = @$_FILES['gambar']['name'];
    $tmp_gambar = @$_FILES['gambar']['tmp_name'];
    if (!empty($nama_gambar)) {
        $cekgambar = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE idproduk='$idproduk'"));
        if (!empty($cekgambar['gambar'])) { //gambar akan dihapus jika didatabase sebelumnya sudah ada gambar
            unlink("../gambar_produk/$cekgambar[gambar]");
        }
        //baris ini adalah baris untuk upload gambar baru
        copy($tmp_gambar, "../gambar_produk/$nama_gambar");
        $update_gambar = mysqli_query($koneksi, "UPDATE produk SET gambar='gambar_produk/$nama_gambar' WHERE idproduk='$idproduk'");
    }

    $update = mysqli_query($koneksi, "UPDATE produk SET idkategoriproduk='$idkategoriproduk', nama_produk='$nama_produk', harga='$harga', deskripsi_singkat='$deskripsi_singkat' WHERE idproduk='$idproduk'");
    if ($update) {
        echo "Sukses!! Update Data Berhasil";
        echo "<script>history.go(-2)</script>";
        // echo "<script>window.history.go(-2)</script>";
        // header("Location: ?page=edit");
    } else {
        echo "Maaf!! Proses Update Data Gagal";
    }
}


$tampildata = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE idproduk='$idproduk'"));
?>
    <form action="?page=edit_produk&&proses=update&&idproduk=<?php echo $idproduk; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
      	<div class="form-group row">
          <label class="col-form-label col-4">Nama Produk</label>
			<div class="col-8">
            <select name="idkategoriproduk">
                <?php
                $katprod = mysqli_query($koneksi, "SELECT * FROM kategori_produk");
                while ($katprod1 = mysqli_fetch_array($katprod)) {
                ?>
                    <option value="<?php echo $katprod1['idkategoriproduk'] ?>" <?php if ($tampildata['idkategoriproduk'] == $katprod1['idkategoriproduk']) { ?>selected <?php } ?>><?php echo $katprod1['kategori'] ?></option>
                <?php } ?>
            </select>
            </div>   	
      	</div>			
      	<div class="form-group row">
          <label class="col-form-label col-4">Nama Produk</label>
			<div class="col-8">
                <input type="text" class="form-control" name="nama_produk" required="required" value="<?= $tampildata['nama_produk']; ?>">
            </div>   	
      	</div>			
      	<div class="form-group row">
          <label class="col-form-label col-4">Harga Produk</label>
			<div class="col-8">
                <input type="text" class="form-control" name="harga" required="required" value="<?= $tampildata['harga']; ?>">
            </div>   	
      	</div>			
      	<div class="form-group row">
          <label class="col-form-label col-4">Deskripsi Produk</label>
			<div class="col-8">
                <input type="text" class="form-control" name="deskripsi_singkat" required="required" value="<?= $tampildata['deskripsi_singkat']; ?>">
            </div>   	
      	</div>			
      	<div class="form-group row">
          <label class="col-form-label col-4">Gambar Produk</label>
			<div class="col-8">
            <img class="img-thumbnail" src="../<?php echo $tampildata['gambar']; ?>" width="100">
                <input type="file" class="form-control" name="gambar">
            </div>   	
      	</div>			
		<div class="form-group row">
			<div class="col-8 offset-4">
				<button type="submit" class="btn btn-primary btn-lg" name="Submit">Edit</button>
			</div>  
		</div>		      
    </form>
</div>
</body>
<?php } ?>
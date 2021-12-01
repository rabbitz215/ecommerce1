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
//proses simpan data
$proses=mysqli_real_escape_string($koneksi, @$_GET['proses']);
if($proses=="simpan"){
    $idkategoriproduk=$_POST['idkategoriproduk'];
    $nama_produk=$_POST['nama_produk'];
    $harga=$_POST['harga'];
    $deskripsi_singkat=$_POST['deskripsi_singkat'];
    $tanggal_input=date("Y-m-d");
    $waktu_input=date("H:i:s");

    $nama_gambar=@$_FILES['gambar']['name'];
    $tmp_gambar=@$_FILES['gambar']['tmp_name'];
    if(!empty($nama_gambar)){
        copy($tmp_gambar, "../gambar_produk/$nama_gambar");
    }
    $simpan=mysqli_query($koneksi,"INSERT INTO produk(idkategoriproduk,nama_produk,harga,deskripsi_singkat,deskripsi,tanggal_input,waktu_input,gambar) VALUES('$idkategoriproduk','$nama_produk','$harga','$deskripsi_singkat','','$tanggal_input','$waktu_input','gambar_produk/$nama_gambar')");
    if($simpan){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses Tambah Produk!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
        echo "<h3>Input Data Gagal</h3>";
    }
}
?>
    <form action="?page=tambah_produk&&proses=simpan" method="post" class="form-horizontal" enctype="multipart/form-data">
        <h2>Tambah Produk</h2>
            <div class="form-group row">
            <label class="col-form-label col-4">Kategori Produk</label>
              <div class="col-8">
              <select name="idkategoriproduk">
                <?php
                    $katprod=mysqli_query($koneksi,"SELECT * FROM kategori_produk");
                    while($katprod1=mysqli_fetch_array($katprod)){
                ?>
                <option value="<?php echo $katprod1['idkategoriproduk'] ?>"><?php echo $katprod1['kategori'] ?></option>
                <?php } ?>
            </select>
              </div>   	
            </div>			
            <div class="form-group row">
            <label class="col-form-label col-4">Nama Produk</label>
              <div class="col-8">
                  <input type="text" class="form-control" name="nama_produk" required="required">
              </div>   	
            </div>			
        <div class="form-group row">
			<label class="col-form-label col-4">Harga</label>
			<div class="col-8">
                <input type="text" class="form-control" name="harga" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Deskripsi</label>
			<div class="col-8">
                <input type="text" class="form-control" name="deskripsi_singkat" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Gambar</label>
			<div class="col-8">
                <input type="file" name="gambar" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<div class="col-8 offset-4">
				<button type="submit" class="btn btn-primary btn-lg" name="Submit">Tambah</button>
			</div>  
		</div>		      
    </form>
</div>
</body>
<?php } ?>
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
$proses = mysqli_real_escape_string($koneksi, @$_GET['proses']);
if ($proses == "tambah") {
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $tambah = mysqli_query($koneksi, "INSERT INTO kategori_produk (kategori) VALUES ('$kategori')");
    if ($tambah) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses Tambah Kategori!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        // header("Location: ?page=manajemen_akun");
    } else {
        echo "Maaf!! Proses Tambah User Gagal";
    }
}
?>
    <form action="?page=tambah_kategori&&proses=tambah" method="post" class="form-horizontal">
        <h2>Tambah Kategori</h2>
      	<div class="form-group row">
          <label class="col-form-label col-4">Nama Kategori</label>
			<div class="col-8">
                <input type="text" class="form-control" name="kategori" required="required">
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
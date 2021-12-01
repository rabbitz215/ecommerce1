<?php
include "../koneksi.php";
$level = $_SESSION['level'];
$ses_sql = mysqli_query($koneksi, "select * from admin where username='$_SESSION[username]'");
$row = mysqli_fetch_assoc($ses_sql);
?>
<?php
if ($level == 'pengunjung') {
  header('Location: ../../index.php');
  exit;
} else { ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../vendor/fontawesome-free/css/font-awesome.min.css">
<script src="../vendor/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<style>
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
            <?php
            $proses=mysqli_real_escape_string($koneksi,@$_GET['proses']);
            if($proses=="hapus"){
                $idproduk=mysqli_real_escape_string($koneksi,$_GET['idproduk']);
                $cekdata=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM produk WHERE idproduk='$idproduk'"));
                unlink("../$cekdata[gambar]");
            
                $hapus=mysqli_query($koneksi,"DELETE FROM produk WHERE idproduk='$idproduk'");
                if($hapus){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sukses Hapus Produk!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }else{
                    echo "<h3>Hapus Data Gagal</h3>";
                }
            }
        ?>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Product <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="?page=tambah_produk" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Tambah Produk Baru</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <?php 
                if(isset($_GET['order'])){
                    $order = $_GET['order'];
                }else{
                    $order = 'nama_produk';
                }

                if(isset($_GET['sort'])){
                    $sort = $_GET['sort'];
                }else{
                    $sort = 'ASC';
                }

                $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
                ?>  
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk <a href="?page=list_produk&&order=nama_produk&&sort=<?= $sort; ?>"><i class="fas fa-sort"></i></a></th>						
                        <th>Harga <a href="?page=list_produk&&order=harga&&sort=<?= $sort; ?>"><i class="fas fa-sort"></i></a></th>
                        <th>Deskripsi <a href="?page=list_produk&&order=deskripsi_singkat&&sort=<?= $sort; ?>"><i class="fas fa-sort"></i></a></th>
                        <th>Kategori <a href="?page=list_produk&&order=kategori&&sort=<?= $sort; ?>"><i class="fas fa-sort"></i></a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                $tampil=mysqli_query($koneksi,"SELECT * FROM produk a LEFT JOIN kategori_produk b ON a.idkategoriproduk = b.idkategoriproduk ORDER BY $order $sort");
                while($cetak=mysqli_fetch_assoc($tampil)){
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $cetak['nama_produk']; ?></td>
                        <td><?= $cetak['harga']; ?></td>                        
                        <td><?= ucfirst($cetak['deskripsi_singkat']); ?></td>
                        <td><?= $cetak['kategori']; ?></td>
                        <td>
                            <a href="?page=edit_produk&&idproduk=<?php echo $cetak['idproduk']; ?>&&proses=edit" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="?page=list_produk&&idproduk=<?php echo $cetak['idproduk']; ?>&&proses=hapus" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>
<?php } ?>
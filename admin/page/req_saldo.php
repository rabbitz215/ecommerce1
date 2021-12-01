<?php
$cekuserlogin=$_SESSION['username'];
$level=$_SESSION['level'];
?>
<?php
if($level=='member'){
header("Location: ../index.php");
} else{ ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../vendor/fontawesome-free/css/fontawesome.min.css">
<script src="../vendor/jquery.min.js"></script>
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
    color: #01D618;
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
<body>
<div class="container-xl">
<div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Request <b>Isi Saldo</b></h2>
                    </div>
                </div>
            </div>
<?php
    $id=mysqli_real_escape_string($koneksi,@$_GET['id']);
    $proses=mysqli_real_escape_string($koneksi,@$_GET['proses']);
    if($proses=="done"){
        $done=mysqli_query($koneksi,"UPDATE req_saldo SET status='Terisi' WHERE id='$id'");
        if($done){
          $tampil=mysqli_query($koneksi,"SELECT * FROM req_saldo WHERE id='$id'");
            $cetak=mysqli_fetch_assoc($tampil);
            $idadmin=$cetak['idadmin'];
            $saldo=$cetak['jumlah_saldo'];
            $ses_sql=mysqli_query($koneksi, "select * from admin where idadmin='$idadmin'");
            $row = mysqli_fetch_assoc($ses_sql);
            $saldoawal = $row['saldo'];
            $saldoakhir = $row['saldo'] + $cetak['jumlah_saldo'];
            $upd=mysqli_query($koneksi,"UPDATE admin SET saldo='$saldoakhir' WHERE idadmin='$idadmin'");
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Saldo Telah Terisi!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else{
            echo "<h3>Gagal</h3>";
        }
    }
    $id=mysqli_real_escape_string($koneksi,@$_GET['id']);
    $proses=mysqli_real_escape_string($koneksi,@$_GET['proses']);
    if($proses=="hapus"){
      $hapus=mysqli_query($koneksi,"DELETE FROM req_saldo WHERE id='$id'");
      if($hapus){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Berhasil dihapus!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }else{
          echo "<h3>Gagal</h3>";
      }
    }
?>
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Username</th>
                        <th>Jumlah Pengisian</th>
                        <th>Jenis Pembayaran</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                        <th></th>
                    </tr>
                </thead>
    <?php
    $i=1;
    $tampil=mysqli_query($koneksi,"SELECT * FROM req_saldo");
    while($cetak=mysqli_fetch_array($tampil)){
    ?>
    <tr>
        <td style="color: black;"><?php echo $i; ?></td>
        <td style="color: black;"><?php echo $cetak['nama']; ?></td>
        <td style="color: black;"><?php echo $cetak['username']; ?></td>
        <td style="color: black;">Rp.<?php echo number_format($cetak['jumlah_saldo']) ; ?></td>
        <td style="color: black;"><?php echo $cetak['jenis_pembayaran']; ?></td>
        <td style="color: black;"><?php echo $cetak['status']; ?></td>
        <?php 
        $id=$cetak['id'];
        $status=$cetak['status'];
        if($status=='Belum Terisi'){
          echo "<td>
            <center><a href='?page=req_saldo&&id=$id&&proses=done' class='settings' title='Isi Saldo' data-toggle='tooltip'><i class='fas fa-check-circle'></i></a></center>
        </td>";
        }else{
          echo "<td><center><a href='#' class='settings' title='Isi Saldo' data-toggle='tooltip'><i class='fas fa-check-circle'></i></a></center>
        </td>";
        }
        ?>
        <?php 
        $status=$cetak['status'];
        if ($status=='Terisi') {
          echo "<td>
            <a href='?page=req_saldo&&id=$id&&proses=hapus' class='delete' title='Delete' data-toggle='tooltip'><i class='fa fa-trash'></i> </a></a>
        </td>";
        }else{
          echo "
          <script LANGUAGE='JavaScript'>
          function hapus(){
          alert('Saldo Belum Terisi')
          window.location.href='#';
          }
          </script>
        <td>
            <a href='#' onclick='hapus()' class='delete' title='Delete' data-toggle='tooltip'><i class='fa fa-trash'></i> </a></a></td>";
        }
        ?>
    </tr>
    <?php  $i=$i+1; } ?>
</table>
</body>

<?php } ?>

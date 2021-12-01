<?php
include "koneksi.php";
$idadmin=$_SESSION['idadmin'];
?>
<style type="text/css">
    .form-style-8{
    font-family: 'Open Sans Condensed', arial, sans;
    width: 100%;
    padding: 30px;
    background: #FFFFFF;
    margin: 50px auto;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
    background: #4D4D4D;
    text-transform: uppercase;
    font-family: 'Open Sans Condensed', sans-serif;
    color: white;
    font-size: 18px;
    font-weight: 100;
    padding: 20px;
    margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select 
{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    display: block;
    width: 100%;
    padding: 7px;
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    margin-bottom: 10px;
    font: 16px Arial, Helvetica, sans-serif;
    height: 45px;
}
.form-style-8 textarea{
    resize:none;
    overflow: hidden;
}
.form-style-8 input[type="radio"]{
    margin-top: 10px;
    font-size: 15px;
}
.form-style-8 input[type="button"], 
.form-style-8 input[type="submit"]{
    -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    box-shadow: inset 0px 1px 0px 0px #45D6D6;
    background-color: #2CBBBB;
    border: 1px solid #27A0A0;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 14px;
    padding: 8px 18px;
    text-decoration: none;
    text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover, 
.form-style-8 input[type="submit"]:hover {
    background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
    background-color:#34CACA;
}
</style>
<div class="container">
    <div class="col-12">
        </table>
        <?php
        $proses=mysqli_real_escape_string($koneksi,@$_GET['proses']);
    if($proses=="simpan"){
                    $idadmin=$_SESSION['idadmin'];
                    $nama=mysqli_real_escape_string($koneksi,$_POST['nama']);
                    $username=mysqli_real_escape_string($koneksi,$_POST['username']);
                    $jumlah_saldo=mysqli_real_escape_string($koneksi,$_POST['jumlah_saldo']);
                    $jenis_pembayaran=mysqli_real_escape_string($koneksi,$_POST['jenis_pembayaran']);
                    $status="Belum Terisi";
                    $simpan=mysqli_query($koneksi,"INSERT INTO req_saldo(idadmin,nama,username,password,jumlah_saldo,jenis_pembayaran,status) VALUES('$idadmin','$nama','$username',' ','$jumlah_saldo','$jenis_pembayaran','$status')");
                    if($simpan){
                        echo "<h1>Terima Kasih anda sudah Melakukan Pengisian di Situs Kami</h1>";
                        //header("Location: ?page=order_finish");
                        echo "<meta http-equiv='refresh' content='1; URL=?page=saldo_finish' />";
                    }else{
                        echo "<h1>Maaf Proses Pembelian Gagal</h1>";
                    }
            }
        ?>
        <form method="post" action="?page=isi_saldo&&proses=simpan" class="form-style-8">
            <h2>Pengisian Saldo</h2>
            <div class="row">
                <label class="col-4">Nama</label>
                <div class="col-8">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
                </div>
            </div>
            <div class="row">
                <label class="col-4">Username</label>
                <div class="col-8">
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" required>
                </div>
            </div>
            <div class="row">
                <label class="col-4">Jumlah Saldo</label>
                <div class="col-8">
                        <input type="radio" name="jumlah_saldo" value="100000" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">Rp.100.000</a>
                        <input type="radio" name="jumlah_saldo" value="500000" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">Rp.500.000</a>
                        <input type="radio" name="jumlah_saldo" value="1000000" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">Rp.1.000.000</a>
                </div>
            </div>
            <div class="row">
                <label class="col-4">Pembayaran</label>
                <div class="col-8">
                        <input type="radio" name="jenis_pembayaran" value="BCA" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">BCA</a>
                        <input type="radio" name="jenis_pembayaran" value="MANDIRI" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">MANDIRI</a>
                        <input type="radio" name="jenis_pembayaran" value="VISA" style="margin-left: 5px;"> <a style="color: black; font-size: 15px; margin-left: 5px; cursor: default;">VISA</a>
                </div>
            </div>
            <div class="row">
                <label class="col-4"> </label>
                <div class="col-8">
                        <input class="simpan" type="submit" name="Submit" value="Proses Checkout">
                </div>
            </div>
        </form>
    </div>
</div>
   </div>

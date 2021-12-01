<?php
$id = $_SESSION['idadmin'];
$poi=mysqli_query($koneksi,"SELECT * FROM
pesan_produk a LEFT JOIN produk b
ON a.idproduk=b.idproduk");
$ses_sql=mysqli_query($koneksi, "select * from admin where username='$_SESSION[username]'");
$row = mysqli_fetch_assoc($ses_sql);
$pol    =mysqli_fetch_array($poi);
$idproduk=$pol['idproduk'];
$jumlah=$pol['jumlah'];
$saldo =$row['saldo'];
$totalakhir3 = $pol['subtotal'];
?>
<?php
        if($totalakhir3 > '0'){
        ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
      <!-- Tabs -->
<div class="container">
    <h3>CHECKOUT</h3>
   <div class="row">
    <div class="col-12">
        <?php
            $proses=mysqli_real_escape_string($koneksi,@$_GET['proses']);
            $noktp=mysqli_real_escape_string($koneksi,@$_POST['noktp']);
            $nama=mysqli_real_escape_string($koneksi,@$_POST['nama']);
            $notelp=mysqli_real_escape_string($koneksi,@$_POST['notelp']);
            $kodepos=mysqli_real_escape_string($koneksi,@$_POST['kodepos']);
            $alamat=mysqli_real_escape_string($koneksi,@$_POST['alamat']);
            $alamat_pengiriman=mysqli_real_escape_string($koneksi,@$_POST['alamat_pengiriman']);
            $jenis_pengiriman=mysqli_real_escape_string($koneksi,@$_POST['jenis_pengiriman']);
            $tgl_checkout=date("Y-m-d");
            $wkt_checkout=date("H:i:s");
            $status="Belum Sampai";
        ?>
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Sub Total</th>
    </tr>
  </thead>
  <?php
            $i=1;
            $id=$_SESSION['idadmin'];
            $totalakhir=0;
                $daftarbeli=mysqli_query($koneksi,"SELECT * FROM
                    pesan_produk a LEFT JOIN produk b
                    ON a.idproduk=b.idproduk WHERE idadmin='$id'");
                while($daftarbeli1=mysqli_fetch_array($daftarbeli)){
            ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?= $daftarbeli1['nama_produk']; ?></td>
      <td>Rp.<?= number_format($daftarbeli1['harga']); ?></td>
      <td><?= $daftarbeli1['jumlah']; ?></td>
      <td>Rp.<?= number_format($daftarbeli1['subtotal']); ?></td>
    </tr>
  </tbody>
        <?php
                $totalakhir+=$daftarbeli1['subtotal'];
                $sisa1 =$saldo-$totalakhir;
                if ($saldo < $totalakhir) {
    echo '<script LANGUAGE="JavaScript">
    alert("Saldo Tidak Cukup")
    window.location.href="index.php?page=keranjang_belanja";
    </script>';
}
        $i=$i+1; } 
        if($proses=="checkout"){
            $id=$_SESSION['idadmin'];
                    $daftarbeli=mysqli_query($koneksi,"SELECT * FROM
                    pesan_produk a LEFT JOIN produk b
                    ON a.idproduk=b.idproduk WHERE idadmin='$id'");
                    $simpan=mysqli_query($koneksi,"INSERT INTO checkout(idadmin,noktp,nama,notelp,kodepos,alamat,alamat_pengiriman,jenis_pengiriman,tgl_checkout,wkt_checkout,status) VALUES('$id','$noktp','$nama','$notelp','$kodepos','$alamat','$alamat_pengiriman','$jenis_pengiriman','$tgl_checkout','$wkt_checkout','$status')");
                    if($simpan){
                        $id=$_SESSION['idadmin'];
                        $daftarbeli=mysqli_query($koneksi,"SELECT * FROM
                    pesan_produk a LEFT JOIN produk b
                    ON a.idproduk=b.idproduk WHERE idadmin='$id'");
                        $daftarbeli1=mysqli_fetch_array($daftarbeli);
                        $idproduk = $daftarbeli1['idproduk'];
                        $jumlah = $daftarbeli1['jumlah'];
                        $harga = $daftarbeli1['harga'];
                        $subtotal = $daftarbeli1['subtotal'];
                        $tgl_checkout=date("Y-m-d");
                        $wkt_checkout=date("H:i:s");
                        $upsaldo= mysqli_query($koneksi, "UPDATE admin SET saldo='$sisa1' WHERE idadmin='$id'");
                        //header("Location: ?page=order_finish");
                        echo "<meta http-equiv='refresh' content='1; URL=?page=order_finish' />";
                    }else{
                        echo "<h1>Maaf Proses Pembelian Gagal</h1>";
                    }
            }
        ?>
            <tr class="bg-dark text-white">
                <td colspan="4" align="right">TOTAL</td>
                <td>Rp.<?php echo number_format($totalakhir); ?></td>
            </tr>

        </table>
        <!-- Default form contact -->
<form class="text-center border border-light p-5" action="?page=checkout&&proses=checkout" method="post">

<p class="h4 mb-4">Form Checkout</p>

<!-- Form -->
<input type="text" name="noktp" id="defaultContactFormName" class="form-control mb-4" placeholder="No KTP" required>
<input type="text" name="nama" id="defaultContactFormName" class="form-control mb-4" placeholder="Nama" required>
<input type="text" name="notelp" id="defaultContactFormName" class="form-control mb-4" placeholder="No Telp" required>
<input type="text" name="kodepos" id="defaultContactFormName" class="form-control mb-4" placeholder="Kode Pos" required>
<input type="text" name="alamat" id="defaultContactFormName" class="form-control mb-4" placeholder="Alamat Anda" required>
<input type="text" name="alamat_pengiriman" id="defaultContactFormName" class="form-control mb-4" placeholder="Alamat Pengiriman" required>

<!-- Pengiriman -->
<label>Pengiriman</label>
<select class="browser-default custom-select mb-4" name="jenis_pengiriman">
    <option value="" disabled selected>Pilih</option>
    <option value="JNE">JNE</option>
    <option value="JNT">JNT</option>
    <option value="POS INDONESIA">POS INDONESIA</option>
</select>

<!-- Send button -->
<button class="btn btn-info btn-block" type="submit">Checkout</button>

</form>
<!-- Default form contact -->
    <?php }else{
        echo '<script LANGUAGE="JavaScript">
    alert("Pesan Barang Terlebih Dahulu")
    window.location.href="index.php";
    </script>';
    }
    ?>
    </div>

   </div>
</div>

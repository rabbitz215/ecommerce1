</style>
<body>
    <div id="main">
  <div class="shell2">
<div class="container">
    <h1>PROSES PEMBELIAN</h1>


   <div class="row">
       <div class="col-9">
        <?php
            $idadmin=$_SESSION['idadmin'];
            $idproduk=mysqli_real_escape_string($koneksi,@$_GET['idproduk']);
            $cekbarang=mysqli_query($koneksi,"SELECT * FROM pesan_produk WHERE idproduk='$idproduk'");
            $cekbarang1=mysqli_fetch_array($cekbarang);
            $cekbarang2=mysqli_num_rows($cekbarang);

            $produk=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM produk WHERE idproduk='$idproduk'"));

            if($cekbarang2==0){
                $simpan=mysqli_query($koneksi,"INSERT INTO pesan_produk(idproduk,idadmin,jumlah,harga,subtotal) VALUES('$produk[idproduk]','$idadmin','1','$produk[harga]','$produk[harga]')");
                    echo "Sukses, Produk yang anda pilih berhasil ditambahkan ke dalam Keranjang Belanja<br>
                        <a href='?page=keranjang_belanja' class='proses'>Keranjang Belanja</a>
                        <a href='index.php'class='proses2'>Lanjut Berbelanja</a>
                    ";
            }else{
                $jumlah=$cekbarang1['jumlah']+1;
                $subtotal=$cekbarang1['harga']*$jumlah;
                $update=mysqli_query($koneksi,"UPDATE pesan_produk SET jumlah='$jumlah',subtotal='$subtotal' WHERE idproduk='$idproduk'");
                echo "<b>Sukses!! Barang ini sudah anda pesan sebelumnya, dan jumlah Pemesan Berhasil Perbarui
                <br>
                        <a href='?page=keranjang_belanja' class='proses'>Keranjang Belanja</a>
                        <a href='index.php'class='proses2'>Lanjut Berbelanja</a>";
            }
        ?>
    </div>
   </div>
</body>
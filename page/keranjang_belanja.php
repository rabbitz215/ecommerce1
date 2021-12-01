<!------ Include the above in your HEAD tag ---------->

<link href="vendor/fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="vendor/fontawesome/css/brands.css" rel="stylesheet">
<link href="vendor/fontawesome/css/solid.css" rel="stylesheet">

<?php
$idpesanproduk = mysqli_real_escape_string($koneksi, @$_GET['idpesanproduk']);
$proses = mysqli_real_escape_string($koneksi, @$_GET['proses']);
if ($proses == "hapus") {
    $hapus = mysqli_query($koneksi, "DELETE FROM pesan_produk WHERE idpesanproduk='$idpesanproduk'");
} elseif ($proses == "update") {
    $pesanproduk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pesan_produk WHERE idpesanproduk='$idpesanproduk'"));
    $jumlah = mysqli_real_escape_string($koneksi, @$_POST['jumlah']);
    $subtotal = $pesanproduk['harga'] * $jumlah;
    $update = mysqli_query($koneksi, "UPDATE pesan_produk SET jumlah='$jumlah', subtotal='$subtotal' WHERE idpesanproduk='$idpesanproduk'");
}
?>

<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga(Satuan)</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-right">Subtotal</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $id = $_SESSION['idadmin'];
                        $totalakhir = 0;
                        $daftarbeli = mysqli_query($koneksi, "SELECT * FROM
                    pesan_produk a LEFT JOIN produk b
                    ON a.idproduk=b.idproduk WHERE idadmin='$id'");
                        while ($daftarbeli1 = mysqli_fetch_array($daftarbeli)) {
                        ?>
                            <tr>
                                <td><img class="img-thumbnail" style="height: 80px; width: 80px;" src="<?= $daftarbeli1['gambar']; ?>" /> </td>
                                <td><?= $daftarbeli1['nama_produk']; ?></td>
                                <td>Rp.<?= number_format($daftarbeli1['harga']); ?></td>
                                <form method="post" action="?page=keranjang_belanja&&idpesanproduk=<?php echo $daftarbeli1['idpesanproduk']; ?>&&proses=update">
                                    <td><input class="form-control" name="jumlah" type="number" min="1" value="<?php echo $daftarbeli1['jumlah']; ?>" /></td>
                                    <td class="text-right">Rp.<?php echo number_format($daftarbeli1['subtotal'], 2); ?></td>
                                    <td class="text-center"><button class="btn btn-sm btn-success" type="Submit" name="Update"><i class="fas fa-edit"></i> </button> </td>
                                </form>
                                <td class="text-center"><a href="?page=keranjang_belanja&&idpesanproduk=<?php echo $daftarbeli1['idpesanproduk']; ?>&&proses=hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                            </tr>
                        <?php $totalakhir += $daftarbeli1['subtotal'];
                        } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>Rp.<?= number_format($totalakhir); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="?page=home" class="btn btn-block btn-light">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="?page=checkout" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
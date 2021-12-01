<?php
    $idkategoriproduk=mysqli_real_escape_string($koneksi,trim(strip_tags(@$_GET['idkategoriproduk'])));
    if(!empty($idkategoriproduk)){
        $proc_query="WHERE idkategoriproduk='$idkategoriproduk'";
    }else{
        $proc_query="";
    }
    $kategori=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM kategori_produk $proc_query"));
?>
<?php

$per_laman = 8;
$laman_sekarang = 1;
if (isset($_GET['laman'])) {
    $laman_sekarang = $_GET['laman'];
    $laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang : 1;
}
$total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk $proc_query ORDER BY idproduk DESC"));
$total_laman = ceil($total_data / $per_laman);
$awal = ($laman_sekarang - 1) * $per_laman;

?>

<div class="container mt-4 mw-100">
    <div class="row">
        <div class="col-lg-3">
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Kategori
  </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenuButton">
                <a href="?page=home" class="dropdown-item">All</a>
            <?php
            $kategori=mysqli_query($koneksi,"SELECT * FROM kategori_produk");
            while($kategori_tampil=mysqli_fetch_array($kategori)){
            ?>
                <a href="?page=home&&idkategoriproduk=<?php echo $kategori_tampil['idkategoriproduk']?>" class="dropdown-item"><?php echo $kategori_tampil['kategori']; ?></a>
            <?php } ?>
            </div>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="row">
                <?php
                // $produktebaru = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY idproduk DESC LIMIT $per_laman OFFSET $awal");
                // while ($tampilproduk = mysqli_fetch_array($produktebaru)) {
                    // $gambar = $tampilproduk['gambar'];
                    $produktebaru=mysqli_query($koneksi,"SELECT * FROM produk $proc_query ORDER BY idproduk DESC LIMIT $per_laman OFFSET $awal");
                    $cekjmlproduk=mysqli_num_rows($produktebaru);
                    if($cekjmlproduk==0){
                        echo "<h3>Maaf!! Produk pada Kategori $kategori[kategori] Tidak ada.</h3>";
                    }
                    while($tampilproduk=mysqli_fetch_array($produktebaru)){
                        $gambar=$tampilproduk['gambar'];
                ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="<?php echo $gambar ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#"><?php echo $tampilproduk['nama_produk']; ?></a>
                                </h4>
                                <h5>Rp.<?php echo number_format($tampilproduk['harga'], 2); ?></h5>
                            </div>
                            <div class="card-footer">
                                <script>
                                    function add(){
                                        $('#add').modal('show');
                                    }
                                </script>
                                <div id="add" class="modal fade" style="margin-top: 20rem;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                    <p>Anda harus login terlebih dahulu.</p>
                    <a href="login.php" style="text-decoration: none; color: white;"><button type="button" class="btn btn-success">Login</button></a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                  <a href="#" id="add" onclick="add()" class="btn btn-primary btn-block"><center>Add To Cart</center></a>
                            </div>
                        </div>
                    </div>
                    

                    <?php } ?>
            </div>
        <!-- <div class="halaman"> -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($laman_sekarang > 1) { ?>
                <li class="page-item">
                <a href="index.php?laman=<?php echo $laman_sekarang - 1 ?> " class="page-link">Sebelumnya</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                <a href="#" class="page-link">Sebelumnya</a>
                </li>
            <?php } ?>
            <?php if ($laman_sekarang < $total_laman) { ?>
                <li class="page-item">
                <a href="index.php?laman=<?php echo $laman_sekarang + 1 ?>" class="page-link">Selanjutnya</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                <a href="#" class="page-link">Selanjutnya</a>
                </li>
            <?php } ?>
        </ul>
        </nav>
        <!-- </div> -->
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
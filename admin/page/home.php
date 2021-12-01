<?php
if ($_SESSION['level'] == 'pengunjung') {
  header('Location: ../../index.php');
  exit;
} else { ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php 
                        $result=mysqli_query($koneksi, "SELECT count(*) as user from admin WHERE level='pengunjung'");
                        $data=mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['user']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php 
                        $result2=mysqli_query($koneksi, "SELECT count(*) as kategori from kategori_produk");
                        $data=mysqli_fetch_assoc($result2);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Kategori</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['kategori']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php 
                        $result3=mysqli_query($koneksi, "SELECT count(*) as produk from produk");
                        $data=mysqli_fetch_assoc($result3);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Produk
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data['produk']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <?php 
                        $result4=mysqli_query($koneksi, "SELECT SUM(saldo) as saldo from admin");
                        $data4=mysqli_fetch_assoc($result4);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Saldo Semua User Di Server</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= number_format($data4['saldo']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php } ?>
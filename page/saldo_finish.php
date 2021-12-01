<body>
  <div id="main">
  <div class="shell2">
<div class="container">
    <h1>ORDER SELESAI</h1>
   <div class="row">
    <div class="col-9">
        <?php
            $data_pembeli=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM req_saldo ORDER BY id DESC"));
        ?>
        <b>Terima kasih anda sudah mengisi saldo di Toko Kami, Saldo terisi setelah di konfirmasi oleh admin<br>
        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-right">INFORMASI</th>
                    <th></th>
                </tr>
            </thead>
            <tr>
                <td>No Pembelian</td>
                <td><?php echo $data_pembeli['id']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $data_pembeli['nama']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $data_pembeli['username']; ?></td>
            </tr>
            <tr>
                <td>Jumlah Diisi</td>
                <td>Rp.<?php echo number_format($data_pembeli['jumlah_saldo']); ?></td>
            </tr>
            <tr>
                <td>Jenis Pembayaran</td>
                <td><?php echo $data_pembeli['jenis_pembayaran']; ?></td>
            </tr>
        </table>

    </div>
    
   </div>
</b>
</body>

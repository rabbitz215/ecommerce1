<div class="container">
    <h3>ORDER SELESAI</h3>


   <div class="row">
    <div class="col-12">
        <?php
            $data_pembeli=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM checkout ORDER BY idcheckout DESC"));
        ?>
        Terimkasih anda sudah membeli Produk di Toko Kami<br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
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
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $daftarbeli1['nama_produk']; ?></td>
                <td><?php echo number_format($daftarbeli1['harga'],2); ?></td>
                <td><?php echo $daftarbeli1['jumlah']; ?></td>
                <td><?php echo number_format($daftarbeli1['subtotal'],2); ?></td>

            </tr>
        <?php
                $totalakhir+=$daftarbeli1['subtotal'];
        $i=$i+1; } ?>
            <tr>
                <td colspan="4" align="right">TOTAL</td>
                <td><?php echo number_format($totalakhir,2); ?></td>
            </tr>

        </table>
        <br>
        <hr>
        <table class="table">
            <tr>
                <th>No Pembelian</th>
                <td><?php echo $data_pembeli['idcheckout']; ?></td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td><?php echo $data_pembeli['nama']; ?></td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td><?php echo $data_pembeli['notelp']; ?></td>
            </tr>
            <tr>
                <th>Jenis Pengiriman</th>
                <td><?php echo $data_pembeli['jenis_pengiriman']; ?></td>
            </tr>
            <tr>
                <th>Alamat Pengiriman</th>
                <td><?php echo $data_pembeli['alamat_pengiriman']; ?></td>
            </tr>
            <tr>
                <th>Sisa Saldo</th>
                <td>Rp.<?php echo number_format($row['saldo']); ?></td>
            </tr>
        </table>

    </div>
    
   </div>

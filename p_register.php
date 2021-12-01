<?php

// menghubungkan php dengan koneksi database
include 'koneksi.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
if ($password == $confirm){
            $sql_get = mysqli_query ($koneksi,"SELECT * FROM admin WHERE username = '$username'");
            $num_row = mysqli_num_rows($sql_get);
        //fungsi script ini adalah untuk mengecek ketersediaan username, jika tidak tersedia maka program akan berjalan
            if ($num_row ==0) {
                $password = $password;
                $confirm = $confirm;
                $sql_insert = mysqli_query($koneksi,"INSERT INTO admin(username,password,nama,level,saldo,gambar) VALUES ('$username','$password','$nama','pengunjung','0','gambar_pp/default.png')");
                echo "<script>alert('Pendaftaran Berhasil');
window.location.href = 'login.php';;</script>";
            }
            else {
                echo "<script>alert('Maaf, Username sudah terdaftar!');
javascript:history.go(-1);</script>";
            }
        }   else {
            echo "<script>alert('Maaf, Password yang kamu masukan tidak cocok!');
javascript:history.go(-1);</script>";
            }

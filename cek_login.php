<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	$id = $data['idadmin'];

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $username;
		$_SESSION['idadmin'] = $id;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="pengunjung"){
		// buat session login dan username
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $username;
		$_SESSION['idadmin'] = $id;
		$_SESSION['level'] = "pengunjung";
		// alihkan ke halaman dashboard pegawai
		header("location:index.php");

	// cek jika user login sebagai pengurus
	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

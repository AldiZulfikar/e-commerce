<?php
session_start();

require 'functions.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
 
// menyeleksi data dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from users where username='$username'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$user = mysqli_fetch_array($data);
 
if($cek > 0){
	if(password_verify($_POST['password'], $user['password'])){
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] = $user['nama'];
		$_SESSION['level'] = $user['level'];
		if($_SESSION['level'] == 'user'){
			header("location:index.php");
		}
		else{
			header("location:admin/index.php");
		}
	}
}else{
	header("location:login.php?pesan=gagal");
}
?>
<?php
    require 'functions.php';

    if( isset($_POST["register"])){
        if(registrasi($_POST)>0){
            header("location:login.php?pesan=daftar-berhasil");
        }
    }

    function registrasi($data)
    {
        global $conn;

        $username = htmlspecialchars($data['username']);
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password_konfirmasi = mysqli_real_escape_string($conn, $data['password_konfirmasi']);
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $created_at = date('Y-m-d');

        // cek username

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            return header("location:register.php?pesan=username-gagal");
        }

        // cek konfirmasi password
        if($password != $password_konfirmasi)
        {
            return header("location:register.php?pesan=konfirmasi-gagal");
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // input data ke database
        $query = "INSERT INTO users VALUES('', '$username', '$password', '$nama', '', '', '$email', 'user', '$created_at')";
        $input = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn)){
            return mysqli_affected_rows($conn);
        }else{
            return header("location:register.php?pesan=Terjadi Kesalahan");
        }

        
    }   
?>

<?php
require 'functions.php';

//ambil data
function ambil_data($data){
    global $conn;
    $result = mysqli_query($conn, $data);

    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

//input data
function tambah($data){
    global $conn;

    $user_id = $data["user_id"];
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $created_at = date('Y-m-d');

    $query = "INSERT INTO produk VALUES ('', '$user_id', '$nama', '$deskripsi', '$created_at')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//edit data
function edit($data){
    global $conn;
    $user_id = $data["user_id"];
    $produk_id = $data["produk_id"];
    $nama_produk = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "UPDATE produk SET `user_id` = '$user_id', `nama_produk` = '$nama_produk', `deskripsi` ='$deskripsi' WHERE produk_id = '$produk_id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus data
function delete($id){
    global $conn;

    $query = "DELETE FROM produk WHERE produk_id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
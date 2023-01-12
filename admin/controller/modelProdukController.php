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

    $produk_id = $data["produk_id"];
    $model = htmlspecialchars($data["model"]);
    $harga = $data["harga"];
    $created_at = date('Y-m-d');
    $jumlah = $data["jumlah"];
    $berat = $data["berat"];

    $query = "INSERT INTO model_produk VALUES ('', '$produk_id', '$model', '$harga', '$jumlah', '$berat', '$created_at')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus data
function delete($id){
    global $conn;

    $query = "DELETE FROM model_produk WHERE model_produk_id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
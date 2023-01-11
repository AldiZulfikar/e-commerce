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
    $gambar_utama = htmlspecialchars($data["gambar_utama"]);
    $created_at = date('Y-m-d');

    $gambar = $_FILES['gambar']['name'];
    $namaSementara = $_FILES['gambar']['tmp_name'];
    $explode = explode('.',$gambar);
    $extensi  = $explode[count($explode)-1];

    $kode = date('YdmHis');

    $upload = "upload/";
    
    $namaFile = 'Gambar_'.$kode.'.'.$extensi;

    $terupload = move_uploaded_file($namaSementara, $upload.$namaFile);

    if($gambar_utama==1)
    {
        $query = "UPDATE gambar_produk SET `gambar_utama`=0 WHERE produk_id = '$produk_id'" ;

        mysqli_query($conn, $query);
    }

    $query = "INSERT INTO gambar_produk VALUES ('', '$produk_id', '$gambar_utama', '$namaFile', '$created_at')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus data
function delete($id){
    global $conn;

    $query = "DELETE FROM gambar_produk WHERE gambar_produk_id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
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

//edit data
function edit_pembayaran($data){
    global $conn;
    $no_invoice = $data["no_invoice"];
    $status = $data["status"];

    $query = "UPDATE transaksi SET `status_pembayaran` = '$status' WHERE no_invoice = '$no_invoice'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit_pengiriman($data){
    global $conn;
    $no_invoice = $data["no_invoice"];
    $status = $data["status"];

    $query = "UPDATE transaksi SET `status_pengiriman` = '$status' WHERE no_invoice = '$no_invoice'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit_resi($data){
    global $conn;
    $no_invoice = $data["no_invoice"];
    $resi = $data["resi"];

    $query = "UPDATE transaksi SET `no_resi` = '$resi' WHERE no_invoice = '$no_invoice'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
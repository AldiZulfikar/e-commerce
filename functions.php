<?php
//Koneksi database
 $conn = mysqli_connect("localhost", "root", "", "e_commerce");
 //$conn = mysqli_connect("sql207.epizy.com", "epiz_30489250", "f1YsKdm669P", "epiz_30489250_siapabarjas");

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

//tambah keranjang
//input data
function tambah($data){
    global $conn;

    $user = $data["username"];
    $produk_id = $data["produk_id"];
    $model_id = $data["model_id"];

    $query = "INSERT INTO keranjang VALUES ('', '$user', '$produk_id', '$model_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//hapus data
function delete($id){
    global $conn;
    
    $query = "DELETE FROM keranjang WHERE keranjang_id = '$id'";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

//input data pembayaran
function tambah_transaksi($data){
    global $conn;

    $produk_id = $data["produk_id"];
    $user_id = $data["user_id"];
    $total = $data["total"];
    $nama_penerima = htmlspecialchars($data["nama"]);
    $email_penerima = htmlspecialchars($data["email"]);
    $alamat_penerima = htmlspecialchars($data["alamat"]);
    $notel = $data["notel"];
    $created_at = date('Y-m-d');

    $gambar = $_FILES['bukti_tf']['name'];
    $namaSementara = $_FILES['bukti_tf']['tmp_name'];
    $explode = explode('.',$gambar);
    $extensi  = $explode[count($explode)-1];

    $kode_tf = 'TF#'.date('YdmHis');
    $kode = date('YdmHis');

    $upload = "upload/";
    
    $namaFile = 'Bukti_tf_'.$kode.'.'.$extensi;

    $terupload = move_uploaded_file($namaSementara, $upload.$namaFile);
    $query2 = "INSERT INTO detail_transaksi VALUES ('', '$user_id', '$produk_id', '$kode_tf')";
    mysqli_query($conn, $query2);

    $query = "INSERT INTO transaksi VALUES ('', '$kode_tf', '$nama_penerima', '$email_penerima', '$total', '$alamat_penerima', '$notel', '$namaFile', '0', '0', '0', '$created_at', '$created_at')";
    mysqli_query($conn, $query);
    

    return mysqli_affected_rows($conn);
}

?>


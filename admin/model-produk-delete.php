<?php
require 'controller/modelProdukController.php';

$id = $_GET['id'];

if(delete($id)>0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'model-produk.php';
        </script>
        ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'model-produk.php';
        </script>
        ";
}
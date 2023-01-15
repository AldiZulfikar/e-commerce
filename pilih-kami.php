<?php 
	session_start();
    require 'functions.php';
    
?>
<?php include 'layouts-frontend/link.php'; ?>

<body>
    <?php include 'layouts-frontend/header.php'; ?>

    <div class="jumbotron mb-5">
        <h1 class="display-4">Mengapa pilih kami?</h1>
        <ul>
            <li class="lead">
                Barang yang berkualitas dengan material yang kokoh
            </li>
            <li class="lead">
                Harga bersaing
            </li>
            <li class="lead">
                kelengkapan barang sesuai dengan kebutuhan
            </li>
            <li class="lead">
                Pelayanan yang memuaskan
            </li>
            <li class="lead">
                Perusahaan kami telah berdiri cukup lama dengan pelanggan yang selalu merasa puas akan barang yang diterima
            </li>
        </ul>
    </div>

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
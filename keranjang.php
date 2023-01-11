<?php 
	session_start();
    require 'functions.php';

    $username = $_SESSION['username'];
    
    //ambil data
    $produk = ambil_data("SELECT * FROM keranjang 
    INNER JOIN gambar_produk on keranjang.produk_id=gambar_produk.produk_id 
    INNER JOIN model_produk on keranjang.produk_id=model_produk.model_produk_id
    INNER JOIN produk on keranjang.produk_id=produk.produk_id  
    WHERE gambar_utama=1 AND username='$username'");
    
?>
<?php include 'layouts-frontend/link.php'; ?>
<body>
    <?php include 'layouts-frontend/header.php'; ?>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th class="p-name text-center">Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($produk as $row) :
                                            $i++;
                                    ?>
                                        <tr>
                                            <td class="cart-pic first-row">
                                                <img src="admin/upload/<?php echo $row['gambar']?>" />
                                            </td>
                                            <td class="cart-title first-row text-center">
                                                <h5><?php echo $row['nama_produk']?></h5>
                                            </td>
                                            <td class="p-price first-row"><?php echo $row['harga']?></td>
                                            <td class="delete-item">
                                            <a href="cekout.php?id=<?php echo $row['keranjang_id']?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <form action="keranjang-delete.php?id=<?php echo $row['keranjang_id']?>" method="post" class="d-inline">
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form> 
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
<!-- Partner Logo Section Begin -->
<div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets-frontend/img/logo-carousel/logo-1.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets-frontend/img/logo-carousel/logo-2.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets-frontend/img/logo-carousel/logo-3.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets-frontend/img/logo-carousel/logo-4.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets-frontend/img/logo-carousel/logo-5.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
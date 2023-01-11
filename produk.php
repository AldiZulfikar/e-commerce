<?php 
	session_start();
    require 'functions.php';
    //ambil data
    $produk = ambil_data("SELECT * FROM produk 
    INNER JOIN gambar_produk on produk.produk_id=gambar_produk.produk_id 
    INNER JOIN model_produk on produk.produk_id=model_produk.produk_id 
    WHERE gambar_utama=1
    ORDER BY produk.produk_id DESC");
    
?>
<?php include 'layouts-frontend/link.php'; ?>

<body>
    <?php include 'layouts-frontend/header.php'; ?>
    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Semua Produk</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    $i = 0;
                    foreach($produk as $row) :
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                                <div class="pi-pic">
                                    <img src="admin/upload/<?php echo $row['gambar']; ?>" alt="" />
                                    <ul>
                                        <li class="w-icon active">
                                            <a href="detail-produk.php"><i class="icon_bag_alt"></i></a>
                                        </li>
                                        <li class="quick-view"><a href="detail-produk.php">+ Lihat Produk</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Aldri Jaya Steel</div>
                                    <a href="detail-produk.php">
                                        <h5><?php echo $row['nama_produk']; ?></h5>
                                    </a>
                                    <div class="product-price">
                                        <?php echo $row['harga']; ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
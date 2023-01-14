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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Tentang Kami</span>
                            <h1>Aldrin Jaya Steel</h1>
                            <p>
                                Menyediakan produk berkualitas dengan melewati proses Quality Control demi memprioritaskan kepuasan Anda. 
                            </p>
                            <a href="./produk.php" class="primary-btn">Belanja Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/heroo.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Tentang Kami</span>
                            <h1>Aldrin Jaya Steel</h1>
                            <p>
                                Pelayanan bintang lima, kecepatan kilat dan kualitas barang yang mumpuni, Anda puas, kami senang!
                            </p>
                            <a href="./produk.php" class="primary-btn">Belanja Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="product-slider owl-carousel">
                        <?php 
                            $i = 0;
                            foreach($produk as $row) :
                        ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="admin/upload/<?php echo $row['gambar']; ?>" alt=""/>
                                <ul>
                                    <li class="w-icon active">
                                        <a href="detail-produk.php?id=<?php echo $row['produk_id']; ?>"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="detail-produk.php?id=<?php echo $row['produk_id']; ?>">+ Lihat Produk</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Aldri Jaya Steel</div>
                                <a href="detail-produk.php?id=<?php echo $row['produk_id']; ?>">
                                    <h5><?php echo $row['nama_produk']; ?></h5>
                                </a>
                                <div class="product-price">
                                    Rp.<?php echo number_format($row['harga'],2,',','.'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="select-button d-flex justify-content-center">
                        <a href="./produk.php" class="primary-btn checkout-btn ">Lihat Semua Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
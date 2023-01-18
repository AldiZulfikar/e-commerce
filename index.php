<?php 
	session_start();
    require 'functions.php';
    //ambil data
    $produk = ambil_data("SELECT * FROM produk 
    INNER JOIN gambar_produk on produk.produk_id=gambar_produk.produk_id 
    WHERE gambar_utama=1 
    ORDER BY produk.produk_id DESC");
    
?>
<?php include 'layouts-frontend/link.php'; ?>

<body>
    <?php include 'layouts-frontend/header.php'; ?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Aldrin Jaya Steel</span>
                            <h1>Harga yang bersaing</h1>
                            <p>
                            Dengan kualitas yang diberikan, kami memberikan harga yang terjangkau.
                            </p>
                            <a href="./produk.php" class="primary-btn">Belanja Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Aldrin Jaya Steel</span>
                            <h1>Barang dari metal berkualitas</h1>
                            <p>
                                Kami menyediakan barang sesuai kebutuhan anda dengan jaminan kualitas terbaik.
                            </p>
                            <a href="./produk.php" class="primary-btn">Belanja Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Aldrin Jaya Steel</span>
                            <h1>Pelayanan terbaik</h1>
                            <p>
                                Kami memberikan kenyamanan dalam pelayanan kami, sehingga pembeli merasa puas.
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
                                        <a href="detail-produk.php?id=<?php echo $row['produk_id']; ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Detail produk</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Aldrin Jaya Steel</div>
                                <a href="detail-produk.php?id=<?php echo $row['produk_id']; ?>">
                                    <h5><?php echo $row['nama_produk']; ?></h5>
                                </a>
                                <div class="product-price">
                                <?php
                                            $id = $row['produk_id'];
                                            $min = ambil_data("SELECT min(harga) as min FROM model_produk WHERE produk_id='$id'");

                                            foreach($min as $min) :
                                        ?>
                                        Rp.<?php echo number_format($min['min'],2,',','.'); ?>
                                            <?php endforeach;?>
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
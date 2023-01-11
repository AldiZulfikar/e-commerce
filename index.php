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
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="./login.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets-frontend/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="./login.php" class="primary-btn">Shop Now</a>
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
                                <img src="admin/upload/<?php echo $row['gambar']; ?>" alt="" />
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
                                    <?php echo $row['harga']; ?>
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
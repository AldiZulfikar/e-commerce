<?php 
	session_start();
    require 'functions.php';
    
?>
<?php include 'layouts-frontend/link.php'; ?>

<body>
    <?php include 'layouts-frontend/header.php'; ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Mengap[a Pilih Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

     <!-- Blog Details Section Begin -->
     <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>Mengapa Pilih Kami?</h2>
                            <p>Aldrin Jaya Steel</p>
                        </div>
                        <p><ol>
                        <li>
                            Barang yang berkualitas dengan material yang kokoh
                        </li>
                        <li>
                            Harga bersaing
                        </li>
                        <li>
                            kelengkapan barang sesuai dengan kebutuhan
                        </li>
                        <li>
                            Pelayanan yang memuaskan
                        </li>
                        <li>
                            Perusahaan kami telah berdiri cukup lama dengan pelanggan yang selalu merasa puas akan barang yang diterima
                        </li>
                        </ol></p>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>Aldrin Jaya Steel</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
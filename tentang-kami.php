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
                        <span>Tentang kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Tentang Kami</h4>
                        <p>Aldrin Jaya steel merupakan sebuah perusahan penyedia furnitur berbasis metal yang menyediakan segala furnitur sesuai kebutuhan.
                        produk kami memiliki kualitas yang tidak sembarangan, dengan harga yang bersaing.</p>
                        <p>Kami menyediakan pengiriman kepada pembeli sehingga pembeli dapat bersantai dan menunghu barang datang dengan aman sampai ke tangan pembeli.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Alamat:</span>
                                <p>Jakarta Raya, Indonesia</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Telepon:</span>
                                <p>+6283114396043</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>meilindadwiyanti20@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Kunjungi Toko Kami</h4>
                            <p>Pelayanan dan produk berkualitas siap menanti Anda!</p>
                            <div class="map-inner">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.48788413787!2d106.68943122671529!3d-6.2297280260012275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1674001916002!5m2!1sid!2sid"
                                    height="420" style="border:0" allowfullscreen="">
                                </iframe>
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
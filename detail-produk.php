<?php 
	session_start();
    require 'functions.php';
    
    $id = $_GET['id'];
    //ambil data
    $produk = ambil_data("SELECT * FROM produk 
    INNER JOIN gambar_produk on produk.produk_id=gambar_produk.produk_id 
    INNER JOIN model_produk on produk.produk_id=model_produk.produk_id 
    WHERE gambar_utama=1
    ORDER BY produk.produk_id DESC
    LIMIT 4");

    $username = $_SESSION['username'];

    $detail = ambil_data("SELECT * FROM produk WHERE produk_id='$id' ");

    $gambar = ambil_data("SELECT * FROM gambar_produk WHERE produk_id='$id'");
    $gambar_utama = ambil_data("SELECT * FROM gambar_produk WHERE produk_id='$id' AND gambar_utama=1");

    $model = ambil_data("SELECT * FROM model_produk WHERE produk_id='$id'");

    $max = ambil_data("SELECT max(harga) as max FROM model_produk WHERE produk_id='$id'");
    $min = ambil_data("SELECT min(harga) as min FROM model_produk WHERE produk_id='$id'");

    if (isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'keranjang.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
?>
<?php include 'layouts-frontend/link.php'; ?>

<body>
    <?php include 'layouts-frontend/header.php'; ?>

     <!-- Breadcrumb Section Begin -->
     <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Detail Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    <?php 
                        foreach($detail as $dtl) :
                     ?>
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <?php 
                                    foreach($gambar_utama as $gbru) :
                                ?>
                                <div class="pt active" data-imgbigurl="admin/upload/<?php echo $gbru['gambar']; ?>">
                                    <img class="product-big-img" src="admin/upload/<?php echo $gbru['gambar']; ?>" alt="" />
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <?php 
                                        foreach($gambar_utama as $gbru) :
                                    ?>
                                        <div class="pt active" data-imgbigurl="admin/upload/<?php echo $gbru['gambar']; ?>">
                                            <img src="admin/upload/<?php echo $gbru['gambar']; ?>" alt="" />
                                        </div>
                                    <?php endforeach;?>
                                    <?php 
                                        foreach($gambar as $gbr) :
                                    ?>
                                        <div class="pt" data-imgbigurl="admin/upload/<?php echo $gbr['gambar']; ?>">
                                            <img src="admin/upload/<?php echo $gbr['gambar']; ?>" alt="" />
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>Aldri Jaya Steel</span>
                                    <h3><?php echo $dtl['nama_produk']; ?></h3>
                                </div>
                                <form action="" method="post">
                                <div class="pd-desc">
                                    <p>
                                        <?php echo $dtl['deskripsi']; ?>
                                    </p>
                                        <div class="data-section">  
                                            <div class="data-tabs">
                                            <table>
                                                <tr>
                                                    <span class="tab-item aktiv active" data-target=".pilih">Model</span>
                                                    <strong>Pilih Model:</strong>
                                                </tr>
                                                <tr>
                                                    <?php 
                                                        foreach($model as $mdl) :
                                                    ?>  
                                                        <input type="radio" value="<?php echo $mdl['model']; ?>" name="model" class="tab-item form-controll" data-target=".halo<?php echo $mdl['model']; ?>"><?php echo $mdl['model']; ?></input>
                                                        <input type="text" hidden name="model_id" value="<?php echo $mdl['model_produk_id'];?>" >
                                                        <input type="text" hidden name="produk_id" value="<?php echo $mdl['produk_id'];?>" >
                                                        <input type="text" hidden name="username" value="<?php echo $username?>">
                                                    <?php endforeach;?>
                                                </tr>
                                            </table>
                                            </div>

                                            <section class="pilih tab-content active">
                                                <h4>Rp.
                                                <?php 
                                                    foreach($min as $min) :
                                                ?>
                                                <?php echo number_format($min['min'],2,',','.'); ?>
                                                <?php endforeach;?>
                                                -
                                                <?php 
                                                    foreach($max as $max) :
                                                ?>
                                                <?php echo number_format($max['max'],2,',','.'); ?>
                                            </h4>
                                                <?php endforeach;?>
                                            </section>
                                            <?php 
                                                foreach($model as $mdl) :
                                            ?>
                                            <section class="halo<?php echo $mdl['model']; ?> tab-content">
                                                Tersisa <?php echo $mdl['jumlah']; ?> buah
                                                <h4>Rp.<?php echo number_format($mdl['harga'],2,',','.'); ?></h4>
                                            </section>
                                            <?php endforeach;?>
                                        </div>

                                    </div>
                                    <div class="select-button">
                                        <button type="submit" name="submit" class="primary-btn pd-cart">Masukan Keranjang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Lainnya</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
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


<script>
    (() => {
        const dataSection = document.querySelector(".data-section"),
            tabsContainer = document.querySelector(".data-tabs");

        tabsContainer.addEventListener("click", (event) => {
            if (
                event.target.classList.contains("tab-item") &&
                !event.target.classList.contains("active")
            ) {
                const target = event.target.getAttribute("data-target");
                tabsContainer.querySelector(".active").classList.remove("active");
                event.target.classList.add("active");
                dataSection
                    .querySelector(".tab-content.active")
                    .classList.remove("active");
                dataSection.querySelector(target).classList.add("active");
            }
        });
    })();
</script>
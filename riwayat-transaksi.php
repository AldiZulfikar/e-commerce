<?php 
	session_start();
    require 'functions.php';

    if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

    $username = $_SESSION['username'];
    
    //ambil data

    $username = $_SESSION['username'];
    $user = ambil_data("SELECT * FROM users WHERE username = '$username'");

    $id;
    foreach($user as $usr){
        $id = $usr['id'];
    }

    $produk = ambil_data("SELECT * FROM transaksi WHERE owner_id='$id'");
    
?>
<?php include 'layouts-frontend/link.php'; ?>
<body>
    <?php include 'layouts-frontend/header.php'; ?>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Riwayat Transaksi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Invoice</th>
                                            <th>Detail Produk</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 0;
                                            foreach($produk as $row) :
                                                $i++;
                                        ?>
                                            <tr>
                                                <td class="cart-title first-row text-center">
                                                    <h5><?php echo $row['no_invoice']?></h5>
                                                </td>
                                                <td class="cart-pic first-row text-left">
                                                        <?php 
                                                            $no=$row['no_invoice'];
                                                            $pr = ambil_data("SELECT * FROM detail_transaksi 
                                                            INNER JOIN produk on detail_transaksi.produk_id=produk.produk_id
                                                            INNER JOIN gambar_produk on detail_transaksi.produk_id=gambar_produk.produk_id
                                                            INNER JOIN model_produk on detail_transaksi.produk_id=model_produk.produk_id
                                                            WHERE gambar_utama=1 AND no_invoice='$no' ORDER BY detail_transaksi_id ASC");

                                                            foreach($pr as $pr):
                                                        ?>
                                                            <h5><?php echo $pr['nama_produk']?></h5>    
                                                            <span> Rp.<?php echo number_format($pr['harga'],2,',','.'); ?></span>
                                                            <img src="admin/upload/<?php echo $pr['gambar']?>" />
                                                        
                                                        <?php endforeach;?>
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                Rp.<?php echo number_format($row['total'],2,',','.'); ?>
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
    </div>
    <!-- Partner Logo Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
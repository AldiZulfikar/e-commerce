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
                                            <th>Status Pembayaran</th>
                                            <th>Status Pengiriman</th>
                                            <th>No.Resi</th>
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
                                                                INNER JOIN model_produk on detail_transaksi.model_id=model_produk.model_produk_id
                                                                WHERE gambar_utama=1 AND no_invoice='$no' ORDER BY detail_transaksi_id ASC");
  

                                                            foreach($pr as $pr):
                                                        ?>
                                                            <div class="card" style="width: 10rem;">
                                                                <img style="height: 10rem;" src="admin/upload/<?php echo $pr['gambar']?>" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $pr['nama_produk'];?></h5>
                                                                    <span>Model: <?php echo $pr['model'];?></span>
                                                                    <p class="card-text">Rp.<?php echo number_format($pr['harga'],2,',','.'); ?></p>
                                                                </div>
                                                            </div>                                                      
                                                        <?php endforeach;?>
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                Rp.<?php echo number_format($row['total'],2,',','.'); ?>
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <?php 
                                                    if($row['status_pembayaran']==1){
                                                        echo 'Diterima';
                                                    }else if($row['status_pembayaran']==0){
                                                        echo 'Diproses';
                                                    }else{
                                                        echo 'Tidak Valid! Silahkan Hubungi Customer Service!';
                                                    }
                                                     ?>
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <?php 
                                                    if($row['status_pengiriman']==1){
                                                        echo 'Dalam Pengiriman';
                                                    }else if($row['status_pengiriman']==0){
                                                        echo 'Dikemas';
                                                    }else{
                                                        echo 'Dikirim';
                                                    }
                                                     ?>
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <?php 
                                                    if($row['no_resi']==0){
                                                        echo 'Diproses';
                                                    }else{
                                                        echo $row['no_resi'];
                                                    }
                                                     ?>
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
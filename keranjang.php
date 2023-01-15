<?php 
	session_start();
    require 'functions.php';

    if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

    $username = $_SESSION['username'];
    
    //ambil data
    $produk = ambil_data("SELECT * FROM keranjang 
    INNER JOIN gambar_produk on keranjang.produk_id=gambar_produk.produk_id 
    INNER JOIN produk on keranjang.produk_id=produk.produk_id 
    INNER JOIN model_produk on keranjang.model_id=model_produk.model_produk_id 
    WHERE gambar_utama = 1 AND username='$username'");
    
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
                        <h2>Keranjang</h2>
                    </div>
                </div>
            </div>
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
                                            <th>Model</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <form action="./cekout.php" method="get">
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
                                                <td class="p-price first-row"> Rp.<?php echo number_format($row['harga'],2,',','.'); ?></td>
                                                <td class="cart-title first-row text-center">
                                                    <h5><?php echo $row['model']?></h5>
                                                </td>
                                                <td class="">
                                                <label class="container-check">
                                                    <input  type="checkbox" name="id[]" value="<?php echo $row['keranjang_id']?>" multiple checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                                    <a href="keranjang-delete.php?id=<?php echo $row['keranjang_id']?>" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <button class="btn primary-btn btn-block" type="submit" name="submit" >Checkout Produk</button>
                                    </div>
                                </form>
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
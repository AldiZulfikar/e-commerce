<?php 
	session_start();
    require 'functions.php';

    $username = $_SESSION['username'];
    
    $id = $_GET['id'];

    //ambil data
    $produk = ambil_data("SELECT * FROM keranjang 
    INNER JOIN gambar_produk on keranjang.produk_id=gambar_produk.produk_id 
    INNER JOIN model_produk on keranjang.produk_id=model_produk.model_produk_id
    INNER JOIN produk on keranjang.produk_id=produk.produk_id  
    WHERE gambar_utama=1 AND keranjang_id='$id'");

    $username = $_SESSION['username'];
    $user = ambil_data("SELECT * FROM users WHERE username = '$username'");

    if (isset($_POST['submit'])){
        if(tambah_transaksi($_POST) > 0){
            echo "
                <script>
                    alert('Transaksi akan diproses dalam waktu 3x24 jam, silahkan pantau detail transaksi Anda!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Transaksi Gagal');
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
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                            <table>
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th class="p-name text-center">Nama Produk</th>\
                                            <th>Model</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
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
                                            <td class="cart-title first-row text-center">
                                                <h5><?php echo $row['model']?></h5>
                                            </td>
                                            <td class="p-price first-row"><?php echo $row['harga']?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                <form action="" method="post" enctype="multipart/form-data">
                                <?php foreach($user as $row) : ?>
                                    <input type="text" hidden name="user_id" value="<?php echo $row['id']?>">
                                <?php endforeach?>
                                <?php foreach($produk as $row) : ?>
                                    <input type="text" hidden name="produk_id" value="<?php echo $row['produk_id']?>">
                                <?php endforeach?>
                                    <div class="form-group">
                                        <label for="namaLengkap">Nama Penerima</label>
                                        <input type="text" name="nama" class="form-control" id="namaLengkap" aria-describedby="namaHelp" placeholder="Masukan Nama Penerima">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaLengkap">Email Penerima</label>
                                        <input type="email" name="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Masukan Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaLengkap">No. HP</label>
                                        <input type="number" name="notel" class="form-control" id="noHP" aria-describedby="noHPHelp" placeholder="Masukan No. HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatLengkap">Alamat Lengkap</label>
                                        <textarea class="form-control" name="alamat" id="alamatLengkap" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Upload Bukti Pembayaran</label>
                                        <input type="file" accept="image/*" name="bukti_tf" class="form-control">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <?php 
                                        $i = 0;
                                        foreach($produk as $row) :
                                            $i++;
                                    ?>
                                    <li class="subtotal mt-3">Biaya Produk <span><?php echo 'Rp'.number_format($row['harga'],2,',','.');?></span></li>
                                    <li class="subtotal mt-3">Biaya Pengiriman 
                                        <span>
                                        <?php 
                                        $bp =$row['berat'] * 10000;
                                        echo 'Rp'.number_format($bp,2,',','.');
                                        ?>
                                        </span></li>
                                    <li class="subtotal mt-3">Total Biaya 
                                        <span>
                                        <?php 
                                            $t = $bp + $row['harga'];
                                            echo 'Rp'.number_format($t,2,',','.');
                                        ?>
                                        <input type="text" hidden name="total" value="<?php echo $t?>">
                                        </span>
                                    </li>
                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                    <?php endforeach;?>
                                </ul>
                                <button type="submit" name="submit" class="proceed-btn w-100">Saya sudah Membayar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <?php include 'layouts-frontend/footer.php'; ?>
    <?php include 'layouts-frontend/script.php'; ?>
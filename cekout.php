<?php 
	session_start();
    require 'functions.php';

    if(!isset($_SESSION['username'])){
        header("location:login.php");
	}
    
    if(!isset($_GET['id'])){
        header("location:index.php");
    }
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $user = ambil_data("SELECT * FROM users WHERE username = '$username'");
    if (isset($_POST['submit'])){
        if(tambah_transaksi($_POST) > 0){
            foreach($id as $id)
            {   
                delete($id);
            }
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
                        <span>Pembayran</span>
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
                                            <th class="p-name text-center">Nama Produk</th>
                                            <th>Model</th>
                                            <th>Berat</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <?php 
                                        $biaya_pengiriman_total = 0;
                                        $biaya_produk_total =0; 
                                        foreach($id as $id)
                                        {   
                                            //ambil data
                                            $produk = ambil_data("SELECT * FROM keranjang 
                                            INNER JOIN gambar_produk on keranjang.produk_id=gambar_produk.produk_id 
                                            INNER JOIN model_produk on keranjang.model_id=model_produk.model_produk_id 
                                            INNER JOIN produk on keranjang.produk_id=produk.produk_id 
                                            WHERE gambar_utama=1 AND keranjang_id='$id'");

                                            
                                            foreach($produk as $row):
                                                $biaya_produk = $row['harga'];
                                                $biaya_produk_total = $biaya_produk_total + $biaya_produk;

                                                $biaya_pengiriman = $row['berat'] * 10000;
                                                $biaya_pengiriman_total = $biaya_pengiriman_total + $biaya_pengiriman;

                                                
                                                
                                    ?>
                                                <input type="text" hidden name="produk_id[]" value="<?php echo $row['produk_id']?>">
                                                <input type="text" hidden name="model_id[]" value="<?php echo $row['model_id']?>">
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
                                                    <td class="cart-title first-row text-center">
                                                        <h5><?php echo $row['berat']?></h5>
                                                    </td>
                                                    <td class="p-price first-row"><?php echo $row['harga']?></td>
                                                </tr>
                                    <?php 
                                            endforeach;
                                
                                         }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                
                                <?php foreach($user as $row) : ?>
                                    <input type="text" hidden name="user_id" value="<?php echo $row['id']?>">
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
                                    <!-- <div class="form-group">
                                        <label for="description" class="form-control-label">Upload Bukti Pembayaran</label>
                                        <input type="file" accept="image/*" name="bukti_tf" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" required accept="image/*" name="bukti_tf" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Upload Bukti Pembayaran</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
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
                                    <li class="subtotal mt-3">Total Biaya Produk <span><?php echo 'Rp'.number_format($biaya_produk_total,2,',','.');?></span></li>
                                    <li class="subtotal mt-3">Total Biaya Pengiriman 
                                        <span>
                                        <?php 
                                        echo 'Rp'.number_format($biaya_pengiriman_total,2,',','.');
                                        ?>
                                        </span></li>
                                    <li class="subtotal mt-3">Total Biaya 
                                        <span>
                                        <?php 
                                            $t = $biaya_pengiriman_total + $biaya_produk_total;
                                            echo 'Rp'.number_format($t,2,',','.');
                                        ?>
                                        <input type="text" hidden name="total" value="<?php echo $t?>">
                                        </span>
                                    </li>
                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
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
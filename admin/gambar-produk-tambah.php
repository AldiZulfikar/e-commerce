<?php 
	session_start();
    require 'controller/gambarProdukController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    $page = "gambar";

    //ambil data
    $produk = ambil_data("SELECT * FROM produk ");
    if (isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'gambar-produk.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'gambar-produk-tambah.php';
            </script>
            ";
        }
    }
?>

<?php include '../layouts/link.php'; ?>
<body>
<!-- Sidebar -->
    <?php include '../layouts/sidebar.php'; ?>
<!-- End of Sidebar -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <?php include '../layouts/topbar.php'; ?> 

        <!-- Content Wrapper -->
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header">
                                    <strong>Tambah gambar Produk</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" required accept="image/*" name="gambar" class="custom-file-input" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Pilih gambar (rekomendasi rasio gambar 9:11)</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Pilih Jenis Produk</label>
                                            <select name="produk_id" class="form-control">
                                                <?php foreach($produk as $pr) : ?>
                                                    <option value="<?php echo $pr['produk_id']?>"><?php echo $pr['nama_produk']?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Keterangan</legend>
                                                    <div class="col-sm-10">
                                                        <div class="form-check">
                                                            <input onclick="my()" class="form-check-input" type="radio" name="gambar_utama" value="1" id="gridRadios1">
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Jadikan gambar utama
                                                            </label>
                                                            </div>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gambar_utama" value="0" id="gridRadios2">
                                                            <label class="form-check-label" for="gridRadios2">
                                                                Jangan jadikan gambar utama
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <a href="./gambar-produk.php" class="btn btn-secondary">Batal</a>
                                            <button class="btn btn-primary" type="submit" name="submit" >Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
            <!-- /.content -->
            <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <script>
        function my(){
            alert('Gambar utama adalah gambar yang akan dilihat pertama kali oleh pelanggang. Bila anda menjadikan ini sebagai gambar utama, maka gambar utama sebelumnya akan tergantikan!');
        }
    </script>
    <?php include '../layouts/script.php'; ?> 
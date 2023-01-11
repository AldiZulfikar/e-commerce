<?php 
	session_start();
    require 'controller/modelProdukController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

    //ambil data
    $produk = ambil_data("SELECT * FROM produk ");
    
    if (isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'model-produk.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'model-produk-tambah.php';
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
                                    <strong>Tambah Model Produk</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Nama Produk</label>
                                            <select name="produk_id" class="form-control">
                                                <?php foreach($produk as $pr) : ?>
                                                    <option value="<?php echo $pr['produk_id']?>"><?php echo $pr['nama_produk']?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Model</label>
                                            <input name="model" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Harga</label>
                                            <input name="harga" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Jumlah</label>
                                            <input name="jumlah" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit" name="submit" >Tambah Model Produk</button>
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
    <?php include '../layouts/script.php'; ?> 
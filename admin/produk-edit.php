<?php 
	session_start();
    require 'controller/produkController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    $id = $_GET['id'];

    //ambil data
    $produk = ambil_data("SELECT * FROM produk WHERE produk_id = '$id'");
    
    if (isset($_POST['submit'])){
        if(edit($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'produk.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'produk.php';
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
                                    <?php foreach($produk as $row) : ?>
                                    <strong>Ubah Produk - <?php echo $row['nama_produk']?></strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post">
                                            <input type="text" hidden name="user_id" value="<?php echo $row['user_id']?>">
                                            <input type="text" hidden name="produk_id" value="<?php echo $row['produk_id']?>">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Nama Produk</label>
                                            <input type="text" name="nama" value="<?php echo $row['nama_produk']?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Deskripsi Produk</label>
                                            <textarea name="deskripsi" class="ckeditor form-control"><?php echo $row['deskripsi']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit" name="submit" >Ubah Produk</button>
                                        </div>
                                        <?php endforeach ?>
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
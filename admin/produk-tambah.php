<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
require 'controller/produkController.php';
$username = $_SESSION['username'];
$user = ambil_data("SELECT * FROM users WHERE username = '$username'");

    if (isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'produk.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'produk-tambah.php';
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
                            <strong>Tambah Produk</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post">
                            <?php foreach($user as $row) : ?>
                                <input type="text" hidden name="user_id" value="<?php echo $row['id']?>">
                            <?php endforeach?>
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama Produk</label>
                                    <input type="text" required name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-control-label">Deskripsi Produk</label>
                                    <textarea name="deskripsi" class="ckeditor form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" name="submit" >Tambah Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
            <!-- /.content -->
            <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <?php include '../layouts/script.php'; ?> 
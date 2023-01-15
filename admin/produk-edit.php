<?php 
	session_start();
    require 'controller/produkController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    $id = $_GET['id'];
    $page = "produk";
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
                                            <textarea maxlength="1000" name="deskripsi" id="message" name="deskripsi" class="ckeditor form-control"><?php echo $row['deskripsi']?></textarea>
                                            <p id="characterLeft" style="width: 100%;width: 100%;text-align: right;margin-top: -30px;padding-right: 10px;color: #737373;"></p>
                                        </div>
                                        <div class="text-right">
                                            <a href="./produk.php" class="btn btn-secondary">Batal</a>
                                            <button id="btnSubmit" class="btn btn-primary" type="submit" name="submit" >Submit</button>
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
    <script>
        $(document).ready(function(){ 
            $('#characterLeft').text('1000/1000');
            $('#message').keydown(function () {
                var max = 1000;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#characterLeft').text('0/1000');
                    $('#characterLeft').addClass('red');
                    $('#btnSubmit').addClass('disabled');            
                } 
                else {
                    var ch = max - len;
                    $('#characterLeft').text(ch + ' /1000');
                    $('#btnSubmit').removeClass('disabled');
                    $('#characterLeft').removeClass('red');            
                }
            });    
        });
    </script>
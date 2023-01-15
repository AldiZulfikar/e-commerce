<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
$page = "produk";
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
                                    <textarea maxlength="250" name="deskripsi" id="message"  class="ckeditor form-control"></textarea>
                                    <p id="characterLeft" style="width: 100%;width: 100%;text-align: right;margin-top: -30px;padding-right: 10px;color: #737373;"></p>
                                </div>
                                <div class="text-right">
                                    <a href="./produk.php" class="btn btn-secondary">Batal</a>
                                    <button id="btnSubmit" class="btn btn-primary" type="submit" name="submit" >Submit</button>
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
    <script>
        $(document).ready(function(){ 
            $('#characterLeft').text('250/250');
            $('#message').keydown(function () {
                var max = 250;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#characterLeft').text('0/250');
                    $('#characterLeft').addClass('red');
                    $('#btnSubmit').addClass('disabled');            
                } 
                else {
                    var ch = max - len;
                    $('#characterLeft').text(ch + ' /250');
                    $('#btnSubmit').removeClass('disabled');
                    $('#characterLeft').removeClass('red');            
                }
            });    
        });
    </script>
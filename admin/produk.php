<?php 
	session_start();
    require 'controller/produkController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    //ambil data
    $produk = ambil_data("SELECT * FROM produk INNER JOIN users on produk.user_id=users.id ORDER BY produk_id DESC");
    
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
                                <strong class="card-title">Tabel Produk</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pembuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($produk as $row) :
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['nama_produk']?></td>
                                            <td><?php echo $row['nama']?></td>
                                            <td>
                                                <a href="lihat-gambar-produk.php?id=<?php echo $row['produk_id']?>&nama-produk=<?php echo $row['nama_produk']?>" class="btn btn-info btn-sm">
                                                    <i class="fa fa-picture-o"></i>
                                                </a>
                                                <a href="lihat-model-produk.php?id=<?php echo $row['produk_id']?>&nama-produk=<?php echo $row['nama_produk']?>" class="btn btn-warning btn-sm">
                                                    <i class="ti-layout-grid2"></i>
                                                </a>
                                                <a href="produk-edit.php?id=<?php echo $row['produk_id']?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="produk-delete.php?id=<?php echo $row['produk_id']?>" method="post" class="d-inline">
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
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
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>
</body>

</html>
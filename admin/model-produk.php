<?php 
	session_start();
    require 'controller/modelProdukController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    //ambil data
    $produk = ambil_data("SELECT * FROM model_produk INNER JOIN produk on model_produk.produk_id=produk.produk_id ORDER BY model_produk_id DESC");
    
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
                                <strong class="card-title">Tabel Model Produk</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Model</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
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
                                            <td><?php echo $row['model']?></td>
                                            <td><?php echo $row['harga']?></td>
                                            <td><?php echo $row['jumlah']?></td>
                                            <td>
                                                <form action="model-produk-delete.php?id=<?php echo $row['model_produk_id']?>" method="post" class="d-inline">
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
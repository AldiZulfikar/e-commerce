<?php 
	session_start();
    require 'controller/produkController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    //ambil data
    $transaksi = ambil_data("SELECT * FROM detail_transaksi 
    INNER JOIN users on detail_transaksi.user_id=users.id
    INNER JOIN produk on detail_transaksi.produk_id=produk.produk_id
    INNER JOIN transaksi on detail_transaksi.no_invoice=transaksi.no_invoice
    ORDER BY detail_transaksi_id DESC");
    
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
                                <strong class="card-title">Tabel Detail Transaksi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Total Harga</th>
                                            <th>Pembeli</th>
                                            <th>Alamat</th>
                                            <th>Pembayaran</th>
                                            <th>Pengiriman</th>
                                            <th>No.Resi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($transaksi as $row) :
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['nama_produk']?></td>
                                            <td><?php echo $row['total']?></td>
                                            <td><?php echo $row['nama']?></td>
                                            <td>
                                                <?php 
                                                    echo 
                                                        $row['alamat']
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                                                <i class="fa fa-picture-o"></i>
                                            </button>
                                            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra
                                                                and the mountain zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus
                                                                Dolichohippus. The latter resembles an ass, to which it is closely related, while the former two are more
                                                                horse-like. All three belong to the genus Equus, along with other living equids.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php 
                                                    if($row['status_pembayaran']==1){
                                                        echo '<br>Pembayaran Selesai';
                                                    }else{
                                                        echo '<br>Diproses';
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                            <button type="button" class="btn btn-secondary m-1" data-toggle="modal" data-target="#smallmodal">
                                                <i class="fa fa-picture-o"></i>
                                            </button>
                                            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra
                                                                and the mountain zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus
                                                                Dolichohippus. The latter resembles an ass, to which it is closely related, while the former two are more
                                                                horse-like. All three belong to the genus Equus, along with other living equids.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php 
                                                    if($row['status_pengiriman']==0){
                                                        echo 'Dikemas';
                                                    }else if ($row['status_pengiriman']==1){
                                                        echo 'Dalam Pengiriman';
                                                    }else{
                                                        echo 'Dikirim';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#smallmodal">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <?php 
                                                    if($row['no_resi']==0){
                                                        echo 'Kosong';
                                                    }else{
                                                        echo $row['no_resi'];
                                                    }
                                                ?>
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
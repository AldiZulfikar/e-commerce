<?php 
	session_start();
    $page = "transaksi";
    require 'controller/transaksiController.php';
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

    $transaksi = ambil_data("SELECT * FROM transaksi 
        ORDER BY transaksi_id DESC");
    
    if (isset($_POST['submit-pembayaran'])){
        if(edit_pembayaran($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'transaksi.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'transaksi.php';
            </script>
            ";
        }
    }

    if (isset($_POST['submit-pengiriman'])){
        if(edit_pengiriman($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'transaksi.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'transaksi.php';
            </script>
            ";
        }
    }

    if (isset($_POST['submit-resi'])){
        if(edit_resi($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'transaksi.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'transaksi.php';
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
                                <strong class="card-title">Tabel Detail Transaksi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Total</th>
                                            <th>Pembeli</th>
                                            <th>No.Invoice</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
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
                                            <td>
                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#<?php echo $row['no_invoice']?>-produk">
                                                    Lihat daftar produk
                                                </button>
                                            <div class="modal fade" id="<?php echo $row['no_invoice']?>-produk" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="smallmodalLabel">Daftar Produk yang dibeli <?php echo $row['nama_penerima']?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php 
                                                                    $invoice = $row['no_invoice'];
                                                                        $produk = ambil_data("SELECT * FROM detail_transaksi 
                                                                        INNER JOIN produk on detail_transaksi.produk_id=produk.produk_id
                                                                        WHERE no_invoice='$invoice'");
                                                                        foreach($produk as $p) :
                                                                    ?>
                                                                    <p>- <?php echo $p['nama_produk']?></p>
                                                                    <?php endforeach;?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td><?php echo $row['total']?></td>
                                            <td><?php echo $row['nama_penerima']?></td>
                                            <td><?php echo $row['no_invoice']?></td>
                                            <td>
                                                <?php 
                                                    echo 
                                                        $row['alamat']
                                                ?>
                                            </td>
                                            <td><?php echo $row['created_at']?></td>
                                            <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#<?php echo $row['no_invoice']?>-pembayaran">
                                                <i class="fa fa-picture-o"></i>
                                            </button>
                                            <div class="modal fade" id="<?php echo $row['no_invoice']?>-pembayaran" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="smallmodalLabel">Bukti Pembayaran <?php echo $row['nama_penerima']?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="../upload/<?php echo $row['bukti_tf']?>" alt="">
                                                                <label for="">Ubah Status Pembayaran</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="0">Diproses</option>
                                                                    <option value="1">Diterima</option>
                                                                    <option value="2">Tidak Valid</option>
                                                                </select>
                                                                <input type="text" hidden name="no_invoice" value="<?php echo $row['no_invoice']?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="submit-pembayaran" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php 
                                                    if($row['status_pembayaran']==1){
                                                        echo '<br>Pembayaran Selesai';
                                                    }else if($row['status_pembayaran']==2){
                                                        echo '<br>Tidak Valid';
                                                    }else{
                                                        echo '<br>Diproses';
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                            <button type="button" class="btn btn-secondary m-1" data-toggle="modal" data-target="#<?php echo $row['no_invoice']?>-pengiriman">
                                                <i class="fa fa-picture-o"></i>
                                            </button>
                                            <div class="modal fade" id="<?php echo $row['no_invoice']?>-pengiriman" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="smallmodalLabel">Status Pengiriman <?php echo $row['nama_penerima']?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">Ubah Status Pengiriman</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="0">Dikemas</option>
                                                                    <option value="1">Dalam Pengiriman</option>
                                                                    <option value="2">Dikirim</option>
                                                                </select>
                                                                <input type="text" hidden name="no_invoice" value="<?php echo $row['no_invoice']?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="submit-pengiriman" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php 
                                                    if($row['status_pengiriman']==0){
                                                        echo '<br>Dikemas';
                                                    }else if ($row['status_pengiriman']==1){
                                                        echo '<br>Dalam Pengiriman';
                                                    }else{
                                                        echo '<br>Dikirim';
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#<?php echo $row['no_invoice']?>-no-resi">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <div class="modal fade" id="<?php echo $row['no_invoice']?>-no-resi" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="smallmodalLabel">Bukti Pengiriman <?php echo $row['nama_penerima']?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">Masukan No Resi Penerima</label>
                                                                <input type="text" name="resi">
                                                                <input type="text" hidden name="no_invoice" value="<?php echo $row['no_invoice']?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="submit-resi" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php 
                                                    if($row['no_resi']==0){
                                                        echo '<br>Kosong';
                                                    }else{
                                                        echo '<br>'.$row['no_resi'];
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
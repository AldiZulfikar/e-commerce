<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
    require 'controller/produkController.php';
    $page ="Home";

    $penghasilan = ambil_data("SELECT * FROM transaksi WHERE status_pembayaran=1");
    $total_penjualan = ambil_data("SELECT COUNT(transaksi_id) as total_penjualan FROM transaksi WHERE status_pembayaran=1");
    $total_pelanggan = ambil_data("SELECT COUNT(id) as total_pelanggan FROM users WHERE level='user'");
    $hasil = 0;
    foreach($penghasilan as $penghasilan){
        $hasil = $hasil + $penghasilan['total'];
    }
    foreach($total_penjualan as $total_penjualan){
        $total_penjualan = $total_penjualan['total_penjualan'];
    }
    foreach($total_pelanggan as $total_pelanggan){
        $total_pelanggan = $total_pelanggan['total_pelanggan'];
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
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">Selamat Datang!</span></div>
                                            <div class="stat-heading">Admin Aldrin Jaya Steel</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">Rp. <span class="count"><?php echo number_format($hasil,2,',','.');?></span></div>
                                            <div class="stat-heading">Penghasilan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_penjualan;?></span></div>
                                            <div class="stat-heading">Penjualan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_pelanggan;?></span></div>
                                            <div class="stat-heading">Pelanggan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  /Traffic -->
                <div class="clearfix"></div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <?php include '../layouts/script.php'; ?> 
</body>

</html>
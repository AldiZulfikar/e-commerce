<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if($page == "Home") echo "class='active'";?>>
                        <a href="index.php"><i class="menu-icon fa fa-list"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="../index.php"><i class
                            ="menu-icon fa fa-laptop"></i>Lihat Website </a>
                    </li>
                    <li <?php if($page == "pelanggan") echo "class='active'";?>>
                        <a href="user.php"><i class
                            ="menu-icon fa fa-book"></i>Data Pelanggan </a>
                    </li>
                    <li class="menu-title">Produk</li><!-- /.menu-title -->
                    <li <?php if($page == "produk") echo "class='active'";?>>
                        <a href="produk.php"> <i class="menu-icon fa fa-list"></i>Jenis Produk</a>
                    </li>
                    <li <?php if($page == "detail") echo "class='active'";?>>
                        <a href="model-produk.php"> <i class="menu-icon fa fa-list"></i>Detail Produk</a>
                    </li>
                    <li <?php if($page == "gambar") echo "class='active'";?>>
                        <a href="gambar-produk.php"> <i class="menu-icon fa fa-list"></i>Gambar Produk</a>
                    </li>

                    <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                    <li <?php if($page == "transaksi") echo "class='active'";?>>
                        <a href="transaksi.php"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
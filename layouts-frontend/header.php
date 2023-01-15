    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i> aldrinjayasteel@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i> +628 22081996
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="assets-frontend/img/logo_website_shayna.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7"></div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                            <?php 
                                if(!isset($_SESSION['username'])){
                                    echo "<a href='./login.php'>Masuk <i class='fa fa-sign-in' aria-hidden='true'></i></a>";
                            ?>   
                            </li>
                            <?php
                                }else{ 
                                    $username = $_SESSION['username'];
                                    $user = ambil_data("SELECT * FROM users WHERE username = '$username'");
                            ?> 
                            <li class="cart-icon">
                                <?php 
                                    foreach($user as $row):
                                        echo $row['nama'];
                                    endforeach;
                                ?>
                                <a href="#">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <a href="./keranjang.php">
                                                                <h6><i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang</h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <a href="./riwayat-transaksi.php">
                                                                <h6><i class="fa fa-truck" aria-hidden="true"></i> Pesanan Saya</h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <a href="./logout.php">
                                                                <h6><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <!-- <li class="cart-icon">
                                <a href="./keranjang.php">
                                    <i class="icon_bag_alt"></i>
                                </a>
                            </li> -->
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
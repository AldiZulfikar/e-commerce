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
                        <i class=" fa fa-envelope"></i> aldrijayasteel@gmail.com
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
                                    echo "<a href='./login.php'>Masuk <i class='icon_bag_alt'></i></a>";
                            ?>   
                            </li>
                            <?php
                                }else{ 
                            ?> 
                            <li class="cart-icon">
                                Keranjang Belanja &nbsp;
                                <a href="./keranjang.php">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
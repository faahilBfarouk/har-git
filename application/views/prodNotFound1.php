<?php require_once 'Head.php'; ?>
<body>
    <!-- /.preloader -->
    <div id="preloader"></div>

    <div class="theme-layout">
                
    <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>  
        <div class="inner-head overlap">
            <div style="background: url(<?= base_url("Themes/cars/dark/") ?>img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->	
            <div class="container">
                <div class="inner-content">
                    <span><i class="fa fa-bolt"></i></span>
                    <h2>Product Not Available</h2>
                    <ul>
                        <li><a href="<?= base_url() ?>" title="">HOME</a></li>
                        
                    </ul>
                </div>
            </div>
        </div><!-- inner Head -->
        <section class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-sec">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="error-not-found style2">
                                        <span>Sorry the Page you are looking fot does not exist here</span>
                                        <h3>Product Not Available!</h3>
                                        <h4>You can Explore Our Website Back <br/>to the Navigation Below</h4>
                                        <ul>
                                            <li><a href="<?= base_url() ?>" title="">HOME</a></li>
                                            <li><a href="#" title="">vehiculs</a></li>
                                            <li><a href="#" title="">ABOUT</a></li>
                                            <li><a href="#" title="">CONTACT</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once 'Footer.php'; ?>

    </div>

    <!-- Script -->
    <?php require_once 'Scripts.php'; ?>

</body>
<?php require_once 'ClosingTag.php'; ?>
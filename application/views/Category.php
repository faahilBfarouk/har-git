
<?php require_once 'Head.php'; ?>
<body>
    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>
        <div class="inner-head overlap">
            <!--image below navbar -->
            <div style="background: url(<?= base_url("Themes/cars/dark/") ?>img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->	
            <!--Text on the Image -->
            <div class="container">
                <div class="inner-content">
                    <span><i class="fa fa-bolt"></i></span>
                    <h2>VEHICULS - LIST STYLE 3 </h2>
                    <ul>
                        <li><a href="index.html" title="">HOME</a></li>
                        <li><a href="vehiculs3.html" title="">VEHICULS- LIST STYLE 3 </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php require_once 'Horizontalsearch.php'; ?>
        <br>  <br>
        <section class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-sec">
                            <div class="row">
                                <?php foreach ($results as $product): ?>
                                <div class="col-md-6">
                                    <div class="vehicul-post">
                                        <div class="vehicul-thumb">
                                            <img src="<?=base_url('Themes/cars/dark/'.$product->inventory_image_url)?>" alt="" />
                                            <div class="vehicul-post-detail">
                                                <h2><a href="#" title=""><?=$product->Inventory_name ?></a></h2>
                                                <!-- Price Disabled
                                                <h2 class="price"> 300000 $  </h2>
                                                <span><i class="fa fa-calendar-o"></i> 10 December 2016</span>
                                                -->
                                                <p><?=$product->Inventory_description ?></p>
                                                <a href="#" title="" class="vehicul-more">Details </a>
                                            </div>
                                        </div>
                                        <div class="vehicul-agent">
                                            <a href="agent3.html" title="">
                                                <img src="<?=base_url('Themes/cars/dark/')?>img/3.png" alt="" />
                                                <h3>KwitaraCars y</h3>
                                                <span>Posted by <i>Agent Flwo</i></span>
                                            </a>
                                        </div>
                                    </div><!-- Blog Post -->
                                </div> 
                                <?php endforeach; ?>
                            </div>
                            
                                <?php echo $links; ?>
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once 'Footer.php'; ?>
    </div>
    <?php require_once 'Scripts.php'; ?>
</body>
<?php require_once 'ClosingTag.php';
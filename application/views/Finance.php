<?php require_once 'Head.php'; ?>
<body>

    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        
        
    <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>     
        <?php require_once 'onePicSliderTop.php'; ?> 
        Maruthi Finance
        <?php require_once 'onePicSliderBottom.php'; ?> 
        <?php require_once 'floatingDockTop.php'; ?> 
                                    Claim Your Dream Car With The Most Generous Financers
                                    <?php require_once 'floatingDockBottom.php'; ?> 
                                        
        <section class="block">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">	
                        <div class="row">
                            
                            <div class="col-md-12 column">
                                <div class="single-post-sec">
                                    <div class="blog-post">
                                    
                                    <?php foreach ($title as $titles): ?> 
                                    <h1><?=$titles['title1'] ?>
                                    <br>
                                    </h1>
                                    
                                        <p><?=$titles['desc1'] ?></p>
                                        <blockquote>
                                            <p><?=$titles['attractiveTitle'] ?></p>
                                            <span>Courtesy Of : <a href="#" title="">HAR Cars</a></span>
                                        </blockquote>
                                        <p><?=$titles['desc2'] ?></p>
                                        <?php endforeach; ?>
                        
                                    </div><!-- Blog Post -->
                                </div><!-- Blog POst Sec -->
                            </div>
                        </div>
                   <!-- Comment -->
                    </div>
                </div>
            </div>
        </section>

       <?php require_once 'Footer.php'; ?>
    </div>
    <?php require_once 'Scripts.php'; ?>
</body>
<?php require_once 'ClosingTag.php'; ?>
<?php require_once '1-head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once '2-nav-bar.php'; ?>
        <div id="page-wrapper" class="gray-bg">
            <?php require_once '3-row-bottom.php'; ?>
            <?php require_once '4-bread-crumb.php'; ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">                        
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2 class="text-danger"><b>Error In Validation</b></h2>
                            </div >
                            <div class="ibox-content text-danger">
                                <h3><b><?= $error; ?></b></h3>
                            </div>
                            <div class="ibox-content text-center text-primary">
                                <h5><b>Please navigate using NavBar</b></h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once '5-footer.php'; ?>
        </div>
    </div>
    <!-- Mainly scripts -->
    <?php require_once '6-scripts.php'; ?>
    <!-- Page-Level Scripts -->


</body>

</html>




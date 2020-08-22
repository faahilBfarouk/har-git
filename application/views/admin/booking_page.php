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
                    <!-- body goes here in --> 
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Available Chassis Numbers</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>


                                </div>
                            </div >
                            <div class="ibox-content text-center">

                                <div class="table-responsive">
                                    <table class="table dataTable table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Chassis</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-w-m btn-success">Book</button>
                                <button type="button" class="btn btn-w-m btn-danger">Create Demand</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <script src="<?= ADMINTHEME ?>scripts/populate.js"></script>
    

    <!--call your extra js file inside script tag -->
</body>
</html>
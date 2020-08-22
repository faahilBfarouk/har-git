<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/select2/select2.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
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
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>View And Edit Stock</h5>
                                <div class="row">                         
                                    <div class="col-md-6">
                                        <h2>View And Edit Stock</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row"> <!-- Date input -->

                                            <div class="col-md-1"><span class = "input-group-addon">Date</span></div >
                                            <div class="col-md-11">                                            
                                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" autocomplete="off"/>
                                            </div>                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-default btn-circle" id="search" type="button"><i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Stock ID
                                                </th>
                                                <th>MUL INV DATE
                                                </th>
                                                <th>MODEL
                                                </th>
                                                <th>Variant
                                                </th>
                                                <th>MODEL CODE
                                                </th>
                                                <th>COLOR
                                                </th>
                                                <th>COLOR CODE
                                                </th>
                                                <th>MODEL YEAR
                                                </th>
                                                <th>CHASSIS NO
                                                </th>
                                                <th>ENGINE NO
                                                </th>
                                                <th>CHASSIS CODE
                                                </th>
                                                <th>AGEING
                                                </th>
                                                <th>STOCK_LOCATION
                                                </th>
                                                <th>STATUS
                                                </th>
                                                <th>Transaction Num
                                                </th>
                                                <th>INVOICE NUM
                                                </th>
                                                <th>REMARKS
                                                </th>
                                                <th>Stock_Added_Time
                                                </th>
                                                <th>Stock_Updated_Time
                                                </th>
                                                <th>Edit
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="stockEditBody">
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->
    <script src="<?= ADMINTHEME ?>js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <!-- Input Mask-->
    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/demo.js"></script>


</body>
</html>

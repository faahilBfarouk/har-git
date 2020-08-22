<?php require_once '1-head.php'; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<!-- EXTRA CSS HERE  --> 
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
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <h2>Filter And View Stock</h2>
                                    </div>
                                    <div class="col-md-1">
                                        <h3>Choose </h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control filter" style="color:success" name="statusFilter" id="statusFilter">
                                            </select>
                                        </div>   
                                    </div>
                                </div >
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table class="table dataTable table-bordered table-hover dataTables-example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Model Name
                                                    </th>
                                                    <th>Quantity 
                                                    </th>
                                                    <th>Variants                                                        
                                                    </th>
                                                    <th>Color                                                        
                                                    </th>
                                                    <th>Location                                                        
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="freeStockBody">
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal fade" id="varSplitModal" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Split Up</h4>
                            </div>
                            <div class="modal-body text-left">

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Variants
                                            </th>
                                            <th>
                                                Qty
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="varSplitTableBody">
                                        
                                    </tbody>
                                </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal inmodal fade" id="colourModal" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Split up</h4>
                            </div>
                            <div class="modal-body colourModalDiv">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Colour</th>
                                            <th> Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody id="colourModalTableBody">

                                    </tbody>
                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal fade" id="locStatModal" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Split up</h4>
                            </div>
                            <div class="modal-body locStatModalDiv">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Loc/Status</th>
                                            <th> Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody id="locStatModalTableBody">
                                        <tr>
                                            <td>
                                                OK
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                TVP
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                DMS
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Transit
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Free
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                PDI_Hold
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

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

    <script src="<?= ADMINTHEME ?>scripts/target.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
   <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
        <script src="<?= ADMINTHEME ?>scripts/freeStock.js"></script>


</body>
</html>

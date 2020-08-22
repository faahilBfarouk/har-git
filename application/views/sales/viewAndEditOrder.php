<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/select2/select2.min.css" rel="stylesheet">

</head>
<body>
    <style>
        .select2-close-mask{
            z-index: 2099;
        }
        .select2-dropdown{
            z-index: 3051;
        }
    </style>
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
                                    <div class="col-md-4">
                                        <h2>View And Edit Order</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row"> 
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <span class = "input-group-addon">Date</span>
                                                        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" id="search" type="button">Search</button>
                                            </div>
                                        </div> 
                                    </div>


                                </div>
                            </div >
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Booking ID
                                                </th>
                                                <th>Product Code
                                                </th>
                                                <th>Chassis Number
                                                </th>
                                                <th>Booked Colour
                                                </th>
                                                <th>Colour CODE
                                                </th>
                                                <th>Order Number
                                                </th>
                                                <th>If Marked Date
                                                </th>
                                                <th>If Allotted Date
                                                </th>
                                                <th>If Invoiced Date
                                                </th>
                                                <th>If Billed Date
                                                </th>
                                                <th>If Delivered Date
                                                </th>

                                                <th>Customer Name
                                                </th>
                                                <th>Cash Paid
                                                </th>
                                                <th>DSE ID
                                                </th>
                                                <th>STATUS
                                                    
                                                </th>
                                                <th>Contact
                                                </th>
                                                <th>Edit
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="bookingEditBody">
                                            <tr>
                                                <td>
                                                    <button class="btn btn-success" name="editStockBtn[]"id="editStockBtn_1" data-toggle="modal" data-target="#myModal5" type="button">Edit</button>
                                                    <button class="btn btn-success" name="editStockBtn[]"id="editStockBtn_1" data-toggle="modal" data-target="#myModal5" type="button">Edit</button>
                                                    <button class="btn btn-success" name="editStockBtn[]"id="editStockBtn_1" data-toggle="modal" data-target="#myModal5" type="button">Edit</button>

                                                </td>
                                            </tr>

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

            <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Edit Stock</h4>
                        </div>
                        <div class="modal-body text-center">
                            <form method="post" name="editBook" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Order Num </label>
                                    <div class="col-sm-10">
                                        <input type="text" style=" width: 150px !important;" class="orderNum" required="required" name="orderNum"id="orderNum"  > 

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Customer Name </label>

                                        <div class="col-sm-10">
                                            <input style=" width: 150px !important;" type="text" class="custName" required="required" id="custName" name="custName" placeholder="123345" required="required" > <!-- Number -->  

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cash Paid </label>

                                        <div class="col-sm-10">
                                            <input style=" width: 150px !important;" type="text" class="cashPaid" required="required" name="cashPaid" id="cashPaid" placeholder="232" required="required" >  <!-- Number -->  

                                        </div>
                                    </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveBookingChanges">Save changes</button>
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

<script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/select2/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
<script src="<?= ADMINTHEME ?>scripts/viewEditBooking.js"></script>
</body>
</html>

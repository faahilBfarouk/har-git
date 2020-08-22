<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/select2/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
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
                                        <h2>View And Edit Stock</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Date input -->
                                        <div class="row"> 
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <span class = "input-group-addon">From</span>
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

                                    <table class="table dataTable table-bordered table-hover dataTables-example" id="stocktable">
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
                <form method="post" action="<?= ADMINURL ?>sales/editStock" name="editStock" id="editStock" class="editStock form-horizontal">

                    <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Edit Stock</h4>
                            </div>
                            <div class="modal-body">
                                
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Engine Num </label>

                                    <div class="col-lg-10">
                                        <input style=" width: 300px !important;" type="text" class="form-control engineNo" required="required" id="engineNo" name="engineNo" placeholder="234234" required="required" >  <!-- Number -->  

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Chassis Code </label>

                                    <div class="col-lg-10">
                                        <input style=" width: 300px !important;" type="text" class="form-control chasisCode" required="required" id="chasisCode" name="chasisCode" placeholder="KG"  >   <!-- Text -->  

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Ageing </label>

                                    <div class="col-lg-10">
                                        <input style=" width: 300px !important;" type="text" class="form-control ageing" required="required" name="ageing" id="ageing" placeholder="232" required="required" >  <!-- Number -->  

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Location </label>

                                    <div class="col-lg-10">
                                        <select style=" width: 300px !important;" class="form-control location select2 selectbox" required="required" name="location" id="location" required="required">

                                        </select>                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Status </label>

                                    <div class="col-lg-10">
                                        <select style=" width: 300px !important;" name="Stockstatus" class="form-control status select2 selectbox" required="required" id="Stockstatus">


                                        </select>                                       
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Remarks </label>

                                    <div class="col-lg-10">
                                        <input style=" width: 300px !important;" type="text" class="form-control remarks" name="remarks"  placeholder="remarks" id="remarks"  >
                                        <input type="hidden" class="stockId" name="stockId" id="stockId"  >
                                        <input type="hidden" class="colorName" name="colorName" id="colorName"  >                                     
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit"id="updateButton" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->
    <script src="<?= ADMINTHEME ?>js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js" ></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/viewEditStock.js"></script>
    
</body>
</html>

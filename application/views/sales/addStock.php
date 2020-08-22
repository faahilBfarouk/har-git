<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/select2/select2.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
</head>
<body>
    <style>
        table, tr, td {
            width: 70px;
        }
        .select2-container {
            width: 200px !important;
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
                        <form action="<?= ADMINURL ?>sales/insertStock" method="post" class="addStockFrm" enctype="multipart/form-data" name="addStockFrm"id="addStockFrm"> 
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">                         
                                        <div class="col-md-3">
                                            <h2>Add Stock</h2>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row" id="data_report_fromDiv">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">MUL INV DATE</span>
                                                    <input type="text" name="invDate" class="form-control invDate" autocomplete="off" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <div class="form-group row">
                                                <label class="col-form-label">Txn No</label>
                                                <div class="col-sm-8">
                                                    <input type="number"  id="txnNo" name="txnNo" class="form-control txnNo" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div >
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <!--                                            <div class="custom-file">
                                                                                            <input  type="file" name="upload_file" required="required" class="custom-file-input" id="custom-file-input">
                                                                                            <label for="custom-file-input" class="custom-file-label">Choose file...</label>
                                                                                        </div> -->
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success"  data-toggle="modal" data-target="#addStockExcel" type="button">Upload Using Excel</button>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="text-center">OR Use The Form </div>
                                </div>

                                <div class="ibox-content text-center">
                                    <div class="table-responsive">
                                        <table class="table dataTable table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
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
                                                    <th>LOCATION
                                                    </th>
                                                    <th>STATUS
                                                    </th>
                                                    <th>INVOICE
                                                    </th>
                                                    <th>REMARKS
                                                    </th>
                                                    <th>OPTIONS
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="stockBody">
                                                <tr>
                                                    <td>
                                                        <select style=" width: 200px !important;" name="selectModel[]" class="selectModel select2 selectModel required_1" id="selectModel_1" required="required">
                                                            <option>Select Model</option> 
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select style=" width: 200px !important;" name="selectVariant[]" class="selectVariant select2 required_1" id="selectVariant_1" required="required">
                                                            <option>Select Variant</option> 

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="modelCode required_1" name="modelCode[]"id="modelCode_1" placeholder="Model Code" readonly="readonly" required="required" > 
                                                    </td>
                                                    <td>
                                                        <select style=" width: 200px !important;" name="color[]" class="color select2 required_1" id="color_1"required="required" >
                                                            <option>Color</option> 

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="colorCode required_1" id="colorCode_1" name="colorCode[]" placeholder="ZHJ (code)" readonly="readonly"required="required" > 
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="model required_1" id="model_1" name="model[]" placeholder="2020" required="required" >  <!-- Number -->  
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="chasisNo required_1"id="chasisNo_1" name="chasisNo[]" placeholder="123345" required="required" > <!-- Number -->  
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="number" class="engineNo required_1" id="engineNo_1" name="engineNo[]" placeholder="234234" max="9999999" required="required" >  <!-- Number -->  
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="chasisCode required_1" id="chasisCode_1" name="chasisCode[]" placeholder="KG"  >   <!-- Text -->  
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="ageing required_1" name="ageing[]" id="ageing_1" placeholder="232" required="required" >  <!-- Number -->  
                                                    </td>
                                                    <td>
                                                        <select style=" width: 200px !important;" class="location select2 required_1" name="location[]" id="location_1" required="required">
                                                            <option value="0">Location</option> 
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select style=" width: 200px !important;" name="status[]" class="status select2 required_1" id="status_1" required="required" >
                                                            <option value="0">Status</option> 

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="ENUINV required_1" name="ENUINV[]"  placeholder="232" id="ENUINV_1" required="required" >  <!-- Number -->  
                                                    </td>
                                                    <td>
                                                        <input style=" width: 200px !important;" type="text" class="remarks" name="remarks[]"  placeholder="remarks" id="remarks_1"  >
                                                        <input type="hidden" class="colorName" name="colorName[]" id="colorName_1"  >
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success addRow dim " name="addRow"id="addRow_1" type="button"><i class="fa fa-plus"></i></button>
                                                        <button class="btn btn-danger delete dim " name="delete" id="delete_1" type="button"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ibox-content" align="center">
                                    <div class="btn-group">
                                        <button class="btn btn-white" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal inmodal"  id="addStockExcel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Add</h4>
                        </div>
                        <div class="modal-body text-center">
                            <form id="upload" method="post" name="upload"action="<?= ADMINURL?>PhpspreadsheetController/list_data" enctype="multipart/form-data">
                                <div class="custom-file">
                                    <input  type="file" name="upload_file" required="required" class="custom-file-input" id="custom-file-input">
                                    <label for="custom-file-input" class="custom-file-label">Choose file...</label>
                                </div>
                                <div class="form-group row">
                                    <input type="number" name="starting_row" placeholder="Starting Row Number eg: 1" class="form-control" min="1" id="start" required="required" >
                                </div>


                                <div class="form-group row">
                                    <select class="form-control headerOpt" style="color:success" name="headerOpt" required="required">
                                        <option value="">Header Option</option>
                                        <option value="0">Header Excluded</option>
                                        <option value="1">Header Included</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <select class="form-control sheetDrop" style="color:success" name="sheetName" required="required">
                                        <option value="">Select Sheet Name</option>
                                        <option value="stock">stock</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <select class="form-control repDrop" style="color:success" name="repName" required="required">
                                        <option value="stock">Stock Data</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <input type="number" name="ending_row" placeholder="Ending Row" class="form-control" min="1" id="end"required="required">
                                </div>                           
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-primary"  id="addInventExcelBtn" value="Add">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->
    <script>
        $(document).on("change", "#custom-file-input", function (e) {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

    </script>

    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>

    <script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/select2/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/nestable/jquery.nestable.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/addStock.js"></script>
</body>
</html>
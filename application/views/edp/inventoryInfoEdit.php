<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <!-- body goes here in --> 
                    <div class="col-sm-12">
                        <div class="ibox">

                            <div class="ibox-title">
                                <h2>Inventory Hub</h2>  

                            </div>
                            <div class="ibox-content text-center">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i>Maruthi Inventory</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Colour Matrix</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i>Add To Maruthi Inventory</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i>Add To Colour Matrix</a></li>



                                    </ul>
                                    <div class="tab-content">

                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Inventory </h3>  
                                                        <small>All The Models Of Maruthi</small>
                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wraspper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 

                                                                    <?php if (!empty($data['I'])) { ?>
                                                                        <?php foreach ($headers['I'] as $k => $v): ?>
                                                                            <th><?= $v ?>
                                                                            </th>

                                                                        <?php endforeach; ?>

                                                                        <th>Edit</th>
                                                                    <?php } ?>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">
                                                                <?php if (!empty($data['I'])) { ?>

                                                                    <?php foreach ($data['I'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td>
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>
                                                                            <td>
                                                                                <button class="btn btn-success inventoryEditBtn" name="inventoryEditBtn" data-toggle="modal" data-id="<?= $value['inventory_id'] ?>" data-target="#inventModal" type="button">Edit</button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                                <button class="btn btn-success" id="inventoryEditBtn1" data-toggle="modal" data-id='blah' data-target="#inventModal" type="button">Edit</button>

                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="inventModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit</h4>
                                                    </div>
                                                    <form method="post" name="editStock" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                                        <div class="modal-body text-center">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Product Code</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="lcoation" required="required" name="prodCOde" id="prodCOde" required="required" > 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Model Name</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="lcoation" required="required" name="modelName" id="modelName" required="required" > 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Variant</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="lcoation" required="required" name="variantName" id="variantName" required="required" > 
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <input type="hidden" name="table" id="tableInv" value='inventory_table'>
                                                        <input type="hidden" name="ID" id="inventoryID">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" id="saveChanges" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Colour Matrix  </h3>  

                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 

                                                                    <?php if (!empty($data['C'])) { ?>
                                                                        <?php foreach ($headers['C'] as $k => $v): ?>
                                                                            <th><?= $v ?>
                                                                            </th>

                                                                        <?php endforeach; ?>

                                                                        <th>Edit</th>
                                                                    <?php } ?>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">
                                                                <?php if (!empty($data['C'])) { ?>

                                                                    <?php foreach ($data['C'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td>
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>
                                                                            <td>
                                                                                <button class="btn btn-success colEditBtn" name="colEditBtn" data-toggle="modal" data-id="<?= $value['model_color_id'] ?>" data-target="#colModal" type="button">Edit</button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="colModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit</h4>
                                                    </div>
                                                    <form method="post" name="editStock" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">

                                                        <div class="modal-body text-center">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Product Code</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="prodCodeColour" required="required" name="prodCodeColour" id="prodCodeColour" required="required" > 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Colour Name</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="colourName" required="required" name="colourName" id="colourName" required="required" > 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Colour Code</label>
                                                                <div class="col-sm-10">
                                                                    <input autocomplete='off' type="text" style=" width: 150px !important;" class="colourCode" required="required" name="colourCode" id="colourCode" required="required" > 
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="table" id="tableCol" value='model_color_matrix'>
                                                            <input type="hidden" name="ID" id="colourID">


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" value="Save">
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox" style="">
                                                        <div class="ibox-title">
                                                            <div class="row text-center">
                                                                <div class="col-md-12 "> <h3>Add To Colour Matrix</h3></div>
                                                            </div>
                                                        </div>
                                                        <div class="ibox-content">
                                                            <div class="row text-center">
                                                                <div class="col-md-5 border">
                                                                    <br>
                                                                    <form method="post" name="editStock" action="<?= ADMINURL ?>edp/addRep" class="form-horizontal">

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Product Code</label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' type="text"id="prodCodeEnter" name="prodCodeEnter" placeholder="Prod Code" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Model Name</label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' autocomplete='off' type="text" id="modelNameEnter" name="modelNameEnter" placeholder="Model Name" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Variant </label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' autocomplete='off' type="text" id="variantEnter" name="variantEnter" placeholder="Variant " class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="table" id="tableinvAdd" value='inventory_table'>
                                                                        <div class="hr-line-dashed"></div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <button class="btn btn-primary" name="addInventoryBtn" id="addInventoryBtn" type="submit">Add Inventory</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>  
                                                                </div>
                                                                <div class="col-md-2"> <br>
                                                                    <br>
                                                                    <br>
                                                                    <br> 
                                                                    <br>OR</div>
                                                                <div class="col-md-5 border">
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>

                                                                    <div >
                                                                        <br>
                                                                        <button class="btn btn-success"  data-toggle="modal" data-target="#addInventExcel" type="button">Upload Using Excel</button>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="addInventExcel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Add</h4>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form name="upload_file" id="upload_file1" method="post" enctype="multipart/form-data"action="<?= ADMINURL ?>PhpspreadsheetController/list_data">
                                                            <div class="form-group row">
                                                                <div class="custom-file">
                                                                    <label for="custom-file-input" class="custom-file-label">Choose file...</label>
                                                                    <input  type="file" name="upload_file" required="required" class="custom-file-input" id="custom-file-input">
                                                                </div> 

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
                                                                    <option value="inv">Sheet1</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <select class="form-control repDrop" style="color:success" name="repName" required="required">
                                                                    <option value="">Select Report Name</option>
                                                                    <option value="inventory_table">Inventory</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input type="number" name="ending_row" placeholder="max 50 rows allowed" class="form-control" min="1" id="end"required="required">
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
                                        <div id="tab-4" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox">

                                                        <div class="ibox-title">
                                                            <h3>Add Colour Matrix</h3>  
                                                        </div>
                                                        <br>
                                                        <div class="ibox-content">
                                                            <div class="row">
                                                                <div class="col-md-5 border">

                                                                    <form method="post" name="editStock" action="<?= ADMINURL ?>edp/addRep" class="form-horizontal">

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Product Code</label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' type="text"id="clourProdCodeEnter" name="clourProdCodeEnter" placeholder="Prod Code" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Colour Code</label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' type="text" id="colourCodeEnter" name="colourCodeEnter" placeholder="Colour Code" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Colour </label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' type="text" id="colorEnter" name="colorEnter" placeholder="Colour " class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Image </label>

                                                                            <div class="col-sm-10">
                                                                                <input autocomplete='off' type="text" id="image" name="image" placeholder="image url " class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="table" id="tablecolAdd" value='model_color_matrix'>
                                                                        <div class="hr-line-dashed"></div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <button class="btn btn-primary" name="addColourMatrixBtn" id="addColourMatrixBtn" type="submit">Add Colour</button>
                                                                            </div>
                                                                        </div>
                                                                    </form> 
                                                                </div>
                                                                <div class="col-md-2"> <br>
                                                                    <br>
                                                                    <br>
                                                                    <br> 
                                                                    <br>OR</div>
                                                                <div class="col-md-5 border">
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>

                                                                    <div >
                                                                        <br>
                                                                        <button class="btn btn-success"  data-toggle="modal" data-target="#addColExcel" type="button">Upload Using Excel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="addColExcel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Add</h4>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                       <form name="upload_file" id="upload_file1" method="post" enctype="multipart/form-data"action="<?= ADMINURL ?>PhpspreadsheetController/list_data">
                                                            <div class="form-group row">
                                                                <div class="custom-file">
                                                                    <label for="custom-file-input" class="custom-file-label">Choose file...</label>
                                                                    <input  type="file" name="upload_file" required="required" class="custom-file-input" id="custom-file-input">
                                                                </div> 

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
                                                                    <option value="ColorMat">ColorMat</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <select class="form-control repDrop" style="color:success" name="repName" required="required">
                                                                    <option value="">Select Report Name</option>
                                                                    <option value="model_color_matrix">model color matrix</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input type="number" name="ending_row" placeholder="max 50 rows allowed" class="form-control" min="1" id="end"required="required">
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
                                    </div>

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


    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script>
        $(document).on("change", "#custom-file-input", function (e) {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $(document).on("change", "#custom-file-input-colour", function (e) {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $(document).ready(function () {
            $('.dataTables-example').DataTable({

                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
    <script>

        let inventoryJsoniser = function (url, id) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: 'inventory_table',
                    param: 'inventory_id'
                },
                success: function (data) {
                    console.log(data);
                    $("#prodCOde").val(data[0]['product_code'])
                    $("#variantName").val(data[0]['variant'])
                    $("#modelName").val(data[0]['model_name'])
                },
                error: function (err) {
                    console.log(err);
                }
            })
        };
        let inventoryJsoniserColour = function (url, id) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: 'model_color_matrix',
                    param: 'model_color_id'
                },
                success: function (data) {
                    console.log(data);
                    $("#prodCodeColour").val(data[0]['prod_code'])
                    $("#colourName").val(data[0]['color'])
                    $("#colourCode").val(data[0]['color_code'])
                },
                error: function (err) {
                    console.log(err);
                }
            })
        };
        $('.inventoryEditBtn').click(function () {
            $("#prodCOde").val('');
            $("#variantName").val('');
            $("#modelName").val('');
            var id = $(this).attr('data-id');
            inventoryJsoniser('edp/inventoryJsoniser', id)
            document.getElementById("inventoryID").value = id

        });
        $('.colEditBtn').click(function () {
            $("#prodCodeColour").val('');
            $("#colourName").val('');
            $("#colourCode").val('');
            var id = $(this).attr('data-id');
            inventoryJsoniserColour('edp/inventoryJsoniser', id)
            document.getElementById("colourID").value = id

        });
    </script>
    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</body>
</html>
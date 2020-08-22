<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/select2/select2.min.css" rel="stylesheet">
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
                            <div class="ibox-title text-center">
                                <h2>Booking Form</h2>
                            </div >
                            <div class="ibox-content text-center">

                                <form method="post" action="<?= ADMINURL ?>sales/createBooking"name="demandForm" id="demandForm" class="form-horizontal demandForm">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Model</label>
                                        <div class="col-sm-10">
                                            <select style="width: 100%" name="selectModel" class="selectModel select2 form-control" id="selectModel">
                                                <option value="0">Select Model</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Variant</label>
                                        <div class="col-sm-10">
                                            <select style="width: 100%" name="selectVarient" class="selectVarient select2 form-control empty" id="selectVarient">
                                                <option value="0">Select Variant</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Prod_Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="productCode" name="productCode" placeholder="product Code " class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Colour</label>
                                        <div class="col-sm-10">
                                            <select style="width: 100%" name="Colour" class="Colour select2 form-control empty" id="Colour">
                                                <option value="0">Select Colour</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Color Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="colorCode" name="colorCode" placeholder="colorCode" class="form-control" readonly="readonly">
                                            <input type="hidden"name="colorName" id="colorName"/>
                                            <input type="hidden"name="filterText" id="filterText"/>
                                            <input type="hidden"name="dseId" id="dseId" value="<?= $userData ?>"/>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Filter</label>
                                        <div class="col-sm-10">
                                            <select style="width: 100%" class="form-control filter " style="color:success" name="statusFilter" id="statusFilter">

                                            </select> 
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" name="checkAvailableBtn" id="checkAvailableBtn" type="button">Check Available</button>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Choose Chassis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control chasis empty " style="color:success;width: 100%" name="chassisPopulate" id="chassisPopulate" required="required">

                                            </select>  
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success buttonss" name="bookBtn" id="bookBtn" type="submit">Book</button>
                                            <button class="btn btn-danger buttonss" name="createDemandBtn" id="createDemandBtn" type="submit">Create Demand</button>

                                        </div>
                                    </div>
                                </form> 

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
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/createDemand.js"></script>
    <script>


    </script>

</body>
</html>

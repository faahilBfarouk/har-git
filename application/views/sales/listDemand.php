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
                            <div class="ibox-title text-center">
                                <h2> Form</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" action="<?= ADMINURL ?>sales/convertDemand" name="demandForm" id="demandForm" class="form-horizontal demandForm">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Model</label>
                                        <div class="col-sm-10">
                                            <select name="selectModel" class="selectModel select2 form-control" id="selectModel" readonly="readonly">
                                                <option value="<?= $details['details'][0]['model_name'] ?>"><?= $details['details'][0]['model_name'] ?></option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Variant</label>
                                        <div class="col-sm-10">
                                            <select name="selectVarient" class="selectVarient select2 form-control empty" id="selectVarient" readonly="readonly">
                                                <option value="<?= $details['details'][0]['variant'] ?>"><?= $details['details'][0]['variant'] ?></option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Prod_Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $details['demand'][0]['stock_demand_prod_code'] ?>" id="productCode" name="productCode" placeholder="product Code " class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Colour</label>
                                        <div class="col-sm-10">
                                            <select name="Colour" class="Colour select2 form-control empty" id="Colour" readonly="readonly">
                                                <option value="<?= $details['demand'][0]['stock_demand_booked_colour_code'] ?>"><?= $details['demand'][0]['stock_demand_booked_colour'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Color Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="colorCode" name="colorCode" placeholder="colorCode" class="form-control" readonly="readonly"value="<?= $details['demand'][0]['stock_demand_booked_colour_code'] ?>">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Dse Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="dseId" name="dseId" placeholder="Dse Id" class="form-control" readonly="readonly"value="<?= $details['demand'][0]['stock_demand_dse_id'] ?>">
                                            <input type="hidden"name="colorName" id="colorName" value="<?= $details['demand'][0]['stock_demand_booked_colour'] ?>"/>
                                            <input type="hidden"name="filterText" id="filterText"/>
                                            <input type="hidden"name="demandId" id="demandId"value="<?= $details['demand'][0]['stock_demand_id'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Filter</label>
                                        <div class="col-sm-10">
                                            <select class="form-control filter " style="color:success" name="statusFilter" id="statusFilter">
                                                <?php foreach ($details['status'] as $stat): ?>
                                                    <option value="<?= $stat['status_id'] ?>"><?= $stat['status'] ?></option>
                                                <?php endforeach; ?>
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
                                        <label class="col-sm-2 col-form-label">Choose Chassis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control chasis empty " style="color:success" name="chassisPopulate" id="chassisPopulate">

                                            </select>  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/listDemand.js"></script>
    
</body>

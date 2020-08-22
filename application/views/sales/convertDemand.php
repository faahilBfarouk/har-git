<?php require_once '1-head.php'; ?>
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
                            <div class="ibox-title text-center">
                                <h2>Booking Details</h2>
                            </div>
                            <div class="ibox-content text-center">

                                <form method="post" action="<?= ADMINURL ?>sales/demandToBooking"name="bookingDetailsForm" class="form-horizontal">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Model</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="bookingModel" id="bookingModel" placeholder="Model Name" class="form-control" value="<?= $selectModel ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Variant</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="bookingVar" id="bookingVar" placeholder="Variant Name" class="form-control" value="<?= $selectVarient ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Product Code</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Prod Code" name="bookingProdCode" id="bookingProdCode" class="form-control" value="<?= $productCode ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Colour</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Colour" name="bookingCol" id="bookingCol" class="form-control" value="<?= $Colour ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Color Code</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Colour Code" name="bookingColCode" id="bookingColCode" class="form-control" value="<?= $colorCode ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Choose Chassis</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Chassis number" name="ChassisNumber" id="ChassisNumber" class="form-control" value="<?= $chassisPopulate ?>" readonly="readonly">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Dse Id</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="dseId" name="dseId" id="dseId" class="form-control" value="<?= $dseId ?>" readonly="readonly">
                                            
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Filter</label>
                                        <div class="col-lg-10">
                                            <select class="form-control filter " style="color:success" name="statusFilter" id="statusFilter">
                                                <?php foreach ($status as $value) : ?>
                                                    <option value="<?= $value['status_id'] ?>"><?= $value['status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Cash paid</label>

                                        <div class="col-lg-10">
                                            <input required="required" type="number" placeholder="Cash Paid" name="CashPaid" id="CashPaid" class="form-control" >
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">SOB Num </label>
<div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <input disabled name="sob" id="sobNum" value="SOB" class="form-control">
                                                </div>
                                                <div class="col-lg-10">
                                            <input required="required" autocomplete="off" type="text" placeholder="Order Number" name="sobNum" id="sobNum" class="form-control" value="<?= $custDetails[0]['stock_demand_order_no'] ?>" readonly="readonly">                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Customer Name </label>

                                        <div class="col-lg-10">
                                            <input required="required" autocomplete="off" type="text" placeholder="customer name" value="<?= $custDetails[0]['stock_demand_customer_name'] ?>" readonly="readonly" name="custName" id="custName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Contact </label>

                                        <div class="col-lg-10">
                                            <input required="required" autocomplete="off" type="number" placeholder="Contact Number" name="contactNum" id="contactNum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Remarks</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Remarks" name="bookingRemarks" id="bookingRemarks" class="form-control">
                                            <input type="hidden" placeholder="demandId" name="demandId" id="demandId"value="<?=$demandId?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary" name="bookingDetailsBtn" id="bookingDetailsBtn" type="submit">Book</button>
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
</body>
</html>

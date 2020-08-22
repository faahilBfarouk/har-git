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
                                <h2>Edit Booking</h2>
                            </div >
                            <div class="ibox-content text-center">

                                <form method="post" action="<?= ADMINURL ?>sales/update_booking/<?= $result['boooking_id'] ?>"name="update_booking" class="form-horizontal">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Model</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="bookingModel" id="bookingModel" placeholder="Model Name" class="form-control" value="<?= $result['selectModel'] ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Variant</label>

                                        <div class="col-lg-10">
                                            <input type="text" name="bookingVar" id="bookingVar" placeholder="Variant Name" class="form-control" value="<?= $result['selectVarient'] ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Product Code</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Prod Code" name="bookingProdCode" id="bookingProdCode" class="form-control" value="<?= $result['productCode'] ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Colour</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Colour" name="bookingCol" id="bookingCol" class="form-control" value="<?= $result['Colour'] ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Color Code</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Colour Code" name="bookingColCode" id="bookingColCode" class="form-control" value="<?= $result['colorCode'] ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Choose Chassis</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Chassis number" name="ChassisNumber" id="ChassisNumber" class="form-control" value="<?= $result['chassisPopulate'] ?>" readonly="readonly">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Dse Id</label>
                                        <div class="col-lg-10">
                                            <input type="text" placeholder="dseId" name="dseId" id="dseId" class="form-control" value="<?= $result['dseId'] ?>" readonly="readonly">
                                            
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Cash paid</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Cash Paid" name="CashPaid" id="CashPaid" class="form-control" value="<?=$result['cash_paid']?>" >
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">SOB Num </label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Order Number" name="sobNum" id="sobNum" class="form-control" value="<?=$result['order_no']?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Customer Name </label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="customer name" name="custName" id="custName" class="form-control" value="<?=$result['customer_name']?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Customer number </label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="customer number" name="customer_number" id="customer_number" class="form-control" value="<?=$result['customer_number']?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Remarks</label>

                                        <div class="col-lg-10">
                                            <input type="text" placeholder="Remarks" name="bookingRemarks" id="bookingRemarks" class="form-control" value="<?=$result['remarks']?>" >
                                            <input type="hidden" name="product_stock_id" id="product_stock_id" value="<?= $result['Stock_ID'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Filter</label>
                                        <div class="col-lg-10">
                                            <select class="form-control filter " style="color:success" name="statusFilter" id="statusFilter" required="required">
                                                <option value="">Select Status Required</option>
                                                <?php foreach ($status as $value) : ?>
                                                    <option value="<?=$value['status_id']?>"><?=$value['status']?></option>
                                                <?php endforeach; ?>
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary" name="bookingDetailsBtn" id="bookingDetailsBtn" type="submit">Save</button>
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

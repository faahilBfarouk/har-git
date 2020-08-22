<?php require_once '1-head.php'; ?>
 <link href="<?=ADMINTHEME?>css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
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
                                <h2>Delete Demand</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" action="<?= ADMINURL ?>sales/convertDemand" name="demandForm" id="demandForm" class="form-horizontal demandForm">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Model</label>
                                        <div class="col-sm-10">
                                            <select name="selectModel" class="selectModel select2 form-control" id="selectModel" readonly="readonly">
                                                <option value="<?= $details['details'][0]['model_name'] ?>"><?= $details['details'][0]['model_name'] ?></option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Varient</label>
                                        <div class="col-sm-10">
                                            <select name="selectVarient" class="selectVarient select2 form-control empty" id="selectVarient" readonly="readonly">
                                                <option value="<?= $details['details'][0]['variant'] ?>"><?= $details['details'][0]['variant'] ?></option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Prod_Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $details['demand'][0]['stock_demand_prod_code'] ?>" id="productCode" name="productCode" placeholder="product Code " class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Colour</label>
                                        <div class="col-sm-10">
                                            <select name="Colour" class="Colour select2 form-control empty" id="Colour" readonly="readonly">
                                                <option value="<?= $details['demand'][0]['stock_demand_booked_colour_code'] ?>"><?= $details['demand'][0]['stock_demand_booked_colour'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Color Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="colorCode" name="colorCode" placeholder="colorCode" class="form-control" readonly="readonly"value="<?= $details['demand'][0]['stock_demand_booked_colour_code'] ?>">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Dse Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="dseId" name="dseId" placeholder="Dse Id" class="form-control" readonly="readonly"value="<?= $details['demand'][0]['stock_demand_dse_id'] ?>">
                                            <input type="hidden"name="colorName" id="colorName" value="<?= $details['demand'][0]['stock_demand_booked_colour'] ?>"/>
                                            <input type="hidden"name="filterText" id="filterText"/>
                                            <input type="hidden"name="demandId" id="demandId"value="<?= $details['demand'][0]['stock_demand_id'] ?>"/>
                                        </div>
                                    </div>
                                    
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-danger" name="destroybtn" data-id="<?=$id?>" id="destroybtn" type="button">Destroy Demand</button>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    
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
    
    <script src="<?= ADMINTHEME ?>js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
  
    <script>
        $('#destroybtn').click(function () {
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function () {
                swal($.ajax({
                    url:admin_url+'sales/deleteDemand',
                    method:'post',
                    dataType:'json',
                    data:{id:id},
                    success:function(data){
                       window.location.replace('<?=ADMINURL?>sales/viewdemand');
                    }
                }));
            });
        })
    </script>
</body>

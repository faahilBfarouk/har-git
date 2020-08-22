<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">

<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

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



                                <h2>Model wise Report</h2>
                                <p class="text-muted">View report from each vertical with respect to Models of Cars according to the dates chosen. You can choose to view variants sold by clicking More Button</p>
                            
                            <form method="POST" action="<?= ADMINURL ?>AdminArea/restrictedModelRepView" name="dateForm"id="dateForm">
                                <div class="row">                        
                                    <div class="col-md-6">
                                        <div class="form-group" id="data_5">
                                            <div class="input-daterange input-group" id="datepicker" name="daterange">
                                                <input type="text" readonly="readonly" style="background-color: white;" class="input-sm form-control" name="start" id="from" value="" autocomplete="off"/>
                                                <span class="input-group-addon">to</span>
                                                <input type="text" readonly="readonly" style="background-color: white;" class="input-sm form-control" name="end" id='to' autocomplete="off" value=""/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="hidden"name="fromDate"id="fromDate"/>
                                        <input type="hidden"name="toDate"id="toDate"/>
                                        <input type="submit" class="btn btn-w-m btn-success dateBtn" id="dateBtn" name="dateBtn" value="Confirm">
                                    </div>
                                </div>
                            </form>
</div>
                            <div class="ibox-content">
                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i> Enquiry</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Booking</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> RTL </a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i> Delivered</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-5"><i class="fa fa-briefcase"></i> Cancelled</a></li>


                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">

                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <th> Name </th><th> Count </th><th>More</th>
                                                            <tbody>

                                                                <?php foreach ($data['data']['rep']as $value): ?>
                                                                    <?php if ($value['table'] == 'enquiry_daily_rep') { ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $value['values']['model'] ?></p></td>
                                                                            
                                                                    <b> <td> <span class="text-danger"><?= $value['values']['count'] ?></span></td></b>
                                                                    <td>                                                        
                                                                        <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" id="targetBtn" data-toggle="modal" data-target="#myModal" data-table="<?= $value['table'] ?>" data-id="<?= $value['values']['model'] ?>" name="targetBtn" value="More">

                                                                    </td>                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
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
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <th> Name </th><th> Count </th><th>More</th>
                                                            <tbody>
                                                                <?php foreach ($data['data']['rep']as $value): ?>
                                                                    <?php if ($value['table'] == 'booking_daily_rep') { ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $value['values']['model'] ?></p></td>
                                                                    <b> <td> <span class="text-danger"><?= $value['values']['count'] ?></span></td></b>
                                                                    <td>                                                        
                                                                        <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" id="targetBtn" data-toggle="modal" data-target="#myModal" data-table="<?= $value['table'] ?>" data-id="<?= $value['values']['model'] ?>" name="targetBtn" value="More">

                                                                    </td>                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <th> Name </th><th> Count </th><th>More</th>
                                                            <tbody>
                                                                <?php foreach ($data['data']['rep']as $value): ?>
                                                                    <?php if ($value['table'] == 'rtl_daily_rep') { ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $value['values']['model'] ?></p></td>
                                                                    <b> <td> <span class="text-danger"><?= $value['values']['count'] ?></span></td></b>
                                                                    <td>                                                        
                                                                        <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" id="targetBtn" data-toggle="modal" data-target="#myModal" data-table="<?= $value['table'] ?>" data-id="<?= $value['values']['model'] ?>" name="targetBtn" value="More">

                                                                    </td>                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                        <div id="tab-4" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <th> Name </th><th> Count </th><th>More</th>
                                                            <tbody>
                                                                <?php foreach ($data['data']['rep']as $value): ?>
                                                                    <?php if ($value['table'] == 'delivered_daily_rep') { ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $value['values']['model'] ?></p></td>
                                                                    <b> <td> <span class="text-danger"><?= $value['values']['count'] ?></span></td></b>
                                                                    <td>                                                        
                                                                        <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" id="targetBtn" data-toggle="modal" data-target="#myModal" data-table="<?= $value['table'] ?>" data-id="<?= $value['values']['model'] ?>" name="targetBtn" value="More">

                                                                    </td>                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                        <div id="tab-5" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <th> Name </th><th> Count </th><th>More</th>
                                                            <tbody>
                                                                <?php foreach ($data['data']['rep']as $value): ?>
                                                                    <?php if ($value['table'] == 'cancelled_daily_rep') { ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $value['values']['model'] ?></p></td>
                                                                    <b> <td> <span class="text-danger"><?= $value['values']['count'] ?></span></td></b>
                                                                    <td>                                                        
                                                                        <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" id="targetBtn" data-toggle="modal" data-target="#myModal" data-table="<?= $value['table'] ?>" data-id="<?= $value['values']['model'] ?>" name="targetBtn" value="More">

                                                                    </td>                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Split up</h4>
                                                </div>
                                                <div class="modal-body variantModal">

                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> Variant</th>
                                                                <th> Count</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="variantModal">

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

    <script>

        var curday = function (sp) {
            today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //As January is 0.
            var yyyy = today.getFullYear();

            if (dd < 10)
                dd = '0' + dd;
            if (mm < 10)
                mm = '0' + mm;
            return (mm + sp + dd + sp + yyyy);
        };
        var ystday = function (sp) {
            today = new Date();
            var dd = today.getDate() - 1;
            var mm = today.getMonth() + 1; //As January is 0.
            var yyyy = today.getFullYear();

            if (dd < 10)
                dd = '0' + dd;
            if (mm < 10)
                mm = '0' + mm;
            return (mm + sp + dd + sp + yyyy);
        };

        window.onload = function () {
            var f = "<?php echo $data['fromDate'] ?>";
            document.getElementById("from").value = f;
            var t = "<?php echo $data['toDate'] ?>";
            document.getElementById("to").value = t;

        };

        

        $(document).ready(function () {


            $('.testbtn').click(function () {
                var model = $(this).attr('data-id');
                var table = $(this).attr('data-table');
                variantUp('AdminArea/jsoniser', model, table);
                //  console.log(model);

            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#from').datepicker({
                autoclose: true,
                onSelect: function (dateText, inst) {

                }
            });

            $('#dateBtn').click(function () {
                var fromdateAr = $('#from').val().split('/');
                var newfromDate = fromdateAr[2] + '-' + fromdateAr[0] + '-' + fromdateAr[1];
                var todateAr = $('#to').val().split('/');
                var newtoDate = todateAr[2] + '-' + todateAr[0] + '-' + todateAr[1];
                $('#fromDate').val(newfromDate)
                $('#toDate').val(newtoDate)

            })
        });
        let variantUp = function (url, model, table) {
            var fromdateAr = $('#from').val().split('/');
            var newfromDate = fromdateAr[2] + '-' + fromdateAr[0] + '-' + fromdateAr[1];
            var todateAr = $('#to').val().split('/');
            var newtoDate = todateAr[2] + '-' + todateAr[0] + '-' + todateAr[1];
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    from: newfromDate,
                    to: newtoDate,
                    model: model,
                    table: table
                },
                success: function (data) {

                    let variant = '';
                    $('.tableRow').remove()
                    $.each(data, function (key, val) {
                        variant += '<tr class="tableRow">';
                        variant += '<td><p class="text-secondary"><strong>' + key + '</strong></p></td>';
                        variant += '<td><p class="text-dark"><strong>' + val + '</strong></p></td>';
                        variant += '</tr>'
                    })
                    $("#variantModal").html(variant);


                }
            })
        };





    </script>

    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>


</body>
</html>
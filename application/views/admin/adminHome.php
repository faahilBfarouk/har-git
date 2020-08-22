<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
                                <h2>Admin Home</h2>  

                            </div>
                            <div class="ibox-content">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i>High In Demand</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> Marked Vehicles </a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i> Allotted Vehicles</a></li>


                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title text-center">
                                                        <h2>High Demand</h2>  
                                                        <div class="ibox-content">
                                                            <form  method="POST" action="<?= ADMINURL ?>AdminArea/adminHome" name="demandDateForm" id="demadDateForm">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class = "form-group " id = "data_5">
                                                                            <div class = "input-daterange input-group" id = "datepicker">
                                                                                <input  readonly="readonly" style=" width: 110px;background-color: white;display: block;float: left" type = "text" class = "input-sm form-control" name = "start" id = "from" value = ""/>
                                                                                <span class = "input-group-addon" style="display: block;float: left">To</span>
                                                                                <input readonly="readonly" style="background-color: white" type = "text" class = "input-sm form-control" name = "end" id = 'to' value = ""/>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class = "form-group ">
                                                                            <div class = "input-daterange input-group" id = "topPicker">

                                                                                <span class = "input-group-addon" style="display: block;float: left">Top</span>
                                                                                <input type = "number" class = "input-sm form-control" name = "top" id = 'top' value = ""/>
                                                                                <span class = "input-group-addon">Models And Top</span>
                                                                                <input type = "number" class = "input-sm form-control" name = "varCount" id = 'varCount' value = ""/>
                                                                                <span class = "input-group-addon">Variants</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 text-center">
                                                                        <input type="submit" class="btn btn-w-m btn-success dateBtn" id="dateBtn" name="dateBtn" value="Confirm">
                                                                    </div>


                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="ibox-content ">
                                                        <div class="table-responsive">
                                                            <table class="table dataTable table-bordered table-hover dataTables-example" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Top Enquired Models
                                                                        </th>
                                                                        <th>Count
                                                                        </th>
                                                                        <th>Variant Split Up
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($data['D'] as $value): ?>
                                                                        <tr>
                                                                            <td> <p class="badge badge-danger" style="width:125px">
                                                                                <?= $value['model_name']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                               <p class="badge badge-danger" style="width:125px">
                                                                                <?= $value['COUNT(*)']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-success demandVarBtn " name="demandVarBtn[]" id="demandVarBtn_1" data-id="<?= $value['model_name']; ?>" data-toggle="modal" data-target="#demandVar" type="button">Variants</button>
                                                                            </td>


                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                                <tfoot>

                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Marked Vehicles</h3>  

                                                    </div>
                                                    <div class="ibox-content text-center">

                                                        <div class="dataTables_wrapper">
                                                            <table class="table dataTable table-bordered table-hover dataTables-example">
                                                                <thead>

                                                                    <tr class=""> 
                                                                        <th> Model </th>
                                                                        <th> Variant </th>
                                                                        <th> Colour </th>
                                                                        <th> Chassis_No </th>
                                                                        <th> Customer </th>
                                                                        <th> Order Number </th>
                                                                        <th> Marked Date </th>
                                                                        <th> DSE </th>
                                                                        <th> remarks </th>
                                                                    </tr>

                                                                </thead>

                                                                <tbody>

                                                                    <?php foreach ($data['M'] as $value): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">  <?= $value['Model']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                              <p class="badge badge-danger" style="width:125px">  <?= $value['Variant']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                            <p class="badge badge-danger" style="width:125px">    <?= $value['Colour']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                             <p class="badge badge-danger" style="width:125px">   <?= $value['Chassis_No']; ?></p>
                                                                            </td>

                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">  <?= $value['book'][0]['customer_name']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">    <?= $value['book'][0]['order_no']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">   <?= $value['book'][0]['if_marked_date']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">    <?= $value['book'][0]['dse_id']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">  <?= $value['book'][0]['remarks']; ?></p>
                                                                            </td>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-4" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Allotted Vehicles</h3>  

                                                    </div>
                                                   <div class="ibox-content text-center">

                                                        <div class="dataTables_wrapper">
                                                            <table class="table dataTable table-bordered table-hover dataTables-example">
                                                                <thead>

                                                                    <tr class=""> 
                                                                        <th> Model </th>
                                                                        <th> Variant </th>
                                                                        <th> Colour </th>
                                                                        <th> Chassis_No </th>
                                                                        <th> Customer </th>
                                                                        <th> Order Number </th>
                                                                        <th> Alloted Date </th>
                                                                        <th> DSE </th>
                                                                        <th> remarks </th>
                                                                    </tr>

                                                                </thead>

                                                                <tbody>

                                                                    <?php foreach ($data['A'] as $value): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['Model']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['Variant']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                          <p class="badge badge-danger" style="width:125px">      <?= $value['Colour']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['Chassis_No']; ?></p>
                                                                            </td>

                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['book'][0]['customer_name']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['book'][0]['order_no']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">        <?= $value['book'][0]['if_alloted_Date']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">       <?= $value['book'][0]['dse_id']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="badge badge-danger" style="width:125px">        <?= $value['book'][0]['remarks']; ?> </p>
                                                                            </td>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>



                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal inmodal fade" id="demandVar" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Split up</h4>
                            </div>
                            <div class="modal-body demandVariantModalDiv">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Variant</th>
                                            <th> Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody id="demandVariantModalTableBody">

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
            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->

    <script>


        window.onload = function () {
            var f = "<?php echo $fromDate ?>";
            document.getElementById("from").value = f;
            var t = "<?php echo $toDate ?>";
            document.getElementById("to").value = t;
            var top = "<?php echo $top ?>";
            document.getElementById("top").value = top;
            var varCount = "<?php echo $varCount ?>";
            document.getElementById("varCount").value = varCount;


        }

        $(document).ready(function () {


            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });


        });

    </script>

    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                "scrollY": 400,
                "scrollX": true,
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
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script>


        $(document).ready(function () {


            $('.demandVarBtn').click(function () {
                var model = $(this).attr('data-id');
                variantDemand('AdminArea/demandJsoniser', model);
                console.log(model);

            });
        })
        let variantDemand = function (url, model) {
            var fromdateAr = $('#from').val().split('/');
            var newfromDate = fromdateAr[2] + '-' + fromdateAr[0] + '-' + fromdateAr[1];
            var todateAr = $('#to').val().split('/');
            var newtoDate = todateAr[2] + '-' + todateAr[0] + '-' + todateAr[1];
            var topVar = $('#varCount').val();
            // console.log(topVar);
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    from: newfromDate,
                    to: newtoDate,
                    model: model,
                    varCount: topVar
                },
                success: function (data) {
                    console.log(data);
                    let variant = '';
                    $('.tableRow').remove()
                    $.each(data, function (key, val) {
                        variant += '<tr class="tableRow">';
                        variant += '<td><p class="text-secondary"><strong>' + key + '</strong></p></td>';
                        variant += '<td><p class="text-dark"><strong>' + val + '</strong></p></td>';
                        variant += '</tr>'
                    })
                    $("#demandVariantModalTableBody").html(variant);


                }
                // error: function(){console.log('dfsf');}
            })
        };

    </script>
    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
   <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>

</body>
</html>
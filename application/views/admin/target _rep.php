<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php require_once '2-nav-bar.php'; ?>   
        <div id="page-wrapper" class="gray-bg">
            <?php require_once '3-row-bottom.php'; ?>  
            <?php require_once '4-bread-crumb.php'; ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2 class="text-danger">Achievements</h2>
                                <form method="POST" action="<?=ADMINURL ?>AdminArea/target" name="dateForm"id="dateForm">
                                    <div class="row">                        
                                        <div class="col-md-6">
                                            <div class="form-group" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon text-success" >From </span>
                                                    <input type="text" id="repDate" name="repDate" class="form-control fromDateMonthBeg" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="hidden"name="fromDate"id="fromDate"/>
                                            <input type="submit" class="btn btn-w-m btn-success dateBtn" id="dateBtn" name="dateBtn" value="Confirm">
                                        </div>
                                    </div>
                                </form>
                            </div >
                            <div class="ibox-content">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i> TL</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> DSE</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> ASM</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">

                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                            <th> Name</th>
                                                            <th> Target</th>
                                                            <th> Achieved</th>
                                                            <th> Balance</th>
                                                            <th> Split Up</th>
                                                            <?php if (!empty($get_target)) { ?>
                                                                <?php foreach ($get_target['tl'] as $key => $value): ?>
                                                                    <tr>
                                                                        <td><?= $key; ?></td>
                                                                        <td><span class="text-info"> <?= $value[$key] ?></span></td>
                                                                        <td><span class="text-success"> <?= $value['achieved']; ?></span></td>
                                                                        <td><span class="text-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>

                                                                        <td>                                                        
                                                                            <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-id='tl_<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

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
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <tbody>
                                                            <th> Name</th>
                                                            <th> Target</th>
                                                            <th> Achieved</th>
                                                            <th> Balance</th>
                                                            <th> Split Up</th>
                                                            <?php if (!empty($get_target)) { ?>
                                                                <?php foreach ($get_target['dse'] as $key => $value): ?>
                                                                    <tr>
                                                                        <td><?= $key; ?></td>
                                                                        <td><span class="text-info"> <?= $value[$key] ?></span></td>
                                                                        <td><span class="text-success"> <?= $value['achieved']; ?></span></td>
                                                                        <td><span class="text-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>

                                                                        <td>                                                        
                                                                            <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-id='dse_<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                        </td> 
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <tbody>



                                                            <th> Name</th>
                                                            <th> Target</th>
                                                            <th> Achieved</th>
                                                            <th> Balance</th>
                                                            <th> Split Up</th>
                                                            <?php if (!empty($get_target['asm'])) { ?>
                                                                <?php foreach ($get_target['asm'] as $key => $value): ?>
                                                                    <tr>
                                                                        <td><?= $key; ?></td>
                                                                        <td><span class="text-info"> <?= $value[$key] ?></span></td>
                                                                        <td><span class="text-success"> <?= $value['achieved']; ?></span></td>
                                                                        <td><span class="text-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>

                                                                        <td>                                                        
                                                                            <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-id='asm_<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                        </td> 
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="Modal" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <div >
                                    <table class="table  table-hover">
                                        <thead>
                                            <tr>
                                                <th> Models</th>
                                                <th> Target</th>
                                                <th> Achieved</th>
                                                <th> Balance</th>
                                            </tr>
                                        </thead>

                                        <tbody id="modelDetails">


                                        </tbody>
                                    </table>
                                </div>
                                <small></small>
                            </div>

                            <div class="text-center">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class='col-md-3'>
                                        <h2 class="text-success">Get Report</h2>
                                    </div>

                                    <div class="col-md-3"> 
                                        <select class="form-control" style="color:danger" name="emp_type" id="emp_type" required="required">
                                            <option value="0">Choose Emp Type</option>
                                            <option value="tl">TL</option>
                                            <option value="dse">DSE</option>
                                            <option value="asm">ASM</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="data_report_fromDiv">
                                            <div class="input-group date">
                                                <span class="input-group-addon text-success" >From </span>
                                                <input type="text" id="data_report_from" name="data_report_from" class="form-control fromDateMonthBeg" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="data_report_toDiv">
                                            <div class="input-group date">
                                                <span class="input-group-addon text-success" >To </span>
                                                <input type="text" id="data_report_to" name="data_report_to" class="form-control toDateMonthEnd" value="">
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div >
                            <div class="ibox-content text-center">

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th> Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody id="genRepTable">
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"  name="slNo[]" id="slNo_1" disabled> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"  name="empID[]" id="empID_1" disabled> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"  name="empName[]" id="empName_1" disabled> 
                                                </td>

                                                <td>
                                                    <input type="checkbox" class="form-control"  name="selected[]" id="selected_1"> 
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <button type="button" class="btn btn-w-m btn-success" data-toggle="modal" data-target="#ModalRep" id="genRep" >Generate Report</button>

                            </div>
                        </div>
                    </div>

                    
 </div>
               
                    <div class="modal inmodal" id="ModalRep" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <div class="dataTables_wrapper">
                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr class="tableRowHead"> 
                                                    <th> Name</th>
                                                    <th> Total_Target</th>
                                                    <th> Alto</th>
                                                    <th> Spresso</th>
                                                    <th> Dzire</th>
                                                    <th> Swift</th>
                                                    <th> WagonR</th>
                                                  
                                                </tr>
                                            </thead>

                                            <tbody id="modelRepDetails">
                                                <tr class="tableRowBody">
                                                    <td>TL</td>
                                                    <td>number</td>
                                                    <td>Num</td>
                                                    <td>Num</td>
                                                    <td>Num</td>
                                                    <td>Num</td>
                                                    <td>Num</td>
                                                </tr>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                    <small></small>
                                </div>

                                <div class="text-center">

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


    <script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <script src="<?= ADMINTHEME ?>js/plugins/nestable/jquery.nestable.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        $(document).ready(function () {
            var d = new Date();
            var currMonth = d.getMonth();
            var currYear = d.getFullYear();
            var startDate = new Date(currYear, currMonth, 1);
            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            var f = "<?php echo $fromDate ?>";
            document.getElementById("repDate").value = f;
            document.getElementById("repDate").value = f;

        });
    </script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
               "scrollY": 200,
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
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>

    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>
</body>
</html>

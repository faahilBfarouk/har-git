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
                                <p class="text-muted">View the targets set for each of the employee and their Achievements according to the RTL database. 
The targets shown initially for each employee is their ‘Total Target’. However, If Total Target was not set then their cumulative target for each model will be shown. 
<br><br>Click on ‘Split Up’ to know what the break-up of models for each employee is. 
</p>
                                <form method="POST" action="<?= ADMINURL ?>AdminArea/salesAchievementsView" name="dateForm"id="dateForm">
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
                                        <?php if (!empty($get_target['Me'])) { ?>  
                                            <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i> Me</a></li>
                                        <?php } ?> 
                                        <?php if (!empty($get_target['tl'])) { ?>  
                                            <li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> TL</a></li>
                                        <?php } ?>
                                        <?php if (!empty($get_target['dse'])) { ?>
                                            <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> DSE</a></li>
                                        <?php } ?>
                                        <?php if (!empty($get_target['asm'])) { ?>
                                            <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i> ASM</a></li>
                                        <?php } ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <tbody>



                                                            <th> Name</th>
                                                            <th> Target</th>
                                                            <th> Achieved</th>
                                                            <th> Balance</th>
                                                            <th> Split Up</th>
                                                            <?php if (!empty($get_target['Me'])) { ?>
                                                                <?php foreach ($get_target['Me'] as $key => $value): ?>
                                                                    <tr>
                                                                        <td><p class="badge badge-danger" style="width:125px"><?= $key; ?></p></td>
                                                                        <?php if (array_key_exists('total', $value)) { ?>
                                                                            <td><span class="badge badge-warning"> <?= $value['total'] ?></span></td>
                                                                            <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                            <td><span class="badge badge-danger"> <?= $value['total'] - $value['achieved'] ?></span></td>
                                                                        <?php } else { ?>
                                                                            <td><span class="badge badge-warning"> Total Target Not Set, cumulative: <?= ' ' . $value[$key]; ?></span></td>

                                                                            <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                            <td><span class="badge badge-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>
                                                                        <?php } ?> 
                                                                        <td>                                                        
                                                                            <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-field="<?= $this->session->userdata()['employee_hierarchy'] ?>" data-id='<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                        </td> 
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">                                                
                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                                                <div style="overflow: auto; width: auto; height: 100%;">

                                                    <div class="table-responsive">
                                                        <table class="table  table-hover">
                                                            <tbody>
                                                            <th> Name</th>
                                                            <th> Target</th>
                                                            <th> Achieved</th>
                                                            <th> Balance</th>
                                                            <th> Split Up</th>
                                                            <?php if (!empty($get_target)) { ?>
                                                                <?php foreach ($get_target['tl'] as $k => $v): ?>
                                                                    <?php foreach ($v as $key => $value): ?>
                                                                        <tr>

                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $key; ?></p></td>
                                                                            <?php if (array_key_exists('total', $value)) { ?>
                                                                                <td><span class="badge badge-warning"> <?= $value['total'] ?></span></td>
                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value['total'] - $value['achieved'] ?></span></td>
                                                                            <?php } else { ?>
                                                                                <td><span class="badge badge-warning"> Total Target Not Set, cumulative: <?= ' ' . $value[$key]; ?></span></td>

                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>
                                                                            <?php } ?> 
                                                                            <td>                                                        
                                                                                <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-field="tl" data-id='<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                            </td> 
                                                                        </tr>
                                                                    <?php endforeach; ?>
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
                                                            <?php if (!empty($get_target)) { ?>
                                                                <?php foreach ($get_target['dse'] as $k => $v): ?>
                                                                    <?php foreach ($v as $key => $value): ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $key; ?></p></td>
                                                                            <?php if (array_key_exists('total', $value)) { ?>
                                                                                <td><span class="badge badge-warning"> <?= $value['total'] ?></span></td>
                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value['total'] - $value['achieved'] ?></span></td>
                                                                            <?php } else { ?>
                                                                                <td><span class="badge badge-warning"> Total Target Not Set, cumulative: <?= ' ' . $value[$key]; ?></span></td>

                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>
                                                                            <?php } ?> 
                                                                            <td>                                                        
                                                                                <input type="button" class="btn testbtn btn-w-m btn-success targetBtn"data-field="dse" data-id='<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                            </td> 
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                        <div id="tab-4" class="tab-pane">
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
                                                                <?php foreach ($get_target['asm'] as $k => $v): ?>
                                                                    <?php foreach ($v as $key => $value): ?>
                                                                        <tr>
                                                                            <td><p class="badge badge-danger" style="width:125px"><?= $key; ?></p></td>
                                                                            <?php if (array_key_exists('total', $value)) { ?>
                                                                                <td><span class="badge badge-warning"> <?= $value['total'] ?></span></td>
                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value['total'] - $value['achieved'] ?></span></td>
                                                                            <?php } else { ?>
                                                                                <td><span class="badge badge-warning"> Total Target Not Set, cumulative: <?= ' ' . $value[$key]; ?></span></td>

                                                                                <td><span class="badge badge-success"> <?= $value['achieved']; ?></span></td>
                                                                                <td><span class="badge badge-danger"> <?= $value[$key] - $value['achieved'] ?></span></td>
                                                                            <?php } ?> 
                                                                            <td>                                                        
                                                                                <input type="button" class="btn testbtn btn-w-m btn-success targetBtn" data-field="asm" data-id='<?= $value['id'] ?>' data-toggle="modal" data-target="#Modal" name="targetBtn" value="More">

                                                                            </td> 
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;">

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
                <div class="modal inmodal" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Target Split Up Other Than Total Target</h4>
                                <p class="text-muted">The sum of targets shown in this page May or May Not be equal to your Total Target. This is to ensure flexibility for you. You are to sell any model of your choice for remaining quantity to achieve your target. </p>
                            </div>
                            <div class="modal-body">
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


    <script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <script src="<?= ADMINTHEME ?>js/plugins/nestable/jquery.nestable.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        $(document).ready(function () {
            getTargetReport('AdminArea/get_model_report')
            
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

    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    
</body>
</html>

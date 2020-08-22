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
                                <h2>Stock Hub</h2>  

                            </div>
                            <div class="ibox-content text-center">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Stock Location</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> Stock Status</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i> Add Location</a></li>



                                    </ul>
                                    <div class="tab-content">
                                        
                                        <div id="tab-2" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>View Location </h3>  
                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 


                                                                    <th>ID</th><th>Location</th><th>Edit</th>


                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">
                                                                <?php if (!empty($data['L'])) { ?>

                                                                    <?php foreach ($data['L'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td>
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>
                                                                            <td>
                                                                                <button class="btn btn-success editBtn" data-toggle="modal" data-id="<?= $value['Status_ID'] ?>" data-target="#myModal5" type="button">Edit</button>
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
                                        <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit</h4>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form method="post" id="editLocForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Change_This_Location_To</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" style=" width: 150px !important;" required="required" name="location" id="location" required="required" > 
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="table" id="tableLoc" value="stock_location">
                                                            <input type="hidden" id="IDLoc" name="ID" class="ID">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="saveLocChange">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit</h4>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form method="post" id="editStatusForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Change_This_Status_To</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" style=" width: 150px !important;" required="required" name="status" id="status" required="required" > 
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="table" id="tableStatus" value="status">
                                                            <input type="hidden" name="ID" id="IDStatus" class="ID">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="saveStatusChange">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>View Status </h3>  

                                                    </div>
                                                    <br>
                                                    <table class="table dataTable table-bordered table-hover dataTables-example">
                                                        <thead>

                                                            <tr class="tableRowHead"> 

                                                                <?php if (!empty($data['S'])) { ?>
                                                                    <?php foreach ($headers['S'] as $k => $v): ?>

                                                                        <th><?= $v ?>
                                                                        </th>

                                                                    <?php endforeach; ?>

                                                                   
                                                                <?php } ?>

                                                            </tr>

                                                        </thead>

                                                        <tbody id="modelRepDetails">
                                                            <?php if (!empty($data['S'])) { ?>

                                                                <?php foreach ($data['S'] as $key => $value): ?>
                                                                    <tr>
                                                                        <?php foreach ($value as $k => $v): ?>
                                                                            <td>
                                                                                <?= $v ?>
                                                                            </td>
                                                                        <?php endforeach; ?>
                                                                    
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>

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
                                                        <h3>Add Location </h3>  

                                                    </div>
                                                    <br>
                                                    <div class="ibox-content text-center">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#locModal">
                                                            Add Location
                                                        </button>

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
            </div>

            <div class="modal inmodal fade" id="locModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <form method="post" id="newLocation" action="<?= ADMINURL ?>edp/addRep" class="form-horizontal">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Add</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input style=" width: 150px !important;" id="newLoc" name="newLoc" placeholder="Location" type="text" autocomplete="off"/>
                                    </div>
                                </div>
                                                            <input type="hidden" name="table" id="tableLoc" value="stock_location">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="addLoc">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal inmodal fade" id="statusModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <form method="post" id="newStatus" action="<?= ADMINURL ?>edp/addRep"  class="form-horizontal">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Add</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input style=" width: 150px !important;" id="newStatus" name="newStatus" placeholder="Status" type="text" autocomplete="off"/>
                                    </div>
                                </div>
                                                            <input type="hidden" name="table" id="tableStatus" value="status">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="addStatus">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->



    <script>
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
    <script type="text/javascript">
        document.getElementById("viewStock").onclick = function () {
            location.href = admin_url + "Sales/viewStock";
        };
        document.getElementById("addStock").onclick = function () {
            location.href = admin_url + "Sales/addStock";
        };
    </script>
    <script>
    
    $('.editBtn').click(function () {
                var id = $(this).attr('data-id');
                document.getElementById("IDLoc").value = id;
document.getElementById("IDStatus").value = id;
            });
            
             $('#saveLocChange').click(function () {
          document.getElementById("editLocForm").submit();// Form submission
            });
             $('#saveStatusChange').click(function () {
          document.getElementById("editStatusForm").submit();// Form submission
            });
          
    </script>
    
    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
   <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</body>
</html>
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
                                <h2>Access Hub</h2>  

                            </div>
                            <div class="ibox-content text-center">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i> Hierarchy Of Employee</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Access Rights</a></li>



                                    </ul>
                                    <div class="tab-content">

                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>View Hierarchy </h3>  
                                                        <small> Hierarchy Cannot Be Edited </small>
                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 

                                                                    <th>
                                                                        Hierarchy ID
                                                                    </th><th>
                                                                        Hierarchy Name
                                                                    </th>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">
                                                                <?php if (!empty($data['h'])) { ?>

                                                                    <?php foreach ($data['h'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td style=" width: 150px !important;">
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <input type="button" class="btn btn-w-m btn-success" id="addHier" data-toggle="modal" data-target="#Modal" name="addHier" value="Add Hierarchy">

                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal inmodal" id="Modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeIn">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit</h4>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form method="post" id="addHierarchy" action="<?= ADMINURL ?>edp/addRep" class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Add Hierarchy</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" style=" width: 150px !important;"  required="required" name="H" id="H" required="required" > 
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="table" id="tableStatus" value="hierarchy">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="addH">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Access Control </h3>  

                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 

                                                                    <th>
                                                                        Access ID
                                                                    </th>
                                                                    <th>
                                                                        Access  Name
                                                                    </th>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">
                                                                <?php if (!empty($data['A'])) { ?>

                                                                    <?php foreach ($data['A'] as $key => $value): ?>
                                                                        <tr>
                                                                            <td style=" width: 150px !important;">
                                                                                <?= $value['access_name'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <input type="button" class="btn btn-w-m btn-success editAccessBtn" data-id="<?= $value['access_controllers_value'] ?>" id="editAccessBtn" data-toggle="modal" data-target="#ModalAccess" value="View Access">

                                                                            </td>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <input type="button" class="btn btn-w-m btn-success" id="addAccess" data-toggle="modal" data-target="#ModalAddAccess" value="Add Access">

                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal" id="ModalAccess" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content animated fadeIn">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">View</h4>
                                                </div>
                                                <div class="modal-body" id="viewAcc">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal" id="ModalAddAccess" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated fadeIn">
                                                <div class="modal-header modal-lg">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Add</h4>
                                                </div>
                                                <div class="modal-body ">
                                                    <form method="post" id="addAccess" action="<?= ADMINURL ?>edp/addRep" class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label text-success">Add_Access_Level</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" style=" width: 150px !important;" value="" placeholder="Title Of Access" name="accessName" id="accessName" required="required" > 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row text-left">
                                                            <label class="col-sm-12 col-form-label">Choose The Access You Wish To Give </label>
                                                            <?php foreach ($data['access_full_list'] as $value): ?>
                                                                <div class="col-sm-6" id="accessCheckBox">
                                                                    <label class="text-danger"> 
                                                                        <input type="checkbox" value="<?= $value['access_id'] ?>" name="accessChkBox"> <?= $value['name'] ?>
                                                                    </label> 
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <input type="hidden" name="table" id="tableAccess" value="access_controls">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="addAccessLevel">Add</button>
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

        $('#addH').click(function () {
            document.getElementById("addHierarchy").submit();
        });

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
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script>
        let accessJsoniser = function (url, id) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: 'access_controls',
                    param: 'access_link_ID'
                },
                success: function (data) {
                    console.log(data)
                    $("#viewAcc").html('');
                    acc = ''
                    $.each(data, function (key, val) {
                        acc = '<p class="text-left"><span class="badge badge-danger">' + val['menu_name'] + '</span></p>'
                        $("#viewAcc").append(acc);
                    })



                },
                error: function () {
                         toastr.error(' Error')
                }
            })
        };

        $('.editAccessBtn').click(function () {
            var id = $(this).attr('data-id');

            accessJsoniser('edp/accessJsoniser', id);

        });

        $(document).ready(function () {

            let insertAccess = function (url, valArr) {

                $.ajax({
                    type: "POST",
                    url: admin_url + url,
                    dataType: "JSON",
                    data: {
                        arr: valArr,
                        accName: $('#accessName').val()
                    },
                    success: function (data) {
window.location.href= window.location.href                   },
                    error: function () {
                         toastr.error(' Error')
                    }
                })
            };

            $("#addAccessLevel").click(function () {
             
                if ($('#accessName').val().length === 0) {
                    alert('Input Name For Access Level')
                }
                else{
                     accesses = [];
                $.each($("input[name='accessChkBox']:checked"), function () {
                    accesses.push($(this).val());
                });

                insertAccess('edp/insertAccess', accesses)
                }
               


            });

        });

    </script>


</body>
</html>
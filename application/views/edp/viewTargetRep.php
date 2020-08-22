<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2>Target Report Table</h2>
                                <p class="text-muted"> Kindly use the actual form to add items to this table</p>
                                <form method="POST" action="<?php echo ADMINURL ?>edp/viewTarget">

                                    <div class="row">                         
                                        <div class="col-md-6">
                                            <div class="form-group row" id="data_5">
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control" name="start" id="from" value=""/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control" name="end" id='to' value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">                                    
                                            <input type="submit" class="btn btn-w-m btn-success dateBtn" id="dateBtn" name="dateBtn" value="Confirm">
                                        </div>
                                    </div>
                                </form>
                            </div >
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <?php if (!empty($data)) { ?>
                                                    <?php foreach ($headers as $k => $v): ?>

                                                        <th><?= $v ?>
                                                        </th>

                                                    <?php endforeach; ?>

                                                    <th>Edit</th>
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) { ?>

                                                <?php foreach ($data as $key => $value): ?>
                                                    <tr>
                                                        <?php foreach ($value as $k => $v): ?>
                                                            <td>
                                                                <?= $v ?>
                                                            </td>
                                                        <?php endforeach; ?>
                                                        <td>
                                                            <button class="btn btn-success editBtn" data-toggle="modal" data-id="<?= $value['target_table_id'] ?>" data-target="#Modal" type="button">Edit/Delete</button>                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>


                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>

                            </div>
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
                                <form method="post" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal" id="editForm">

                                    <div class="form-group row">
              

                                        <div class="col-sm-10">
                                            <input style=" width: 150px !important;" type="hidden" name="empID" id="empID" >  <!-- Number -->  

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Target_Product </label>

                                        <div class="col-sm-10">
                                            <select style=" width: 150px !important;" name="selectProd" class="selectProd select2 selectProd" id="selectProd" required="required">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Qty </label>

                                        <div class="col-sm-10">
                                            <input style=" width: 150px !important;" type="number" name="qty" id="qty" required="required" >  <!-- Number -->  

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Exp Date </label>

                                        <div class="col-sm-10">
                                            <input style=" width: 150px !important;" id="expDate" name="expDate" placeholder="MM/DD/YYY" type="text" autocomplete="off"/>

                                        </div>
                                    </div>

                                    <input type="hidden" name="table" id="table">
                                    <input type="hidden" id="ID" name="ID">


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" id="delBtn">Delete</button>
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="saveChanges">Save changes</button>
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


        }
        $(document).ready(function () {

            $(document).ready(function () {


                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });


            });
            var date_input = $('input[name="expDate"]'); //our date input has the name "date"

            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
            $('.dataTables-example').DataTable({
                "scrollY": true,
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



            $('.editBtn').click(function () {
                console.log('here')
                $("#selectProd").empty();
                  $("#qty").empty();
                    $("#expDate").empty();
                var id = $(this).attr('data-id');
                document.getElementById("table").value = 'target_table';
                document.getElementById("ID").value = id;
                reportJson('edp/reportJsoniser', id);
                //console.log(id);

            });





        let selectAppender = function (selectID, chosen) {
            sel = document.getElementById(selectID);

// create new option element
            var opt = document.createElement('option');

// create text node to add to option element (opt)
            opt.appendChild(document.createTextNode(chosen));

// set value property of opt
            opt.value = chosen;

// add opt to end of select box (sel)
            //sel.removeChild(sel.options[0]);
            sel.appendChild(opt);
        }




        let reportJson = function (url, id) {
            var fromdateAr = $('#from').val().split('/');
            var newfromDate = fromdateAr[2] + '-' + fromdateAr[0] + '-' + fromdateAr[1];
            var todateAr = $('#to').val().split('/');
            var newtoDate = todateAr[2] + '-' + todateAr[0] + '-' + todateAr[1];

            // console.log(admin_url + url)
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    from: newfromDate,
                    to: newtoDate,
                    id: id,
                    table: 'target_table',
                    dateParam: 'target_table_create',
                    idParam: 'target_table_id'
                },
                success: function (data) {
                    $.each(data, function (key, val) {
                        document.getElementById("empID").value = val['target_table_emp_id'];
                        document.getElementById("expDate").value = val['target_table_exp_date'];
                        document.getElementById("qty").value = val['target_table_product_qty'];
                        selectAppender('selectProd', val['target_table_product']);
                    })
                }
                // error: function(){console.log('dfsf');}
            })
            getSelectOpt();
            selectAppender('selectProd', 'Total_Target');

        };

        let getSelectOpt = function () {
            // console.log(admin_url + 'selectAppenderAll');
            $.ajax({
                type: "POST",
                url: admin_url + 'edp/selectAppenderAll',
                dataType: "JSON",
                data: {
                    distinctCol: 'model_name',
                    table: 'inventory_table'
                },
                success: function (data) {
                    console.log(data);
                    $.each(data, function (key, val) {
                        $.each(val, function (k, v) {
                            selectAppender('selectProd', v)
                        })
                    })
                },
                error: function () {
                    console.log('ERROR');
                }
            })
        }

    </script>
    <script>
        $('#saveChanges').click(function () {
            document.getElementById("editForm").submit();// Form submission
        });
        $('#delBtn').click(function () {
            let toDelID = document.getElementById("ID").value
            let table = document.getElementById("table").value
            let url = 'edp/tableValueDeleter'
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    toDelID: toDelID,
                    table: table,
                    param: 'target_table_id'
                },
                success: function (data) {
                    window.location.href = window.location.href
                }

            })
            // console.log(toDelID);

        });


    </script>

    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>




</body>
</html>

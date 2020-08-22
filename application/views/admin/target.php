<?php require_once '1-head.php'; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2 class="text-success">Set Target</h2>
                                <div class="row">
                                    <div class="col-md-3 col-sm-2">
                                        <p class="text-muted">1. Choose Employee Type.</p>
                                    </div>
                                    <div class="col-md-3 col-sm-2">
                                        <p class="text-muted">2. Choose Model Or Total Target. (Remember To Give Total Target)</p>
                                    </div>
                                    <div class="col-md-3 col-sm-2">
                                        <p class="text-muted">3. Type in the target quantity to each employee (Press Enter Button For Easy Navigation)</p>
                                    </div>
                                    <div class="col-md-3 col-sm-2">
                                        <p class="text-muted">4. Click Submit after verifying the quantity and model chosen</p>
                                    </div>
                                </div>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="POST" class="saveForm" id="targetFrm" action="<?= ADMINURL ?>AdminArea/set_target">
                                    <div class="row text-center">
                                        <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-title">
                                                    <h5>Set Target </h5>

                                                </div>
                                                <div class="ibox-content">
                                                    <div class="row">
                                                        <div class="col-sm-5 m-b-xs">
                                                            <select class="form-control" style="color:success" name="emp_type" id="emp_type"required="required">
                                                                <option value="10000000000">Choose Emp Type</option>
                                                                <option value="6">TL</option>
                                                                <option value="7">DSE</option>
                                                                <option value="5">ASM</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 m-b-xs">
                                                            <select class="form-control" style="color:success" name="select_model" id="model"required="required">
                                                                <option value="0">Choose Total Target or Model</option>
                                                                <option value="Total">Total_Target</option>


                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group" id="data_2">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon text-danger" >Expiry </span>
                                                                    <input type="text" id="expdate" class="form-control" value="">
                                                                </div>
                                                            </div>   </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table" id='targetTable'>
                                                            <thead>
                                                                <tr>

                                                                    <th>Sl No </th>
                                                                    <th>Employee ID </th>
                                                                    <th>Employee Name </th>
                                                                    <th>Target </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id='contentTable'>
                                                                <tr class="tableRow">
                                                                    <td>
                                                                        <input type="text" class="form-control"  name="slNo[]" id="slNo_1" readonly="readonly">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"  name="empID[]" id="empID_1" readonly="readonly">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"  name="empName[]" id="empName_1" readonly="readonly">
                                                                    </td>

                                                                    <td>
                                                                        <input type="number" class="form-control"  name="targetQty[]" id="targetQty_1">
                                                                    </td>
                                                                </tr>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <div class="col-md-12">                                    
                                                        <input type="submit" class="btn btn-w-m btn-success" id="targetBtn"  name="targetBtn" value="Set Target">

                                                    </div> 
                                                </div>
                                            </div>
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
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script>
    let selectEmpWithGroupHierarchy = function () {
    $('#emp_type').change(function () {
        $('.tableRow').remove()
            let $html = "";
            $.ajax({
                type: "POST",
                url: admin_url + 'AdminArea/list_emp_filterHigherEmp',
                dataType: "JSON",
                data: {emp_type: $('#emp_type').val()},
                success: function (data) {
                    let $i = 1;
                    $.each(data, function (key, item) {
                        $html += '<tr class="tableRow">';
                        $html += '<td>' + $i + '</td>';
                        $html += '<td>';
                        $html += '<input type="text" class="form-control commonInput"  name="empID[]" id="empID_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_id + '" />';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<input type="text" class="form-control commonInput"  name="empName[]" id="empName_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_name + '"/>';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<input type="number" class="form-control commonInput code-char targetQty"  name="targetQty[]" id="targetQty_' + $i + '" placeholder="Enter Quantity" min="1"/>';
                        $html += '</td>';
                        $html += '</tr>';
                        $i++
                    })
                    $('#contentTable').html($html);

                }, error: function () {
//                $html += '<tr class="tableRow">';
//                $html += '<td></td>';
//                $html += '<td>No</td>';
//                $html += '<td>Data</td>';
//                $html += '<td>Found</td>';
//                $html += '</tr>';
//                $('#contentTable').html($html);
                    toastr.error("No Data Found!!!");
                }
            })
        
    })
}
    </script>
    <script src="<?= ADMINTHEME ?>scripts/target.js"></script>

</body>
</html>

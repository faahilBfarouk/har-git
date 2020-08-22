<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">

<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

<link href="<?= ADMINTHEME ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
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
                                <h2>Booking  Table</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" id="uploadForm" class="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/get_retail_enq">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">

                                            <thead>
                                                <tr>
                                                    <th>Option</th>
                                                    <th>Sino</th>
                                                    <th>Inv_No</th>
                                                    <th>Inv_Dt</th>
                                                    <th>Model</th>
                                                    <th>Fuel_Type</th>
                                                    <th>Clr_DESC</th>
                                                    <th>Variant_DESC</th>
                                                    <th>Chassis</th>
                                                    <th>Engine</th>
                                                    <th>Mul_Inv_Dt</th>
                                                    <th>Customer_Name</th>
                                                    <th>Team_Lead</th>
                                                    <th>DSE</th>
                                                    <th>Mobile_NO</th>
                                                    <th>Enquiry_No</th>
                                                    <th>Enquiry_source</th>
                                                    <th>Buyer_Type</th>
                                                    <th>order_number</th>
                                                    <th>order_date</th>
                                                    <th>ASM_SM</th>
                                                    <th>SM_ASM</th>
                                                    <th>sheet_name</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data as $key => $row): ?>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-danger  dim  delete" type="button"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td><?= $key + 1 ?></td>
                                                        <td>
                                                            <input type="text"  name="Inv_No[]"id ="InvNo_<?= $key + 1 ?>" class="InvNo" value="<?= $row['Inv_No'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Inv_Dt[]" id="InvDt_<?= $key + 1 ?>" class="Inv_Dt" data-mask="9999/99/99"  value="<?= $row['Inv_Dt'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Model[]" id="Model_<?= $key + 1 ?>" class="Model inlist3"id="Model_<?= $key + 1 ?>" value="<?= $row['Model'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Fuel_Type[]" id="FuelType_<?= $key + 1 ?>" class="Fuel_Type" value="<?= $row['Fuel_Type'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Clr_DESC[]" id="ClrDESC_<?= $key + 1 ?>" class="Clr_DESC" value="<?= $row['Clr_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Variant_DESC[]" id="VariantDESC_<?= $key + 1 ?>" class="Variant_DESC" value="<?= $row['Variant_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Chassis[]" id="Chassis_<?= $key + 1 ?>" class="Chassis" value="<?= $row['Chassis'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Engine[]" id="Engine_<?= $key + 1 ?>" class="Engine" value="<?= $row['Engine'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Mul_Inv_Dt[]" id="MulInvDt_<?= $key + 1 ?>" class="Mul_Inv_Dt" data-mask="9999/99/99" value="<?= $row['Mul_Inv_Dt'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Customer_Name[]" id="CustomerName_<?= $key + 1 ?>" class="Customer_Name" value="<?= $row['Customer_Name'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Team_Lead[]"id="TeamLead_<?= $key + 1 ?>" class="Team_Lead inlist1" value="<?= $row['Team_Lead'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="DSE[]" id="DSE_<?= $key + 1 ?>" class="DSE inlist2" value="<?= $row['DSE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Mobile_NO[]"id="MobileNO_<?= $key + 1 ?>" class="inp" value="<?= $row['Mobile_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Enquiry_No[]" id="EnquiryNo_<?= $key + 1 ?>" class="Enquiry_No unique" value="<?= $row['Enquiry_No'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Enquiry_source[]" id="Enquirysource_<?= $key + 1 ?>" class="inp" value="<?= $row['Enquiry_source'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Buyer_Type[]"id="BuyerType_<?= $key + 1 ?>" class="Buyer_Type" value="<?= $row['Buyer_Type'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="order_number[]" id="ordernumber_<?= $key + 1 ?>" class="order_number unique1" value="<?= $row['order_number'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="order_date[]" id="orderdate_<?= $key + 1 ?>" class="inp" value="<?= $row['order_date'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="ASM_SM[]" id="ASMSM_<?= $key + 1 ?>" class="ASM_SM inlist4" value="<?= $row['ASM_SM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="SM_ASM[]"id="SMASM_<?= $key + 1 ?>" class="SM_ASM inlist5" value="<?= $row['SM_ASM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="sheet_name[]" id="sheetname_<?= $key + 1 ?>" class="sheet_name" value="<?= $row['sheet_name'] ?>">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-12 pull-right">
                                                                <button class="btn btn-lg btn-dark" type="submit" id="import" name="import">Import</button>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                            </tfoot>
                                        </table>
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
    <script src="<?= ADMINTHEME ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/popper.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/bootstrap.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?= ADMINTHEME ?>js/inspinia.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>c
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <!--call your extra js file inside script tag -->
    <script>
        let admin_urlss = 'https://codingmagic.net/harcars/admin/';
        $(document).ready(function () {
            deleteRow()
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: admin_urlss + 'PhpspreadsheetController/dataValidate',
                success: function (result) {
                    $('#uploadForm').unbind('submit').bind('submit', function () {
                        if (validateDuplicate(result) && validateModel(result) && validateTeam(result) && validatedse(result) && validateasm(result) && validatesm(result)) {
                            validateOrderDb()
                        } else {
                            console.log('primary form eroro')

                        }

                        return false;
                    })
                }
            })
        })
        function validateOrderDb() {
            var response = false
            var invInThisTable = 0;
            var enqInThisTable = 0;
            var orderInThisTable = 0;
            var enqInEnqTable = 0;
            var odrerInOrderTable = 0;
            var dupilateValuesCheck = false;
            var valuesInTables = false;

            $('.text-danger').html("")
            $('.unique').removeClass('text-danger')
            $('.unique').css({"background-color": ""});
            $('.unique1').removeClass('text-danger')
            $('.unique1').css({"background-color": ""});
            $('.InvNo').removeClass('text-danger')
            $('.InvNo').css({"background-color": ""});
            let formId = $('.uploadForm').attr('id');
            let form = document.getElementById(formId);
            let Forms = new FormData(form);
            $.each($(".unique"), function () {
                Forms.append('field[]', $(this).attr('id'));
            });
            $.each($(".unique1"), function () {
                Forms.append('orderId[]', $(this).attr('id'));
            });
            $.each($(".InvNo"), function () {
                Forms.append('InvNoId[]', $(this).attr('id'));
            });

            $.ajax({
                url: admin_urlss + 'PhpspreadsheetController/get_retail_enq',
                method: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: Forms,
                success: function (data) {
                    $.each(data['invoiceInThisTabledata'], function (key, val) {
                        if (val.response === 0) {
                            invInThisTable++;
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Invoce value in Line Number " + errorId + " exist in this  table")
                        }
                    })
                    $.each(data['enqInThisTabledata'], function (key, val) {
                        if (val.response === 0) {
                            enqInThisTable++;
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Enquiry value in Line Number " + errorId + " exist in this  table")
                        }
                    })
                    $.each(data['orderInThisTabledata'], function (key, val) {
                        if (val.response === 0) {
                            orderInThisTable++;
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Order value in Line Number " + errorId + " exist in this  table")
                        }
                    })
                    $.each(data['enqInEnqTabledata'], function (key, val) {
                        if (val.response === 1) {
                            enqInEnqTable++;
                        } else {

                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("enquiry value in Line Number " + errorId + " donot exist in enquiry  table")
                        }
                    })
                    $.each(data['orderInOrderData'], function (key, val) {
                        if (val.response === 1) {
                            odrerInOrderTable++;
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Order value in Line Number " + errorId + "  donot exist in booking  table")
                        }
                    })
                    if (invInThisTable === data['invoiceInThisTabledata'].length && enqInThisTable === data['enqInThisTabledata'].length && orderInThisTable === data['orderInThisTabledata'].length) {
                        dupilateValuesCheck = true
                    }
                    if (enqInEnqTable === data['enqInEnqTabledata'].length && odrerInOrderTable === data['orderInOrderData'].length) {
                        valuesInTables = true
                    }
                    if (dupilateValuesCheck === true && valuesInTables === true) {
                        $('#import').prop('disabled', true);
                        $('#import').html('Loading.....');
                        $.ajax({
                            url: admin_urlss + 'PhpspreadsheetController/upload_ret_table',
                            method: 'POST',
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: Forms,
                            success: function (data) {
                                if (data['response'] === true) {
                                    console.log(data)
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Data Importing',
                                        html: 'Page Will Redirect in <b></b> milliseconds.',
                                        timer: 2000,
                                        timerProgressBar: true,
                                        onBeforeOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                                const content = Swal.getContent()
                                                if (content) {
                                                    const b = content.querySelector('b')
                                                    if (b) {
                                                        b.textContent = Swal.getTimerLeft()
                                                    }
                                                }
                                            }, 100)
                                        },
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                            window.location.href = admin_urlss + "PhpspreadsheetController/";
                                        }
                                    })
                                } else if (data['response'] === false) {
                                    toastr["error"](data['message'])
                                    $('#import').prop('disabled', false);
                                    $('#import').html('Import');
                                }
                            }
                        })
                    }

                },
                error: function (err) {

                    response = false
                }

            });


        }



        function validateDuplicate(result) {
            let data = result;
            var uniqueresponse = false;
            var unique1response = false;
            var invresponse = false;
            var response = false
            $('.text-danger').html("")
            $('.unique').removeClass('text-danger')
            $('.unique').css({"background-color": ""});
            $('.unique1').removeClass('text-danger')
            $('.unique1').css({"background-color": ""});
            $('.InvNo').removeClass('text-danger')
            $('.InvNo').css({"background-color": ""});
            arr = [];
            let totleng = ($('.unique').length)
            $('.unique').each(function () {
                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    uniqueresponse = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Enquiry Field Line Number " + lineNo + " Have Duplicate Value")
                    uniqueresponse = false;
                }

            })
            $('.unique1').each(function () {
                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    unique1response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Enquiry Field Line Number " + lineNo + " Have Duplicate Value")
                    unique1response = false;
                }

            })
            $('.InvNo').each(function () {
                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    invresponse = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Invoice Field Line Number " + lineNo + " Have Duplicate Value")
                    invresponse = false;
                }

            })
            if (uniqueresponse === true && unique1response === true && invresponse === true) {
                response = true
            }
            return response;

        }
        function validateModel(result) {
            let response = false;
            $('.inlist3').removeClass('text-danger')
            $('.inlist3').removeClass('text-danger')
            $('.inlist3').css({"background-color": ""});
            var models = [];
            $.each(result['model'], function (key, val) {
                models.push(val);
            })
            $('.inlist3').each(function () {
                if (jQuery.inArray($(this).val(), models) !== -1) {
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#F9D3D3');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1

                    toastr["error"]("Model in Line Number " + lineNo + " Donot Exist in database")
                    response = false;
                }
            })
            return response;
        }
        function validateTeam(result) {
            let response = false;
            $('.inlist1').removeClass('text-danger')
            $('.inlist1').removeClass('text-danger')
            $('.inlist1').css({"background-color": ""});
            var models = [];
            $.each(result['team'], function (key, val) {
                models.push(val);
            })
            $('.inlist1').each(function () {
                if (jQuery.inArray($(this).val(), models) !== -1) {
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#F9D3D3');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1

                    toastr["error"]("Team Leader in Line Number " + lineNo + " Donot Exist in database")
                    response = false;
                }
            })
            return response;
        }
        function validatedse(result) {
            let response = false;
            $('.inlist2').removeClass('text-danger')
            $('.inlist2').removeClass('text-danger')
            $('.inlist2').css({"background-color": ""});
            var models = [];
            $.each(result['dse'], function (key, val) {
                models.push(val);
            })
            $('.inlist2').each(function () {
                if (jQuery.inArray($(this).val(), models) !== -1) {
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#F9D3D3');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1

                    toastr["error"]("Dse in Line Number " + lineNo + " Donot Exist in database")
                    response = false;
                }
            })
            return response
        }
        function validateasm(result) {
            let response = false;
            $('.inlist4').removeClass('text-danger')
            $('.inlist4').removeClass('text-danger')
            $('.inlist4').css({"background-color": ""});
            var models = [];
            $.each(result['asm'], function (key, val) {
                models.push(val);
            })
            $('.inlist4').each(function () {
                if (jQuery.inArray($(this).val(), models) !== -1) {
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#F9D3D3');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1

                    toastr["error"]("A S M in Line Number " + lineNo + " Donot Exist in database")
                    response = false;
                }
            })
            return response
        }
        function validatesm(result) {
            let response = false;
            $('.inlist5').removeClass('text-danger')
            $('.inlist5').removeClass('text-danger')
            $('.inlist5').css({"background-color": ""});
            var models = [];
            $.each(result['sm'], function (key, val) {
                models.push(val);
            })
            $('.inlist5').each(function () {
                if (jQuery.inArray($(this).val(), models) !== -1) {
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#F9D3D3');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1

                    toastr["error"]("S M in Line Number " + lineNo + " Donot Exist in database")
                    response = false;
                }
            })
            return response
        }
        function deleteRow() {
            $('.delete').click(function () {
                $(this).closest('tr').remove();
            })
        }
    </script>


</body>
</html>

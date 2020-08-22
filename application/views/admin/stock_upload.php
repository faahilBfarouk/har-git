<?php
echo '<pre>';
print_r($data);
echo '</pre>';
?>
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
                                <h2>Inventory  Table</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" id="uploadForm" class="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/upload_stock_exell">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">

                                            <thead>
                                                <tr>
                                                    <th>options</th>
                                                    <th>Sino</th>
                                                    <th>MUL_INV_DATE</th>
                                                    <th>MODEL</th>
                                                    <th>Variant</th>
                                                    <th>MODEL_CODE</th>
                                                    <th>COLOR</th>
                                                    <th>COLOR_CODE</th>
                                                    <th>MODEL</th>
                                                    <th>CHASSIS NO</th>
                                                    <th>ENGINE</th>
                                                    <th>CHASSIS CODE</th>
                                                    <th>STOCK_LOCATION</th>
                                                    <th>STATUS</th>
                                                    <th>Transaction</th>
                                                    <th>INVOICE</th>
                                                    <th>REMARKS</th>
                                                    <th>Sheet Name</th>
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
                                                            <input type="text"  name="MUL_INV_DATE[]"id="MULINVDATE_<?= $key + 1 ?>" class="MUL_INV_DATE" data-mask="9999/99/99" value="<?= $row['MUL_INV_DATE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="model_name[]" id="modelName<?= $key + 1 ?>" class="model_name inlist3 error" value="<?= $row['MODEL'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="variant[]" id="variant_<?= $key + 1 ?>" class="variant" value="<?= $row['Variant'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="MODEL_CODE[]" id="MODELCODE_<?= $key + 1 ?>" class="MODEL_CODE error" value="<?= $row['MODEL_CODE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="COLOR[]" id="COLOR_<?= $key + 1 ?>" class="COLOR error" value="<?= $row['COLOR'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="COLORCODE[]" id="COLORCODE_<?= $key + 1 ?>" class="COLORCODE error" value="<?= $row['COLOR_CODE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="MODELYEAR[]" id="MODELYEAR_<?= $key + 1 ?>" class="MODELYEAR" value="<?= $row['MODEL_YEAR'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CHASSISNO[]" id="CHASSISNO_<?= $key + 1 ?>" class="CHASSISNO error" value="<?= $row['CHASSIS_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="ENGINE_NO[]" id="ENGINENO_<?= $key + 1 ?>" class="ENGINE_NO" value="<?= $row['ENGINE_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CHASSIS_CODE[]" id="CHASSISCODE_<?= $key + 1 ?>" class="CHASSIS_CODE" value="<?= $row['CHASSIS_CODE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="STOCK_LOCATION[]" id="STOCKLOCATION_<?= $key + 1 ?>" class="STOCK_LOCATION" value="<?= $row['STOCK_LOCATION'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="STATUS[]" id="STATUS_<?= $key + 1 ?>" class="STATUS" value="<?= $row['STATUS'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="Transaction_Num[]" id="TransactionNum_<?= $key + 1 ?>" class="Transaction_Num" value="<?= $row['Transaction_Num'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="INVOICE_NUM[]" id="INVOICENUM_<?= $key + 1 ?>" class="INVOICE_NUM" value="<?= $row['INVOICE_NUM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="REMARKS[]" id="REMARKS_<?= $key + 1 ?>" class="REMARKS" value="<?= $row['REMARKS'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="sheet_name[]" id="sheet_name_<?= $key + 1 ?>" class="sheet_name" value="stock" readonly="readonly">
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
                    console.log(result)
                    $('#uploadForm').unbind('submit').bind('submit', function () {
                        if (validateDuplicate(result)&&validateModel(result)) {
                            console.log(12)
                            validateOrderDb()
                        } else {
                            console.log('Primary Field Error')
                        }
                        return false;
                    })
                }
            })
        })
        function validateOrderDb() {
            var response = false
            var modelInTabledata  = 0;
            var colorInTabledata  = 0;
            var colorCodeInTabledata = 0
            var chasisInTabledata = 0

            $('.text-danger').html("")
            $('.error').removeClass('text-white')
            $('.error').css({"background-color": ""});
            
            let formId = $('.uploadForm').attr('id');
            let form = document.getElementById(formId);
            let Forms = new FormData(form);
            
            $.each($(".MODEL_CODE"), function () {
                Forms.append('MODEL_CODE_id[]', $(this).attr('id'));
            });
            $.each($(".COLOR"), function () {
                Forms.append('COLOR_id[]', $(this).attr('id'));
            });
            
            $.each($(".COLORCODE"), function () {
                Forms.append('COLORCODE_id[]', $(this).attr('id'));
            });
            $.each($(".CHASSISNO"), function () {
                Forms.append('CHASSISNO_id[]', $(this).attr('id'));
            });
//            Forms.forEach((value, key) => {
//                console.log(key + " " + value)
//            });
            $.ajax({
                url: admin_urlss + 'PhpspreadsheetController/get_stock_rep',
                method: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: Forms,
                success: function (data) {
                    console.log(data)
                    $.each(data['modelInTabledata'], function (key, val) {
                        if (val.response === 1) {
                            modelInTabledata++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Model code in Line Number " + errorId + " Donot exist exist")
                        }

                    })
                    $.each(data['colorInTabledata'], function (key, val) {
                        if (val.response === 1) {
                            colorInTabledata++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Color  in Line Number " + errorId + " Donot exist exist")
                        }

                    })
                    $.each(data['colorCodeInTabledata'], function (key, val) {
                        if (val.response === 1) {
                            colorCodeInTabledata++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Color code in Line Number " + errorId + " Donot exist exist")
                        }

                    })
                    $.each(data['chasisInTabledata'], function (key, val) {
                        if (val.response === 0) {
                            chasisInTabledata++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Chasis number in Line Number " + errorId + " Already exist ")
                        }

                    })

                    if (modelInTabledata === data['modelInTabledata'].length && colorInTabledata === data['colorInTabledata'].length && colorCodeInTabledata === data['colorCodeInTabledata'].length && chasisInTabledata === data['chasisInTabledata'].length) {
                        //$('#import').prop('disabled', true);
                        //$('#import').html('Loading.....');
                        $.ajax({
                            url: admin_urlss + 'PhpspreadsheetController/upload_stock_exell',
                            method: 'POST',
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: Forms,
                            success: function (data) {
                                console.log(data)
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
                            },
                            error: function (er) {
                                console.log(er)
                            }
                        })

                    }


                },
                error: function (err) {
                    console.log(err)
                    response = false
                }

            });


        }
        function validateDuplicate(result) {
            let data = result;
            var response = false
            $('.text-danger').html("")

            $('.CHASSISNO').removeClass('text-danger')
            $('.CHASSISNO').css({"background-color": ""});
            arr = [];
            $('.CHASSISNO').each(function () {

                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("duplicate Field Line Number " + lineNo + " Have Duplicate Value")

                }

            })

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

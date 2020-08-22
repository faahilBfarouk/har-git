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
                                <form method="post" id="uploadForm" class="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/upload_cancel_report">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">

                                            <thead>
                                                <tr>
                                                    <th>options</th>
                                                    <th>Sino</th>
                                                    <th>CAN_DATE</th>
                                                    <th>INV_NUM</th>
                                                    <th>INV DATE</th>
                                                    <th>CUST NAME</th>
                                                    <th>TL</th>
                                                    <th>DSE_NAME</th>
                                                    <th>MODEL_DESC</th>
                                                    <th>VARIANT DESC</th>
                                                    <th>CONTACT_NO</th>
                                                    <th>CHASIS_NO</th>
                                                    <th>REMARKS</th>
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
                                                            <input type="text"  name="CAN_DATE[]" id="CANDATE_<?= $key + 1 ?>" class="CAN_DATE" data-mask="9999/99/99" value="<?= $row['CAN_DATE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="INV_NUM_[]" id="invoice_<?= $key + 1 ?>" class="InvNo Invoice" value="<?= $row['INV_NUM_'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="_INV_DATE_[]" data-mask="9999/99/99" class="INV_DATE" value="<?= $row['_INV_DATE_'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="_CUST_NAME_[]" class="inp" value="<?= $row['_CUST_NAME_'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="TL[]" class="inlist1" value="<?= $row['TL'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="DSE_NAME[]" class="inlist2" value="<?= $row['DSE_NAME'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="MODEL_DESC[]" class="inlist3" value="<?= $row['MODEL_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="VARIANT_DESC[]" class="inp" value="<?= $row['VARIANT_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CONTACT_NO[]" class="inp" value="<?= $row['CONTACT_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CHASIS_NO[]" class="inp" value="<?= $row['CHASIS_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="REMARKS[]" class="inp" value="<?= $row['REMARKS'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="sheet_name[]" class="inp" value="CAN" readonly="readonly">
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
                        if (validateDuplicate(result) && validateModel(result) && validateTeam(result) && validatedse(result)) {
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
            var invInInvTable = 0;
            var InvInThisTable = 0;

            $('.text-danger').html("")
            $('.Invoice').removeClass('text-white')
            $('.Invoice').css({"background-color": ""});
            let formId = $('.uploadForm').attr('id');
            let form = document.getElementById(formId);
            let Forms = new FormData(form);
            $.each($(".InvNo"), function () {
                Forms.append('InvNoId[]', $(this).attr('id'));
            });
//            Forms.forEach((value, key) => {
//                console.log(key + " " + value)
//            });
            $.ajax({
                url: admin_urlss + 'PhpspreadsheetController/get_canceled_rep',
                method: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: Forms,
                success: function (data) {
                    console.log(data)
                    $.each(data['invoiceInInvTabledata'], function (key, val) {
                        
                        if (val.response === 1) {
                            invInInvTable++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Invoice value in Line Number " + errorId + " Donot exist in Delevery  table")
                        }
                    })
                    $.each(data['invoiceInThisTableData'], function (key, val) {
                        
                        if (val.response === 0) {
                            InvInThisTable++
                        } else {
                            $('#' + val.field).addClass('text-white')
                            $('#' + val.field).css('background-color', '#BD362F');
                            let errorId = val.field.split('_')[1]
                            errorId = parseInt(errorId) + 1
                            toastr["error"]("Invoice value in Line Number " + errorId + " exist in this  table")
                        }
                    })
                    if (invInInvTable === data['invoiceInInvTabledata'].length && InvInThisTable === data['invoiceInThisTableData'].length) {
                       $('#import').prop('disabled', true);
                        $('#import').html('Loading.....');
                        $.ajax({
                            url: admin_urlss + 'PhpspreadsheetController/upload_cancel_report',
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

            $('.InvNo').removeClass('text-danger')
            $('.InvNo').css({"background-color": ""});
            arr = [];
            $('.InvNo').each(function () {

                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Invoice Field Line Number " + lineNo + " Have Duplicate Value")

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

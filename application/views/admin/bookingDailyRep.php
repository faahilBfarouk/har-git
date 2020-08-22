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
                                <form method="post" id="uploadForm" class="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/upload_booking_table">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">
                                            <thead>
                                                <tr id="headerTable">
                                                    <th>Option</th>
                                                    <th>Sino.</th>
                                                    <th>ORDER_NUM</th>
                                                    <th>ORDER_DATE.</th>
                                                    <th>CUST_CD</th>
                                                    <th>CUSTOMER_NAME.</th>
                                                    <th>PHONE1.</th>
                                                    <th>MODEL_DESC.</th>
                                                    <th>FUEL_DESC.</th>
                                                    <th>VARIANT_DESC.</th>
                                                    <th>COLOR_DESC.</th>
                                                    <th>TEAM_LEAD_NAME.</th>
                                                    <th>EMP_NAME.</th>
                                                    <th>BUYER_TYPE.</th>
                                                    <th>RECEIVED_AMOUNT.</th>
                                                    <th>ENQUIRY_NO.</th>
                                                    <th>ENQUIRY_SOURCE.</th>
                                                    <th>ASM_SM.</th>
                                                    <th>SM_ASM.</th>
                                                    <th>OBF_NO.</th>
                                                    <th>sheet_name.</th>
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
                                                            <input type="text"  name="ORDER_NUM[]" class="ORDER_NUM unique1" id="ORDERNUM_<?= $key + 1 ?>" value="<?= $row['ORDER_NUM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="ORDER_DATE[]" id="ORDER_DATE_<?= $key + 1 ?>" class="ORDER_DATE" data-mask="9999/99/99" value="<?= $row['ORDER_DATE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CUST_CD[]" id="CUST_CD_"<?= $key + 1 ?> class="CUST_CD" value="<?= $row['CUST_CD'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="CUSTOMER_NAME[]" id="CUSTOMER_NAME_<?= $key + 1 ?>" class="CUSTOMER_NAME" value="<?= $row['CUSTOMER_NAME'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="PHONE1[]" id="PHONE1_<?= $key + 1 ?>" class="PHONE1" value="<?= $row['PHONE1'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="MODEL_DESC[]" id="MODEL_DESC_<?= $key + 1 ?>" class="MODEL_DESC inlist3" value="<?= $row['MODEL_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="FUEL_DESC[]" id="FUEL_DESC_<?= $key + 1 ?>" class="FUEL_DESC" value="<?= $row['FUEL_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="VARIANT_DESC[]" id="VARIANT_DESC_<?= $key + 1 ?>" class="VARIANT_DESC" value="<?= $row['VARIANT_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="COLOR_DESC[]" id="COLOR_DESC_<?= $key + 1 ?>" class="COLOR_DESC" value="<?= $row['COLOR_DESC'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="TEAM_LEAD_NAME[]" id="TEAM_LEAD_NAME_<?= $key + 1 ?>" class="TEAM_LEAD_NAME inlist1" value="<?= $row['TEAM_LEAD_NAME'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="EMP_NAME[]" id="EMP_NAME_<?= $key + 1 ?>" class="EMP_NAME inlist2" value="<?= $row['EMP_NAME'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="BUYER_TYPE[]" id="BUYER_TYPE_<?= $key + 1 ?>" class="BUYER_TYPE" value="<?= $row['BUYER_TYPE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="RECEIVED_AMOUNT[]" id="RECEIVED_AMOUNT_<?= $key + 1 ?>" class="RECEIVED_AMOUNT" value="<?= $row['RECEIVED_AMOUNT'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="ENQUIRY_NO[]" id="ENQUIRYNO_<?= $key + 1 ?>" class="ENQUIRY_NO unique" value="<?= $row['ENQUIRY_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="ENQUIRY_SOURCE[]" id="ENQUIRY_SOURCE_<?= $key + 1 ?>" class="ENQUIRY_SOURCE" value="<?= $row['ENQUIRY_SOURCE'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="ASM_SM[]" id="ASM_SM_<?= $key + 1 ?>" class="ASM_SM inlist4" value="<?= $row['ASM_SM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number"  name="SM_ASM[]" id="SM_ASM_<?= $key + 1 ?>" class="SM_ASM inlist5" value="<?= $row['SM_ASM'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="OBF_NO[]" id="OBF_NO_<?= $key + 1 ?>" class="OBF_NO" value="<?= $row['OBF_NO'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text"  name="sheet_name[]" id="sheet_name_<?= $key + 1 ?>" class="sheet_name" value="<?= $row['sheet_name'] ?>" readonly="readonly">
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
                        this.formId = $('.uploadForm').attr('id');
                        this.form = document.getElementById(this.formId);
                        let Forms = new FormData(this.form);
                        $.each($(".unique"), function () {
                            Forms.append('field[]', $(this).attr('id'));
                        });
                        $.each($(".unique1"), function () {
                            Forms.append('orderId[]', $(this).attr('id'));
                        });
//                        Forms.forEach((value, key) => {
//                            console.log(key + " " + value)
//                        });
                        $.ajax({
                            url: admin_urlss + 'PhpspreadsheetController/get_Booking_enq',
                            method: 'post',
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: Forms,
                            success: function (data) {
                                if (validateDuplicate(result) && validateModel(result) && validateTeam(result) && validatedse(result) && validateasm(result) && validatesm(result)) {
                                    if (validateOrderDb(data)) {
                                        this.formId = $('.uploadForm').attr('id');
                                        this.form = document.getElementById(this.formId);
                                        let Forms = new FormData(this.form);
                                        $.ajax({
                                            url: admin_urlss + 'PhpspreadsheetController/upload_booking_table',
                                            method: $(this.form).attr('method'),
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
                                            },
                                            error: function (err) {
                                                console.log(err)
                                            }
                                        })

                                    } else {
                                        console.log('second function erroe')
                                    }
                                } else {
                                    console.log('ist function eror')
                                }


                            },
                            error: function (err) {
                                console.log('server error')
                                console.log(err)
                            }
                        })
                        return false;
                    })
                }
            })
        })
        function validateOrderDb(data) {
            let response = false
            let validation_enq = 0;
            let validation_order = 0
            let validation_in_booking = false;
            $('.unique').removeClass('text-white')
            $('.unique').css({"background-color": ""});
            $('.unique1').removeClass('text-white')
            $('.unique1').css({"background-color": ""});
            if (data['enqInBookingresp'] == 0) {
                $.each(data['enqInBookingdata'], function (key, val) {
                    $('#' + val.field).addClass('text-white')
                    $('#' + val.field).css('background-color', '#BD362F');
                    let errorId = val.field.split('_')[1]
                    errorId = parseInt(errorId) + 1
                    toastr["error"]("Enquiry Field Line Number " + errorId + " exist in booking table")
                })
            } else if (data['enqInBookingresp'] == 1) {
                validation_in_booking = true;
            }
            $.each(data['enqdata'], function (k, v) {
                if (v.response === 1) {
                    validation_enq++
                } else {
                    console.log(v)
                    $('#' + v.field).addClass('text-white')
                    $('#' + v.field).css('background-color', '#BD362F');
                    let errorId = v.field.split('_')[1]
                    errorId = parseInt(errorId) + 1
                    toastr["error"]("Enquiry Field Line Number " + errorId + " Donot exist  in Enquiry table")
                }
            })

            if (data['ordresponse'] == 0) {
                $.each(data['order'], function (key, val) {
                    if (val.response == 0) {
                        validation_order++

                    }
                    if (val.response != 0) {
                        $('#' + val.orderField).addClass('text-white')
                        $('#' + val.orderField).css('background-color', '#BD362F');
                        let errorId = val.orderField.split('_')[1]
                        errorId = parseInt(errorId) + 1
                        toastr["error"]("Order Field Line Number " + errorId + " exist in database")
                    }

                })

            }

            if (validation_order === data['order'].length && validation_enq === data['enqdata'].length && validation_in_booking === true) {
                response = true;
            }
            return response;
        }
        function validateDuplicate(result) {
            let data = result;
            var response = false;
            $('.text-danger').html("")
            $('.unique').removeClass('text-danger')
            $('.unique').css({"background-color": ""});
            arr = [];
            let totleng = ($('.unique').length)
            $('.unique').each(function () {
                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Enquiry Field Line Number " + lineNo + " Have Duplicate Value")
                    response = false;
                }

            })
            $('.unique1').each(function () {
                var value = $(this).val();
                if (arr.indexOf(value) == -1) {
                    arr.push(value);
                    response = true;
                } else {
                    $(this).addClass('text-danger')
                    $(this).css('background-color', '#C70039');
                    let lineNo = $(this).attr('id').split('_')[1]
                    lineNo = parseInt(lineNo) + 1
                    toastr["error"]("Enquiry Field Line Number " + lineNo + " Have Duplicate Value")
                    response = false;
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
                    console.log(lineNo)
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
                    console.log(lineNo)
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
                    console.log(lineNo)
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
                    console.log(lineNo)
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
                    console.log(lineNo)
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

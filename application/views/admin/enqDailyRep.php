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
                                <h2>Daily Enquiry Table</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" id="uploadForm" class="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/upload">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">
                                            <thead>
                                                <tr id="headerTable">
                                                    <th>Delete</th>
                                                    <th>Sino.</th>
                                                    <th> Enquiry No.</th>
                                                    <th> Enquiry Date.</th>
                                                    <th> Team Lead Name.</th>
                                                    <th> DSE Name.</th>
                                                    <th> Prospect Name.</th>
                                                    <th> Mobile Number.</th>
                                                    <th> Model Name.</th>
                                                    <th> Fuel Type.</th>
                                                    <th> Variant Name.</th>
                                                    <th> Enquiry_Status.</th>
                                                    <th> Source.</th>
                                                    <th> Buyer_Type.</th>
                                                    <th> ASM.</th>
                                                    <th> SM.</th>
                                                    <th> Sheet Name.</th>
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
                                                            <div class="form-group">
                                                                <input type="text" name ='Enquiry_No[]' class="Enquiry_No unique" id="EnquiryNo_<?= $key ?>" value="<?= $row['Enquiry_No'] ?>"required="required"/>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Enquiry_Date[]' class="EnquiryDate"  data-mask="9999/99/99" id="EnquiryDate_<?= $key ?>" value="<?= $row['Enquiry_Date'] ?>"required="required"/>
                                                            <p class="text-danger"id="dateerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="number" name ='Team_Lead_Name[]' class="TeamLeadName inlist1" id="TeamLeadName_<?= $key ?>" value="<?= $row['Team_Lead_Name'] ?>"required="required"/>
                                                            <p class="text-danger"id="teamerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="number" name ='DSE_Name[]' class="DSEName inlist2" id="DSEName_<?= $key ?>" value="<?= $row['DSE_Name'] ?>"required="required"/>
                                                            <p class="text-danger"id="dseerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Prospect_Name[]' class="ProspectName" id="ProspectName_<?= $key ?>" value="<?= $row['Prospect_Name'] ?>"required="required"/>
                                                            <p class="text-danger"id="proerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='MobileNumber[]' class="MobileNumber" id="MobileNumber_<?= $key ?>"  value="<?= $row['Mobile_Number'] ?>"required="required"/>
                                                            <p class="text-danger"id="moberror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Model_Name[]' class="ModelName inlist3" id="ModelName_<?= $key ?>" value="<?= $row['Model_Name'] ?>"required="required"/>
                                                            <p class="text-danger"id="moderror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Fuel_Type[]' class="FuelType" id="FuelType_<?= $key ?>" value="<?= $row['Fuel_Type'] ?>"required="required"/>
                                                            <p class="text-danger"id="fueqerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Variant_Name[]' class="VariantName" id="VariantName_<?= $key ?>" value="<?= $row['Variant_Name'] ?>"required="required"/>
                                                            <p class="text-danger"id="varqerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Enquiry_Status[]' class="EnquiryStatus" id="EnquiryStatus_<?= $key ?>" value="<?= $row['Enquiry_Status'] ?>"required="required"/>
                                                            <p class="text-danger"id="enqsterror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Source[]' class="Source" id="Source_<?= $key ?>" value="<?= $row['Source'] ?>"required="required"/>
                                                            <p class="text-danger"id="srcerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='Buyer_Type[]' class="BuyerType" id="BuyerType_<?= $key ?>" value="<?= $row['Buyer_Type'] ?>"required="required"/>
                                                            <p class="text-danger"id="buyerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="number" name ='ASM[]' class="ASM inlist4" id="ASM_<?= $key ?>" value="<?= $row['ASM'] ?>"required="required"/>
                                                            <p class="text-danger"id="asmerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="number" name ='SM[]' class="SM inlist5" id="SM_<?= $key ?>" value="<?= $row['SM'] ?>"required="required"/>
                                                            <p class="text-danger"id="smerror_<?= $key ?>"></p>
                                                        </td>
                                                        <td>
                                                            <input type="text" name ='sheet_name[]' class="sheetname" id="sheetname_<?= $key ?>" value="<?= $row['sheet_name'] ?>"required="required" readonly="readonly"/>
                                                            <p class="text-danger"id="sheeterror_<?= $key ?>"></p>
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
//                        Forms.forEach((value, key) => {
//                            console.log(key + " " + value)
//                        });
                        $.ajax({
                            url: admin_urlss + 'PhpspreadsheetController/get_enq',
                            method: 'post',
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: Forms,
                            success: function (data) {
                                $('.unique').removeClass('text-white')
                                $('.unique').css({"background-color": ""});
                                //console.log(data)
                                if (data['response'] == 0) {
                                    console.log(data['message'])
                                    $.each(data['message'], function (key, val) {
                                        if (val.Enquiry_No != 0) {
                                            console.log('not')
                                            $('#' + val.field).addClass('text-white')
                                            $('#' + val.field).css('background-color', '#BD362F');
                                            let errorId = val.field.split('_')[1]
                                            errorId = parseInt(errorId) + 1
                                            toastr["error"]("Enquiry Field Line Number " + errorId + " exist in database")
                                        }

                                    })
                                } else {
                                    validateDuplicate(result)
                                    validateModel(result)
                                    validateTeam(result)
                                    validatedse(result)
                                    validateasm(result)
                                    validatesm(result)
                                    if (validateDuplicate(result) && validateModel(result) && validateTeam(result) && validatedse(result) && validateasm(result) && validatesm(result)) {
                                        $('#import').html('loading...');
                                        $('#import').prop('disabled', true);
                                        this.formId = $('.uploadForm').attr('id');
                                        this.form = document.getElementById(this.formId);
                                        let Forms = new FormData(this.form);
                                        console.log($(this.form).attr('action'))
                                        $.ajax({
                                            url: $(this.form).attr('action'),
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
                                            }, error: function () {
                                                toastr["error"]('server sider error')
                                            }
                                        })

                                    } else {
                                        toastr["error"]('please varify all fields')
                                    }
                                }
                            }
                        })
                        return false
                    })
                }
            })
        })
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

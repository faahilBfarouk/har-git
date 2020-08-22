<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/steps/jquery.steps.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/iCheck/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />

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
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Follow The Steps</h5>

                            </div>
                            <div class="ibox-content">
                                <h2>
                                    Upload Report 
                                </h2>
                                <form id="form" class="wizard-big" action="<?= ADMINURL ?>PhpspreadsheetController/list_data" class="wizard-big" method="post" enctype="multipart/form-data">
                                    <h1>Select File</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- body goes here in --> 
                                                <div class="ibox">
                                                    <div class="ibox-title">
                                                        <span class="text-success"> <h5> Browse And Select The Excel File</h5></span><br><br>
                                                    </div>
                                                    <div class="ibox-content" style="overflow: auto;min-height: 300px" >
                                                        <div class="custom-file">
                                                            <input  type="file" name="upload_file" required="required" class="custom-file-input" id="custom-file-input">
                                                            <label for="custom-file-input" class="custom-file-label">Choose file...</label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h1>Select Range</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- body goes here in -->
                                                <div class="ibox">
                                                    <div class="ibox-title">
                                                        <span class="text-success"><h5> Select Range</h5></span>                           
                                                    </div>
                                                    <div class="ibox-content" style="overflow: auto;min-height: 300px">
                                                        <div >
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                            <input type="number" name="starting_row" placeholder="Starting Row Number eg: 1" class="form-control" min="1" id="start"required="required" >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number"name="ending_row" placeholder="max 50 rows allowed" class="form-control" min="1" id="end"required="required">

                                                                        </div>
                                                                    </div>
                                                                
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <select class="form-control headerOpt" style="color:success" name="headerOpt" required="required">
                                                                                    <option value="">Header Option</option>
                                                                                    <option value="0">Header Excluded</option>
                                                                                    <option value="1">Header Included</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <select class="form-control sheetDrop" style="color:success" name="sheetName" required="required">
                                                                                    <option value="">Select Sheet Name</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <select class="form-control repDrop" style="color:success" name="repName" required="required">
                                                                                    <option value="">Select Report Name</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                    </fieldset>


                                    <h1>Final Step</h1>
                                    <fieldset>
                                        <div class="ibox text-center">
                                            <div class="ibox-title">


                                            </div>
                                            <div class="ibox-content" style="overflow: auto;min-height: 300px">
                                                <span class="text-danger"><h3> WARNING <br>
                                                        You Are About To Update Database!!!
                                                        <br>
                                                        Please Cross Check Your Work

                                                    </h3></span><br><br>
                                                <span class="text-success"><h5> Click Finish To Upload 
                                                    </h5></span><br><br>

                                                <div class="text-center">

                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </fieldset>
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

    <script src="<?= ADMINTHEME ?>js/plugins/steps/jquery.steps.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/validate/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>

    <script>

        $(document).on("change", "#custom-file-input", function (e) {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $(document).ready(function () {

            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    let forms = document.getElementById('form');
                    formData = new FormData(forms);
                    if (currentIndex === 0) {
                        $.ajax({
                            url: admin_url + 'PhpspreadsheetController/load_data',
                            type: 'POST',
                            data: formData,
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                if (data.length > 0) {

                                    data[1].forEach(function (item, index) {
                                        $('.sheetDrop').append($("<option />").val(item).text(item));
                                    })

                                    data[0].forEach(function (item, index) {
                                        $('.repDrop').append($("<option />").val(item).text(item));
                                    })
                                }
                            }

                        })
                    }
                    if (currentIndex == 1) {
                        let endval = parseInt($('#end').val())
                        let startval = parseInt($('#start').val())
                        let totalRow = endval - startval
                        if (totalRow > 50 || startval > endval) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Row Conflit!',
                                footer: '<a href>Max rows allowed is 50!!</a>'
                            })
                            return false;
                        }
                    }
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && ($(".sheetDrop ").val()) > 1)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });

        });
    </script>

</body>
</html>

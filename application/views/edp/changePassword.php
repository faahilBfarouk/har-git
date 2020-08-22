<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

</head>
<body>
    <?php
     $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
        $field = $user_data['employee_hierarchy'];
    ?>


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
                                <h3>Change Password </h3>  
                            </div>
                            <div class="ibox-content">
                            <input type="hidden" id="empIdToEditPass" name="empIdToEditPass" value="<?= $empId ?>" class="form-control">
                           
                            <form method="post" id="editPassForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                <br>
                                <div class="hr-line-dashed"></div> 
                                <div class="hr-line-dashed"></div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Employee Password</label>

                                    <div class="col-sm-10">
                                        <input required autocomplete='off' type="password" id="empPassEdit" name="empPassEdit" placeholder="Password " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Confirm Password</label>

                                    <div class="col-sm-10">
                                        <input required autocomplete='off' type="password" id="empPassConfEdit" name="empPassConfEdit" placeholder="Confirm Password " class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed">
                                </div>

                            </form>  
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type='submit' class="btn btn-primary" name="editPassBtn" id="editPassBtn" value='Save Changes'>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>


    <script>
        $('#editPassBtn').click(function () {
            let pass = document.getElementById('empPassEdit').value;
            let confPass = document.getElementById('empPassConfEdit').value;
            if (pass != confPass) {
                toastr.error('Passwords Do Not Match')
            } else {
                $.ajax({
                    url: admin_url + 'Edp/changePassword',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        emp_id: $('#empIdToEditPass').val(),
                        pass: $('#empPassEdit').val(),
                        confPass: $('#empPassConfEdit').val(),
                    },
                    success: function (data) {
                        if (data.success == true) {
                            toastr.success(data.message)
                            $('#empIdToEditPass').val(""),
                                    $('#empPassEdit').val(""),
                                    $('#empPassConfEdit').val("")
                        } else {
                            toastr.error(data.message)
                            $('#empIdToEditPass').val(""),
                                    $('#empPassEdit').val(""),
                                    $('#empPassConfEdit').val("")
                        }
                    }, error: function () {
                        toastr.error('Error')
                    }
                })
            }
        })
    </script>



</body>
</html>
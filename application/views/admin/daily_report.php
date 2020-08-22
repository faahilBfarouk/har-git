<?php require_once '1-head.php'; ?>
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
                    <div class="col-sm-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h2>Consolidated Reports</h2>

                                <form method="POST" action="<?php echo base_url() ?>admin/Demo/dailyRep">
                                    <div class="form-group">
                                        <select class="form-control filter" style="color:success" name="filter" id="filter">
                                            <option value="6">Select Level</option>
                                            <option value="7">DSE Level</option>
                                            <option value="6">TL Level</option>
                                            <option value="5">ASM Level </option>
                                            <option value="4">SM Level</option>
                                        </select>
                                    </div>   
                                    <div class="row">                         
                                        <div class="col-md-6">
                                            <div class="form-group" id="data_5">
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input readonly="readonly" style="background-color: white;" type="text" class="input-sm form-control" name="start" id="from" value=""/>
                                                    <span class="input-group-addon">to</span>
                                                    <input readonly="readonly" style="background-color: white;" type="text" class="input-sm form-control" name="end" id='to' value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">                                    
                                            <input type="submit" class="btn btn-w-m btn-success dateBtn" id="dateBtn" name="dateBtn" value="Confirm">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table  table-hover">
                                        <th> Name </th>
                                        <th><span class="text-danger">E</span></th>
                                        <th><span class="text-info">B</span></th>
                                        <th><span class="text-warning">R</span></th>
                                        <th><span class="text-success">D</span></th>
                                        <th><span class="text-primary">C</span></th>
                                        <tbody>

                                            <?php foreach ($data['rep'] as $value): ?>
                                                <tr>
                                                    <td><input readonly="readonly" type="text" class="label label-success border-0" style="width:125px;" value="<?= $value['emp name'] ?>"></td>
                                            <b> <td> <span class="text-danger"><?= $value['countEnq'] ?></span></td> </b>
                                            <b> <td> <span class="text-info"><?= $value['countBkg'] ?></span></td> </b>
                                            <b> <td> <span class="text-warning"><?= $value['countRtl'] ?></span></td> </b>
                                            <b> <td> <span class="text-success"><?= $value['countDel'] ?></span></td> </b>
                                            <b> <td> <span class="text-primary"><?= $value['countCan'] ?></span></td> </b>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
        function curday(sp) {
            today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //As January is 0.
            var yyyy = today.getFullYear();

            if (dd < 10)
                dd = '0' + dd;
            if (mm < 10)
                mm = '0' + mm;
            return (mm + sp + dd + sp + yyyy);
        }
        ;
        var ystday = function (sp) {
            today = new Date();
            var dd = today.getDate() - 1;
            var mm = today.getMonth() + 1; //As January is 0.
            var yyyy = today.getFullYear();

            if (dd < 10)
                dd = '0' + dd;
            if (mm < 10)
                mm = '0' + mm;
            return (mm + sp + dd + sp + yyyy);
        };

        window.onload = function () {
            var f = "<?php echo $fromDate ?>";
            document.getElementById("from").value = f;
            var t = "<?php echo $toDate ?>";
            document.getElementById("to").value = t;


        }

        $(document).ready(function () {


            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });


        });
    </script>

    <script>

        $(document).ready(function () {

            $(document.body).on("click", ".client-link", function (e) {
                e.preventDefault()
                $(".selected .tab-pane").removeClass('active');
                $($(this).attr('href')).addClass("active");
            });

        });


    </script>

    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>

    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>


</body>
</html>
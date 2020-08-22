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
                                <h2>Help</h2>
                                <p class="text-muted"> Search For Information To Help You</p>
                            </div >
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <?php if (!empty($data)) { ?>
                                                    <?php foreach ($headers as $k => $v): ?>

                                                        <th><?= $v ?>
                                                        </th>

                                                    <?php endforeach; ?>

                                                    <th>More</th>
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
                                                            <button class="btn btn-success moreBtn" name="moreBtn" data-toggle="modal" data-id="<?= $value['Sl No'] ?>" data-target="#myModal5" type="button">More</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <div class="faq-item">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <a data-toggle="collapse" href="#faq1" class="faq-question">More Description</a>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="faq1" class="panel-collapse collapse ">
                                                        <div class="faq-answer">
                                                            <p id="articleBody1">

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="faq-item">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <a data-toggle="collapse" href="#faq2" class="faq-question">Steps</a>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="faq2" class="panel-collapse collapse ">
                                                        <div class="faq-answer">
                                                            <p id="articleBody2">

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
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
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>
    <script>
        $(document).ready(function () {

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
                //                $.ajax().always(function () {
                //                    simpleLoad($(this), false)
                //                });

                simpleLoad(btn, false)
            });
        });

        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Loading");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Refresh");
                }, 2000);
            }
        }
    </script>
    <script>
        let helpJsoniser = function (url, id) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: 'how_to',
                    param: 'help_linked_ID'
                },
                success: function (data) {
                      $("#articleBody1").html('');
                    $("#articleBody2").html('');
                    console.log(id);
                    extra_desc = data[0]['extra_desc']
                    steps = data[0]['steps']
                    $("#articleBody1").html(extra_desc);
                    $("#articleBody2").html(steps);

                },
                error: function () {
                    console.log('error');
                }
            })
        };

        $('.moreBtn').click(function () {
            var id = $(this).attr('data-id');

            helpJsoniser('edp/simpleWhereJsoniser', id);
            console.log(id);

        });
    </script>
    <script>
        $(document).ready(function () {
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

    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
</body>
</html>

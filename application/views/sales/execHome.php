<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php require_once '2-nav-bar.php'; ?>   
        <div id="page-wrapper" class="gray-bg">
            <?php require_once '3-row-bottom.php'; ?>  
            <?php require_once '4-bread-crumb.php'; ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <?php
                    if (!empty($data)) {
                        foreach ($data as $value):
                            ?>    
                            <div class="col-lg-4">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <?php if ($value['stock'][0]['stock_status'] == 'Demanded') { ?>
                                            <span class="label label-danger pull-right"><?= $value['stock'][0]['stock_status'] ?></span>
                                        <?php } else { ?>
                                            <span class="label label-success pull-right"><?= $value['stock'][0]['stock_status'] ?></span>
        <?php } ?>
                                        <h3><?= $value['stock'][0]['Model'] ?> <?= ' ' . $value['stock'][0]['Variant'] ?><?= ' ' . $value['stock'][0]['Colour'] ?> </h3>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="team-members">
                                            <img class="img-thumbnail" src="https://www.liusedcars.com/images/no-image.png" alt="NO  iMAGE AVAILABLE, Update DB">
                                        </div>
                                        <h4 class="text-center"><i class="fa fa-user-o"></i><?= '  Booking:' . $value['order_no'] ?></h4><br>
        <?php if ($value['stock'][0]['stock_status'] == 'Demanded') { ?>
                                        <div class="text-center">
                                            <span class="text-center"><b class="text-danger">Confirm Your Booking Before</b></span>
                                            <h4 class="text-center text-danger"><?= $value['stock'][0]['demandedExipry'] ?></h4>
                                            </div>
        <?php } ?>
                                        <h5 class="text-center" ><?= 'Chassis No: ' . $value['chassis_no'] ?></h5>
                                        <h5 class="text-center" ><?= 'Location: ' . $value['stock'][0]['stock_location'] ?></h5>
                                        <p class="text-center">
                                            Name: <?= $value['customer_name'] ?> <br>
                                            Contact: <?= $value['customer_number'] ?><br>
                                            Remarks:<?= $value['booking_remarks'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    }
                    ?>

                </div>
            </div>
    <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
<?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->
</body>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jan 2017 05:52:05 GMT -->
</html>

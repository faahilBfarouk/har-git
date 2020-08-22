<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">

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
                                <h2>Demanded Vehicles</h2>
                            </div >
                            <div class="ibox-content">


                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered table-hover dataTables-example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Demanded Prod Code
                                                </th>
                                                <th>Demanded Colour Code
                                                </th>
                                                <th>Demanded Colour
                                                </th>
                                                <th>Demanded cash Paid
                                                </th>
                                                <th>Demanded Order Num
                                                </th>
                                                <th>Demanded Customer
                                                </th>
                                                <th>Demanded Remarks
                                                </th>
                                                <th>Demanded Date
                                                </th>
                                                <th>Demanded Expiry Date
                                                </th>
                                                <th>Demanded DSE
                                                </th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody id="demandTableBody">
                                            <tr id="demandTableRow">
                                                <td>
                                                    Swift
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                         


                                            </tr>

                                        </tbody>
                                        <tfoot>

                                        </tfoot>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script> 
    <script src="<?= ADMINTHEME ?>scripts/demandViewOnly.js"></script>


</body>
</html>

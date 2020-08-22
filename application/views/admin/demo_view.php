<?php require_once '1-head.php'; ?>
    </head>
    <body>
        <div id="wrapper">
           <?php require_once '2-nav-bar.php'; ?>
            <div id="page-wrapper" class="gray-bg">
                <?php require_once '3-row-bottom.php'; ?>  
               <?php require_once '4-bread-crumb.php'; ?>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Employee Group List</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Config option 1</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Mobile</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($list as $emp):?>
                                                <tr class="gradeX">
                                                    <td><?= $emp['employe_table_employe_name']?></td>
                                                    <td><?= $emp['employe_table_employe_mobile']?></td>
                                                    <td><?= $emp['h_name']?></td>
                                                    <td><?= $emp['employe_table_employe_email']?></td>
                                                   
                                                </tr>
                                                <?php endforeach;?>
                                               
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
      
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    pageLength: 25,
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

    </body>

</html>

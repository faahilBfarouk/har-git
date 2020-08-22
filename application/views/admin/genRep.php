<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 

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
                                <h2>Comprehensive Report</h2>  
                                <p class="text-muted">This report shows Target (T) and Achievement (A) of each employee with respect to models and total sum of models. You can sort it in any order you like with the interactable sorter buttons on each column header or search for any employee and save the table as any of the formats given.  
                                    Note: The last entry is the dealership’s total Achievements It will be same irrespective of the employee type chosen in previous menu.
                                </p>
                            </div >
                            <div class="ibox-content text-center">

                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr class="tableRowHead"> 
                                                <th> Name </th>
                                                <?php foreach ($header as $value): ?>
                                                    <th> <?= $value; ?></th>
                                                <?php endforeach; ?>

                                            </tr>

                                        </thead>

                                        <tbody id="modelRepDetails">
                                            <?php foreach ($result as $key => $value): ?>

                                                <tr class="tableRowBody">
                                                    <td>
                                                        <?= $key; ?>
                                                    </td>
                                                    <?php if ($key == 'Dealership') { ?>
                                                        <?php foreach ($value as $k => $v): ?>
                                                            <td><?= 'A:' . $v['achieved']; ?>
                                                            </td> 
                                                        <?php endforeach; ?>
                                                        <?php break;
                                                    }
                                                    ?>


                                                    <?php foreach ($value as $k => $v): ?>

                                                        <?php if ($k == 'Total') { ?>
            <?php if (array_key_exists('total', $v)) { ?>
                                                                <td><?= 'T:' . $v['total'] . ', A:' . $v['achieved']; ?>
                                                                </td> 
            <?php } else { ?>
                                                                <td><?= 'Total Target Not Set' . ', A:' . $v['achieved']; ?>
                                                                </td> 
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <td><?= 'T:' . $v['target'] . ', A:' . $v['achieved']; ?>
                                                            </td> 
                                                    <?php } ?>
                                                <?php endforeach; ?>
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
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <!-- body goes here in --> 
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2>Target Exclusive Report</h2> 
                                <p class="text-muted">This report shows Target of each employee with respect to models and total sum of models. You can sort it in any order you like with the interactable sorter buttons on each column header or search for any employee and save the table as any of the formats given.  
                                    Note: The last entry is the dealership’s total Achievements It will be same irrespective of the employee type chosen in previous menu.
                                </p>
                            </div >
                            <div class="ibox-content text-center">

                                <div class="dataTables_wrapper">
                                    <table class="table dataTable table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr class="tableRowHead"> 
                                                <th> Name </th>
                                                <?php foreach ($header as $value): ?>
                                                    <th> <?= $value; ?></th>
<?php endforeach; ?>

                                            </tr>

                                        </thead>

                                        <tbody id="modelRepDetails">
<?php foreach ($result as $key => $value): ?>
    <?php if ($key != 'Dealership') { ?>
                                                    <tr class="tableRowBody">

                                                        <td>
                                                        <?= $key; ?>
                                                        </td>
        <?php if ($key == 'Dealership') { ?>
                                                            <?php foreach ($value as $k => $v): ?>
                                                                <td><?= 'A:' . $v['achieved']; ?>
                                                                </td> 
                                                            <?php endforeach; ?>
            <?php break;
        }
        ?>


                                                        <?php foreach ($value as $k => $v): ?>

                                                            <?php if ($k == 'Total') { ?>
                                                                <?php if (array_key_exists('total', $v)) { ?>
                                                                    <td><?= (int) $v['total']; ?>
                                                                    </td> 
                                                                <?php } else { ?>
                                                                    <td><?= 'Total Target Not Set'; ?>
                                                                    </td> 
                <?php
                }
            } else {
                ?>
                                                                <td><?= (int) $v['target']; ?>
                                                                </td> 
                                                        <?php } ?>
        <?php endforeach; ?>
                                                    </tr>
    <?php } ?>
<?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <!-- body goes here in --> 
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2>Achievements Exclusive Report</h2>   
                                <p class="text-muted">This report shows Achievement of each employee with respect to models and total sum of models. You can sort it in any order you like with the interactable sorter buttons on each column header or search for any employee and save the table as any of the formats given.  
                                    Note: The last entry is the dealership’s total Achievements It will be same irrespective of the employee type chosen in previous menu.
                                </p>
                            </div >
                            <div class="ibox-content text-center">

                                <div class="dataTables_wrapper">
                                    <table class="table dataTable table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr class="tableRowHead"> 
                                                <th> Name </th>
<?php foreach ($header as $value): ?>
                                                    <th> <?= $value; ?></th>
<?php endforeach; ?>

                                            </tr>

                                        </thead>

                                        <tbody id="modelRepDetails">
                                                    <?php foreach ($result as $key => $value): ?>
                                                        <?php if ($key != 'Dealership') { ?>
                                                    <tr class="tableRowBody">

                                                        <td>
        <?= $key; ?>
                                                        </td>
                                                        <?php if ($key == 'Dealership') { ?>
                                                            <?php foreach ($value as $k => $v): ?>
                                                                <td><?= (int) $v['achieved']; ?>
                                                                </td> 
                                                            <?php endforeach; ?>
                                                            <?php break;
                                                        }
                                                        ?>


                                                        <?php foreach ($value as $k => $v): ?>

            <?php if ($k == 'Total') { ?>
                                                                <?php if (array_key_exists('total', $v)) { ?>
                                                                    <td><?= (int) $v['achieved']; ?>
                                                                    </td> 
                                                                <?php } else { ?>
                                                                    <td><?= (int) $v['achieved']; ?>
                                                                    </td> 
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <td><?= (int) $v['achieved']; ?>
                                                                </td> 
            <?php } ?>
        <?php endforeach; ?>
                                                    </tr>
    <?php } ?>
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
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                "scrollY": 500,
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
</body>
</html>

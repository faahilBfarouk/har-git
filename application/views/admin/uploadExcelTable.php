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
                                <h2>Upload Table</h2>
                            </div >
                            <div class="ibox-content text-center">
                                <form method="post" id="uploadForm" action="<?= ADMINURL ?>PhpspreadsheetController/upload">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table table-hover dataTables-example" style="overflow: auto">
                                            <?php if ($table == 'enquiry_daily_rep'): ?>
                                                <thead>
                                                    <tr id="headerTable">
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
                                                <tbody id="bodyTable">
                                                    <?php foreach ($data as $key => $row): ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= $row['Enquiry_No'] ?>
                                                                <input type="hidden"  name="Enquiry_No[]" class="inp" value="<?= $row['Enquiry_No'] ?>">
                                                            </td>
                                                            <td><?= $row['Enquiry_Date'] ?>
                                                                <input type="hidden"  name="Enquiry_Date[]" class="inp" value="<?= $row['Enquiry_Date'] ?>">
                                                            </td>
                                                            <td><?= $row['Team_Lead_Name'] ?>
                                                                <input type="hidden"  name="Team_Lead_Name[]" class="inp" value="<?= $row['Team_Lead_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['DSE_Name'] ?>
                                                                <input type="hidden"  name="DSE_Name[]" class="inp" value="<?= $row['DSE_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Prospect_Name'] ?>
                                                                <input type="hidden"  name="Prospect_Name[]" class="inp" value="<?= $row['Prospect_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Mobile_Number'] ?>
                                                                <input type="hidden"  name="Mobile_Number[]" class="inp" value="<?= $row['Mobile_Number'] ?>">
                                                            </td>
                                                            <td><?= $row['Model_Name'] ?>
                                                                <input type="hidden"  name="Model_Name[]" class="inp" value="<?= $row['Model_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Fuel_Type'] ?>
                                                                <input type="hidden"  name="Fuel_Type[]" class="inp" value="<?= $row['Fuel_Type'] ?>">
                                                            </td>
                                                            <td><?= $row['Variant_Name'] ?>
                                                                <input type="hidden"  name="Variant_Name[]" class="inp" value="<?= $row['Variant_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Enquiry_Status'] ?>
                                                                <input type="hidden"  name="Enquiry_Status[]" class="inp" value="<?= $row['Enquiry_Status'] ?>">
                                                            </td>
                                                            <td><?= $row['Source'] ?>
                                                                <input type="hidden"  name="Source[]" class="inp" value="<?= $row['Source'] ?>">
                                                            </td>
                                                            <td><?= $row['Buyer_Type'] ?>
                                                                <input type="hidden"  name="Buyer_Type[]" class="inp" value="<?= $row['Buyer_Type'] ?>">
                                                            </td>
                                                            <td><?= $row['ASM'] ?>
                                                                <input type="hidden"  name="ASM[]" class="inp" value="<?= $row['ASM'] ?>">
                                                            </td>
                                                            <td><?= $row['SM'] ?>
                                                                <input type="hidden"  name="SM[]" class="inp" value="<?= $row['SM'] ?>">
                                                            </td>
                                                            <td><?= $row['sheet_name'] ?>
                                                                <input type="hidden"  name="sheet_name[]" class="inp" value="<?= $row['sheet_name'] ?>">
                                                            </td>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                </tbody>
                                            <?php elseif ($table == 'booking_daily_rep'): ?>
                                                <thead>
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
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $key => $row): ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= $row['ORDER_NUM'] ?>
                                                                <input type="hidden"  name="ORDER_NUM[]" class="inp" value="<?= $row['ORDER_NUM'] ?>">
                                                            </td>
                                                            <td><?= $row['ORDER_DATE'] ?>
                                                                <input type="hidden"  name="ORDER_DATE[]" class="inp" value="<?= $row['ORDER_DATE'] ?>">
                                                            </td>
                                                            <td><?= $row['CUST_CD'] ?>
                                                                <input type="hidden"  name="CUST_CD[]" class="inp" value="<?= $row['CUST_CD'] ?>">
                                                            </td>
                                                            <td><?= $row['CUSTOMER_NAME'] ?>
                                                                <input type="hidden"  name="CUSTOMER_NAME[]" class="inp" value="<?= $row['CUSTOMER_NAME'] ?>">
                                                            </td>
                                                            <td><?= $row['PHONE1'] ?>
                                                                <input type="hidden"  name="PHONE1[]" class="inp" value="<?= $row['PHONE1'] ?>">
                                                            </td>
                                                            <td><?= $row['MODEL_DESC'] ?>
                                                                <input type="hidden"  name="MODEL_DESC[]" class="inp" value="<?= $row['MODEL_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['FUEL_DESC'] ?>
                                                                <input type="hidden"  name="FUEL_DESC[]" class="inp" value="<?= $row['FUEL_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['VARIANT_DESC'] ?>
                                                                <input type="hidden"  name="VARIANT_DESC[]" class="inp" value="<?= $row['VARIANT_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['COLOR_DESC'] ?>
                                                                <input type="hidden"  name="COLOR_DESC[]" class="inp" value="<?= $row['COLOR_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['TEAM_LEAD_NAME'] ?>
                                                                <input type="hidden"  name="TEAM_LEAD_NAME[]" class="inp" value="<?= $row['TEAM_LEAD_NAME'] ?>">
                                                            </td>
                                                            <td><?= $row['EMP_NAME'] ?>
                                                                <input type="hidden"  name="EMP_NAME[]" class="inp" value="<?= $row['EMP_NAME'] ?>">
                                                            </td>
                                                            <td><?= $row['BUYER_TYPE'] ?>
                                                                <input type="hidden"  name="BUYER_TYPE[]" class="inp" value="<?= $row['BUYER_TYPE'] ?>">
                                                            </td>
                                                            <td><?= $row['RECEIVED_AMOUNT'] ?>
                                                                <input type="hidden"  name="RECEIVED_AMOUNT[]" class="inp" value="<?= $row['RECEIVED_AMOUNT'] ?>">
                                                            </td>
                                                            <td><?= $row['ENQUIRY_NO'] ?>
                                                                <input type="hidden"  name="ENQUIRY_NO[]" class="inp" value="<?= $row['ENQUIRY_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['ENQUIRY_SOURCE'] ?>
                                                                <input type="hidden"  name="ENQUIRY_SOURCE[]" class="inp" value="<?= $row['ENQUIRY_SOURCE'] ?>">
                                                            </td>
                                                            <td><?= $row['ASM_SM'] ?>
                                                                <input type="hidden"  name="ASM_SM[]" class="inp" value="<?= $row['ASM_SM'] ?>">
                                                            </td>
                                                            <td><?= $row['SM_ASM'] ?>
                                                                <input type="hidden"  name="SM_ASM[]" class="inp" value="<?= $row['SM_ASM'] ?>">
                                                            </td>
                                                            <td><?= $row['OBF_NO'] ?>
                                                                <input type="hidden"  name="OBF_NO[]" class="inp" value="<?= $row['OBF_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['sheet_name'] ?>
                                                                <input type="hidden"  name="sheet_name[]" class="inp" value="<?= $row['sheet_name'] ?>">
                                                            </td> 
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            <?php elseif ($table == 'rtl_daily_rep'): ?>
                                                <thead>
                                                    <tr>
                                                        <th>Sino</th>
                                                        <th>Inv_No</th>
                                                        <th>Inv_Dt</th>
                                                        <th>Model</th>
                                                        <th>Fuel_Type</th>
                                                        <th>Clr_DESC</th>
                                                        <th>Variant_DESC</th>
                                                        <th>Chassis</th>
                                                        <th>Engine</th>
                                                        <th>Mul_Inv_Dt</th>
                                                        <th>Customer_Name</th>
                                                        <th>Team_Lead</th>
                                                        <th>DSE</th>
                                                        <th>Mobile_NO</th>
                                                        <th>Enquiry_No</th>
                                                        <th>Enquiry_source</th>
                                                        <th>Buyer_Type</th>
                                                        <th>order_number</th>
                                                        <th>order_date</th>
                                                        <th>ASM_SM</th>
                                                        <th>SM_ASM</th>
                                                        <th>sheet_name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $key => $row) : ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= $row['Inv_No'] ?>
                                                                <input type="hidden"  name="Inv_No[]" class="inp" value="<?= $row['Inv_No'] ?>">
                                                            </td>
                                                            <td><?= $row['Inv_Dt'] ?>
                                                                <input type="hidden"  name="Inv_Dt[]" class="inp" value="<?= $row['Inv_Dt'] ?>">
                                                            </td>
                                                            <td><?= $row['Model'] ?>
                                                                <input type="hidden"  name="Model[]" class="inp" value="<?= $row['Model'] ?>">
                                                            </td>
                                                            <td><?= $row['Fuel_Type'] ?>
                                                                <input type="hidden"  name="Fuel_Type[]" class="inp" value="<?= $row['Fuel_Type'] ?>">
                                                            </td>
                                                            <td><?= $row['Clr_DESC'] ?>
                                                                <input type="hidden"  name="Clr_DESC[]" class="inp" value="<?= $row['Clr_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['Variant_DESC'] ?>
                                                                <input type="hidden"  name="Variant_DESC[]" class="inp" value="<?= $row['Variant_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['Chassis'] ?>
                                                                <input type="hidden"  name="Chassis[]" class="inp" value="<?= $row['Chassis'] ?>">
                                                            </td>
                                                            <td><?= $row['Engine'] ?>
                                                                <input type="hidden"  name="Engine[]" class="inp" value="<?= $row['Engine'] ?>">
                                                            </td>
                                                            <td><?= $row['Mul_Inv_Dt'] ?>
                                                                <input type="hidden"  name="Mul_Inv_Dt[]" class="inp" value="<?= $row['Mul_Inv_Dt'] ?>">
                                                            </td>
                                                            <td><?= $row['Customer_Name'] ?>
                                                                <input type="hidden"  name="Customer_Name[]" class="inp" value="<?= $row['Customer_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Team_Lead'] ?>
                                                                <input type="hidden"  name="Team_Lead[]" class="inp" value="<?= $row['Team_Lead'] ?>">
                                                            </td>
                                                            <td><?= $row['DSE'] ?>
                                                                <input type="hidden"  name="DSE[]" class="inp" value="<?= $row['DSE'] ?>">
                                                            </td>
                                                            <td><?= $row['Mobile_NO'] ?>
                                                                <input type="hidden"  name="Mobile_NO[]" class="inp" value="<?= $row['Mobile_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['Enquiry_No'] ?>
                                                                <input type="hidden"  name="Enquiry_No[]" class="inp" value="<?= $row['Enquiry_No'] ?>">
                                                            </td>
                                                            <td><?= $row['Enquiry_source'] ?>
                                                                <input type="hidden"  name="Enquiry_source[]" class="inp" value="<?= $row['Enquiry_source'] ?>">
                                                            </td>
                                                            <td><?= $row['Buyer_Type'] ?>
                                                                <input type="hidden"  name="Buyer_Type[]" class="inp" value="<?= $row['Buyer_Type'] ?>">
                                                            </td>
                                                            <td><?= $row['order_number'] ?>
                                                                <input type="hidden"  name="order_number[]" class="inp" value="<?= $row['order_number'] ?>">
                                                            </td>
                                                            <td><?= $row['order_date'] ?>
                                                                <input type="hidden"  name="order_date[]" class="inp" value="<?= $row['order_date'] ?>">
                                                            </td>
                                                            <td><?= $row['ASM_SM'] ?>
                                                                <input type="hidden"  name="ASM_SM[]" class="inp" value="<?= $row['ASM_SM'] ?>">
                                                            </td>
                                                            <td><?= $row['SM_ASM'] ?>
                                                                <input type="hidden"  name="SM_ASM[]" class="inp" value="<?= $row['SM_ASM'] ?>">
                                                            </td>
                                                            <td><?= $row['sheet_name'] ?>
                                                                <input type="hidden"  name="sheet_name[]" class="inp" value="<?= $row['sheet_name'] ?>">
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            <?php elseif ($table == 'delivered_daily_rep'): ?>
                                                <thead>
                                                    <tr>
                                                        <th>SL_NO</th>
                                                        <th>Inv_No</th>
                                                        <th>Inv_Dt</th>
                                                        <th>Del_Date</th>
                                                        <th>Model</th>
                                                        <th>Fuel_Type</th>
                                                        <th>Variant_DESC</th>
                                                        <th>Clr_DESC</th>
                                                        <th>Chassis</th>
                                                        <th>Engine</th>
                                                        <th>Customer_Name</th>
                                                        <th>Team_Lead</th>
                                                        <th>DSE</th>
                                                        <th>Mobile_NO</th>
                                                        <th>Finance</th>
                                                        <th>INSU</th>
                                                        <th>EW</th>
                                                        <th>TV</th>
                                                        <th>FAS_TAG</th>
                                                        <th>ASM</th>
                                                        <th>SM</th>
                                                        <th>sheet_name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $row): ?>
                                                        <tr>
                                                            <td><?= $row['SL_NO_'] ?>
                                                                <input type="hidden"  name="SL_NO_[]" class="inp" value="<?= $row['SL_NO_'] ?>">
                                                            </td>
                                                            <td><?= $row['Inv_No'] ?>
                                                                <input type="hidden"  name="Inv_No[]" class="inp" value="<?= $row['Inv_No'] ?>">
                                                            </td>
                                                            <td><?= $row['Inv_Dt'] ?>
                                                                <input type="hidden"  name="Inv_Dt[]" class="inp" value="<?= $row['Inv_Dt'] ?>">
                                                            </td>
                                                            <td><?= $row['Del_Date'] ?>
                                                                <input type="hidden"  name="Del_Date[]" class="inp" value="<?= $row['Del_Date'] ?>">
                                                            </td>
                                                            <td><?= $row['Model'] ?>
                                                                <input type="hidden"  name="Model[]" class="inp" value="<?= $row['Model'] ?>">
                                                            </td>
                                                            <td><?= $row['Fuel_Type'] ?>
                                                                <input type="hidden"  name="Fuel_Type[]" class="inp" value="<?= $row['Fuel_Type'] ?>">
                                                            </td>
                                                            <td><?= $row['Variant_DESC'] ?>
                                                                <input type="hidden"  name="Variant_DESC[]" class="inp" value="<?= $row['Variant_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['Clr_DESC'] ?>
                                                                <input type="hidden"  name="Clr_DESC[]" class="inp" value="<?= $row['Clr_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['Chassis'] ?>
                                                                <input type="hidden"  name="Chassis[]" class="inp" value="<?= $row['Chassis'] ?>">
                                                            </td>
                                                            <td><?= $row['Engine'] ?>
                                                                <input type="hidden"  name="Engine[]" class="inp" value="<?= $row['Engine'] ?>">
                                                            </td>
                                                            <td><?= $row['Customer_Name'] ?>
                                                                <input type="hidden"  name="Customer_Name[]" class="inp" value="<?= $row['Customer_Name'] ?>">
                                                            </td>
                                                            <td><?= $row['Team_Lead'] ?>
                                                                <input type="hidden"  name="Team_Lead[]" class="inp" value="<?= $row['Team_Lead'] ?>">
                                                            </td>
                                                            <td><?= $row['DSE'] ?>
                                                                <input type="hidden"  name="DSE[]" class="inp" value="<?= $row['DSE'] ?>">
                                                            </td>
                                                            <td><?= $row['Mobile_NO'] ?>
                                                                <input type="hidden"  name="Mobile_NO[]" class="inp" value="<?= $row['Mobile_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['Finance'] ?>
                                                                <input type="hidden"  name="Finance[]" class="inp" value="<?= $row['Finance'] ?>">
                                                            </td>
                                                            <td><?= $row['INSU'] ?>
                                                                <input type="hidden"  name="INSU[]" class="inp" value="<?= $row['INSU'] ?>">
                                                            </td>
                                                            <td><?= $row['EW'] ?>
                                                                <input type="hidden"  name="EW[]" class="inp" value="<?= $row['EW'] ?>">
                                                            </td>
                                                            <td><?= $row['TV'] ?>
                                                                <input type="hidden"  name="TV[]" class="inp" value="<?= $row['TV'] ?>">
                                                            </td>
                                                            <td><?= $row['FAS_TAG'] ?>
                                                                <input type="hidden"  name="FAS_TAG[]" class="inp" value="<?= $row['FAS_TAG'] ?>">
                                                            </td>
                                                            <td><?= $row['ASM'] ?>
                                                                <input type="hidden"  name="ASM[]" class="inp" value="<?= $row['ASM'] ?>">
                                                            </td>
                                                            <td><?= $row['SM'] ?>
                                                                <input type="hidden"  name="SM[]" class="inp" value="<?= $row['SM'] ?>">
                                                            </td>
                                                            <td><?= $row['sheet_name'] ?>
                                                                <input type="hidden"  name="sheet_name[]" class="inp" value="<?= $row['sheet_name'] ?>">
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            <?php elseif ($table == 'cancelled_daily_rep'): ?>
                                                <thead>
                                                    <tr>
                                                        <th>Sino</th>
                                                        <th>CAN_DATE</th>
                                                        <th>INV_NUM</th>
                                                        <th>INV DATE</th>
                                                        <th>CUST NAME</th>
                                                        <th>TL</th>
                                                        <th>DSE_NAME</th>
                                                        <th>MODEL_DESC</th>
                                                        <th>VARIANT DESC</th>
                                                        <th>CONTACT_NO</th>
                                                        <th>CHASIS_NO</th>
                                                        <th>REMARKS</th>
                                                        <th>sheet_name</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $row): ?>
                                                        <tr>
                                                            <td><?= $row['SL_NO'] ?>
                                                                <input type="hidden"  name="SL_NO[]" class="inp" value="<?= $row['SL_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['CAN_DATE'] ?>
                                                                <input type="hidden"  name="CAN_DATE[]" class="inp" value="<?= $row['CAN_DATE'] ?>">
                                                            </td>
                                                            <td><?= $row['INV_NUM_'] ?>
                                                                <input type="hidden"  name="INV_NUM_[]" class="inp" value="<?= $row['INV_NUM_'] ?>">
                                                            </td>
                                                            <td><?= $row['_INV_DATE_'] ?>
                                                                <input type="hidden"  name="_INV_DATE_[]" class="inp" value="<?= $row['_INV_DATE_'] ?>">
                                                            </td>
                                                            <td><?= $row['_CUST_NAME_'] ?>
                                                                <input type="hidden"  name="_CUST_NAME_[]" class="inp" value="<?= $row['_CUST_NAME_'] ?>">
                                                            </td>
                                                            <td><?= $row['TL'] ?>
                                                                <input type="hidden"  name="TL[]" class="inp" value="<?= $row['TL'] ?>">
                                                            </td>
                                                            <td><?= $row['DSE_NAME'] ?>
                                                                <input type="hidden"  name="DSE_NAME[]" class="inp" value="<?= $row['DSE_NAME'] ?>">
                                                            </td>
                                                            <td><?= $row['MODEL_DESC'] ?>
                                                                <input type="hidden"  name="MODEL_DESC[]" class="inp" value="<?= $row['MODEL_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['_VARIANT_DESC'] ?>
                                                                <input type="hidden"  name="_VARIANT_DESC[]" class="inp" value="<?= $row['_VARIANT_DESC'] ?>">
                                                            </td>
                                                            <td><?= $row['CONTACT_NO'] ?>
                                                                <input type="hidden"  name="CONTACT_NO[]" class="inp" value="<?= $row['CONTACT_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['CHASIS_NO'] ?>
                                                                <input type="hidden"  name="CHASIS_NO[]" class="inp" value="<?= $row['CHASIS_NO'] ?>">
                                                            </td>
                                                            <td><?= $row['REMARKS'] ?>
                                                                <input type="hidden"  name="REMARKS[]" class="inp" value="<?= $row['REMARKS'] ?>">
                                                            </td>
                                                            <td><?= $row['sheet_name'] ?>
                                                                <input type="hidden"  name="sheet_name[]" class="inp" value="<?= $row['sheet_name'] ?>">
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>           
                                                </tbody>

                                            <?php endif; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-danger btn-lg" type="submit">Upload</button>
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
    <?php require_once '6-scripts.php'; ?> 
    <!--call your extra js file inside script tag -->
<script>
//            $(document).ready(function () {
//                $('.dataTables-example').DataTable({
//                    pageLength: 10,
//                    responsive: true,
//                    dom: '<"html5buttons"B>lTfgitp',
//                    buttons: [
//                        
//
//                        
//                    ]
//
//                });
//
//            });

        </script>


    <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
</body>
</html>

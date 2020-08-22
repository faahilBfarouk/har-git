<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Snippet - Bootsnipp.com</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                background-color:#f2f2f2;
            }
            .table{
                background-color:#fff;
                box-shadow:0px 2px 2px #aaa;
                margin-top:50px;
            }
        </style>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript"></script>
    </head>
    <body>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container">
            <div class="row">
                <table class="table table-bordered">
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
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name ='Enquiry_No[]' class="Enquiry_No" value=""/>
                            </td>
                            <td>
                                <input type="text" name ='Enquiry_Date[]' class="Enquiry_Date" value="<?= $row['Enquiry_Date'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Team_Lead_Name[]' class="Team_Lead_Name" value="<?= $row['Team_Lead_Name'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='DSE_Name[]' class="DSE_Name" value="<?= $row['DSE_Name'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Prospect_Name[]' class="Prospect_Name" value="<?= $row['Prospect_Name'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Mobile_Number[]' class="Mobile_Number" value="<?= $row['Mobile_Number'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Model_Name[]' class="Model_Name" value="<?= $row['Model_Name'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Fuel_Type[]' class="Fuel_Type" value="<?= $row['Fuel_Type'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Variant_Name[]' class="Variant_Name" value="<?= $row['Variant_Name'] ?>"/>
                            </td>
                            <td>
                                <input type="text" name ='Enquiry_Status[]' class="Enquiry_Status" value="<?= $row['Enquiry_Status'] ?>"/>
                            </td>

                            <td>
                                <input type="text" name ='demo[]' class="Mobile_Number" value="<?= $row['Mobile_Number'] ?>"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
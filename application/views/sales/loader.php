<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="<?= ADMINTHEME ?>css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            /* Center the loader */
            #loader {
                position: absolute;
                left: 50%;
                top: 50%;
                z-index: 1;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
                position: relative;
                -webkit-animation-name: animatebottom;
                -webkit-animation-duration: 1s;
                animation-name: animatebottom;
                animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
                from { bottom:-100px; opacity:0 } 
                to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
                from{ bottom:-100px; opacity:0 } 
                to{ bottom:0; opacity:1 }
            }

            #myDiv {
                display: none;
                text-align: center;
            }

            * {
                -webkit-border-radius: 1px !important;
                -moz-border-radius: 1px !important;
                border-radius: 1px !important;
            }
            #logo {
                color: #666;
                width:100%;   
            }
            #logo h1 {
                font-size: 60px;
                text-shadow: 1px 2px 3px #999;
                font-family: Roboto, sans-serif;
                font-weight: 700;
                letter-spacing: -1px;
            }
            #logo p{
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body onload="myFunction()" style="margin:0;">
         <?php require_once '6-scripts.php'; ?> 
        <script>
            var myVar;

            function myFunction() {
                
                myVar = setTimeout(showPage, 600);
                setTimeout(function () {
                    window.location = "<?=ADMINURL.$url?>";
                }, 1000);

            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
        </script>
         <div style="width:100%;"> 
        <div id="loader"></div>

      <div style="display:none;" id="myDiv" class="animate-bottom">
            <div class="container" style="margin-top: 8%; margin-left: 30%">
                <div class="col-md-6 col-md-offset-3">     
                    <div class="row text-center" >
                        <div id="logo" class="text-center">
                            <h1><?php echo $message;
?></h1><p>Redirecting now...</p>
                        </div>

                    </div>            
                </div>
            </div>
        </div></div>



    </body>
</html>



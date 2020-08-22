
<!DOCTYPE html>
<html>


    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Welcome | Login</title>

        <link href="<?= ADMINTHEME ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= ADMINTHEME ?>font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= ADMINTHEME ?>css/animate.css" rel="stylesheet">
        <link href="<?= ADMINTHEME ?>css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">HAR</h1>

                </div>
                <h3>Welcome to Employee Login</h3>

                <p>Login with your Emp Id and password</p>
                <form class="m-t" role="form" action="<?= ADMINURL.'home/authenticate'?>" method="post" id="logInForm">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="EMP ID..." required="" name="emp_id">
                        <?php if (!empty($message)): ?>
                            <small class="text-danger"><?= $message ?></small> 
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        <?php if (!empty($message)): ?>
                            <small class="text-danger"><?= $message ?></small> 
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b"  name='log_in_button' id='log_in_button'>Login</button>
                    <a href="#myModal" data-toggle="modal"><small>Forgot password?</small></a>
                </form>

                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-sign-out modal-icon"></i>
                                <p>
                                    Kindly contact the EDP or the admin 
                                </p>
                                <small></small>
                            </div>

                            <div class="text-center">

                            </div>
                        </div>
                    </div>
                </div>


                <p class="m-t"> <small> OUR NAME as DEVELOPERS </small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?= ADMINTHEME ?>js/jquery-3.1.1.min.js"></script>
        <script src="<?= ADMINTHEME ?>js/bootstrap.min.js"></script>

    </body>


    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jan 2017 05:52:09 GMT -->
</html>

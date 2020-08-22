<?php require_once '1-head.php'; ?>
<!-- EXTRA CSS HERE  --> 
<style>
    html {
 display: flex;
  justify-content: center;
  align-items: center;
  align-contents: center;
  height: 100%;
}

/* Styles for the tilt block */
.tilt {

  margin: 0 auto;
  transition: box-shadow 0.1s, transform 0.1s;
  
  /*
    * Adding image to the background
    * No relation to the hover effect.
    */

}

.tilt:hover {
  box-shadow: 0px 0px 30px rgba(0,0,0, 0.6);
}
</style>
</head>
<body>
    <?php
    $user_data = $this->session->userdata();
    $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
    $name = $user_data['user_name'];
    $access = $user_data['employee_access_level'];
    $NavBar = get_nav_bar($empId, $access);
    ?>
    <div id="wrapper">
        <?php require_once '2-nav-bar.php'; ?>   
        <div id="page-wrapper" class="gray-bg">
            <?php require_once '3-row-bottom.php'; ?>  
            <?php require_once '4-bread-crumb.php'; ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <!-- body goes here in --> 



                    <?php foreach ($NavBar as $v): ?>
                    
                          <div class="col-lg-4 tilt">
                            <div class="widget style1 navy-bg">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="<?= ADMINURL ?><?= $v['access_controller']?>/<?= $v['access_method']?> " style="color: white"><i class="fa <?= $v['fonts'] ?> fa-3x"></i></a>
                                    </div>
                                    <div class="col-8 text-right">
                                        <a href="<?= ADMINURL ?><?= $v['access_controller']?>/<?= $v['access_method']?> " style="color: white"><span><?= $v['menu_name'] ?></span></a>
                                    </div>
                                </div>
                            </div>
                          </div>
                    <?php endforeach; ?>
                 



                </div>
            </div>

            <?php require_once '5-footer.php'; ?>   
        </div>
    </div>
    <?php require_once '6-scripts.php'; ?> 
    <script>
        localstorage()
    </script>
</body>
</html>

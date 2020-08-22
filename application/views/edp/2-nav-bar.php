<?php
$user_data = $this->session->userdata();
$empId = $user_data['user_employee_id']; // if SM then only his children will be seen
$name = $user_data['user_name'];
$access = $user_data['employee_access_level'];
$NavBar = get_nav_bar($empId,$access);
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?= ADMINTHEME ?>img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                       
                    </a>

                </div>
                <div class="logo-element">
                    HAR
                </div>
            </li>
<?php foreach($NavBar as $v): ?>
            <li>
                <a href="<?= ADMINURL ?><?= $v['access_controller']?>/<?= $v['access_method']?> "><i class="fa <?= $v['fonts']?> "></i> <span class="nav-label"><?= $v['menu_name']?> </span></a>
            </li>
            <?php endforeach; ?>

            <li>
                <a data-toggle="modal" data-target="#modalLogOut" href="#" class=""><i class="fa fa-sign-out"></i> <span class="nav-label">Log-Out</span></a>
            </li>
        </ul>

    </div>
</nav>
<div class="modal inmodal" id="modalLogOut" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-sign-out modal-icon"></i>
                <h4 class="modal-title">Confirm Logout</h4>
                <small></small>
            </div>

            <div class="text-center">
                <br> <br>
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <a type="button"href="<?= ADMINURL ?>home/logout" class="btn btn-primary">Log Out</a>
                <br> <br>
            </div>
        </div>
    </div>
</div>
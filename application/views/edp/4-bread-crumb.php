<?php
$user_data = $this->session->userdata();
$empId = $user_data['user_employee_id']; // if SM then only his children will be seen
$name = $user_data['user_name'];
?>
<div class="row wrapper border-bottom white-bg page-heading text-center">

    <div class="col-lg-12 text-center">
        
        <h2><a style="color: black" href="<?= ADMINURL ?>AdminArea/welcome_page"> <i class="fa fa-home"></i></a> </h2>

    </div>

</div>
<?php
$user_data = $this->session->userdata();
$empId = $user_data['user_employee_id']; // if SM then only his children will be seen
$name = $user_data['user_name'];
?>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-right" id="messageaarea">
        </ul>

    </nav>
</div>
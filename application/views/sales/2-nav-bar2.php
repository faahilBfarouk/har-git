<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-squares" src="<?= ADMINTHEME ?>img/profile_small.jpg" />
                    </span>
                </div>

            </li>
            <li>
                <a href="<?= ADMINURL ?>home/DailyRep"><i class="fa fa-table"></i> <span class="nav-label">Holistic Report</span></a>
            </li>

            <li>
                <a href="<?= ADMINURL ?>home/ModelRepView"><i class="fa fa-car"></i> <span class="nav-label">Model Report </span></a>
            </li>
            <li>
                <a href="<?= ADMINURL ?>home/target"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">SET TARGET</span></a>
            </li>
            <li>
                <a href="<?= ADMINURL ?>home/achievementsReport"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Full Access Achievements</span></a>
            </li>

            <li>
                <a href="<?= ADMINURL ?>home/salesAchievementsView"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Restricted Achievements</span></a>
            </li>
            <li>
                <a href="<?= ADMINURL ?>sales/addStock"><i class="fa fa-car"></i> <span class="nav-label">EDP UPLOAD 5 Pages Report </span></a>
            </li>
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

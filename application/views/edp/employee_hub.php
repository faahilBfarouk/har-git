<?php require_once '1-head.php'; ?>
<link href="<?= ADMINTHEME ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
<link href="<?= ADMINTHEME ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <div class="col-sm-12">
                        <div class="ibox">

                            <div class="ibox-title">
                                <h2>Employee Hub</h2>  

                            </div>
                            <div class="ibox-content text-center">

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-briefcase"></i> Add Employee</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Create Group</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> Edit Employee </a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-briefcase"></i> Edit Group</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-5"><i class="fa fa-briefcase"></i> View Employees</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-6"><i class="fa fa-briefcase"></i> View Groups</a></li>
                                        <li class=""><a class="nav-link" data-toggle="tab" href="#tab-7"><i class="fa fa-briefcase"></i> Change Password</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Add Employee </h3>  

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <form onSubmit = "return checkPassword(this)" method="POST" id="addEmp" action="<?= ADMINURL ?>edp/addRep"  class="form-horizontal">
                                                                <br>
                                                                <div class="hr-line-dashed"></div> 
                                                                <div class="hr-line-dashed"></div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee ID</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="number"id="empId" name="empId" placeholder="ID" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Name</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="text" id="empName" name="empName" placeholder="Full Name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Password</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="password" id="empPass" name="empPass" placeholder="Password " class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Confirm Password</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="password" id="empConf" name="empConf" placeholder="Password Again" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Mobile</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="number" id="empMob" name="empMob" placeholder="Number" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Sim</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="text" id="empSim" name="empSim" placeholder="Sim Alloted To Emp" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Email</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="email" id="empEmail" name="empEmail" placeholder="Email Alloted To Emp" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Hierarchy</label>

                                                                    <div class="col-sm-10">
                                                                        <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="hierarchy" name="hierarchy">
                                                                            <option value=''>Choose Designation</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Service</label>

                                                                    <div class="col-sm-10">
                                                                        <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="service" name="service"> <!-- populate from services table -->
                                                                            <option value=''>Choose Service</option>
                                                                        </select>                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Address</label>

                                                                    <div class="col-sm-10">
                                                                        <input required autocomplete='off' type="text" placeholder="Full Address" id="fullAddr" name="fullAddr" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee Group</label>

                                                                    <div class="col-sm-10">
                                                                        <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="grp" name="grp"> <!-- populate from grp table -->
                                                                            <option value="">Choose Group Name</option>
                                                                        </select>                                                              
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee's Team Lead</label>

                                                                    <div class="col-sm-10">
                                                                        <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underTL" name="underTL"> <!-- populate from emp_table where hierarchy = 6 table -->
                                                                            <option value="0">Choose TL</option>
                                                                        </select>                                                             
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee's Asst Sales Manager</label>

                                                                    <div class="col-sm-10">
                                                                        <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underASM" name="underASM"> <!-- populate from emp_table where hierarchy = 5 table -->
                                                                            <option value="0">Choose ASM</option>                                                                </select>                                                             
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee's Sales Manager</label>

                                                                    <div class="col-sm-10">
                                                                        <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underSM" name="underSM"> <!-- populate from emp_table where hierarchy = 4 table -->
                                                                            <option value="0">Choose SM</option>                                                                </select>                                                             
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee's Regional Manager</label>

                                                                    <div class="col-sm-10">
                                                                        <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underRM" name="underRM"> <!-- populate from emp_table where hierarchy = 3 table -->
                                                                            <option value="0">Choose RM</option>
                                                                        </select>                                                             
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Employee's Access Level</label>

                                                                    <div class="col-sm-10">
                                                                        <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="access" name="access"> <!-- populate from access_level table -->
                                                                            <option value="">Choose Access Level Name</option>

                                                                        </select>                                                             
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="table" id="table" value='employe_table'>
                                                                <div class="hr-line-dashed"></div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <input type='submit' class="btn btn-primary" name="addEmpBtn" id="addEmpBtn" type="submit" value='Add Employee'>
                                                                    </div>
                                                                </div>
                                                            </form>  
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Add Group </h3>  

                                                    </div>
                                                    <form method="POST" id="addGrp" action="<?= ADMINURL ?>edp/addRep"  class="form-horizontal">                                                        <div class="hr-line-dashed"></div> 
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Group Name</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="text" id="grpName" name="grpName" placeholder="Name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Group Leader Employee ID</label>

                                                            <div class="col-sm-10">
                                                                <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' id="grpLeader" name="grpLeader">
                                                                    <option value=''>EMP ID</option>                                                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Parent Group Name</label>
                                                            <div class="col-sm-10">
                                                                <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' id="parentGrpAdd" name="parentGrpAdd">
                                                                    <option value="">Sub Group Of ...</option>                                                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="table" id="grptable" value='employe_group_table'>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input class="btn btn-primary" name="addGrpBtn" id="addGrpBtn" type="submit" value='Add Group'>
                                                            </div>
                                                        </div>
                                                    </form>  


                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Edit Employee </h3>  
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Employee ID</label>

                                                        <div class="col-sm-4">
                                                            <input required autocomplete='off' type="number" id="empIdGive" name="empIdGive" placeholder="Emp ID" class="form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-primary" name="empIDEditBtn" id="empIDEditBtn" value="Edit">Edit</button>
                                                        </div>
                                                    </div>
                                                    <form method="post" id="editEmpForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                                        <br><br>
                                                        <div class="hr-line-dashed"></div> 
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee ID</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="number" id="empIdEdit" name="empIdEdit" placeholder="ID" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Name</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="text" id="empNameEdit" name="empNameEdit" placeholder="Full Name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Password</label>

                                                            <div class="col-sm-10">
                                                                <input readonly="readonly" type="text" placeholder="Password " class="form-control" value="Use 'Change Pasword' Tab to change the password">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Mobile</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="number" id="empMobEdit" name="empMobEdit" placeholder="Number" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Sim</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="text" id="empSimEdit" name="empSimEdit" placeholder="Sim Alloted To Emp" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Email</label>
                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="email" id="empEmailEdit" name="empEmailEdit" placeholder="Email Alloted To Emp" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Hierarchy</label>
                                                            <div class="col-sm-10">
                                                                <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="hierarchyEdit" name="hierarchyEdit">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Service</label>
                                                            <div class="col-sm-10">
                                                                <select required onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="serviceEdit" name="serviceEdit"> <!-- populate from services table -->
                                                                </select>                                                        
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Address</label>
                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="text" placeholder="Full Address" id="fullAddrEdit" name="fullAddrEdit" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Group</label>
                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="grpEdit" name="grpEdit"> <!-- populate from grp table -->
                                                                </select>                                                              </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee's Team Lead</label>
                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1;
                                                                        this.blur();' class="form-control m-b" id="underTLEdit" name="underTLEdit"> <!-- populate from emp_table where hierarchy = 6 table -->
                                                                </select>                                                             
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee's Asst Sales Manager</label>

                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underASMEdit" name="underASMEdit"> <!-- populate from emp_table where hierarchy = 5 table -->
                                                                </select>                                                             
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee's Sales Manager</label>

                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="underSMEdit" name="underSMEdit"> <!-- populate from emp_table where hierarchy = 4 table -->

                                                                </select>                                                             
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee's Regional Manager</label>
                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1;
                                                                        this.blur();' class="form-control m-b" id="underRMEdit" name="underRMEdit"> <!-- populate from emp_table where hierarchy = 3 table -->
                                                                </select>                                                             
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee's Access Level</label>
                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="accessEdit" name="accessEdit"> <!-- populate from access_level table -->

                                                                </select>                                                             
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="table" value='employe_table'>
                                                        <div class="hr-line-dashed">
                                                        </div>

                                                    </form>  
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type='submit' class="btn btn-primary" name="editEmpBtn" id="editEmpBtn" value='Save Changes'>
                                                            <button class="btn btn-danger" name="delEmpBtn" id="delEmpBtn">Delete</button>
                                                            <button class="btn btn-default" id="reEnableBtn">Re-Enable</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-4" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll">
                                                    <div class="ibox-title">
                                                        <h3>Edit Group </h3>  

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Group ID</label>

                                                        <div class="col-sm-4">
                                                            <input required autocomplete='off' type="number" id="grpIdGive" name="grpIdGive" placeholder="Group ID" class="form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-primary" id="EditGrpIDBtn" >Edit</button>
                                                        </div>
                                                    </div>

                                                    <br><br>
                                                    <div class="hr-line-dashed"></div> 
                                                    <div class="hr-line-dashed"></div>
                                                    <form method="post" id="editGrpForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Group Name</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="text" id="grpNameEdit" name="grpNameEdit" placeholder="Name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Group Leader Employee ID</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="number" id="grpLeaderEdit" name="grpLeaderEdit" placeholder="Emp ID" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Parent Group Name</label>
                                                            <div class="col-sm-10">
                                                                <select onfocus='this.size = 5;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();' class="form-control m-b" id="parentGrp" name="parentGrp">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="table" value='employe_group_table'>
                                                        <div class="hr-line-dashed"></div>
                                                        <input type="hidden" name="grpEditHiddenID" id="grpEditHiddenID" value=''>
                                                    </form>  
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-primary" name="EditGrpBtn" id="EditGrpBtn">Save Changes</button>
                                                            <button class="btn btn-danger" name="delGrpBtn" id="delGrpBtn">Delete</button>
                                                            <button class="btn btn-default" id="reEnableBtnGrp">Re-Enable</button>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="table" value='employe_table'>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-5" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll">
                                                    <div class="ibox-title">
                                                        <h3>View Employees </h3>  

                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 
                                                                    <?php if (!empty($data['E'])) { ?>
                                                                        <?php foreach ($headers['E'] as $k => $v): ?>

                                                                            <th><?= $v ?>
                                                                            </th>

                                                                        <?php endforeach; ?>


                                                                    <?php } ?>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">

                                                                <?php if (!empty($data['E'])) { ?>

                                                                    <?php foreach ($data['E'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td>
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-6" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>View Groups </h3>  

                                                    </div>
                                                    <br>
                                                    <div class="dataTables_wrapper">
                                                        <table class="table dataTable table-bordered table-hover dataTables-example">
                                                            <thead>

                                                                <tr class="tableRowHead"> 
                                                                    <?php if (!empty($data['G'])) { ?>
                                                                        <?php foreach ($headers['G'] as $k => $v): ?>

                                                                            <th><?= $v ?>
                                                                            </th>

                                                                        <?php endforeach; ?>


                                                                    <?php } ?>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="modelRepDetails">

                                                                <?php if (!empty($data['G'])) { ?>

                                                                    <?php foreach ($data['G'] as $key => $value): ?>
                                                                        <tr>
                                                                            <?php foreach ($value as $k => $v): ?>
                                                                                <td>
                                                                                    <?= $v ?>
                                                                                </td>
                                                                            <?php endforeach; ?>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                        <div id="tab-7" class="tab-pane">
                                            <div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height: 100%;">
                                                <div class="full-height-scroll" style="overflow: auto; width: auto; height: 100%;">
                                                    <div class="ibox-title">
                                                        <h3>Change Password </h3>  
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Employee ID</label>

                                                        <div class="col-sm-4">
                                                            <input required autocomplete='off' type="number" id="empIdToEditPass" name="empIdToEditPass" placeholder="Emp ID" class="form-control">
                                                        </div>
                                                     
                                                    </div>
                                                    <form method="post" id="editPassForm" action="<?= ADMINURL ?>edp/editRep" class="form-horizontal">
                                                        <br>
                                                        <div class="hr-line-dashed"></div> 
                                                        <div class="hr-line-dashed"></div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Employee Password</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="password" id="empPassEdit" name="empPassEdit" placeholder="Password " class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Confirm Password</label>

                                                            <div class="col-sm-10">
                                                                <input required autocomplete='off' type="password" id="empPassConfEdit" name="empPassConfEdit" placeholder="Confirm Password " class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="hr-line-dashed">
                                                        </div>

                                                    </form>  
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type='submit' class="btn btn-primary" name="editPassBtn" id="editPassBtn" value='Save Changes'>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;">

                                                </div>
                                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                                </div>

                                            </div>
                                        </div>
                                    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= ADMINTHEME ?>scripts/functions.js"></script>



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
                                                                        $('#editPassBtn').click(function () {
                                                                            let pass = document.getElementById('empPassEdit').value;
                                                                            let confPass = document.getElementById('empPassConfEdit').value;
                                                                            if(pass != confPass){toastr.error('Passwords Do Not Match')}
                                                                          else{  $.ajax({
                                                                                url: admin_url + 'Edp/changePassword',
                                                                                method: 'post',
                                                                                dataType: 'json',
                                                                                data: {
                                                                                    emp_id: $('#empIdToEditPass').val(),
                                                                                    pass: $('#empPassEdit').val(),
                                                                                    confPass: $('#empPassConfEdit').val(),
                                                                                },
                                                                                success: function (data) {
                                                                                    if (data.success == true) {
                                                                                        toastr.success(data.message)
                                                                                        $('#empIdToEditPass').val(""),
                                                                                        $('#empPassEdit').val(""),
                                                                                        $('#empPassConfEdit').val("")
                                                                                    } else {
                                                                                        toastr.error(data.message)
                                                                                        $('#empIdToEditPass').val(""),
                                                                                        $('#empPassEdit').val(""),
                                                                                        $('#empPassConfEdit').val("")
                                                                                    }
                                                                                }, error: function () {
                                                                                        toastr.error('Error')
                                                                                }
                                                                            })}
                                                                        })
                                                                    });

    </script>



    <script>
        let selectAppender = function (selectID, chosen, value) {
            sel = document.getElementById(selectID);

// create new option element
            var opt = document.createElement('option');

// create text node to add to option element (opt)
            opt.appendChild(document.createTextNode(chosen));

// set value property of opt
            opt.value = value;

// add opt to end of select box (sel)
            //sel.removeChild(sel.options[0]);
            sel.appendChild(opt);
        }

        let getSelectOpt = function (table, col, idCol, selectBox) {
            // console.log(admin_url + 'selectAppenderAll');
            $.ajax({
                type: "POST",
                url: admin_url + 'edp/selectAppenderWithID',
                dataType: "JSON",
                data: {
                    col: col,
                    idCol: idCol,
                    table: table
                },
                success: function (data) {
                    $.each(data, function (key, val) {

                        selectAppender(selectBox, val[col], val[idCol])

                    })
                },
                error: function (err) {
                    toastr.error('loading Dropdown Error')
                }
            })
        }
        let whereJson = function (url, id, table, idParam) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: table,
                    idParam: idParam
                },
                success: function (data) {

                    $.each(data, function (key, val) {
                        document.getElementById("empIdEdit").value = val['employe_table_employe_id'];
                        document.getElementById("empNameEdit").value = val['employe_table_employe_name'];

                        document.getElementById("empMobEdit").value = val['employe_table_employe_mobile'];
                        document.getElementById("empSimEdit").value = val['employe_table_employe_SIM_given'];
                        document.getElementById("empEmailEdit").value = val['employe_table_employe_email'];
                        document.getElementById("fullAddrEdit").value = val['employe_table_employe_address'];

                        selectAppender('hierarchyEdit', val['employe_table_employe_hierarchy'], val['employe_table_employe_hierarchy_ID']);
                        selectAppender('serviceEdit', val['employe_table_employe_service_id'], val['employe_table_employe_service_id_ID']);
                        selectAppender('grpEdit', val['employe_table_employe_group_id'], val['employe_table_employe_group_id_ID']);
                        selectAppender('underTLEdit', val['under_TL_EmpId'], val['under_TL_EmpId_ID']);
                        selectAppender('underASMEdit', val['under_ASM_EmpId'], val['under_ASM_EmpId_ID']);
                        selectAppender('underSMEdit', val['under_SM_EmpId'], val['under_SM_EmpId_ID']);
                        selectAppender('underRMEdit', val['under_RM_EmpId'], val['under_RM_EmpId_ID']);
                        selectAppender('accessEdit', val['employe_table_access_level'], val['employe_table_access_level_ID']);


                    })
                    getSelectOpt('hierarchy', 'h_name', 'h_ID', 'hierarchyEdit');
                    getSelectOpt('services', 'services_name', 'services_id', 'serviceEdit');
                    getSelectOpt('employe_group_table', 'employe_group_table_name', 'employe_group_table_id', 'grpEdit');
                    getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underTLEdit', 'employe_table_employe_hierarchy', '6');
                    getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underASMEdit', 'employe_table_employe_hierarchy', '5');
                    getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underSMEdit', 'employe_table_employe_hierarchy', '4');
                    getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underRMEdit', 'employe_table_employe_hierarchy', '3');
                    getSelectOpt('access_control_list', 'access_name', 'access_controllers_value', 'accessEdit');

                },
                error: function (err) {
                    console.log(err)
                    toastr.error('error')
                }
                // error: function(){console.log('dfsf');}
            })



        };
        let whereGrpJson = function (url, id, table, idParam) {

            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    id: id,
                    table: table,
                    idParam: idParam
                },
                success: function (data) {
                    if (data == 0) {
                        toastr.error('Cannot Edit Root Group');
                    }

                    $.each(data, function (key, val) {
                        document.getElementById("grpNameEdit").value = val['employe_group_table_name'];
                        document.getElementById("grpLeaderEdit").value = val['employe_group_table_leader_employee_id'];

                        selectAppender('parentGrp', val['parent'], val['parent_ID']);


                    })
                    getSelectOptWhere('employe_group_table', 'employe_group_table_name', 'employe_group_table_id', 'parentGrp', 'employe_group_status', '1');

                },
                error: function (err) {
                    console.log(err)
                    toastr.error(err);
                }
            })



        };
        let getSelectOptWhere = function (table, col, idCol, selectBox, whParam, whVal) {
            // console.log(admin_url + 'selectAppenderAll');
            $.ajax({
                type: "POST",
                url: admin_url + 'edp/selectAppenderWithIDWhere',
                dataType: "JSON",
                data: {
                    col: col,
                    idCol: idCol,
                    table: table,
                    whereParam: whParam,
                    where: whVal
                },
                success: function (data) {
                    console.log(data);
                    $.each(data, function (key, val) {

                        selectAppender(selectBox, val[col], val[idCol])

                    })
                },
                error: function (err) {
                    toastr.error(err)
                }
            })
        }


        $(document).ready(function () {


            getSelectOpt('hierarchy', 'h_name', 'h_ID', 'hierarchy');
            getSelectOpt('services', 'services_name', 'services_id', 'service');
            getSelectOptWhere('employe_group_table', 'employe_group_table_name', 'employe_group_table_id', 'grp', 'employe_group_status', '1');
            getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underTL', 'employe_table_employe_hierarchy', '6');
            getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underASM', 'employe_table_employe_hierarchy', '5');
            getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underSM', 'employe_table_employe_hierarchy', '4');
            getSelectOptWhere('employe_table', 'employe_table_employe_name', 'employe_table_employe_id', 'underRM', 'employe_table_employe_hierarchy', '3');
            getSelectOpt('access_control_list', 'access_name', 'access_controllers_value', 'access');
// ADD GRP
            getSelectOptWhere('employe_group_table', 'employe_group_table_name', 'employe_group_table_id', 'parentGrpAdd', 'employe_group_status', '1');
            getSelectOptWhere('employe_table', 'employe_table_employe_id', 'employe_table_id', 'grpLeader', 'employe_table_employe_status', '1');


        })
        $('#empIDEditBtn').click(function () {
            $("#empIdEdit").empty();
            $("#empNameEdit").empty();

            $("#empMobEdit").empty();
            $("#empSimEdit").empty();
            $("#empEmailEdit").empty();
            $("#fullAddrEdit").empty();
            $("#hierarchyEdit").empty();
            $("#serviceEdit").empty();
            $("#grpEdit").empty();
            $("#underTLEdit").empty();
            $("#underASMEdit").empty();
            $("#underSMEdit").empty();
            $("#underRMEdit").empty();
            $("#accessEdit").empty();

            editId = document.getElementById("empIdGive").value;
            if (editId <=100) {
                toastr.error('Cannot Edit Root Employee');
                return;
            }
            whereJson('edp/whereJsoniser', editId, 'employe_table', 'employe_table_employe_id')
        })
        $('#EditGrpIDBtn').click(function () {
            $("#grpNameEdit").empty();
            $("#grpLeaderEdit").empty();
            $("#parentGrp").empty();

            editGrpId = document.getElementById("grpIdGive").value;
            document.getElementById("grpEditHiddenID").value = editGrpId
            if (editGrpId <=31) {
                toastr.error('Cannot Edit Root Group');
                return;
            }
            whereGrpJson('edp/whereGrpJsoniser', editGrpId, 'employe_group_table', 'employe_group_table_id')
        })


        $('#editEmpBtn').click(function () {
            document.getElementById("editEmpForm").submit();
        })
        $('#EditGrpBtn').click(function () {
            document.getElementById("editGrpForm").submit();
        })

        $('#delEmpBtn').click(function () {
            let toDelID = document.getElementById("empIdGive").value;
            let url = 'edp/tableValueDeleter'
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    toDelID: toDelID,
                    table: 'employe_table',
                    param: 'employe_table_employe_id'
                },
                success: function (data) {
                    console.log(1);
                    if (data == 0)
                    {   toastr.error("Emp cannot be deleted, Leader Not Empty!!");
                    }
                   else if (data == 1)
                    {  toastr.success("Employee Deleted!!!");
                        console.log('b')
                    setTimeout(function () {
                        window.location.replace('employees')
                    }, 50);
                    console.log('after')
                }
                    else
                    { toastr.error("Error");}
                    

                },
                error: function (err) {
                    toastr.error('Cannot Delete')
                }

            })
            // console.log(toDelID);
            //    window.location.href = window.location.href
        });
        $('#delGrpBtn').click(function () {
            let toDelID = document.getElementById("grpIdGive").value;
            let url = 'edp/tableValueDeleter'
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    toDelID: toDelID,
                    table: 'employe_group_table',
                    param: 'employe_group_table_id'
                },
                success: function (data) {
                    console.log(data)
                    if (data == 0)
                        toastr.error("Group cannot be deleted, Not Empty!!");
                    if (data == 1)
                        toastr.success("Group Deleted!!!");
                    else
                        toastr.error("Error");
                    setTimeout(function () {
                       window.location.replace('employees')
                    }, 50);
                },
                error: function (err) {
                    toastr.error('Error in Deleting')
                }

            })
            // console.log(toDelID);
            //    window.location.href = window.location.href
        });
        $('#reEnableBtn').click(function () {
            let toDelID = document.getElementById("empIdGive").value;
            let url = 'edp/tableValueReEnabler'
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    toDelID: toDelID,
                    table: 'employe_table',
                    param: 'employe_table_employe_id'
                },
                success: function (data) {

                    toastr.success("Employee Enabled!!!");

                    setTimeout(function () {
                        window.locationreplace('employees')
                    }, 100);

                },
                error: function (err) {
                    toastr.error('Cannot Delete')
                }

            })
            // console.log(toDelID);
            //    window.location.href = window.location.href
        });
        $('#reEnableBtnGrp').click(function () {
            let toDelID = document.getElementById("grpIdGive").value;
            let url = 'edp/tableValueReEnabler'
            $.ajax({
                type: "POST",
                url: admin_url + url,
                dataType: "JSON",
                data: {
                    toDelID: toDelID,
                    table: 'employe_group_table',
                    param: 'employe_group_table_id'
                },
                success: function (data) {

                    toastr.success("Group Enabled!!!");

                    setTimeout(function () {
                        window.locationreplace('employees')
                    }, 100);
                },
                error: function (err) {
                    toastr.error('Error in Deleting')
                }

            })
            // console.log(toDelID);
            //    window.location.href = window.location.href
        });

    </script>
    <script>

        // Function to check Whether both passwords 
        // is same or not. 
        function checkPassword(form) {
            password1 = form.empPass.value;
            password2 = form.empConf.value;

            // If password not entered 
            if (password1 == '')
                alert("Please enter Password");

            // If confirm password not entered 
            else if (password2 == '')
                alert("Please enter confirm password");

            // If Not same return False.     
            else if (password1 != password2) {
                alert("\nPassword did not match: Please try again...")
                return false;
            }

            // If same return True. 
            else {
                return true;
            }
        }

    </script> 





</body>
</html>
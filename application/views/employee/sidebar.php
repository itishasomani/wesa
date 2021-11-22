<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php 
    $employee = $this->employee_model->get_employee();
    foreach ($employee as $emp):?>
    <a href="<?php echo base_url('admin');?>" class="brand-link">
        <img src="<?php echo base_url('assets/backend/dist/img/Logo_1.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width:55px;height:55px">
        <span class="brand-text font-weight-light" style="text-transform: capitalize;"><?php echo  $emp['name']?> <?php echo  $emp['surname']?></span>
    </a>
        <?php endforeach;?>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">               
                <li class="nav-item <?php if($active == 'employee/dashboard'){echo 'menu-open';}?>">
                    <a href="<?php echo base_url('employee');?>" class="nav-link <?php if($active == 'employee/dashboard'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if($active == 'employee/employee'){echo 'menu-open';}?>">
                    <a href="#" class="nav-link <?php if($active == 'employee/employee'){echo 'active';}?>">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>                                
                        Admin
                        </p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/employee');?>" class="nav-link <?php if($active == 'employee/employee'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>                                
                                    Employee
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'employee/leave_management' || $active == 'employee/approve_request'){echo 'menu-open';}?>">
                    <a href="#" class="nav-link <?php if($active == 'employee/leave_management' || $active == 'employee/approve_request'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>                                
                        Vacation Management
                        </p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/leave_management');?>" class="nav-link <?php if($active == 'employee/leave_management'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>                                
                                    My Leave Request
                                </p>
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('employee/approve_request');?>" class="nav-link <?php if($active == 'employee/approve_request'){echo 'active';}?>">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>                                -->
                        <!--        Approve Leave Request-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'employee/view_my_assets' ){echo 'menu-open';}?>">
                    <a href="#" class="nav-link <?php if($active == 'employee/view_my_assets'){echo 'active';}?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                        Assets
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/my_assets');?>" class="nav-link  <?php if($active == 'employee/view_my_assets'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View My Assets</p>
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('employee/my_assets');?>" class="nav-link  <?php if($active == 'employee/my_assets'){echo 'active';}?>">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>My Assets</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'employee/procurement' || $active == 'employee/approve_procurement'){echo 'menu-open';}?>">
                    <a href="#" class="nav-link <?php if($active == 'employee/procurement' || $active == 'employee/approve_procurement'){echo 'active';}?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Procurement
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/procurement');?>" class="nav-link <?php if($active == 'employee/procurement'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>                                
                                    My Request
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/approve_procurement');?>" class="nav-link <?php if($active == 'employee/approve_procurement'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>                                
                                    Approve Request
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'employee/change_password'){echo 'menu-open';}?>" id="setting">
                    <a href="#" class="nav-link <?php if($active == 'employee/change_password'){echo 'active';}?>">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('employee/change-password');?>" class="nav-link <?php if($active == 'employee/change_password'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('login/logout');?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
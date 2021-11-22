<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <?php 
    $employee = $this->common_model->employee();
    foreach ($employee as $emp):?>
    <a href="<?php echo base_url('admin');?>" class="brand-link">
        <img src="<?php echo base_url('assets/backend/dist/img/Logo_1.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width:55px;height:55px">
        <span class="brand-text font-weight-light" style="text-transform: capitalize;"><?php echo  $emp['name']?> <?php echo  $emp['surname']?></span></span>
    </a>
 <?php endforeach;?>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php if(($_SESSION['emp_type']) == '4' || ($_SESSION['emp_type']) == '3'){?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">   
                
                    <li class="nav-item <?php if($active == 'dashboard'){echo 'menu-open';}?>" id="dashboard">
                        <a href="<?php echo base_url('admin');?>" class="nav-link <?php if($active == 'dashboard'){echo 'active';}?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                
                <li class="nav-item <?php if($active == 'employee'|| $active == 'assets' || $active == 'project' || $active == 'numberd_vacation'){echo 'menu-open';}?>" id="admin">
                    <a href="#" class="nav-link <?php if($active == 'employee'|| $active == 'assets' || $active == 'project' || $active == 'numberd_vacation'){echo 'active';}?>">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?php if($active == 'employee'){echo 'menu-open';}?>">
                            <a href="<?php echo base_url('admin/employee');?>" class="nav-link <?php if($active == 'employee'){echo 'active';}?>">
                            <i class="far fa-circle nav-icon"></i>
                                <p>Employee</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active == 'project'){echo 'menu-open';}?>">
                            <a href="<?php echo base_url('admin/project');?>" class="nav-link <?php if($active == 'project'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Task</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active == 'assets'){echo 'menu-open';}?>">
                            <a href="<?php echo base_url('admin/assets');?>" class="nav-link <?php if($active == 'assets'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assets</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active == 'numberd_vacation'){echo 'menu-open';}?>">
                            <a href="<?php echo base_url('admin/numberd_vacation');?>" class="nav-link <?php if($active == 'numberd_vacation'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Number of vacation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'my_leave_management' || $active == 'leave_management' || $active == 'approve_request' || $active == 'approve_manager_request'){echo 'menu-open';}?>" id="leave_management">
                    <a href="#" class="nav-link <?php if($active == 'my_leave_management' || $active == 'leave_management' || $active == 'approve_request' || $active == 'approve_manager_request'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                        Vacation Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/my_leave_management');?>" class="nav-link <?php if($active == 'my_leave_management'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>                                
                                    My Leave Request
                                </p>
                            </a>
                        </li>
                        <?php if(($_SESSION['emp_type']) == '3') {?>
                            <li class="nav-item" style="display:none">
                                <a href="<?php echo base_url('admin/leave-management');?>" class="nav-link <?php if($active == 'leave_management'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                        All Leave Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/approve_manager_request');?>" class="nav-link <?php if($active == 'approve_manager_request'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                    Approve Leave Request
                                    </p>
                                </a>
                            </li>
                        <?php }
                        else{?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/leave-management');?>" class="nav-link <?php if($active == 'leave_management'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                        All Leave Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/approve_request');?>" class="nav-link <?php if($active == 'approve_request'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                    Approve Leave Request
                                    </p>
                                </a>
                            </li>
                        <?php }
                        ?>
                        
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'my_assets' || $active == 'view_my_assets'){echo 'menu-open';}?>" id="assets">
                    <a href="#" class="nav-link <?php if($active == 'my_assets' || $active == 'view_my_assets'){echo 'active';}?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        Asset Tracking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/my_assets');?>" class="nav-link  <?php if($active == 'my_assets'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Assets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/view_my_assets');?>" class="nav-link  <?php if($active == 'view_my_assets'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Assets</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-item <?php if($active == 'budget' || $active == 'view_all_request' || $active == 'show_budget' || $active == 'procurement_request' || $active == 'all_request'){echo 'menu-open';}?>" id="financial_planing">
                    <a href="#" class="nav-link <?php if($active == 'budget' || $active == 'view_all_request'|| $active == 'show_budget' || $active == 'procurement_request' || $active == 'all_request'){echo 'active';}?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Financial Planing
                                <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?php if($active == 'view_all_request' || $active == 'procurement_request' ||  $active == 'all_request'){echo 'menu-open';}?>">
                            <a href="#" class="nav-link <?php if($active == 'view_all_request' || $active == 'procurement_request' ||  $active == 'all_request')?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Procurement</p>
                                 <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/view-all-request');?>" class="nav-link <?php if($active == 'view_all_request'){echo 'active';}?>">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>My Request</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/procurement_request');?>" class="nav-link <?php if($active == 'procurement_request'){echo 'active';}?>" >
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Approve Request</p>
                                    </a>
                                </li>
                                <?php if(($_SESSION['emp_type']) == '3'){?>
                                    <li class="nav-item" style="display:none;">
                                        <a href="<?php echo base_url('admin/all_request');?>" class="nav-link <?php if($active == 'all_request'){echo 'active';}?>" >
                                            <i class="fa fa-angle-double-right nav-icon"></i>
                                            <p>Manage All Request</p>
                                        </a>
                                    </li>
                                <?php }
                                else {?>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('admin/all_request');?>" class="nav-link <?php if($active == 'all_request'){echo 'active';}?>" >
                                            <i class="fa fa-angle-double-right nav-icon"></i>
                                            <p>Manage All Request</p>
                                        </a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active == 'budget' || $active == 'show_budget'){echo 'menu-open';}?>">
                            <a href="#" class="nav-link <?php if($active == 'budget' || $active == 'show_budget')?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Budgeting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/budget');?>" class="nav-link <?php if($active == 'budget'){echo 'active';}?>">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>View All Budget</p>
                                    </a>
                                </li>
                                <?php if(($_SESSION['emp_type']) == '3') {?>
                                <li class="nav-item" style="display:none">
                                    <a href="<?php echo base_url('admin/approve_budget');?>" class="nav-link <?php if($active == 'show_budget'){echo 'active';}?>">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Approve Budget</p>
                                    </a>
                                </li>
                                <?php }
                                else{?>
                                   <li class="nav-item" >
                                    <a href="<?php echo base_url('admin/approve_budget');?>" class="nav-link <?php if($active == 'show_budget'){echo 'active';}?>">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Approve Budget</p>
                                    </a>
                                </li> 
                                <?php }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($active == 'log'){echo 'menu-open';}?>" id="log">
                    <a href="<?php echo base_url('admin/log');?>" class="nav-link <?php if($active == 'log'){echo 'active';}?>">
                        <i class="nav-icon far fa-chart-bar"></i>
                        <p>
                             Activity log
                        </p>
                    </a>
                </li>
                
                <li class="nav-item <?php if($active == 'supply'){echo 'menu-open';}?>" id="supply">
                    <a href="<?php echo base_url('admin/supply');?>" class="nav-link <?php if($active == 'supply'){echo 'active';}?>">
                        <i class="nav-icon fa fa-dolly"></i>
                        <p>
                            Vendors
                        </p>
                    </a>
                </li>
                
                
                <li class="nav-item <?php if($active == 'change_password'){echo 'menu-open';}?>" id="setting">
                    <a href="#" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/change-password');?>" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
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
            <?php }
            else if(($_SESSION['emp_type']) == '6'){?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                    <li class="nav-item <?php if($active == 'dashboard'){echo 'menu-open';}?>" id="dashboard">
                        <a href="<?php echo base_url('admin');?>" class="nav-link <?php if($active == 'dashboard'){echo 'active';}?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($active == 'employee'){echo 'menu-open';}?>" id="admin">
                        <a href="#" class="nav-link <?php if($active == 'employee'){echo 'active';}?>">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Admin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php if($active == 'employee'){echo 'menu-open';}?>">
                                <a href="<?php echo base_url('admin/employee');?>" class="nav-link <?php if($active == 'employee'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Employee</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if($active == 'numberd_vacation'){echo 'menu-open';}?>">
                                <a href="<?php echo base_url('admin/numberd_vacation');?>" class="nav-link <?php if($active == 'numberd_vacation'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Number of vacation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if($active == 'my_leave_management' || $active == 'approve_hr_request' || $active == 'leave_management'){echo 'menu-open';}?>" id="leave_management">
                        <a href="#" class="nav-link <?php if($active == 'my_leave_management' || $active == 'approve_hr_request' || $active == 'leave_management'){echo 'active';}?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                            Vacation Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                             <li class="nav-item">
                                <a href="<?php echo base_url('admin/my_leave_management');?>" class="nav-link <?php if($active == 'my_leave_management'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                        My Leave Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/leave-management');?>" class="nav-link <?php if($active == 'leave_management'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                        All Leave Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/approve_hr_request');?>" class="nav-link <?php if($active == 'approve_hr_request'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                    Approve Leave Request
                                    </p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item <?php if($active == 'my_assets' || $active == 'view_my_assets'){echo 'menu-open';}?>" id="assets">
                        <a href="#" class="nav-link <?php if($active == 'my_assets' || $active == 'view_my_assets'){echo 'active';}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                            Asset Tracking
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!--<li class="nav-item">-->
                            <!--    <a href="<?php echo base_url('admin/my_assets');?>" class="nav-link  <?php if($active == 'my_assets'){echo 'active';}?>">-->
                            <!--        <i class="far fa-circle nav-icon"></i>-->
                            <!--        <p>My Assets</p>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/view_my_assets');?>" class="nav-link  <?php if($active == 'view_my_assets'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Assets</p>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    <li class="nav-item <?php if($active == 'view_all_request' || $active == 'procurement_request'){echo 'menu-open';}?>">
                       <a href="#" class="nav-link <?php if($active == 'view_all_request' || $active == 'procurement_request')?>">
                            <i class="nav-icon fa fa-dolly"></i>
                            <p>Procurement</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/view-all-request');?>" class="nav-link <?php if($active == 'view_all_request'){echo 'active';}?>">
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>My Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/procurement_request');?>" class="nav-link <?php if($active == 'procurement_request'){echo 'active';}?>" >
                                    <i class="fa fa-angle-double-right nav-icon"></i>
                                    <p>Approve Request</p>
                                </a>
                           </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if($active == 'change_password'){echo 'menu-open';}?>" id="setting">
                        <a href="#" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/change-password');?>" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
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
            <?php }
            else if (($_SESSION['emp_type']) == '2' || ($_SESSION['emp_type']) == '5'){?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                    <li class="nav-item <?php if($active == 'dashboard'){echo 'menu-open';}?>" id="dashboard">
                        <a href="<?php echo base_url('admin');?>" class="nav-link <?php if($active == 'dashboard'){echo 'active';}?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($active == 'employee'){echo 'menu-open';}?>" id="admin">
                        <a href="#" class="nav-link <?php if($active == 'employee'){echo 'active';}?>">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Admin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php if($active == 'employee'){echo 'menu-open';}?>">
                                <a href="<?php echo base_url('admin/employee');?>" class="nav-link <?php if($active == 'employee'){echo 'active';}?>">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if($active == 'my_leave_management' || $active == 'leave_management' || $active == 'approve_manager_request'){echo 'menu-open';}?>" id="leave_management">
                        <a href="#" class="nav-link <?php if($active == 'my_leave_management' || $active == 'leave_management' || $active == 'approve_manager_request'){echo 'active';}?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                            Vacation Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/my_leave_management');?>" class="nav-link <?php if($active == 'my_leave_management'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                        My Leave Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/approve_manager_request');?>" class="nav-link <?php if($active == 'approve_manager_request'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                    Approve Leave Request
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if( $active == 'view_my_assets'){echo 'menu-open';}?>" id="assets">
                        <a href="#" class="nav-link <?php if( $active == 'view_my_assets'){echo 'active';}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                            Asset Tracking
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/view_my_assets');?>" class="nav-link  <?php if($active == 'view_my_assets'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Assets</p>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    <li class="nav-item <?php if($active == 'view_all_request' || $active == 'advisor_request' || $active == 'procurement_manager_request' || $active == 'all_request'){echo 'menu-open';}?>" id="financial_planing">
                        <a href="#" class="nav-link <?php if($active == 'view_all_request' || $active == 'advisor_request' || $active == 'procurement_manager_request' || $active == 'all_request'){echo 'active';}?>">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Procurement
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/view-all-request');?>" class="nav-link <?php if($active == 'view_all_request'){echo 'active';}?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>My Request</p>
                                </a>
                            </li>
                            <?php if (($_SESSION['emp_type']) == '5'){?>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/procurement_manager_request');?>" class="nav-link <?php if($active == 'procurement_manager_request'){echo 'active';}?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>                                
                                        Approve Request
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/all_request');?>" class="nav-link <?php if($active == 'all_request'){echo 'active';}?>" >
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage All Request</p>
                                    </a>
                                </li>
                            <?php }
                            else if (($_SESSION['emp_type']) == '2'){
                            ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/procurement_request');?>" class="nav-link <?php if($active == 'procurement_request'){echo 'active';}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>                                
                                    Approve Request
                                    </p>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php if (($_SESSION['emp_type']) == '5'){?>
                    <li class="nav-item <?php if($active == 'log'){echo 'menu-open';}?>" id="log">
                        <a href="<?php echo base_url('admin/log');?>" class="nav-link <?php if($active == 'log'){echo 'active';}?>">
                            <i class="nav-icon far fa-chart-bar"></i>
                            <p>
                                 Activity log
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item <?php if($active == 'supply'){echo 'menu-open';}?>" id="supply">
                        <a href="<?php echo base_url('admin/supply');?>" class="nav-link <?php if($active == 'supply'){echo 'active';}?>">
                            <i class="nav-icon fa fa-dolly"></i>
                            <p>
                                Vendors
                            </p>
                        </a>
                    </li>
                    <?php }?>
                    <li class="nav-item <?php if($active == 'change_password'){echo 'menu-open';}?>" id="setting">
                        <a href="#" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/change-password');?>" class="nav-link <?php if($active == 'change_password'){echo 'active';}?>">
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
            <?php }?>
        </nav>
    </div>
</aside>
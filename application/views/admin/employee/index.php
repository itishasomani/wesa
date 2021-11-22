        <!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php $get_msg = $this->message->get_message() ?>
                <?php if(!empty($get_msg)):?>
                <?php echo $get_msg;?>
                <?php endif; ?>
                <form method="post" action="" id="filterForm">
                    <div class="form-group d-flex">
                        <div style="width:16%;position:relative;">
                            <select class="form-control" name="name" id="Name">
                                <option value="">Name</option>
                                <?php foreach($employees as $emp):?>
                                    <option value="<?php echo $emp['id'];?>"><?php echo $emp['name']?> <?php echo $emp['surname']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <div style="width:16%;position:relative;">
                            <select class="form-control" name="title" id="employee">
                                <option value="">Job title</option>
                                <?php $title = $this->common_model->title_group();?>
                                <?php foreach($title as $emp):?>
                                    <option value="<?php echo $emp['title'];?>"><?php echo $emp['title']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <div style="width:16%;position:relative;">
                            <select class="form-control" name="approver_1" id="Manager">
                                <option value="">Manager</option>
                                <?php foreach($employees as $emp):?>
                                    <option value="<?php echo $emp['id'];?>"><?php echo $emp['name']?> <?php echo $emp['surname']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <div style="width:16%;position:relative;">
                            <select class="form-control" name="department" id="Department">
                                <option value="">Department</option>
                                <option>Director</option>
                                <option>Administrative</option>
                                <option>Quality Management System </option>
                                <option>Engineering</option>
                                <option>Construction</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2">Search</button>
                    </div>
                </form>
                <?php if(($_SESSION['emp_type']) == '4' || ($_SESSION['emp_type']) == '6'){?>
                     <div class="d-flex justify-content-end mb-2" >
                        <a href="<?php echo base_url('admin/add-employee'); ?>" class="btn btn-dark" >Add</a>
                    </div>
                <?php }else {?>
                    <div class="d-flex justify-content-end mb-2">
                        <a href="<?php echo base_url('admin/add-employee'); ?>" class="btn btn-dark" style="display:none;">Add</a>
                    </div>
                <?php }?>
                <div class="row mt-5" id="All_Employee">
                    <?php if(!empty($employees)):?>
                        <?php foreach($employees as $employee): ?>
                                <div class="col-sm-6 col-md-6 mb-1">
                               <?php
        
                                    $currentDate = date('Y-m-d');
                                    foreach($leave_detail as $date) {
                                        $from_date = $date['from'];
                                        $to_date = $date['leave_to'];
                                    
                                    $name = $date['name'];
                                    $currentDate = date('Y-m-d', strtotime($currentDate));
                                    $startDate = date('Y-m-d', strtotime($from_date));
                                    $endDate = date('Y-m-d', strtotime($to_date));
                                    $insert1 = array(
                                        'vacation' => 1,
                                    );
                                    $insert2 = array(
                                        'vacation' => 0,
                                    );
                                    if ($currentDate == $startDate  && $name == $employee['name']){
                                                $this->db->where('name',$name);
                                                $this->db->update('emp_tbl',$insert1) ;
                                                echo "<a class='vacation_tag'><span>V</span></a>";
                                                
                                    }
                                    else{    
                                                $this->db->where('name',$name);
                                                $this->db->update('emp_tbl',$insert2) ;
                                        } 
                    
                                }
                            ?>
                            <div class="info-box p-3">
                                <span>
                                    <img src="<?php echo base_url('assets/backend/dist/img/')?><?php echo $employee['image'];?>" style="width:70px;height:70px;" class="border rounded-circle" alt="">
                                </span>
                                <div class="info-box-content pl-2">
                                    <h6 class="text p-1"><span class="text-bold">FULL NAME :</span> <?php echo $employee['name'];?> <?php echo $employee['surname'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">Function :</span> 
                                        <?php echo $employee['emp_type'];?>
                                    </h6>
                                    <h6 class="text p-1"><span class="text-bold">DEPARTMENT : </span><?php echo $employee['department'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">EMAIL :</span> <?php echo $employee['email'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">PHONE NO : </span><?php echo $employee['phone'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">MANAGER : </span><?php echo get_emp_by_id($employee['approver_1'])['name'];?> <?php echo get_emp_by_id($employee['approver_1'])['surname'];?></h6>
                                </div>
                                <?php if(($_SESSION['emp_type']) == '4' || ($_SESSION['emp_type']) == '6'){?>
                                    <div class="info-box-icon_">
                                        <a href="<?php echo base_url('admin/employee/edit_employee/'.$employee['id'])?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/employee/delete_employee/'.$employee['id'])?>" onclick="return confirm('Are you sure want to Delete this Employee?')"><i class="fa fa-trash"></i></a>
                                    </div>
                                <?php } else {?>
                                   <div class="info-box-icon_" style="display:none;">
                                    <a href="<?php echo base_url('admin/employee/edit_employee/'.$employee['id'])?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin/employee/delete_employee/'.$employee['id'])?>" onclick="return confirm('Are you sure want to Delete this Employee?')"><i class="fa fa-trash"></i></a>
                                </div> 
                                <?php } ?>
                                
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else:?>
                        <p class="text-center d-block w-100">No record found</p>
                    <?php endif;?>
                </div>
            </div>
        </section>
    </div>

<!-- Footer -->
<?php $this->load->view('footer'); ?>
<!-- / Footer -->
<script>
    $("#filterForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            // name: 'required',
            // job_title: 'required',
            // manager: 'required',
            // department: 'required'
        }
    });
</script>
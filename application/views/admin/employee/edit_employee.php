<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
  <style>
 #project-manager{
     display:none;
 }
 </style>   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Employee</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/employee');?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Employee</li>
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
                <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form  method="post" action="<?php echo base_url('admin/employee-edit');?>" id="editEmployee" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name</label>
                                            <input type="text" id="exampleInputName" name="name" class="form-control" placeholder="Name" value="<?php echo $employee['name'];?>">
                                            <input type="hidden" name="id" value="<?php echo $employee['id'];?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputSurname">Surname</label>
                                            <input type="text" id="exampleInputSurname" name="surname" class="form-control" placeholder="Surname" value="<?php echo $employee['surname'];?>">
                                        </div>
                                        
                                        <!--<div class="form-group" id="project-manager">-->
                                        <!--<label for="exampleInputNameEmpID">Project Manager</label>-->
                                        <!--<select name="project_manager" id="Project_manager" class="form-control input-lg">-->
                                        <!--    <option value="Project Manager">Project Manager</option>-->
                                        <!--        <?php foreach($projects as $project):?>-->
                                        <!--            <option value="<?php $project['name']?>"><?= $project['name']?></option>-->
                                        <!--        <?php  endforeach?>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Job Title</label>
                                            <input type="text" id="Manager" name="title" class="form-control" placeholder="Job Title" value="<?php echo $employee['title'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Department</label>
                                            <select name="department" id="Department" class="default form-control input-lg">
                                                <option selected disabled>Department</option>
                                                <option <?php if($employee['department'] == 'Science'){echo 'selected';}?> value="Science">Science</option>
                                                <option <?php if($employee['department'] == 'Administrative'){echo 'selected';}?> value="Administrative">Administrative</option>
                                                <option <?php if($employee['department'] == 'Quality Management System'){echo 'selected';}?> value="Quality Management System">Quality Management System</option>
                                                <option <?php if($employee['department'] == 'Engineering'){echo 'selected';}?> value="Engineering">Engineering</option>
                                                <option <?php if($employee['department'] == 'Construction'){echo 'selected';}?> value="Construction">Professional Education</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Approver 1 (Direct Manager)</label>
                                            <select name="approver_1" id="Approver" class="default form-control input-lg">
                                                <!--<option selected disabled>Manager</option>-->
                                                <?php foreach($approver_1 as $emp){?>
                                                <option <?php if($employee['approver_1'] == $emp['id']){echo 'selected';}?> value="<?= $emp['id']?>"><?= $emp['name']?> <?= $emp['surname']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername">HR Manager</label>
                                            <select name="manager" id="Manager" class="default form-control input-lg">
                                                <!--<option selected disabled>Manager</option>-->
                                                <?php foreach($manager as $emp){?>
                                                <option <?php if($employee['manager'] == $emp['id']){echo 'selected';}?> value="<?= $emp['id']?>"><?= $emp['name']?> <?= $emp['surname']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Approver 2 (Director)</label>
                                            <select name="director" id="Approver" class="default form-control input-lg">
                                                <!--<option selected disabled>Manager</option>-->
                                                <?php foreach($director as $emp){?>
                                                <option <?php if($employee['director'] == $emp['id']){echo 'selected';}?> value="<?= $emp['id']?>"><?= $emp['name']?> <?= $emp['surname']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputNameEmpID">Function</label>
                                            <select name="emp_type" id="EmpType" class="default form-control input-lg" onchange="showDiv(this)">
                                                    <?php foreach($emp_type as $type):?>
                                                        <option <?php if($employee['emp_type'] == $type['id']){echo 'selected';}?> value="<?=$type['id']?>"><?=$type['emp_type']?></option>
                                                    <?php  endforeach?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputUsername">Username</label>-->
                                        <!--    <input type="text" id="exampleInputUsername" name="username" class="form-control" placeholder="Username" value="<?php echo $employee['username'];?>">-->
                                        <!--</div>-->
                                        <?php $password = $employee['password']; 
                                            $pass =$this->encryption->decrypt($password);
                                        ?>
                                         <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" id="exampleInputPassword" name="password" class="form-control" placeholder="Password" value="<?php echo $pass;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email ID</label>
                                            <input type="email" id="exampleInputEmail" name="email" class="form-control" placeholder="Email ID" value="<?php echo $employee['email'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Phone no</label>
                                            <input type="tel" id="exampleInputEmail" name="phone" class="form-control" placeholder="+994 (50) 123 45 67"   value="<?php echo $employee['phone'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Employment Start Date</label>
                                            <input type="date" id="exampleInputEmail" name="start_date" class="form-control" placeholder="Employment Start Date" value="<?php echo $employee['start_date'] ?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail">Education  (Eg: Bachelors, Masters, Professional Education) </label>
                                            <input type="text" id="exampleInputEmail" name="education" class="form-control" placeholder="Education" value="<?php echo $employee['education'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Training/Certificate (Eg: Lean Six Sigma Green Belt, PMI, Scrum Master) </label>
                                            <input type="text" id="exampleInputEmail" name="training" class="form-control" placeholder="Training/Certificate" value="<?php echo $employee['training']?>">
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputEmail">Certificate</label>-->
                                        <!--    <input type="text" id="exampleInputEmail" name="certificate" class="form-control" placeholder="certificate" value="<?php echo $employee['certificate'];?>" >-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputImage">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="image" id="exampleInputImage" accept="image/*">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="exampleInputEmail" name="vacation" value="0" class="form-control" >
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?php echo base_url('admin/employee');?>" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>

<!-- Footer -->
<?php $this->load->view('footer'); ?>
<!-- / Footer -->

<script>
    $("#editEmployee").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            surname:'required',
            emp_id: 'required',
            emp_type:'required',
            // username: 'required',
            password: 'required',
            email_id: 'required',
            phone:'required',
            position: 'required',
            department:'required',
            // education:'required',
            // training:'required',
            // certificate:'required'
        }
    });   
    function showDiv(element)
    {
        document.getElementById('project-manager').style.display = element.value == '1' ? 'block' : 'none';
    }
</script>
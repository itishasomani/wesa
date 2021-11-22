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
                    <?php $get_msg = $this->message->get_message() ?>
                    <?php if(!empty($get_msg)):?>
                    <?php echo $get_msg;?>
                    <?php endif; ?>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Employee</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/employee');?>">Home</a></li>
                            <li class="breadcrumb-item active">Add Employee</li>
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
               
                <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                
                                <form  method="post" action="<?php echo base_url('admin/add_employee');?>" id="addEmployee" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <input type="hidden" id="exampleInputName" name="role" value="employee" class="form-control" placeholder="Name">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name</label>
                                            <input type="text" id="exampleInputName" name="name" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSurname">Surname</label>
                                            <input type="text" id="exampleInputSurname" name="surname" class="form-control" placeholder="Surname">
                                        </div>
                                        
                                        <!--<div class="form-group" id="project-manager">-->
                                        <!--<label for="exampleInputNameEmpID">Project Manager</label>-->
                                        <!--<select name="project_manager"  class="form-control input-lg">-->
                                        <!--    <option value="Project Manager">Project Manager</option>-->
                                        <!--        <?php foreach($projects as $project):?>-->
                                        <!--            <option value="<?php $project['name']?>"><?= $project['name']?></option>-->
                                        <!--        <?php  endforeach?>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Job Title</label>
                                            <input type="text" id="Manager" name="title" class="form-control" placeholder="Job Title">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail">Department</label>
                                            <select name="department" id="Department" class="default form-control input-lg">
                                                <option selected disabled>Department</option>
                                                <option value="Science">Science</option>
                                                <option value="Administrative">Administrative</option>
                                                <option value="Quality Management System">Quality Management System </option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Construction">Construction</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Approver 1 (Direct Manager)</label>
                                            <select name="approver_1" id="Approver" class="default form-control input-lg">
                                                <option selected disabled>Direct Manager</option>
                                                <?php foreach($approver_1 as $emp){?>
                                                <option value="<?= $emp['id']?>"><?php echo $emp['name'];?> <?php echo $emp['surname'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputUsername"> HR Manager </label>
                                            <select name="manager" id="Manager" class="default form-control input-lg">
                                                <option value="manager">HR Manager</option>
                                                <?php foreach($manager as $manage){?>
                                                <option value="<?= $manage['id']?>"><?php echo $manage['name'];?> <?php echo $manage['surname'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputUsername">Approver 2 (Director)</label>
                                            <select name="director" id="Director" class="default form-control input-lg">
                                                <option selected disabled>Manager</option>
                                                <?php foreach($director as $director){?>
                                                <option value="<?= $director['id']?>"><?php echo $director['name'];?> <?php echo $director['surname'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputNameEmpID">Function</label>
                                        <!--<select name="emp_type" id="EmpType" class="default form-control input-lg" onchange="showDiv(this)">-->
                                        <select name="emp_type" id="EmpType" class="default form-control input-lg" >
                                                <option selected disabled>Employee Type</option>
                                                <?php foreach($emp_type as $type):?>
                                                    <option value="<?=$type['id']?>"><?=$type['emp_type']?></option>
                                                <?php  endforeach?>
                                        </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputUsername">Username</label>-->
                                        <!--    <input type="text" id="Username" name="username" class="form-control" placeholder="Username">-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" id="exampleInputPassword" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email ID</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email ID">
                                        </div>
                                        <span id="email_result"></span>  
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Phone no</label>
                                            <input type="tel" id="exampleInputEmail" name="phone" class="form-control" placeholder="+994 (50) 123 45 67" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Employment Start Date</label>
                                            <input type="date" id="exampleInputEmail" name="start_date" class="form-control" placeholder="Employment Start Date">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail">Education  (Eg: Bachelors, Masters, Professional Education) </label>
                                            <input type="text" id="exampleInputEmail" name="education" class="form-control" placeholder="Education">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Training/Certificate (Eg: Lean Six Sigma Green Belt, PMI, Scrum Master) </label>
                                            <input type="text" id="exampleInputEmail" name="training" class="form-control" placeholder="Training/Certificate">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputImage">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="image" id="exampleInputImage" accept="image/*" onChange='getFileNameWithExt(event)'>
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
                                        <button type="submit" class="btn btn-primary">Save</button>
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
    $("#addEmployee").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            surname: 'required',
            emp_id: 'required',
            emp_type:'required',
            password: 'required',
            email: 'required',
            phone:'required',
            position: 'required',
            department:'required',
            title:'required',
        }
    });

function getFileNameWithExt(event) {

  if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
    return;
  }

  const name = event.target.files[0].name;
  const lastDot = name.lastIndexOf('.');

  const fileName = name.substring(0, lastDot);
  const ext = name.substring(lastDot + 1);
    if(ext == 'jpg' || ext == 'png' || ext == 'jpeg'){
        $(".input-group").after(fileName ,'<p class="text-success">Image added succesfully</p>');
    }
    else{
        $(".input-group").after('<p class="text-danger">Invalid Image</p>');
    }
    
}
</script>
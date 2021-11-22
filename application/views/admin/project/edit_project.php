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
                        <h1 class="m-0">Edit Project</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/project');?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Project</li>
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
                                <form  method="post" action="<?php echo base_url('admin/project-edit');?>" id="editProject" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <input type="hidden" name="id" value="<?php echo $project['id'];?>">
                                        <div class="form-group">
                                            <label for="exampleInputTaskName">Task Name</label>
                                            <input type="text" id="exampleInputName" name="task_name" class="form-control" value="<?php echo $project['task_name'];?>" placeholder="Task Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address 1</label>
                                            <input type="text" id="exampleInputAddress" name="address_1" class="form-control" value="<?php echo $project['address_1'];?>" placeholder="Address 1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address 2</label>
                                            <input type="text" id="exampleInputAddress" name="address_2" class="form-control" value="<?php echo $project['address_2'];?>" placeholder="Address 2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address 3</label>
                                            <input type="text" id="exampleInputAddress" name="address_3" class="form-control" value="<?php echo $project['address_3'];?>" placeholder="Address 3">
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputName">Employees</label>-->
                                        <!--    <select name="emp_name[]" class="form-control" id="name" multiple>-->
                                                <?php foreach($employee as $emp):
                                                   $name =  explode(',',$project['emp_name']);
                                                   foreach($name as $name):
                                                ?>
                                                <?php endforeach?>
                                                <?php endforeach?>
                                                    <!--<option <?php if($name == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>-->
                                                
                                        <!--    </select>-->
                                           
                                        <!--</div>-->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="<?php echo base_url('admin/project');?>" class="btn btn-primary">Cancel</a>
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
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
    $("#editProject").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            task_name: 'required',
            address_1: 'required',
            emp_name: 'required'
        }
    });
    $("#name").chosen({
        no_results_text: "Oops, nothing found!"
    });
</script>
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
                        <h1 class="m-0">Add Budget</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/budget');?>">Home</a></li>
                            <li class="breadcrumb-item active">Add Budget</li>
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
                                <form method="post" action="<?php echo base_url('admin/budget/import_csv');?>" id="addBudget" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <a href="<?php echo base_url('admin/budget/download_csv');?>" class="btn btn-primary mb-4">Download CSV</a>
                                        <div class="form-group">
                                            <label for="exampleInputNameEmpID">Task</label>
                                            <select name="task" id="task" class="form-control input-lg">
                                                <option value="">Task</option>
                                                    <?php foreach($tasks as $task):?>
                                                        <option value="<?=$task['id']?>"><?=$task['task_name']?></option>
                                                    <?php  endforeach?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $director = $this->common_model->get_employee_by_director()?>
                                             <?php foreach($directors as $director):?>
                                                <input type="hidden" name="director" class="form-control input-lg" value="<?=$director['id']?>">
                                             <?php  endforeach?>
                                        </div>
                                        <div class="form-group">
                                            <label for="manager">Manager</label>
                                            <select name="manager" id="manager" class="form-control input-lg">
                                                <option value="">Manager</option>
                                                    <?php foreach($managers as $manager):?>
                                                        <option value="<?=$manager['id']?>"><?=$manager['name']?> <?=$manager['surname']?></option>
                                                    <?php  endforeach?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputDateBackToWork" >Item</label>-->
                                        <!--    <input name="item" id="item" class="form-control" placeholder="Item"></input> -->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputTemplate">Upload template</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="file" accept=".csv"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <!--<button type="submit" name="importSubmit" class="btn btn-primary">Save</button>-->
                                        <input type="submit" class="btn btn-primary" name="importSubmit" value="Save">
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
    $("#addBudget").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            task: 'required',
            director: 'required',
            manager: 'required',
            file: 'required',
        }
    });
</script>
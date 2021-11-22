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
                        <h1 class="m-0">Project</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Home</a></li>
                            <li class="breadcrumb-item active">Project</li>
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
                <div class="form-group d-flex">
                    <select class="form-control" name="task_name" id="task_name" style="width:20%">
                        <option selected="selected" disabled="disabled" value="">Task name</option>
                            <!--<option value="all" id="all">All</option>-->
                            <?php foreach($projects as $name):?>
                                <option><?php echo $name['task_name']?></option>
                        <?php endforeach?>
                    </select>
                    <!--<select class="form-control" name="c_owner" id="employee" style="width:20%">-->
                    <!--    <option selected="selected" disabled="disabled" value="">Employee</option>-->
                    <!--        <?php foreach($projects as $emp):?>-->
                    <!--            <option value="<?php echo $emp['emp_name'];?>"><?php echo get_emp_by_id($emp['emp_name'])['name'];?> <?php echo get_emp_by_id($emp['emp_name'])['surname'];?></option>-->
                    <!--    <?php endforeach?>-->
                    <!--</select>-->
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <a href="<?php echo base_url('admin/add-project'); ?>" class="btn btn-dark">Add</a>
                </div>
                <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="project" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Task Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Address 1</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Address 2</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Address 3</th>
                                                            <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Employee</th>-->
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="project">
                                                    <?php $i = 1; ?>
                                                        <?php foreach($projects as $project): ?>
                                                            <tr class="odd">
                                                                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                                <td><?php echo $project['task_name'];?></td>
                                                                <td><?php echo $project['address_1'];?></td>
                                                                <td><?php echo $project['address_2'];?></td>
                                                                <td><?php echo $project['address_3'];?></td>
                                                                <!--<td>-->
                                                                <!--<?php $name =  explode(',',$project['emp_name']);
                                                                   foreach($name as $name){
                                                                ?>-->
                                                                <!--<?php echo get_emp_by_id($name)['name'];?> <?php echo get_emp_by_id($name)['surname'];?>,-->
                                                                <!--<?php }?>-->
                                                                <!--</td>-->
                                                                <td>
                                                                    <a href="<?php echo base_url('admin/project/edit_project/'.$project['id'])?>" class="btn btn-success">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="<?php echo base_url('admin/project/delete_project/'.$project['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                    <?php if($project['task'] == '1'){?>
                                                                        <a href="<?php echo base_url('admin/project/task/'.$project['id'])?>" class="btn btn-primary" style="display:none">End</a>
                                                                    <?php }
                                                                    else if(empty($project['task'])){?>
                                                                        <a href="<?php echo base_url('admin/project/task/'.$project['id'])?>" class="btn btn-primary">End</a>
                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S. No.</th>
                                                            <th rowspan="1" colspan="1">Task Name</th>
                                                            <th rowspan="1" colspan="1">Address 1</th>
                                                            <th rowspan="1" colspan="1">Address 2</th>
                                                            <th rowspan="1" colspan="1">Address 3</th>
                                                            <!--<th rowspan="1" colspan="1">Employee</th>-->
                                                            <th rowspan="1" colspan="1">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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
    $(document).ready(function() {
    $('#project').DataTable();
} );
 $(document).ready(function(){  
      $('#task_name').change(function(){   
           get_data();
      });  
 });  
function get_data(){
     var task_name = $('#task_name').val();
     $.ajax({  
            url:"Project/task_filter",  
            data:"task_name=" + task_name,
            success:function(data){  
                 $('.project').html(data);  
            }  
          });  
 }
 $(document).ready(function(){  
      $('#employee').change(function(){   
          get_emp();
      });  
 });  
function get_emp(){
     var emp_name = $('#employee').val();
     $.ajax({  
            url:"Project/employee_filter",  
            data:"emp_name=" + emp_name,
            success:function(data){  
                 $('.project').html(data);  
            }  
          });  
 }
</script>
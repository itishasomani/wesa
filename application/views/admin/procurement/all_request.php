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
                            <h1 class="m-0">Procurement Management</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/view-all-request')?>">Home</a></li>
                                <li class="breadcrumb-item active">Procurement Management</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php $get_msg = $this->message->get_message() ?>
                    <?php if(!empty($get_msg)):?>
                    <?php echo $get_msg;?>
                    <?php endif; ?>
                    <div class="d-flex flex-wrap justify-content-between align-items-end">
                        <form method="post" action="" id="csvForm" class="d-flex flex-wrap align-items-end mb-4">
                            <div class="mr-2 position-relative">
                                <lable>Start date</lable>
                                <input type="date" name="start_date" class="form-control" data-date-format="DD MM YYYY" value="<?php if(isset($start_date)){echo $start_date;}?>">
                            </div>
                            <div class="mr-2 position-relative">
                                <lable>End date</lable>
                                <input type="date" name="end_date" class="form-control" placeholder="End date" value="<?php if(isset($end_date)){echo $end_date;}?>">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">CSV Download</button>
                        </form>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-end">
                        <form method="post" action="" id="filter" class="d-flex flex-wrap align-items-end mb-4">
                            <div class="mr-1 position-relative">
                                <select class="form-control" name="task" id="task" >
                                    <option selected="selected" disabled="disabled" value="">Task</option>
                                    <?php $task = $this->common_model->get_project()?>
                                        <?php foreach($task as $req):?>
                                            <option value="<?php echo $req['id']?>"><?php echo $req['task_name']?></option>
                                        <?php endforeach?>
                                </select>
                            </div>
                            <div class="mr-1 position-relative">
                                <select class="form-control" name="name" id="name" >
                                    <option selected="selected" disabled="disabled" value="">Requestor </option>
                                        <?php foreach($request as $req):?>
                                            <option value="<?php echo $req['name']?>"><?php echo get_emp_by_id($req['name'])['name'];?> <?php echo get_emp_by_id($req['name'])['surname'];?></option>
                                        <?php endforeach?>
                                </select>
                            </div>
                             <div class="mr-1 position-relative">
                                <select class="form-control" name="b_category" id="b_category" >
                                    <option selected="selected" disabled="disabled" value="">Budget Category </option>
                                        <?php $budget = $this->common_model->budget(); ?>
                                        <?php foreach($budget as $req):?>
                                            <option value="<?php echo $req['category']?>"><?php echo $req['category']?></option>
                                        <?php endforeach?>
                                </select>
                            </div>
                            <div class="mr-1 position-relative">
                                <select class="form-control" name="supplier" id="supplier" >
                                    <option selected="selected" disabled="disabled" value="">Final Supplier</option>
                                        <?php foreach($request as $req):?>
                                            <option value="<?php echo $req['supplier']?>"><?php echo $req['supplier']?></option>
                                        <?php endforeach?>
                                </select>
                            </div>
                            <button type="submit" name="action" value="submit" class="btn btn-primary">Search</button>
                        </form>
                        <!--<a href="<?php echo base_url('admin/add_leave_management'); ?>" class="btn btn-dark mb-4">Add</a>-->
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
                                                <table id="all_request" class="table table-bordered table-striped dataTable dtr-inline table-responsive " role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">S.No</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Task</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Budget category</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Requestor</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Item</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Quantity</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Price</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Final Supplier</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Add Approver</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Quotations</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Confirmed Received</th>
                                                            <?php if(($_SESSION['emp_type']) == '5'){?>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Complete Status</th>
                                                            <?php }?>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $i =1;
                                                    foreach($request as $req):?>
                                                        <tr class="odd">
                                                            <td><?php echo $i++;?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/procurement/manage_procurement/'.$req['id'])?>">
                                                                    <?php echo $req['task']?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $req['b_category']?></td>
                                                            <td><?php echo get_emp_by_id($req['name'])['name'];?> <?php echo get_emp_by_id($req['name'])['surname'];?></td>
                                                            <td><?php echo $req['item']?></td>
                                                            <td><?php echo $req['quantity']?></td>
                                                            <td><?php echo $req['price']?></td>
                                                            <td><?php echo $req['supplier']?></td>
                                                            <td><?php echo get_emp_by_id($req['add_approver'])['name'];?> <?php echo get_emp_by_id($req['add_approver'])['surname'];?></td>
                                                            <td><?php echo $req['qutation']?></td>
                                                            <td>
                                                                    <?php if ($req['status_1'] == '1' ){
                                                                    ?>
                                                                    <p>Ap1: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($req['status_1'] == '0') {?>
                                                                        <p>Ap 1: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($req['status_1'])) {?>
                                                                        <p>Ap 1: <?php echo 'Pending';?></p>
                                                                <?php }?>
                                                                    
                                                                    <?php if ($req['status_3'] == '1' ){
                                                                    ?>
                                                                    <p>Ap 2: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($req['status_3'] == '0') {?>
                                                                        <p>Ap 2: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($req['status_3'])) {?>
                                                                        <p>Ap 2: <?php echo 'Pending';?></p>
                                                                    <?php }?>
                                                                    
                                                                    <?php if ($req['status'] == '1' ){
                                                                    ?>
                                                                    <p>Ap 3: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($req['status'] == '0') {?>
                                                                        <p>Ap 3: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($req['status'])) {?>
                                                                        <p>Ap 3: <?php echo 'Pending';?></p>
                                                                    <?php }?>
                                                            </td>
                                                            <td>
                                                                <?php if($req['received'] == '1') { ?>
                                                                    <a>Yes</a>
                                                                <?php }
                                                                else if($req['received'] == '0'){?>
                                                                    <a>No</a>
                                                                <?php }
                                                                else if(empty($req['received'])){?>
                                                                    <a>Pending</a>
                                                                <?php }?>
                                                            </td>
                                                            <?php if($_SESSION['emp_type'] == '5'){?>
                                                            <td>
                                                                <?php if($req['director_status_second_1'] == '1' && empty($req['complete'])){?>
                                                                    <a href="<?php echo base_url('admin/procurement/complete/'.$req['id'])?>" class="btn btn-primary">
                                                                        Complete
                                                                    </a>
                                                                <?php }
                                                                else if($req['director_status_second_1'] == '0' || empty($req['director_status_second_1'])){?>
                                                                    <a>Pending</a>
                                                                <?php }
                                                                else if($req['status'] == '1' && $req['complete'] == 'completed'){
                                                                ?>
                                                                    <a>Completed</a>
                                                                <?php }?>
                                                            </td>
                                                            <?php }?>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/procurement/all_procurement/'.$req['id'])?>" class="btn btn-success">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                                <a href="<?php echo base_url('admin/procurement/delete_all/'.$req['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                                <!--<a href="<?php echo base_url('admin/procurement/view_all/'.$req['id'])?>" class="btn btn-primary">-->
                                                                <!--    <i class="far fa-eye"></i>-->
                                                                <!--</a>-->
                                                            </td>
                                                    
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.No</th>
                                                            <th rowspan="1" colspan="1">Task</th>
                                                            <th rowspan="1" colspan="1">Budget category</th>
                                                            <th rowspan="1" colspan="1">Requestor</th>
                                                            <th rowspan="1" colspan="1">Item</th>
                                                            <th rowspan="1" colspan="1">Quantity</th>
                                                            <th rowspan="1" colspan="1">Price</th>
                                                            <th rowspan="1" colspan="1">Final Supplier</th>
                                                            <th rowspan="1" colspan="1">Add Approver</th>
                                                            <th rowspan="1" colspan="1">Quotations</th>
                                                            <th rowspan="1" colspan="1">Status</th>
                                                            <th rowspan="1" colspan="1">Confirmed Received</th>
                                                            <?php if(($_SESSION['emp_type']) == '5'){?>
                                                            <th rowspan="1" colspan="1">Complete Status</th>
                                                            <?php }?>
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
        $('#all_request').DataTable();
    });
    
    $("#csvForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            start_date: 'required',
            end_date: 'required'
        }
    });
</script>
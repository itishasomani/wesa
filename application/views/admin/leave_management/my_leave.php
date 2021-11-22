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
                        <h1 class="m-0">Leave Management</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                            <li class="breadcrumb-item active">Leave Management</li>
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
                <div class="d-flex flex-wrap justify-content-between align-items-end">
                    <form method="post" action="" id="filterForm" class="d-flex flex-wrap align-items-end mb-4">
                        <div class="mr-2 position-relative">
                            <lable>Start date</lable>
                            <input type="date" name="start_date" class="form-control" value="<?php if(isset($start_date)){echo $start_date;}?>">
                        </div>
                        <div class="mr-2 position-relative">
                            <lable>End date</lable>
                            <input type="date" name="end_date" class="form-control" placeholder="End date" value="<?php if(isset($end_date)){echo $end_date;}?>">
                        </div>
                        <!--<div class="mr-1 position-relative">-->
                        <!--    <select class="form-control" name="name" id="name" >-->
                        <!--        <option selected="selected" disabled="disabled" value="">Name</option>-->
                        <!--        <?php $leave = $this->common_model->get_all_leave_detail();?>-->
                        <!--            <?php foreach($leave as $leave):?>-->
                        <!--                <option value="<?php echo $leave['name'];?>"><?php echo get_emp_by_id($leave['name'])['name'];?> <?php echo get_emp_by_id($leave['name'])['surname'];?></option>-->
                        <!--            <?php endforeach?>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <!--<div class="mr-1 position-relative">-->
                        <!--    <select class="form-control" name="leave_type" id="leave_type" >-->
                        <!--        <option selected="selected" disabled="disabled" value="">Leave Type</option>-->
                        <!--            <?php $leave = $this->common_model->get_leave_type();?>-->
                        <!--            <?php foreach($leave as $leave):?>-->
                        <!--                <option value="<?php echo $leave['leave_type'];?>"><?php echo $leave['leave_type']; ?></option>-->
                        <!--            <?php endforeach?>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <!--<div class="mr-1 position-relative">-->
                        <!--    <select class="form-control" name="replacement" id="replacement" >-->
                        <!--        <option selected="selected" disabled="disabled" value="">Replacement</option>-->
                        <!--        <?php $leave = $this->common_model->get_all_leave_detail();?>-->
                        <!--            <?php foreach($leave as $leave):?>-->
                        <!--                <option value="<?php echo $leave['replacement'];?>"><?php echo $leave['emp_name'];?> <?php echo $leave['emp_surname'];?></option>-->
                        <!--            <?php endforeach?>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <a href="<?php echo base_url('admin/add_leave_management'); ?>" class="btn btn-dark mb-4">Add</a>
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
                                                <table id="leave" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Leave Type</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Dates</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Days</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Replacement</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Current Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Comment</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                        <?php foreach($leave_detail as $leave): ?>
                                                            <tr class="odd">
                                                                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                                <td><?php echo get_emp_by_id($leave['name'])['name'];?> <?php echo get_emp_by_id($leave['name'])['surname'];?></td>
                                                                <td><?php echo $leave['leave_type'];?></td>
                                                                <td><?php echo $leave['from'];?> to <?php echo $leave['leave_to'];?></td>
                                                                <td><?php echo $leave['days'];?></td>
                                                                <td><?php echo $leave['emp_name'];?> <?php echo $leave['emp_surname'];?></td>
                                                                <td>
                                                                    
                                                                    <?php if ($leave['status'] == '1' ){
                                                                    ?>
                                                                    <p>Direct Manager: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($leave['status'] == '0') {?>
                                                                        <p>Direct Manager: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($leave['status'])) {?>
                                                                        <p>Direct Manager: <?php echo 'Pending';?></p>
                                                                    <?php }?>
                                                                    
                                                                    <?php if ($leave['status_2'] == '1' ){
                                                                    ?>
                                                                    <p>HR Manager: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($leave['status_2'] == '0') {?>
                                                                        <p>HR Manager: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($leave['status_2'])) {?>
                                                                        <p>HR Manager: <?php echo 'Pending';?></p>
                                                                    <?php }?>
                                                                    
                                                                    
                                                                    <?php if ($leave['status_1'] == 'Approve' ){
                                                                    ?>
                                                                    <p>Director: <?php echo 'Approved';?></p>
                                                                    <?php }
                                                                    else if($leave['status_1'] == 'Reject') {?>
                                                                        <p>Director: <?php echo 'Rejected';?></p>
                                                                    <?php }
                                                                    else if(empty($leave['status_1'])) {?>
                                                                        <p>Director: <?php echo 'Pending';?></p>
                                                                    <?php }?>
                                                                </td>
                                                                <td><?php echo $leave['comment'];?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url('admin/leave_management/edit_leave/'.$leave['id'])?>" class="btn btn-success">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    
                                                                    <a href="<?php echo base_url('admin/leave_management/delete_leave/'.$leave['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                    <?php if ($_SESSION['emp_type']=='4' && $leave['status'] == '1' && $leave['status_2'] == '1' && $leave['status_1'] == 'Approve' ){
                                                                    ?>
                                                                    <a href="<?php echo base_url('admin/leave_management/pdf/'.$leave['id'])?>" class="btn btn-primary" target="_blank">
                                                                        <i class="fa fa-file-pdf"></i>
                                                                    </a>
                                                                    <?php } else if($_SESSION['emp_type'] !='4' && $leave['status'] == '1' && $leave['status_2'] == '1' && $leave['status_1'] == 'Approve' ){?>
                                                                    <a href="<?php echo base_url('admin/leave_management/download_pdf/'.$leave['id'])?>" class="btn btn-primary" target="_blank">
                                                                        <i class="fa fa-file-pdf"></i>
                                                                    </a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S. No.</th>
                                                            <th rowspan="1" colspan="1">Name</th>
                                                            <th rowspan="1" colspan="1">Leave Type</th>
                                                            <th rowspan="1" colspan="1">Dates</th>
                                                            <th rowspan="1" colspan="1">Days</th>
                                                            <th rowspan="1" colspan="1">Replacement</th>
                                                            <th rowspan="1" colspan="1">Current Status</th>
                                                            <th rowspan="1" colspan="1">Comment</th>
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
        $('#leave').DataTable();
    });
    
    $("#filterForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        // rules:{
        //     start_date: 'required',
        //     end_date: 'required'
        // }
    });
</script>
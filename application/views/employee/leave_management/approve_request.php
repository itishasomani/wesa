<!-- Header -->
<?php $this->load->view('employee/header'); ?>
<!-- / Header -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Approved request</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('employee/leave_management')?>">Home</a></li>
                            <li class="breadcrumb-item active">Approved request</li>
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
                <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="approve" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Requestor</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Leave Type</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Dates</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date back to work</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Days</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Replacement</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($approve as $approve_leave) :?>
                                                            <tr>
                                                                <td><?php echo get_emp_by_id($approve_leave['name'])['name'];?> <?php echo get_emp_by_id($approve_leave['name'])['surname'];?></td>
                                                                <td><?php echo $approve_leave['leave_type']?></td>
                                                                <td><?php echo $approve_leave['from']?> to <?php echo $approve_leave['leave_to']?></td>
                                                                <td><?php echo $approve_leave['back_to']?></td>
                                                                <td><?php echo $approve_leave['days']?></td>
                                                                <td><?php echo $approve_leave['emp_name']?> <?php echo $approve_leave['emp_surname'];?></td>
                                                                
                                                                <td id="status">
                                                                    <?php if($_SESSION['id'] == $approve_leave['approver'] ) { ?>
                                                                        <?php if($approve_leave['status'] =='1'){?>
                                                                                <a>Approved</a>
                                                                            <?php }
                                                                            else if($approve_leave['status'] =='0'){?>
                                                                                <a>Rejected</a>
                                                                            <?php }
                                                                            else if(empty($approve_leave['status'])){?>
                                                                                <a href="<?php echo base_url('employee/leave_management/approve/'.$approve_leave['id'])?>" id="approve" class="btn btn-success">Approve</a> <a href="<?php echo base_url('employee/leave_management/reject/'.$approve_leave['id'])?>" id="reject" class="btn btn-danger"> Reject</a>
                                                                            <?php }?>
                                                                    <?php }
                                                                    else if($_SESSION['id'] == $approve_leave['approver_two']){?>
                                                                        <?php if($approve_leave['status_1'] =='1'){?>
                                                                            <a>Approved</a>
                                                                        <?php }
                                                                        else if($approve_leave['status_1'] =='0'){?>
                                                                            <a>Rejected</a>
                                                                        <?php }
                                                                        else if(empty($approve_leave['status_1'])){?>
                                                                            <a href="<?php echo base_url('employee/leave_management/approve_two/'.$approve_leave['id'])?>" id="approve_two" class="btn btn-success">Approve</a><a href="<?php echo base_url('employee/leave_management/reject_two/'.$approve_leave['id'])?>" id="reject_two" class="btn btn-danger">Reject</a>
                                                                        <?php }?>
                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                                
                                                                <td><?php echo $approve_leave['comment']?></td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">Requestor</th>
                                                            <th rowspan="1" colspan="1">Leave Type</th>
                                                            <th rowspan="1" colspan="1">Dates</th>
                                                            <th rowspan="1" colspan="1">Date back to work</th>
                                                            <th rowspan="1" colspan="1">Days</th>
                                                            <th rowspan="1" colspan="1">Replacement</th>
                                                            <th rowspan="1" colspan="1">Action</th>
                                                            <th rowspan="1" colspan="1">Comment</th>
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
<?php $this->load->view('employee/footer'); ?>
<!-- / Footer -->
<script type="text/javascript">
// $(document).ready(function(){
//     $("#approve").click(function(){
//         $('#approve ').css("color", "green");
//     });
//     $("#reject").click(function(){
//         $("#status").css("color", "green");
//     });
// });
$(document).ready(function() {
    $('#approve').DataTable();
} );
</script>

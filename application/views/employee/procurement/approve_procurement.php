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
                            <h1 class="m-0">Procurement Management</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('employee')?>">Home</a></li>
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
                   
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="approve_procurment" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Task</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Budget category</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Requestor</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Item</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Quantity</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Unit</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                            <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($request as $req):?>
                                                        <?php if($_SESSION['id'] == $req['direct_manager']){?>
                                                            <tr class="odd">
                                                            <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                                <td>
                                                                    <?php echo $req['task']?>
                                                                </td>
                                                                <td><?php echo $req['b_category']?></td>
                                                                <td><?php echo get_emp_by_id($req['name'])['name'];?> <?php echo get_emp_by_id($req['name'])['surname'];?></td>
                                                                <td><?php echo $req['item']?></td>
                                                                <td><?php echo $req['quantity']?></td>
                                                                <td><?php echo $req['unit']?></td>
                                                                
                                                                
                                                                <td>
                                                                   <?php
                                                                    if($req['status_1'] =='1' && empty($req['status_3'])){?>
                                                                        First Request: Approved     
                                                                        <br>
                                                                        <br>
                                                                        Second Request : Pending
                                                                    <?php }
                                                                    else if($req['status_1'] =='0' && $req['status_3'] == '0'){?>
                                                                        <a>First Request : Rejected</a>
                                                                        <br>
                                                                        <br>
                                                                        Second Request : Pending
                                                                     <?php } 
                                                                     else if(empty($req['status_1'])){?>
                                                                        First Request: <a href="<?php echo base_url('employee/procurement/approve/'.$req['id'])?>" id="approve" class="btn btn-success">Approve</a> <a href="<?php echo base_url('employee/procurement/reject/'.$req['id'])?>" id="reject" class="btn btn-danger"> Reject</a>
                                                                        <br>
                                                                        <br>
                                                                        Second Request : Pending
                                                                    <?php }
                                                                     else if($req['status_1'] =='1' && $req['status_second_1'] =='1'){?>
                                                                        First Request : Approved
                                                                        <br>
                                                                        <br>
                                                                        Second Request : Approved
                                                                    <?php }
                                                                    else if($req['status_1'] =='1' && $req['status_second_1'] == '0'){?>
                                                                        First Request : Approved
                                                                        <br>
                                                                        <br>
                                                                        Second Request : Rejected
                                                                    <?php }
                                                                    else if($req['status_1'] =='1' && $req['status_3'] == '1'){?>
                                                                        First Request : Approved
                                                                        <br>
                                                                        <br>
                                                                        Second Request : <a href="<?php echo base_url('employee/procurement/approve_second/'.$req['id'])?>" id="approve" class="btn btn-success">Approve</a> <a href="<?php echo base_url('employee/procurement/reject_second/'.$req['id'])?>" id="reject" class="btn btn-danger"> Reject</a>
                                                                    <?php }?>
                                                                   
                                                                </td>
                                                                
                                                                <!--<td>-->
                                                                <!--    <a href="<?php echo base_url('employee/procurement/edit_approve_procurement/'.$req['id'])?>" class="btn btn-success">-->
                                                                <!--        <i class="far fa-edit"></i>-->
                                                                <!--    </a>-->
                                                                <!--</td>-->
                                                            </tr>
                                                        <?php }elseif($_SESSION['id'] == $req['add_approver']){?>
                                                        <tr class="odd">
                                                            <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                                <td>
                                                                    <?php echo $req['task']?>
                                                                </td>
                                                                <td><?php echo $req['b_category']?></td>
                                                                <td><?php echo get_emp_by_id($req['name'])['name'];?> <?php echo get_emp_by_id($req['name'])['surname'];?></td>
                                                                <td><?php echo $req['item']?></td>
                                                                <td><?php echo $req['quantity']?></td>
                                                                <td><?php echo $req['unit']?></td>
                                                                
                                                                <td>
                                                                    <?php if($req['approver_status'] == '0'){?>
                                                                        Rejected
                                                                    <?php }
                                                                    else if($req['approver_status'] == '1'){?>
                                                                        Approved
                                                                    <?php }
                                                                    else if($req['approver_status'] == ""){?>
                                                                         <a href="<?php echo base_url('employee/procurement/approverapproveprocurement/'.$req['id'])?>" class="btn btn-success">Approve</a>
                                                                         <a href="<?php echo base_url('employee/procurement/approverrejectprocurement/'.$req['id'])?>" class="btn btn-danger">Reject</a>
                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                                <!--<td>-->
                                                                <!--    <a href="<?php echo base_url('employee/procurement/edit_approve_procurement/'.$req['id'])?>" class="btn btn-success">-->
                                                                <!--        <i class="far fa-edit"></i>-->
                                                                <!--    </a>-->
                                                                <!--</td>-->
                                                            </tr>
                                                        <?php }?>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S. No.</th>
                                                            <th rowspan="1" colspan="1">Task</th>
                                                            <th rowspan="1" colspan="1">Budget category</th>
                                                            <th rowspan="1" colspan="1">Requestor</th>
                                                            <th rowspan="1" colspan="1">Item</th>
                                                            <th rowspan="1" colspan="1">quantity</th>
                                                            <th rowspan="1" colspan="1">Unit</th>
                                                            <th rowspan="1" colspan="1">Status</th>
                                                            <!--<th rowspan="1" colspan="1">Action</th>-->
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
<script>
    $(document).ready(function() {
    $('#approve_procurment').DataTable();
} );
</script>

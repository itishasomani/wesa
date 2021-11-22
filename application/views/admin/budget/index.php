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
                            <h1 class="m-0">View All Budget</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Home</a></li>
                                <li class="breadcrumb-item active">View All Budget</li>
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
                    <form method="post" action="" id="filterForm">
                        <div class="form-group d-flex">
                            <div style="width:16%;position:relative;">
                                <select class="form-control" name="task" id="task">
                                    <option value="" disabled selected>Task</option>
                                    <?php foreach($budgets as $budget):?>
                                        <option value="<?php echo $budget['task']?>"><?php echo $budget['task'];?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end mb-2">
                        <a href="<?php echo base_url('admin/add_budget'); ?>" class="btn btn-dark">Add</a>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="budget" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Task</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Amount</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Uploaded by</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Current status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Date</th>
                                                             <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Comment</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i =1?>
                                                    <?php foreach($budgets as $budget):?>
                                                        <tr class="odd">
                                                            <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/budget/show_budget/'.$budget['task_id'])?>">
                                                                    <?php echo $budget['task']?>
                                                                </a>
                                                        
                                                            </td>
                                                            <td><?php echo $budget['max_total_amount']?></td>
                                                            <td><?php echo get_emp_by_id($budget['upload_by'])['name'];?> <?php echo get_emp_by_id($budget['upload_by'])['surname'];?></td>
                                                            <td>
                                                                <?php if ($budget['status'] == '1') {?>
                                                                    <a>Approved</a>
                                                                <?php }
                                                                else if ($budget['status'] == '0') {?>
                                                                    <a>Rejected</a>
                                                                <?php }
                                                                 else if (empty($budget['status'] )) {?>
                                                                 <a>Under Review</a>
                                                                 <?php }?>
                                                            </td>
                                                            <?php if($budget['approve_date'] =='0000-00-00'){?>
                                                                <td></td>
                                                            <?php }
                                                            else{?>
                                                            <td><?php echo $budget['approve_date']?></td>
                                                            <?php }?>
                                                            <td><?php echo $budget['comment'];?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/budget/delete/'.$budget['task_id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                            
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S. No.</th>
                                                            <th rowspan="1" colspan="1">Task</th>
                                                            <th rowspan="1" colspan="1">Total Amount</th>
                                                            <th rowspan="1" colspan="1">Uploaded by</th>
                                                            <th rowspan="1" colspan="1">Current status</th>
                                                            <th rowspan="1" colspan="1">Date</th>
                                                            <th rowspan="1" colspan="1">Comment</th>
                                                            <th rowspan="1" colspan="1">Action</th>
                                                            <!--<th rowspan="1" colspan="1">Comment</th>-->
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
    $("#csvForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            file: 'required',
        }
    });
    $(document).ready(function() {
    $('#budget').DataTable();
} );
</script>
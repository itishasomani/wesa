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
                        <h1 class="m-0">Number of vacation</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                            <li class="breadcrumb-item active">Number of vacation</li>
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
                <div class="d-flex justify-content-end mb-2d">
                    <a href="<?php echo base_url('admin/vacation_form'); ?>" class="btn btn-dark mb-4 ">Add</a>
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
                                            <table id="leave" class="table table-bordered table-striped dataTable " role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                        <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date</th>-->
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Employee</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">No. of Leave</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($leave_detail as $leave):?>
                                                    <tr class="odd">
                                                        <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                        <!--<td><?php echo $leave['c_date']?></td>-->
                                                        <td><?php echo get_emp_by_id($leave['name'])['name'];?> <?php echo get_emp_by_id($leave['name'])['surname'];?></td>
                                                        <td><?php echo $leave['v_leave']?></td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">S. No.</th>
                                                        <!--<th rowspan="1" colspan="1">Date</th>-->
                                                        <th rowspan="1" colspan="1">Employee</th>
                                                        <th rowspan="1" colspan="1">No. of Leave</th>
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
</script>
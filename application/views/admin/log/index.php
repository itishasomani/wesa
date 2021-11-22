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
                            <h1 class="m-0">Activity Log</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/log');?>">Home</a></li>
                                <li class="breadcrumb-item active">Activity Log</li>
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
                                                <table id="example1" class=" table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Module</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Task</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Activity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="asset_table">
                                                        <?php $i =1;
                                                        foreach($log as $log):
                                                        ?>
                                                        <tr >
                                                            <td><?php echo $i++?></td>
                                                            <td><?php echo $log['date']?></td>
                                                            <td><?php echo get_emp_by_id($log['upload_by'])['name'];?> <?php echo get_emp_by_id($log['upload_by'])['surname'];?></td>
                                                            <td>Budget</td>
                                                            <td><?php echo $log['task']?></td>
                                                            <td>
                                                                <?php if ($log['status'] == '1') {?>
                                                                    <a>Upload</a>
                                                                <?php }
                                                                else if ($log['status'] == '0') {?>
                                                                    <a>Reject</a>
                                                                <?php }
                                                                 else if (empty($log['status'] )) {?>
                                                                 <a>Pending</a>
                                                                 <?php }?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.No</th>
                                                            <th rowspan="1" colspan="1">Date</th>
                                                            <th rowspan="1" colspan="1">Name</th>
                                                            <th rowspan="1" colspan="1">Module</th>
                                                            <th rowspan="1" colspan="1">Task</th>
                                                            <th rowspan="1" colspan="1">Activity</th>
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

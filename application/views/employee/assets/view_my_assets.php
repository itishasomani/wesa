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
                            <h1 class="m-0">View My Assets</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('employee')?>">Home</a></li>
                                <li class="breadcrumb-item active">View My Assets</li>
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
                    <!--<div class="d-flex justify-content-end mb-2">-->
                    <!--    <a href="<?php echo base_url('employee/assets'); ?>" class="btn btn-dark">Add</a>-->
                    <!--</div>-->
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="assets" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Assets ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Assets Type</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created By</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Current Owner</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Purchase Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Assign Date</th>
                                                            <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!--<?php $i = 1; ?>-->
                                                        <?php foreach($assets as $asset):?>
                                                        <tr class="odd">
                                                            <td class="dtr-control" tabindex="0"><?php echo $asset['id'];?></td>
                                                            <td><?php echo $asset['asset_type'];?></td>
                                                            <td><?php echo $asset['created_by'];?></td>
                                                            <td><?php echo $asset['name'];?> <?php echo get_emp_by_id($asset['c_owner'])['surname'];?></td>
                                                            <td><?php echo $asset['purchase_date'];?></td>
                                                            <td><?php echo $asset['assign_date'];?></td>
                                                            <!--<td>-->
                                                            <!--    <a href="<?php echo base_url('employee/assets/show_assets/'.$asset['id'])?>" class="btn btn-success">-->
                                                            <!--        <i class="far fa-edit"></i>-->
                                                            <!--    </a>-->
                                                                <!--<a href="<?php echo base_url('employee/assets/delete_assets/'.$asset['id'])?>" class="btn btn-danger">-->
                                                                <!--    <i class="far fa-trash-alt"></i>-->
                                                                <!--</a>-->
                                                            <!--</td>-->
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">Assets ID</th>
                                                            <th rowspan="1" colspan="1">Assets Type</th>
                                                            <th rowspan="1" colspan="1">Created By</th>
                                                            <th rowspan="1" colspan="1">Current Owner</th>
                                                            <th rowspan="1" colspan="1">Purchase Date</th>
                                                            <th rowspan="1" colspan="1">Assign Date</th>
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
    $('#assets').DataTable();
} );
</script>
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
                            <h1 class="m-0">View Vendor</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                                <li class="breadcrumb-item active">View Vendor</li>
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
                    <div class="d-flex justify-content-end mb-2">
                        <a href="<?php echo base_url('admin/add_supply'); ?>" class="btn btn-dark">Add</a>
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
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.no</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Vendor Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tin</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tax group</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Trusted/NA/Untrusted</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i =1; ?>
                                                        <?php foreach($supply as $supply):?>
                                                            <tr class="odd">
                                                                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                                <td><?php echo $supply['v_name'];?></td>
                                                                <td><?php echo $supply['tin'];?></td>
                                                                <td><?php echo $supply['t_group'];?></td>
                                                                <td><?php echo $supply['type'];?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url('admin/supply/edit_supply/'.$supply['id'])?>" class="btn btn-success">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="<?php echo base_url('admin/supply/delete_supply/'.$supply['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </td>
                                                        <?php endforeach;?>
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.no</th>
                                                            <th rowspan="1" colspan="1">Vendor Name</th>
                                                            <th rowspan="1" colspan="1">Tin</th>
                                                            <th rowspan="1" colspan="1">Tax group</th>
                                                            <th rowspan="1" colspan="1">Trusted/NA/Untrusted</th>
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
<script></script>
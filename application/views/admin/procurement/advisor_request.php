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
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
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
                    <div class="d-flex justify-content-end mb-2">
                        <a href="<?php echo base_url('admin/procurement'); ?>" class="btn btn-dark">Add</a>
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
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S. No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Task</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Budget category</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Item</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Quantity</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Unit</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Confirmed Received</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($request as $req):?>
                                                        <tr class="odd">
                                                        <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/procurement/show_procurement/'.$req['id'])?>">
                                                                    <?php echo $req['task']?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $req['b_category']?></td>
                                                            <td><?php echo $req['item']?></td>
                                                            <td><?php echo $req['quantity']?></td>
                                                            <td><?php echo $req['unit']?></td>
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
                                                                <a href="" class="btn">Yes</a>/<a href="" class="btn">No</a>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/procurement/edit_procurement/'.$req['id'])?>" class="btn btn-success">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                                <a href="<?php echo base_url('admin/procurement/delete_procurement/'.$req['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
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
                                                            <th rowspan="1" colspan="1">Budget category</th>
                                                            <th rowspan="1" colspan="1">Item</th>
                                                            <th rowspan="1" colspan="1">quantity</th>
                                                            <th rowspan="1" colspan="1">Unit</th>
                                                            <th rowspan="1" colspan="1">Status</th>
                                                            <th rowspan="1" colspan="1">Confirmed Received</th>
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

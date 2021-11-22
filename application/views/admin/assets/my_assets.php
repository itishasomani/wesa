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
                            <h1 class="m-0">View My Assets</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/my_assets');?>">Home</a></li>
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
                    <!--    <a href="<?php echo base_url('admin/assets'); ?>" class="btn btn-dark">Add</a>-->
                    <!--</div>-->
                    <div class="row">
                        <?php foreach($my_assets as $asset) :?>
                        <div class="col-sm-6 col-md-6 mb-1">
                            <div class="info-box p-3">
                                <span>
                                    <img src="<?php echo base_url('assets/backend/dist/upload/')?><?php echo $asset['image'];?>" style="width: 100px;" class="" alt="">
                                </span>
                                <div class="info-box-content pl-3">
                                    <h6 class="text p-1"><span class="text-bold">Assets ID :</span> <?php echo $asset['id'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">Assets Type :</span> <?php echo $asset['asset_type'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">Purchase Date : </span><?php echo $asset['purchase_date'];?></h6>
                                    <h6 class="text p-1"><span class="text-bold">Current Owner :</span> <?php echo $asset['name'];?> <?php echo get_emp_by_id($asset['c_owner'])['surname'];?> </h6>
                                    <h6 class="text p-1"><span class="text-bold">Created By : </span><?php echo $asset['created_by'];?></h6>
                                </div>
                                <div class="info-box-icon_">
                                    <a href="<?php echo base_url('admin/assets/show_assets/'.$asset['id'])?>" class="btn btn-success">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin/assets/deleteassets/'.$asset['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </section>
</div>
<!-- Footer -->
<?php $this->load->view('footer'); ?>
<!-- / Footer -->
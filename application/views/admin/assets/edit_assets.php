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
                            <h1 class="m-0">Edit Assets</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/view_my_assets');?>">Home</a></li>
                                <li class="breadcrumb-item active">Edit Assets</li>
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
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form method="post" action="<?php echo base_url('admin/edit_assets');?>" id="editAssets" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Assets Type</label>
                                            <input type="text" id="exampleInputName" name="asset_type" value="<?php echo $assets['asset_type']?>" class="form-control" placeholder="Name">
                                            <input type="hidden" name="id" value="<?php echo $assets['id'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName">Created by</label>
                                            <input type="text" id="exampleInputAssign" name="created_by" class="form-control" value="<?php echo $assets['created_by']?>" readonly>
                                            <!--<?php $emp = $this->common_model->get_name();?>-->
                                            <!--<?php foreach($emp as $emp):?>-->
                                            <!--<input type="text" id="exampleInputName" name="created_by" value="<?=$emp['name']?> <?=$emp['surname']?>" class="form-control" readonly>-->
                                            <!--<?php endforeach?>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName">Current owner</label>
                                            <select name="c_owner" class="form-control" id="name">
                                                <?php foreach($employee as $emp):?>
                                                    <option <?php if($assets['c_owner'] == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPurchase">Purchase Date</label>
                                            <input type="date" id="exampleInputPurchase" name="purchase_date" value="<?php echo $assets['purchase_date']?>" class="form-control" placeholder="Purchase Date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAssign">Assign Date</label>
                                            <input type="date" id="exampleInputAssign" name="assign_date" class="form-control" value="<?php echo $assets['assign_date']?>" placeholder="Assign Date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputImage">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="image" id="exampleInputImage" accept="image/*">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?php echo base_url('admin/view_my_assets');?>" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
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
    $("#editAssets").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            asset_type: 'required',
            created_by:'required',
            c_owner:'required',
            purchase_date: 'required',
            assign_date: 'required'
        }
    });   
</script>
<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
 <style>
 #project-manager{
     display:none;
 }
 </style>   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Vendor</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/supply')?>">Home</a></li>
                            <li class="breadcrumb-item active">Add Vendor</li>
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
                <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form  method="post" action="<?php echo base_url('admin/save_supply');?>" id="supply" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputVendorName">Vendor Name</label>
                                            <input type="text" id="exampleInputName" name="v_name" class="form-control" placeholder="Vendor Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTin">TIN</label>
                                            <input type="text" id="exampleInputTin" name="tin" class="form-control" placeholder="TIN">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTaxGroup">Tax Group</label>
                                            <select name="t_group" id="EmpType" class="default form-control input-lg">
                                                    <option value="Tax Group">Tax Group</option>
                                                    <option value="VAT Taxpayer">VAT Taxpayer</option>
                                                    <option value="Simplified Taxpayer">Simplified Taxpayer</option>
                                                    <option value="None VAT Taxpayer">None VAT Taxpayer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputTaxGroup">Type</label>
                                        <select name="type" id="type" class="default form-control input-lg">
                                                <option selected="selected" disabled="disabled" value="">Type</option>
                                                <option value="Trusted">Trusted</option>
                                                <option value="NA">NA</option>
                                                <option value="Untrusted">Untrusted</option>
                                        </select>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
    $("#supply").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
           v_name: 'required',
            tin: 'required',
            t_group:'required',
            type: 'required',
        }
    });
</script>

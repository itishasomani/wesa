<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="vacation">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Number of vacation </h1>
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
                <div class="row justify-content-around">
                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form method="post" action="<?php echo base_url('admin/vacation_save');?>" id="addvacation" enctype="multipart/form-data">
                                <div class="card-body">
                                    <!--<div class="form-group">-->
                                    <!--    <label for="exampleInputTotalDays">Total Days</label>-->
                                    <!--    <input type="date" id="date" name="c_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">-->
                                    <!--</div>-->
                                    <div class="form-group">
                                        <label for="exampleInputName">Employee Name</label>
                                        <select name="name" class="form-control" id="name">
                                            <option value="">Employee Name</option>
                                            <?php foreach($employee as $emp):?>
                                                <option value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputTotalDays">No. of Annual Leaves</label>
                                        <input type="number" name="v_leave" class="form-control" placeholder="No of Annual Leaves">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    $("#addvacation").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            v_leave: 'required',
        }
    });
</script>
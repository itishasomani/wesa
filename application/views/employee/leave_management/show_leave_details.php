<!-- Header -->
<?php $this->load->view('employee/header'); ?>
<!-- / Header -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="show_leave_management">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Show Leave Details</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('employee')?>">Home</a></li>
                            <li class="breadcrumb-item active">Show Leave Details</li>
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
                <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-10 pb-5">
                            <div class="card-body bg-white rounded shadow-sm">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['name']?></div>
                                </div>
                                <hr>
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Leave Type</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['leave_type']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Leave from</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['from']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Leave To</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['leave_to']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Total Days</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['days']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date Back To Work</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['back_to']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Replacement</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['replacement']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Approver 1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['approver']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Approver 2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['approver_two']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">HR Manager</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['manager']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Comments</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $leave_management['comment']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Attachment</h6>
                                    </div>
                                    <?php
                                        $Path = "assets/backend/dist/upload/" .$leave_management['file'];

                                        $Ext  = (new SplFileInfo($Path))->getExtension();
                                        if($Ext == 'pdf' || $Ext =='doc' || $Ext =='docx' ||$Ext =='ppt' ||$Ext =='pptx' || $Ext =='zip' ||$Ext =='rar'){
                                            echo "<p style='color:#6c757d;'>" . $leave_management['file'] . "</p>";
                                        }
                                    ?>
                                    <img src="<?php echo base_url('assets/backend/dist/upload/')?><?php echo $leave_management['file']?>" style="width: 70px;margin-right:5px" alt="">
                                    <a href="<?php echo base_url('assets/backend/dist/upload/')?><?php echo $leave_management['file']?>" download="File">
                                        <button type="button" class="btn btn-download">Download</button>
                                    </a>
                                </div>
                            
                            </div>
                        </div>

                    </div>
            </div>
        </section>
</div>

<!-- Footer -->
<?php $this->load->view('employee/footer'); ?>
<!-- / Footer -->

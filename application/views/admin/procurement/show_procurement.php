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
                            <h1 class="m-0">Show Procurement</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                                <li class="breadcrumb-item active">Show Procurement</li>
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
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-10 pb-5">
                            <div class="card-body bg-white rounded shadow-sm">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo get_emp_by_id($procurement['name'])['name']?> <?php echo get_emp_by_id($procurement['name'])['surname']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Item</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['item']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Quantity</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['quantity']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Unit</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['unit']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Task</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['task']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Destination Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['address']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Budget Category</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['b_category']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Budget Sub-Category</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['sub_category']?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Approver 1 (Direct Manager)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo get_emp_by_id($procurement['direct_manager'])['name'];?> <?php echo get_emp_by_id($procurement['direct_manager'])['surname'];?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Approver 2 (Procurement Manager)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo get_emp_by_id($procurement['procurement_manager'])['name'];?> <?php echo get_emp_by_id($procurement['procurement_manager'])['surname'];?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Director</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo get_emp_by_id($procurement['director'])['name'];?> <?php echo get_emp_by_id($procurement['director'])['surname'];?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Attachment</h6>
                                    </div>
                                    <?php
                                        $Path = "assets/backend/dist/img/" .$procurement['featuredImage'];

                                        $Ext  = (new SplFileInfo($Path))->getExtension();
                                        if($Ext == 'pdf' || $Ext =='doc' || $Ext =='docx' ||$Ext =='ppt' ||$Ext =='pptx' || $Ext =='zip' ||$Ext =='rar'){
                                            echo "<p style='color:#6c757d;'>" . $procurement['featuredImage'] . "</p>";
                                        }
                                    ?>
                                        <img src="<?php echo base_url('assets/backend/dist/img/')?><?php echo $procurement['featuredImage']?>" style="width: 70px;margin-right:5px" alt="">
                                        <a href="<?php echo base_url('assets/backend/dist/img/')?><?php echo $procurement['featuredImage']?>" download="File">
                                            <button type="button" class="btn btn-download">Download</button>
                                        </a>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Comment</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $procurement['comment']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>
<!-- Footer -->
<?php $this->load->view('footer'); ?>
<!-- / Footer -->
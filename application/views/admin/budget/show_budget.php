<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
<style>

    .pdfbtn{
        text-align:center;
    }
</style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" id="content">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                   
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
                        <div class="col-8 float_center" style="margin: auto;">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <?php if(!empty($details)){?>
                                <div class="card-body">
                                    <div id="exampler" class=" dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                    <table id="example" class="table table-bordered table-striped  dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Category</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sub-category</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Item</th> 
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cost</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                        <tbody>
                                                            <?php $total_amount = 0;?>
                                                            <?php foreach($details as $detail):?>
                                                            <tr>
                                                                <td><?php echo $detail['category']?></td>
                                                                <td><?php echo $detail['sub_category']?></td>
                                                                <td><?php echo $detail['free_text']?></td>
                                                                <td><?php echo $detail['amount']?></td>
                                                            </tr>
                                                            <?php $total_amount += ((int)$detail['amount']);?>
                                                            <?php endforeach;?>
                                                        
                                                        </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan=3 style="font-weight:bold;">
                                                                Total Amount
                                                            </td>
                                                            <td><?php echo $total_amount;?></td>
                                                        </tr>
                                                    </tfoot>
                                    
                                                </table>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="pdfbtn">
                                        <!--<form action="<?php echo base_url('admin/budget/download')?>" method="post">-->
                                        <!--    <input type="hidden" value="<?php echo $detail['task_id']?>" name="task_id">-->
                                        <!--    <button class="btn btn-primary" id="pdfdownload">-->
                                        <!--        CSV Download-->
                                        <!--    </button>-->
                                        <!--</form>-->
                                        <a href="<?php echo base_url('admin/budget/download/'.$detail['task_id'])?>" class="btn btn-primary" id="pdfdownload" >CSV Download</a>
                                   
                                    </div>
                                    
                                </div>
                                <?php }
                                else{?>
                                    <div class="card-body">
                                        <div id="exampler" class=" dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <table id="example" class="table table-bordered table-striped  dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Category</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sub-category</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Item</th> 
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cost</th>
                                                            </tr>
                                                        </thead>
                                                       
                                                            <tbody>
                                                               <tr>
                                                                   <td colspan="4" style="text-align:center">No Result found</td>
                                                               </tr>
                                                            
                                                            </tbody>
                                                        <tfoot>
                                                            
                                                        </tfoot>
                                        
                                                    </table>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                   
                                    
                                    
                                    </div>
                                <?php }
                                ?>
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


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
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/view_my_assets');?>">Home</a></li>
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
                    <form method="post" action="" id="filter">
                        <div class="form-group d-flex">
                            <div style="width:16%;position:relative;">
                                <select class="form-control" name="asset_type" id="asset_type" >
                                     <option selected="selected" disabled="disabled" value="">Asset Type</option>
                                     <?php foreach($assets as $asset):?>
                                        <option value="<?php echo $asset['asset_type'];?>"><?php echo $asset['asset_type'];?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div style="width:16%;position:relative;">
                                <select class="form-control" name="c_owner" id="c_owner" >
                                     <option selected="selected" disabled="disabled" value="">Current Owner </option>
                                     <?php foreach($assets as $asset):?>
                                        <option value="<?php echo $asset['c_owner'];?>"><?php echo $asset['name'];?> <?php echo get_emp_by_id($asset['c_owner'])['surname'];?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div style="width:16%;position:relative;">
                                <select class="form-control" name="assign_date" id="assign_date" >
                                     <option selected="selected" disabled="disabled" value="">Assign Date</option>
                                     <?php foreach($assets as $asset):?>
                                        <option value="<?php echo $asset['assign_date'];?>"><?php echo $asset['assign_date'];?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                    <!--<div class="d-flex justify-content-end mb-2">-->
                    <!--    <a href="<?php echo base_url('admin/assets'); ?>" class="btn btn-dark">Add</a>-->
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
                                                <?php if(($_SESSION['emp_type']) == '5') {?>
                                                <table id="example1" class=" table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Assets ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Assets Type</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created By</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Current Owner</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Purchase Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Assign Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="asset_table">
                                                        <?php $i =1;
                                                        foreach($assets as $asset):?>
                                                        <tr >
                                                            <td><?php echo $i++?></td>
                                                            <td><?php echo $asset['id'];?></td>
                                                            <td><?php echo $asset['asset_type'];?></td>
                                                            <td><?php echo $asset['created_by'];?> </td>
                                                            <td><?php echo $asset['name'];?> <?php echo get_emp_by_id($asset['c_owner'])['surname'];?></td>
                                                            <td><?php echo $asset['purchase_date'];?></td>
                                                            <td><?php echo $asset['assign_date'];?></td>
                                                            <!--<td>-->
                                                            <!--    <a href="<?php echo base_url('admin/assets/show_assets/'.$asset['id'])?>" class="btn btn-success">-->
                                                            <!--        <i class="far fa-edit"></i>-->
                                                            <!--    </a>-->
                                                            <!--    <a href="<?php echo base_url('admin/assets/delete_assets/'.$asset['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">-->
                                                            <!--        <i class="far fa-trash-alt"></i>-->
                                                            <!--    </a>-->
                                                            <!--</td>-->
                                                        </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.No</th>
                                                            <th rowspan="1" colspan="1">Assets ID</th>
                                                            <th rowspan="1" colspan="1">Assets Type</th>
                                                            <th rowspan="1" colspan="1">Created By</th>
                                                            <th rowspan="1" colspan="1">Current Owner</th>
                                                            <th rowspan="1" colspan="1">Purchase Date</th>
                                                            <th rowspan="1" colspan="1">Assign Date</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <?php } else{ ?>
                                                    <table id="example1" class=" table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Assets ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Assets Type</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created By</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Current Owner</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Purchase Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Assign Date</th>
                                                            
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="asset_table">
                                                        <?php $i =1;
                                                        foreach($assets as $asset):?>
                                                        <tr >
                                                            <td><?php echo $i++?></td>
                                                            <td><?php echo $asset['id'];?></td>
                                                            <td><?php echo $asset['asset_type'];?></td>
                                                            <td><?php echo $asset['created_by'];?> </td>
                                                            <td><?php echo $asset['name'];?> <?php echo get_emp_by_id($asset['c_owner'])['surname'];?></td>
                                                            <td><?php echo $asset['purchase_date'];?></td>
                                                            <td><?php echo $asset['assign_date'];?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('admin/assets/show_assets/'.$asset['id'])?>" class="btn btn-success">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                                <a href="<?php echo base_url('admin/assets/delete_assets/'.$asset['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.No</th>
                                                            <th rowspan="1" colspan="1">Assets ID</th>
                                                            <th rowspan="1" colspan="1">Assets Type</th>
                                                            <th rowspan="1" colspan="1">Created By</th>
                                                            <th rowspan="1" colspan="1">Current Owner</th>
                                                            <th rowspan="1" colspan="1">Purchase Date</th>
                                                            <th rowspan="1" colspan="1">Assign Date</th>
                                                            <th rowspan="1" colspan="1">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <?php }?>
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

<script>  
//  $(document).ready(function(){  
//       $('#assign_date').change(function(){   
//           get_data();
//       });  
//  });  
//  function get_data(){
//      var assign_date = $('#assign_date').val();
//      $.ajax({  
//             url:"assets/date_filter",  
//             data:"assign_date=" + assign_date,  
//             success:function(data){  
//                  $('.asset_table').html(data);  
//             }  
//           });  
//  }
    
 </script> 
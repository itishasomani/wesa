<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
<style>
    .header{
        min-height:20px;
        box-shadow:none;
        margin-bottom:0rem;
        background:#343a40;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
        color:#fff;
        border:1px solid #343a40;
    }
    .info-box{
       border:1px solid #343a40;
    }
    .info-box-content{
        justify-content: flex-start !important;
        padding:0px !important;
    }
    #comment_table .table td,#comment_table .table th{
        border:none;
    }
    #comment_table table.dataTable>thead .sorting_asc:before, #comment_table table.dataTable>thead .sorting_desc:after{
        opacity:0;
    }
    #comment_table .card{
        background:none;
        box-shadow:none;
    }
    #comment_table #comment_length,#comment_table  #comment_filter,#comment_table thead tr td,#comment_table #comment_info{
        display:none;
    }
    #comment_table #example1_wrapper .comment_table{
        width:100% !important;
    }
    #comment_table .pagination{
        margin-right:9px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">            
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                    <?php if(($_SESSION['emp_type']) == '4' ) {?>
                        <div class="d-flex justify-content-end mb-2">
                            <a href="<?php echo base_url('admin/add'); ?>" class="btn btn-dark">Add</a>
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
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Comment</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($comment as $comment):?>
                                                        <tr class="odd">
                                                            <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                                                            <td><?php echo $comment['comment']?></td>
                                                            <td><?php echo $comment['date']?></td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">S.no</th>
                                                            <th rowspan="1" colspan="1">Comment</th>
                                                            <th rowspan="1" colspan="1">Date</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                        <div style="display:none;">
                            <a href="<?php echo base_url('admin/add'); ?>" class="btn btn-dark">Add</a>
                        </div>
                    
                    <div class="row" id="comment_table">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row comment_table">
                                            <div class="col-sm-12">
                                                <table id="comment" class="table dataTable table-responsive" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($comment as $comment): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="header info-box pt-2">
                                                                    <h6 class="text"><span class="text-bold">Date : </span> <?php echo $comment['date']?></h6>
                                                                </div>
                                                                <div class="info-box" style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                                                    <div class="info-box-content">
                                                                        <h6 class="text"><span class="text-bold">Comment From Director: </span> </h6>
                                                                        <span ><?php echo $comment['comment']?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>    <!-- /.control-sidebar -->
<!-- Footer -->
    <?php $this->load->view('footer'); ?>
<!-- / Footer -->
<script>
    $(document).ready(function() {
    $('#comment').DataTable({
        pageLength : 5,
    });
} );
</script>
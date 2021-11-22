<!-- Header -->
<?php $this->load->view('employee/header'); ?>
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
    .table td, .table th{
        border:none;
    }
    table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:after{
        opacity:0;
    }
    .card{
        background:none;
        box-shadow:none;
    }
    #comment_length,#comment_filter,thead tr td,#comment_info{
        display:none;
    }
    #example1_wrapper .comment_table{
        width:100% !important;
    }
    .pagination{
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

                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row comment_table" >
                                            <div class="col-sm-12">
                                                <table id="comment" class="table dataTable table-responsive" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <td class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"></tD>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($comment as $comment): ?>
                                                        <tr>
                                                            <td class="dtr-control" tabindex="0">
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
    <?php $this->load->view('employee/footer'); ?>
<!-- / Footer -->
<script>
    $(document).ready(function() {
    $('#comment').DataTable({
        pageLength : 5,
    });
} );
</script>
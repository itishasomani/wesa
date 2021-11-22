<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wesa | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/fontawesome-free/css/all.min.css');?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
    <!--Toast-->
    <link href="<?php echo base_url('assets/backend/plugins/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/daterangepicker/daterangepicker.css');?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/adminlte.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/style.css');?>">
</head>
<style>
    body{
        font-family:Times New Roman;
        font-size:14px;
    }
</style>
<body>
    
    <section class="container-flud">
        <div class="row">
            <div class="float-right pdf_header">
                <div class="text-end">
                    <h5 class='title'>“VVESA”MMC-nin direktoru</h5>
                    <p><?php echo get_emp_by_id($approver2)['name']?> <?php echo get_emp_by_id($approver2)['surname']?>Nizameddin ogluna</p>
                    <br>
                    <p> <?php echo $f_name;?> <?php echo $surname;?> oglu/qizi</p>
                    <p>terefinden</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center">
                            <td style="font-size:15px;"> E R I Z E </td>
                        </tr>
                        <tr>
                            <td>
                                Yazib Size bildirmek isteyirem ki, purpose of BT , bunula bagli meni <?php echo date('d-m-Y',strtotime($l_from));?>  il tarixinden  <?php echo date('d-m-Y',strtotime($l_to));?>  il tarixinedek cemi  <?php echo $days;?>  teqvim gunu muddetine Baki (Azerbaycan) seherine, 
                                ezamiyyete buraxarsiniz. 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_footer">
                    <table class="table">
                        <tr>
                            <td>
                                Imza : __________________  <?php echo $f_name;?> <?php echo $surname;?> qizi/oglu
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tarix :<?php echo date('d-m-Y',strtotime($date));?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="container-flud">
        <div class="row">
            <div class="float-right section_2_pdf">
                <div class="text-end">
                    <p>To Atakishiyev <?php echo get_emp_by_id($approver2)['name']?> <?php echo get_emp_by_id($approver2)['surname']?></p>
                    <h6 class='title'>Director of “VVESA” LLC </h6>
                    <p> By <?php echo $f_name;?> <?php echo $surname;?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center">
                            <td style="font-size:15px;"> APPLICATION</td>
                        </tr>
                        <tr>
                            <td>
                                I, hereby kindly ask permission in connection with a business trip to Baku city (Azerbaijan) for the purpose of _________________ from  <?php echo date('d-m-Y',strtotime($l_from));?> to <?php echo date('d-m-Y',strtotime($l_to));?>  only for  <?php echo $days;?> calendar days.
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_footer">
                    <table class="table">
                    <tr>
                        <td>
                            Signature : __________________  <?php echo $f_name;?> <?php echo $surname;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date : <?php echo date('d-m-Y',strtotime($date));?>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
    </section>
<style>
    .pdf_header{margin-bottom: 30px;}
    .table tr td,.table tr{
        border:none;
    }
    .pdf_body{text-align:center;margin:22% auto;display:block;width:100%;}
    .pdf_body .text-center{
        text-align:center
    }
    .float-right{
        text-align: end;
    }
    .text{
        line-height:12px;
    }
    .pdf_footer{
        margin-top:50%;
    }
    .section_2_pdf{
        margin-top:92%;
    }
</style>
 <!-- jQuery -->
    <script src="<?php echo base_url('assets/backend/plugins/jquery/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/backend/dist/js/adminlte.js');?>"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?php echo base_url('assets/backend/plugins/jquery-mousewheel/jquery.mousewheel.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/jquery-mapael/jquery.mapael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/jquery-mapael/maps/usa_states.min.js');?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/backend/plugins/chart.js/Chart.min.js');?>"></script>
    
    <!-- InputMask -->
    <script src="<?php echo base_url('assets/backend/plugins/moment/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/inputmask/jquery.inputmask.min.js');?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url('assets/backend/plugins/daterangepicker/daterangepicker.js');?>"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/backend/dist/js/demo.js');?>"></script>
     <!-- AdminLTE for showing date and time -->
    <script src="<?php echo base_url('assets/backend/dist/js/main.js');?>"></script>
    <!-- Tinymce -->
    <script src="<?php echo base_url('assets/backend/plugins/tinymce/tinymce.min.js');?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/backend/dist/js/pages/dashboard2.js');?>"></script>
    <!-- Jquery Validate -->
    <script src="<?php echo base_url('assets/backend/dist/js/jquery.validate.min.js'); ?>"></script>
    <!--Toast-->
    <script src="<?php echo base_url('assets/backend/plugins/toast-master/js/jquery.toast.js'); ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js');?>"></script>

</body>

</html>
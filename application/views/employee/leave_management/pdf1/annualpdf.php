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
<body>
    
    <section class="container-flud">
        <div class="row">
            <div class="float-right pdf_header">
                <div class="text-end">
                    <p>Unvan: Baki seheri, Nesimi Rayonu, Qulu Quliyev, ev 60, menzil 4</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center" >
                           <h3><strong>EMR No: </strong></h3>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div style="float:left;padding-top:35px;"><h6><strong>Baki seheri </strong></h6></div>
                            <div style="float:right;padding-top:35px;"><h6><strong><?php echo date('d-m-Y',strtotime($approve_date));?>-ci il</strong></h6></div>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p style="float:left;padding-top:13%;">Erizelerin daxil olmasi ile elaqedar olaraq</p>
                            </td>
                        </tr>
                        <tr class="text-center" >
                           <p style="padding-top:18%;">Emr edirem</p>
                        </tr>
                    </table>
                    <table class="table">
                        
                        <tr>
                            <td>
                                <p>1. “VVESA” MMC-nin 01.09.2020-ci il tarixli emek muqavilesine esasen Insaat muhendisi vezifesinde calisan  Quliyeva Arife Arif qizi <strong><?php echo date('d-m-Y',strtotime($l_from));?>-ci il</strong> tarixinden <strong><?php echo date('d-m-Y',strtotime($l_to));?></strong>-ci is ili ucun <strong><?php echo $days;?></strong> teqvim gunu emek mezuniyyetine buraxilsin.</p>
                                <p>2. Quliyeva Arife Arif qizinin erizesine esasen isciye emek mezuniyyeti haqqi ay sonunda emek haqqi ile birlikde odenilsin.</p>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Ise baslama tarixi: <strong><?php echo date('d-m-Y',strtotime($back_to));?></strong>-ci il tarixi hesab edilsin.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Esas : <strong><?php echo $f_name;?> <?php echo $surname;?> <?php echo date('d-m-Y',strtotime($date));?></strong>-ci il tarixli erizesi</p>
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
                            VVESA” MMC-nin
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Direktoru:	                       _____________________ Atakisiyev H.N.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo base_url('assets/backend/dist/img/wesa_img.png');?>" style="margin-top:10px;">
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
            <div class="float-right pdf_header">
                <div class="text-end">
                    <p>Address: apartment 8, building 60, Gulu Guliyev str., Nasimi district, Baku city  </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center" >
                           <h3><strong>Decision No: </strong></h3>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div style="float:left;padding-top:35px;"><h6><strong>Baku city </strong></h6></div>
                            <div style="float:right;padding-top:35px;"><h6><strong> <?php echo date('d-m-Y',strtotime($approve_date));?></strong></h6></div>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p style="float:left;padding-top:13%;">In connection with the receipt of applications </p>
                            </td>
                        </tr>
                        <tr class="text-center" >
                           <p style="padding-top:18%;">I order</p>
                        </tr>
                    </table>
                    <table class="table">
                        
                        <tr>
                            <td>
                                <p>1. According to the labor contract of “VVESA” LLC dated  <strong><?php echo date('d-m-Y',strtotime($date));?></strong>, <strong><?php echo $f_name;?> <?php echo $surname;?> </strong> who works as a Civil Engineer shall be allowed to vacation for <strong><?php echo $days;?></strong> calendar day from  <strong><?php echo date('d-m-Y',strtotime($l_from));?></strong> for the working year 2020-2021.</p>
                                <p>2. According to the application submitted by <strong><?php echo $f_name;?> <?php echo $surname;?> </strong> the employee should be paid leave welfare allowance at the end of the month together with the salary.</p>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Date of going back to work should be considered from  <strong><?php echo date('d-m-Y',strtotime($back_to));?></strong>.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Basis : <strong><?php echo $f_name;?> <?php echo $surname;?> </strong>application dated <strong> <?php echo date('d-m-Y',strtotime($date));?></strong></p>
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
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Director of “VVESA” LLC:		                 _____________________ Atakisiyev H.N.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?php echo base_url('assets/backend/dist/img/wesa_img.png');?>" style="margin-top:10px;">
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </section>
<style>
    .pdf_header{margin-bottom: 10px;}
    .table tr td,.table tr{
        border:none;
    }
    .pdf_body{margin:10% auto 0% auto;display:block;width:100%;}
    .pdf_body .text-center{
        text-align:center
    }
    .float-right{
        text-align: end;
    }
    p{
        line-height:16px;
    }
    .pdf_footer{
        margin-top:65%;
        text-align:center;
        
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
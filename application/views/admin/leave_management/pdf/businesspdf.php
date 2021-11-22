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
        font-family: "Times New Roman", Times, serif;
        font-size:13.5px;
    }
</style>
<body>
    
    <section class="container-flud">
       <div class="row ">
            <div class="col-md-12 text-right">
                <div>
                    <p>Unvan: Baki seheri, Nesimi Rayonu, Qulu Quliyev, ev 60, menzil 4</p>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center">
                            <td>
                                <strong style="font-size:15px;text-align:center">EMR No: </strong>
                            </td>
                            
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div style="float:left;padding-top:35px;"><strong>Baki seheri </strong></div>
                            <div style="float:right;padding-top:35px;"><strong><?php echo date('d-m-Y',strtotime($approve_date));?>-ci il</strong></div>
                        </tr>
                    </table>
                    <table>
                         <tr class="text-center" >
                           <p style="padding-top:10%;">Emr edirem</p>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td>
                                <p>1. «VVESA»  MMC-nin emekdasi <?php echo $f_name;?> <?php echo $surname;?> <?php echo date('d-m-Y',strtotime($l_from));?> tarixinden <?php echo date('d-m-Y',strtotime($l_to));?> tarixinedek <?php echo $days;?>  tgun muddetine  _______________________ seherine ezamiyyete gonderilsin. 
                                 <?php echo $comment ?>  Ezamiyye xercleri muhasibatliq terefinden normalara uygun hesablanaraq odenilsin.
                                </p>
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
    <section class="container-flud" style="margin-top:5%;">
        <div class="row ">
            <div class="col-md-12 text-right">
                <div>
                    <p>Address: apartment 8, building 60, Gulu Guliyev str., Nasimi district, Baku city</p>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center" >
                            <td><strong style="font-size:15px;text-align:center">DECISION No: </strong></td>
                            
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div style="float:left;padding-top:35px;"><h6><strong>Baku city </strong></h6></div>
                            <div style="float:right;padding-top:35px;"><h6><strong><?php echo date('d-m-Y',strtotime($approve_date));?></strong></h6></div>
                        </tr>
                    </table>
                    <table>
                         <tr class="text-center" >
                           <p style="padding-top:10%;">I order</p>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td>
                                <p>1. <?php echo $f_name;?> <?php echo $surname;?> employee of “VVESA” LLC, should be sent on a business trip to Ganja (Azerbaijan) for <?php echo $days;?>  days from <?php echo date('d-m-Y',strtotime($l_from));?> <?php echo date('d-m-Y',strtotime($l_from));?>  There, she should take the necessary measures to establish commercial relations with the company’s management, as well as discuss the terms of the contract to be concluded. Expenses of the business trip should be calculated and paid by the accounting staff in accordance with the norms. 
                               
                                </p>
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
        .table tr td,.table tr{
            border:none;
        }
        .pdf_body{margin:10% auto 0% auto;display:block;width:100%;}
        .pdf_body .text-center{
            text-align:center
        }
        .pdf_footer{
            margin-top:60%;
            text-align:center;
            
        }
        input[type=checkbox]:checked + label.strikethrough{
          text-decoration: line-through;
        }
        .pdf_header{margin-bottom: 10px;}
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
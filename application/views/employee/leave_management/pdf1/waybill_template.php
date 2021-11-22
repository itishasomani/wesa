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
    tbody tr td,thead tr th{
        font-size:13px;
        color:#000;
        font-weight:400;
        font-family:Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
    }
</style>
<body>
    
    <section class="container-flud">
        <div class="row">
            <div class="float-left pdf_header">
                <div class="text-left">
                    <img src="<?php echo base_url('assets/backend/dist/img/wesa_logo.png');?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center" >
                           <h5><strong>Ezamiyye Vereqesi</strong></h5>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div style="float:right;padding-top:35px;padding-left:20px;"><h6><strong>Tarix: <?php echo date('d-m-Y',strtotime($l_from));?></strong></h6></div>
                        </tr>
                    </table>
                    <table class="table-border" style="border:1px solid; width:100%">
                        <thead>
                        </thead>
                        <tbody style="border:1px solid #000; width:100%">
                            <tr >
                                <td >Sirketin adi:</td>
                                <td colspan="10">“VVESA” MMC</td>
                            </tr>
                            <tr >
                                <td style="width:200px">
                                    Ezamiyyete gonderilen isci:
                                </td>
                                <td colspan="10">
                                    <?php echo $f_name?> <?php echo $surname?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ezamiyyetin meqsedi:</td>
                                <td colspan="10"> </td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <h6>Ezamiyyetin tefsilati:</h6>
                    <table class="tableborder" style="border:1px solid; width:100%">
                        <thead>
                        </thead>
                        <tbody style="border:1px solid #000; width:100%">
                            <tr >
                                <td >Teyinat:</td>
                                <td colspan="10"> Gence (Azerbaycan)</td>
                            </tr>
                            <tr >
                                <td>
                                    Getme tarixi:
                                </td>
                                <td colspan="10">
                                    <?php echo date('d-m-Y',strtotime($l_from));?>
                                </td>
                            </tr>
                            <tr>
                                <td>Qayitma tarixi:</td>
                                <td colspan="10"><?php echo date('d-m-Y',strtotime($l_to));?></td>
                            </tr>
                            <tr>
                                <td >Gunleri sayi:</td>
                                <td colspan="10"> <?php echo $days ?> gun </td>
                            </tr>
                        </tbody>
                    </table>
                    <h6 style="text-align:center;"><strong>Teqdim olunan senedler</strong></h6>
                    <table class="tableborder" style="border:1px solid; width:100%">
                        <thead>
                            <tr>
                                <th><strong>Xercin teyinati:</strong></th>
                                <th><strong>Aciqlama</strong></th>
                                <th><strong>Tesdiqedici sened</strong></th>
                                <th><strong>Mebleg</strong></th>
                            </tr>
                        </thead>
                        <tbody style="border:1px solid #000; width:100%">
                            <tr >
                                <td >Hotel</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr >
                                <td>
                                    Yemek pulu
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Benzin pulu</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td ><strong>elaveler:</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >2</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >3</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <h6 style="text-align:center;"><strong>Tesdiq eden sexsler</strong></h6>
                    <table class="tableborder" style="border:1px solid; width:100%">
                        <thead>
                            <tr>
                                <th><strong>Direktor <br> Habib Atakisiyev</strong></th>
                                <th><strong>IR Menecer <br> Kamran eliyev</strong></th>
                                <th><strong>Bas Muhasib <br> Kamran eliyev</strong></th>
                                <th><strong>Isci (Ezamiyyete geden) <br> <?php echo $f_name?> <?php echo $surname?></strong></th>
                            </tr>
                        </thead>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <img src="<?php echo base_url('assets/backend/dist/img/wesa_img.png');?>" style="margin-top:10px;">
                            </td>
                        </tr>
                    </table>
                    <table class="tableborder" style="border:1px solid; width:100%;padding-top:10%">
                        <tbody>
                            <tr>
                                <td>Imza:</td>
                                <td>Imza:</td>
                                <td>Imza:</td>
                                <td>Imza:</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </section>
    
    <style>
        .pdf_body{margin:6% auto 0% auto;display:block;width:100%;}
        .pdf_body .text-center{
            text-align:center
        }
        .table-border{
            padding-top:10%;
            padding-bottom:3%;
        }
        .tableborder{
            padding-bottom:3%;
        }
        .table-border tr, .table-border tr td,.tableborder tr,.tableborder tr td,.tableborder th{
            border:1px solid #000;
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
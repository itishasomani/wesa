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
        font-size:13px;
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
            <div class="float-right">
                <h3 style="color:#787878;font-weight:bold">“VVESA”  MMC</h3>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pdf_body">
                    <table class="table">
                        <tr class="text-center">
                               <h5 style="border-bottom:0.8px solid #0000FF; padding-bottom:8px;font-size:18px;"><strong>AZ1007, Baki s., Nesimi rayonu, Q.Quliyev kuc. 35, ev 60, m. 4</strong></h5>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <div style="float:left;padding-top:0px;font-size:16px;"><h6><strong>No. </strong></h6></div>
                            <div style="float:right;padding-top:0px;font-size:16px;"><h6><strong><?php echo $approve_date?>-ci il</strong></h6></div>
                        </tr>
                    </table>
                    <table class="table">
                        <tr class="text-center" >
                           <h5 style="font-size:14px;"><strong>PROTOKOL</strong></h5>
                        </tr>
                    </table>
                    <table class="Table">
                        <thead>
                            <tr>
                                <th> Istirak edirdiler:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Atakisiyev Hebib Nizameddin oglu (komissiyanin sedri)</td>
                            </tr>
                            <tr>
                                <td>2. Ceferov Tariyel sahin oglu (komissiyanin uzvu)</td>
                            </tr>
                            <tr>
                                <td>3. Kamran eliyev Alxan oglu (komissiyanin uzvu)</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <tr>
                            <div style="float:right; padding-left:10px"><strong>
                                “VVESA” MMC - nin muavinet komissiyasi <br> adi asagidaki cedvelde qeyd edilen iscinin <br>teqdim etdiyi senede baxaraq qerara aldi:
                            </strong></div>
                        </tr>
                    </table>
                    <table class="table" style="padding-top:7%;padding-bottom:0px">
                        <tr>
                           <td style="border-top:none;">
                               <strong> Iclasin gundeliyi: </strong> _________________ mutexessisi <strong> <?php echo $f_name;?> <?php echo $surname; ?> </strong>qizina hamilelik ve dogumla bagli muavinetin odenilmesi ile bagli.
                           </td> 
                        </tr>
                        <tr>
                            <td style="border-top:none;">
                                <strong> Esidildi: </strong> Komissiyanin sedri Atakisiyev Habib Nizameddin oglu bildirdi ki,_______________ qizi.
                                <strong> <?php echo date('d-m-Y',strtotime($l_from));?> </strong> il tarixinde “VVESA” MMC-de <strong> muhendis </strong> vezifesinde isleyir. Tekce “VVESA” MMC-de sosila sigorta staji 6 aydan coxdur. Komissiyanin sedri qeyd etdi ki, isci
                                <strong> <?php echo date('d-m-Y',strtotime($l_from));?> </strong> il tarixinde Azerbaycan Respublikasinin emek Mecellesinin ve Azerbaycan Respublikasi Nazirler Kabinetinin 15 sentyabr 1998-ci il tarixli, 189 nomreli qerari ile tesdiq edilmis “Mecburi dovlet sosial sigortasi uzre odemelerin ve emek qabiliyyetini muveqqeti itirmis iscilere sigortaedenin vesaiti hesabina odenilen muavinetin hesablanmasi ve odenilmesi haqqinda” esasnamenin teleblerine uygun tertib olunmus hamilelik ve dogumla bagli xestelik vereqesi teqdim edib. Senede uygun olaraq onun sosial mezuniyyeti 126 (bir yuz iyirmi alti) teqvim gunu  olmalidir.
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:none;">Komissiyanin uzvu eliyev Kamran soz alaraq bildirdi ki,  <strong><?php echo $f_name;?> <?php echo $surname;?> </strong> qizinin senedlerinin hazirlanaraq Azerbaycan Respublikasinin emek ve ehalinin Sosial Mudafiesi Nazirliyi yaninda Dovlet Sosial Mudafie Fondunun Baki seherin sobesine teqdim etmek ucun hec bir huquqi manee yoxdur.
                                Komissiyanin diger uzvu Ceferov Tariyel xestelik vereqesinin arxa hissesinin muvafiq sobeler terefinden doldurulmasi ve muhasibatliq terefinden iscinin sosial muavinetinin mebleginin hesablanmasinin vacibliyini vurguladi.</td>
                        </tr>
                        <tr>
                            <td style="border-top:none;">
                                <strong> Qerara alindi: </strong> Kadrlarla is sobesinin mutexessisi <strong><?php echo $f_name;?> <?php echo $surname;?> </strong> qizinin teqdim etdiyi xestelik vereqesine esasen sigortaolunanin 126 (bir yuz iyirmi alti) gunluk hamileliye ve dogusa gore sosial mezuniyyete cixmaq ve sosial sigorta odenisleri hesabina muavinet almaq huququ var.
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:none;"> Komissiyanin sedri: ___________ Atakisiyev Hebib Nizameddin oglu</td>
                        </tr>
                        <tr>
                            <td style="border-top:none;">Komissiyanin uzvu: ___________ Ceferov Tariyel sahin oglu</td>
                        </tr>
                        <tr>
                            <td style="border-top:none;">Komissiyanin uzvu: ___________ eliyev Kamran Alxan oglu</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div>
                                <img src="<?php echo base_url('assets/backend/dist/img/wesa_img.png');?>" style="margin-top:10px;float:right;">
                            </div>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
     <style>
        .pdf_body{margin:2% auto 0% auto;display:block;width:100%;}
        .pdf_body .text-center{
            text-align:center
        }
        .table{
            padding-bottom:2%;
        }
        /*.Table tr td{*/
        /*    font-size:15px;*/
            
        /*}*/
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
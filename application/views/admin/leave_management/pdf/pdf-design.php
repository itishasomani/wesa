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
            <div class="container">
                <div class="pdf_body">
                    <div class="pdf_header">
                        <figure>
                            <img src="<?php echo base_url('assets/backend/dist/img/Logo_1.png');?>">
                        </figure>
                        <h2 class='title'>Employee Vacation Request Form</h2>
                    </div>
                    
                    <div class="pdf_body">
                        <table class="table">
                            <tr>
                                <td>
                                    <lable class="form_lable">Name</lable>
                                    <?php echo $f_name;?> <?php echo $surname;?>
                                </td>
                                <td>
                                    <lable class="form_lable">Email</lable>
                                    <?php echo $email;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable class="form_lable">Leave type</lable>
                                    <?php echo $l_type;?>
                                </td>
                                <td>
                                    <lable class="form_lable">Leave days remaining</lable>
                                    <?php echo $r_days;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable class="form_lable">Leave from</lable>
                                    <?php echo date('d-m-Y',strtotime($l_from));?>
                                </td>
                                <td>
                                    <lable class="form_lable">Leave to</lable>
                                    <?php echo date('d-m-Y',strtotime($l_to));?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable class="form_lable">Back to Work</lable>
                                    <?php echo date('d-m-Y',strtotime($back_to));?>
                                </td>
                                <td>
                                    <lable class="form_lable">Leave days</lable>
                                    <?php echo $days;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable class="form_lable">Replacement</lable>
                                    <?php echo get_emp_field_by_id($replace)['name'];?> <?php echo get_emp_field_by_id($replace)['surname'];?>
                                </td>
                                <td>
                                    <lable class="form_lable">Approver 1 (Manager)</lable>
                                    <?php echo get_emp_field_by_id($approver)['name'];?> <?php echo get_emp_field_by_id($approver)['surname'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable class="form_lable">HR Manager</lable>
                                    <?php echo get_emp_field_by_id($manager)['name'];?> <?php echo get_emp_field_by_id($manager)['surname'];?>
                                </td>
                                <td>
                                    <lable class="form_lable">Approver 2</lable>
                                    <?php echo get_emp_field_by_id($approver2)['name'];?> <?php echo get_emp_field_by_id($approver2)['surname'];?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    .pdf_body{text-align:center;}
    .pdf_body .pdf_header{margin-bottom: 35px;}
    .pdf_body .pdf_header figure{width: 100px;margin: 0 auto 25px;}
    .pdf_body .pdf_header .title{font-size: 35px;}
    .pdf_body .form_lable{width:100%;font-weight:600;display:block;}
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
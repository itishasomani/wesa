<script src="<?php echo base_url('assets/backend/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/dist/js/adminlte.js');?>"></script>
<!-- Jquery Validate -->
<script src="<?php echo base_url('assets/backend/dist/js/jquery.validate.min.js'); ?>"></script>
<script>
    $("#loginForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            email: 'required',
            password: 'required'
        }
    });
</script>
</body>
</html>

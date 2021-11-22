<!-- Header -->
<?php $this->load->view('login-header'); ?>
<!-- / Header -->

<div class="login-box">
    <div class="login-logo">
        <a href="#">Wesa</a>
    </div>
    <?php if(isset($validation)):?>
    <div class="alert alert-danger">
        <?php $validation->listErrors();?>
    </div>
    <?php endif; ?>
    <!-- /.login-logo -->

    <div class="card">
        <?php $get_msg = $this->message->get_message() ?>
        <?php if(!empty($get_msg)):?>
            <?php echo $get_msg;?>
        <?php endif; ?>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Forget Password</p>

            <form action="<?php echo base_url('login/reset_password')?>" method="post" id="forgotPasswordForm">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- Footer -->
<?php $this->load->view('login-footer'); ?>
<!-- / Footer -->
<script>
    $("#forgotPasswordForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            email: 'required',
        }
    });
</script>
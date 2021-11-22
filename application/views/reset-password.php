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

            <form action="<?php echo base_url('login/password_reset')?>" method="post" id="resetPasswordForm">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <input type="hidden" name="token" value="<?php echo $token;?>">
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
    $("#resetPasswordForm").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{
            password: 'required',
            token: 'required',
            confirm_password:{
                required: true,
                equalTo: '#password'
            }
        }
    });
</script>
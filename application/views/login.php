<!-- Header -->
<?php $this->load->view('login-header'); ?>
<!-- / Header -->

<div class="login-box">
    <div class="login-logo">
        <a href="#">Wesa</a>
    </div>
    <?php $get_msg = $this->message->get_message() ?>
    <?php if(!empty($get_msg)):?>
    <?php echo $get_msg;?>
    <?php endif; ?>
    <!-- /.login-logo -->

    <div class="card">
        <?php $get_msg = $this->message->get_message() ?>
        <?php if(!empty($get_msg)):?>
            <?php echo $get_msg;?>
        <?php endif; ?>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?php echo base_url('login/do-login');?>" method="post" id="loginForm">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="<?php echo base_url('login/forget_password')?>">I forgot my password</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- Footer -->
<?php $this->load->view('login-footer'); ?>
<!-- / Footer -->
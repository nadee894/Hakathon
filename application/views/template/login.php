
<!--Page Content-->
<div id="page-content">
    <section class="container">
        <div class="block">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <header>
                        <h1 class="page-title">Sign In</h1>
                    </header>
                    <hr>
                    <form role="form" id="login_form" name="login_form" method="post">
                        <div class="form-group">
                            <label for="form-sign-in-Username">Username:</label>
                            <input id="txtusername" name="txtusername" type="text" class="form-control" placeholder="Username" autofocus>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-sign-in-password">Password:</label>
                            <input id="txtpassword" name="txtpassword" type="password" class="form-control" placeholder="Password">
                        </div><!-- /.form-group -->

                        <!--Forgot Password-->
                        <label class="form-group">

                            <span class="pull-left">
                                <a data-toggle="modal" href="#forgot_password_model"> Forgot your Password?</a>
                            </span>
                        </label>
                        <!--End Forgot Password-->

                        <div class="form-group clearfix">
                            <button type="submit" onclick="login()" class="btn pull-right btn-default" id="account-submit">Sign In</button>
                        </div><!-- /.form-group -->
                    </form>
                    <div id="login_msg" style="display: none">
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle fa-fw fa-lg"></i>
                            Login Successfull!!
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <!-- /.block-->
</div>
<!-- end Page Content-->


<script type="text/javascript" src="<?php echo base_url(); ?>application_resources/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">

                                var base_url = "<?php echo base_url(); ?>";
                                var site_url = "<?php echo site_url(); ?>";

                                $(document).ready(function() {
                                    
                                    $("#login_form").validate({
                                        focusInvalid: false,
                                        ignore: "",
                                        rules: {
                                            txtusername: "required",
                                            txtpassword: "required"
                                        }, submitHandler: function(form) {
                                        }
                                    });


                                    $("#reset_pw_form").validate({
                                        focusInvalid: false,
                                        ignore: "",
                                        rules: {
                                            reset_pw_email: "required"
                                        }, submitHandler: function(form) {

                                            var $form = $('#reset_pw_form');

                                            $.ajax({
                                                type: "POST",
                                                url: site_url + '/login/forget_password',
                                                data: $form.serialize(),
                                                success: function(msg) {
                                                    if (msg == '1') {
                                                        $('#fade_valid_msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Email Sent!!</div>');
                                                        $('#fade_valid_msg').fadeIn();
                                                        $('#fade_valid_msg').fadeOut(7000);
                                                        $('#forgot_password_model').modal('hide');
                                                    } else if (msg == '2') {
                                                        $('#fade_valid_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Email Not Sent!!</div>');
                                                        $('#fade_valid_msg').fadeIn();
                                                        $('#fade_valid_msg').fadeOut(4000);
                                                    } else {
                                                        $('#fade_valid_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Invalid User or Email!!</div>');
                                                        $('#fade_valid_msg').fadeIn();
                                                        $('#fade_valid_msg').fadeOut(4000);
                                                    }
                                                }
                                            });

                                        }
                                    });
                                });


                                function login() {
                                    var login_username = $('#txtusername').val();
                                    var login_password = $('#txtpassword').val();

                                    if ($('#login_form').valid()) {

                                        $.ajax({
                                            type: "POST",
                                            url: site_url + '/login/authenticate_user',
                                            data: "login_username=" + login_username + "&login_password=" + login_password,
                                            success: function(msg) {

                                                if (msg == 1) {
                                                    $('#login_msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Login Successfull!!</div>');
                                                    $('#login_msg').fadeIn();
                                                    $('#login_msg').fadeOut(4000);
                                                    setTimeout("location.href = site_url+'/login/load_login';", 100);
                                                } else {
                                                    login_form.reset();
                                                    $('#login_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Invalid Login Details!!</div>');
                                                    $('#login_msg').fadeIn();
                                                    $('#login_msg').fadeOut(4000);

                                                }
                                            }
                                        });
                                    }
                                }

</script>


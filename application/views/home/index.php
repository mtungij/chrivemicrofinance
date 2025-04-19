<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hospital/light/page-login.html by HTTraQt Website Copier/1.x [Karbofos 2012-2017] J2, 22 Mac 2020 05:59:56 GMT -->
<head>
<title>:MIKOPOSOFT: Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color_skins.css">
</head>

<body class="theme-blue">
    <style> 
        body {background-image: url('<?php echo base_url(); ?>assets/img/pxfuel.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; } </style>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="<?php echo base_url() ?>assets/img/mikopo.png" style="width: 200px;height: 50px;">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>

                        </div>
                        <?php if ($das = $this->session->flashdata('mass')): ?> 
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="alert alert-dismisible alert-danger"> 
                                        <a href="" class="close">&times;</a> <?php echo $das;?> 
                                    </div> 
                                </div> 
                            </div> 
                            <?php endif; ?> 
                            <?php if ($das = $this->session->flashdata('massage')): ?> <div class="row"> <div class="col-md-12"> 
                                <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                        <?php endif; ?> 
                        <div class="body">
                            <?php echo form_open("welcome/signin",['class'=>'form-auth-small']) ?>
                            <!-- <form class="form-auth-small" action=""> -->
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Phone number</label>
                                    <input type="number" class="form-control" name="comp_phone"  placeholder="Eg.0753(XXXX)34" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="******" required>
                                </div>
                                <!-- <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>                                
                                </div> -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <!-- <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span> -->
                                    <!-- <span>Don't have an account? <a href="page-register.html">Register</a></span> -->
                                </div>
                                <?php echo form_close(); ?>
                            <!-- </form> -->
                        </div>

                    </div>

                </div>
                 <?php $date = date("Y") ?>
     <marquee direction = "right"><h5>  CHRIVE MICROFINANCE  &copy; <?php echo $date; ?></h5></marquee>
            </div>

        </div>
    </div>

    <!-- END WRAPPER -->
</body>

<!-- Mirrored from www.wrraptheme.com/templates/lucid/hospital/light/page-login.html by HTTraQt Website Copier/1.x [Karbofos 2012-2017] J2, 22 Mac 2020 05:59:57 GMT -->
</html>

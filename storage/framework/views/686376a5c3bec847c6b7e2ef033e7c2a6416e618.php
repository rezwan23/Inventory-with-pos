<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | INPoS</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset('inpos/favicon.ico')); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo e(asset('inpos/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('inpos/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('inpos/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(asset('inpos/css/style.css')); ?>" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">In<b>PoS</b></a>
        <small>Inventory Management System with POS</small>
    </div>
    <div class="card">
        <div class="body">
            <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <form id="sign_in" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="msg">Sign in to start your session</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input id="email" type="email" placeholder="Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input id="password" placeholder="Password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input class="form-check-input filled-in chk-col-pink" type="checkbox" name="remember" id="rememberme" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <label for="rememberme">Remember Me</label>
                        
                        
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="<?php echo e(route('register')); ?>">Register Now!</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo e(asset('inpos/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/node-waves/waves.js')); ?>"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery-validation/jquery.validate.js')); ?>"></script>

<!-- Custom Js -->
<script src="<?php echo e(asset('inpos/js/admin.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/js/pages/examples/sign-in.js')); ?>"></script>
</body>

</html>
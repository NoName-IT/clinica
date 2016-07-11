<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo app('translator')->get('general.full_title_tag'); ?></title>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

     <link rel="stylesheet" href="<?php echo asset('bower_components/lato/lato.css'); ?>" />

    <!-- Fonts -->
    <link href="<?php echo asset('bower_components/font-awesome/css/font-awesome.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />

    <!-- Styles -->

    <link href="<?php echo asset('bower_components/bootstrap/css/bootstrap.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />


     <link href="<?php echo asset('bower_components/morrisjs/morris.css'); ?>" media="all" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="<?php echo asset('bower_components/jquery/dist/jquery.min.js'); ?>"></script>

     <script type="text/javascript" src="<?php echo asset('bower_components/raphael/raphael.min.js'); ?>"></script>

     <script type="text/javascript" src="<?php echo asset('bower_components/morrisjs/morris.min.js'); ?>"></script>

     <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="<?php echo asset('bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

     <script type="text/javascript" src="<?php echo asset('bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

    <link rel="stylesheet" href="<?php echo asset('bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>" />

    <!-- Latest compiled and minified CSS -->

     <link rel="stylesheet" href="<?php echo asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" />

    <script type="text/javascript" src="<?php echo asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>


    <script src="<?php echo asset('bower_components/bootstrap-checkbox/js/bootstrap-checkbox.js'); ?>" defer></script>

    <link rel="stylesheet" href="<?php echo asset('bower_components/jquery-confirm/dist/jquery-confirm.min.css'); ?>" />

    <script src="<?php echo asset('bower_components/jquery-confirm/dist/jquery-confirm.min.js'); ?>" defer></script>

    <script src="<?php echo asset('bower_components/jqueryui/jquery-ui.min.js'); ?>" defer></script>
    <link rel="stylesheet" href="<?php echo asset('bower_components/jqueryui/jquery-ui.min.css'); ?>" />

    <script src="<?php echo asset('js/app.js'); ?>"></script>

    <script src="<?php echo asset('bower_components/bootstrap/js/bootstrap.min.js'); ?>" defer></script>


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo app('translator')->get('general.title_tag'); ?>
                </a>

                <?php if(! Auth::guest()): ?>
                 
                <div class="btn-group center" role="group">
                    <a class="btn btn-default" href="<?php echo e(url('/internments')); ?>">
                        <?php echo app('translator')->get('general.internment_module'); ?>
                    </a>
                    <a class="btn btn-default" href="<?php echo e(url('/patients')); ?>">
                        <?php echo app('translator')->get('general.patient_module'); ?>
                    </a>
                    <a class="btn btn-default" href="<?php echo e(url('/medical_insurances')); ?>">
                        <?php echo app('translator')->get('general.medical_insurance_module'); ?>
                    </a>
                     <a class="btn btn-default" href="<?php echo e(url('/coinsurances')); ?>">
                        <?php echo app('translator')->get('general.coinsurance_module'); ?>
                    </a>
                    <a class="btn btn-default" href="<?php echo e(url('/medics')); ?>">
                        <?php echo app('translator')->get('general.medic_module'); ?>
                    </a>
                </div>

                <?php endif; ?>
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>"><?php echo app('translator')->get('auth.login_tag'); ?></a></li>
                        <li><a href="<?php echo e(url('/register')); ?>"><?php echo app('translator')->get('auth.register_tag'); ?></a></li>
                    <?php else: ?>
                        <li role="presentation" class="dropdown">
                          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">6</span>
                          </a>
                          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                              <a>
                                <span class="message">
                                        Paciente Carlos Ramirez cambio de obra social (IOMA -> OSDE)
                                </span>
                              </a>
                           
                            <li>
                              <div class="text-center">
                                <a href="<?php echo e(url('/home')); ?>">
                                  <strong><?php echo app('translator')->get('general.see_all_alerts'); ?></strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                            </li>
                          </ul>
                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/admin/users')); ?>"><i class="fa fa-btn fa-users"></i><?php echo app('translator')->get('general.users'); ?></a></li>
                                <li><a href="<?php echo e(route('admin.users.edit',Auth::user()->id)); ?>"><i class="fa fa-btn fa-user"></i><?php echo app('translator')->get('auth.change_password_tag'); ?></a></li>
                                <li><a href="<?php echo e(url('/admin/medic_types')); ?>"><i class="fa fa-btn fa-cog"></i><?php echo app('translator')->get('auth.configuration'); ?></a></li>
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i><?php echo app('translator')->get('auth.logout_tag'); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- JavaScripts -->

</body>
</html>

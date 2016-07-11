<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('general.full_title_tag')</title>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

     <link rel="stylesheet" href="{!! asset('bower_components/lato/lato.css') !!}" />

    <!-- Fonts -->
    <link href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <!-- Styles -->

    <link href="{!! asset('bower_components/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


     <link href="{!! asset('bower_components/morrisjs/morris.css') !!}" media="all" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>

     <script type="text/javascript" src="{!! asset('bower_components/raphael/raphael.min.js') !!}"></script>

     <script type="text/javascript" src="{!! asset('bower_components/morrisjs/morris.min.js') !!}"></script>

     <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="{!! asset('bower_components/moment/min/moment-with-locales.min.js') !!}"></script>

     <script type="text/javascript" src="{!! asset('bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}"></script>

    <link rel="stylesheet" href="{!! asset('bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}" />

    <!-- Latest compiled and minified CSS -->

     <link rel="stylesheet" href="{!! asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') !!}" />

    <script type="text/javascript" src="{!! asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') !!}"></script>


    <script src="{!! asset('bower_components/bootstrap-checkbox/js/bootstrap-checkbox.js') !!}" defer></script>

    <link rel="stylesheet" href="{!! asset('bower_components/jquery-confirm/dist/jquery-confirm.min.css') !!}" />

    <script src="{!! asset('bower_components/jquery-confirm/dist/jquery-confirm.min.js') !!}" defer></script>

    <script src="{!! asset('bower_components/jqueryui/jquery-ui.min.js') !!}" defer></script>
    <link rel="stylesheet" href="{!! asset('bower_components/jqueryui/jquery-ui.min.css') !!}" />

    <script src="{!! asset('js/app.js') !!}"></script>

    <script src="{!! asset('bower_components/bootstrap/js/bootstrap.min.js') !!}" defer></script>


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
                <a class="navbar-brand" href="{{ url('/') }}">
                    @lang('general.title_tag')
                </a>

                @if (! Auth::guest())
                 
                <div class="btn-group center" role="group">
                    <a class="btn btn-default" href="{{ url('/internments') }}">
                        @lang('general.internment_module')
                    </a>
                    <a class="btn btn-default" href="{{ url('/patients') }}">
                        @lang('general.patient_module')
                    </a>
                    <a class="btn btn-default" href="{{ url('/medical_insurances') }}">
                        @lang('general.medical_insurance_module')
                    </a>
                     <a class="btn btn-default" href="{{ url('/coinsurances') }}">
                        @lang('general.coinsurance_module')
                    </a>
                    <a class="btn btn-default" href="{{ url('/medics') }}">
                        @lang('general.medic_module')
                    </a>
                </div>

                @endif
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">@lang('auth.login_tag')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('auth.register_tag')</a></li>
                    @else
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
                                <a href="{{ url('/home') }}">
                                  <strong>@lang('general.see_all_alerts')</strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                            </li>
                          </ul>
                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/users') }}"><i class="fa fa-btn fa-users"></i>@lang('general.users')</a></li>
                                <li><a href="{{ route('admin.users.edit',Auth::user()->id) }}"><i class="fa fa-btn fa-user"></i>@lang('auth.change_password_tag')</a></li>
                                <li><a href="{{ url('/admin/medic_types') }}"><i class="fa fa-btn fa-cog"></i>@lang('auth.configuration')</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('auth.logout_tag')</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->

</body>
</html>

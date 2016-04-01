<!DOCTYPE html>
<html>
<head>
    <title>Merak</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}"/>

    <link href="{{ URL::to('assets/adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/adminlte/dist/css/skins/skin-green.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/bootstrap/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::to('assets/adminlte/plugins/select2/select2.min.css') }}" type="text/css">

    <script type="text/javascript" src="{{ URL::to('assets/js/jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/jquery-ui.min.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::to('assets/css/jquery-ui.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::to('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/jquery-1.10.2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/jquery-ui.js') }}"></script>

    <!-- iCheck -->
    <link href="{{ URL::to('assets/adminlte/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::to('assets/AnimatedHeaderBackgrounds/css/normalize.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/AnimatedHeaderBackgrounds/css/demo.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        /* Header */
        .large-header {
            position: relative;
            width: 100%;
            background: #333;
            overflow: hidden;
            /*background-size: cover;*/
            background-position: center center;
            z-index: 1;
        }

        .demo-2 .large-header {
            /*background-image: url({{ URL::to('assets/AnimatedHeaderBackgrounds/img/demo-2-bg.jpg') }});*/
            /*background-image: url({{ URL::to('assets/AnimatedHeaderBackgrounds/img/sky2.jpg') }});*/
            background-image: url({{ URL::to('assets/AnimatedHeaderBackgrounds/img/Theme-EcoCampus1.png') }});
            /*background-image: url({{ URL::to('assets/AnimatedHeaderBackgrounds/img/demo-2-bg.jpg') }});*/
            background-repeat: repeat;
            background-position: center bottom;
        }

        .main-title {
            position: absolute;
            margin: 0;
            padding: 0;
            color: #f9f1e9;
            text-align: center;
            top: 50%;
            left: 50%;
            /*-webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);*/
        }

        .main-title .thin {
            font-weight: 200;
        }

        @media only screen and (max-width : 768px) {

            .demo-2 .main-title {
                font-size: 4em;
            }
        }
    </style>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/dist/js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/chartjs/Chart.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/chartjs/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/adminlte/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/AnimatedHeaderBackgrounds/js/rAF.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/AnimatedHeaderBackgrounds/js/demo-2.js') }}"></script>

</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


<script type="text/javascript" src="{{ URL::to('assets/AnimatedHeaderBackgrounds/js/rAF.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/AnimatedHeaderBackgrounds/js/demo-2.js') }}"></script>

<!-- iCheck -->


<script>
    $(document).ready(function(){
        $("h5.catatan").click(function(){
            console.log('klik toggle');
            $("div.list-catatan").toggle('slow');
        });
    });

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>



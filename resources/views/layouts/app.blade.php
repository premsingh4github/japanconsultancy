<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('re_logo.png')}}" type="image/x-icon">
    <title>
        @if(isset($title))
            {!! $title !!}
        @else
            Login Page - Project Management System
        @endif
    </title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('public/server')}}/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/server')}}/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/server')}}/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.css">

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="{{asset('public/server')}}/assets/css/oneui.min.css">
</head>
<body>

@yield('content')

<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('public/server')}}/assets/js/pages/be_tables_datatables.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/oneui.core.min.js"></script>

<script src="{{asset('public/server')}}/assets/js/oneui.app.min.js"></script>
<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.js"></script>
<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('public/server')}}/assets/js/pages/be_pages_dashboard.min.js"></script>
<script>jQuery(function(){ One.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>

</body>
</html>
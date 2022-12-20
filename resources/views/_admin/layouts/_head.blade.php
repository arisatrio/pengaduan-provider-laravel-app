<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

    <script src="{{ asset('bower_components/PACE/pace.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bower_components/PACE/themes/red/pace-theme-minimal.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/izitoast/css/iziToast.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
</head>
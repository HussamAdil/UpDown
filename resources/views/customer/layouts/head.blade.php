<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{env('APP_NAME')}} </title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('dashboard-assets/images/favicon.ico" type="image/x-icon')}}">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
<link rel="stylesheet" href="{{asset('dashboard-assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/custom.css')}}">

</head>

<body>
    <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->
        <!-- [ navigation menu ] start -->
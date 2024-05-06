<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('app-title', 'Quality Commercial Cleaning') | QCC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/new-images/favicon-new.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- plugins -->
    <link href="{{ asset('libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet">
    <!-- third party css -->
    <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->
    <!-- wizard start-->
    <link rel="stylesheet" href="{{ asset('libs/smartwizard/css/smart_wizard.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/smartwizard/css/smart_wizard_theme_arrows.min.css') }}"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/smartwizard/css/smart_wizard_theme_circles.min.css') }}"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/smartwizard/css/smart_wizard_theme_dots.min.css') }}"
        type="text/css" />
    <!-- wizard end-->
    <!-- App css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <!-- fancybox gallery -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css')}}">
    <link href=" https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
        disabled />
    <link href="{{ asset('css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />
    <!-- Plugins css -->
    <link href="{{ asset('libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/sweet-alert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropify css -->


    <!-- icons -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .error {
            color: #ff5c75 !important
        }

        .buttons-columnVisibility.active {
            background: #dedede;
            color: #009ac8;
        }

        #basic-datatable_filter {
            display: inline-block;
            float: right;
            margin-bottom: 22px;
        }

        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            background-color: #ff94940a !important;
        }

        .invalid-select {
            border-color: #ff5c75 !important;
            padding-right: calc(1.5em + .9rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23ff5c75'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23ff5c75' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .225rem) center;
            background-size: calc(.75em + .45rem) calc(.75em + .45rem);
            background-color: #ff94940a !important;
        }

        .dataTables_wrapper .middle {
            overflow-x: scroll;
            width: 100%;
        }
        .main_loader{
            display: none;
            background: #000000bd;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 10000;
        }

        .loader {
            border: 8px solid #3498db;
            border-radius: 50%;
            border-top: 8px solid #ffef00;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -25px;
            margin-left: -25px;
            z-index: 9999;
        }
        .loader_span{
            position: fixed;
            top: 56%;
            left: 47%;
            font-size: 19px;
            color: #fff;
            font-weight: bold;
        }
        .owl-stage-outer{
            overflow-x:auto !important; 
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<!-- Loader -->
<div class="main_loader">
    <div class="loader"></div>
    <span class="loader_span">Processing</span>
</div>


@include('layouts.includes.alerts')
@include('layouts.includes.header')

@yield('main-content')

@include('layouts.includes.footer')
@stack('push_script')

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
@if ( app()->getLocale()== 'ar')
    <title> لوحة التحكم | موقع Zara </title>
@endif
@if ( app()->getLocale()== 'en')
<title>Admin Panel  |  Zara </title>
@endif




@if ( app()->getLocale()== 'en')
    <title>Admin Panel  |  Zara</title>
@endif

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="apple-touch-icon" href="{{asset('admin-layout/app-assets/images/ico/apple-icon-120.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/fab.png')}}">

@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/font-rtl.css')}}">
@else
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
@endif

<!-- BEGIN: Vendor CSS-->
@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/vendors-rtl.min.css')}}">
@endif
@if ( app()->getLocale()== 'en')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/vendors.min.css')}}">
@endif
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/charts/apexcharts.css')}}">

<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/plugins/tour/tour.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/assets/css/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

@else
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/plugins/tour/tour.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
@endif
<style>
    @if ( app()->getLocale()== 'ar')
        th {
        text-align: right !important;
    }

    @endif
/*div.dataTables_wrapper div.dataTables_paginate {*/
    /*display: none !important;*/

    /*}*/
    /*.con-vs-pagination {*/
    /*margin: auto !important;*/
    /*}*/
</style>
{{--<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">--}}
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/pages/data-list-view.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">--}}

@else
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/pages/data-list-view.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/plugins/file-uploaders/dropzone.css')}}">--}}
@endif
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/forms/select/select2.min.css')}}">


<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<script  defer src="{{ url('js/app.js?aaa=sss') }}"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- END: Custom CSS-->


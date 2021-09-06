<!DOCTYPE html>
@if ( app()->getLocale()== 'ar')
    <html class="loading" lang="ar" data-textdirection="rtl">
    @else
        <html class="loading" lang="en" data-textdirection="ltr">
        @endif
<!-- BEGIN: Head-->

<head>
    <script src="https://kit.fontawesome.com/987675073d.js" crossorigin="anonymous"></script>
    @include('dashboard_layout.header')
<style>

    .upload-btn-wrapper{
        position: relative;
        height: 200px;
        width: 200px;
        margin-bottom: 20px;
        padding: 5px;
    }
    .upload-btn-wrapper .upload-btn{
        position: relative;
        background-color: #f7f7f7;
        width: 100%;
        height: 100%;
        border-radius: 17px;
        margin: 0px;
        padding: 0px;
        border: none;
        font-size: 60px;
        color: #7367F0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .upload-btn-wrapper .upload-btn img{
        max-width: 100%;
        max-height: 100%;
    }
    .upload-btn-wrapper .profile-img-input{
        position: absolute;
        right: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        cursor: pointer;
    }
    .upload-hover{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
        justify-content: center;
        align-items: center;
    }
    .upload-btn-wrapper:hover{
        border: 2px solid #e3e3e3;
    }
    .social a{
        width: 20px;
        height: 30px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
    }
</style>
    <style>
        table.data-list-view.dataTable thead th:first-child, table.data-thumb-view.dataTable thead th:first-child {
            padding-left: 25px !important;
        }
    </style>
    <style>
        .search-nav{
            margin: 15px;
            height: 40px;
            width: calc(100% - 30px);
            background-color: #fff;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 15px;
        }
        .search-nav h2{
            font-weight: 500;
            color: #636363;
            font-size: 20px;
            margin-bottom: 0px;
        }
        .search-nav .search, .search-nav .filter, .search-nav .search-form{
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .search-nav .search-form{
            display: none;
        }
        .search-nav .search-form .form-control{
            height: 25px;
            border: 0px;
            border-bottom: 1px solid #D9D9D9;
            border-radius: 0px;
            padding: 0px;
            width: 165px;
            background-color: transparent;
        }
        .search-form .form-control:focus{
            box-shadow: none;
        }
        .filter-form{
            display: none;
            margin: 15px;
            padding: 15px;
            height: auto;
            width: calc(100% - 30px);
            background-color: #fff;
            border-radius: 5px;
        }
        .filter-form .form-control{
            height: 40px;
        }
        .field-add, .field-delete{
            display: inline-flex;
            height: 40px;
            width: 40px;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            margin: 0px 5px;
        }
        .field-add{
            border: 1px solid #D9D9D9;
            border-radius: 5px;
        }
        .appere{
            display: block !important;
        }
        .inline-appere{
            display: inline-block !important;
        }
    </style>
    @stack('style')
    @livewireStyles
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header - horizontal-header -->
@include('dashboard_layout.horizontal-menu')

<!-- END: Header  - horizontal-header -->


<!-- BEGIN: Main Menu- sidebar-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    @include('dashboard_layout.sidebar')
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->

<div id="app">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                @yield('content')


            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        @include('dashboard_layout.footer')
    </footer>
    <!-- END: Footer-->
</div>

<!-- BEGIN: Vendor JS-->
<script src="{{asset('admin-layout/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('admin-layout/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
{{--<script src="{{asset('admin-layout/app-assets/vendors/js/extensions/tether.min.js')}}"></script>--}}
{{--<script src="{{asset('admin-layout/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('admin-layout/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/js/scripts/components.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('admin-layout/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>

<!-- BEGIN: Page JS-->


<!-- END: Page JS-->
@livewireScripts
<script>
    const SwalModal = (title, html,type,url) => {
        console.log(url);
        Swal.fire({
            title,
            html,
            type,

        }).then(function(){
            if(url){
                location.href=url
            }

        })
    }

    const SwalConfirm = (icon, title, html,confirmButtonText,cancelButtonText, method, params, callback) => {

        Swal.fire({
            title,
            html,
            icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText,
            cancelButtonText,
            reverseButtons: true,
        }).then(result => {
            if (result.value) {
                return livewire.emit(method, params)
            }

            if (callback) {
                return livewire.emit(callback)
            }
        })
    }

    const SwalAlert = (icon, title, timeout = 7000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: timeout,
            onOpen: toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon,
            title
        })
    }

    document.addEventListener('DOMContentLoaded', () => {
        this.livewire.on('swal:modal', data => {

            SwalModal(data.title, data.text,data.type,data.url)
        })

        this.livewire.on('swal:confirm', data => {
            SwalConfirm(data.type, data.title, data.text, data.confirmText,data.cancelText, data.method, data.params, data.callback)
        })

        this.livewire.on('swal:alert', data => {
            SwalAlert(data.icon, data.title, data.timeout)
        })
        this.livewire.on('model:basic', data => {
            console.log(data);
            $('#'+data.name).modal(data.action);
        })
    })

</script>
@stack('script')

</body>
<!-- END: Body-->

</html>



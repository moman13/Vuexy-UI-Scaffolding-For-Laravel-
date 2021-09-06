@extends('dashboard_layout.main')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">الرئيسية</h2>
            </div>
        </div>
    </div>

</div>
<div class="row" >
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class="fa fa-users-cog text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\User::count()}}</h2>
                    <p class="mb-0 line-ellipsis"> إجمالي الزبائن</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class="fas fa-shipping-fast text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\Order::count()}}</h2>
                    <p class="mb-0 line-ellipsis">إجمالي الطلبات</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                        <div class="avatar-content">

                            <i class="fas fa-box-open text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\Product::count()}}</h2>
                    <p class="mb-0 line-ellipsis"> إجمالي المنتجات</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class="far fa-question-circle text-success font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\Category::count()}}</h2>
                    <p class="mb-0 line-ellipsis">إجمالي التصنيفات</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class=" far fa-envelope text-success font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\ContactUS::count()}}</h2>
                    <p class="mb-0 line-ellipsis">إجمالي الرسائل</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class="fas fa-ad  text-success font-medium-5"></i>

                        </div>
                    </div>
                    <h2 class="text-bold-700">{{\App\Models\GallaryBanner::count()}}</h2>
                    <p class="mb-0 line-ellipsis">إجمالي البنارات الاعلانية</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
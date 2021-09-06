<div class="search-nav">
    <h2>Thumb View</h2>
    <div class="">
        <form class="search-form">
            <input type="text" class="form-control" placeholder="search">
        </form>
        <div class="search"><i class="feather icon-search"></i></div>
        <div class="filter"><i class="feather icon-filter"></i></div>
    </div>
</div>

<form class="filter-form">
    <div class="row">
        <div class="col-12">
            <div class="custom-control custom-checkbox d-inline-block">
                <input type="checkbox" class="custom-control-input" checked="" name="customCheck" id="customCheck1">
                <label class="custom-control-label" for="customCheck1"></label>
            </div>
            <span class="d-inline-block">طبق</span>
            <select class="form-control d-inline-block" style="width: 70px;">
                <option selected>All</option>
            </select>
            <span class="d-inline-block">من القواعد التالية</span>
        </div>
    </div>

    <h4 class="card-title mb-1 mt-3">إختر الحقول</h4>
    <div class="field-filter">
        <div class="row mb-2">
            <div class="col-md-4">
                <select class="form-control">
                    <option selected>إختر حقل</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control">
                    <option selected>الشرط</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div class="field-add" onclick="addField(this)"><i class="feather icon-plus"></i></div>
                <div class="field-delete" onclick="deleteField(this)" disabled><i class="feather icon-trash"></i></div>
            </div>
        </div>
    </div>

    <h4 class="card-title mb-1 mt-3">إختر التواريخ</h4>
    <div class="row mb-2">
        <div class="col-md-4">
            <select class="form-control">
                <option selected>التاريخ</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control pickadate">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control pickadate">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Submit</button>
            <button type="reset" class="btn btn-outline-warning mr-1 waves-effect waves-light">Reset</button>
        </div>
    </div>
</form>
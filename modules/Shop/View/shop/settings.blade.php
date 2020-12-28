@include("assets.main-head",["title"=>"V8","subTitle"=>__("base.settings","Shop Settings")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("base.settings","Shop Settings")}}</a></li>
        </ul>
    </div>
</div>
<div class="input-group col-md-8 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نام فروشگاه</span>
    </div>
    <input type="text" class="form-control py-4" id="shop_name">
</div>
<div class="input-group col-md-4 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">حوزه فعالیت</span>
    </div>
    <input type="text" class="form-control py-4" value="غذایی" disabled readonly id="">
</div>

<div class="input-group col-md-4 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">مبلغ کرایه پیک (برای هر کیلومتر)</span>
    </div>
    <input type="text" class="form-control py-4" id="peyk_delivery_price">
    <div class="input-group-append">
        <span class="input-group-text" style="height: 50px">تومان</span>
    </div>
</div>

@include("assets.main-foot")

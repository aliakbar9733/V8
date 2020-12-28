@include("assets.main-head",["title"=>"V8","subTitle"=>__("shop.categoryCreate","Create Category")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("shop.categoryCreate","Create Category")}}</a></li>
        </ul>
    </div>
</div>
<div class="input-group col-md-5 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">عنوان</span>
    </div>
    <input type="text" class="form-control py-4" id="title">
</div>
<div class="input-group col-md-5 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نامک</span>
    </div>
    <input type="text" class="form-control py-4" id="slug">
</div>
<div class="input-group col-md-2 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نوع دسته بندی</span>
    </div>
    <input type="text" class="form-control py-4" value="food" readonly disabled id="type">
</div>
<div class="col-md-2 mx-auto mt-3">
    <button class="w-100 btn btn-success" id="store" style="font-weight: 700;font-size: 16px">ثبت دسته بندی</button>
</div>
@include("assets.main-foot")
<script>
    $("#store").click(function () {
        submiter(["#title", "#slug", "#type"], "api/category/store", "POST");
    })
</script>

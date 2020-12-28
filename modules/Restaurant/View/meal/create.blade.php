@include("assets.main-head",["title"=>"V8","subTitle"=>__("restaurant.mealCreate","Create Meal")])
<!-- BEGIN PAGE CSS -->
<link href="@assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.css" rel="stylesheet">
<!-- END PAGE CSS -->
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("restaurant.mealCreate","Create Meal")}}</a></li>
        </ul>
    </div>
</div>
<div class="input-group col-md-4 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">عنوان</span>
    </div>
    <input type="text" class="form-control py-4" id="title">
</div>
<div class="input-group col-md-4 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">
            زمان شروع
        </span>
    </div>
    <input type="text" class="form-control py-4 clockpicker-autoclose" id="start">
    <div class="input-group-append">
        <span class="input-group-text" style="height: 50px">
            <i class="icon-clock"></i>
        </span>
    </div>
</div>
<div class="input-group col-md-4 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">
            زمان پایان
        </span>
    </div>
    <input type="text" class="form-control py-4 clockpicker-autoclose" id="end">
    <div class="input-group-append">
        <span class="input-group-text" style="height: 50px">
            <i class="icon-clock"></i>
        </span>
    </div>
</div>
<div class="col-md-2 mx-auto mt-3">
    <button class="w-100 btn btn-success" id="store" style="font-weight: 700;font-size: 16px">ثبت دسته بندی</button>
</div>
@include("assets.main-foot")
<!-- BEGIN PAGE JAVASCRIPT -->
<script src="@assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
<script src="@assets/js/pages/clock.js"></script>
<!-- END PAGE JAVASCRIPT -->
<script>
    $("#store").click(function () {
        submiter(["#title", "#start", "#end"], "api/meal/store", "POST");
    })
</script>

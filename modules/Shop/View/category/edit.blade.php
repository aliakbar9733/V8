<?php
/**
 * @var Category $category
 */

use Module\Shop\Model\Category;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("shop.categoryEdit","Edit Category")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("shop.categoryEdit","Edit Category")}}</a></li>
        </ul>
    </div>
</div>
<div class="input-group col-md-5 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">عنوان</span>
    </div>
    <input type="text" value="{{$category->title}}" class="form-control py-4" id="title">
</div>
<div class="input-group col-md-5 mx-auto mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نامک</span>
    </div>
    <input type="text" value="{{$category->slug}}" class="form-control py-4" id="slug">
</div>
<div class="input-group col-md-2 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نوع دسته بندی</span>
    </div>
    <input type="text" value="{{$category->type}}" class="form-control py-4" readonly disabled id="type">
</div>
<div class="col-md-2 mx-auto mt-3">
    <button class="w-100 btn btn-success" id="update" style="font-weight: 700;font-size: 16px">ثبت تغییرات</button>
</div>
@include("assets.main-foot")
<script>
    $("#update").click(function () {
        submiter(["#title", "#slug", "#type"], "api/category/update/{{$category->id}}", "POST");
    })
</script>

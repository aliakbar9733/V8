<?php
/**
 * @var Category[] $categories
 */

use Module\Shop\Model\Category;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("shop.category","Categories")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("shop.category","Categories")}}</a></li>
            <li>
                <a href="@url/category/create/" class="btn btn-success">افزودن دسته بندی</a>
            </li>
        </ul>
    </div>
</div>
<div class="col-md-12 mb-5">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="branches">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>نامک</th>
                <th>نوع</th>
                <th>مدیریت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->type}}</td>
                    <td>
                        <a class="btn btn-primary text-white" href="@url/category/{{$category->id}}/edit/">ویرایش</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include("assets.main-foot")
<script>
    var branches = $("#branches").DataTable()

</script>
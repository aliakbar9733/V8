<?php
/**
 * @var Food[] $foods
 * @var Branch $branch
 */

use Module\Restaurant\Model\Branch;
use Module\Restaurant\Model\Food;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("restaurant.foods","Foods")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("restaurant.foods","Foods")}}</a></li>
            <li>
                <a href="@url/food/create/{{$branch->id}}/" class="btn btn-success">افزودن غذا</a>
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
                <th>نام غذا</th>
                <th>تصویر</th>
                <th>قیمت</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($foods as $food)
                <tr>
                    <td>{{$food->id}}</td>
                    <td>{{$food->name}}</td>
                    <td>
                        @if($food->images)
                            <img width="150px" height="150px" src="@assets/images/{{$food->images}}">
                        @endif
                    </td>

                    <td>{{$food->price}}</td>
                    <td>{!!$food->statusLabel()!!}</td>
                    <td>
                        <a class="btn btn-primary text-white" href="@url/food/{{$food->id}}/edit">ویرایش</a>
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
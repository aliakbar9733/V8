<?php
/**
 * @var Meal[] $meals
 */

use Module\Restaurant\Model\Meal;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("restaurant.meals","Meals")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("restaurant.meals","Meals")}}</a></li>
            <li>
                <a href="@url/meal/create/" class="btn btn-success">افزودن وعده</a>
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
                <th>ساعت شروع</th>
                <th>ساعت پایان</th>
                <th>مدیریت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($meals as $meal)
                <tr>
                    <td>{{$meal->id}}</td>
                    <td>{{$meal->title}}</td>
                    <td>{{$meal->start}}</td>
                    <td>{{$meal->end}}</td>
                    <td>
                        <a class="btn btn-primary text-white" href="@url/meal/{{$meal->id}}/edit/">ویرایش</a>
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
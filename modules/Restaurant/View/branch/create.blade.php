<?php
/**
 * @var User[] $users Users Who Dont Have Branch
 */

use Module\JWT\Model\User;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("restaurant.addBranch","Add Branch")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("restaurant.addBranch","Add Branch")}}</a></li>
        </ul>
    </div>
</div>
<div class="input-group col-md-12 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">نام شعبه</span>
    </div>
    <input type="text" class="form-control py-4" id="name">
</div>
<div class="input-group col-md-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">عرض جغرافیایی</span>
    </div>
    <input type="text" class="form-control py-4" id="latitude">
</div>
<div class="input-group col-md-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">طول جغرافیایی</span>
    </div>
    <input type="text" class="form-control py-4" id="longitude">
</div>
<div class="input-group col-md-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">مالیات</span>
    </div>
    <input type="text" class="form-control py-4" id="tax">
</div>
<div class="input-group col-md-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">حداقل قیمت خرید</span>
    </div>
    <input type="text" class="form-control py-4" id="min_buy">
</div>

<div class="input-group col-md-4 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">مدیر شعبه</span>
    </div>
    <select class="select2" id="admin_id">
        <option value="">لطفا مدیر شعبه را انتخاب نمایید</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->family}}</option>
        @endforeach
    </select>
</div>
<div class="input-group col-md-4 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">مسئول سفارشات</span>
    </div>
    <select class="select2" id="order_id">
        <option value="">لطفا مسئول سفارشات شعبه را انتخاب نمایید</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} {{$user->family}}</option>
        @endforeach
    </select>
</div>
<div class="input-group col-md-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">تصویر</span>
    </div>
    <input type="file" class="mt-2 ml-3" id="image">
</div>
<div class="input-group col-md-12 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" style="height: 50px">ادرس</span>
    </div>
    <input type="text" class="form-control py-4" id="address">
</div>
<button class="submit btn btn-success col-md-2 mx-auto mt-4" style="font-size: 18px">ثبت شعبه</button>

@include("assets.main-foot")
<script>
    $(".submit").click(function () {
        submiter(["#name", "#latitude", "#longitude", "#tax", "#min_buy", '#admin_id', "#address"], "api/branch/store", "POST", ["#image"], ['#order_id']);
    })
</script>
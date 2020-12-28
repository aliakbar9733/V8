<?php
/**
 * @var Branch[] $branches
 */

use Module\Restaurant\Model\Branch;

?>
@include("assets.main-head",["title"=>"V8","subTitle"=>__("restaurant.branches","Branches")])
<div class="col-md-12">
    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <li><a>{{__("restaurant.branches","Branches")}}</a></li>
        </ul>
    </div>
</div>
<div class="col-md-12 mb-5">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="branches">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام شعبه</th>
                <th>تصویر</th>
                <th>عرض جغرافیایی</th>
                <th>طول جغرافیایی</th>
                <th>مالیات</th>
                <th>حداقل هزینه</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{$branch->id}}</td>
                    <td>{{$branch->name}}</td>
                    <td>
                        @if($branch->image)
                            <img width="150px" height="150px" src="@assets/images/{{$branch->image}}">
                        @endif
                    </td>
                    <td>{{$branch->latitude}}</td>
                    <td>{{$branch->longitude}}</td>
                    <td>{{$branch->tax}}</td>
                    <td>{{$branch->min_buy}}</td>
                    <td>{!!$branch->statusLabel()!!}</td>
                    <td>
                        <a class="btn btn-warning text-white" href="@url/food/{{$branch->id}}/">غذا ها</a>
                        <a class="btn btn-primary text-white" href="@url/branch/{{$branch->id}}/edit">ویرایش</a>
                        <a class="btn btn-danger text-white" href="@url/branch/{{$branch->id}}/edit">حذف</a>
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
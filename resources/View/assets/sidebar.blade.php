<div id="sidebar">
    <div class="sidebar-top">
        <div class="user-box">
            <div class="user-details">
                <h2 class="text-white text-center">{{$user->name}} {{$user->family  }}</h2>
                <p class="text-white"> &nbsp; موجودی کیف پول :‌{{$user->credit}} تومان</p>
            </div>
        </div>
    </div>
    <div class="side-menu-container">
        <ul class="metismenu" id="side-menu">
            <li class="open  conditional-bg">
                <a href="@url/dashboard" class="">
                    <i class="icon-home"></i>
                    <span>{{__("base.dashboard","Dashboard")}}</span>
                </a>
            </li>
            {!!\Core\Menu::renderHtml()!!}
        </ul><!-- /#side-menu -->
    </div><!-- /.side-menu-container -->
</div><!-- /#sidebar -->
<!-- END SIDEBAR -->
{{--<div id="new_ticket" class="modal fade " role="dialog">--}}
{{--    <div class="modal-dialog  modal-lg">--}}
{{--        <div class="modal-content ">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <h4 class="modal-title">ایجاد درخواست پشتیبانی</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <input class="form-control title" type="text" placeholder="عنوان درخواست">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12 mt-4">--}}
{{--                        <textarea class="form-control p-3 text" rows="10" placeholder="متن درخواست"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 mt-4">--}}
{{--                        <input class="form-control order_id" type="number" placeholder="شماره سفارش مربوطه">--}}
{{--                    </div>--}}
{{--                    @if(\Model\User::isAdmin())--}}
{{--                        <div class="col-md-9 w-100 mt-4">--}}
{{--                            <select class="form-control select2" style="width: 100% !important;" id="receiver">--}}
{{--                                <option value="">انتخاب کاربر</option>--}}
{{--                                @foreach(\Model\User::all() as $user)--}}
{{--                                    <option value="{{$user->id}}">{{$user->name}} {{$user->family}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="col-md-6 mt-4">--}}
{{--                        <select class="form-control department">--}}
{{--                            <option value="Sell">پشتیبانی سرویس ها</option>--}}
{{--                            <option value="Technical">دپارتمان فنی</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">انصراف</button>--}}
{{--                <button type="button" class="btn btn-success btn-round store_ticket">ثبت درخواست</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div id="new_package" class="modal fade " role="dialog">--}}
{{--    <div class="modal-dialog  modal-lg">--}}
{{--        <div class="modal-content ">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <h4 class="modal-title">ایجاد پکیج</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-9">--}}
{{--                        <input class="form-control name" type="text" placeholder="نام پکیج">--}}
{{--                    </div>--}}
{{--                    <div class="input-group col-md-3 w-100">--}}
{{--                        <select class="select2 w-100 social">--}}
{{--                            <option value="">نوع سرویس</option>--}}
{{--                            @foreach(\Model\Service::getSocialDistinct() as $social)--}}
{{--                                <option value="{{$social->social}}">{{$social->social}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12 mt-4">--}}
{{--                        <textarea class="form-control p-3 description " rows="10" placeholder="توضیحات"></textarea>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">انصراف</button>--}}
{{--                <button type="button" class="btn btn-success btn-round store_package">مرحله بعد</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
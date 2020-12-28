<?php
/**
 * @var Branch[] $branches
 * @var Meal[] $meals
 */

use Module\Restaurant\Model\Branch;
use Module\Restaurant\Model\Meal;

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e54c2a">
    <!-- Favicon -->
    <link type="image/x-icon" rel="shortcut icon" href="favicon.png"/>
    <title>{{env("TITLE")}}</title>
    <meta name="description"
          content="STEAM - Restaurant, food and Drinks HTML5 website template is Modern, Clean and Professional site template. Prefect for RESTAURANT, Bakery, Cafe, Bar, Catering, food business and for personal chef portfolio website.">

    <!-- Bootstrap stylesheet -->
    <link href="@shopAssets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="@shopAssets/css/bootstrap.rtl.min.css" rel="stylesheet"/>

    <!-- icofont -->
    <link href="@shopAssets/libs/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
    <!-- crousel css -->
    <link href="@shopAssets/libs/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    <!-- mb.YTPlayer css -->
    <link href="@shopAssets/libs/mb.YTPlayer/css/jquery.mb.YTPlayer.min.css" rel="stylesheet" type="text/css"/>
    <!-- Switch Style css -->
    <link href="@shopAssets/switch-style/switch-style.css" rel="stylesheet" type="text/css"/>
    <!-- Theme Stylesheet -->
    <link href="@shopAssets/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Switch Color Style css -->
    <link href="#" data-style="styles" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
            href="../../browsehappy.com/default.htm">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Loader Start -->
    <div class="loader">
        <div class="loader-inner">
            <h4>سایت در حال بارگذاری...</h4>
            <div id="cooking">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div id="area">
                    <div id="sides">
                        <div id="pan"></div>
                        <div id="handle"></div>
                    </div>
                    <div id="pancake">
                        <div id="pastry"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Loader End -->

    <!--  Header Start  -->
    <header>
        <!--Top Header Start -->
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <ul class="list-inline pull-left icon">
                            <li><a href="#"><i class="icofont icofont-phone"></i> شماره تماس : 123 456 7890</a></li>
                        </ul>
                        <!-- Header Social Start -->
                        <ul class="list-inline pull-right icon">
                            <li>
                                <ul class="list-inline social">
                                    <li><a href="" target="_blank"><i class="icofont icofont-social-facebook"></i></a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="icofont icofont-social-twitter"></i></a>
                                    </li>
                                    <li><a href="" target="_blank"><i
                                                    class="icofont icofont-social-google-plus"></i></a></li>
                                    <li><a href="" target="_blank"><i class="icofont icofont-social-instagram"></i></a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="icofont icofont-social-pinterest"></i></a>
                                    </li>
                                    <li><a href="" target="_blank"><i
                                                    class="icofont icofont-social-youtube-play"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Header Social End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Top Header End -->

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <!-- Logo Start  -->
                    <div id="logo">
                        <a href="@url"><img id="logo_img" class="img-responsive" src="@shopAssets/images/logo/logo.png"
                                            alt="logo" title="logo"/></a>
                    </div>
                    <!-- Logo End  -->
                </div>

                <div class="col-md-7 col-sm-7 col-xs-12 paddleft">
                    <!-- Main Menu Start  -->
                    <div id="menu">
                        <nav class="navbar">
                            <div class="navbar-header">
                                <span class="menutext visible-xs"> منو</span>
                                <button data-target=".navbar-ex1-collapse" data-toggle="collapse"
                                        class="btn btn-navbar navbar-toggle" type="button"><i
                                            class="icofont icofont-navigation-menu"></i></button>
                            </div>
                            <div class="collapse navbar-collapse navbar-ex1-collapse padd0">
                                <ul class="nav navbar-nav text-right">
                                    <li class="dropdown"><a href="@url" class="dropdown-toggle"
                                                            data-toggle="dropdown">خانه</a>
                                    </li>
                                    <li><a href="@url/contact-us">درباره ما</a></li>
                                    <li><a href="@url/download">اپلیکیشن</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Main Menu End -->
                </div>

            </div>
        </div>
    </header>
    <!-- Header End   -->

    <!-- Slider Start -->
    <div class="slide">
        <div class="slideshow owl-carousel">
            <!-- Slider Backround Image Start -->
            <div class="item">
                <img src="@shopAssets/images/background/banner-1.jpg" alt="banner" title="banner"
                     class="img-responsive"/>
            </div>
            <div class="item">
                <img src="@shopAssets/images/background/banner-2.jpg" alt="banner" title="banner"
                     class="img-responsive"/>
            </div>
            <div class="item">
                <img src="@shopAssets/images/background/banner-3.jpg" alt="banner" title="banner"
                     class="img-responsive"/>
            </div>
            <div class="item">
                <img src="@shopAssets/images/background/banner-4.jpg" alt="banner" title="banner"
                     class="img-responsive"/>
            </div>
            <!-- Slider Backround Image End -->
        </div>

        <!-- Slide Detail Start  -->
        <div class="slide-detail">
            <div class="container">
                <img src="@shopAssets/images/logo/logo-icon.png" alt="logo1" title="logo1" class="img-responsive"/>
                <h4>دوستدار غذای سالم</h4>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>
                <a class="btn-primary btn btn-wide" href="#">دانلود اپلیکیشن</a>
            </div>
        </div>
        <!-- Slide Detail End  -->
    </div>
    <!-- Slider End  -->

{{--    <!-- Order Start  -->--}}
{{--    <div class="order">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <!-- Title Content Start -->--}}
{{--                <div class="col-sm-12 commontop text-center">--}}
{{--                    <h4>سفارش و تحویل غذا</h4>--}}
{{--                    <div class="divider style-1 center">--}}
{{--                        <span class="hr-simple left"></span>--}}
{{--                        <i class="icofont icofont-ui-press hr-icon"></i>--}}
{{--                        <span class="hr-simple right"></span>--}}
{{--                    </div>--}}
{{--                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی--}}
{{--                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>--}}
{{--                </div>--}}
{{--                <!-- Title Content End -->--}}
{{--                <div class="col-md-6 col-md-offset-3 col-sm-12">--}}
{{--                    <!-- Search Form Start -->--}}
{{--                    <form class="form-horizontal search-icon" method="get">--}}
{{--                        <fieldset>--}}
{{--                            <div class="form-group">--}}
{{--                                <input name="s" value="" placeholder="عبارت جستجو" class="form-control" type="text">--}}
{{--                            </div>--}}
{{--                            <button type="submit" value="submit" class="btn btn-theme"><i--}}
{{--                                        class="icofont icofont-search"></i>جستجو--}}
{{--                            </button>--}}
{{--                        </fieldset>--}}
{{--                    </form>--}}
{{--                    <!-- Search Form End -->--}}
{{--                    <ul class="list-inline text-center">--}}
{{--                        <li>--}}
{{--                            <i class="icofont icofont-fast-food"></i>--}}
{{--                            <p>انتخاب غذا</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="icofont icofont-food-basket"></i>--}}
{{--                            <p>سفارش غذا</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="icofont icofont-fast-delivery"></i>--}}
{{--                            <p>تحویل غذا</p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <img src="@shopAssets/images/lines.png" alt="line" title="line" class="img-responsive"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Order End  -->--}}

<!-- Popular Dishes Start -->
    <div class="dishes">
        <div class="container">
            <div class="row">
                <!-- Title Content Start -->
                <div class="col-sm-12 commontop text-center">
                    <h4>شعب ما</h4>
                    <div class="divider style-1 center">
                        <span class="hr-simple left"></span>
                        <i class="icofont icofont-ui-press hr-icon"></i>
                        <span class="hr-simple right"></span>
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>
                </div>
                <!-- Title Content End -->
                <div class="col-sm-12">
                    <div class="dish owl-carousel">

                        @foreach($branches as $branch)
                            <div class="item">
                                <!-- Box Start -->
                                <div class="box" style="">
                                    @if($branch->image)
                                        <a href="#">
                                            <img src="@assets/images/{{$branch->image}}" alt="image" title="image"
                                                 class="img-responsive" style="height: 200px;"/>
                                        </a>
                                    @endif
                                    <div class="caption">
                                        <h4>{{$branch->name}}</h4>
                                        <span style="height: 50px">
                                            {{$branch->address}}
                                        </span>
                                        {{--                                        <button class="btn btn-danger btn-outline">خرید از این شعبه</button>--}}
                                    </div>
                                </div>
                                <!-- Box End -->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Dishes End -->

    <!-- Food Menu Start -->
    <div class="menu">
        <div class="menu-inner">
            <div class="container">
                <div class="row ">
                    <!-- Title Content Start -->
                    <div class="col-sm-12 col-xs-12 commontop text-center">
                        <h4>منو غذا</h4>
                        <div class="divider style-1 center">
                            <span class="hr-simple left"></span>
                            <i class="icofont icofont-ui-press hr-icon"></i>
                            <span class="hr-simple right"></span>
                        </div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>
                    </div>
                    <!-- Title Content End -->
                    <div class="col-sm-12 col-xs-12">
                        <!--  Menu Tabs Start  -->
                        <ul class="nav nav-tabs list-inline">
                            @foreach($meals as $meal)
                                <li class="{{$loop->first ? "active" : ""}}">
                                    <a href="#meal_{{$meal->id}}" data-toggle="tab"
                                       aria-expanded="true">{{$meal->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <!--  Menu Tabs Start  -->

                        <!--  Menu Tabs Content Start  -->
                        <div class="tab-content">
                            @foreach($meals as $meal)
                                <div class="tab-pane {{$loop->first ? "active" : ""}}" id="meal_{{$meal->id}}">
                                    <div class="row">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--  Menu Tabs Content End  -->
                        <div class="text-center padbot30">
                            <a class="btn btn-theme-alt btn-wide" href='menu.html'>مشاهده بیشتر <i
                                        class="icofont icofont-curved-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Food Menu End -->


    <!-- Footer Start -->
    <footer>
        <div class="container">
            <div class="row inner">
                <div class="col-sm-6 col-md-3">
                    <!-- Footer Widget Start -->
                    <h5>ارتباط با ما</h5>
                    <ul class="list-unstyled contact">
                        <li><i class="icofont icofont-social-google-map"></i> تهران میدان ونک خیابان دوم پلاک 20</li>
                        <li><i class="icofont icofont-phone"></i> 1800 000 0000,<br>+88 123 1234 1234</li>
                        <li><a href="#"><i class="icofont icofont-ui-message"></i>info@yourdomainname.com</a></li>
                    </ul>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-sm-6 col-md-3">
                    <!-- Footer Widget Start -->
                    <h5> اطلاعات</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">اطلاعات تحویل غذا</a></li>
                        <li><a href="#">ارتباط با ما</a></li>
                        <li><a href="#">قوانین و مقررات</a></li>
                        <li><a href="#">سایت مپ</a></li>
                    </ul>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-sm-12 hidden-lg hidden-md"></div>
                <div class="col-sm-6 col-md-3">
                    <!-- Footer Widget Start -->
                    <h5>ساعات کاری</h5>
                    <ul class="list-unstyled">
                        <li>شنبه تا جمعه : 9 صبح تا 12 شب</li>
                        <li>جمعه - شنبه : 24 شبانه روز</li>
                        <li>صبحانه : 7 صبح تا 12 شب</li>
                        <li>نهار : 12 بعد از ظهر تا 7 شب</li>
                        <li>شام : 7 صبح تا 12 شب</li>
                    </ul>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-sm-6 col-md-3">
                    <!-- Footer Widget Start -->
                    <h5> اینستاگرام</h5>
                    <ul class="list-unstyled insta">
                        <li><a href="#"><img src="@shopAssets/images/instagram/1.jpg" alt="image"/></a></li>
                        <li><a href="#"><img src="@shopAssets/images/instagram/2.jpg" alt="image"/></a></li>
                        <li><a href="#"><img src="@shopAssets/images/instagram/3.jpg" alt="image"/></a></li>
                        <li><a href="#"><img src="@shopAssets/images/instagram/4.jpg" alt="image"/></a></li>
                        <li><a href="#"><img src="@shopAssets/images/instagram/5.jpg" alt="image"/></a></li>
                        <li><a href="#"><img src="@shopAssets/images/instagram/6.jpg" alt="image"/></a></li>
                    </ul>
                    <!-- Footer Widget End -->
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row powered">
                    <!--  Copyright Start -->
                    <div class="col-sm-3">
                        <img src="@shopAssets/images/logo/logo-white.png" class="img-responsive" title="logo"
                             alt="logo">
                    </div>
                    <div class="col-sm-3 text-right col-sm-push-6">
                        <!--  Footer Social Start -->
                        <ul class="list-inline social">
                            <li><a href="" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="" target="_blank"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="" target="_blank"><i class="icofont icofont-social-google-plus"></i></a></li>
                            <li><a href="" target="_blank"><i class="icofont icofont-social-pinterest"></i></a></li>
                            <li><a href="" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
                            <li><a href="" target="_blank"><i class="icofont icofont-social-youtube-play"></i></a></li>
                        </ul>
                        <!--  Footer Social End -->
                    </div>
                    <div class="col-sm-6 col-sm-pull-3 text-center">
                        <p>Copyright © <span>رستوران...</span> 2018. تمام حقوق محفوظ است</p>
                    </div>

                    <!--  Copyright End -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End  -->


</div>

<!-- jquery -->
<script src="@shopAssets/libs/jquery/jquery.min.js"></script>
<!-- jquery Validate -->
<script src="@shopAssets/libs/jquery-validation/jquery.validate.min.js"></script>
<!-- bootstrap js -->
<script src="@shopAssets/libs/bootstrap/js/bootstrap.min.js"></script>
<!-- owlcarousel js -->
<script src="@shopAssets/libs/owlcarousel2/owl.carousel.min.js"></script>
<!--inview js code-->
<script src="@shopAssets/libs/jquery.inview/jquery.inview.min.js"></script>
<!--CountTo js code-->
<script src="@shopAssets/libs/jquery.countTo/jquery.countTo.js"></script>
<!-- mb.YTPlayer js code-->
<script src="@shopAssets/libs/mb.YTPlayer/jquery.mb.YTPlayer.min.js"></script>
<!--internal js-->
<script src="@shopAssets/js/internal.js"></script>
<script>
    const foods = JSON.parse(`{{$foods}}`.replace(/&quot;/g, '"'));
    foods.forEach(function (food) {
        food.meals.forEach(function (meal) {
            var foodBox = `<div class="col-md-6 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="image">
                        <img src="@assets/images/${food.images}"  style="object-fit: cover;width: 130px;height:135px" alt="image" title="image" class="img-responsive">
                    </div>
                    <div class="caption">
                        <h4>${food.name}</h4>
                        <p class="des">`;
            food.categories.forEach(function (category) {
                foodBox += category.title + " / ";
            })
            foodBox += `</p>
                        <span>
                            ${food.description}
                        </span>
                        <div class="price">${food.price} تومان</div>
                    </div>
                  </div>
            </div>`
            $("#meal_" + meal.id).children(".row").append(foodBox)
        });
    });
</script>
</body>

</html>

<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">



<!-- CSRF Token -->

<meta name="csrf-token" content="{{ csrf_token() }}">


<title>{{ config('app.name', 'Healthcare Portal') }}</title>



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/myJs.js') }}" defer></script>


<!-- <script src="{{ asset('js/vue.js') }}"></script> -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 



<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script> -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyC-2U_IRuSrajQavHadFp8FlXNi61MA3nw&callback=initMap" async defer></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
<script src="{{ asset('js/vue-scrollto.js') }}"></script>

<!-- Include after Vue (before closing body) -->
<script src="https://unpkg.com/vue-fullpage.js/dist/vue-fullpage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<!-- Fonts -->
<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
<!--mailbox-->
<!-- Styles -->
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCNpeRgwCQoHIlLn-X8TIB9SnO8iLPt808&callback=initMap" async defer></script> -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.scrolling-tabs.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/fullpage.js/dist/fullpage.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #ff6117;
            color: transparent;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            background: url(../images/top-arrow.png) no-repeat left center;          
        }

        #myBtn:hover {
            background: url(../images/top-arrow.png) no-repeat left center;
        }
    </style>
<!-- link for editor -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<!-- end link for editor -->
</head>

<body>
    <button onclick="topFunction()" id="myBtn">Top</button>
<div id="app">

    <div class="main-content pad-free">

        <flash message=""></flash>

        <!--navigation bar-->
        @if(!Auth::check())
        <ul class="navbar-nav pad-free" id="headerbar">                  
            <li class="fav-item fav-color btn all-btn m-r-10" style="color: #000 !important;">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="original-icon" fill="#c40000" opacity="0" visibility="hidden"><path d="M50.16667,78.83333h107.5v14.33333h-107.5zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h107.5v14.33333h-107.5zM21.5,75.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,118.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,32.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g><g id="subtracted-icon" fill="#c40000"><path d="M50.16667,78.83333h107.5l0,10.81336c-1.5126,0.69131 -2.92913,1.65951 -4.17264,2.90462l-0.6155,0.61535h-102.71186zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h24.29256c-1.88479,4.7147 -1.16582,10.22759 2.1569,14.33333h-26.44946zM32.25,86c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,129c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,43c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM123.60062,122.43755l-0.6045,-0.60422l1.20887,0z"></path></g><g><g id="Filled_3_" fill="#c40000"><path d="M123.60062,162.99169l-35.82908,-35.82908l10.13652,-10.13652l25.69256,25.69256l40.02993,-40.02993l10.13652,10.13652z"></path></g><g id="Filled_3_" fill="#000000" opacity="0"><path d="M183.90358,122.96087l-50.16644,50.16644c-2.79579,2.80295 -6.46615,4.20085 -10.13652,4.20085c-3.67037,0 -7.34073,-1.39789 -10.13652,-4.20085l-35.82908,-35.82908c-5.59874,-5.59874 -5.59874,-14.67429 0,-20.27304l10.13652,-10.13652c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l15.55604,15.54887l29.89341,-29.88624c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l10.13652,10.13652c5.59874,5.59874 5.59874,14.67429 0,20.27304z"></path></g></g></g></svg>
                    
                &nbsp; <span class="font-weight-bold">お気に入り</span>                        
                <div class="div1">
                <i class="fa fa-chevron-circle-right is-hos"></i>
                    <router-link to="/favouriteHospital">
                    <span style="color:#2981cc;">
                    病院&nbsp;<span id="hos-fav-local"></span>&nbsp;<span style="color:#000;">件</span>
                    </span>
                    </router-link>
                </div>
                <div class="div2">
                <i class="fa fa-chevron-circle-right is-nur"></i>
                    <router-link to="/favouriteNursing">
                    <span style="color:#d2571c;">
                    介護&nbsp;<span id="nus-fav-local"></span>&nbsp;<span style="color:#000;">件</span> 
                    </span>                               
                    </router-link>
                </div>                        
            </li>
            <li class="fav-item history-color btn all-btn m-r-10 m-b-10" style="color: #000 !important;">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#c40000"><path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path></g></g></svg>
                &nbsp;<span class="font-weight-bold"> 最近見た施設</span>
                <div class="div1">
                <i class="fa fa-chevron-circle-right is-hos"></i>
                    <router-link to="/hospital_history">
                        <span style="color:#2981cc;">
                        病院&nbsp;<span id="hos-his-local"></span>&nbsp;<span style="color:#000;">件</span>
                        </span>
                    </router-link>
                </div>
                <div class="div2">
                <i class="fa fa-chevron-circle-right is-nur"></i>
                    <router-link to="/nursing_history">
                        <span  style="color:#d2571c;">
                        介護&nbsp;<span id="nus-his-local"></span>&nbsp;<span style="color:#000;">件</span>
                        </span>
                    </router-link>
                </div>  
            </li>
        </ul>
        @endif

        <nav class="navbar navbar-expand-lg navbar-dark main-header">
        <div class="container nav-warp">
            <a class="navbar-brand col-2 pl-0 logo-text" href="/">

                <!-- <img src="/images/sample_2.png" alt="Logo"> -->
                LOGO <span>HERE</span>

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>



            <div class="collapse navbar-collapse col-6 offset-4" id="navbarSupportedContent">

                <!-- <form class="form-inline my-2 my-lg-0 col-lg-8 container-fluid form-inline">

                <input class="form-control col-lg mr-sm-3 d-flex p-2 form-control pc" type="search" placeholder="検索" aria-label="検索">

                <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary pc" type="submit"><i class="fas fa-search"></i> 検索</button>

                </form> -->
            <ul class="navbar-nav ml-auto pad-free pc">

                    @guest

                    <li class="nav-item btn login-register-btn p-lr-0">

                        <a class="nav-link pad-free" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>&nbsp;&nbsp;{{ __('事業者 ログイン') }}</a>

                    </li>

                    <li class="nav-item btn login-register-btn p-lr-0">

                        <!-- <a class="nav-link pad-free" href="{{ route('register') }}">{{ __('事業者 登録') }}</a> -->

                        <a class="nav-link pad-free" href="{{ url('registerForm') }}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;{{ __('事業者 登録') }}</a>

                        <!-- <router-link to="/createcustomer" class="nav-link pad-free">事業者 登録</router-link> -->

                    </li>

                    @else

                    <li class="nav-item btn login-register-btn col-12 userprofile-name pc">

                        <img src="/images/user.png" alt="" class="userprofile-img">

                        <a class="nav-link" href="#!">{{ Auth::user()->name }}</a>

                    </li>

                    @endguest

                </ul>       


                <ul class="sp-nav sp">

                    <li><router-link to="/" class="nav-link"><i class="fa fa-home"></i>&nbsp;&nbsp;ホーム</router-link></li>



                @can('role-list')

                <li><router-link to="/news_list" class="nav-link"><i class="fa fa-newspaper"></i>&nbsp;&nbsp;ニュース一覧</router-link></li>

                <li><router-link to="/customerlist" class="nav-link"><i class="fa fa-user"></i>&nbsp;&nbsp;事業者</router-link></li>

                <li><router-link to="/categorylist" class="nav-link"><i class="fa fa-file"></i>&nbsp;&nbsp;カテゴ一覧</router-link></li>

                <li><router-link to="/stationlist" class="nav-link"><i class="fa fa-file"></i>&nbsp;&nbsp;駅一覧</router-link></li>

                <li><router-link to="/facilitieslist" class="nav-link"><i class="fa fa-sun"></i>&nbsp;&nbsp;施設一覧</router-link></li>
                <li><router-link to="/typelist" class="nav-link"><i class="fa fa-sun"></i>&nbsp;&nbsp;事業者 タイプ</router-link></li>
                <li><router-link to="/featurelist" class="nav-link"><i class="fa fa-list"></i>&nbsp;&nbsp;特殊機能</router-link></li>
                <li>

                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed nav-link"><i class="fa fa-user-lock"></i>&nbsp;Pages</a>

                    <ul class="list-unstyled collapse" id="pageSubmenu" style="">

                        <li>

                            <router-link to="/userPasswordResetList" class="nav-link"><i class="fa fa-undo"></i>&nbsp;事業者パスワードリセット</router-link>

                        </li>

                        <li>

                            <router-link to="#" class="nav-link"><i class="fa fa-random"></i>&nbsp;Dropdown 2</router-link>

                        </li>



                    </ul>

                    </li>



                @endcan



                @can('customer')
                <li><router-link to="/profile" class="nav-link"><i class="fa fa-map"></i>&nbsp;&nbsp;  マイページ</router-link></li>
                <li><router-link to="/jobofferlist" class="nav-link"><i class="fa fa-edit"></i>&nbsp;&nbsp;  仕事一覧</router-link></li>
                @endcan



                @can('role-list')

                <li><router-link to="/ads" class="nav-link"><i class="fa fa-globe"></i>&nbsp;&nbsp;広告</router-link></li>

                @endcan

                @guest

                    <li>

                        <a class="nav-link pad-free" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>&nbsp;&nbsp;{{ __('事業者 ログイン') }}</a>

                    </li>

                    <li>

                        <!-- <a class="nav-link pad-free" href="{{ route('register') }}">{{ __('事業者 登録') }}</a> -->

                        <a class="nav-link pad-free" href="{{ url('registerForm') }}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;{{ __('事業者 登録') }}</a>

                        <!-- <router-link to="/createcustomer" class="nav-link pad-free">事業者 登録</router-link> -->

                    </li>

                    @else

                    <li>

                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('logout') }}"

                    onclick="event.preventDefault();

                    document.getElementById('logout-form').submit();"

                    role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('ログアウト') }}



                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>

                    </a>

                </li>

                @endguest

                </ul>

            </div>
        </div>
        </nav>

        <!--end navigation bar-->



        <!--sidebar-->



        <!--end sidebar -->



        <div class="sidebar-scroll container-fluid">

            <div class="row" style="background:#fff;">

                @if(Auth::check())

                <div class="col-lg-2 col-md-12 col-sm-12 pad-free custom-sidebar" id="admin-side-menu">

                    <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <!-- @guest -->

                    <!-- public menu -->

                    <!-- <div class="userview-sidebar col-auto">

                        <div class="card m-b-10 ads-card">

                        <div class="">

                                <img src="/images/ad_1.jpg" alt="" class="img-responsivie" style="width:100%">

                        </div>



                        </div>

                        <div class="card m-b-10 ads-card2">

                            <div class="card-body">

                            <ul class="list-group list-group-flush">

                            <li class="list-group-item">

                                <a href="#">

                                    <img src="/images/h11.jpg" alt="" class="img-responsivie ads-img" style="height: 80px;">

                                    <div class="sub-title">

                                    <h3 class="ads-title"> 変わらぬ美しさ、20年ぶりグラビア</h3>

                                    <span class="source-wrapper text-turncate">

                                    <img src="/images/company-profile1.png" alt="" class="img-responsivie source-img">

                                        <span class="smallads-title text-turncate">クランクイン</span>

                                    </span>

                                    </div>



                                </a>

                            </li>



                            </ul>

                            </div>

                        </div>

                        <div class="card m-b-10 ads-card2">

                            <div class="card-body">

                            <ul class="list-group list-group-flush">

                            <li class="list-group-item">

                                <a href="#">

                                    <img src="/images/h11.jpg" alt="" class="img-responsivie ads-img" style="height: 80px;">

                                    <div class="sub-title">

                                    <h3 class="ads-title"> 変わらぬ美しさ、20年ぶりグラビア</h3>

                                    <span class="source-wrapper text-turncate">

                                    <img src="/images/company-profile1.png" alt="" class="img-responsivie source-img">

                                        <span class="smallads-title text-turncate">クランクイン</span>

                                    </span>

                                    </div>



                                </a>

                            </li>



                            </ul>

                            </div>

                        </div>

                        <div class="card m-b-10 ads-card2">

                            <div class="card-body">

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">

                                        <a href="#">

                                            <img src="/images/h11.jpg" alt="" class="img-responsivie ads-img" style="height: 80px;">

                                            <div class="sub-title">

                                            <h3 class="ads-title"> 変わらぬ美しさ、20年ぶりグラビア</h3>

                                            <span class="source-wrapper text-turncate">

                                            <img src="/images/company-profile1.png" alt="" class="img-responsivie source-img">

                                                <span class="smallads-title text-turncate">クランクイン</span>

                                            </span>

                                            </div>

                                        </a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div> -->

                    <!-- @else -->

                    <!-- login menu  -->

                    <div class="adminview-sidebar pc">

                    <li><router-link to="/" class="nav-link"><i class="fa fa-home"></i>&nbsp;ホーム</router-link></li>

                    <!-- @can('isAdmin')

                    <li><router-link to="/passport" class="nav-link"><i class="fa fa-list"></i>&nbsp; Passport </router-link></li>

                    @endcan -->

                    @can('role-list')

                    <li><router-link to="/news_list" class="nav-link"><i class="fa fa-newspaper"></i>&nbsp;ニュース一覧</router-link></li>

                    <li><router-link to="/categorylist" class="nav-link"><i class="fa fa-file"></i>&nbsp;カテゴ一覧</router-link></li>

                    <li><router-link to="/stationlist" class="nav-link"><i class="fa fa-file"></i>&nbsp;&nbsp;駅一覧</router-link></li>

                    <li><router-link to="/facilitieslist" class="nav-link"><i class="fa fa-sun"></i>&nbsp;施設一覧</router-link></li>
                    <li><router-link to="/typelist" class="nav-link"><i class="fa fa-sun"></i>&nbsp;事業者 タイプ</router-link></li>
                    <li><router-link to="/featurelist" class="nav-link"><i class="fa fa-list"></i>&nbsp;&nbsp;特殊機能</router-link></li>
                    <li><router-link to="/occupationlist" class="nav-link"><i class="fa fa-list"></i>&nbsp;&nbsp;Occupations</router-link></li>
                    <li><router-link to="/subjectlist" class="nav-link"><i class="fa fa-list"></i>&nbsp;&nbsp;Medical Subjects</router-link></li>
                    
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed nav-link text-pre"><i class="fa fa-user-lock"></i>&nbsp;管理者確認管理者確認</a>
                        <ul class="list-unstyled collapse" id="pageSubmenu" style="">
                            <li><router-link to="/userPasswordResetList" class="nav-link"><i class="fa fa-undo"></i>&nbsp;事業者パスワードリセット</router-link></li>
                            <li><router-link to="/customerlist" class="nav-link"><i class="fa fa-user"></i>&nbsp;事業者</router-link></li>
                        </ul>
                    </li>
                    @endcan

                    @can('customer')
                    <li><router-link to="/profile" class="nav-link"><i class="fa fa-map"></i>&nbsp;&nbsp;  マイページ</router-link></li>
                    <li><router-link to="/jobofferlist" class="nav-link"><i class="fa fa-edit"></i>&nbsp;&nbsp;  仕事一覧</router-link></li>
                    @endcan



                    @can('role-list')

                    <li><router-link to="/ads" class="nav-link"><i class="fa fa-globe"></i>&nbsp;広告</router-link></li>

                    @endcan



                    <li>

                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('logout') }}"

                        onclick="event.preventDefault();

                        document.getElementById('logout-form').submit();"

                        role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-sign-out-alt"></i>&nbsp;{{ __('ログアウト') }}



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                            @csrf

                        </form>

                        </a>

                    </li>

                    </div>

                    @endguest



                    </ul>

                </div>

                @endif



                @if(Auth::check())

                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 pad-free" id="content-all">

                @else

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad-free" id="content-all">

                @endif

                    <div class="maintab-content" id="v-pills-tabContent">

                        <!--section one-->

                        <section>

                            <div class="container-fluid main-wrapper">

                                <!--slider for ads-->
                                @if(Auth::check())
                                    <div class="col-md-10 pad-free fixed-ads" style="display:none;">
                                @else
                                    <div class="row col-md-12 pad-free fixed-ads-fluid">
                                @endif
                                    <!--jssor carousel-->

                                    <div id="jssor_1" class="jssor-slider">

                                        <!-- Loading Screen -->

                                        <div data-u="loading" class="jssorl-009-spin">

                                            <img  src="images/spin.svg" />

                                        </div>
                                        <div data-u="slides"  class="top-ad-slider"> </div>
                                        <!-- Bullet Navigator -->

                                        <!-- <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">

                                            <div data-u="prototype" class="i" style="width:16px;height:16px;">

                                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">

                                                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>

                                                </svg>

                                            </div>

                                        </div> -->

                                        <!-- Arrow Navigator -->

                                        <!-- <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">

                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">

                                                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>

                                            </svg>

                                        </div>

                                        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">

                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">

                                                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>

                                            </svg>

                                        </div> -->

                                    </div>

                                        <!--end jssor slider-->

                                </div>

                                    <!--end slider for ads-->


                                @if(Auth::check())
                                <div class="row justify-content-md-center p-t-15">
                                @else
                                <div class="row justify-content-md-center p-t-130">
                                @endif

                                    <div class="col-12 col-lg-12 col-md-10 tab">

                                    <!-- vue component -->

                                        <router-view  :key="$route.fullPath"></router-view>



                                    <!-- vue component -->



                                    <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">three</div>

                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">four</div> -->

                                    </div>

                                    <div class="col-12 col-lg-2 col-md-4" style="display:none">

                                        <!--related news-->

                                        <div class="m-b-10 ads-card">

                                            <!--ads slider-->

                                            <div style="display: block; overflow: hidden;border-radius:0.25rem;">

                                                <div id="slider2_container" style="position: relative; float: left; top: 0px; left: 0px; width:167px; height:100%; overflow: hidden;">

                                                <!-- Slides Container -->
                                                    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 167px; height: 100%; overflow: hidden;" class="side-ad-slider"> </div>
                                                <!-- Trigger -->

                                                </div>

                                            </div>

                                            <!--end ads slider-->

                                        </div>

                                        <div class="card m-b-10 ads-card">

                                            <div class="card-body">

                                                <h5 class="card-title text-center">二つ目の広告</h5>

                                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->

                                                <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width:100%">

                                            </div>

                                        </div>

                                        <div class="card m-b-10 ads-card2">

                                            <div class="card-body today">

                                                <ul id="menu" class="list-group list-group-flush"> </ul>

                                            </div>

                                        </div>

                                        <!-- end related news-->

                                    </div>

                                </div>

                            </div>

                            <div class="container-fluid footer footer-div">

                                    <span>Copyright©Management Partners Corp.All Rights Reserved. </span>

                            </div>

                            </div>

                        </section>

                        <!--end section one-->

                    </div>

                </div>

            </div>

            <!-- END LEFT SIDEBAR -->

        </div>

</div>

<script src="/js/app.js" type="text/javascript"></script>

  <!-- script for editor -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

  <!-- end script for editor -->



<script src="{{ asset('js/jssor.slider-27.5.0.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.scrolling-tabs.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/adsslider.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>







<script type="text/javascript">

 $(document).ready(function() {
     /*added for back to top*/
     var mybutton = document.getElementById("myBtn");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        topFunction = function () {           
            // document.body.scrollTop = 0;
            // document.documentElement.scrollTop = 0;
            $("html, body").animate({ scrollTop: 0 }, "slow");
	            return false;          
        }        

    $("#hos-his-local").html(localStorage.getItem("hospital_history").split(",").length);
    $("#nus-his-local").html(localStorage.getItem("nursing_history").split(",").length);
    $("#hos-fav-local").html(localStorage.getItem("hospital_fav").split(",").length);
    $("#nus-fav-local").html(localStorage.getItem("nursing_fav").split(",").length);

    $('.DataTable').DataTable();
    var csrf = "{{ csrf_token() }}";

    $.ajax({
        url: '/api/advertisement/ads',
        type: 'GET',
        data: {'_token': csrf},
        success: function( data ) {
            // console.log(data);
            var top_ad = "";
            var side_ad = "";
            for (var i = 0; i < data.length; i++) {
                if(data[i].location.includes("topbar") ) {
                    top_ad += '<div class="list-group-item adslist-card"><a href="' + data[i].link + '"><div class="slide-img"><img class="img-fluid ads-img" src="/upload/advertisement/' + data[i].photo + '" /></div><h3 class="smallads-title">' + data[i].title + '</h3></a></div>';
                    if(data[i].location.includes("sidebar")) {
                        side_ad += '<div><a href="' + data[i].link + '"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>' + data[i].title + '</p></div></a></div>';
                    }
                }
                else if(data[i].location.includes("sidebar"))  {
                    side_ad += '<div><a href="' + data[i].link + '"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>'+ data[i].title +'</p></div></a></div>';
                }

            }
            $(".top-ad-slider").html(top_ad);
            jssor_1_slider_init();
            $(".side-ad-slider").html(side_ad);
            // jssor_slider2_init();
        }
    });    
});
</script>
</body>

</html>

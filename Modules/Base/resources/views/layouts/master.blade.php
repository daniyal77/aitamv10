<!DOCTYPE html>
<html lang="en" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <style>
        @font-face {
            font-family: yekan;
            src: url('{{asset('fonts/yekan-font/yekan-regular.eot')}}');
            src: url('{{asset('fonts/yekan-font/yekan-regular.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/yekan-font/yekan-regular.woff')}}') format('woff'),
            url('{{asset('fonts/yekan-font/yekan-regular.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: tanha;
            src: url('{{asset('fonts/tanha-font/Farsi-Digits/Tanha-FD.eot')}}');
            src: url('{{asset('fonts/tanha-font/Farsi-Digits/Tanha-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/tanha-font/Farsi-Digits/Tanha-FD.woff')}}') format('woff'),
            url('{{asset('fonts/tanha-font/Farsi-Digits/Tanha-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/tanha-font/Farsi-Digits/Tanha-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /*shabnam font*/
        @font-face {
            font-family: shabnam;
            src: url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-FD.eot')}}');
            src: url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-FD.woff')}}') format('woff'),
            url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: shabnam-bold;
            src: url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-Bold-FD.eot')}}');
            src: url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-Bold-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-Bold-FD.woff')}}') format('woff'),
            url('{{asset('fonts/shabnam/Farsi-Digits/Shabnam-Bold-FD.ttf')}}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        /*end shabnam font*/
        /*vazir font*/
        @font-face {
            font-family: vazir;
            src: url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Medium-FD.eot')}}');
            src: url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Medium-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Medium-FD.woff')}}') format('woff'),
            url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Medium-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: vazir-bold;
            src: url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Bold-FD.eot')}}');
            src: url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Bold-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Bold-FD.woff')}}') format('woff'),
            url('{{asset('fonts/vazir-font/Farsi-Digits/Vazir-Bold-FD.ttf')}}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        /*end vazir font*/
        /*shael font*/
        @font-face {
            font-family: shael;
            src: url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-FD.eot')}}');
            src: url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-FD.woff')}}') format('woff'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: shael-bold;
            src: url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-Bold-FD.eot')}}');
            src: url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-Bold-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-Bold-FD.woff')}}') format('woff'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-Bold-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/sahel-font/Farsi-Digits/Sahel-Bold-FD.ttf')}}') format('truetype');
            font-weight: bold;
        }

        /*end shael font*/
        /*samim font*/
        @font-face {
            font-family: samim;
            src: url('{{asset('fonts/samim-font/Farsi-Digits/Samim-FD.eot')}}');
            src: url('{{asset('fonts/samim-font/Farsi-Digits/Samim-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-FD.woff')}}') format('woff'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: samim-bold;
            src: url('{{asset('fonts/samim-font/Farsi-Digits/Samim-Bold-FD.eot')}}');
            src: url('{{asset('fonts/samim-font/Farsi-Digits/Samim-Bold-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-Bold-FD.woff')}}') format('woff'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-Bold-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/samim-font/Farsi-Digits/Samim-Bold-FD.ttf')}}') format('truetype');
            font-weight: bold;
        }

        /*end samim font*/
        /*parasrto font*/
        @font-face {
            font-family: parsto;
            src: url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-FD.eot')}}');
            src: url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-FD.woff')}}') format('woff'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-FD.ttf')}}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: parsto-bold;
            src: url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-Bold-FD.eot')}}');
            src: url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-Bold-FD.eot?#iefix')}}') format('FontName-opentype'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-Bold-FD.woff')}}') format('woff'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-Bold-FD.woff2')}}') format('woff2'),
            url('{{asset('fonts/parastoo-font/web/Farsi-Digits/Parastoo-Bold-FD.ttf')}}') format('truetype');
            font-weight: bold;
        }

        /*end parasrto font*/

        <?php
               $roleId= 0;//Auth::user()->RoleId ;
                ?>
                :root {
            --primery_color: {{$setting[$roleId . "-color"] ?? '#fcc10a'}} ;
            --primery_text_color: {{$setting[$roleId . "-text-color"] ?? '#a8afc7'}};
            --primery_font: {{$setting[$roleId. "-font"] ?? 'yekan'}} ;
            --primery_bold_font: {{$setting[$roleId. "-font-bold"] ?? 'parsto-bold'}} ;
            --size_text: {{$setting[$roleId. "-sizepx"]  ?? '14px'}}  ;
        }


    </style>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('/admin/favicon.ico')}}" type="image/x-icon"/>
    <!-- Title -->
    <base href="{{ config('app.url') }}">

    {{--    <meta name="theme-color" content=" {{$setting['color_store']}}">--}}
    {{--    <meta name="msapplication-navbutton-color" content=" {{$setting['color_store']}}">--}}
    {{--    <meta name="apple-mobile-web-app-status-bar-style" content=" {{$setting['color_store']}}">--}}
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="apple-mobile-web-app-title" content="Expo"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="default"/>

    <title>@yield('title') | ایتام مهدی فاطمه</title>
    <!-- Bootstrap css-->
    <link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Icons css-->
    <link href="{{asset('assets/admin/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/web-fonts/icons.css')}}" rel="stylesheet">
    <!-- Style css-->
    <link href="{{asset('assets/admin/css-rtl/style/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css-rtl/skins.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css-rtl/colors/default.css')}}" rel="stylesheet">
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
          href="{{asset('assets/admin/css-rtl/colors/color.css')}}">
    <!-- Select2 css -->
    <link href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/multipleselect/multiple-select.css')}}">
    <!-- Sidemenu css-->
    <link href="{{asset('assets/admin/css-rtl/sidemenu/sidemenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/switcher/demo.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/admin.css')}}" rel="stylesheet">
    <script src="{{asset('assets/admin/js/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    @yield('css')
    @stack('style')
</head>

<body class="main-body leftmenu">
<!-- Page -->
<div class="page">
    @include('base::layouts.navbar')
    <div class="main-content side-content pt-0">
        @include('base::layouts.notification')
        <div class="container-fluid">
            <div class="inner-body">
                @include('base::layouts.breadcrumb')
                @yield('content')
            </div>
        </div>
    </div>
    @include('base::layouts.footer')
</div>
<!-- End Page -->
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
<!-- Jquery js-->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/admin/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Perfect-scrollbar js -->
<script src="{{asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
<!-- Sidemenu js -->
<script src="{{asset('assets/admin/plugins/sidemenu/sidemenu-rtl.js')}}"></script>
<!-- Sidebar js -->
<script src="{{asset('assets/admin/plugins/sidebar/sidebar-rtl.js')}}"></script>
<!-- Select2 js-->
<script src="{{asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!-- Peity js-->
<script src="{{asset('assets/admin/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- Internal Morris js -->
<script src="{{asset('assets/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/morris.js/morris.min.js')}}"></script>
<!-- Sticky js -->
<script src="{{asset('assets/admin/js/sticky.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>

@yield('js')
@stack('script')
</body>
</html>



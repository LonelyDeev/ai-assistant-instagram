<!DOCTYPE html>

<html lang="en" dir="{{helper::appdata('')->web_layout == 2 ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="{{helper::appdata('')->meta_title}}"/>
	<meta property="og:description" content="{{helper::appdata('')->meta_description}}"/>
	<meta property="og:image" content='{{helper::image_path(helper::appdata('')->og_image)}}'/>
    <title>{{ helper::appdata('')->web_title }}</title>

    <link rel="icon" type="image" sizes="16x16" href="{{ helper::image_path(helper::appdata('')->favicon) }}"><!-- Favicon icon -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/fontawesome/all.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/toastr/toastr.min.css') }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.theme.default.min.css') }}">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/style.css') }}"><!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/responsive.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/timepicker/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL').'admin-assets/css/datatables/buttons.dataTables.min.css')}}">
    @yield('styles')
    @if (App::isLocale('fa'))
        <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/fonts/iranyekan/style.css') }}">
    @endif
</head>
<body class="{{Session::get('theme') == "dark" ? 'dark-theme':''}}">
     <!-- PreLoader -->
     @include('admin.layout.preloader')
    <main>
        <div class="wrapper">
            @include('admin.layout.header')
            <div class="content-wrapper">
                @include('admin.layout.sidebar')
                <div class="main-content {{helper::appdata('')->web_layout == 2 ? 'margin-left':'margin-right' }}">
                    <div class="page-content">
                        <div class="container-fluid">
                            @yield('content')

                            @if (Auth::user()->type == 2)
                                <div class="icon-bar">
                                    <a href="{{ URL::to('/lightdark-dark') }}" class="{{ Session::get('theme') == 'dark' ? 'd-none' : '' }}"><img
                                            src="{{ url(env('ASSETPATHURL') . 'admin-assets/images/about/moon_360.png') }}" height="60"
                                            class="mx-2 {{ Session::get('theme') == 'dark' ? 'd-none' : '' }}" alt=""
                                            id="moon" srcset=""></a>
                                    <a href="{{ URL::to('/lightdark-light') }}" class="{{ Session::get('theme') == 'dark' ? '' : 'd-none' }}"> <img
                                            src="{{ url(env('ASSETPATHURL') . 'admin-assets/images/about/sun_360.png') }}" height="60"
                                            class="mx-2 {{ Session::get('theme') == 'dark' ? '' : 'd-none' }} "alt=""
                                            id="sun" srcset=""></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.layout.footer')
        </div>
    </main>
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/jquery/jquery.min.js') }}"></script><!-- jQuery JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script><!-- Bootstrap JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/toastr/toastr.min.js') }}"></script><!-- Toastr JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/sweetalert/sweetalert2.min.js') }}"></script><!-- Sweetalert JS -->
    <script src="{{ url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/jquery.dataTables.min.js') }}"></script><!-- Datatables JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/dataTables.bootstrap5.min.js') }}"></script><!-- Datatables Bootstrap5 JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/dataTables.buttons.min.js')}}"></script><!-- Datatables Buttons JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/jszip.min.js')}}"></script><!-- Datatables Excel Buttons JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/pdfmake.min.js')}}"></script><!-- Datatables Make PDF Buttons JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/vfs_fonts.js')}}"></script><!-- Datatables Export PDF Buttons JS -->
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/datatables/buttons.html5.min.js')}}"></script><!-- Datatables Buttons HTML5 JS -->
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/chartjs/chart_3.9.1.min.js') }}"></script>
    <script>
        var type = {{Auth::user()->type}};
        var condition = {{helper::appdata('')->web_layout == 2 ? 'true' : 'false'}};
        var are_you_sure = '{{ trans('messages.are_you_sure') }}';
        var yes = '{{ trans('messages.yes') }}';
        var no = '{{ trans('messages.no') }}';
        var sunimagepath = "{{ url(env('ASSETPATHURL').'admin-assets/images/about/sun_360.png')}}";
        var moonimagepath = "{{ url(env('ASSETPATHURL').'admin-assets/images/about/moon_360.png')}}";
        // var lightdarkurl = "{{URL::to('/lightdark')}}";
        var sessionvalue = "{{@Session::get('theme')}}";
        toastr.options = {
            "closeButton": true,
        }
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif

    </script>
     @yield('scripts')
    <script src="{{ url(env('ASSETPATHURL').'admin-assets/js/common.js') }}"></script><!-- Common JS -->
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-198831188-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-198831188-2');
</script>

</body>
</html>
@php session()->forget('getSuccessMessage'); @endphp
@php session()->forget('getErrorMessage'); @endphp

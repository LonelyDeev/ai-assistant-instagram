<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="{{helper::appdata('')->meta_title}}"/>
	<meta property="og:description" content="{{helper::appdata('')->meta_description}}"/>
	<meta property="og:image" content='{{helper::image_path(helper::appdata('')->og_image)}}'/>
    <link rel="icon" href="{{ helper::image_path(helper::appdata('')->favicon) }}" type="image" sizes="16x16">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/fontawesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/lending/aos.css') }}" />
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/lending/app.css') }}" />
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.theme.default.min.css') }}">
    <title> {{ helper::appdata('')->web_title }} </title>
</head>
<body>
    <div class="header sticky-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <nav class="navbar logo_images">
                    <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="">
                </nav>
                <div class="navbarnav">
                    <ul class="d-flex">
                        <li class="nav-item p-4">
                            <a class="nav-link active" href="{{ URL::to('/') }}#home"> Home </a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="{{ URL::to('/') }}#aboutus">About Us</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="{{ URL::to('/') }}#features">Features</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="{{ URL::to('/') }}#tools">Tools</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="{{ URL::to('/') }}#blogs">Blogs</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="{{ URL::to('/') }}#pricing">Pricing Plan</a>
                        </li>
                    </ul>
                </div>
                <div class="login-btn">
                    <a href="{{ url('login') }}" target="_blank" class="btn btn-outline-primary btn-hover-1">Login</a>
                    <a href="{{ url('register') }}" target="_blank" class="btn btn-primary btn-hover-1">Register</a>
                </div>
            </div>
        </div>
    </div>
    <div class="toggle-btn">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <nav class="navbar logo_images">
                    <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="">
                </nav>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                        class="fa-solid fa-bars"></i></button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <nav class="navbar canvase_images">
                            <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="">
                        </nav>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="navbarnav">
                            <ul class="list-group">
                                <li class="nav-item p-3">
                                    <a class="nav-link active" href="{{ URL::to('/') }}#home">Home</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="{{ URL::to('/') }}#aboutus">About Us</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="{{ URL::to('/') }}#features">Features</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="{{ URL::to('/') }}#tools">Tools</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="{{ URL::to('/') }}#blogs">Blogs</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="{{ URL::to('/') }}#pricing">Pricing Plan</a>
                                </li>
                                <a href="{{ url('login') }}" target="_blank"
                                    class="btn btn-outline-primary btn-hover-1 col-6 mb-4">Login</a>
                                <a href="{{ url('register') }}" target="_blank"
                                    class="btn btn-primary btn-hover-1 col-6">Register</a>
                            </ul>
                        </div>
                        <div class="login-btn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                    <h1 class="text-center">{{ trans('labels.terms_condition') }}</h1>
                        @if (!empty($gettermscondition))
                    <div class="cms-section my-3">
                     {!! $gettermscondition !!}
                    </div>
                    @else
                        @include('admin.layout.no_data')
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-end">
                <div class="footer-logo">
                    <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="">
                </div>
                <div class="copy-right">
                    <p>{{ helper::appdata('')->copyright }}</p>
                    <a href="privacy-policy"> {{trans('labels.privacy_policy') }}</a> | <a href="termscondition"> {{ trans('labels.terms_condition') }} </a> | <a href="about-us">{{ trans('labels.about_us') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div id="back-to-top" class="show">
        <a class="btn text-primary">
            <i class="fa-solid fa-angle-up"></i>
        </a>
    </div>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/lending/aos.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.min.js') }}"></script>
    <script>
        AOS.init();
    </script>
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
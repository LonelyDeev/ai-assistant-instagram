<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ helper::appdata('')->web_title }}</title>
    <link rel="icon" type="image" sizes="16x16" href="{{ helper::image_path(helper::appdata('')->favicon) }}">
    <!-- Favicon icon -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/fontawesome/all.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/toastr/toastr.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/style.css') }}"><!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/css/responsive.css') }}"><!-- Responsive CSS -->
    @if (App::isLocale('fa'))
        <link rel="stylesheet" href="{{ url(env('ASSETPATHURL') . 'admin-assets/fonts/iranyekan/style.css') }}">
    @endif
</head>

<body>
    @include('admin.layout.preloader')
    <main style="background: url({{ url(env('ASSETPATHURL') . 'admin-assets/images/vuexy-login-bg.jpg') }})">
        @yield('content')
    </main>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/jquery/jquery.min.js') }}"></script><!-- jQuery JS -->
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script><!-- Bootstrap JS -->
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/toastr/toastr.min.js') }}"></script><!-- Toastr JS -->


    <script>
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
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/auth_default.js') }}"></script>
    @yield('scripts')
</body>

</html>

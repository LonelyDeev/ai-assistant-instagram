<!DOCTYPE html>

<html lang="en" dir="<?php echo e(helper::appdata('')->web_layout == 2 ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>"/>
	<meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>"/>
	<meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>'/>
    <title><?php echo e(helper::appdata('')->web_title); ?></title>

    <link rel="icon" type="image" sizes="16x16" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>"><!-- Favicon icon -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/bootstrap/bootstrap.min.css')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/fontawesome/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/toastr/toastr.min.css')); ?>">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/sweetalert/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.theme.default.min.css')); ?>">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/style.css')); ?>"><!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/responsive.css')); ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/timepicker/jquery.timepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/datatables/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL').'admin-assets/css/datatables/buttons.dataTables.min.css')); ?>">
    <?php if(App::isLocale('fa')): ?>
        <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/fonts/iranyekan/style.css')); ?>">
    <?php endif; ?>
</head>
<body class="<?php echo e(Session::get('theme') == "dark" ? 'dark-theme':''); ?>">
     <!-- PreLoader -->
     <?php echo $__env->make('admin.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <div class="wrapper">
            <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content-wrapper">
                <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="main-content <?php echo e(helper::appdata('')->web_layout == 2 ? 'margin-left':'margin-right'); ?>">
                    <div class="page-content">
                        <div class="container-fluid">
                            <?php echo $__env->yieldContent('content'); ?>

                            <?php if(Auth::user()->type == 2): ?>
                                <div class="icon-bar">
                                    <a href="<?php echo e(URL::to('/lightdark-dark')); ?>" class="<?php echo e(Session::get('theme') == 'dark' ? 'd-none' : ''); ?>"><img
                                            src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/about/moon_360.png')); ?>" height="60"
                                            class="mx-2 <?php echo e(Session::get('theme') == 'dark' ? 'd-none' : ''); ?>" alt=""
                                            id="moon" srcset=""></a>
                                    <a href="<?php echo e(URL::to('/lightdark-light')); ?>" class="<?php echo e(Session::get('theme') == 'dark' ? '' : 'd-none'); ?>"> <img
                                            src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/about/sun_360.png')); ?>" height="60"
                                            class="mx-2 <?php echo e(Session::get('theme') == 'dark' ? '' : 'd-none'); ?> "alt=""
                                            id="sun" srcset=""></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/jquery/jquery.min.js')); ?>"></script><!-- jQuery JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script><!-- Bootstrap JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/toastr/toastr.min.js')); ?>"></script><!-- Toastr JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/sweetalert/sweetalert2.min.js')); ?>"></script><!-- Sweetalert JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') .'admin-assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/jquery.dataTables.min.js')); ?>"></script><!-- Datatables JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/dataTables.bootstrap5.min.js')); ?>"></script><!-- Datatables Bootstrap5 JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/dataTables.buttons.min.js')); ?>"></script><!-- Datatables Buttons JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/jszip.min.js')); ?>"></script><!-- Datatables Excel Buttons JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/pdfmake.min.js')); ?>"></script><!-- Datatables Make PDF Buttons JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/vfs_fonts.js')); ?>"></script><!-- Datatables Export PDF Buttons JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/datatables/buttons.html5.min.js')); ?>"></script><!-- Datatables Buttons HTML5 JS -->
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/chartjs/chart_3.9.1.min.js')); ?>"></script>
    <script>
        var type = <?php echo e(Auth::user()->type); ?>;
        var condition = <?php echo e(helper::appdata('')->web_layout == 2 ? 'true' : 'false'); ?>;
        var are_you_sure = '<?php echo e(trans('messages.are_you_sure')); ?>';
        var yes = '<?php echo e(trans('messages.yes')); ?>';
        var no = '<?php echo e(trans('messages.no')); ?>';
        var sunimagepath = "<?php echo e(url(env('ASSETPATHURL').'admin-assets/images/about/sun_360.png')); ?>";
        var moonimagepath = "<?php echo e(url(env('ASSETPATHURL').'admin-assets/images/about/moon_360.png')); ?>";
        // var lightdarkurl = "<?php echo e(URL::to('/lightdark')); ?>";
        var sessionvalue = "<?php echo e(@Session::get('theme')); ?>";
        toastr.options = {
            "closeButton": true,
        }
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

    </script>
     <?php echo $__env->yieldContent('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/common.js')); ?>"></script><!-- Common JS -->
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
<?php session()->forget('getSuccessMessage'); ?>
<?php session()->forget('getErrorMessage'); ?>
<?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/layout/default.blade.php ENDPATH**/ ?>
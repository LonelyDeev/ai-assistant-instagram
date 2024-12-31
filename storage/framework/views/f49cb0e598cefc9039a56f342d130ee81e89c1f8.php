<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>' />
    <link rel="icon" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>" type="image" sizes="16x16">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/owl-carousel/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/fontawesome/all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/lending/aos.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/css/lending/app.css')); ?>" />

    <title> <?php echo e(helper::appdata('')->web_title); ?> </title>
</head>

<body>
    <div class="header sticky-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <nav class="navbar logo_images">
                    <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="">
                </nav>
                <div class="navbarnav">
                    <ul class="d-flex">
                        <li class="nav-item p-4">
                            <a class="nav-link active" href="#home"> Home </a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#aboutus">About Us</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#tools">Tools</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#blogs">Blogs</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#faqs">FAQs</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="#pricing">Pricing Plan</a>
                        </li>
                    </ul>
                </div>
                <div class="login-btn">
                    <a href="<?php echo e(url('login')); ?>" target="_blank" class="btn btn-outline-primary btn-hover-1">Login</a>
                    <a href="<?php echo e(url('register')); ?>" target="_blank" class="btn btn-primary btn-hover-1">Register</a>
                </div>
            </div>
        </div>
    </div>
    <div class="toggle-btn">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <nav class="navbar logo_images">
                    <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="">
                </nav>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                        class="fa-solid fa-bars"></i></button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <nav class="navbar canvase_images">
                            <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="">
                        </nav>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="navbarnav">
                            <ul class="list-group">
                                <li class="nav-item p-3">
                                    <a class="nav-link active" href="#home">Home</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#aboutus">About Us</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#features">Features</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#tools">Tools</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#blogs">Blogs</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#faqs">FAQs</a>
                                </li>
                                <li class="nav-item p-3">
                                    <a class="nav-link" href="#pricing">Pricing Plan</a>
                                </li>
                                <a href="<?php echo e(url('login')); ?>" target="_blank"
                                    class="btn btn-outline-primary btn-hover-1 col-6 mb-4">Login</a>
                                <a href="<?php echo e(url('register')); ?>" target="_blank"
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
    <div class="banner-main-sec" id="home">
        <div class="container">
            <img src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/lending/shape-2.png')); ?>"
                class="banner-img-2" alt="">
            <div class="banner-content row">
                <div class="col-lg-6 banner-text" data-aos="zoom-in" data-aos-duration="1500">
                    <h1 class="text-heding-1">Best Al Writing Assistants</h1>
                    <p class="banner-dec text-color">AI Writer is an automated Content Writing Assistant that helps you
                        to create Unlimited, Unique, Excellent-Quality Content in Seconds.</p>
                    <a href="<?php echo e(url('register')); ?>" target="_blank" class="btn btn-primary btn-hover-1">Register</a>
                </div>
                <div class="col-lg-6 banner-image" data-aos="flip-right" data-aos-duration="1500">
                    <img src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/lending/bannar-bg.png')); ?>"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="about-main-sec" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-image">
                    <img src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/lending/about.png')); ?>"
                        alt="" data-aos="fade-down" data-aos-duration="1000">
                </div>
                <div class="col-lg-6 about-content">
                    <div data-aos="fade-up" data-aos-duration="1200">
                        <h3 class="about-title">About Us</h3>
                        <h3 class="about-text">Write on Autopilot</h3>
                        <p class="text-color">AI Writer will analyze your input and write content automatically for
                            you. Now you can sit back and save hours of work every day. Let's make your task easy with a
                            one-click content creator. Sign-up now!
                        </p>
                        <p class="text-color">
                            AI Writer is an AI writing assistant that helps you create high-quality content, in just a
                            few seconds, at a fraction of the cost!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service-sec" id="features">
        <div class="container">
            <div class="service-heading mb-3">
                <h3 class="text-center mb-2">Features</h3>
                <h5 class="text-center service-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias, iure!</h5>
            </div>
            <div class="row">
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="iner-box h-100">
                        <i class="fa-regular fa-object-ungroup"></i>
                        <h4 class="inner-box-heading">Powered by AI</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-calendar"></i>
                        <h4 class="inner-box-heading">Powerful settings</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1600">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-rocket"></i>
                        <h4 class="inner-box-heading">Optimized for conversions</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-credit-card"></i>
                        <h4 class="inner-box-heading">10+ Available Tools</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1600">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <h4 class="inner-box-heading">Grammar check</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1400">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-link"></i>
                        <h4 class="inner-box-heading">Sentence rewriter</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1600">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-phone"></i>
                        <h4 class="inner-box-heading">Cover Letter</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
                <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1600">
                    <div class="iner-box h-100">
                        <i class="fa-solid fa-truck"></i>
                        <h4 class="inner-box-heading">Social Media Post</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="work-flow-main">
        <div class="container">
            <div class="service-heading">
                <h3 class="text-center pb-4">Work flow</h3>
            </div>
            <div class="row">
                <div class="work-flow col-xl-4 col-md-6 text-center" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    <div class="work-iner-box">
                        <div class="work-check">
                            <div class="icon-circle">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="work-iner-check">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="work-inner-heading">Select a writing tool</h4>
                    <p class="flow-text">Easily create business make a great first
                        impression. Fill your profile, it is simple!</p>
                </div>
                <div class="work-flow col-xl-4 col-md-6 text-center" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom" data-aos-duration="1200">
                    <div class="work-iner-box">
                        <div class="work-check">
                            <div class="icon-circle">
                                <i class="fa-regular fa-share-nodes"></i>
                                <div class="work-iner-check">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="work-inner-heading">Fill in your product details</h4>
                    <p class="flow-text">Easily share your digital business link with anyone and send it
                        through email, a link, and more.</p>
                </div>
                <div class="work-flow col-xl-4 col-md-6 text-center" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom" data-aos-duration="1400">
                    <div class="work-iner-box">
                        <div class="work-check">
                            <div class="icon-circle">
                                <i class="fa-regular fa-trophy"></i>
                                <div class="work-iner-check">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="work-inner-heading">Generate AI content</h4>
                    <p class="flow-text">Your customers will find a way to reach you. Your customers & prospects book
                        an available time with you</p>
                </div>
            </div>
        </div>
    </div>

    <div class="service-sec" id="tools">
        <div class="container">
            <div class="service-heading mb-3">
                <h3 class="text-center mb-2"><?php echo e(trans('labels.all_tools')); ?></h3>
                <h5 class="text-center service-text"><?php echo e(trans('labels.all_tools_desc')); ?></h5>
            </div>
            <div class="row">
                <?php
                    $i = 1;
                ?>
                <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="services-box col-xl-3 col-md-6 text-center" data-aos="zoom-in"
                        data-aos-duration="1000">
                        <div class="iner-box h-100">
                            <img src="<?php echo e(helper::image_path($i++ . '.svg')); ?>" class="img-fluid rounded-circle"
                                height="35" width="35" alt="">
                            <h4 class="inner-box-heading mt-3"><?php echo e($tool->name); ?></h4>
                            <p><?php echo e($tool->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="service-sec" id="blogs">
        <div class="container">
            <div class="service-heading mb-3">
                <h3 class="text-center mb-2"><?php echo e(trans('labels.popular_blogs')); ?></h3>
                <h5 class="text-center service-text"><?php echo e(trans('labels.popular_blog_desc')); ?></h5>
            </div>
            <div class="blog-content">
                <div class="owl-carousel blog-carousel owl-theme p-2">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card blog-card h-100 w-100">
                            <img src="<?php echo e(helper::image_path($blog->image)); ?>"
                                class="img-fluid blog-image object-fit-cover" alt="">
                            <div class="card-body blog-card-body">
                                <div
                                    class="blog-date <?php echo e(helper::appdata('')->web_layout == 2 ? 'date' : 'date-left'); ?>">
                                    <?php echo e(DATE_FORMAT($blog->created_at, 'd-m-Y')); ?></div>
                                <h5 class="card-title mt-3"><?php echo e(Str::limit($blog->title, 65)); ?></h5>
                                <p class="card-text"><?php echo Str::limit($blog->description, 220); ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-white">
                                <div>
                                    <p class="m-0"><?php echo e(trans('labels.post_by')); ?>,
                                        <br>
                                    <p class="fw-bold text-black"><?php echo e(trans('labels.admin')); ?></p>
                                    </p>
                                </div>

                                <a class="btn btn-sm btn-outline-primary rounded-5 px-4 py-2"
                                    href="<?php echo e(URL::to('bloglist/blogs-' . $blog->slug)); ?>">
                                    <?php echo e(trans('labels.read_more')); ?>

                                    <?php if(helper::appdata('')->web_layout == 2): ?>
                                        <i class="fa-solid fa-arrow-left mx-1"></i>
                                    <?php else: ?>
                                        <i class="fa-solid fa-arrow-right mx-1"></i>
                                    <?php endif; ?>

                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('/bloglist')); ?>" class="btn btn-primary btn-hover-1"><?php echo e(trans('labels.all_blogs')); ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="work-flow-main" id="faqs">
        <div class="container">
            <div class="service-heading mb-3">
                <h3 class="text-center mb-2"><?php echo e(trans('labels.faqs')); ?></h3>
            </div>
            <div class="accordion faq" id="faqleft">
                <?php $firstItem = true; ?>
                <?php $__currentLoopData = $getfaq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-item border rounded mb-3">
                    <h2 class="accordion-header" id="faq<?php echo e($faq->id); ?>">
                        <button class="accordion-button <?php echo e(helper::appdata('')->web_layout == 2 ? 'accordion-button-rtl' : ''); ?> <?php echo e($firstItem == "true" ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqs<?php echo e($faq->id); ?>" aria-expanded="false" aria-controls="collapseOne">
                            <?php echo e($faq->question); ?>

                        </button>
                    </h2>
                    <div id="faqs<?php echo e($faq->id); ?>" class="accordion-collapse <?php echo e($firstItem == "true" ? 'collapse show' : 'collapse'); ?>" aria-labelledby="faq<?php echo e($faq->id); ?>" data-bs-parent="#faqleft">
                        <div class="accordion-body"><?php echo e($faq->answer); ?></div>
                    </div>
                </div>
                <?php $firstItem = false; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="pricing-main-sec" id="pricing">
        <div class="container">
            <div class="pricing-heading text-center pb-4">
                <span class="pricing-heading-2"> Choose Package</span>
                <h3 class="pricing-heading-1">Pricing</h3>
            </div>
            <div class="pricing-card">
                <div class="row">
                    <?php $__currentLoopData = $planlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-md-6 mb-5" data-aos="zoom-in-down" data-aos-duration="1000">
                            <div class="card pricing-card-main h-100">
                                <div class="card-body pricing-card-body">
                                    <h5 class=" card-subtitle mb-4"><?php echo e($plan->name); ?></h5>
                                    <h6 class="card-title mb-2"><?php echo e(helper::currency_formate($plan->price, 1)); ?> /
                                        <?php if($plan->plan_type == 1): ?>
                                            <?php if($plan->duration == 1): ?>
                                                <?php echo e(trans('labels.one_month')); ?>

                                            <?php elseif($plan->duration == 2): ?>
                                                <?php echo e(trans('labels.three_month')); ?>

                                            <?php elseif($plan->duration == 3): ?>
                                                <?php echo e(trans('labels.six_month')); ?>

                                            <?php elseif($plan->duration == 4): ?>
                                                <?php echo e(trans('labels.one_year')); ?>

                                            <?php elseif($plan->duration == 5): ?>
                                                <?php echo e(trans('labels.lifetime')); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($plan->plan_type == 2): ?>
                                            <?php echo e($plan->days); ?> <?php echo e(trans('labels.days')); ?>

                                        <?php endif; ?>
                                    </h6>
                                    <h3 class="pricing-card-heading text-center"><?php echo e($plan->description); ?></h3>
                                    <div class="pricing-group">
                                        <ul class="list-group">
                                            <?php
                                                $features = explode('|', $plan->features);
                                                $tools_limit = explode(',', $plan->tools_limit);
                                            ?>
                                            <li class="list-item d-flex d-none">
                                                <i class="fa-regular fa-circle-check"></i>
                                                <p class="ms-2">
                                                    <?php echo e(count($tools_limit)); ?> <?php echo e(trans('labels.tools_limit')); ?>

                                            </li>

                                            <li class="list-item d-flex">
                                                <i class="fa-regular fa-circle-check"></i>
                                                <p class="ms-2">
                                                    <?php echo e($plan->word_limit); ?> <?php echo e(trans('labels.word_limit')); ?>

                                            </li>
                                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $features): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-item d-flex">
                                                    <i class="fa-regular fa-circle-check"></i>
                                                    <p class="ms-2"><?php echo e($features); ?></p>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 my-2">
                                    <a href="<?php echo e(url('register')); ?>" target="_blank" type="button"
                                        class="btn btn-primary col-12 card-btn">Join us</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-end">
                <div class="footer-logo">
                    <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="">
                </div>
                <div class="copy-right">
                    <p><?php echo e(helper::appdata('')->copyright); ?></p>
                    <a href="privacy-policy"> <?php echo e(trans('labels.privacy_policy')); ?></a> | <a href="termscondition">
                        <?php echo e(trans('labels.terms_condition')); ?> </a> | <a
                        href="about-us"><?php echo e(trans('labels.about_us')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div id="back-to-top" class="show">
        <a class="btn text-primary">
            <i class="fa-solid fa-angle-up"></i>
        </a>
    </div>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/lending/aos.js')); ?>"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(".blog-carousel").owlCarousel({
            rtl: false,
            loop: false,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
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
<?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/front/lending/index.blade.php ENDPATH**/ ?>
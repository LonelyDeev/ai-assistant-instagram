<header id="header" class="page-topbar <?php echo e(session()->get('theme') == 'dark' ? 'dark-theme' : ''); ?>">
    <div
        class="navbar-header <?php echo e(Session::get('theme') == 'dark' ? 'dark-theme' : ''); ?> flex-end <?php echo e(helper::appdata('')->web_layout == 2 ? 'margin-0' : 'margin-right'); ?>">
        <button class="navbar-toggler d-lg-none d-md-block px-4" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarcollapse" aria-expanded="false" aria-controls="sidebarcollapse">
            <i class="fa-regular fa-bars fs-4"></i>
        </button>
        <div class="<?php echo e(Auth::user()->type == 2 ? 'px-4' : 'px-2'); ?> d-flex align-items-center">

            <div class="dropwdown d-inline-block">
                <button class="btn header-item" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(helper::image_path(Auth::user()->image)); ?>">
                    <span class="d-none d-xxl-inline-block d-xl-inline-block ms-1 <?php echo e(Session::get('theme') == 'dark' ? 'text-white' : ''); ?>"><?php echo e(Auth::user()->name); ?></span>
                    <i class="fa-regular fa-angle-down d-none d-xxl-inline-block d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu box-shadow">
                    <a href="<?php echo e(Auth::user()->type == 1 ? URL::to('/admin/settings#editprofile') : URL::to('/edit-' . Auth::user()->slug)); ?>"
                        class="dropdown-item d-flex align-items-center">
                        <i class="fa-light fa-address-card fs-5 mx-2"></i><?php echo e(trans('labels.profile')); ?>

                    </a>

                    <a href="<?php echo e(Auth::user()->type == 1 ? URL::to('/admin/logout') : URL::to('/logout')); ?>"
                        class="dropdown-item d-flex align-items-center">
                        <i class="fa-light fa-right-from-bracket fs-5 mx-2"></i><?php echo e(trans('labels.logout')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>
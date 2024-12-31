<?php if(Auth::user()->type == 1): ?>
    <ul class="navbar-nav">
        <li class="nav-item fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>" aria-current="page"
                href="<?php echo e(URL::to('/admin/dashboard')); ?>">
                <i class="fa-solid fa-house-user"></i>
                <span><?php echo e(trans('labels.dashboard')); ?></span>
            </a>
        </li>

        
        <li class="nav-item mt-3">
            <h6 class="text-muted mb-2 fs-7 text-uppercase"><?php echo e(trans('labels.business_management')); ?></h6>
        </li>

        <li class="nav-item mb-2 fs-7">
            <a class="nav-link  d-flex rounded <?php echo e(request()->is('admin/users*') ? 'active' : ''); ?>" aria-current="page"
                href="<?php echo e(URL::to('/admin/users')); ?>">
                <i class="fa-solid fa-users"></i>
                <span><?php echo e(trans('labels.vendors')); ?></span>
            </a>
        </li>

        <li class="nav-item mb-2 fs-7">
            <a class="nav-link  d-flex rounded <?php echo e(request()->is('admin/plan*') ? 'active' : ''); ?>" aria-current="page"
                href="<?php echo e(URL::to('/admin/plan')); ?>">
                <i class="fa-solid fa-medal"></i>
                <span><?php echo e(trans('labels.subscription_plans')); ?></span>
            </a>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link  d-flex rounded <?php echo e(request()->is('admin/payment') ? 'active' : ''); ?>"
                aria-current="page" href="<?php echo e(URL::to('/admin/payment')); ?>">
                <i class="fa-solid fa-money-check-dollar-pen"></i>
                <span><?php echo e(trans('labels.payment')); ?></span>
            </a>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/transaction') ? 'active' : ''); ?>"
                aria-current="page" href="<?php echo e(URL::to('/admin/transaction')); ?>">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span><?php echo e(trans('labels.transactions')); ?></span>
            </a>
        </li>

        
        <li class="nav-item mt-3">
            <h6 class="text-muted mb-2 fs-7 text-uppercase"><?php echo e(trans('labels.other')); ?></h6>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/contacts') ? 'active' : ''); ?>"
                aria-current="page" href="<?php echo e(URL::to('/admin/contacts')); ?>">
                <i class="fa-solid fa-address-book"></i>
                <span><?php echo e(trans('labels.contacts')); ?></span>
            </a>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/settings') ? 'active' : ''); ?>"
                aria-current="page" href="<?php echo e(URL::to('/admin/settings')); ?>">
                <i class="fa-solid fa-gear"></i>
                <span><?php echo e(trans('labels.setting')); ?></span>
            </a>
        </li>
        <li class="nav-item mb-2 fs-7 dropdown multimenu">
            <a class="nav-link collapsed rounded d-flex align-items-center justify-content-between dropdown-toggle mb-1"
                href="#pages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pages">
                <span class="d-flex"><i class="fa-solid fa-file-lines"></i></i><span
                        class="multimenu-title"><?php echo e(trans('labels.cms_pages')); ?></span></span>
            </a>
            <ul class="collapse" id="pages">
                <li class="nav-item ps-4 mb-1">
                    <a class="nav-link rounded <?php echo e(request()->is('admin/privacypolicy') ? 'active' : ''); ?>"
                        aria-current="page" href="<?php echo e(URL::to('/admin/privacypolicy')); ?>">
                        <span class="d-flex align-items-center multimenu-menu-indicator"><i
                                class="fa-solid fa-circle-small"></i><?php echo e(trans('labels.privacy_policy')); ?></span>
                    </a>
                </li>
                <li class="nav-item ps-4 mb-1">
                    <a class="nav-link rounded <?php echo e(request()->is('admin/termscondition') ? 'active' : ''); ?>"
                        aria-current="page" href="<?php echo e(URL::to('/admin/termscondition')); ?>">
                        <span class="d-flex align-items-center multimenu-menu-indicator"><i
                                class="fa-solid fa-circle-small"></i><?php echo e(trans('labels.terms_condition')); ?></span>
                    </a>
                </li>
                <li class="nav-item ps-4 mb-1">
                    <a class="nav-link rounded <?php echo e(request()->is('admin/aboutus*') ? 'active' : ''); ?>"
                        aria-current="page" href="<?php echo e(URL::to('/admin/aboutus')); ?>">
                        <span class="d-flex align-items-center multimenu-menu-indicator"><i
                                class="fa-solid fa-circle-small"></i><?php echo e(trans('labels.about_us')); ?></span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/blogs*') ? 'active' : ''); ?>" aria-current="page"
                href="<?php echo e(URL::to('/admin/blogs')); ?>">
                <i class="fa-solid fa-blog"></i>
                <span><?php echo e(trans('labels.blogs')); ?></span>
            </a>
        </li>
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex rounded <?php echo e(request()->is('admin/faqs*') ? 'active' : ''); ?>" aria-current="page"
                href="<?php echo e(URL::to('/admin/faqs')); ?>">
                <i class="fa-solid fa-question"></i>
                <span><?php echo e(trans('labels.faqs')); ?></span>
            </a>
        </li>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1): ?>
            <li class="nav-item mb-2 fs-7">
                <a class="nav-link rounded d-flex <?php echo e(request()->is('admin/google_analytics*') ? 'active' : ''); ?>"
                    aria-current="page" href="<?php echo e(URL::to('/admin/google_analytics')); ?>">
                    <i class="fa-solid fa-bar-chart"></i>
                    <p class="w-100 d-flex justify-content-between">
                        <span class="nav-text "><?php echo e(trans('labels.google_analytics')); ?></span>
                        <span class="badge badge bg-danger float-right mr-1 mt-1"><?php echo e(trans('labels.addon')); ?></span>
                    </p>
                </a>
            </li>
        <?php endif; ?>

    </ul>
<?php endif; ?>

<?php if(Auth::user()->type == 2): ?>
    <ul class="navbar-nav">
        <?php if(!empty(helper::plandetail(Auth::user()->plan_id)->name)): ?>
            <li class="nav-item fs-7">
                <div class="d-flex justify-content-between">
                    <h4><?php echo e(@helper::plandetail(Auth::user()->plan_id)->name); ?></h4>
                </div>
                <div class="d-flex justify-content-between">
                    <strong style="font-size: 15px;"
                        class="mt-2 badge  <?php echo e(@helper::wordcount(Auth::user()->id) == 0 ? 'text-bg-danger' : 'text-bg-success'); ?>"><?php echo e(number_format(helper::wordcount(Auth::user()->id))); ?>

                        <?php echo e(trans('labels.words_left')); ?></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(URL::to('/plan')); ?>"
                        class="btn <?php echo e(session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'); ?> w-100 mt-2"><?php echo e(trans('labels.upgrade')); ?></button></a>
                </div>
            </li>
            <hr>
        <?php endif; ?>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/index')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('index') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-house-user"></i><span><?php echo e(trans('labels.home')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/alltools')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('alltools') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-layer-group"></i><span><?php echo e(trans('labels.all_tools')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/content-ai-images')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('ai-images') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-image"></i><span><?php echo e(trans('labels.ai_images')); ?> <?php if(env('Environment') == 'sendbox'): ?><small class="badge bg-success">New</small><?php endif; ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/mycontent')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('mycontent*') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-folder-grid"></i><span><?php echo e(trans('labels.my_content')); ?></span></a>
        </li>
        <hr>

        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/changepassword')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('changepassword') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-lock"></i><span><?php echo e(trans('labels.change_password')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/plan')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('plan') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-dollar-sign"></i><span><?php echo e(trans('labels.subscription_plans')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/transactions')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('transactions') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-file-invoice-dollar"></i><span><?php echo e(trans('labels.transactions')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/contactus')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('contactus') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-address-book"></i><span><?php echo e(trans('labels.contact_us')); ?></span></a>
        </li>
        <li class="nav-item fs-7 mb-1">
            <a href="<?php echo e(URL::to('/logout')); ?>"
                class="nav-link d-flex rounded <?php echo e(request()->is('logout') ? 'active' : ''); ?>"><i
                    class="fa-solid fa-right-from-bracket"></i><span><?php echo e(trans('labels.logout')); ?></span></a>
        </li>
    </ul>
<?php endif; ?>
<?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/layout/sidebarcommon.blade.php ENDPATH**/ ?>
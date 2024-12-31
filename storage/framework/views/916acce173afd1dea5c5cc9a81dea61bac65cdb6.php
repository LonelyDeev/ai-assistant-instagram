<div
    class="d-flex justify-content-between align-items-center <?php echo e(str_contains(request()->url(), 'add') || str_contains(request()->url(), 'edit') ? 'mb-3' : ''); ?> ">
    <?php if(str_contains(request()->url(), 'add')): ?>
        <h5 class="text-uppercase"><?php echo e(trans('labels.add_new')); ?></h5>
    <?php endif; ?>
    <?php if(str_contains(request()->url(), 'edit')): ?>
        <h5 class="text-uppercase"><?php echo e(trans('labels.edit')); ?></h5>
    <?php endif; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0 direction-ltr">
            
            <?php if(request()->is('admin/users')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.vendors')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/users/add') || str_contains(request()->url(), 'admin/users/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/users')); ?>">
                        <?php echo e(trans('labels.vendors')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/plan')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.subscription_plans')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/plan/add') || str_contains(request()->url(), 'admin/plan/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/plan')); ?>"><?php echo e(trans('labels.subscription_plans')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/payment')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.payment')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/transaction')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.transactions')); ?><h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/settings')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.setting')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/categories')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.categories')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/categories/add') || str_contains(request()->url(), 'admin/categories/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/categories')); ?>"><?php echo e(trans('labels.categories')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/services')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.services')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/services/add') || str_contains(request()->url(), 'admin/services/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/services')); ?>"><?php echo e(trans('labels.services')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/workinghours*')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.workinghours')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/promocode')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.promocode')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/promocode/add') || str_contains(request()->url(), 'admin/promocode/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/promocode')); ?>"><?php echo e(trans('labels.promocode')); ?></a>
                </li>
            <?php endif; ?>
            <?php
                $url = '';
            ?>
            <?php if(request()->is('admin/bannersection-1') ||
                    request()->is('admin/bannersection-2') ||
                    request()->is('admin/bannersection-3')): ?>
             <li class="breadcrumb-item"><h5 class="text-uppercase"><?php echo e(@$title); ?></h5></li>
            <?php elseif((str_contains(request()->url(), 'add') || str_contains(request()->url(), 'edit')) && str_contains(request()->url(), 'bannersection')): ?>
                <li class="breadcrumb-item"><a href="<?php echo e($table_url); ?>"><?php echo e(@$title); ?></a></li>
            <?php endif; ?>
            <?php if(request()->is('admin/blogs')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.blogs')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/blogs/add') || str_contains(request()->url(), 'admin/blogs/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/blogs')); ?>"><?php echo e(trans('labels.blogs')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/faqs')): ?>
            <li class="breadcrumb-item">
                <h5 class="text-uppercase"><?php echo e(trans('labels.faqs')); ?></h5>
            </li>
        <?php elseif(request()->is('admin/faqs/add') || str_contains(request()->url(), 'admin/faqs/edit')): ?>
            <li class="breadcrumb-item">
                <a href="<?php echo e(URL::to('/admin/faqs')); ?>"><?php echo e(trans('labels.faqs')); ?></a>
            </li>
        <?php endif; ?>
            <?php if(request()->is('admin/bookings')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/bookings')); ?>">
                        <h5 class="text-uppercase"><?php echo e(trans('labels.bookings')); ?></h5>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/contacts')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.contacts')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/reports*')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.reports')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/privacypolicy')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.privacy_policy')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/termscondition')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.terms_condition')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/aboutus')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.about_us')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/custom_domain')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.custom_domain')); ?></h5>
                </li>
            <?php elseif(request()->is('admin/custom_domain/add') || str_contains(request()->url(), 'admin/custom_domain/edit')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/custom_domain')); ?>"><?php echo e(trans('labels.custom_domain')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/apps')): ?>
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase"><?php echo e(trans('labels.addons_manager')); ?></h5>
                </li>
            <?php endif; ?>
            <?php if(request()->is('admin/apps/add')): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to('/admin/apps')); ?>"><?php echo e(trans('labels.addons_manager')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(str_contains(request()->url(), 'add')): ?>
                <li class="breadcrumb-item active"><?php echo e(trans('labels.add')); ?></li>
            <?php endif; ?>
            <?php if(str_contains(request()->url(), 'edit')): ?>
                <li class="breadcrumb-item active"><?php echo e(trans('labels.edit')); ?></li>
            <?php endif; ?>
            <?php if(str_contains(request()->url(), 'selectplan')): ?>
                <li class="breadcrumb-item active"><?php echo e(trans('labels.buy_now')); ?></li>
            <?php endif; ?>

            <?php if(str_contains(request()->url(), 'invoice')): ?>
                <h5 class="text-uppercase">
                    <li class="breadcrumb-item active"><?php echo e(trans('labels.invoice')); ?></li>
                </h5>
            <?php endif; ?>
        </ol>
    </nav>

    <?php if(request()->is('admin/apps')): ?>
        <a href="<?php echo e(URL::to('admin/apps/add')); ?>" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.install_update_addons')); ?></a>
    <?php endif; ?>
    <?php if(Auth::user()->type == 2): ?>
        <?php if(request()->is('admin/custom_domain')): ?>
            <a href="<?php echo e(URL::to('admin/custom_domain/add')); ?>"
                class="btn btn-secondary"><?php echo e(trans('labels.request_custom_domain')); ?></a>
        <?php endif; ?>

        <?php if(request()->is('admin/transaction')): ?>
            <form action="<?php echo e(URL::to('/admin/transaction')); ?> " class="col-7" method="get">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group ps-0 justify-content-end">
                            <?php if(Auth::user()->type == 1): ?>
                                <select class="form-select transaction-select" name="vendor">
                                    <option value=""
                                        data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                        selected><?php echo e(trans('labels.select')); ?></option>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vendor->id); ?>"
                                            data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                            <?php echo e(request()->get('vendor') == $vendor->id ? 'selected' : ''); ?>>
                                            <?php echo e($vendor->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                            <div class="input-group-append px-1">
                                <input type="date" class="form-control rounded" name="startdate"
                                    value="<?php echo e(request()->get('startdate')); ?>">
                            </div>
                            <div class="input-group-append px-1">
                                <input type="date" class="form-control rounded" name="enddate"
                                    value="<?php echo e(request()->get('enddate')); ?>">
                            </div>
                            <div class="input-group-append px-1">
                                <button class="btn btn-primary rounded"
                                    type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(request()->is('admin/reports')): ?>
        <form action="<?php echo e(URL::to('/admin/reports')); ?>">
            <div class="input-group col-md-12 ps-0">
                <div class="input-group-append col-auto px-1">
                    <input type="date" class="form-control rounded" name="startdate"
                        value="<?php echo e(request()->get('startdate')); ?>" required="">
                </div>

                <div class="input-group-append col-auto px-1">
                    <input type="date" class="form-control rounded" name="enddate"
                        value="<?php echo e(request()->get('enddate')); ?>" required="">
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary rounded" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <?php if(str_contains(request()->url(), 'add') ||
            str_contains(request()->url(), 'edit') ||
            request()->is('admin/payment') ||
            request()->is('admin/transaction') ||
            request()->is('admin/settings') ||
            request()->is('admin/workinghours*') ||
            request()->is('admin/bookings*') ||
            request()->is('admin/contacts') ||
            request()->is('admin/reports*') ||
            request()->is('admin/users') ||
            (request()->is('admin/plan*') && Auth::user()->type == 2)): ?>
        <a href="<?php echo e(URL::to(request()->url() . '/add')); ?>" class="btn btn-secondary px-2 d-none">
            <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?></a>
    <?php else: ?>
        <a href="<?php echo e(URL::to(request()->url() . '/add')); ?>" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?></a>
    <?php endif; ?>

</div>
<?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/breadcrumb/breadcrumb.blade.php ENDPATH**/ ?>
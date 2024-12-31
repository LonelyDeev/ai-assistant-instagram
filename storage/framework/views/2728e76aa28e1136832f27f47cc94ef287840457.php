<?php $__env->startSection('content'); ?>
    <div class="d-flex mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.dashboard')); ?></h5>
    </div>
    <div class="row">
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                                <i class="fa-regular fa-user fs-5"></i>
                        </span>
                        <span class="text-end">
                                <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.vendors')); ?></p>
                                <h4><?php echo e(empty($totalusers) ? 0: $totalusers); ?></h4>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                            <i class="fa-regular fa-medal fs-5"></i>
                        </span>
                        <span class="text-end">

                                <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.subscription_plans')); ?></p>
                                <h4><?php echo e(empty($totalplans) ? 0 : $totalplans); ?></h4>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                                <i class="fa-solid fa-ballot-check fs-5"></i>
                        </span>
                        <span class="text-end">
                            <p class="text-muted fw-medium mb-1">
                                    <?php echo e(trans('labels.transactions')); ?>

                            </p>
                                <h4><?php echo e(empty($totaltransaction) ? 0 : $totaltransaction); ?></h4>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="card-icon">
                            <i class="fa-regular fa-money-bill-1-wave fs-5"></i>
                        </span>
                        <span class="text-end">
                            <p class="text-muted fw-medium mb-1"><?php echo e(trans('labels.revenue')); ?></p>
                            <h4><?php echo e(helper::currency_formate($totalrevenue->total, Auth::user()->id)); ?></h4>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8  mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><?php echo e(trans('labels.revenue')); ?></h5>
                        <select class="form-select form-select-sm w-auto" name="revenue_year" id="revenue_year">
                            <?php $__currentLoopData = $revenue_year_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($year); ?>" <?php echo e($year == date('Y') ? 'selected' : ''); ?>>
                                    <?php echo e($year); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="linechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <?php echo e(trans('labels.vendors')); ?></h5>
                        <select class="form-select form-select-sm w-auto" name="booking_year" id="booking_year">
                                <?php $__currentLoopData = $userchart_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($year); ?>" <?php echo e($year == date('Y') ? 'selected' : ''); ?>>
                                        <?php echo e($year); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="piechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/chartjs/chart_3.9.1.min.js')); ?>"></script>
    <script>
        var revenue_chart = null;
        var piechart = null;
        var revenue_lables = <?php echo e(Js::from($revenue_lables)); ?>;
        var revenue_data = <?php echo e(Js::from($revenue_data)); ?>;
        var piechart_lables = <?php echo e(Js::from($piechart_lables)); ?>;
        var piechart_data = <?php echo e(Js::from($piechart_data)); ?>;
    </script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
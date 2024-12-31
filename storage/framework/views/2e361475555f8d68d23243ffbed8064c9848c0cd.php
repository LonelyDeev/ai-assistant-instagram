
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase"><?php echo e(trans('labels.install_update_addons')); ?></h5>
        <div class="d-inline-flex">
            <a href="<?php echo e(URL::to('admin/createsystem-addons')); ?>" class="btn btn-secondary px-2 d-flex">
                <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.install_update_addons')); ?></a>
        </div>
    </div>
    <div class="search_row">
        <div class="card border-0 box-shadow h-100">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="available-tab" data-bs-toggle="tab" href="#available" role="tab"
                            aria-controls="available" aria-selected="false"><?php echo e(trans('labels.available_addons')); ?></a>
                        <a class="nav-link" id="installed-tab" data-bs-toggle="tab" href="#installed" role="tab"
                            aria-controls="installed" aria-selected="true"><?php echo e(trans('labels.installed_addons')); ?></a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="available" role="tabpanel" aria-labelledby="available-tab">
                        <?php
                        $payload = file_get_contents('https://paponapps.co.in/api/addonsapi.php?type=papon&item=aiwriter');
                        $obj = json_decode($payload);
                        ?>
                        <div class="row">
                            <?php $__currentLoopData = $obj->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-3 mt-3">
                                    <div class="card">
                                        <img class="img-fluid" src='<?php echo e($item->image); ?>' alt="">
                                        <div class="card-body">
                                            <h5 class="card-title mt-3"><?php echo e($item->name); ?></h5>
                                            <p><?php echo $item->short_description; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="<?php echo e($item->purchase); ?>" target="_blank"
                                                class="btn btn-sm btn-primary">Purchase</a>
                                            <span class="btn btn-sm btn-success float-end"><?php echo e($item->price); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End Col -->
                    </div>
                    <div class="tab-pane fade" id="installed" role="tabpanel" aria-labelledby="installed-tab">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = App\Models\SystemAddons::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-6 col-lg-3 mt-3">
                                    <div class="card">
                                        <img class="img-fluid" src='<?php echo asset('storage/app/public/addons/' . $addon->image); ?>' alt="">
                                        <div class="card-body">
                                            <h5 class="card-title mt-3"><?php echo e(ucfirst($addon->name)); ?></h5>
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text d-inline"><small class="text-muted">Version :
                                                    <?php echo e($addon->version); ?></small></p>
                                            <?php if($addon->activated): ?>
                                                <a href="#" class="btn btn-sm btn-primary float-end"
                                                    onclick="StatusUpdate('<?php echo e($addon->id); ?>','0')"><?php echo e(trans('labels.activated')); ?></a>
                                            <?php else: ?>
                                                <a href="#" class="btn btn-sm btn-danger float-end"
                                                    onclick="StatusUpdate('<?php echo e($addon->id); ?>','1')"><?php echo e(trans('labels.deactivated')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-md-6 col-lg-3 mt-4">
                                    <h4><?php echo e(trans('labels.no_addon_installed')); ?></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/apps/index.blade.php ENDPATH**/ ?>
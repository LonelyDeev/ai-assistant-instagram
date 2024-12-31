
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.image')); ?></td>
                                    <td><?php echo e(trans('labels.name')); ?></td>
                                    <td><?php echo e(trans('labels.email')); ?></td>
                                    <td><?php echo e(trans('labels.mobile')); ?></td>
                                    <td class="text-center"><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <td><?php
                                            echo $i++;
                                        ?></td>
                                        <td><img src="<?php echo e(helper::image_path($user->image)); ?>" height="50" width="50"
                                                alt=""></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->mobile); ?></td>
                                        <td class="text-center">
                                            <?php if($user->is_available == '1'): ?>
                                                <a class="btn btn-sm btn-outline-success" href="javascript::void(0)"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/2')); ?>')" <?php endif; ?>><i class="fa-regular fa-check"></i>
                                                </a>
                                            <?php else: ?>
                                                <a class="btn btn-sm btn-outline-danger" href="javascript::void(0)"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>  onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/1')); ?>')" <?php endif; ?>><i class="fa-regular fa-xmark "></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(URL::to('admin/users/edit-' . $user->slug)); ?>" class="btn btn-outline-info btn-sm"> <i
                                                class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/user/user.blade.php ENDPATH**/ ?>
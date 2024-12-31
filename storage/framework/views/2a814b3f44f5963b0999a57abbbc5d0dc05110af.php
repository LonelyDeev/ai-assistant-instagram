
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.image')); ?></td>
                                    <td><?php echo e(trans('labels.title')); ?></td>
                                    <td><?php echo e(trans('labels.description')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7">
                                        <td><?php
                                            echo $i++;
                                        ?></td>
                                        <td><img src="<?php echo e(helper::image_path($blog->image)); ?>" class="img-fluid rounded hw-50" alt=""></td>
                                        <td><?php echo e($blog->title); ?></td>
                                        <td><?php echo Str::limit($blog->description, 500); ?></td>
                                        <td>
                                            <a href="<?php echo e(URL::to('admin/blogs/edit-'.$blog->slug)); ?>" class="btn btn-outline-info btn-sm mx-1"> <i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="javascript:void(0)"  <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/blogs/delete-'.$blog->slug)); ?>')" <?php endif; ?> class="btn btn-outline-danger btn-sm">
                                                <i class="fa-regular fa-trash"></i></a>
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


<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>
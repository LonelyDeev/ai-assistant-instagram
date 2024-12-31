<?php $__env->startSection('content'); ?>
    <?php
        $tools_limit=[];
     if ($plan){
         $tools_limit=explode(',',$plan->tools_limit);
     }

    ?>
    <div class="mb-3">
        <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.all_tools')); ?>

            <strong class="btn btn-primary" style="font-size: 11px;"><?php echo e(count($tools_limit).' '.trans('labels.tools_active')); ?></strong>
        </h4>

        <small class="text-muted small-font-size"><?php echo e(trans('labels.all_tools_desc')); ?></small>
    </div>

    <?php echo $__env->make('admin.tools.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/tools/alltools.blade.php ENDPATH**/ ?>
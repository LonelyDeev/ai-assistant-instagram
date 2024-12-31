
<?php $__env->startSection('content'); ?>
<h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.privacy_policy')); ?></h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <?php if(!empty($getprivacypolicy)): ?>
                    <div class="cms-section my-3">
                     <?php echo $getprivacypolicy; ?>

                    </div>
                    <?php else: ?>
                    <?php echo $__env->make('admin.layout.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
       
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/other/privacypolicy.blade.php ENDPATH**/ ?>
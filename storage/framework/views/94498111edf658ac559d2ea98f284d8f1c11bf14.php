<?php $__env->startSection('content'); ?>

<div class="mb-3">
    <div class="row">
        <div class="col-5">
            <h5 class="text-uppercase"><?php echo e(trans('labels.about_us')); ?></h5>
        </div>

    </div>
   
</div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <div id="privacy-policy-three" class="privacy-policy">
                            <form action="<?php echo e(URL::to('admin/aboutus/update')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <textarea class="form-control" id="ckeditor" name="aboutus"><?php echo e(@$getaboutus); ?></textarea>
                                <?php $__errorArgs = ['aboutus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-group text-end my-2">
                                    <button
                                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                        class="btn btn-secondary "><?php echo e(trans('labels.save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/editor.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/cmspages/aboutus.blade.php ENDPATH**/ ?>
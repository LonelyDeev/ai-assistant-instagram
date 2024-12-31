
<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.change_password')); ?></h4>
</div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="<?php echo e(URL::to('/edit_password')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label class="form-label"><?php echo e(trans('labels.current_password')); ?><span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="current_password"
                                        value="<?php echo e(old('current_password')); ?>"
                                        placeholder="<?php echo e(trans('labels.current_password')); ?>" required>
                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label"><?php echo e(trans('labels.new_password')); ?><span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="new_password"
                                        value="<?php echo e(old('new_password')); ?>"
                                        placeholder="<?php echo e(trans('labels.new_password')); ?>" required>
                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label"><?php echo e(trans('labels.confirm_password')); ?><span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        value="<?php echo e(old('confirm_password')); ?>"
                                        placeholder="<?php echo e(trans('labels.confirm_password')); ?>" required>
                                    <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="">
                                <a href="<?php echo e(Auth::user()->type == 1 ? URL::to('admin/users') : URL::to('/index')); ?>" class="btn btn-outline-danger"><?php echo e(trans('labels.cancel')); ?></a>
                                <button
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/user/change_password.blade.php ENDPATH**/ ?>
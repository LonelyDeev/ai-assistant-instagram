<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->type == 1): ?>
<?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<div class="mb-3">
    <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.edit_profile')); ?></h4>
</div>
<?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="<?php echo e(Auth::user()->type == 1 ? URL::to('/admin/users/editprofile') : URL::to('/editprofile')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="form-label">کلید token</label>
                                <input type="text" class="form-control" disabled value="<?php echo e($user->token_key); ?>" placeholder="name" required>

                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo e($user->id); ?>" name="id">
                                <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name') ?: $user->name); ?>" placeholder="name" required>
                                <?php $__errorArgs = ['name'];
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
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> * </span></label>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email') ?: $user->email); ?>" placeholder="email" required>
                                <?php $__errorArgs = ['email'];
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
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
                                <input type="number" class="form-control" name="mobile" value="<?php echo e(old('mobile') ?: $user->mobile); ?>" placeholder="mobile" required>
                                <?php $__errorArgs = ['mobile'];
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
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.api_key')); ?><span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" style="text-align: left" name="apiKey" value="<?php echo e(old('apiKey') ?: $user->apiKey); ?>" placeholder="کلید Api" required>
                                <?php $__errorArgs = ['apiKey'];
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
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.image')); ?> (250 x 250) </label>
                                <input type="file" class="form-control" name="profile">
                                <img class="rounded-circle mt-2" src="<?php echo e(helper::image_path($user->image,'profile')); ?>" alt="" width="70" height="70">
                                <?php $__errorArgs = ['profile'];
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
                            <div class="form-group">
                                <a href="<?php echo e(Auth::user()->type == 1 ? URL::to('admin/users') : URL::to('/index')); ?>" class="btn btn-outline-danger"><?php echo e(trans('labels.cancel')); ?></a>
                                <button <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> class="btn btn-secondary "><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/user/edit_user.blade.php ENDPATH**/ ?>
    
    <?php $__env->startSection('content'); ?>
        <div class="wrapper">
            <section>
                <div class="row justify-content-center align-items-center g-0 w-100 ">
                    <div class="col-lg-6 col-sm-8 col-auto px-5" style="    margin: 50px 0;">
                        <div class="card box-shadow overflow-hidden border-0">
                            <div class="bg-primary-light">
                                <div class="row">
                                    <div class="col-7 d-flex align-items-center">
                                        <div class=" p-4">
                                            <h4 class="mb-1"><?php echo e(trans('labels.register')); ?></h4>
                                            <p class="fs-7"><?php echo e(trans('labels.get_free_account')); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo e(helper::image_path('login-img.png')); ?>" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form class="my-3" method="POST" action="<?php echo e(URL::to('/register_vendor')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="name" class="form-label"><?php echo e(trans('labels.name')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo e(old('name')); ?>" id="name"
                                                placeholder="<?php echo e(trans('labels.name')); ?>" required>
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
                                            <label for="email" class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?php echo e(old('email')); ?>" id="email"
                                                placeholder="<?php echo e(trans('labels.email')); ?>" required>
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
                                            <label for="mobile" class="form-label"><?php echo e(trans('labels.mobile')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="number" class="form-control" name="mobile"
                                                value="<?php echo e(old('mobile')); ?>" id="mobile"
                                                placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
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
                                            <label for="password" class="form-label"><?php echo e(trans('labels.password')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="password"
                                                value="<?php echo e(old('password')); ?>" id="password"
                                                placeholder="<?php echo e(trans('labels.password')); ?>" required>
                                            <?php $__errorArgs = ['password'];
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
                                            <label for="apiKey" class="form-label"><?php echo e(trans('labels.api_key')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="apiKey"
                                                   value="<?php echo e(old('apiKey')); ?>" id="apiKey"
                                                   placeholder="<?php echo e(trans('labels.api_key')); ?>" required>
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
                                            <p class="card-text mt-2 pt-1"><i class="feather icon-info mr-1 align-middle"></i><span class="text-info">برای دیافت کلید Apy، ابتدا باید در سایت  <a target='_blank' href='https://platform.openai.com/account/api-keys'>هوش مصنوعی</a> ثبت نام کنید.</span></p>

                                        </div>
                                        
                                    </div>

                                    <button class="btn btn-primary w-100 mb-3"
                                        type="submit"><?php echo e(trans('labels.register')); ?></button>
                                    <p class="fs-7 text-center mb-3"><?php echo e(trans('labels.already_have_an_account')); ?>

                                        <a href="<?php echo e(URL::to('/login')); ?>"
                                            class=" fw-semibold"><?php echo e(trans('labels.login')); ?></a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth_default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/auth/register.blade.php ENDPATH**/ ?>
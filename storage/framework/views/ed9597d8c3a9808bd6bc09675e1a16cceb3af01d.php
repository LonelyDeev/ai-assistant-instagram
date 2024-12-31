 <?php $__env->startSection('content'); ?>
        <div class="wrapper">
            <section>
                <div class="row justify-content-center align-items-center g-0 w-100 h-100vh">
                    <div class="col-xl-4 col-lg-6 col-sm-8 col-auto px-5">
                        <div class="card box-shadow overflow-hidden border-0">
                            <div class="bg-primary-light">
                                <div class="row">
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="p-4">
                                            <h4>تایید</h4>
                                            <p>جزئیات مورد نیاز را وارد کنید</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo e(helper::image_path('login-img.png')); ?>"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form method="POST" class="mt-5 mb-5 login-input" action="<?php echo e(route('user.checkVerifyCode')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                        <input id="verifyCode" type="number" class="form-control <?php $__errorArgs = ['verifyCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="verifyCode" value="<?php echo e(old('verifyCode')); ?>" required autocomplete="verifyCode" autofocus placeholder="کد تایید را وارد کنید">
                                    </div>
                                    <?php $__errorArgs = ['verifyCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary w-100">برسی کد تایید</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth_default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/auth/verifyCode.blade.php ENDPATH**/ ?>
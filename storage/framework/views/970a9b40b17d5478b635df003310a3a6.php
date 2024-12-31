<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <section>
            <div class="row justify-content-center align-items-center g-0 w-100 h-100vh">
                <div class="col-xl-4 col-lg-6 col-sm-8 col-auto px-5">
                    <div class="card box-shadow overflow-hidden border-0">
                        <div class="bg-primary-light">
                            <div class="row">
                                <div class="col-7 d-flex align-items-center">
                                    <div class=" p-4">
                                        <h4><?php echo e(trans('labels.welcome_back')); ?></h4>
                                        <p><?php echo e(trans('labels.sign_in_continue')); ?></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo e(helper::image_path('login-img.png')); ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form class="my-3" method="POST" action="<?php echo e(URL::to('/checklogin-1')); ?>">
                                <?php echo csrf_field(); ?>
                               
                                   <div class="form-group">
                                         <label for="email" class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                 class="text-danger"> * </span></label>
                                         <input type="email" class="form-control" name="email"
                                             placeholder="<?php echo e(trans('labels.email')); ?>" id="email" required>
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
                                         <label for="password" class="form-label"><?php echo e(trans('labels.password')); ?><span
                                                 class="text-danger"> * </span></label>
                                         <input type="password" class="form-control" name="password"
                                             placeholder="<?php echo e(trans('labels.password')); ?>" id="password" required>
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
                                  <div class="text-end">
                                         <a href="<?php echo e(URL::to('/forgotpassword')); ?>" class="text-muted fs-8 fw-500">
                                             <i
                                                 class="fa-solid fa-lock-keyhole mx-2 fs-7"></i><?php echo e(trans('labels.forgot_password')); ?>

                                         </a>
                                     </div>
                                <input type="hidden" class="form-control" name="type" value="admin">
                                <button class="btn btn-primary w-100 mt-3"
                                    type="submit"><?php echo e(trans('labels.login')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.auth_default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>
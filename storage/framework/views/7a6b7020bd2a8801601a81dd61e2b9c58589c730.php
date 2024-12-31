<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.subscribe_now')); ?></h4>

    </div>
    <?php if(session('getErrorMessage')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(session('getErrorMessage')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-secondary"><?php echo e($plan->name); ?></h5>
                    </div>
                    <div class="my-4">
                        <h2 class="mb-2"><?php echo e(helper::currency_formate($plan->price, '')); ?>

                            <?php if($plan->duration == 1): ?>
                                <span class="fs-7 text-muted">/
                                    <?php echo e(trans('labels.one_month')); ?></span>
                            <?php elseif($plan->duration == 2): ?>
                                <span class="fs-7 text-muted">/
                                    <?php echo e(trans('labels.three_month')); ?></span>
                            <?php elseif($plan->duration == 3): ?>
                                <span class="fs-7 text-muted">/
                                    <?php echo e(trans('labels.six_month')); ?></span>
                            <?php elseif($plan->duration == 4): ?>
                                <span class="fs-7 text-muted">/
                                    <?php echo e(trans('labels.one_year')); ?></span>
                            <?php endif; ?>
                        </h2>
                        <small class="text-muted text-center"><?php echo e($plan->description); ?></small>
                    </div>
                    <ul class="pb-5">
                        <?php
                            $features = explode('|', $plan->features);
                            $tools_limit = explode(',', $plan->tools_limit);
                        ?>
                        <li class="mb-2 d-flex d-none"> <i class="fa-regular fa-circle-check text-secondary "></i>
                            <span class="mx-2"><?php echo e(count($tools_limit)); ?> <?php echo e(trans('labels.tools_limit')); ?>

                            </span>
                        </li>

                        <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                            <span class="mx-2">
                                <?php echo e($plan->word_limit); ?> <?php echo e(trans('labels.word_limit')); ?></span>
                        </li>

                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($feature): ?>
                                <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i> <span
                                        class="mx-2"> <?php echo e($feature); ?> </span> </li>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 mb-3 payments">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4"><?php echo e(trans('labels.select_payment_method')); ?></h5>
                    <div class="row">
                        <?php $__currentLoopData = $paymentmethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $payment_type = strtolower($pmdata->payment_name);
                            ?>
                            <div class="col-sm-6">
                                <?php if($payment_type == 'zarinpal'): ?>
                                    <form id="zarinpal-form" method="post" action="<?php echo e(URL::to('/plan/buyplan/zarinpal')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?>
                                        <input name="plan_id" value="<?php echo e($plan->id); ?>" type="hidden">
                                <div class="input-group mb-3">

                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio"
                                            value="<?php echo e($pmdata->public_key); ?>" id="<?php echo e($payment_type); ?>"
                                            data-transaction-type="<?php echo e($payment_type); ?>"
                                            data-currency="<?php echo e($pmdata->currency); ?>"
                                            <?php if($payment_type == 'banktransfer'): ?> data-bank-name="<?php echo e($pmdata->bank_name); ?>"
                                                        data-account-holder-name="<?php echo e($pmdata->account_holder_name); ?>"
                                                        data-account-number="<?php echo e($pmdata->account_number); ?>"
                                                        data-bank-ifsc-code="<?php echo e($pmdata->bank_ifsc_code); ?>" <?php endif; ?>
                                            name="paymentmode">
                                    </div>
                                    <label for="<?php echo e($payment_type); ?>" class="d-flex align-items-center form-control">
                                        <img src="<?php echo e(helper::image_path($pmdata->image)); ?>"width="20" height="20"
                                            class="mx-2"alt="" srcset=""><?php echo e($pmdata->title); ?>

                                    </label>

                                </div>
                                <?php if($payment_type == 'zarinpal'): ?>
                                    </form>
                                <?php endif; ?>

                            <?php if($payment_type == 'stripe'): ?>
                                    <input type="hidden" name="stripe_public_key" id="stripe_public_key"
                                        value="<?php echo e($pmdata->public_key); ?>">
                                    <div class="stripe-form d-none">
                                        <div id="card-element"></div>
                                    </div>
                                    <div class="text-danger stripe_error mb-2"></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <span class="text-danger payment_error d-none"><?php echo e(trans('messages.select_atleast_one')); ?></span>
                    </div>
                    <button type="button" class="btn btn-secondary buy_now">
                        <?php echo e(trans('labels.checkout')); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalbankdetailsLabel"><?php echo e(trans('labels.bank_transfer')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="<?php echo e(URL::to('/plan/buyplan')); ?>" method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_type" id="modal_payment_type" class="form-control"
                            value="">
                        <input type="hidden" name="plan_id" id="modal_plan_id" class="form-control" value="">
                        <input type="hidden" name="amount" id="modal_amount" class="form-control" value="">
                        <p> <?php echo e(trans('labels.bank_name')); ?> : <span class="data-bank-name"></span></p>
                        <p> <?php echo e(trans('labels.account_holder_name')); ?> : <span class="data-account-holder-name"></span></p>
                        <p> <?php echo e(trans('labels.account_number')); ?> : <span class="data-account-number"></span></p>
                        <hr>
                        <div class="form-group col-md-12">
                            <label for="screenshot"> <?php echo e(trans('labels.screenshot')); ?> </label>
                            <div class="controls">
                                <input type="file" name="screenshot" id="screenshot"
                                    class="form-control  <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"> <?php echo e($message); ?> </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger"
                            data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('labels.save')); ?> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" name="price" id="price" value="<?php echo e($plan->price); ?>">
    <input type="hidden" name="plan_id" id="plan_id" value="<?php echo e($plan->id); ?>">
    <input type="hidden" name="user_name" id="user_name" value="<?php echo e(Auth::user()->name); ?>">
    <input type="hidden" name="user_email" id="user_email" value="<?php echo e(Auth::user()->email); ?>">
    <input type="hidden" name="user_mobile" id="user_mobile" value="<?php echo e(Auth::user()->mobile); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        var SITEURL = "<?php echo e(URL::to('')); ?>";
        var planlisturl = "<?php echo e(URL::to('/plan')); ?>";
        var buyurl = "<?php echo e(URL::to('/plan/buyplan')); ?>";
        var plan_name = "<?php echo e($plan->name); ?>";
        var plan_description = "<?php echo e($plan->description); ?>";

        var title = "<?php echo e(Str::limit(helper::appdata('')->web_title, 50)); ?>";
        var description = "Plan Subscription";
    </script>
    <script src="<?php echo e(url(env('ASSETPATHURL').'admin-assets/js/plan_payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/plan/plan_payment.blade.php ENDPATH**/ ?>
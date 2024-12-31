<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/payment/update')); ?>" method="POST" class="payments"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="accordion accordion-flush" id="accordionExample">
                            <?php
                                $i = 1;
                            ?>

                            <?php $__currentLoopData = $getpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pmdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $transaction_type = strtolower($pmdata->payment_name);
                                    $paymentname = $pmdata->payment_name;
                                    $image_tag_name = $transaction_type . '_image';
                                ?>
                                <input type="hidden" name="transaction_type[]" value="<?php echo e($pmdata->id); ?>">
                                <div
                                    class="accordion-item card rounded border mb-3 <?php echo e($transaction_type == 'cod' && Auth::user()->type == 1 ? 'd-none' : ''); ?> ">
                                    <h2 class="accordion-header" id="heading<?php echo e($transaction_type); ?>">
                                        <button class="<?php echo e(helper::appdata('')->web_layout == 2 ? 'accordion-button-rtl' : ''); ?> accordion-button rounded collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#targetto-<?php echo e($i); ?>-<?php echo e($transaction_type); ?>"
                                            aria-expanded="false"
                                            aria-controls="targetto-<?php echo e($i); ?>-<?php echo e($transaction_type); ?>">
                                            <?php if($transaction_type == 'cod'): ?>
                                                <b><?php echo e(trans('labels.cod')); ?></b>
                                            <?php elseif($transaction_type == 'razorpay'): ?>
                                                <b><?php echo e(trans('labels.razorpay')); ?></b>
                                            <?php elseif($transaction_type == 'stripe'): ?>
                                                <b><?php echo e(trans('labels.stripe')); ?></b>
                                            <?php elseif($transaction_type == 'flutterwave'): ?>
                                                <b><?php echo e(trans('labels.flutterwave')); ?></b>
                                            <?php elseif($transaction_type == 'paystack'): ?>
                                                <b><?php echo e(trans('labels.paystack')); ?></b>
                                            <?php elseif($transaction_type == 'banktransfer'): ?>
                                                <b><?php echo e(trans('labels.banktransfer')); ?></b>
                                            <?php elseif($transaction_type == 'zarinpal'): ?>
                                                <b><?php echo e(trans('labels.zarinpal')); ?></b>
                                            <?php elseif($transaction_type == 'mercadopago'): ?>
                                                <b><?php echo e(trans('labels.mercadopago')); ?></b>
                                            <?php endif; ?>
                                        </button>
                                    </h2>
                                    <div id="targetto-<?php echo e($i); ?>-<?php echo e($transaction_type); ?>"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="heading<?php echo e($transaction_type); ?>"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <?php if($transaction_type == 'banktransfer'): ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo e(trans('labels.bank_name')); ?><span class="text-danger"> *</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="bank_name"
                                                            placeholder="<?php echo e(trans('labels.bank_name')); ?>"
                                                            value="<?php echo e($pmdata->bank_name); ?>"
                                                            <?php echo e(Auth::user()->type == 1 ? 'required' : ''); ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            <?php echo e(trans('labels.account_holder_name')); ?><span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control"
                                                            name="account_holder_name"
                                                            placeholder="<?php echo e(trans('labels.account_holder_name')); ?>"
                                                            value="<?php echo e($pmdata->account_holder_name); ?>"
                                                            <?php echo e(Auth::user()->type == 1 ? 'required' : ''); ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo e(trans('labels.account_number')); ?><span class="text-danger"> *</span>
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="account_number"
                                                            placeholder="<?php echo e(trans('labels.account_number')); ?>"
                                                            value="<?php echo e($pmdata->account_number); ?>"
                                                            <?php echo e(Auth::user()->type == 1 ? 'required' : ''); ?>>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                                    <?php if($transaction_type == 'zarinpal'): ?>
                                                        <div class="col-md-6">
                                                            <p class="form-label"><?php echo e(trans('labels.environment')); ?></p>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="environment"
                                                                       id="<?php echo e($transaction_type); ?>_<?php echo e($key); ?>_environment"
                                                                       value="sandbox"
                                                                       <?php echo e($pmdata->environment == "sandbox" ? 'checked' : ''); ?> required>
                                                                <label class="form-check-label"
                                                                       for="<?php echo e($transaction_type); ?>_<?php echo e($key); ?>_environment">
                                                                    <?php echo e(trans('labels.sandbox')); ?> </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="environment"
                                                                       id="<?php echo e($transaction_type); ?>_<?php echo e($i); ?>_environment"
                                                                       value="normal"
                                                                       <?php echo e($pmdata->environment == "normal" ? 'checked' : ''); ?> required>
                                                                <label class="form-check-label"
                                                                       for="<?php echo e($transaction_type); ?>_<?php echo e($i); ?>_environment">
                                                                    <?php echo e(trans('labels.production')); ?> </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                                                            <input id="checkbox-switch-<?php echo e($transaction_type); ?>" type="checkbox" class="checkbox-switch" name="is_available[<?php echo e($transaction_type); ?>]" value="1" <?php echo e($pmdata->is_available == 1 ? 'checked' : ''); ?>>
                                                            <label for="checkbox-switch-<?php echo e($transaction_type); ?>" class="switch">
                                                                <span class="switch__circle"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__right"><?php echo e(trans('labels.on')); ?></span>
                                                                <span class="switch__left"><?php echo e(trans('labels.off')); ?></span>

                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"> <?php echo e(trans('labels.apiKey')); ?><span class="text-danger"> *</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="public_key"
                                                                       placeholder="<?php echo e(trans('labels.apiKey')); ?>"
                                                                       value="<?php echo e($pmdata->public_key); ?>"
                                                                    <?php echo e(Auth::user()->type == 1 ? 'required' : ''); ?>>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="image" class="form-label">
                                                                <?php echo e(trans('labels.image')); ?> </label>
                                                            <input type="file" class="form-control"
                                                                name="<?php echo e($image_tag_name); ?>">
                                                            <img src="<?php echo e(helper::image_path($pmdata->image)); ?>"
                                                                alt="" class="img-fluid rounded hw-50 mt-1">
                                                        </div>
                                                    </div>

                                                    <?php if($transaction_type != 'zarinpal'): ?>
                                                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                                                            <input id="checkbox-switch-<?php echo e($transaction_type); ?>" type="checkbox" class="checkbox-switch" name="is_available[<?php echo e($transaction_type); ?>]" value="1" <?php echo e($pmdata->is_available == 1 ? 'checked' : ''); ?>>
                                                            <label for="checkbox-switch-<?php echo e($transaction_type); ?>" class="switch">
                                                                <span class="switch__circle"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__right pr-2"><?php echo e(trans('labels.on')); ?></span>
                                                                <span class="switch__left pr-2"><?php echo e(trans('labels.off')); ?></span>
                                                            </label>
                                                        </div>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary" type="submit" ><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/payment/payment.blade.php ENDPATH**/ ?>
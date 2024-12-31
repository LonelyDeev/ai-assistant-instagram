<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/plan/save_plan')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="plan_name" value="<?php echo e(old('plan_name')); ?>"
                                    placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                <?php $__errorArgs = ['plan_name'];
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
                            <div class="col-sm-6 form-group">
                                <label class="form-label"><?php echo e(trans('labels.amount')); ?><span class="text-danger"> *</span></label>
                                <input type="text" class="form-control numbers_decimal" name="plan_price"
                                    value="<?php echo e(old('plan_price')); ?>" placeholder="<?php echo e(trans('labels.amount')); ?>" required>
                                <?php $__errorArgs = ['plan_price'];
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.duration_type')); ?></label>
                                    <select class="form-select type" name="type">
                                        <option value="1" <?php echo e(old('type') == '1' ? 'selected' : ''); ?>>
                                            <?php echo e(trans('labels.fixed')); ?></option>
                                        <option value="2" <?php echo e(old('type') == '2' ? 'selected' : ''); ?>>
                                            <?php echo e(trans('labels.custom')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['type'];
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
                                <div class="form-group 1 selecttype">
                                    <label class="form-label"><?php echo e(trans('labels.duration')); ?><span class="text-danger"> *
                                        </span></label>
                                    <select class="form-select" name="plan_duration">
                                        <option value="1"><?php echo e(trans('labels.one_month')); ?></option>
                                        <option value="2"><?php echo e(trans('labels.three_month')); ?></option>
                                        <option value="3"><?php echo e(trans('labels.six_month')); ?></option>
                                        <option value="4"><?php echo e(trans('labels.one_year')); ?></option>
                                        <option value="5"><?php echo e(trans('labels.lifetime')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['plan_duration'];
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
                                <div class="form-group 2 selecttype">
                                    <label class="form-label"><?php echo e(trans('labels.days')); ?><span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control numbers_only" name="plan_days" value="" placeholder="<?php echo e(trans('labels.days')); ?>">
                                    <?php $__errorArgs = ['plan_days'];
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
                                    <label class="form-label"><?php echo e(trans('labels.tools_limit')); ?><span class="text-danger"> *
                                    </span></label>
                                    <select class="form-select tools" name="tools_limit[]" multiple="true">
                                        <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tool->id); ?>"><?php echo e($tool->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                     <?php $__errorArgs = ['tools_limit'];
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
                                    <label class="form-label"><?php echo e(trans('labels.word_limit')); ?><span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control" name="word_limit" placeholder="<?php echo e(trans('labels.word_limit')); ?>" value="<?php echo e(old('word_limit')); ?>" required>
                                     <?php $__errorArgs = ['word_limit'];
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

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.features')); ?><span class="text-danger"> *
                                        </span></label>
                                    <div id="repeater">
                                        <div class="d-flex mb-2">
                                            <input type="text" class="form-control" name="plan_features[]"
                                                value="<?php echo e(old('plan_features[]')); ?>"
                                                placeholder="<?php echo e(trans('labels.features')); ?>" >
                                            <button type="button" class="btn btn-outline-secondary mx-2 btn-sm"
                                                id="addfeature">
                                                <i class="fa-regular fa-plus"></i>
                                            </button>
                                        </div>
                                        <?php $__errorArgs = ['plan_features'];
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
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.description')); ?><span class="text-danger"> *</span></label>
                                    <textarea class="form-control" rows="5" name="plan_description"
                                        placeholder="<?php echo e(trans('labels.description')); ?>" ><?php echo e(old('plan_description')); ?></textarea>
                                    <?php $__errorArgs = ['plan_description'];
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
                        </div>
                        <div class="form-group text-end">
                            <a href="<?php echo e(URL::to('admin/plan')); ?>" class="btn btn-outline-danger"><?php echo e(trans('labels.cancel')); ?></a>
                            <button <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> class="btn btn-secondary "><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . '/admin-assets/js/plan.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/plan/add_plan.blade.php ENDPATH**/ ?>
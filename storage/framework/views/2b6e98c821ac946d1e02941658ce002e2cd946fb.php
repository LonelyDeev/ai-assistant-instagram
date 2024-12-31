
        <form action="<?php echo e(URL::to('/admin/transaction')); ?> " class="col-7" method="get">
            <div class="row">
                <div class="col-12">
                    <div class="input-group ps-0 justify-content-end">
                      
                            <select class="form-select transaction-select" name="vendor">
                                <option value=""
                                    data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                    selected><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vendor->id); ?>"
                                        data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                        <?php echo e(request()->get('vendor') == $vendor->id ? 'selected' : ''); ?>>
                                        <?php echo e($vendor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                       
                        <div class="input-group-append px-1">
                            <input type="date" class="form-control rounded" name="startdate"
                                value="<?php echo e(request()->get('startdate')); ?>">
                        </div>
                        <div class="input-group-append px-1">
                            <input type="date" class="form-control rounded" name="enddate"
                                value="<?php echo e(request()->get('enddate')); ?>">
                        </div>
                        <div class="input-group-append px-1">
                            <button class="btn btn-primary rounded" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/transaction/admintransaction.blade.php ENDPATH**/ ?>
<form action="<?php echo e(URL::to('/transactions')); ?> " class="col-7" method="get">
    <div class="row">
        <div class="col-12">
            <div class="input-group ps-0 justify-content-end">
              
                    
               
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
</form><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/transaction/vendortransaction.blade.php ENDPATH**/ ?>
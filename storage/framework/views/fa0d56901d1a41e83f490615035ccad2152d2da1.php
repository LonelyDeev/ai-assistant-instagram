<div class="row">
    <?php
        $i = 1;
        $tools_limit=[];
        if ($plan){
            $tools_limit=explode(',',$plan->tools_limit);
        }

    ?>

    <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex " <?php if(!in_array($tool->id,$tools_limit)): ?> style="opacity: 0.3;" title="<?php echo e(trans('messages.InactiveTools')); ?>" <?php endif; ?>>
            <a <?php if(in_array($tool->id,$tools_limit)): ?> href="<?php echo e(URL::to('/content-' . $tool->slug)); ?>" <?php endif; ?>>
                <div class="card tools-card border-0 shadow w-100 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="<?php echo e(helper::image_path( $i++ . '.svg')); ?>" class="img-fluid rounded-circle" height="35" width="35" alt="">
                            <?php if(helper::appdata('')->web_layout == 2): ?>
                            <i class="fa-thin fa-arrow-up-left <?php echo e(session()->get('theme')=='dark' ? 'text-white' : 'text-muted'); ?>"></i>
                            <?php else: ?>
                            <i class="fa-thin fa-arrow-up-right <?php echo e(session()->get('theme')=='dark' ? 'text-white' : 'text-muted'); ?>"></i>
                            <?php endif; ?>

                        </div>
                        <div class="mt-2">
                            <p class="p-font"><?php echo e($tool->name); ?></p>
                            <small class="text-muted mt-1"><?php echo e($tool->description); ?></small>
                        </div>
                    </div>

                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/tools/tools.blade.php ENDPATH**/ ?>
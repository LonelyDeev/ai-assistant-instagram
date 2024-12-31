<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(session('getSuccessMessage')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('getSuccessMessage')); ?>

            </div>
        <?php endif; ?>


        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2"><?php echo e(trans('labels.word_generated')); ?></p>
                    <h3 class="text-black"><?php echo e(number_format($totalgeneratedword)); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2"><?php echo e(trans('labels.my_content')); ?></p>
                    <h3 class="text-black"><?php echo e($totalcontent); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2"><?php echo e(trans('labels.current_plan')); ?></p>
                    <h3 class="text-black"><?php echo e(@helper::plandetail(Auth::user()->plan_id)->name); ?>

                        <?php if(@helper::checkplan(Auth::user()->id)->original['status']==2): ?>
                            <small style="font-size: 13px;display: inline-block !important;" class="text-danger d-block"> (<?php echo e(@helper::checkplan(Auth::user()->id)->original['message']); ?>)</small>
                        <?php endif; ?>
                    </h3>

                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2"><?php echo e(trans('labels.words_left')); ?></p>
                    <h3 class="text-black"><?php echo e(number_format(@helper::wordcount(Auth::user()->id))); ?></h3>
                </div>
            </div>
        </div>
            <div class="col-xxl-12 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
                <div class="form-group">
                    <label class="form-label">کلید token</label>
                    <input type="text" class="form-control" disabled value="<?php echo e(Auth::user()->token_key); ?>" placeholder="name" required>

                </div>
            </div>
        <div class="my-3 d-md-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.popular_tools')); ?></h4>
                <small class="text-muted small-font-size"><?php echo e(trans('labels.popular_tools_desc')); ?></small>
            </div>
            <a href="<?php echo e(URL::to('/alltools')); ?>"
                class="btn <?php echo e(session()->get('theme') == "dark" ? 'btn-dark-theme' : 'btn-outline-primary'); ?> mt-2 mt-md-0"><?php echo e(trans('labels.all_tools')); ?>

                <?php if(helper::appdata('')->web_layout == 2): ?>
                <i class="fa-solid fa-arrow-left mx-1"></i>
                <?php else: ?>
                <i class="fa-solid fa-arrow-right mx-1"></i>
                <?php endif; ?>
            </a>
        </div>
    </div>
    <?php echo $__env->make('admin.tools.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aiwriter\resources\views/admin/index.blade.php ENDPATH**/ ?>
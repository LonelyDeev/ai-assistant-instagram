<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card blog-card h-100">
    <img src="<?php echo e(helper::image_path($blog->image)); ?>" class="img-fluid blog-image object-fit-cover" alt="">
    <div class="card-body blog-card-body">
        <div class="blog-date <?php echo e(helper::appdata('')->web_layout == 2 ? 'date' : 'date-left'); ?>"><?php echo e(DATE_FORMAT($blog->created_at, 'd-m-Y')); ?></div>
        <h5 class="card-title mt-3"><?php echo e(Str::limit($blog->title, 65)); ?></h5>
        <p class="card-text"><?php echo Str::limit($blog->description, 120); ?></p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center bg-white">
        <div>
            <p class="lh-1"><?php echo e(trans('labels.post_by')); ?><br>
            <p class="fw-bold"><?php echo e(trans('labels.admin')); ?></p>
            </p>
        </div>

        <a class="btn btn-sm <?php echo e(session()->get('theme') == "dark" ? 'btn-dark-theme' : 'btn-outline-primary'); ?> rounded-5 px-4 py-2"
            href="<?php echo e(URL::to('blogs/blogs-' . $blog->slug)); ?>">
            <?php echo e(trans('labels.read_more')); ?> 
            <?php if(helper::appdata('')->web_layout == 2): ?>
            <i class="fa-solid fa-arrow-left mx-1"></i>
           <?php else: ?>
            <i class="fa-solid fa-arrow-right mx-1"></i>
            <?php endif; ?>
        </a>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/front/blogs/list.blade.php ENDPATH**/ ?>
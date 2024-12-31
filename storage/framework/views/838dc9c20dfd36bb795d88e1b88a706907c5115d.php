
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div>
            <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.popular_blogs')); ?></h4>
            <p class="text-muted"><?php echo e(trans('labels.popular_blog_desc')); ?></p>
        </div>
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 mt-3">
                <div class="card blog-card h-100 w-100">
                    <img src="<?php echo e(helper::image_path($blog->image)); ?>" class="img-fluid blog-image object-fit-cover" alt="">
                    <div class="card-body blog-card-body">
                        <div class="blog-date <?php echo e(helper::appdata('')->web_layout == 2 ? 'date' : 'date-left'); ?>"><?php echo e(DATE_FORMAT($blog->created_at, 'd-m-Y')); ?></div>
                        <h5 class="card-title mt-3"><?php echo e(Str::limit($blog->title, 65)); ?></h5>
                        <p class="card-text"><?php echo Str::limit($blog->description, 120); ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center bg-white">
                        <div>
                            <p class="lh-1"><?php echo e(trans('labels.post_by')); ?>,
                                <br>
                            <p class="fw-bold text-black"><?php echo e(trans('labels.admin')); ?></p>
                            </p>
                        </div>

                        <a class="btn btn-sm btn-outline-primary rounded-5 px-4 py-2"
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
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex justify-content-center mt-3">
            <?php echo $blogs->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/front/blogs/blogslist.blade.php ENDPATH**/ ?>
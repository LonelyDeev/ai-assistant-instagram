<?php $__env->startSection('content'); ?>
    <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.my_content')); ?></h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><?php echo e($content['tools_info']->name); ?></h4>
                    <div>
                        <a href="javascript:void(0)"><i class="fa-solid fa-link text-muted mx-1" id="share"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e(trans('labels.share_link')); ?>"></i>  <span class="tooltiptext" id="myTooltip"></span></a>

                        <a href="<?php echo e(URL::to('/generatewordfile-'.Auth::user()->id)); ?>"><i class="fa-solid fa-file-word text-muted mx-1"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="<?php echo e(trans('labels.generate_wordfile')); ?>"></i></a>

                        <a href="<?php echo e(URL::to('/generatepdf-'.Auth::user()->id)); ?>"> <i class="fa-solid fa-file-pdf text-muted mx-1"
                                id="pdf" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="<?php echo e(trans('labels.generate_pdf')); ?>"></i> </a>

                       <a href="javascript:void(0)"><i class="fa-solid fa-copy text-muted mx-1" id="copybtn" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="<?php echo e(trans('labels.copy')); ?>"></i></a>
                        <i class="fa-solid fa-floppy-disk text-muted mx-1 d-none" id="content_save" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="<?php echo e(trans('labels.save')); ?>"></i>

                    </div>
                </div>

                <div class="card-body text">
                    <?php if($content->status=="end"): ?>
                        <div class="alert alert-success" role="alert">
                           محتوا شما تکمیل شده است!
                        </div>
                    <?php endif; ?>
                    <?php if($content->status=="waiting"): ?>
                        <div class="alert alert-warning" role="alert">
                           این محتوا در حال تکمیل است...
                        </div>
                    <?php endif; ?>
                    <?php if($content->status=="error"): ?>
                    <div class="alert alert-danger" role="alert">

                        این محتوا هنوز تکمیل نشده، و با خطا مواجه شده.
                        <br>
                        برای نوشتن مجدد محتوا با همین عنوان، مجددا درخواست جدیدی ثبت کنید.
                        <?php if($content->messages): ?>
                            <br>
                            متن خطا:
                            <br>
                            <p style="direction: ltr"><?php echo e($content->messages); ?></p>
                        <?php endif; ?>
                         با پشتیبانی تماس بگیرید.
                    </div>
                    <?php endif; ?>
                    <h1 style="font-size: 20px">عنوان محتوا: <?php echo e($content->title); ?></h1>
                        <?php if($content->image): ?>
                            <img class="mt-4" src="<?php echo e($content->image); ?>" width="100%">
                        <?php endif; ?>
                    <?php if($content->content): ?>
                        <h5 class="mt-4 mb-2">متن محتوا:</h5>
                            <p style="white-space: pre-wrap;"><?php echo $content->content; ?></p>

                        <?php else: ?>
                        <?php if($content->status=="waiting"): ?>
                            <p class="mt-4">
                                در حال تکمیل محتوا...
                            </p>

                        <?php endif; ?>
                    <?php endif; ?>

                        <?php if($content->gallery()->count()): ?>
                            <h5 class="mt-4 mb-4">تصویر های تولید شده:</h5>
                            <div class="row">
                                <?php $__currentLoopData = $content->gallery()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-xxl-4 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex ">
                                        <a target="_blank" href="<?php echo e(asset('storage/' . $image->image)); ?>"> <img src="<?php echo e(asset('storage/' . $image->image)); ?>" width="100%"></a>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                    <?php if($content->tools_slug=="artical-generator-pro"): ?>
                        <?php if($content->meta_title): ?>
                            <h5 class="mt-4">عنوان متا:</h5>
                            <p><?php echo e($content->meta_title); ?></p>
                        <?php endif; ?>

                      <?php if($content->meta_description): ?>
                                <h5 class="mt-4">توضیحات متا:</h5>
                                <p><?php echo e($content->meta_description); ?></p>
                      <?php endif; ?>

                    <?php if($content->gallery()): ?>
                            <h5 class="mt-4 mb-4">تصویر های تولید شده:</h5>
                        <?php $images=explode('[|]',$content->images) ?>
                        <div class="row">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex ">
                                    <a href="<?php echo e($image); ?>"> <img src="<?php echo e($image); ?>" width="100%"></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var sharelink = "<?php echo e(URL::to('/share/content-'.$content->id)); ?>";
        var content = $('.text').html();
    </script>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/contentdetail.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/mycontent/contentdetail.blade.php ENDPATH**/ ?>
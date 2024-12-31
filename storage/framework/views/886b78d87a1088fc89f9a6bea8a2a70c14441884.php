
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
                    <?php echo $content->content; ?>

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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/mycontent/contentdetail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.my_content')); ?></h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#normal" type="button" role="tab" aria-controls="home" aria-selected="true">معمولی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#ai" type="button" role="tab" aria-controls="profile" aria-selected="false">پیشرفته</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="normal" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                    <thead>
                                    <tr class="text-uppercase fw-500 <?php echo e(session()->get('theme') == "dark" ? 'text-white' : ''); ?>">
                                        <td class="text-center"><?php echo e(trans('labels.srno')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.title')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.tool_name')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.Creativity-level')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.word_count')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.status')); ?></td>
                                        <td class="text-center"><?php echo e(trans('labels.created_at')); ?></td>

                                        <td class="text-center"><?php echo e(trans('labels.action')); ?></td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                    ?>

                                    <?php $__currentLoopData = $allcontents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="fs-7 <?php echo e(session()->get('theme') == "dark" ? 'text-muted fw-bold' : ''); ?>">
                                            <td><?php
                                                    echo $i++;
                                                ?></td>
                                            <td><?php echo e($content->title); ?></td>
                                            <td class="text-center"><?php echo e($content['tools_info']->name); ?></td>
                                            <td class="text-center"><?php echo e(\App\helper\helper::Temperature($content->temperature)); ?></td>
                                            <td class="text-center"><?php echo e($content->count); ?></td>
                                            <td class="text-center">
                                                <?php if($content->status=="waiting"): ?>
                                                    <span class="badge text-bg-warning">در انتضار تکمیل محتوا</span>
                                                <?php elseif($content->status=="end"): ?>
                                                    <span class="badge text-bg-success">تکمیل شده</span>
                                                <?php elseif($content->status=="error"): ?>
                                                    <span class="badge text-bg-danger">در خواست با خطا مواجه شد</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center direction-rtl"><?php echo e(jdate($content->created_at)->format('Y-m-d')); ?></td>
                                            <td><a href="<?php echo e(URL::to('/mycontent/contentdetail-'.$content->id)); ?>" class="btn btn-outline-info btn-sm"><i
                                                        class="fa-regular fa-eye"></i></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ai" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                    <thead>
                                    <tr class="text-uppercase fw-500 <?php echo e(session()->get('theme') == "dark" ? 'text-white' : ''); ?>">
                                        <td class="text-center">#</td>
                                        <td class="text-center">عنوان</td>
                                        <td class="text-center">نامک</td>
                                        <td class="text-center">توضیحات</td>
                                        <td class="text-center">زبان</td>
                                        <td class="text-center">ایجاد شده در</td>
                                        <td class="text-center">کلمات</td>
                                        <td class="text-center">وضعیت</td>
                                        <td class="text-center"><?php echo e(trans('labels.action')); ?></td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                    ?>

                                    <?php $__currentLoopData = $allAiContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="fs-7 <?php echo e(session()->get('theme') == "dark" ? 'text-muted fw-bold' : ''); ?>">
                                            <td><?php
                                                    echo $i++;
                                                ?></td>
                                            <td><?php echo e($content->title); ?></td>
                                            <td><?php echo e($content->slug); ?></td>
                                            <td>
                                                <?php if($content->status=="error"): ?>
                                                    <span class="badge text-bg-info">اکنون میتوانید با این عنوان درخواست دیگری ثبت کنید</span>
                                                <?php else: ?>
                                                    <?php echo e($content->description); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e($content->language); ?></td>
                                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($content->created_at))); ?></td>
                                            <td class="text-center"><?php echo e($content->count); ?></td>
                                            <td class="text-center">
                                                <?php if($content->status=="waiting"): ?>
                                                    <span class="badge text-bg-warning">در انتضار تکمیل محتوا</span>
                                                <?php elseif($content->status=="end"): ?>
                                                    <span class="badge text-bg-success">تکمیل شده</span>
                                                <?php elseif($content->status=="error"): ?>
                                                    <span class="badge text-bg-danger">در خواست با خطا مواجه شد</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="<?php echo e(URL::to('/mycontent/contentdetail-'.$content->id)); ?>" class="btn btn-outline-info btn-sm"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <?php if(session()->has('success')): ?>

        <script>
            toastr.success('<?php echo e(session('success')); ?>');
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/mycontent/mycontent.blade.php ENDPATH**/ ?>
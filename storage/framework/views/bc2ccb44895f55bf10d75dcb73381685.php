<?php $__env->startSection('content'); ?>
 <?php if(Auth::user()->type == 1): ?>
    <?php echo $__env->make('admin.breadcrumb.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.subscription_plans')); ?></h4>
    <?php endif; ?>
    <div class="row">
        <?php if(count($allplan) > 0): ?>
            <?php $__currentLoopData = $allplan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plandata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-3">
                    <div class="card border-0 box-shadow h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-secondary"><?php echo e($plandata->name); ?></h5>
                                <?php if(Auth::user()->type == '1'): ?>
                                    <div>
                                        <a href="<?php echo e(URL::to('admin/plan/edit-' . $plandata->id)); ?>"> <i
                                                class="fa-regular fa-pen-to-square pe-2"></i> </a>
                                        <?php if(env('Environment') == 'sendbox'): ?>
                                            <a onclick="myFunction()"> <i class="fa-regular fa-trash"></i></a>
                                        <?php else: ?>
                                            <a onclick="statusupdate('<?php echo e(URL::to('admin/plan/delete-' . $plandata->id)); ?>')">
                                                <i class="fa-regular fa-trash"></i></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="my-4">
                                <h5 class="mb-2">
                                    <?php if($plandata->price!=0): ?>
                                        <?php echo e(helper::currency_formate($plandata->price, '')); ?>

                                    <?php else: ?>
                                                     رایگان
                                <?php endif; ?>
                                    <span class="fs-7 text-muted">/
                                        <?php if($plandata->plan_type == 1): ?>
                                            <?php if($plandata->duration == 1): ?>
                                                <?php echo e(trans('labels.one_month')); ?>

                                            <?php elseif($plandata->duration == 2): ?>
                                                <?php echo e(trans('labels.three_month')); ?>

                                            <?php elseif($plandata->duration == 3): ?>
                                                <?php echo e(trans('labels.six_month')); ?>

                                            <?php elseif($plandata->duration == 4): ?>
                                                <?php echo e(trans('labels.one_year')); ?>

                                            <?php elseif($plandata->duration == 5): ?>
                                                <?php echo e(trans('labels.lifetime')); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($plandata->plan_type == 2): ?>
                                            <?php echo e($plandata->days); ?> <?php echo e(trans('labels.days')); ?>

                                        <?php endif; ?>

                                    </span>
                                </h5>
                                <small class="text-muted text-center"><?php echo e(Str::limit($plandata->description, 150)); ?></small>
                            </div>
                            <ul>
                                <?php
                                    $features = explode('|', $plandata->features);
                                    $tools_limit = explode(',', $plandata->tools_limit);
                                ?>
                                    <li class="mb-2 d-flex <?php echo e(!count($tools_limit) ?: 'd-none'); ?>"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(count($tools_limit)); ?> <?php echo e(trans('labels.tools_limit')); ?>

                                         </span>
                                    </li>

                                <?php if($plandata->word_limit): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2">
                                        <?php echo e($plandata->word_limit); ?> <?php echo e(trans('labels.word_limit')); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($feature): ?>
                                        <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                            <span class="mx-2"> <?php echo e($feature); ?> </span>
                                        </li>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                        <div class="card-footer bg-white border-top-0 my-2 text-center">
                            <?php if(Auth::user()->type == '1'): ?>
                                <?php if(env('Environment') == 'sendbox'): ?>
                                    <?php if($plandata->is_available == 1): ?>
                                        <a onclick="myFunction()"
                                            class="btn btn-success  btn-sm w-100 mt-2"><?php echo e(trans('labels.active')); ?></a>
                                    <?php elseif($plandata->is_available == 2): ?>
                                        <a onclick="myFunction()"
                                            class="btn btn-danger w-100 btn-sm mt-2"><?php echo e(trans('labels.inactive')); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($plandata->is_available == 1): ?>
                                        <a onclick="statusupdate('<?php echo e(URL::to('admin/plan/status_change-' . $plandata->id . '/2')); ?>')"
                                            class="btn btn-success  btn-sm w-100 mt-2"><?php echo e(trans('labels.active')); ?></a>
                                    <?php elseif($plandata->is_available == 2): ?>
                                        <a onclick="statusupdate('<?php echo e(URL::to('admin/plan/status_change-' . $plandata->id . '/1')); ?>')"
                                            class="btn btn-danger w-100 btn-sm mt-2"><?php echo e(trans('labels.inactive')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(Auth::user()->plan_id == $plandata->id): ?>
                                    <?php
                                        $check_vendorplan = @helper::checkplan(Auth::user()->id, '');
                                        $data = json_decode(json_encode($check_vendorplan), true);
                                    ?>
                                    <?php if(@$data['original']['status'] == '2'): ?>
                                        <?php if($plandata->price > 0): ?>
                                            <?php if(@$plandata->duration == 5): ?>
                                                <small
                                                    class="text-success d-block"><span><?php echo e(@$data['original']['plan_message']); ?></span></small>
                                            <?php else: ?>
                                                <?php if(@$data['original']['plan_date'] > date('Y-m-d')): ?>
                                                    <small
                                                        class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?> d-block"><?php echo e(@$data['original']['plan_message']); ?>

                                                         <span
                                                            class="text-success"><?php echo e(@helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y')); ?></span></small>
                                                <?php else: ?>
                                                    <small
                                                        class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?> d-block"><?php echo e(@$data['original']['plan_message']); ?>

                                                         <span
                                                            class="text-danger"><?php echo e(@helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y')); ?></span></small>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(@$data['original']['showclick'] == 1): ?>
                                                <a href="<?php echo e(URL::to('/plan/selectplan-' . $plandata->id)); ?>"
                                                    class="btn btn-sm <?php echo e(session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'); ?> d-block mt-2"><?php echo e(trans('labels.buy_now')); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(@$data['original']['plan_date'] > date('Y-m-d')): ?>
                                                <small class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?> d-block"><?php echo e(@$data['original']['plan_message']); ?>

                                                    <span class="text-success">
                                                        <?php echo e(@helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y')); ?>

                                                    </span>
                                                </small>
                                            <?php else: ?>
                                                <small class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?> d-block"><?php echo e(@$data['original']['plan_message']); ?>

                                                    <span class="text-danger"> <?php echo e(@helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y')); ?></span>
                                                </small>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php elseif(@$data['original']['status'] == '1'): ?>
                                        <?php if(@$plandata->duration == 5): ?>
                                            <small class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?>"><span>
                                                    <?php echo e(@$data['original']['plan_message']); ?>

                                                </span></small>
                                        <?php else: ?>
                                            <?php if($data['original']['plan_date'] != ''): ?>
                                                <small class="<?php echo e(session()->get('theme') == "dark" ? 'text-white' : 'text-dark'); ?>">
                                                    <?php echo e(@$data['original']['plan_message']); ?>: <span
                                                        class="text-success"><?php echo e(@helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y')); ?></span>
                                                </small>
                                            <?php else: ?>
                                                <small class="text-success"><?php echo e(@$data['original']['plan_message']); ?></small>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($plandata->price > 0): ?>
                                        <a href="<?php echo e(URL::to('/plan/selectplan-' . $plandata->id)); ?>"
                                            class="btn btn-sm <?php echo e(session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'); ?> d-block"><?php echo e(trans('labels.buy_now')); ?></a>
                                    <?php elseif((float) Auth::user()->purchase_amount > $plandata->price): ?>
                                        <small class="text-danger d-block"><?php echo e(trans('labels.already_used')); ?></small>
                                    <?php else: ?>
                                        <a href="<?php echo e(URL::to('/plan/selectplan-' . $plandata->id)); ?>"
                                            class="btn btn-sm <?php echo e(session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'); ?> d-block"><?php echo e(trans('labels.select')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make('admin.layout.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/plan/plan.blade.php ENDPATH**/ ?>
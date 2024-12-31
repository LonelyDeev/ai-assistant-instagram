<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-5">
            <h4 class="fw-bold text-dark mb-1"><?php echo e(trans('labels.transactions')); ?></h4>
        </div>
        <?php if(Auth::user()->type == 1): ?>
            <?php echo $__env->make('admin.transaction.admintransaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('admin.transaction.vendortransaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500 <?php echo e(session()->get('theme') == "dark" ? 'text-white' : ''); ?>">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <?php if(Auth::user()->type == 1): ?>
                                        <td><?php echo e(trans('labels.name')); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e(trans('labels.plan')); ?></td>
                                    <td><?php echo e(trans('labels.amount')); ?></td>
                                    <td><?php echo e(trans('labels.payment_type')); ?></td>
                                    <td><?php echo e(trans('labels.purchase_date')); ?></td>
                                    <td><?php echo e(trans('labels.expire_date')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <?php if(Auth::user()->type == '1'): ?>
                                        <td><?php echo e(trans('labels.action')); ?></td>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 <?php echo e(session()->get('theme') == "dark" ? 'text-muted fw-bold' : ''); ?>">
                                        <td><?php
                                            echo $i++;
                                        ?></td>
                                        <?php if(Auth::user()->type == 1): ?>
                                            <td><?php echo e($transaction['vendor_info']->name); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e(@$transaction['plan_info']->name); ?></td>
                                        <td>
                                            <?php if($transaction->amount!=0): ?>
                                            <?php echo e(helper::currency_formate($transaction->amount, '')); ?>

                                            <?php else: ?>
                                                رایگان
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php echo e(trans('labels.' . $transaction->payment_type)); ?>

                                                : <small><a href="<?php echo e(helper::image_path($transaction->screenshot)); ?>"
                                                        target="_blank"
                                                        class="text-danger"><?php echo e(trans('labels.click_here')); ?></a></small>
                                            <?php elseif($transaction->payment_type != ''): ?>
                                                <?php echo e(trans('labels.' . $transaction->payment_type)); ?> :
                                                <?php echo e($transaction->payment_id); ?>

                                            <?php elseif($transaction->amount == 0): ?>
                                                -
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 2): ?>
                                                    <span
                                                        class="badge bg-success"><?php echo e(helper::date_formate($transaction->purchase_date)); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span
                                                    class="badge bg-success"><?php echo e(helper::date_formate($transaction->purchase_date)); ?></span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 2): ?>
                                                    <span
                                                        class="badge bg-danger"><?php echo e(helper::date_formate($transaction->expire_date)); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span
                                                    class="badge bg-danger"><?php echo e(helper::date_formate($transaction->expire_date)); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 1): ?>
                                                    <span class="badge bg-warning"><?php echo e(trans('labels.pending')); ?></span>
                                                <?php elseif($transaction->status == 2): ?>
                                                    <span class="badge bg-success"><?php echo e(trans('labels.accepted')); ?></span>
                                                <?php elseif($transaction->status == 3): ?>
                                                    <span class="badge bg-danger"><?php echo e(trans('labels.rejected')); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($transaction->status == 1): ?>
                                                    <span class="badge bg-warning"><?php echo e(trans('labels.pending')); ?></span>
                                                <?php elseif($transaction->status == 2): ?>
                                                    <span class="badge bg-success"><?php echo e(trans('labels.pay')); ?></span>
                                                <?php elseif($transaction->status == 3): ?>
                                                    <span class="badge bg-danger"><?php echo e(trans('labels.unpay')); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Auth::user()->type == '1'): ?>
                                            <td>
                                                <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                    <?php if($transaction->status == 1): ?>
                                                        <a class="btn btn-sm btn-outline-success"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-2')); ?>')"><i
                                                                class="fas fa-check"></i></a>
                                                        <a class="btn btn-sm btn-outline-danger"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-3')); ?>')"><i
                                                                class="fas fa-close"></i></a>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>

                                            </td>
                                        <?php endif; ?>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/transaction/transaction.blade.php ENDPATH**/ ?>
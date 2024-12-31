<?php $__env->startSection('content'); ?>
    <div class="row settings">
        <div class="d-flex align-items-center mb-3">
            <h5 class="text-uppercase"><?php echo e(trans('labels.setting')); ?></h5>
        </div>
        <div class="col-xl-3 mb-3">
            <div class="card card-sticky-top border-0">
                <ul class="list-group list-options">
                    <a href="#basicinfo" data-tab="basicinfo"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center active"
                        aria-current="true"><?php echo e(trans('labels.basic_info')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#editprofile" data-tab="editprofile"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true"><?php echo e(trans('labels.edit_profile')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#aiApi" data-tab="aiApi"
                       class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                       aria-current="true"><?php echo e(trans('labels.aiApi')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#sms_setting_panel" data-tab="sms_setting_panel"
                       class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                       aria-current="true"><?php echo e(trans('labels.sms_setting_panel')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#changepasssword" data-tab="changepasssword"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true"><?php echo e(trans('labels.change_password')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>

                </ul>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="settingmenuContent">
                <div id="basicinfo">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.basic_info')); ?></h5>
                                    </div>
                                    <form action="<?php echo e(URL::to('admin/add')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.currency_symbol')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="currency"
                                                    value="<?php echo e($settingdata->currency); ?>"
                                                    placeholder="<?php echo e(trans('labels.currency_symbol')); ?>" required>
                                                <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                      

                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(trans('labels.web_title')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="web_title"
                                                value="<?php echo e($settingdata->web_title); ?>"
                                                placeholder="<?php echo e(trans('labels.web_title')); ?>" required>
                                            <?php $__errorArgs = ['web_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(trans('labels.copyright')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="copyright"
                                                value="<?php echo e($settingdata->copyright); ?>"
                                                placeholder="<?php echo e(trans('labels.copyright')); ?>" required>
                                            <?php $__errorArgs = ['copyright'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.logo')); ?> (250 x 250)
                                                </label>
                                                <input type="file" class="form-control" name="logo">
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small> <br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="<?php echo e(helper::image_path($settingdata->logo)); ?>" alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.favicon')); ?> (16 x 16)
                                                </label>
                                                <input type="file" class="form-control" name="favicon">
                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small> <br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="<?php echo e(helper::image_path($settingdata->favicon)); ?>"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                            class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="editprofile">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.edit_profile')); ?></h5>
                                    </div>
                                    <form method="POST" action="<?php echo e(URL::to('/admin/edit-profile')); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.name')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo e(Auth::user()->name); ?>"
                                                    placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo e(Auth::user()->email); ?>"
                                                    placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"
                                                    for="mobile"><?php echo e(trans('labels.mobile')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="number" class="form-control" name="mobile" id="mobile"
                                                    value="<?php echo e(Auth::user()->mobile); ?>"
                                                    placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.image')); ?>

                                                    (250 x 250)</label>
                                                <input type="file" class="form-control" name="profile">
                                                <?php $__errorArgs = ['profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span> <br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="<?php echo e(helper::image_Path(Auth::user()->image)); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                            class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="aiApi">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.aiApi')); ?></h5>
                                    </div>
                                    <form action="<?php echo e(Url::to('/admin/set-api-ai')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.apiKey')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="aiApiKey"
                                                       value="<?php echo e($settingdata->aiApiKey); ?>"
                                                       placeholder="<?php echo e(trans('labels.apiKey')); ?>" required>
                                                <?php $__errorArgs = ['aiApiKey'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label">کلید API تولید تصویر (<a target="_blank" href="https://fal.ai/">سایت fal</a>)<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="imageAiApiKey"
                                                       value="<?php echo e($settingdata->imageAiApiKey); ?>"
                                                       placeholder="کلید API تولید تصویر" required>
                                                <?php $__errorArgs = ['imageAiApiKey'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sms_setting_panel">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.sms_setting_panel')); ?></h5>
                                    </div>
                                    <form method="POST" action="<?php echo e(URL::to('/admin/sms-setting-panel')); ?>"
                                          enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="form-label"><?php echo e(trans('labels.SMS_PANEL_USERNAME')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="SMS_PANEL_USERNAME"
                                                       value="<?php echo e(helper::appdata('')->SMS_PANEL_USERNAME); ?>"
                                                       placeholder="<?php echo e(trans('labels.SMS_PANEL_USERNAME')); ?>" required>
                                                <?php $__errorArgs = ['SMS_PANEL_USERNAME'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="form-label"><?php echo e(trans('labels.SMS_PANEL_PASSWORD')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="SMS_PANEL_PASSWORD"
                                                       value="<?php echo e(helper::appdata('')->SMS_PANEL_PASSWORD); ?>"
                                                       placeholder="<?php echo e(trans('labels.SMS_PANEL_PASSWORD')); ?>" required>
                                                <?php $__errorArgs = ['SMS_PANEL_PASSWORD'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="form-label"><?php echo e(trans('labels.SMS_PANEL_FROM')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="number" class="form-control" name="SMS_PANEL_FROM" id="SMS_PANEL_FROM"
                                                       value="<?php echo e(helper::appdata('')->SMS_PANEL_FROM); ?>"
                                                       placeholder="<?php echo e(trans('labels.SMS_PANEL_FROM')); ?>" required>
                                                <?php $__errorArgs = ['SMS_PANEL_FROM'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>

                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <h5 class="text-uppercase"><?php echo e(trans('labels.ippanel_patern_text')); ?></h5>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="form-label"><?php echo e(trans('labels.ippanel_send_code_pattern')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="ippanel_send_code_pattern"
                                                       value="<?php echo e(helper::appdata('')->ippanel_send_code_pattern); ?>"
                                                       placeholder="<?php echo e(trans('labels.ippanel_send_code_pattern')); ?>" required>
                                                <?php $__errorArgs = ['ippanel_send_code_pattern'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>



                                        </div>


                                        <div class="">
                                            <button
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                            class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="changepasssword">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.change_password')); ?></h5>
                                    </div>
                                    <form action="<?php echo e(Url::to('/admin/change-password')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label class="form-label"><?php echo e(trans('labels.current_password')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="current_password"
                                                    value="<?php echo e(old('current_password')); ?>"
                                                    placeholder="<?php echo e(trans('labels.current_password')); ?>" required>
                                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.new_password')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="new_password"
                                                    value="<?php echo e(old('new_password')); ?>"
                                                    placeholder="<?php echo e(trans('labels.new_password')); ?>" required>
                                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.confirm_password')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="confirm_password"
                                                    value="<?php echo e(old('confirm_password')); ?>"
                                                    placeholder="<?php echo e(trans('labels.confirm_password')); ?>" required>
                                                <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                            class="btn btn-secondary"><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/settings.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ai-writer-master\resources\views/admin/settings/settings.blade.php ENDPATH**/ ?>
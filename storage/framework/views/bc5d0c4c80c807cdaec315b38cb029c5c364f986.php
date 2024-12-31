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
                    <a href="#changepasssword" data-tab="changepasssword"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true"><?php echo e(trans('labels.change_password')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#seo" data-tab="seo"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true"><?php echo e(trans('labels.seo')); ?>

                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated): ?>
                        <a href="#google_analytics" data-tab="google_analytics"
                            class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                            aria-current="true"><?php echo e(trans('labels.google_analytics')); ?> <i
                                class="fa-regular fa-angle-right"></i></a>
                    <?php endif; ?>
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
                                            <div class="form-group col-sm-3">
                                                <p class="form-label"><?php echo e(trans('labels.currency_position')); ?><span
                                                        class="text-danger"> * </span>
                                                </p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-check-input-secondary"
                                                        type="radio" name="currency_position" id="radio"
                                                        value="1" checked
                                                        <?php echo e($settingdata->currency_position == '1' ? 'checked' : ''); ?> />
                                                    <label for="radio"
                                                        class="form-check-label"><?php echo e(trans('labels.left')); ?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-check-input-secondary"
                                                        type="radio" name="currency_position" id="radio1"
                                                        value="2"
                                                        <?php echo e($settingdata->currency_position == '2' ? 'checked' : ''); ?> />
                                                    <label for="radio1"
                                                        class="form-check-label"><?php echo e(trans('labels.right')); ?></label>
                                                </div>

                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="form-label"
                                                    for=""><?php echo e(trans('labels.maintenance_mode')); ?> </label>
                                                <input id="maintenance_mode-switch" type="checkbox"
                                                    class="checkbox-switch" name="maintenance_mode" value="1"
                                                    <?php echo e($settingdata->maintenance_mode == 1 ? 'checked' : ''); ?>>
                                                <label for="maintenance_mode-switch" class="switch">
                                                    <span class="switch__circle"><span
                                                            class="switch__circle-inner"></span></span>
                                                    <span class="switch__right pr-2"><?php echo e(trans('labels.on')); ?></span>
                                                    <span class="switch__left pr-2"><?php echo e(trans('labels.off')); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(trans('labels.time_zone')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <select class="form-select" name="timezone">
                                                <option <?php echo e(@$settingdata->timezone == 'Pacific/Midway' ? 'selected' : ''); ?>

                                                    value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Adak' ? 'selected' : ''); ?>

                                                    value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Etc/GMT+10' ? 'selected' : ''); ?>

                                                    value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Marquesas' ? 'selected' : ''); ?>

                                                    value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Gambier' ? 'selected' : ''); ?>

                                                    value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Anchorage' ? 'selected' : ''); ?>

                                                    value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Ensenada' ? 'selected' : ''); ?>

                                                    value="America/Ensenada">(GMT-08:00) Tijuana, Baja California

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Etc/GMT+8' ? 'selected' : ''); ?>

                                                    value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Los_Angeles' ? 'selected' : ''); ?>

                                                    value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Denver' ? 'selected' : ''); ?>

                                                    value="America/Denver">(GMT-07:00) Mountain Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Chihuahua' ? 'selected' : ''); ?>

                                                    value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz,
                                                    Mazatlan

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Dawson_Creek' ? 'selected' : ''); ?>

                                                    value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Belize' ? 'selected' : ''); ?>

                                                    value="America/Belize">(GMT-06:00) Saskatchewan, Central

                                                    America

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Cancun' ? 'selected' : ''); ?>

                                                    value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City,
                                                    Monterrey

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Chile/EasterIsland' ? 'selected' : ''); ?>

                                                    value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Chicago' ? 'selected' : ''); ?>

                                                    value="America/Chicago">(GMT-06:00) Central Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/New_York' ? 'selected' : ''); ?>

                                                    value="America/New_York">(GMT-05:00) Eastern Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Havana' ? 'selected' : ''); ?>

                                                    value="America/Havana">(GMT-05:00) Cuba</option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/Bogota' ? 'selected' : ''); ?>

                                                    value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio

                                                    Branco

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Caracas' ? 'selected' : ''); ?>

                                                    value="America/Caracas">(GMT-04:30) Caracas</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Santiago' ? 'selected' : ''); ?>

                                                    value="America/Santiago">(GMT-04:00) Santiago</option>
                                                <option <?php echo e(@$settingdata->timezone == 'America/La_Paz' ? 'selected' : ''); ?>

                                                    value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Atlantic/Stanley' ? 'selected' : ''); ?>

                                                    value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Campo_Grande' ? 'selected' : ''); ?>

                                                    value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Goose_Bay' ? 'selected' : ''); ?>

                                                    value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)
                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Glace_Bay' ? 'selected' : ''); ?>

                                                    value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)
                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/St_Johns' ? 'selected' : ''); ?>

                                                    value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Araguaina' ? 'selected' : ''); ?>

                                                    value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Montevideo' ? 'selected' : ''); ?>

                                                    value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Miquelon' ? 'selected' : ''); ?>

                                                    value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Godthab' ? 'selected' : ''); ?>

                                                    value="America/Godthab">(GMT-03:00) Greenland</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Argentina' ? 'selected' : ''); ?>

                                                    value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Sao_Paulo' ? 'selected' : ''); ?>

                                                    value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'America/Noronha' ? 'selected' : ''); ?>

                                                    value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Atlantic/Cape_Verde' ? 'selected' : ''); ?>

                                                    value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Atlantic/Azores' ? 'selected' : ''); ?>

                                                    value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/Belfast' ? 'selected' : ''); ?>

                                                    value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/Dublin' ? 'selected' : ''); ?>

                                                    value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/Lisbon' ? 'selected' : ''); ?>

                                                    value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/London' ? 'selected' : ''); ?>

                                                    value="Europe/London">(GMT) Greenwich Mean Time : London

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Africa/Abidjan' ? 'selected' : ''); ?>

                                                    value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Europe/Amsterdam' ? 'selected' : ''); ?>

                                                    value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern,
                                                    Rome,
                                                    Stockholm, Vienna</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Europe/Belgrade' ? 'selected' : ''); ?>

                                                    value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava,
                                                    Budapest,
                                                    Ljubljana, Prague</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Europe/Brussels' ? 'selected' : ''); ?>

                                                    value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen,
                                                    Madrid, Paris

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Africa/Algiers' ? 'selected' : ''); ?>

                                                    value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Africa/Windhoek' ? 'selected' : ''); ?>

                                                    value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Beirut' ? 'selected' : ''); ?>

                                                    value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Africa/Cairo' ? 'selected' : ''); ?>

                                                    value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Gaza' ? 'selected' : ''); ?>

                                                    value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Africa/Blantyre' ? 'selected' : ''); ?>

                                                    value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Jerusalem' ? 'selected' : ''); ?>

                                                    value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/Minsk' ? 'selected' : ''); ?>

                                                    value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Damascus' ? 'selected' : ''); ?>

                                                    value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Europe/Moscow' ? 'selected' : ''); ?>

                                                    value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg,
                                                    Volgograd

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Africa/Addis_Ababa' ? 'selected' : ''); ?>

                                                    value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Tehran' ? 'selected' : ''); ?>

                                                    value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Dubai' ? 'selected' : ''); ?>

                                                    value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Yerevan' ? 'selected' : ''); ?>

                                                    value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Kabul' ? 'selected' : ''); ?>

                                                    value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Yekaterinburg' ? 'selected' : ''); ?>

                                                    value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                <option value="Asia/Tashkent"
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Tashkent' ? 'selected' : ''); ?>>
                                                    (GMT+05:00) Tashkent</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Kolkata' ? 'selected' : ''); ?>

                                                    value="Asia/Kolkata">
                                                    (GMT+05:30) Chennai, Kolkata,
                                                    Mumbai, New Delhi</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Katmandu' ? 'selected' : ''); ?>

                                                    value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Dhaka' ? 'selected' : ''); ?>

                                                    value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Novosibirsk' ? 'selected' : ''); ?>

                                                    value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Rangoon' ? 'selected' : ''); ?>

                                                    value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Bangkok' ? 'selected' : ''); ?>

                                                    value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta

                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : ''); ?>

                                                    value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Krasnoyarsk' ? 'selected' : ''); ?>

                                                    value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Hong_Kong' ? 'selected' : ''); ?>

                                                    value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong

                                                    Kong,
                                                    Urumqi</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Irkutsk' ? 'selected' : ''); ?>

                                                    value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Perth' ? 'selected' : ''); ?>

                                                    value="Australia/Perth">(GMT+08:00) Perth</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Eucla' ? 'selected' : ''); ?>

                                                    value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Tokyo' ? 'selected' : ''); ?>

                                                    value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Seoul' ? 'selected' : ''); ?>

                                                    value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Yakutsk' ? 'selected' : ''); ?>

                                                    value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Adelaide' ? 'selected' : ''); ?>

                                                    value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Darwin' ? 'selected' : ''); ?>

                                                    value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Brisbane' ? 'selected' : ''); ?>

                                                    value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Hobart' ? 'selected' : ''); ?>

                                                    value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Asia/Vladivostok' ? 'selected' : ''); ?>

                                                    value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Australia/Lord_Howe' ? 'selected' : ''); ?>

                                                    value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Etc/GMT-11' ? 'selected' : ''); ?>

                                                    value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Magadan' ? 'selected' : ''); ?>

                                                    value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Norfolk' ? 'selected' : ''); ?>

                                                    value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                                                <option <?php echo e(@$settingdata->timezone == 'Asia/Anadyr' ? 'selected' : ''); ?>

                                                    value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Auckland' ? 'selected' : ''); ?>

                                                    value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington

                                                </option>
                                                <option <?php echo e(@$settingdata->timezone == 'Etc/GMT-12' ? 'selected' : ''); ?>

                                                    value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                                </option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Chatham' ? 'selected' : ''); ?>

                                                    value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Tongatapu' ? 'selected' : ''); ?>

                                                    value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                                <option
                                                    <?php echo e(@$settingdata->timezone == 'Pacific/Kiritimati' ? 'selected' : ''); ?>

                                                    value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                                            </select>
                                            <?php $__errorArgs = ['timezone'];
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
                <div id="seo">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="text-uppercase"><?php echo e(trans('labels.seo')); ?></h5>
                                    </div>
                                    <form action="<?php echo e(Url::to('/admin/og_image')); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.meta_title')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="meta_title"
                                                    value="<?php echo e($settingdata->meta_title); ?>"
                                                    placeholder="<?php echo e(trans('labels.meta_title')); ?>" required>
                                                <?php $__errorArgs = ['meta_title'];
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
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.meta_description')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <textarea class="form-control" name="meta_description" rows="3"
                                                    placeholder="<?php echo e(trans('labels.meta_description')); ?>" required><?php echo e($settingdata->meta_description); ?></textarea>
                                                <?php $__errorArgs = ['meta_description'];
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
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.og_image')); ?>

                                                    (1200 x 630) <span class="text-danger"> * </span></label>
                                                <input type="file" class="form-control" name="og_image">
                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="<?php echo e(helper::image_Path($settingdata->og_image)); ?>"
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
                <?php if(Auth::user()->type == 1 &&
                        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated): ?>
                    <div id="google_analytics">
                        <div class="row mb-5">
                            <div class="col-12">
                                <div class="card border-0 box-shadow">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <h5 class="text-uppercase"><?php echo e(trans('labels.google_analytics')); ?></h5>
                                        </div>
                                        <form method="POST" action="<?php echo e(Url::to('/admin/trackinginfo')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(trans('labels.tracking_id')); ?> <span class="text-danger"> * </span> </label>
                                                        <input type="text" class="form-control" name="tracking_id" required value="<?php echo e(@$settingdata->tracking_id); ?>">
                                                        <?php $__errorArgs = ['tracking_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(trans('labels.view_id')); ?> <span class="text-danger"> * </span> </label>
                                                        <input type="text" class="form-control" name="view_id" required value="<?php echo e(@$settingdata->view_id); ?>">
                                                        <?php $__errorArgs = ['view_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group text-end">
                                                    <button class="btn btn-secondary"
                                                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="updatetrackinginfo" value="1" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/js/settings.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\market.mrcode.ir-ai-writer-saas-v2.0\aiwriter\resources\views/admin/settings/settings.blade.php ENDPATH**/ ?>
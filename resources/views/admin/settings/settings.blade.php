@extends('admin.layout.default')
@section('content')
    <div class="row settings">
        <div class="d-flex align-items-center mb-3">
            <h5 class="text-uppercase">{{ trans('labels.setting') }}</h5>
        </div>
        <div class="col-xl-3 mb-3">
            <div class="card card-sticky-top border-0">
                <ul class="list-group list-options">
                    <a href="#basicinfo" data-tab="basicinfo"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center active"
                        aria-current="true">{{ trans('labels.basic_info') }}
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#editprofile" data-tab="editprofile"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true">{{ trans('labels.edit_profile') }}
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#aiApi" data-tab="aiApi"
                       class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                       aria-current="true">{{ trans('labels.aiApi') }}
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#sms_setting_panel" data-tab="sms_setting_panel"
                       class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                       aria-current="true">{{ trans('labels.sms_setting_panel') }}
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <a href="#changepasssword" data-tab="changepasssword"
                        class="list-group-item basicinfo p-3 list-item-secondary d-flex justify-content-between align-items-center"
                        aria-current="true">{{ trans('labels.change_password') }}
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
                                        <h5 class="text-uppercase">{{ trans('labels.basic_info') }}</h5>
                                    </div>
                                    <form action="{{ URL::to('admin/add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.currency_symbol') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="currency"
                                                    value="{{ $settingdata->currency }}"
                                                    placeholder="{{ trans('labels.currency_symbol') }}" required>
                                                @error('currency')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                      {{--  <div class="form-group">
                                            <label class="form-label">{{ trans('labels.time_zone') }}<span
                                                    class="text-danger"> * </span></label>
                                            <select class="form-select" name="timezone">
                                                <option {{ @$settingdata->timezone == 'Pacific/Midway' ? 'selected' : '' }}
                                                    value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa

                                                </option>
                                                <option {{ @$settingdata->timezone == 'America/Adak' ? 'selected' : '' }}
                                                    value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                                <option {{ @$settingdata->timezone == 'Etc/GMT+10' ? 'selected' : '' }}
                                                    value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Marquesas' ? 'selected' : '' }}
                                                    value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Gambier' ? 'selected' : '' }}
                                                    value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Anchorage' ? 'selected' : '' }}
                                                    value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Ensenada' ? 'selected' : '' }}
                                                    value="America/Ensenada">(GMT-08:00) Tijuana, Baja California

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Etc/GMT+8' ? 'selected' : '' }}
                                                    value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Los_Angeles' ? 'selected' : '' }}
                                                    value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option {{ @$settingdata->timezone == 'America/Denver' ? 'selected' : '' }}
                                                    value="America/Denver">(GMT-07:00) Mountain Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Chihuahua' ? 'selected' : '' }}
                                                    value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz,
                                                    Mazatlan

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Dawson_Creek' ? 'selected' : '' }}
                                                    value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                                                <option {{ @$settingdata->timezone == 'America/Belize' ? 'selected' : '' }}
                                                    value="America/Belize">(GMT-06:00) Saskatchewan, Central

                                                    America

                                                </option>
                                                <option {{ @$settingdata->timezone == 'America/Cancun' ? 'selected' : '' }}
                                                    value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City,
                                                    Monterrey

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Chile/EasterIsland' ? 'selected' : '' }}
                                                    value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Chicago' ? 'selected' : '' }}
                                                    value="America/Chicago">(GMT-06:00) Central Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/New_York' ? 'selected' : '' }}
                                                    value="America/New_York">(GMT-05:00) Eastern Time (US &amp;
                                                    Canada)
                                                </option>
                                                <option {{ @$settingdata->timezone == 'America/Havana' ? 'selected' : '' }}
                                                    value="America/Havana">(GMT-05:00) Cuba</option>
                                                <option {{ @$settingdata->timezone == 'America/Bogota' ? 'selected' : '' }}
                                                    value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio

                                                    Branco

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Caracas' ? 'selected' : '' }}
                                                    value="America/Caracas">(GMT-04:30) Caracas</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Santiago' ? 'selected' : '' }}
                                                    value="America/Santiago">(GMT-04:00) Santiago</option>
                                                <option {{ @$settingdata->timezone == 'America/La_Paz' ? 'selected' : '' }}
                                                    value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Atlantic/Stanley' ? 'selected' : '' }}
                                                    value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Campo_Grande' ? 'selected' : '' }}
                                                    value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Goose_Bay' ? 'selected' : '' }}
                                                    value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)
                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Glace_Bay' ? 'selected' : '' }}
                                                    value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)
                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/St_Johns' ? 'selected' : '' }}
                                                    value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Araguaina' ? 'selected' : '' }}
                                                    value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Montevideo' ? 'selected' : '' }}
                                                    value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Miquelon' ? 'selected' : '' }}
                                                    value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Godthab' ? 'selected' : '' }}
                                                    value="America/Godthab">(GMT-03:00) Greenland</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Argentina' ? 'selected' : '' }}
                                                    value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Sao_Paulo' ? 'selected' : '' }}
                                                    value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'America/Noronha' ? 'selected' : '' }}
                                                    value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }}
                                                    value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Atlantic/Azores' ? 'selected' : '' }}
                                                    value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                <option {{ @$settingdata->timezone == 'Europe/Belfast' ? 'selected' : '' }}
                                                    value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Europe/Dublin' ? 'selected' : '' }}
                                                    value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Europe/Lisbon' ? 'selected' : '' }}
                                                    value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Europe/London' ? 'selected' : '' }}
                                                    value="Europe/London">(GMT) Greenwich Mean Time : London

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Africa/Abidjan' ? 'selected' : '' }}
                                                    value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Europe/Amsterdam' ? 'selected' : '' }}
                                                    value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern,
                                                    Rome,
                                                    Stockholm, Vienna</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Europe/Belgrade' ? 'selected' : '' }}
                                                    value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava,
                                                    Budapest,
                                                    Ljubljana, Prague</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Europe/Brussels' ? 'selected' : '' }}
                                                    value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen,
                                                    Madrid, Paris

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Africa/Algiers' ? 'selected' : '' }}
                                                    value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Africa/Windhoek' ? 'selected' : '' }}
                                                    value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Beirut' ? 'selected' : '' }}
                                                    value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                <option {{ @$settingdata->timezone == 'Africa/Cairo' ? 'selected' : '' }}
                                                    value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Gaza' ? 'selected' : '' }}
                                                    value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Africa/Blantyre' ? 'selected' : '' }}
                                                    value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Jerusalem' ? 'selected' : '' }}
                                                    value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                <option {{ @$settingdata->timezone == 'Europe/Minsk' ? 'selected' : '' }}
                                                    value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Damascus' ? 'selected' : '' }}
                                                    value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                <option {{ @$settingdata->timezone == 'Europe/Moscow' ? 'selected' : '' }}
                                                    value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg,
                                                    Volgograd

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }}
                                                    value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Tehran' ? 'selected' : '' }}
                                                    value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Dubai' ? 'selected' : '' }}
                                                    value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Yerevan' ? 'selected' : '' }}
                                                    value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Kabul' ? 'selected' : '' }}
                                                    value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }}
                                                    value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                <option value="Asia/Tashkent"
                                                    {{ @$settingdata->timezone == 'Asia/Tashkent' ? 'selected' : '' }}>
                                                    (GMT+05:00) Tashkent</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Kolkata' ? 'selected' : '' }}
                                                    value="Asia/Kolkata">
                                                    (GMT+05:30) Chennai, Kolkata,
                                                    Mumbai, New Delhi</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Katmandu' ? 'selected' : '' }}
                                                    value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Dhaka' ? 'selected' : '' }}
                                                    value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }}
                                                    value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Rangoon' ? 'selected' : '' }}
                                                    value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Bangkok' ? 'selected' : '' }}
                                                    value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta

                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}
                                                    value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }}
                                                    value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }}
                                                    value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong

                                                    Kong,
                                                    Urumqi</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Irkutsk' ? 'selected' : '' }}
                                                    value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Perth' ? 'selected' : '' }}
                                                    value="Australia/Perth">(GMT+08:00) Perth</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Eucla' ? 'selected' : '' }}
                                                    value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Tokyo' ? 'selected' : '' }}
                                                    value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Seoul' ? 'selected' : '' }}
                                                    value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Yakutsk' ? 'selected' : '' }}
                                                    value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Adelaide' ? 'selected' : '' }}
                                                    value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Darwin' ? 'selected' : '' }}
                                                    value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Brisbane' ? 'selected' : '' }}
                                                    value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Hobart' ? 'selected' : '' }}
                                                    value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Asia/Vladivostok' ? 'selected' : '' }}
                                                    value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }}
                                                    value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Etc/GMT-11' ? 'selected' : '' }}
                                                    value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Asia/Magadan' ? 'selected' : '' }}
                                                    value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Norfolk' ? 'selected' : '' }}
                                                    value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                                                <option {{ @$settingdata->timezone == 'Asia/Anadyr' ? 'selected' : '' }}
                                                    value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Auckland' ? 'selected' : '' }}
                                                    value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington

                                                </option>
                                                <option {{ @$settingdata->timezone == 'Etc/GMT-12' ? 'selected' : '' }}
                                                    value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                                </option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Chatham' ? 'selected' : '' }}
                                                    value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }}
                                                    value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                                <option
                                                    {{ @$settingdata->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }}
                                                    value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                                            </select>
                                            @error('timezone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>--}}

                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.web_title') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="web_title"
                                                value="{{ $settingdata->web_title }}"
                                                placeholder="{{ trans('labels.web_title') }}" required>
                                            @error('web_title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.copyright') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="copyright"
                                                value="{{ $settingdata->copyright }}"
                                                placeholder="{{ trans('labels.copyright') }}" required>
                                            @error('copyright')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.logo') }} (250 x 250)
                                                </label>
                                                <input type="file" class="form-control" name="logo">
                                                @error('logo')
                                                    <small class="text-danger">{{ $message }}</small> <br>
                                                @enderror

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="{{ helper::image_path($settingdata->logo) }}" alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.favicon') }} (16 x 16)
                                                </label>
                                                <input type="file" class="form-control" name="favicon">
                                                @error('favicon')
                                                    <small class="text-danger">{{ $message }}</small> <br>
                                                @enderror

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="{{ helper::image_path($settingdata->favicon) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                            class="btn btn-secondary">{{ trans('labels.save') }}</button>
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
                                        <h5 class="text-uppercase">{{ trans('labels.edit_profile') }}</h5>
                                    </div>
                                    <form method="POST" action="{{ URL::to('/admin/edit-profile') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.name') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::user()->name }}"
                                                    placeholder="{{ trans('labels.name') }}" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.email') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}"
                                                    placeholder="{{ trans('labels.email') }}" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"
                                                    for="mobile">{{ trans('labels.mobile') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="number" class="form-control" name="mobile" id="mobile"
                                                    value="{{ Auth::user()->mobile }}"
                                                    placeholder="{{ trans('labels.mobile') }}" required>
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.image') }}
                                                    (250 x 250)</label>
                                                <input type="file" class="form-control" name="profile">
                                                @error('profile')
                                                    <span class="text-danger">{{ $message }}</span> <br>
                                                @enderror

                                                <img class="img-fluid rounded hw-70 mt-1"
                                                    src="{{ helper::image_Path(Auth::user()->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                            class="btn btn-secondary">{{ trans('labels.save') }}</button>
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
                                        <h5 class="text-uppercase">{{ trans('labels.aiApi') }}</h5>
                                    </div>
                                    <form action="{{ Url::to('/admin/set-api-ai') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.apiKey') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="aiApiKey"
                                                       value="{{ $settingdata->aiApiKey }}"
                                                       placeholder="{{ trans('labels.apiKey') }}" required>
                                                @error('aiApiKey')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label">کلید API تولید تصویر (<a target="_blank" href="https://fal.ai/">سایت fal</a>)<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="imageAiApiKey"
                                                       value="{{ $settingdata->imageAiApiKey }}"
                                                       placeholder="کلید API تولید تصویر" required>
                                                @error('imageAiApiKey')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-secondary">{{ trans('labels.save') }}</button>
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
                                        <h5 class="text-uppercase">{{ trans('labels.sms_setting_panel') }}</h5>
                                    </div>
                                    <form method="POST" action="{{ URL::to('/admin/sms-setting-panel') }}"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="form-label">{{ trans('labels.SMS_PANEL_USERNAME') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="SMS_PANEL_USERNAME"
                                                       value="{{ helper::appdata('')->SMS_PANEL_USERNAME }}"
                                                       placeholder="{{ trans('labels.SMS_PANEL_USERNAME') }}" required>
                                                @error('SMS_PANEL_USERNAME')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="form-label">{{ trans('labels.SMS_PANEL_PASSWORD') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="SMS_PANEL_PASSWORD"
                                                       value="{{ helper::appdata('')->SMS_PANEL_PASSWORD }}"
                                                       placeholder="{{ trans('labels.SMS_PANEL_PASSWORD') }}" required>
                                                @error('SMS_PANEL_PASSWORD')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="form-label">{{ trans('labels.SMS_PANEL_FROM') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="number" class="form-control" name="SMS_PANEL_FROM" id="SMS_PANEL_FROM"
                                                       value="{{ helper::appdata('')->SMS_PANEL_FROM }}"
                                                       placeholder="{{ trans('labels.SMS_PANEL_FROM') }}" required>
                                                @error('SMS_PANEL_FROM')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>

                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <h5 class="text-uppercase">{{ trans('labels.ippanel_patern_text') }}</h5>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="form-label">{{ trans('labels.ippanel_send_code_pattern') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="ippanel_send_code_pattern"
                                                       value="{{ helper::appdata('')->ippanel_send_code_pattern }}"
                                                       placeholder="{{ trans('labels.ippanel_send_code_pattern') }}" required>
                                                @error('ippanel_send_code_pattern')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>



                                        </div>


                                        <div class="">
                                            <button
                                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                            class="btn btn-secondary">{{ trans('labels.save') }}</button>
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
                                        <h5 class="text-uppercase">{{ trans('labels.change_password') }}</h5>
                                    </div>
                                    <form action="{{ Url::to('/admin/change-password') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label class="form-label">{{ trans('labels.current_password') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="current_password"
                                                    value="{{ old('current_password') }}"
                                                    placeholder="{{ trans('labels.current_password') }}" required>
                                                @error('current_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.new_password') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="new_password"
                                                    value="{{ old('new_password') }}"
                                                    placeholder="{{ trans('labels.new_password') }}" required>
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">{{ trans('labels.confirm_password') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="confirm_password"
                                                    value="{{ old('confirm_password') }}"
                                                    placeholder="{{ trans('labels.confirm_password') }}" required>
                                                @error('confirm_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="">
                                            <button
                                            @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                            class="btn btn-secondary">{{ trans('labels.save') }}</button>
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
@endsection

@section('scripts')
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/settings.js') }}"></script>
@endsection

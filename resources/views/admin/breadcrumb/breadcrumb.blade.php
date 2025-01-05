<div
    class="d-flex justify-content-between align-items-center {{ str_contains(request()->url(), 'add') || str_contains(request()->url(), 'edit') ? 'mb-3' : '' }} ">
    @if (str_contains(request()->url(), 'add'))
        <h5 class="text-uppercase">{{ trans('labels.add_new') }}</h5>
    @endif
    @if (str_contains(request()->url(), 'edit'))
        <h5 class="text-uppercase">{{ trans('labels.edit') }}</h5>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0 direction-ltr">
            {{-- <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">{{ trans('labels.dashboard') }}</a>
            </li> --}}
            @if (request()->is('admin/users'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.vendors') }}</h5>
                </li>
            @elseif (request()->is('admin/users/add') || str_contains(request()->url(), 'admin/users/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/users') }}">
                        {{ trans('labels.vendors') }}
                    </a>
                </li>
            @endif
            @if (request()->is('admin/plan'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.subscription_plans') }}</h5>
                </li>
            @elseif(request()->is('admin/plan/add') || str_contains(request()->url(), 'admin/plan/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/plan') }}">{{ trans('labels.subscription_plans') }}</a>
                </li>
            @endif
            @if (request()->is('admin/payment'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.payment') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/transaction'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.transactions') }}<h5>
                </li>
            @endif
            @if (request()->is('admin/settings'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.setting') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/categories'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.categories') }}</h5>
                </li>
            @elseif(request()->is('admin/categories/add') || str_contains(request()->url(), 'admin/categories/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/categories') }}">{{ trans('labels.categories') }}</a>
                </li>
            @endif
            @if (request()->is('admin/services'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.services') }}</h5>
                </li>
            @elseif(request()->is('admin/services/add') || str_contains(request()->url(), 'admin/services/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/services') }}">{{ trans('labels.services') }}</a>
                </li>
            @endif
            @if (request()->is('admin/workinghours*'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.workinghours') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/promocode'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.promocode') }}</h5>
                </li>
            @elseif(request()->is('admin/promocode/add') || str_contains(request()->url(), 'admin/promocode/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/promocode') }}">{{ trans('labels.promocode') }}</a>
                </li>
            @endif
            @php
                $url = '';
            @endphp
            @if (request()->is('admin/bannersection-1') ||
                    request()->is('admin/bannersection-2') ||
                    request()->is('admin/bannersection-3'))
             <li class="breadcrumb-item"><h5 class="text-uppercase">{{ @$title }}</h5></li>
            @elseif((str_contains(request()->url(), 'add') || str_contains(request()->url(), 'edit')) && str_contains(request()->url(), 'bannersection'))
                <li class="breadcrumb-item"><a href="{{ $table_url }}">{{ @$title }}</a></li>
            @endif
            @if (request()->is('admin/blogs'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.blogs') }}</h5>
                </li>
            @elseif(request()->is('admin/blogs/add') || str_contains(request()->url(), 'admin/blogs/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/blogs') }}">{{ trans('labels.blogs') }}</a>
                </li>
            @endif
            @if (request()->is('admin/faqs'))
            <li class="breadcrumb-item">
                <h5 class="text-uppercase">{{ trans('labels.faqs') }}</h5>
            </li>
        @elseif(request()->is('admin/faqs/add') || str_contains(request()->url(), 'admin/faqs/edit'))
            <li class="breadcrumb-item">
                <a href="{{ URL::to('/admin/faqs') }}">{{ trans('labels.faqs') }}</a>
            </li>
        @endif
            @if (request()->is('admin/bookings'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/bookings') }}">
                        <h5 class="text-uppercase">{{ trans('labels.bookings') }}</h5>
                    </a>
                </li>
            @endif
            @if (request()->is('admin/contacts'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.contacts') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/reports*'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.reports') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/privacypolicy'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.privacy_policy') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/termscondition'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.terms_condition') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/aboutus'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.about_us') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/custom_domain'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.custom_domain') }}</h5>
                </li>
            @elseif(request()->is('admin/custom_domain/add') || str_contains(request()->url(), 'admin/custom_domain/edit'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/custom_domain') }}">{{ trans('labels.custom_domain') }}</a>
                </li>
            @endif
            @if (request()->is('admin/apps'))
                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">{{ trans('labels.addons_manager') }}</h5>
                </li>
            @endif
            @if (request()->is('admin/apps/add'))
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('/admin/apps') }}">{{ trans('labels.addons_manager') }}</a>
                </li>
            @endif
            @if (str_contains(request()->url(), 'add'))
                <li class="breadcrumb-item active">{{ trans('labels.add') }}</li>
            @endif
            @if (str_contains(request()->url(), 'edit'))
                <li class="breadcrumb-item active">{{ trans('labels.edit') }}</li>
            @endif
            @if (str_contains(request()->url(), 'selectplan'))
                <li class="breadcrumb-item active">{{ trans('labels.buy_now') }}</li>
            @endif

            @if (str_contains(request()->url(), 'invoice'))
                <h5 class="text-uppercase">
                    <li class="breadcrumb-item active">{{ trans('labels.invoice') }}</li>
                </h5>
            @endif
        </ol>
    </nav>

    @if (request()->is('admin/apps'))
        <a href="{{ URL::to('admin/apps/add') }}" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.install_update_addons') }}</a>
    @endif
    @if (Auth::user()->type == 2)
        @if (request()->is('admin/custom_domain'))
            <a href="{{ URL::to('admin/custom_domain/add') }}"
                class="btn btn-secondary">{{ trans('labels.request_custom_domain') }}</a>
        @endif

        @if (request()->is('admin/transaction'))
            <form action="{{ URL::to('/admin/transaction') }} " class="col-7" method="get">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group ps-0 justify-content-end">
                            @if (Auth::user()->type == 1)
                                <select class="form-select transaction-select" name="vendor">
                                    <option value=""
                                        data-value="{{ URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                        selected>{{ trans('labels.select') }}</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}"
                                            data-value="{{ URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                            {{ request()->get('vendor') == $vendor->id ? 'selected' : '' }}>
                                            {{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <div class="input-group-append px-1">
                                <input type="date" class="form-control rounded" name="startdate"
                                    value="{{ request()->get('startdate') }}">
                            </div>
                            <div class="input-group-append px-1">
                                <input type="date" class="form-control rounded" name="enddate"
                                    value="{{ request()->get('enddate') }}">
                            </div>
                            <div class="input-group-append px-1">
                                <button class="btn btn-primary rounded"
                                    type="submit">{{ trans('labels.fetch') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    @endif

    @if (request()->is('admin/reports'))
        <form action="{{ URL::to('/admin/reports') }}">
            <div class="input-group col-md-12 ps-0">
                <div class="input-group-append col-auto px-1">
                    <input type="date" class="form-control rounded" name="startdate"
                        value="{{ request()->get('startdate') }}" required="">
                </div>

                <div class="input-group-append col-auto px-1">
                    <input type="date" class="form-control rounded" name="enddate"
                        value="{{ request()->get('enddate') }}" required="">
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary rounded" type="submit">{{ trans('labels.fetch') }}</button>
                </div>
            </div>
        </form>
    @endif
    @if (str_contains(request()->url(), 'add') ||
            str_contains(request()->url(), 'edit') ||
            request()->is('admin/payment') ||
            request()->is('admin/transaction') ||
            request()->is('admin/settings') ||
            request()->is('admin/workinghours*') ||
            request()->is('admin/bookings*') ||
            request()->is('admin/contacts') ||
            request()->is('admin/reports*') ||
            request()->is('admin/users') ||
            (request()->is('admin/plan*') && Auth::user()->type == 2))
        <a href="{{ URL::to(request()->url() . '/add') }}" class="btn btn-secondary px-2 d-none">
            <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}</a>
    @else
        <a href="{{ URL::to(request()->url() . '/add') }}" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}</a>
    @endif

</div>

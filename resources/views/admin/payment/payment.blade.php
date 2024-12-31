@extends('admin.layout.default')
@section('content')
    @include('admin.breadcrumb.breadcrumb')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ URL::to('admin/payment/update') }}" method="POST" class="payments"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="accordion accordion-flush" id="accordionExample">
                            @php
                                $i = 1;
                            @endphp

                            @foreach ($getpayment as $key => $pmdata)
                                @php
                                    $transaction_type = strtolower($pmdata->payment_name);
                                    $paymentname = $pmdata->payment_name;
                                    $image_tag_name = $transaction_type . '_image';
                                @endphp
                                <input type="hidden" name="transaction_type[]" value="{{ $pmdata->id }}">
                                <div
                                    class="accordion-item card rounded border mb-3 {{ $transaction_type == 'cod' && Auth::user()->type == 1 ? 'd-none' : '' }} ">
                                    <h2 class="accordion-header" id="heading{{ $transaction_type }}">
                                        <button class="{{helper::appdata('')->web_layout == 2 ? 'accordion-button-rtl' : ''}} accordion-button rounded collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#targetto-{{ $i }}-{{ $transaction_type }}"
                                            aria-expanded="false"
                                            aria-controls="targetto-{{ $i }}-{{ $transaction_type }}">
                                            @if ($transaction_type == 'cod')
                                                <b>{{ trans('labels.cod') }}</b>
                                            @elseif ($transaction_type == 'razorpay')
                                                <b>{{ trans('labels.razorpay') }}</b>
                                            @elseif ($transaction_type == 'stripe')
                                                <b>{{ trans('labels.stripe') }}</b>
                                            @elseif ($transaction_type == 'flutterwave')
                                                <b>{{ trans('labels.flutterwave') }}</b>
                                            @elseif ($transaction_type == 'paystack')
                                                <b>{{ trans('labels.paystack') }}</b>
                                            @elseif ($transaction_type == 'banktransfer')
                                                <b>{{ trans('labels.banktransfer') }}</b>
                                            @elseif ($transaction_type == 'zarinpal')
                                                <b>{{ trans('labels.zarinpal') }}</b>
                                            @elseif ($transaction_type == 'mercadopago')
                                                <b>{{ trans('labels.mercadopago') }}</b>
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="targetto-{{ $i }}-{{ $transaction_type }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $transaction_type }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                @if ($transaction_type == 'banktransfer')
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> {{ trans('labels.bank_name') }}<span class="text-danger"> *</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="bank_name"
                                                            placeholder="{{ trans('labels.bank_name') }}"
                                                            value="{{ $pmdata->bank_name }}"
                                                            {{ Auth::user()->type == 1 ? 'required' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            {{ trans('labels.account_holder_name') }}<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control"
                                                            name="account_holder_name"
                                                            placeholder="{{ trans('labels.account_holder_name') }}"
                                                            value="{{ $pmdata->account_holder_name }}"
                                                            {{ Auth::user()->type == 1 ? 'required' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> {{ trans('labels.account_number') }}<span class="text-danger"> *</span>
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="account_number"
                                                            placeholder="{{ trans('labels.account_number') }}"
                                                            value="{{ $pmdata->account_number }}"
                                                            {{ Auth::user()->type == 1 ? 'required' : '' }}>
                                                    </div>
                                                </div>

                                            @endif
                                                    @if ($transaction_type == 'zarinpal')
                                                        <div class="col-md-6">
                                                            <p class="form-label">{{ trans('labels.environment') }}</p>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="environment"
                                                                       id="{{ $transaction_type }}_{{ $key }}_environment"
                                                                       value="sandbox"
                                                                       {{ $pmdata->environment == "sandbox" ? 'checked' : '' }} required>
                                                                <label class="form-check-label"
                                                                       for="{{ $transaction_type }}_{{ $key }}_environment">
                                                                    {{ trans('labels.sandbox') }} </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="environment"
                                                                       id="{{ $transaction_type }}_{{ $i }}_environment"
                                                                       value="normal"
                                                                       {{ $pmdata->environment == "normal" ? 'checked' : '' }} required>
                                                                <label class="form-check-label"
                                                                       for="{{ $transaction_type }}_{{ $i }}_environment">
                                                                    {{ trans('labels.production') }} </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                                                            <input id="checkbox-switch-{{ $transaction_type }}" type="checkbox" class="checkbox-switch" name="is_available[{{ $transaction_type }}]" value="1" {{ $pmdata->is_available == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox-switch-{{ $transaction_type }}" class="switch">
                                                                <span class="switch__circle"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__right">{{ trans('labels.on') }}</span>
                                                                <span class="switch__left">{{ trans('labels.off') }}</span>

                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"> {{ trans('labels.apiKey') }}<span class="text-danger"> *</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="public_key"
                                                                       placeholder="{{ trans('labels.apiKey') }}"
                                                                       value="{{ $pmdata->public_key }}"
                                                                    {{ Auth::user()->type == 1 ? 'required' : '' }}>
                                                            </div>
                                                        </div>

                                                    @endif

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="image" class="form-label">
                                                                {{ trans('labels.image') }} </label>
                                                            <input type="file" class="form-control"
                                                                name="{{ $image_tag_name }}">
                                                            <img src="{{ helper::image_path($pmdata->image) }}"
                                                                alt="" class="img-fluid rounded hw-50 mt-1">
                                                        </div>
                                                    </div>

                                                    @if ($transaction_type != 'zarinpal')
                                                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                                                            <input id="checkbox-switch-{{ $transaction_type }}" type="checkbox" class="checkbox-switch" name="is_available[{{ $transaction_type }}]" value="1" {{ $pmdata->is_available == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox-switch-{{ $transaction_type }}" class="switch">
                                                                <span class="switch__circle"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__right pr-2">{{ trans('labels.on') }}</span>
                                                                <span class="switch__left pr-2">{{ trans('labels.off') }}</span>
                                                            </label>
                                                        </div>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary" type="submit" >{{ trans('labels.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

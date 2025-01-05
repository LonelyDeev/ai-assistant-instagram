@extends('admin.layout.default')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-dark mb-1">{{ trans('labels.subscribe_now') }}</h4>

    </div>
    @if(session('getErrorMessage'))
        <div class="alert alert-danger" role="alert">
            {{session('getErrorMessage')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-secondary">{{ $plan->name }}</h5>
                    </div>
                    <div class="my-4">
                        <h2 class="mb-2">{{ helper::currency_formate($plan->price, '') }}
                            @if ($plan->duration == 1)
                                <span class="fs-7 text-muted">/
                                    {{ trans('labels.one_month') }}</span>
                            @elseif($plan->duration == 2)
                                <span class="fs-7 text-muted">/
                                    {{ trans('labels.three_month') }}</span>
                            @elseif($plan->duration == 3)
                                <span class="fs-7 text-muted">/
                                    {{ trans('labels.six_month') }}</span>
                            @elseif($plan->duration == 4)
                                <span class="fs-7 text-muted">/
                                    {{ trans('labels.one_year') }}</span>
                            @endif
                        </h2>
                        <small class="text-muted text-center">{{ $plan->description }}</small>
                    </div>
                    <ul class="pb-5">
                        @php
                            $features = explode('|', $plan->features);
                            $tools_limit = explode(',', $plan->tools_limit);
                        @endphp
                        <li class="mb-2 d-flex d-none"> <i class="fa-regular fa-circle-check text-secondary "></i>
                            <span class="mx-2">{{ count($tools_limit) }} {{ trans('labels.tools_limit') }}
                            </span>
                        </li>

                        <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                            <span class="mx-2">
                                {{ $plan->word_limit }} {{ trans('labels.word_limit') }}</span>
                        </li>

                        @foreach ($features as $feature)
                            @if($feature)
                                <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i> <span
                                        class="mx-2"> {{ $feature }} </span> </li>

                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 mb-3 payments">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4">{{ trans('labels.select_payment_method') }}</h5>
                    <div class="row">
                        @foreach ($paymentmethod as $pmdata)
                            @php
                                $payment_type = strtolower($pmdata->payment_name);
                            @endphp
                            <div class="col-sm-6">
                                @if ($payment_type == 'zarinpal')
                                    <form id="zarinpal-form" method="post" action="{{ URL::to('/plan/buyplan/zarinpal') }}">
                                        @csrf
                                        @endif
                                        <input name="plan_id" value="{{$plan->id}}" type="hidden">
                                <div class="input-group mb-3">

                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="paymentmode"
                                            value="{{ $pmdata->public_key }}" id="{{ $payment_type }}"
                                            data-transaction-type="{{ $payment_type }}"
                                            data-currency="{{ $pmdata->currency }}"
                                            @if ($payment_type == 'banktransfer') data-bank-name="{{ $pmdata->bank_name }}"
                                                        data-account-holder-name="{{ $pmdata->account_holder_name }}"
                                                        data-account-number="{{ $pmdata->account_number }}"
                                                        data-bank-ifsc-code="{{ $pmdata->bank_ifsc_code }}" @endif >
                                    </div>
                                    <label for="{{ $payment_type }}" class="d-flex align-items-center form-control">
                                        <img src="{{ helper::image_path($pmdata->image) }}"width="20" height="20"
                                            class="mx-2"alt="" srcset="">{{ $pmdata->title }}
                                    </label>

                                </div>
                                @if ($payment_type == 'zarinpal')
                                    </form>
                                @endif

                            @if ($payment_type == 'stripe')
                                    <input type="hidden" name="stripe_public_key" id="stripe_public_key"
                                        value="{{ $pmdata->public_key }}">
                                    <div class="stripe-form d-none">
                                        <div id="card-element"></div>
                                    </div>
                                    <div class="text-danger stripe_error mb-2"></div>
                                @endif
                            </div>
                        @endforeach
                        <span class="text-danger payment_error d-none">{{ trans('messages.select_atleast_one') }}</span>
                    </div>
                    <button type="button" class="btn btn-secondary buy_now">
                        {{ trans('labels.checkout') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalbankdetailsLabel">{{ trans('labels.bank_transfer') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="{{ URL::to('/plan/buyplan') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="payment_type" id="modal_payment_type" class="form-control"
                            value="">
                        <input type="hidden" name="plan_id" id="modal_plan_id" class="form-control" value="">
                        <input type="hidden" name="amount" id="modal_amount" class="form-control" value="">
                        <p> {{ trans('labels.bank_name') }} : <span class="data-bank-name"></span></p>
                        <p> {{ trans('labels.account_holder_name') }} : <span class="data-account-holder-name"></span></p>
                        <p> {{ trans('labels.account_number') }} : <span class="data-account-number"></span></p>
                        <hr>
                        <div class="form-group col-md-12">
                            <label for="screenshot"> {{ trans('labels.screenshot') }} </label>
                            <div class="controls">
                                <input type="file" name="screenshot" id="screenshot"
                                    class="form-control  @error('screenshot') is-invalid @enderror" required>
                                @error('screenshot')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger"
                            data-bs-dismiss="modal">{{ trans('labels.close') }}</button>
                        <button type="submit" class="btn btn-primary"> {{ trans('labels.save') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" name="price" id="price" value="{{ $plan->price }}">
    <input type="hidden" name="plan_id" id="plan_id" value="{{ $plan->id }}">
    <input type="hidden" name="user_name" id="user_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="user_email" id="user_email" value="{{ Auth::user()->email }}">
    <input type="hidden" name="user_mobile" id="user_mobile" value="{{ Auth::user()->mobile }}">
@endsection
@section('scripts')
{{--
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/checkout.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/v3') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/inline.js') }}"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/v3.js') }}"></script>
--}}
    <script>
        var SITEURL = "{{ URL::to('') }}";
        var planlisturl = "{{ URL::to('/plan') }}";
        var buyurl = "{{ URL::to('/plan/buyplan') }}";
        var plan_name = "{{ $plan->name }}";
        var plan_description = "{{ $plan->description }}";

        var title = "{{ Str::limit(helper::appdata('')->web_title, 50) }}";
        var description = "Plan Subscription";
    </script>
    <script src="{{url(env('ASSETPATHURL').'admin-assets/js/plan_payment.js') }}"></script>
@endsection

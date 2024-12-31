@extends('admin.layout.default')
@section('content')
 @if(Auth::user()->type == 1)
    @include('admin.breadcrumb.breadcrumb')
    @else
    <h4 class="fw-bold text-dark mb-1">{{ trans('labels.subscription_plans') }}</h4>
    @endif
    <div class="row">
        @if (count($allplan) > 0)
            @foreach ($allplan as $plandata)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-3">
                    <div class="card border-0 box-shadow h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-secondary">{{ $plandata->name }}</h5>
                                @if (Auth::user()->type == '1')
                                    <div>
                                        <a href="{{ URL::to('admin/plan/edit-' . $plandata->id) }}"> <i
                                                class="fa-regular fa-pen-to-square pe-2"></i> </a>
                                        @if (env('Environment') == 'sendbox')
                                            <a onclick="myFunction()"> <i class="fa-regular fa-trash"></i></a>
                                        @else
                                            <a onclick="statusupdate('{{ URL::to('admin/plan/delete-' . $plandata->id) }}')">
                                                <i class="fa-regular fa-trash"></i></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <h5 class="mb-2">
                                    @if($plandata->price!=0)
                                        {{ helper::currency_formate($plandata->price, '') }}
                                    @else
                                                     رایگان
                                @endif
                                    <span class="fs-7 text-muted">/
                                        @if ($plandata->plan_type == 1)
                                            @if ($plandata->duration == 1)
                                                {{ trans('labels.one_month') }}
                                            @elseif($plandata->duration == 2)
                                                {{ trans('labels.three_month') }}
                                            @elseif($plandata->duration == 3)
                                                {{ trans('labels.six_month') }}
                                            @elseif($plandata->duration == 4)
                                                {{ trans('labels.one_year') }}
                                            @elseif($plandata->duration == 5)
                                                {{ trans('labels.lifetime') }}
                                            @endif
                                        @endif
                                        @if ($plandata->plan_type == 2)
                                            {{ $plandata->days }} {{ trans('labels.days') }}
                                        @endif

                                    </span>
                                </h5>
                                <small class="text-muted text-center">{{ Str::limit($plandata->description, 150) }}</small>
                            </div>
                            <ul>
                                @php
                                    $features = explode('|', $plandata->features);
                                    $tools_limit = explode(',', $plandata->tools_limit);
                                @endphp
                                    <li class="mb-2 d-flex {{!count($tools_limit) ?: 'd-none'}}"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2">{{count($tools_limit)}} {{trans('labels.tools_limit') }}
                                         </span>
                                    </li>

                                @if($plandata->word_limit)
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2">
                                        {{ $plandata->word_limit }} {{ trans('labels.word_limit') }}</span>
                                    </li>
                                @endif

                                @foreach ($features as $feature)
                                    @if($feature)
                                        <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                            <span class="mx-2"> {{ $feature }} </span>
                                        </li>
                                    @endif

                                @endforeach
                            </ul>

                        </div>
                        <div class="card-footer bg-white border-top-0 my-2 text-center">
                            @if (Auth::user()->type == '1')
                                @if (env('Environment') == 'sendbox')
                                    @if ($plandata->is_available == 1)
                                        <a onclick="myFunction()"
                                            class="btn btn-success  btn-sm w-100 mt-2">{{ trans('labels.active') }}</a>
                                    @elseif ($plandata->is_available == 2)
                                        <a onclick="myFunction()"
                                            class="btn btn-danger w-100 btn-sm mt-2">{{ trans('labels.inactive') }}</a>
                                    @endif
                                @else
                                    @if ($plandata->is_available == 1)
                                        <a onclick="statusupdate('{{ URL::to('admin/plan/status_change-' . $plandata->id . '/2') }}')"
                                            class="btn btn-success  btn-sm w-100 mt-2">{{ trans('labels.active') }}</a>
                                    @elseif ($plandata->is_available == 2)
                                        <a onclick="statusupdate('{{ URL::to('admin/plan/status_change-' . $plandata->id . '/1') }}')"
                                            class="btn btn-danger w-100 btn-sm mt-2">{{ trans('labels.inactive') }}</a>
                                    @endif
                                @endif
                            @else
                                @if (Auth::user()->plan_id == $plandata->id)
                                    @php
                                        $check_vendorplan = @helper::checkplan(Auth::user()->id, '');
                                        $data = json_decode(json_encode($check_vendorplan), true);
                                    @endphp
                                    @if (@$data['original']['status'] == '2')
                                        @if ($plandata->price > 0)
                                            @if (@$plandata->duration == 5)
                                                <small
                                                    class="text-success d-block"><span>{{ @$data['original']['plan_message'] }}</span></small>
                                            @else
                                                @if (@$data['original']['plan_date'] > date('Y-m-d'))
                                                    <small
                                                        class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}} d-block">{{ @$data['original']['plan_message'] }}
                                                         <span
                                                            class="text-success">{{ @helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y') }}</span></small>
                                                @else
                                                    <small
                                                        class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}} d-block">{{ @$data['original']['plan_message'] }}
                                                         <span
                                                            class="text-danger">{{ @helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y') }}</span></small>
                                                @endif
                                            @endif

                                            @if (@$data['original']['showclick'] == 1)
                                                <a href="{{ URL::to('/plan/selectplan-' . $plandata->id) }}"
                                                    class="btn btn-sm {{session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'}} d-block mt-2">{{ trans('labels.buy_now') }}</a>
                                            @endif
                                        @else
                                            @if (@$data['original']['plan_date'] > date('Y-m-d'))
                                                <small class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}} d-block">{{ @$data['original']['plan_message'] }}
                                                    <span class="text-success">
                                                        {{ @helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y') }}
                                                    </span>
                                                </small>
                                            @else
                                                <small class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}} d-block">{{ @$data['original']['plan_message'] }}
                                                    <span class="text-danger"> {{ @helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y') }}</span>
                                                </small>
                                            @endif
                                        @endif
                                    @elseif(@$data['original']['status'] == '1')
                                        @if (@$plandata->duration == 5)
                                            <small class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}}"><span>
                                                    {{ @$data['original']['plan_message'] }}
                                                </span></small>
                                        @else
                                            @if ($data['original']['plan_date'] != '')
                                                <small class="{{session()->get('theme') == "dark" ? 'text-white' : 'text-dark'}}">
                                                    {{ @$data['original']['plan_message'] }}: <span
                                                        class="text-success">{{ @helper::verta()->instance($data['original']['plan_date'])->format('d-m-Y') }}</span>
                                                </small>
                                            @else
                                                <small class="text-success">{{ @$data['original']['plan_message'] }}</small>
                                            @endif
                                        @endif

                                    @endif
                                @else
                                    @if ($plandata->price > 0)
                                        <a href="{{ URL::to('/plan/selectplan-' . $plandata->id) }}"
                                            class="btn btn-sm {{session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'}} d-block">{{ trans('labels.buy_now') }}</a>
                                    @elseif ((float) Auth::user()->purchase_amount > $plandata->price)
                                        <small class="text-danger d-block">{{ trans('labels.already_used') }}</small>
                                    @else
                                        <a href="{{ URL::to('/plan/selectplan-' . $plandata->id) }}"
                                            class="btn btn-sm {{session()->get('theme') == "dark" ?'btn-dark-theme' : 'btn-primary'}} d-block">{{ trans('labels.select') }}</a>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @include('admin.layout.no_data')
        @endif
    </div>

@endsection

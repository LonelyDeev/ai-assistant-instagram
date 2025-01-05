@extends('admin.layout.default')
@section('content')
    <div class="row">
        @if(session('getSuccessMessage'))
            <div class="alert alert-success" role="alert">
                {{session('getSuccessMessage')}}
            </div>
        @endif


        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">{{ trans('labels.word_generated') }}</p>
                    <h3 class="text-black">{{ number_format($totalgeneratedword) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">{{ trans('labels.my_content') }}</p>
                    <h3 class="text-black">{{ $totalcontent }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">{{ trans('labels.current_plan') }}</p>
                    <h3 class="text-black">{{ @helper::plandetail(Auth::user()->plan_id)->name }}
                        @if(@helper::checkplan(Auth::user()->id)->original['status']==2)
                            <small style="font-size: 13px;display: inline-block !important;" class="text-danger d-block"> ({{@helper::checkplan(Auth::user()->id)->original['message']}})</small>
                        @endif
                    </h3>

                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">{{ trans('labels.words_left') }}</p>
                    <h3 class="text-black">{{ number_format(@helper::wordcount(Auth::user()->id)) }}</h3>
                </div>
            </div>
        </div>

        <div class="my-3 d-md-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold text-dark mb-1">{{ trans('labels.popular_tools') }}</h4>
                <small class="text-muted small-font-size">{{ trans('labels.popular_tools_desc') }}</small>
            </div>
            <a href="{{ URL::to('/alltools') }}"
                class="btn {{session()->get('theme') == "dark" ? 'btn-dark-theme' : 'btn-outline-primary'}} mt-2 mt-md-0">{{ trans('labels.all_tools') }}
                @if (helper::appdata('')->web_layout == 2)
                <i class="fa-solid fa-arrow-left mx-1"></i>
                @else
                <i class="fa-solid fa-arrow-right mx-1"></i>
                @endif
            </a>
        </div>
    </div>
    @include('admin.tools.tools')

@endsection


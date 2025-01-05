@extends('admin.layout.default')
@section('content')
<h4 class="fw-bold text-dark mb-1">{{ trans('labels.privacy_policy') }}</h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    @if (!empty($getprivacypolicy))
                    <div class="cms-section my-3">
                     {!! $getprivacypolicy !!}
                    </div>
                    @else
                    @include('admin.layout.no_data')
                @endif
                </div>
            </div>
        </div>
       
    </div>
@endsection


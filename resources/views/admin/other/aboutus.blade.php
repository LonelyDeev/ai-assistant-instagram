@extends('admin.layout.default')
@section('content')
<h4 class="fw-bold text-dark mb-1">{{ trans('labels.about_us') }}</h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    @if (!empty($getaboutus))
                    <div class="cms-section my-3">
                     {!! $getaboutus !!}
                    </div>
                    @else
                    @include('admin.layout.no_data')
                @endif
                </div>
            </div>
        </div>
       
    </div>
@endsection


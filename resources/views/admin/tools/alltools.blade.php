@extends('admin.layout.default')
@section('content')
    @php
        $tools_limit=[];
     if ($plan){
         $tools_limit=explode(',',$plan->tools_limit);
     }

    @endphp
    <div class="mb-3">
        <h4 class="fw-bold text-dark mb-1">{{ trans('labels.all_tools') }}
            <strong class="btn btn-primary" style="font-size: 11px;">{{ count($tools_limit).' '.trans('labels.tools_active') }}</strong>
        </h4>

        <small class="text-muted small-font-size">{{ trans('labels.all_tools_desc') }}</small>
    </div>

    @include('admin.tools.tools')
@endsection

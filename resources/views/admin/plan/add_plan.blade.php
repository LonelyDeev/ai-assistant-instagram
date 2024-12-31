@extends('admin.layout.default')
@section('content')
    @include('admin.breadcrumb.breadcrumb')

    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/plan/save_plan') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="plan_name" value="{{ old('plan_name') }}"
                                    placeholder="{{ trans('labels.name') }}" required>
                                @error('plan_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="form-label">{{ trans('labels.amount') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control numbers_decimal" name="plan_price"
                                    value="{{ old('plan_price') }}" placeholder="{{ trans('labels.amount') }}" required>
                                @error('plan_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.duration_type') }}</label>
                                    <select class="form-select type" name="type">
                                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>
                                            {{ trans('labels.fixed') }}</option>
                                        <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>
                                            {{ trans('labels.custom') }}</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group 1 selecttype">
                                    <label class="form-label">{{ trans('labels.duration') }}<span class="text-danger"> *
                                        </span></label>
                                    <select class="form-select" name="plan_duration">
                                        <option value="1">{{ trans('labels.one_month') }}</option>
                                        <option value="2">{{ trans('labels.three_month') }}</option>
                                        <option value="3">{{ trans('labels.six_month') }}</option>
                                        <option value="4">{{ trans('labels.one_year') }}</option>
                                        <option value="5">{{ trans('labels.lifetime') }}</option>
                                    </select>
                                    @error('plan_duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group 2 selecttype">
                                    <label class="form-label">{{ trans('labels.days') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control numbers_only" name="plan_days" value="" placeholder="{{ trans('labels.days')}}">
                                    @error('plan_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans('labels.tools_limit')}}<span class="text-danger"> *
                                    </span></label>
                                    <select class="form-select tools" name="tools_limit[]" multiple="true">
                                        @foreach ($tools as $tool)
                                        <option value="{{$tool->id}}">{{$tool->name}}</option>
                                        @endforeach

                                    </select>
                                     @error('tools_limit')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <div class="form-group">
                                    <label class="form-label">{{trans('labels.word_limit')}}<span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control" name="word_limit" placeholder="{{ trans('labels.word_limit') }}" value="{{old('word_limit')}}" required>
                                     @error('word_limit')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                 </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.features') }}<span class="text-danger"> *
                                        </span></label>
                                    <div id="repeater">
                                        <div class="d-flex mb-2">
                                            <input type="text" class="form-control" name="plan_features[]"
                                                value="{{ old('plan_features[]') }}"
                                                placeholder="{{ trans('labels.features') }}" >
                                            <button type="button" class="btn btn-outline-secondary mx-2 btn-sm"
                                                id="addfeature">
                                                <i class="fa-regular fa-plus"></i>
                                            </button>
                                        </div>
                                        @error('plan_features')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.description') }}<span class="text-danger"> *</span></label>
                                    <textarea class="form-control" rows="5" name="plan_description"
                                        placeholder="{{ trans('labels.description') }}" >{{ old('plan_description') }}</textarea>
                                    @error('plan_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group text-end">
                            <a href="{{URL::to('admin/plan')}}" class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
                            <button @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif class="btn btn-secondary ">{{ trans('labels.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url(env('ASSETPATHURL') . '/admin-assets/js/plan.js') }}"></script>
@endsection

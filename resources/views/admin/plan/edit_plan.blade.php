@extends('admin.layout.default')
@section('content')
    @include('admin.breadcrumb.breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/plan/update_plan-' . $editplan->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control" name="plan_name" value="{{ $editplan->name }}"
                                    placeholder="{{ trans('labels.name') }}" required>
                                @error('plan_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="form-label">{{ trans('labels.amount') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control numbers_decimal" name="plan_price"
                                    value="{{ $editplan->price }}" placeholder="{{ trans('labels.price') }}" required>
                                @error('plan_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.duration_type') }}</label>
                                    <select class="form-select type" name="type">
                                        <option value="1" {{ $editplan->plan_type == '1' ? 'selected' : '' }}>
                                            {{ trans('labels.fixed') }}</option>
                                        <option value="2" {{ $editplan->plan_type == '2' ? 'selected' : '' }}>
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
                                        <option value="1" {{ $editplan->duration == 1 ? 'selected' : '' }}>
                                            {{ trans('labels.one_month') }}</option>
                                        <option value="2" {{ $editplan->duration == 2 ? 'selected' : '' }}>
                                            {{ trans('labels.three_month') }}</option>
                                        <option value="3" {{ $editplan->duration == 3 ? 'selected' : '' }}>
                                            {{ trans('labels.six_month') }}</option>
                                        <option value="4" {{ $editplan->duration == 4 ? 'selected' : '' }}>
                                            {{ trans('labels.one_year') }}</option>
                                        <option value="5" {{ $editplan->duration == 5 ? 'selected' : '' }}>
                                            {{ trans('labels.lifetime') }}</option>
                                    </select>
                                    @error('plan_duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group 2 selecttype">
                                    <label class="form-label">{{ trans('labels.days') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control numbers_only" name="plan_days"
                                        value="{{ $editplan->days }}">
                                    @error('plan_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.tools_limit') }}<span class="text-danger"> *
                                    </span></label>
                                    <select class="form-select tools" name="tools_limit[]" multiple="true">
                                        @php
                                            $tools_array = [];
                                            if ($editplan->tools_limit != ' ') {
                                                $tools_array = explode(',', $editplan->tools_limit);
                                            }
                                        @endphp
                                        @foreach ($tools as $tool)
                                                <option value="{{ $tool->id }}"
                                                    @foreach ($tools_array as $item)
                                                    {{ $tool->id == $item ?'selected' : '' }}
                                                    @endforeach
                                                   >  {{ $tool->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('tools_limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.word_limit') }}<span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control" name="word_limit"
                                        placeholder="{{ trans('labels.word_limit') }}" value="{{ $editplan->word_limit }}"
                                        required>
                                    @error('word_limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.features') }}<span class="text-danger">
                                            * </span></label>
                                    <div id="repeater">
                                        @php
                                            $new_array = [];
                                            if ($editplan->features != ' ') {
                                                $new_array = explode('|', $editplan->features);
                                            }
                                        @endphp
                                        @foreach ($new_array as $key => $features)
                                            <div class="d-flex mb-2" id="deletediv{{ $key }}">
                                                <input type="text" class="form-control" name="plan_features[]"
                                                    value="{{ $features }}"
                                                    placeholder="{{ trans('labels.features') }}" >
                                                @if ($key == 0)
                                                    <button type="button" class="btn btn-outline-secondary mx-2 btn-sm"
                                                        id="addfeature">
                                                        <i class="fa-regular fa-plus"></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger mx-2 btn-sm"
                                                        onclick="deletefeature({{ $key }})">
                                                        <i class="fa-regular fa-trash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        @endforeach
                                        @error('plan_features')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.description') }}<span class="text-danger"> *
                                        </span></label>
                                    <textarea class="form-control" rows="5" name="plan_description" placeholder="{{ trans('labels.description') }}"
                                        >{{ $editplan->description }}</textarea>
                                    @error('plan_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/plan') }}" class="btn btn-outline-danger">Cancel</a>
                            <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-secondary ">{{ trans('labels.save') }}</button>
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

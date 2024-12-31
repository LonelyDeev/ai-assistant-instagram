@extends('admin.layout.default')
@section('content')
<div class="mb-3">
    <h4 class="fw-bold text-dark mb-1">{{ trans('labels.change_password') }}</h4>
</div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{URL::to('/edit_password')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label class="form-label">{{ trans('labels.current_password') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="current_password"
                                        value="{{ old('current_password') }}"
                                        placeholder="{{ trans('labels.current_password') }}" required>
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">{{ trans('labels.new_password') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="new_password"
                                        value="{{ old('new_password') }}"
                                        placeholder="{{ trans('labels.new_password') }}" required>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">{{ trans('labels.confirm_password') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        value="{{ old('confirm_password') }}"
                                        placeholder="{{ trans('labels.confirm_password') }}" required>
                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="">
                                <a href="{{Auth::user()->type == 1 ? URL::to('admin/users') : URL::to('/index')}}" class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
                                <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-secondary">{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

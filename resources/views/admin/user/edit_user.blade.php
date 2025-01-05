@extends('admin.layout.default')
@section('content')
@if (Auth::user()->type == 1)
@include('admin.breadcrumb.breadcrumb')
@else
<div class="mb-3">
    <h4 class="fw-bold text-dark mb-1">{{ trans('labels.edit_profile') }}</h4>
</div>
@endif

        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{ Auth::user()->type == 1 ? URL::to('/admin/users/editprofile') : URL::to('/editprofile')  }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">کلید token</label>
                                <input type="text" class="form-control" disabled value="{{$user->token_key}}" placeholder="name" required>

                            </div>
                            <div class="form-group">
                                <input type="hidden" value="{{$user->id}}" name="id">
                                <label class="form-label">{{trans('labels.name')}}<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="name" value="{{old('name') ?: $user->name}}" placeholder="name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.email')}}<span class="text-danger"> * </span></label>
                                <input type="email" class="form-control" name="email" value="{{old('email') ?: $user->email}}" placeholder="email" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.mobile')}}<span class="text-danger"> * </span></label>
                                <input type="number" class="form-control" name="mobile" value="{{old('mobile') ?: $user->mobile}}" placeholder="mobile" required>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.api_key')}}<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" style="text-align: left" name="apiKey" value="{{old('apiKey') ?: $user->apiKey}}" placeholder="کلید Api" required>
                                @error('apiKey')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.image')}} (250 x 250) </label>
                                <input type="file" class="form-control" name="profile">
                                <img class="rounded-circle mt-2" src="{{helper::image_path($user->image,'profile')}}" alt="" width="70" height="70">
                                @error('profile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{Auth::user()->type == 1 ? URL::to('admin/users') : URL::to('/index')}}" class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
                                <button @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif class="btn btn-secondary ">{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

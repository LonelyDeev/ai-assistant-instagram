@extends('admin.layout.default')
@section('content')

<div class="mb-3">
    <h4 class="fw-bold text-dark mb-1">{{ trans('labels.fill_information_for_inquirey') }}</h4>
</div>

    
        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{  URL::to('/savecontact')  }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.name')}}<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="name" value="" placeholder="{{trans('labels.name')}}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.email')}}<span class="text-danger"> * </span></label>
                                <input type="email" class="form-control" name="email" value="" placeholder="{{trans('labels.email')}}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.mobile')}}<span class="text-danger"> * </span></label>
                                <input type="number" class="form-control" name="mobile" value="" placeholder="{{trans('labels.mobile')}}" required>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.message')}}<span class="text-danger"> * </span></label>
                                <textarea name="message" rows="5" class="form-control" placeholder="{{trans('labels.message')}}"></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('/index')}}" class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
                                <button @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif class="btn btn-secondary ">{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

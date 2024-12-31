@extends('admin.layout.default')
@section('content')
       @include('admin.breadcrumb.breadcrumb')
        <div class="row">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{URL::to('/admin/blogs/save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label">{{trans('labels.title')}}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="{{trans('labels.title')}}" required>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans('labels.description')}}<span class="text-danger"> * </span></label>
                                    <textarea class="form-control" name="description" id="ckeditor"  placeholder="{{trans('labels.description')}}" rows="5" required>{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
                                 <div class="form-group">
                                    <label class="form-label">{{trans('labels.image')}} (250 x 250) <span class="text-danger"> * </span></label>
                                    <input type="file" class="form-control" name="image" required>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/blogs') }}"
                                    class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/editor.js') }}"></script>
@endsection

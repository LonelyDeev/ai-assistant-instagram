@extends('admin.layout.default')
@section('content')
    <div class="d-flex justify-content-between align-items-center pb-4 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 direction-ltr">

                <li class="breadcrumb-item">
                    <h5 class="text-uppercase">افزودن ابزار جدید</h5>
                </li>

            </ol>
        </nav>




    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ route('admin.chatTool.update',$tool) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            @method('put')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- <div class="form-group">
                        <label class="form-label">کلید token</label>
                        <input type="text" class="form-control" disabled value="{{@$user->token_key}}" placeholder="name" required>

                    </div> --}}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name',$tool->name) }}"
                                        placeholder="" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Slug<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug',$tool->slug) }}"
                                        placeholder="" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Assistant id<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="assistant_id"
                                        value="{{ old('assistant_id',$tool->assistant_id) }}" placeholder="" required>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">وضعیت </label>
                                    <select class="form-select type" name="active">
                                        <option value="1" {{old('active',$tool->active)==1 ? 'selected' : ''}}>
                                            فعال </option>
                                        <option value="0" {{old('active',$tool->active)==0 ? 'selected' : ''}}>
                                            غیرفعال</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">توضیح</label>
                                    <textarea class="form-control" rows="5" name="description" placeholder="توضیح">{!! old('description',$tool->description) !!}</textarea>
                                </div>
                            </div>

                        </div>


                        <div class="form-group text-end">
                            <a href="{{ route('admin.chatTool.index') }}" class="btn btn-outline-danger">Cancel</a>
                            <button type="submit" class="btn btn-secondary ">ذخیره</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/user.js') }}"></script>
@endsection

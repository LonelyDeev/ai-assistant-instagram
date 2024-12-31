@extends('admin.layout.default')
@section('content')
<div class="mb-3">
    <div class="row">
        <div class="col-5">
            <h5 class="text-uppercase">{{ trans('labels.terms_condition') }}</h5>
        </div>
    </div>

</div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form action="{{ URL::to('admin/termscondition/update') }}" method="post">
                            @csrf
                            <textarea class="form-control" id="ckeditor" name="termscondition">{{ @$getterms }}</textarea>
                            @error('termscondition')
                                <span class="text-danger">{{ $message }}</span><br>
                            @enderror
                            <div class="form-group text-end my-2">
                                <button
                                    @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                    class="btn btn-secondary ">{{ trans('labels.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
<script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/editor.js') }}"></script>
@endsection

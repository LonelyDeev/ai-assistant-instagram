@extends('admin.layout.default')
@section('content')
    @include('admin.breadcrumb.breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td>{{ trans('labels.srno') }}</td>
                                    <td>{{ trans('labels.image') }}</td>
                                    <td>{{ trans('labels.title') }}</td>
                                    <td>{{ trans('labels.description') }}</td>
                                    <td>{{ trans('labels.action') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($blogs as $blog)
                                    <tr class="fs-7">
                                        <td>@php
                                            echo $i++;
                                        @endphp</td>
                                        <td><img src="{{ helper::image_path($blog->image) }}" class="img-fluid rounded hw-50" alt=""></td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{!! Str::limit($blog->description, 500) !!}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/blogs/edit-'.$blog->slug)}}" class="btn btn-outline-info btn-sm mx-1"> <i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="javascript:void(0)"  @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{URL::to('admin/blogs/delete-'.$blog->slug)}}')" @endif class="btn btn-outline-danger btn-sm">
                                                <i class="fa-regular fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/user.js') }}"></script>
@endsection


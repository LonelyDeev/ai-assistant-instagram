@extends('admin.layout.default')
@section('content')
    <div class="d-flex justify-content-between align-items-center  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 direction-ltr">
                <h5 class="text-uppercase">
                    لیست ابزار های چت بات ها
                 </h5>

            </ol>
        </nav>


        <a href="{{route('admin.chatTool.create')}}" class="btn btn-secondary px-2 d-flex">
            <i class="fa-regular fa-plus mx-1"></i>افزودن</a>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="text-uppercase fw-500">
                                    <td class="text-center">{{ trans('labels.srno') }}</td>
                                    <td class="text-center">Name</td>
                                    <td class="text-center">Slug</td>
                                    <td class="text-center">Assistant id</td>
                                    <td class="text-center">Status</td>
                                    <td class="text-center">Action</td>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($tools as $tool)
                                    <tr class="">
                                        <td>@php
                                            echo $i++;
                                        @endphp</td>

                                        <td>{{ $tool->name }}</td>
                                        <td>{{ $tool->slug }}</td>
                                        <td>{{ $tool->assistant_id }}</td>
                                        <td class="text-center">
                                            @if ($tool->active == '1')
                                            <i class="fa-regular fa-check"></i>
                                            @else
                                            <i class="fa-regular fa-xmark "></i>
                                            @endif
                                        </td>
                                        <td  class="text-center">
                                            <a href="{{route('admin.chatTool.edit',$tool)}}"
                                                class="btn btn-outline-info btn-sm"> <i
                                                    class="fa-regular fa-pen-to-square"></i>
                                            </a>
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

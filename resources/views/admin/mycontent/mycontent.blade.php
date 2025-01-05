@extends('admin.layout.default')
@section('content')
<h4 class="fw-bold text-dark mb-1">{{ trans('labels.my_content') }}</h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#normal" type="button" role="tab" aria-controls="home" aria-selected="true">معمولی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#ai" type="button" role="tab" aria-controls="profile" aria-selected="false">پیشرفته</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="normal" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                    <thead>
                                    <tr class="text-uppercase fw-500 {{session()->get('theme') == "dark" ? 'text-white' : ''}}">
                                        <td class="text-center">{{ trans('labels.srno') }}</td>
                                        <td class="text-center">{{ trans('labels.title') }}</td>
                                        <td class="text-center">{{trans('labels.tool_name')}}</td>
                                        <td class="text-center">{{trans('labels.Creativity-level')}}</td>
                                        <td class="text-center">{{trans('labels.word_count')}}</td>
                                        <td class="text-center">{{trans('labels.status')}}</td>
                                        <td class="text-center">{{trans('labels.created_at')}}</td>

                                        <td class="text-center">{{trans('labels.action')}}</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp

                                    @foreach ($allcontents as $content)
                                        <tr class="fs-7 {{session()->get('theme') == "dark" ? 'text-muted fw-bold' : ''}}">
                                            <td>@php
                                                    echo $i++;
                                                @endphp</td>
                                            <td>{{ $content->title }}</td>
                                            <td class="text-center">{{ $content['tools_info']->name }}</td>
                                            <td class="text-center">{{ \App\helper\helper::Temperature($content->temperature) }}</td>
                                            <td class="text-center">{{ $content->count }}</td>
                                            <td class="text-center">
                                                @if($content->status=="waiting")
                                                    <span class="badge text-bg-warning">در انتضار تکمیل محتوا</span>
                                                @elseif($content->status=="end")
                                                    <span class="badge text-bg-success">تکمیل شده</span>
                                                @elseif($content->status=="error")
                                                    <span class="badge text-bg-danger">در خواست با خطا مواجه شد</span>
                                                @endif
                                            </td>
                                            <td class="text-center direction-rtl">{{ jdate($content->created_at)->format('Y-m-d') }}</td>
                                            <td><a href="{{URL::to('/mycontent/contentdetail-'.$content->id)}}" class="btn btn-outline-info btn-sm"><i
                                                        class="fa-regular fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ai" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                    <thead>
                                    <tr class="text-uppercase fw-500 {{session()->get('theme') == "dark" ? 'text-white' : ''}}">
                                        <td class="text-center">#</td>
                                        <td class="text-center">عنوان</td>
                                        <td class="text-center">نامک</td>
                                        <td class="text-center">توضیحات</td>
                                        <td class="text-center">زبان</td>
                                        <td class="text-center">ایجاد شده در</td>
                                        <td class="text-center">کلمات</td>
                                        <td class="text-center">وضعیت</td>
                                        <td class="text-center">{{trans('labels.action')}}</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp

                                    @foreach ($allAiContents as $content)
                                        <tr class="fs-7 {{session()->get('theme') == "dark" ? 'text-muted fw-bold' : ''}}">
                                            <td>@php
                                                    echo $i++;
                                                @endphp</td>
                                            <td>{{ $content->title }}</td>
                                            <td>{{ $content->slug }}</td>
                                            <td>
                                                @if($content->status=="error")
                                                    <span class="badge text-bg-info">اکنون میتوانید با این عنوان درخواست دیگری ثبت کنید</span>
                                                @else
                                                    {{ $content->description }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $content->language }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($content->created_at)) }}</td>
                                            <td class="text-center">{{ $content->count }}</td>
                                            <td class="text-center">
                                                @if($content->status=="waiting")
                                                    <span class="badge text-bg-warning">در انتضار تکمیل محتوا</span>
                                                @elseif($content->status=="end")
                                                    <span class="badge text-bg-success">تکمیل شده</span>
                                                @elseif($content->status=="error")
                                                    <span class="badge text-bg-danger">در خواست با خطا مواجه شد</span>
                                                @endif
                                            </td>
                                            <td><a href="{{URL::to('/mycontent/contentdetail-'.$content->id)}}" class="btn btn-outline-info btn-sm"><i
                                                        class="fa-regular fa-eye"></i></a>
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
        </div>
    </div>
@endsection
@section('scripts')

    @if (session()->has('success'))

        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
@endsection

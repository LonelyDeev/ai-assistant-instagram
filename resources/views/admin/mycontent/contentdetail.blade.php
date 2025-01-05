@extends('admin.layout.default')
@section('content')
    <h4 class="fw-bold text-dark mb-1">{{ trans('labels.my_content') }}</h4>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $content['tools_info']->name }}</h4>
                    <div>
                        <a href="javascript:void(0)"><i class="fa-solid fa-link text-muted mx-1" id="share"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ trans('labels.share_link') }}"></i>  <span class="tooltiptext" id="myTooltip"></span></a>

                        <a href="{{ URL::to('/generatewordfile-'.Auth::user()->id) }}"><i class="fa-solid fa-file-word text-muted mx-1"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="{{ trans('labels.generate_wordfile') }}"></i></a>

                        <a href="{{ URL::to('/generatepdf-'.Auth::user()->id) }}"> <i class="fa-solid fa-file-pdf text-muted mx-1"
                                id="pdf" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="{{ trans('labels.generate_pdf') }}"></i> </a>

                       <a href="javascript:void(0)"><i class="fa-solid fa-copy text-muted mx-1" id="copybtn" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="{{ trans('labels.copy') }}"></i></a>
                        <i class="fa-solid fa-floppy-disk text-muted mx-1 d-none" id="content_save" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="{{ trans('labels.save') }}"></i>

                    </div>
                </div>

                <div class="card-body text">
                    @if($content->status=="end")
                        <div class="alert alert-success" role="alert">
                           محتوا شما تکمیل شده است!
                        </div>
                    @endif
                    @if($content->status=="waiting")
                        <div class="alert alert-warning" role="alert">
                           این محتوا در حال تکمیل است...
                        </div>
                    @endif
                    @if($content->status=="error")
                    <div class="alert alert-danger" role="alert">

                        این محتوا هنوز تکمیل نشده، و با خطا مواجه شده.
                        <br>
                        برای نوشتن مجدد محتوا با همین عنوان، مجددا درخواست جدیدی ثبت کنید.
                        @if($content->messages)
                            <br>
                            متن خطا:
                            <br>
                            <p style="direction: ltr">{{$content->messages}}</p>
                        @endif
                         با پشتیبانی تماس بگیرید.
                    </div>
                    @endif
                    <h1 style="font-size: 20px">عنوان محتوا: {{$content->title}}</h1>
                        @if($content->image)
                            <img class="mt-4" src="{{$content->image}}" width="100%">
                        @endif
                    @if($content->content)
                        <h5 class="mt-4 mb-2">متن محتوا:</h5>
                            <p style="white-space: pre-wrap;">{!! $content->content !!}</p>

                        @else
                        @if($content->status=="waiting")
                            <p class="mt-4">
                                در حال تکمیل محتوا...
                            </p>

                        @endif
                    @endif

                        @if($content->gallery()->count())
                            <h5 class="mt-4 mb-4">تصویر های تولید شده:</h5>
                            <div class="row">

                                @foreach($content->gallery()->get() as $image)

                                    <div class="col-xxl-4 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex ">
                                        <a target="_blank" href="{{asset($image->image)}}"> <img src="{{asset($image->image)}}" width="100%"></a>
                                    </div>

                                @endforeach
                            </div>
                        @endif

                    @if($content->tools_slug=="artical-generator-pro")
                        @if($content->meta_title)
                            <h5 class="mt-4">عنوان متا:</h5>
                            <p>{{$content->meta_title}}</p>
                        @endif

                      @if($content->meta_description)
                                <h5 class="mt-4">توضیحات متا:</h5>
                                <p>{{$content->meta_description}}</p>
                      @endif

                    @if($content->gallery())
                            <h5 class="mt-4 mb-4">تصویر های تولید شده:</h5>
                        <?php $images=explode('[|]',$content->images) ?>
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex ">
                                    <a href="{{$image}}"> <img src="{{$image}}" width="100%"></a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var sharelink = "{{URL::to('/share/content-'.$content->id)}}";
        var content = $('.text').html();
    </script>
    <script src="{{ url(env('ASSETPATHURL') . 'admin-assets/js/contentdetail.js') }}"></script>
@endsection

    @extends('admin.layout.auth_default')
    @section('content')
        <div class="wrapper">
            <section>
                <div class="row justify-content-center align-items-center g-0 w-100 ">
                    <div class="col-lg-6 col-sm-8 col-auto px-5" style="    margin: 50px 0;">
                        <div class="card box-shadow overflow-hidden border-0">
                            <div class="bg-primary-light">
                                <div class="row">
                                    <div class="col-7 d-flex align-items-center">
                                        <div class=" p-4">
                                            <h4 class="mb-1">{{ trans('labels.register') }}</h4>
                                            <p class="fs-7">{{ trans('labels.get_free_account') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ helper::image_path('login-img.png') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form class="my-3" method="POST" action="{{ URL::to('/register_vendor') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="name" class="form-label">{{ trans('labels.name') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" id="name"
                                                placeholder="{{ trans('labels.name') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">{{ trans('labels.email') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" id="email"
                                                placeholder="{{ trans('labels.email') }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile" class="form-label">{{ trans('labels.mobile') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="number" class="form-control" name="mobile"
                                                value="{{ old('mobile') }}" id="mobile"
                                                placeholder="{{ trans('labels.mobile') }}" required>
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">{{ trans('labels.password') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="password"
                                                value="{{ old('password') }}" id="password"
                                                placeholder="{{ trans('labels.password') }}" required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="apiKey" class="form-label">{{ trans('labels.api_key') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="apiKey"
                                                   value="{{ old('apiKey') }}" id="apiKey"
                                                   placeholder="{{ trans('labels.api_key') }}" required>
                                            @error('apiKey')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p class="card-text mt-2 pt-1"><i class="feather icon-info mr-1 align-middle"></i><span class="text-info">برای دیافت کلید Apy، ابتدا باید در سایت  <a target='_blank' href='https://platform.openai.com/account/api-keys'>هوش مصنوعی</a> ثبت نام کنید.</span></p>

                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="basic-url" class="form-label">{{ trans('labels.personlized_link') }}</label>
                                            <div class="input-group">
                                              <span class="input-group-text">{{ URL::to('/')}}</span>
                                              <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug')}}" required>
                                            </div>
                                            @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </div>

                                    <button class="btn btn-primary w-100 mb-3"
                                        type="submit">{{ trans('labels.register') }}</button>
                                    <p class="fs-7 text-center mb-3">{{ trans('labels.already_have_an_account') }}
                                        <a href="{{ URL::to('/login') }}"
                                            class=" fw-semibold">{{ trans('labels.login') }}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

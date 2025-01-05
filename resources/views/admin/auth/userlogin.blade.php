@extends('admin.layout.auth_default')
@section('content')
    <div class="wrapper">
        <section>
            <div class="row justify-content-center align-items-center g-0 w-100 h-100vh">
                <div class="col-xl-4 col-lg-6 col-sm-8 col-auto px-5">
                    <div class="card box-shadow overflow-hidden border-0">
                        <div class="bg-primary-light">
                            <div class="row">
                                <div class="col-7 d-flex align-items-center">
                                    <div class=" p-4">
                                        <h4>{{ trans('labels.welcome_back') }}</h4>
                                        <p>{{ trans('labels.sign_in_continue') }}</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ helper::image_path('login-img.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form class="my-3" method="POST" action="{{ route('user.checkLoginMobile') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="mobile" class="form-label">{{ trans('labels.mobile') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="mobile"
                                           placeholder="{{ trans('labels.mobile') }}" id="mobile" required>
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                              {{-- <div class="form-group">
                                    <label for="email" class="form-label">{{ trans('labels.email') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="{{ trans('labels.email') }}" id="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">{{ trans('labels.password') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="{{ trans('labels.password') }}" id="password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" class="form-control" name="type" value="user">
                                <div class="text-end">
                                    <a href="{{ URL::to('/forgotpassword') }}" class="text-muted fs-8 fw-500">
                                        <i
                                            class="fa-solid fa-lock-keyhole mx-2 fs-7"></i>{{ trans('labels.forgot_password') }}
                                    </a>
                                </div>--}}
                                <input type="hidden" class="form-control" name="type" value="user">
                                <button class="btn btn-primary w-100 mt-3"
                                    type="submit">{{ trans('labels.login') }}</button>
                            </form>



                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection


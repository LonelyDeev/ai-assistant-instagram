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
                                        <div class="p-4">
                                            <h4>تایید</h4>
                                            <p>جزئیات مورد نیاز را وارد کنید</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{helper::image_path('login-img.png')}}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form method="POST" class="mt-5 mb-5 login-input" action="{{route('user.checkVerifyCode')}}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="verifyCode" type="number" class="form-control @error('verifyCode') is-invalid @enderror" name="verifyCode" value="{{ old('verifyCode') }}" required autocomplete="verifyCode" autofocus placeholder="کد تایید را وارد کنید">
                                    </div>
                                    @error('verifyCode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary w-100">برسی کد تایید</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection

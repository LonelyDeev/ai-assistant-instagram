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
                                <form method="POST" class="mt-5 mb-5 login-input" action="{{route('admin.systemverification')}}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter username">
                                    </div>
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-3">
                                        <input id="purchase_key" type="text" class="form-control @error('purchase_key') is-invalid @enderror" name="purchase_key" required autocomplete="current-purchase_key" placeholder="purchase key">
                                    </div>
                                    @error('purchase_key')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <?php
                                    $text = str_replace('verify', '', url()->current());
                                    ?>

                                    <div class="form-group mb-3">
                                        <input id="domain" type="hidden" class="form-control @error('domain') is-invalid @enderror" name="domain" required autocomplete="current-domain" value="{{$text}}" readonly="">
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection

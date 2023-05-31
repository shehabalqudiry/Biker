@extends('frontend.layouts.app')

<<<<<<< HEAD
@section('content')

<section class="brea">
    <div class="container">
      <a href="#">الرئيسية</a>
      <h2>تسجيل الدخول</h2>
    </div>
</section>

<section class="sngle_page">
    <div class="container container_log">
      <div class="row">
        <div class="col-6">
          <img src="images/img3.svg" alt="">
        </div>
        <div class="col-6">
          <div class="form_login">
            <h2>من فضلك ادخل البيانات</h2>
            <form action="{{ route('front.auth.send_otp') }}">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="images/user.svg" alt=""></div>
                </div>
                <input type="text" class="form-control" name="name" placeholder="الاسم">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="images/phone.svg" alt=""></div>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="رقم الجوال">
              </div>
    
              <button>الدخول الان</button>
              <span class="link_reg">ليس لدى حساب <a href="#"> تسجيل حساب جديد</a></span>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection

=======
@section('pageTitle', __('Login'))
@section('content')


    <section class="sngle_page">
        <div class="container container_log">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('build/frontend') }}/images/img3.svg" alt="">
                </div>
                <div class="col-6">
                    <div class="form_login">
                        <h2>{{ __('Please fill data') }}</h2>
                        <form action="{{ route('front.auth.send_otp') }}">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="{{ asset('build/frontend') }}/images/user.svg" alt="">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-phone" style="font-size: 18px"></i>
                                        {{-- <img src="{{ asset('build/frontend') }}/images/phone.svg"  alt=""> --}}
                                    </div>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="{{ __('Phone') }}">
                            </div>
                            <div class="form-check form-check-ch">
                                <input class="form-check-input" required type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ __("I agree to") }} <a href="{{ route('front.terms') }}">{{ __('Terms and Conditions') }}</a>
                                </label>
                            </div>

                            <button>{{ __('Login Now') }}</button>
                            {{-- <span class="link_reg">{{ __('I do not have an account') }} <a href="#"> {{ __('Register a new account') }}</a></span> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

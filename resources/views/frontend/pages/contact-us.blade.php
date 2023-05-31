@extends('frontend.layouts.app')
<<<<<<< HEAD

@section('content')

<section class="brea">
    <div class="container">
      <a href="#">الرئيسية</a>
      <h2>  تواصل معنا </h2>
    </div>
  </section>

=======
@section('pageTitle', __('Contact us'))
@section('content')

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
  <section class="sngle_page">
    <div class="container container_log">
      <div class="row">
        <div class="col-4">
          <div class="social_cont">
            <ul>
              <li>
<<<<<<< HEAD
                <img src="images/whatsapp.png" alt="">
                <h3>+966 1234 548 54</h3>
              </li>
              <li>
                <img src="images/twitter.png" alt="">
                <h3>+966 1234 548 54</h3>
              </li>

              <li>
                <img src="images/phone-call.png" alt="">
                <h3>+966 1234 548 54</h3>
              </li>

              <li>
                <img src="images/mail.png" alt="">
                <h3>+966 1234 548 54</h3>
=======
                <img src="{{ asset('build/frontend') }}/images/whatsapp.png" alt="">
                <h3>{{ $setting->whatsapp }}</h3>
              </li>
              <li>
                <img src="{{ asset('build/frontend') }}/images/twitter.png" alt="">
                <h3>{{ $setting->twitter }}</h3>
              </li>

              <li>
                <img src="{{ asset('build/frontend') }}/images/phone-call.png" alt="">
                <h3>{{ $setting->phone }}</h3>
              </li>

              <li>
                <img src="{{ asset('build/frontend') }}/images/mail.png" alt="">
                <h3>{{ $setting->email }}</h3>
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
              </li>
            </ul>
          </div>
        </div>
        <div class="col-8">
          <div class="form_login">
<<<<<<< HEAD
            <h2>  راسلنا</h2>
            <form>
              <input class="Input" type="text" placeholder="الاسم">
              <input class="Input" type="text" placeholder="البريد الالكترونى">
              <input class="Input" type="text" placeholder="رقم الجوال">
              <textarea  placeholder=" رسالتك"></textarea>
              <button>ارسل الان</button>
=======
            <h2>  {{ __('Contact us') }}</h2>
            <form method="POST" action="{{ route('front.contact') }}">
                @csrf
                <input class="Input" name="name" type="text" placeholder="{{ __('Name') }}">
                <input class="Input" name="subject" type="text" placeholder="{{ __('Subject') }}">
                <input class="Input" name="email" type="text" placeholder="{{ __('Email') }}">
                <input class="Input" name="phone" type="text" placeholder="{{ __('Phone') }}">
                <textarea  placeholder="{{ __('Message') }}" name="message"></textarea>
                <button>{{ __('Send Now') }}</button>
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


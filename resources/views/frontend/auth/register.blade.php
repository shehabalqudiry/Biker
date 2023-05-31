@extends('frontend.layouts.app')

<<<<<<< HEAD
=======
@section('pageTitle', __('Register'))
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
@section('content')

<div class="slider_header">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide text-center">
          <div class="img_bg">
            <img src="{{ asset('build/frontend') }}/images/slider.jpg" alt="">
          </div>

          <div class="details_slider">
            <p> الان يمكنك طلب</p>
            <h1> شحنة جديده لكل مناطق المملكه </h1>


            <div class="alink_top">
              <a href="#"> طلب الان </a>
            </div>

          </div>
        </div> <!-- End swiper -->

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

      <div class="swiper-pagination"></div>
    </div>
  </div><!-- End slider -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="srev">
            <img src="{{ asset('build/frontend') }}/images/1.svg" alt="">
            <h2>الشحن والتوصيل</h2>
          </div>
        </div>
        <div class="col-3">
          <div class="srev">
            <img src="{{ asset('build/frontend') }}/images/2.svg" alt="">
            <h2> الإستبدال والإرجاع</h2>
          </div>
        </div>
        <div class="col-3">
          <div class="srev">
            <img src="{{ asset('build/frontend') }}/images/3.svg" alt="">
            <h2>تتبع طلبك</h2>
          </div>
        </div>
        <div class="col-3">
          <div class="srev">
            <img src="{{ asset('build/frontend') }}/images/4.svg" alt="">
            <h2>دعم 24 ساعه</h2>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End services -->

  <section class="laste_shipping">
    <div class="container">

      <div class="title">
        <h1>أخر الشحنات</h1>
        <span><img src="{{ asset('build/frontend') }}/images/title.png" alt=""></span>
      </div>

      <div class="swiper-container2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="las_ship">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>15/04/2023</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_ship">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>15/04/2023</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_ship">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>15/04/2023</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_ship">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>15/04/2023</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_ship">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>15/04/2023</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="aalanat">
    <div class="container">
      <div class="row">

        <div class="col-6">
          <div class="aalan">
            <img src="{{ asset('build/frontend') }}/images/img0.jpg" alt="">
            <div class="details_aalan">
              <h2>طلب شحنة جديدة الان</h2>
              <a href="#">طلب شحنة</a>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="aalan">
            <img src="{{ asset('build/frontend') }}/images/img1.jpg" alt="">
            <div class="details_aalan">
              <h2>طلب تخليص جمركى الان</h2>
              <a href="#">طلب الان</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="laste_takhles">
    <div class="container">

      <div class="title">
        <h1>تخليص جمركى</h1>
        <span><img src="{{ asset('build/frontend') }}/images/title.png" alt=""></span>
      </div>

      <div class="swiper-container2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="las_takhles">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>الرياض</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_takhles">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>الرياض</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_takhles">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>الرياض</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_takhles">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>الرياض</h3>
              </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="las_takhles">
              <a href="#">
                <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                <h2>شحنة من مكه الى المدينة</h2>
                <h3>الرياض</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection


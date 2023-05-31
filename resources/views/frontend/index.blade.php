@extends('frontend.layouts.app')

@section('pageTitle', __('Home'))
@section('content')

<<<<<<< HEAD
@endsection

=======
    <div class="slider_header">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide text-center">
                        <div class="img_bg">
                            <img src="{{ asset($slider->image) }}" alt="">
                        </div>

                        <div class="details_slider">
                            <p> {{ $slider->title }}</p>
                            <h1> {{ $slider->content }} </h1>


                            <div class="alink_top">
                                <a href="{{ route('front.shipments.create', ['shipType' => 0]) }}"> {{ __('Order Now') }} </a>
                            </div>
                        </div>
                    </div> <!-- End swiper -->
                @endforeach

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
                        <h2>{{ __('Shipping and delivery') }}</h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="srev">
                        <img src="{{ asset('build/frontend') }}/images/2.svg" alt="">
                        <h2> {{ __('Exchange and return') }}</h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="srev">
                        <img src="{{ asset('build/frontend') }}/images/3.svg" alt="">
                        <h2>{{ __('Track your order') }}</h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="srev">
                        <img src="{{ asset('build/frontend') }}/images/4.svg" alt="">
                        <h2>{{ __('24 hour support') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End services -->

    <section class="laste_shipping">
        <div class="container">

            <div class="title">
                <h1>{{ __('Latest Shipments') }}</h1>
                <span><img src="{{ asset('build/frontend') }}/images/title.png" alt=""></span>
            </div>

            <div class="swiper-container2">
                <div class="swiper-wrapper">
                    @foreach ($latest_shipments as $latest_shipment)
                        {{-- @dd($latest_shipment) --}}
                        <div class="swiper-slide">
                            <div class="las_ship">
                                <a href="#">
                                    <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                                    <h2>{{ __('Shipment') . ' ' . __('To') . ' ' . $latest_shipment->shipment_consignee_city }}
                                    </h2>
                                    <h3>{{ $latest_shipment->created_at->format('d/m/Y') }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach

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
                            <h2>{{ __('Order new shipment now') }}</h2>
                            <a
                                href="{{ route('front.shipments.create', ['shipType' => 0]) }}">{{ __('Create Shipment') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="aalan">
                        <img src="{{ asset('build/frontend') }}/images/img1.jpg" alt="">
                        <div class="details_aalan">
                            <h2>{{ __('Order new customs clearance now') }}</h2>
                            <a href="{{ route('front.shipments.create', ['shipType' => 1]) }}">{{ __('Order Now') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="laste_takhles">
        <div class="container">
            <div class="title">
                <h1>{{ __('Customs Clearance') }}</h1>
                <span><img src="{{ asset('build/frontend') }}/images/title.png" alt=""></span>
            </div>

            <div class="swiper-container2">
                <div class="swiper-wrapper">
                    @foreach ($latest_customs_clearance as $latest_customs)
                        <div class="swiper-slide">
                            <div class="las_takhles">
                                <a href="#">
                                    <img src="{{ asset('build/frontend') }}/images/ship.jpg" alt="">
                                    <h2>{{ __('Customs Clearance') . ' ' . $latest_customs->shipment_from_city }}</h2>
                                    <h3>{{ $latest_shipment->created_at->format('d/m/Y') }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

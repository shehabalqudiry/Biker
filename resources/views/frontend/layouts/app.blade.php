<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
<<<<<<< HEAD
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>@yield('pageTitle')</title>
  <link rel="shortcut icon" href="{{ asset('build/frontend') }}/images/logo.svg" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/bootstrap-a.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/swiper.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/animate.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/normalize.css" />

  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/style.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/responsive.css" />
</head>

<body>

  <!-- Start Header -->
  <header id="home">

    <nav class="navbar navbar-expand-lg navbar-light bg-light wow fadeInDown" data-wow-duration="1s">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('build/frontend') }}/images/logo.svg" alt =""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('front.index') }}">الرئيسية</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="#"> من نحن </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">طلب شحنة</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">طلب تخليص جمركى</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#"> تتبع شحنتك </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">الفواتير الاكلترونية</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('front.contact') }}">تواصل معنا</a>
            </li>
          </ul>
        </div>

        <ul class="left_bar">
          <a href="#" class="notif">
            <span>0</span>
            <img src="{{ asset('build/frontend') }}/images/notification.svg" alt="">
        </a>
        <a href="{{ auth()->check() ? route('front.profile.index') : route('front.auth.login') }}" class="account">
            {{ auth()->user()->name ?? "" }}
            <img src="{{ asset('build/frontend') }}/images/account.svg" alt="">
          </a>

          <a class="lang" href="{{ LaravelLocalization::getLocalizedURL(app()->getlocale() == 'ar' ? 'en' : 'ar') }}">{{ app()->getlocale() == 'ar' ? 'en' : 'عربي' }}</a>
        </ul>
      </div>
    </nav>

  </header>
  <!-- End Header -->

@yield('content')

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-3">
          <img src="{{ asset('build/frontend') }}/images/logo_footer.svg" alt="">
        </div>

        <div class="col-3">
          <div class="list_footer">
            <h1>روابط مهمه</h1>
            <ul>
              <li><a href="#"> سياسة الخصوصية</a></li>
              <li><a href="{{ route('front.contact') }}">الدعم</a></li>
              <li><a href="#">طلب شحنة</a></li>
              <li><a href="#">طلب تخليص جمركى</a></li>
              <li><a href="#">سياسة التوصيل</a></li>
            </ul>
          </div>
        </div>

        <div class="col-3">
          <div class="list_footer">
            <h1>روابط مهمه</h1>
            <ul>
              <li><a href="#"> الرئيسيه</a></li>
              <li><a href="#">تتبع شحنتك</a></li>
              <li><a href="#">حسابى</a></li>
              <li><a href="#">الاشعارات</a></li>
              <li><a href="{{ route('front.contact') }}">تواصل معنا</a></li>
            </ul>
          </div>
        </div>

        <div class="col-3">
          <div class="list_footer">
            <h1>تواصل معنا</h1>
            <ul>
              <li><a href="#"> <i class="fa-solid fa-phone"></i> 9661234569</a></li>
              <li><a href="#"> <i class="fa-solid fa-envelope"></i> info@website.com</a></li>
              <li><a href="#"> <i class="fa-solid fa-location-dot"></i> الرياض, السعودية</a></li>
            </ul>
          </div>
        </div>

        <div class="col-12">
          <div class="copyright">
            <p>جميع الحقوق محفوظة 2023  <a href="https://eltamiuz.com/">تميم وبرمجه : موسسة التميز العربى</a></p>
            <ul class="social_footer">
              <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <script src="{{ asset('build/frontend') }}/js/jquery-3.0.0.min.js"></script>
  <script src="{{ asset('build/frontend') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('build/frontend') }}/js/wow.min.js"></script>
  <script src="{{ asset('build/frontend') }}/js/swiper.min.js"></script>
  <script src="{{ asset('build/frontend') }}/js/custom.js"></script>
=======
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>
    <link rel="shortcut icon" href="{{ asset('build/frontend') }}/images/logo.svg" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/bootstrap-a.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/swiper.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/normalize.css" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/frontend') }}/css/responsive.css" />

    <script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        .mapboxgl-popup-close-button {
            display: none !important;
        }
        .pagination * {
            color: #892324;
            border-radius: 15px;
            margin: 0 5px
        }

        .pagination .active .page-link {
            color: #ffffff;
            background-color: #892324;
            border-color: #892324;
        }
    </style>
    @livewireStyles
</head>

<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    @php
        $settings = \App\Models\Setting::first();
    @endphp
    <!-- Start Header -->
    <header id="home">

        <nav class="navbar navbar-expand-lg navbar-light bg-light wow fadeInDown" data-wow-duration="1s">
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.index') }}"><img src="{{ asset('build/frontend') }}/images/logo.svg"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::route()->getName() == 'front.index' ? 'active' : '' }}" aria-current="page"
                                href="{{ route('front.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ \Request::route()->getName() == 'front.about_us' ? 'active' : '' }}" href="{{ route('front.about_us') }}"> {{ __('who are we') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->shipType == '0' ? 'active' : '' }}"
                                href="{{ route('front.shipments.create', ['shipType' => 0]) }}">{{ __('Create Shipment') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->shipType == '1' ? 'active' : '' }}"
                                href="{{ route('front.shipments.create', ['shipType' => 1]) }}">{{ __('Customs Clearance') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::route()->getName() == 'front.contact' ? 'active' : '' }}" href="{{ route('front.contact') }}">{{ __('Contact us') }}</a>
                        </li>
                    </ul>
                </div>

                <ul class="left_bar">
                    {{-- <div class="account_menu">
                        <a href="#" class="notif">
                            <span>0</span>
                            <img src="{{ asset('build/frontend') }}/images/notification.svg" alt="">
                        </a>
                        <ul class="dro_account">
                            <li><a href="#">تم تسجيل دخول</a></li>
                            <li><a href="#">شحنتك تم توصيلها</a></li>
                            <li><a href="#">تم تسجيل دخول</a></li>
                            <li><a href="#">شحنتك تم توصيلها</a></li>
                        </ul>
                    </div> --}}
                    @if (auth()->check())

                    <div class="account_menu">
                        <a href="#" class="account">
                            <img src="{{ asset('build/frontend') }}/images/account.svg" alt="">
                        </a>

                        <ul class="dro_account">
                            <li><a href="{{ route('front.profile.index') }}">{{ __('My Account') }}</a></li>
                            <li><a href="{{ route('front.shipments.index', 'outgoing') }}">{{ __('My Shipments') }}</a></li>
                            <li><a href="#" onclick="getElementById('LogoutForm').submit();" class="account"> {{ __('Logout') }} </a></li>
                        </ul>
                    </div>

                        <form class="d-none" method="POST" id="LogoutForm" action="{{ route('front.auth.logout') }}"
                            x-data>
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('front.auth.login') }}" class="account btn ">
                            {{ __('Login') }}
                        </a>
                    @endif
                    <a class="lang"
                        href="{{ LaravelLocalization::getLocalizedURL(app()->getlocale() == 'ar' ? 'en' : 'ar') }}">{{ app()->getlocale() == 'ar' ? 'EN' : 'عربي' }}</a>
                </ul>
            </div>
        </nav>

    </header>
    <!-- End Header -->
    @if (session()->has('success'))
        <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #3ad29f;color: #f8f8f8;cursor: pointer;"
            onclick="$(this).slideUp();" id="messageNoti">
            <span class="fas fa-info-circle"></span> {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #d23a3a;color: #dcdcdc;cursor: pointer;"
            onclick="$(this).slideUp();" id="messageNoti">
            <span class="fas fa-info-circle"></span> {{ session()->get('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="col-12 justify-content-end d-flex">
            <div class="col-12" style="position: absolute;top: 80px;left: 10px;" id="messageNoti">
                {!! implode(
                    '',
                    $errors->all(
                        '<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>',
                    ),
                ) !!}
            </div>
        </div>
    @endif
    @if (!request()->is('en') and !request()->is('ar'))
        <section class="brea ">
            <div class="container">
                <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                <h2> @yield('pageTitle') </h2>
            </div>
        </section>
    @endif
    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('build/frontend') }}/images/logo_footer.svg" alt="">
                </div>

                <div class="col-3">
                    <div class="list_footer">
                        <h1>{{ __('Important Links') }}</h1>
                        <ul>
                            {{-- <li><a href="#"> سياسة الخصوصية</a></li> --}}
                            <li><a href="{{ route('front.contact') }}">{{ __('Support') }}</a></li>
                            <li><a
                                    href="{{ route('front.shipments.create', ['shipType' => 0]) }}">{{ __('Create Shipment') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('front.shipments.create', ['shipType' => 1]) }}">{{ __('Customs Clearance') }}</a>
                            </li>
                            <li><a href="{{ route('front.terms') }}">{{ __('Terms and Conditions') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-3">
                    <div class="list_footer">
                        <h1>{{ __('Important Links') }}</h1>
                        <ul>
                            <li><a href="{{ route('front.index') }}"> {{ __('Home') }}</a></li>
                            {{-- <li><a href="#">{{ __('Tracking') }}</a></li> --}}
                            <li><a href="{{ route('front.shipments.index', 'outgoing') }}">{{ __('My Shipments') }}</a>
                            </li>
                            <li><a href="{{ route('front.profile.index') }}">{{ __('My Account') }}</a></li>
                            {{-- <li><a href="#">{{ __('Notifications') }}</a></li> --}}
                            <li><a href="{{ route('front.contact') }}">{{ __('Contact us') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-3">
                    <div class="list_footer">
                        <h1>{{ __('Contact us') }}</h1>
                        <ul>
                            <li><a href="tel:{{ $settings->phone }}"> <i class="fa-solid fa-phone"></i>
                                    {{ $settings->phone }}</a></li>
                            <li><a href="mailto:{{ $settings->email }}"> <i class="fa-solid fa-envelope"></i>
                                    {{ $settings->email }}</a></li>
                            <li><a href="#"> <i class="fa-solid fa-location-dot"></i> {{ $settings->location }}
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="copyright">
                        <p>{!! __(
                            "All rights reserved 2023 <a href='https://eltamiuz.com/'>Designed and Programmed by Eltamiuz Al-Araby</a>",
                        ) !!}</p>
                        <ul class="social_footer">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script src="{{ asset('build/frontend') }}/js/jquery-3.0.0.min.js"></script>
    <script src="{{ asset('build/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('build/frontend') }}/js/wow.min.js"></script>
    <script src="{{ asset('build/frontend') }}/js/swiper.min.js"></script>
    <script src="{{ asset('build/frontend') }}/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $("input[name='shipment_type']").change(function() {
                if ($(this).val() == "other") {
                    $("#otherType").show();
                } else {
                    $("#otherType").hide();
                }
            });

            $("input[name='shipment_temperature']").change(function() {
                if ($(this).val() == "other") {
                    $("#otherTemp").show();
                } else {
                    $("#otherTemp").hide();
                }
            });

            $("#need_workers_input").change(function() {
                if (this.checked) {
                    $("#needWorkers").show();
                } else {
                    $("#needWorkers").hide();
                }
            });

        });

        mapboxgl.accessToken =
            'pk.eyJ1Ijoic2hlaGFiYWxxdWRpcnkxIiwiYSI6ImNsZXcxZTI3eTB5emczcm83b2tpejl3cTgifQ.btLr1kslD26GfvHuzL6fIg';
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true // Lazy load the plugin
        );

        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [31.235726, 30.044388], // starting position [lng, lat]
            zoom: 9, // starting zoom
            language: 'ar-EG',
            charset: 'utf-8',
        });

        // const geocoder = new MapboxGeocoder({
        //     accessToken: mapboxgl.accessToken,
        //     language: 'ar-SA', // Specify the language as Arabic.
        //     placeholder: "{{ __('From') }}",
        //     mapboxgl: mapboxgl,
        //     marker: false
        // });
        // map.addControl(geocoder);
        // const geocoder2 = new MapboxGeocoder({
        //     accessToken: mapboxgl.accessToken,
        //     language: 'ar-SA', // Specify the language as Arabic.
        //     placeholder: "{{ __('To') }}",
        //     mapboxgl: mapboxgl,
        //     marker: false
        // });
        // map.addControl(geocoder2);

        const marker = new mapboxgl.Marker({
                color: "#892324",
                draggable: true
            }).setLngLat([31.235726, 30.044388])
            .setPopup(new mapboxgl.Popup().setHTML("{{ __('From') }}"))
            .addTo(map);

        const marker2 = new mapboxgl.Marker({
                color: "#892324",
                draggable: true
            }).setLngLat([31.184063, 30.4624974])
            .setPopup(new mapboxgl.Popup().setHTML("{{ __('To') }}"))
            .addTo(map);

        map.on('click', (e) => {
            marker.setLngLat([e.lngLat.lng, e.lngLat.lat]);
        });

        function onDragEnd() {
            const lngLat = marker.getLngLat();
            const lngLat2 = marker2.getLngLat();

            const from = [lngLat.lng, lngLat.lat];
            const to = [lngLat2.lng, lngLat2.lat];
            document.getElementById('distanceTo').innerHTML = " ~ " + turf.distance(to, from).toFixed(2);
            if (map.getSource('lines') !== undefined) {
                // If a layer with ID 'state-data' exists, remove it.
                if (map.getLayer('lines')) map.removeLayer('lines');
                map.removeSource('lines');
            }
            map.addSource('lines', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [{
                        'type': 'Feature',
                        'properties': {
                            'color': '#892324' // red
                        },
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': [
                                [lngLat.lng, lngLat.lat],
                                [lngLat2.lng, lngLat2.lat],
                            ]
                        }
                    }, ]
                }
            });
            map.addLayer({
                'id': 'lines',
                'type': 'line',
                'source': 'lines',
                'paint': {
                    'line-width': 5,
                    'line-color': ['get', 'color']
                }
            });
            $('#idShipment_from_lat').val(from[0]);
            $('#idShipment_from_long').val(from[1]);
            $('#idShipment_to_lat').val(to[0]);
            $('#idShipment_to_long').val(to[1]);
        }

        marker.on('dragend', onDragEnd);
        marker2.on('dragend', onDragEnd);
        // geocoder.on('result', function(result) {
        //     marker.setLngLat([result.result.center[0], result.result.center[1]]);
        // })

        // geocoder2.on('result', function(result) {
        //     marker2.setLngLat([result.result.center[0], result.result.center[1]]);
        //     const m2lngLat = marker.getLngLat();
        //     if (map.getSource('lines') !== undefined) {
        //         // If a layer with ID 'state-data' exists, remove it.
        //         if (map.getLayer('lines')) map.removeLayer('lines');
        //         map.removeSource('lines');
        //     }
        //     map.addSource('lines', {
        //         'type': 'geojson',
        //         'data': {
        //             'type': 'FeatureCollection',
        //             'features': [{
        //                 'type': 'Feature',
        //                 'properties': {
        //                     'color': '#892324' // red
        //                 },
        //                 'geometry': {
        //                     'type': 'LineString',
        //                     'coordinates': [
        //                         [result.result.center[0], result.result.center[1]],
        //                         [m2lngLat.lng, m2lngLat.lat],
        //                     ]
        //                 }
        //             }, ]
        //         }
        //     });
        //     map.addLayer({
        //         'id': 'lines',
        //         'type': 'line',
        //         'source': 'lines',
        //         'paint': {
        //             'line-width': 10,
        //             // Use a get expression (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-get)
        //             // to set the line-color to a feature property value.
        //             'line-color': ['get', 'color']
        //         }
        //     });

        // });
        const lngLat = marker.getLngLat();
        const lngLat2 = marker2.getLngLat();

        // const from = [lngLat.lng, lngLat.lat];
        // const to = [lngLat2.lng, lngLat2.lat];

        $('#idShipment_from_lat').val(lngLat.lat);
        $('#idShipment_from_long').val(lngLat.lng);
        $('#idShipment_to_lat').val(lngLat2.lat);
        $('#idShipment_to_long').val(lngLat2.lng);

    </script>
    @livewireScripts
    <script>
        setTimeout(function() {
            $('#messageNoti').fadeOut('fast');
        }, 2500);
    </script>
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

</body>

</html>

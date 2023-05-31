@extends('frontend.layouts.app')

@section('pageTitle')
    @if ($shipment->type == 1)
        {{ __('Invoice and payment (for customs clearance)') }}
    @else
        {{ __('Invoice and payment (for shipment)') }}
    @endif
@endsection
@section('content')

    @if ($shipment->type == 1)
        <section class="sngle_page">
            <div class="container ">
                <form method="POST" action="{{ route('front.shipments.pay') }}">
                    @csrf
                    <div class="row">

                        <div class="col-2"></div>

                        <div class="col-4">
                            <div class="detailsPrice">
                                <ul>
                                    <li>{{ __("Customs declaration fees") }} <span>{{ ($shipment->customs_declaration_fees ?? '10') . ' ' . __('SAR') }}</span>
                                    </li>
                                    <li>{{ __("Shipping fees") }} <span>{{ ($shipment->total - (45 + $shipment->vat) ) . ' ' . __('SAR') }}</span>
                                    </li>
                                    <li> {{ __("Delivery permission") }} <span>{{ ($shipment->delivery_authorization ?? '15') . ' ' . __('SAR') }}</span>
                                    </li>
                                    <li>{{ __("Customs Clearance ") }} <span>{{ ($shipment->customs_clearance ?? '20') . ' ' . __('SAR') }}</span></li>
                                    <li>{{ __("Two workers' wages") }} <span>{{ ($shipment->workers_cost ?? '0') . ' ' . __('SAR') }}</span>
                                    </li>
                                    <li> {{ __("Translation") }} <span>{{ ($shipment->translate ?? '0') . ' ' . __('SAR') }}</span></li>
                                    <li> {{ __("Value added tax (VAT)") }} <span>{{ ($shipment->vat ?? '0') . ' ' . __('SAR') }}</span></li>
                                    <li>{{ __("Your available balance") }}
                                        <span>{{ number_format(auth()->user()->wallet->balance ?? 0, 2) . ' ' . __('SAR') }}</span>
                                    </li>

                                </ul>

                                <input hidden type="text" name="shipment_number"
                                    value="{{ $shipment->shipment_number }}" id="">


                                @livewire('check-coupon', ['total' => $shipment->total])



                            </div>
                        </div>


                        <div class="col-5">

                            <div class="buyChose">
                                <h2 style="margin-top: 0;">{{ __("Payment Method") }}</h2>
                                @foreach (App\Models\PaymentMethod::where('status', 1)->orderBy('type', 'asc')->get() as $payment)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            value="{{ $payment->id }}" required id="payment_method{{ $payment->id }}"
                                            @checked($payment->type == 'wallet')>
                                        <label class="form-check-label" for="payment_method{{ $payment->id }}">
                                            {{ $payment->title }}
                                            @if ($payment->description)
                                                <span style="color:red">{{ $payment->description }}</span>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button class="next_step">{{ __("Next") }}</button>


                        </div>

                    </div>
                </form>
            </div>
        </section>
    @else
        <section class="sngle_page">
            <div class="container ">
                <form method="POST" action="{{ route('front.shipments.pay') }}">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="col-5">
                                <ul class="detailsSHohna">
                                    <li> {{ __('Shipment Number') }}<span>#{{ $shipment->shipment_number }}</span></li>
                                    <li>{{ __("Sender Name") }} <span>{{ $shipment->user->name }}</span></li>
                                    <li> {{ __("Address") }}<span>{{ $shipment->shipment_from_address ?? $shipment->user->address }}</span></li>
                                </ul>
                            </div>

                            <div class="col-2 text-center ">
                                <img class="imgWay" src="{{ asset('build/frontend') }}/images/way.svg" alt="">
                            </div>

                            <div class="col-5">
                                <ul class="detailsSHohna">
                                    <li> {{ __('Received Date') }}<span>{{ $shipment->delivery_date->format("d/m/Y") }}</span></li>
                                    <li>{{ __("Receiver Name") }} <span>{{ $shipment->shipment_consignee_name }}</span></li>
                                    <li> {{ __("Address") }}<span>{{ $shipment->shipment_consignee_address }}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="detailsPrice">
                                <ul>
                                    <li>{{ __("Shipping fees") }} <span>{{ ($shipment->total - ($shipment->vat) ) . ' ' . __('SAR') }}</span></li>
                                    {{-- <li>المجموع <span>44.00 ريال</span></li> --}}
                                    <li>{{ __("Two workers' wages") }} <span>{{ ($shipment->workers_cost ?? '0') . ' ' . __('SAR') }}</span>
                                    <li>{{ __("Value added tax (VAT)") }} <span>{{ $shipment->vat . ' ' . __('SAR') }}</span></li>
                                    <li>{{ __("Your available balance") }}
                                        <span>{{ number_format(auth()->user()->wallet->balance ?? 0, 2) . ' ' . __('SAR') }}</span>
                                    </li>
                                </ul>
                                <input hidden type="text" name="shipment_number"
                                    value="{{ $shipment->shipment_number }}" id="">

                                @livewire('check-coupon', ['total' => $shipment->total])

                            </div>
                        </div>


                        <div class="col-5">
                            <div class="detailsItem">
                                <h2>{{ $shipment->shipment_type }}</h2>
                                <li>{{ __("Weight") . ' : ' . $shipment->shipment_weight }}</li>
                                <li>{{ $shipment->description }}</li>
                                <li>{{ __("Content Value") }} : {{ $shipment->shipment_value }}</li>
                            </div>

                            <div class="buyChose">
                                <h2>{{ __("Payment Method") }}</h2>
                                @foreach (App\Models\PaymentMethod::where('status', 1)->orderBy('type', 'asc')->get() as $payment)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            value="{{ $payment->id }}" required id="payment_method{{ $payment->id }}"
                                            checked>
                                        <label class="form-check-label" for="payment_method{{ $payment->id }}">
                                            {{ $payment->title }}
                                            @if ($payment->description)
                                                <span style="color:red">{{ $payment->description }}</span>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button class="next_step">{{ __("Next") }}</button>


                        </div>

                    </div>
                </form>
            </div>
        </section>
    @endif

@endsection

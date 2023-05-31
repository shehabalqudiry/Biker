@extends('frontend.layouts.app')

@section('pageTitle')
    {{ __('Shipment Details') }}
@endsection
@section('content')

    @if ($shipment->type == 1)
        <section class="sngle_page">
            <div class="container ">
                <div class="row">

                    <div class="col-2"></div>

                    <div class="col-4">
                        <div class="detailsPrice">
                            <ul>
                                <li>{{ __("Customs declaration fees") }} <span>{{ ($shipment->customs_declaration_fees ?? '10') . ' ' . __('SAR') }}</span>
                                </li>
                                <li> {{ __("Delivery permission") }} <span>{{ ($shipment->delivery_authorization ?? '15') . ' ' . __('SAR') }}</span>
                                </li>
                                <li>{{ __("Customs Clearance ") }} <span>{{ ($shipment->customs_clearance ?? '20') . ' ' . __('SAR') }}</span></li>
                                <li>{{ __("Two workers' wages") }} <span>{{ ($shipment->workers_cost ?? '0') . ' ' . __('SAR') }}</span>
                                </li>
                                <li> {{ __("Translation") }} <span>{{ ($shipment->translate ?? '0') . ' ' . __('SAR') }}</span></li>

                            </ul>

                            <div class="totalPrice">
                                <li>{{ __("Total") }} <span>{{ $shipment->total . ' ' . __('SAR') }}</span></li>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="sngle_page">
            <div class="container ">
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
                                <li> {{ __('Shipment Number') }}<span>#{{ $shipment->shipment_number }}</span></li>
                                <li>{{ __("Receiver Name") }} <span>{{ $shipment->shipment_consignee_name }}</span></li>
                                <li> {{ __("Address") }}<span>{{ $shipment->shipment_consignee_address }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="detailsPrice">
                            <ul>
                                <li>{{ __("Total Services") }} <span>{{ $shipment->total . ' ' . __('SAR') }}</span></li>
                                <li>{{ __("Your available balance") }}
                                    <span>{{ number_format(auth()->user()->wallet->balance ?? 0, 2) . ' ' . __('SAR') }}</span>
                                </li>
                                {{-- <li>المجموع <span>44.00 ريال</span></li> --}}
                                <li>{{ __("Value added tax (VAT)") }} <span>{{ $shipment->vat . ' ' . __('SAR') }}</span></li>
                            </ul>

                            <div class="totalPrice">
                                {{-- <li>رسوم الشحن <span>44.00 ريال</span></li> --}}
                                <li>{{ __("Total") }} <span>{{ $shipment->total . ' ' . __('SAR') }}</span></li>
                            </div>

                        </div>
                    </div>


                    <div class="col-5">
                        <div class="detailsItem">
                            <h2>{{ $shipment->shipment_type }}</h2>
                            <li>{{ __("Weight") . ' : ' . $shipment->shipment_weight }}</li>
                            <li>{{ $shipment->description }}</li>
                            <li>{{ __("Content Value") }} : {{ $shipment->shipment_value }}</li>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    @endif

@endsection

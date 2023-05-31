@extends('frontend.layouts.app')

@section('pageTitle', __('Tracking'))
@section('content')

    <section class="sngle_page">
        <div class="container container_log">
            <div class="row my-3">
                <div class="col-12">
                    <a class="btn btn-light" href="{{ route('front.shipments.e_invoice', $shipment->shipment_number) }}">
                        {{ __('View details') }}
                    </a>
                    @if ($shipment->status()->latest()->first()->status == 0)
                        <a class="btn btn-light" href="{{ url('/pay', $shipment) }}">
                            {{ __('Complete the payment') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach ($shipment->status()->get() as $status)
                    <div class="col-6">
                        <div class="itemSHip">
                            <div class="imgSHip">
                                <img src="{{ asset('build/frontend') }}/images/shippingicon.svg" alt="">
                            </div>
                            <div class="detailsSHip">
                                <h2>#{{ $status->shipment->shipment_number }}</h2>
                                <span>{{ $status->created_at }}</span>
                                <h3>{{ $status->shipment->total . ' ' . __('SAR') }}</h3>
                                <h3>{{ __('Receiver') }} : {{ $status->shipment->shipment_consignee_name }}</h3>
                                <h4 class="messageSH">
                                    {{ $status->status_string }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

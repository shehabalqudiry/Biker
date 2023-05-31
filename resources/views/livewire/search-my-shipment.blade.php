<div class="row">
    <div class="mb-2 form_login">
        <input type="text" placeholder="{{ __("Search") }}" class="Input mb-1" wire:model="q">
    </div>
    <div class="money_table">
        @if ($outgoing)
        @forelse ($outgoing as $out)
        @if ($out->shipment_consignee_id !== auth()->user()->number)
        <div class="col-6">
            <div class="itemSHip">
                <div class="imgSHip">
                    <img src="{{ asset('build/frontend') }}/images/shippingicon.svg" alt="">
                </div>
                <div class="detailsSHip">
                    <a
                        href="{{ route('front.shipments.tracking_shipment', $out->shipment_number) }}">
                        <h2>#{{ $out->shipment_number }}</h2>
                    </a>
                    <span>{{ $out->delivery_date ? $out->delivery_date->format('Y/m/d') : '' }}</span>
                    <h3>{{ $out->total . ' ' . __('SAR') }}</h3>
                    <h3>{{ __('Receiver') }} : {{ $out->shipment_consignee_name }}</h3>
                </div>
            </div>
        </div>
        @endif
        @empty
        <h4 class="text-danger text-center">{{ __("You have no outgoing shipments") }}</h4>
        @endforelse

        @elseif($incoming)
            @forelse ($incoming as $incom)
                <div class="col-6">
                    <div class="itemSHip">
                        <div class="imgSHip">
                            <img src="{{ asset('build/frontend') }}/images/shippingicon.svg" alt="">
                        </div>
                        <div class="detailsSHip">
                            <a href="{{ route('front.shipments.tracking_shipment', $incom->shipment_number) }}">
                                <h2>#{{ $incom->shipment_number }}</h2>
                            </a>
                            <span>{{ $incom->delivery_date ? $incom->delivery_date->format('Y/m/d') : '' }}</span>
                            <h3>{{ $incom->total . ' ' . __('SAR') }}</h3>
                            <h3>{{ __('Receiver') }} : {{ $incom->shipment_consignee_name }}</h3>
                        </div>
                    </div>
                </div>
            @empty
            <h4 class="text-danger text-center">{{ __("You have no incoming shipments") }}</h4>
            @endforelse
        @endif
    </div>
</div>

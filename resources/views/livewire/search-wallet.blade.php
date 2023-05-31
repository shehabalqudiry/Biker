<div class="col-4">
    <div class="priceWallet">
        <img src="{{ asset('build/frontend') }}/images/wallet.svg" alt="">
        <h2>{{ $data['balance'] ? number_format($data['balance'],2) : 0 }}<span>{{ __('SAR') }}</span></h2>
    </div>
    <div class="mb-2 form_login">
        <input type="text" placeholder="{{ __("Search") }}" class="Input mb-1" wire:change="getPay" wire:model="q">
    </div>
    <div class="money_table">
        @foreach ($data['last_operations'] as $operation)
            <div class="detailsItem detailsItem2">
                    @if ($operation->status == 1)
                    <i class="fa fa-check-circle fa-3x img_buy_sh text-success"></i>
                    @else
                    <i class="fa fa-check-circle fa-3x img_buy_sh text-secondary"></i>
                    @endif
                <h2>{{ $operation->value ? number_format(floatval($operation->value),2) : 00.0 }} {{ __('SAR') }}</h2>
                <li> {{ $operation->created_at }}</li>
                <li>{{ $operation->description }}</li>
            </div>
        @endforeach
    </div>
    {{-- <nav aria-label="Page navigation">
        {{ $data['last_operations']->links() }}
    </nav> --}}
</div>

<div class="copon">
    <div class="col-12">
        <label for=""> {{ __("Coupon") }}
            <input type="text" wire:model="coupon_code" name="coupon_code" id="copoun">
        </label>
    </div>
    @if (!$success)
    <button type="button" class="next_step" wire:click="check">{{ __("Apply Coupon") }}</button>
    @endif
    @if ($success)
        <button type="button" class="next_step" wire:click="cancel">{{ __("Cancel") }}</button>
    @endif
    <span class="text-danger p-2">{{ $msg }}</span>
    <span class="text-success p-2">{{ $success }}</span>
    <div class="totalPrice">
        <li>{{ __("Total") }} <span>{{ $total . ' ' . __('SAR') }}</span></li>
    </div>
</div>

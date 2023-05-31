@extends('frontend.layouts.app')

@section('pageTitle', __('Edit Address'))
@section('content')

    <section class="sngle_page">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form_login">
                        <h2> {{ __('Edit Address') }} </h2>
                        <form method="POST" action="{{ route('front.addresses.update', $address->id) }}">
                            @csrf
                            <input class="Input" type="text" name="city" value="{{ $address->city }}"
                                placeholder="{{ __('City') }}">
                            @error('city')
                                <span class="text-danger p-2">{{ $message }}</span>
                            @enderror
                            <input class="Input" type="text" name="district" value="{{ $address->district }}"
                                placeholder="{{ __('District') }}">
                            @error('district')
                                <span class="text-danger p-2">{{ $message }}</span>
                            @enderror
                            <input class="Input" type="text" name="street" value="{{ $address->street }}"
                                placeholder="{{ __('Street') }}">
                            @error('street')
                                <span class="text-danger p-2">{{ $message }}</span>
                            @enderror
                            <input class="Input" type="text" name="description" value="{{ $address->description }}"
                                placeholder="{{ __('Detailed address') }}">
                            <button>{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

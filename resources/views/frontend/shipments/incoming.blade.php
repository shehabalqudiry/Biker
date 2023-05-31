@extends('frontend.layouts.app')

@section('pageTitle', __('Shipments'))
@section('content')


    <section class="sngle_page">
        <div class="container container_log">
            <div class="row">

                <ul class="nav nav-tabs navnav-tabs2" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.shipments.index', 'outgoing') }}"><i
                                class="fa-solid fa-circle-check"></i>
                            {{ __('Shipments') . ' ' . __('Outgoing') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('front.shipments.index', 'incoming') }}">
                            <i class="fa-solid fa-circle-check"></i>{{ __('Shipments') . ' ' . __('Incoming') }} </a>
                    </li>
                </ul>

                <div class="tab-content" >

                    <div class="tab-pane fade show active" >
                        @livewire('search-my-shipment', ['incoming' => $incoming])
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection

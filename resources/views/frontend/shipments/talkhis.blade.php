@extends('frontend.layouts.app')

@section('pageTitle', __('Customs Clearance'))
@section('content')


<section class="sngle_page">
    <div class="container container_log">
        <div class="row">
            <div class="form_login">
                <form method="POST" action="{{ route('front.shipments.store') }}">
                    @csrf
                    <h2 class="titleForm">{{ __('Base Informations') }}</h2>

                    <div class="col-6 pad_r mb-3">
                        <div class="form-check">
                            <span class="titlSpan">{{ __("Shipment Type") }}</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_type" id="inlineRadio1"
                                    value="{{ __('Food') }}">
                                <label class="form-check-label" for="inlineRadio1">{{ __('Food') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_type" id="inlineRadio2"
                                    value="{{ __('Medicine') }}">
                                <label class="form-check-label" for="inlineRadio2">{{ __('Medicine') }}</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_type" id="inlineRadio3"
                                    value="{{ __('Devices') }}">
                                <label class="form-check-label" for="inlineRadio3">{{ __('Devices') }}</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_type" id="inlineRadio4"
                                    value="other">
                                <label class="form-check-label" for="inlineRadio4">{{ __('Other') }}</label>
                            </div>
                            <div class="col-12">
                                <input class="Input" type="text" placeholder="{{ __('Other') }}"
                                    name="shipment_type_other" style="display: none" id="otherType">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <label for="">{{ __("Determine the shipment path") }}</label>
                        <label id="distanceTo"></label>
                        <div id='map' style='width: 100%; height: 300px;'></div>
                        <input hidden type="text" name="type" value="{{ request()->shipType }}">
                        <input hidden type="text" name="shipment_from_lat" id="idShipment_from_lat">
                        <input hidden type="text" name="shipment_from_long" id="idShipment_from_long">
                        <input hidden type="text" name="shipment_to_lat" id="idShipment_to_lat">
                        <input hidden type="text" name="shipment_to_long" id="idShipment_to_long">
                    </div>
                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_consignee_name"
                            placeholder="{{ __("The name of the consignee") }}">
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_consignee_id"
                            placeholder="{{ __("customer number who shipment is sent to (if any)") }}">
                    </div>
                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_description" placeholder="{{ __("Shipment Description") }}">
                    </div>
                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_value" placeholder="{{ __("Shipment Value") }}">
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_from_address" placeholder="{{ __("Shipment Address") }}">
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" placeholder="{{ __("Receiver Address") }}"
                            name="shipment_consignee_address">
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" placeholder="{{ __("Short Address") }}"
                            name="shipment_consignee_address_short">
                    </div>
                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_port" placeholder="{{ __("Access Port") }}">
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" placeholder="{{ __("Policy Number") }}"
                            name="shipment_bill_of_lading">
                    </div>

                    <div class="col-6">
                        <div class='file-input'>
                            <input type='file' name="shipment_bill_of_lading_file">
                            <span class='button'> {{ __("Copy of Policy") }}</span>
                            <span class='label' data-js-label>{{ __("Upload") }} </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" placeholder="{{ __("Revocation Version Number") }}"
                            name="shipment_annulment_number">
                    </div>

                    <div class="col-6">
                        <div class='file-input'>
                            <input type='file' name="shipment_annulment_file">
                            <span class='button'>{{ __("Attach copy of termination") }}</span>
                            <span class='label' data-js-label>{{ __("Upload") }} </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="Input" type="text" name="shipment_weight" placeholder="{{ __("Shipment Weight") }}">
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <span class="titlSpan">{{ __("Required Temperature") }}</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_temperature"
                                    id="inlineRadio5" value="20-5">
                                <label class="form-check-label" for="inlineRadio5">20-5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_temperature"
                                    id="inlineRadio6" value="30-20">
                                <label class="form-check-label" for="inlineRadio6">30-20</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_temperature"
                                    id="inlineRadio7" value="40-30">
                                <label class="form-check-label" for="inlineRadio7">40-30</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipment_temperature"
                                    id="inlineRadio8" value="other">
                                <label class="form-check-label" for="inlineRadio8">{{ __('Other') }}</label>
                            </div>

                            <div class="col-12 mb-5">
                                <input class="Input" type="text" placeholder="{{ __('Other') }}"
                                    name="shipment_temperature_other" style="display: none" id="otherTemp">
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <span class="titlSpan mb-1">{{ __("Received Date") }}</span>
                        <input class="Input" type="date" name="delivery_date" title="{{ __("Received Date") }}">
                    </div>

                    <div class="col-6 mb-3">
                        <div class="col-12">
                            <input class="form-check-input mx-2" type="checkbox" id="need_workers_input" value="other">
                            <label class="form-check-label" for="need_workers_input"> {{ __('I need workers to transport the shipment') }}</label>
                        </div>

                        <div class="col-12">
                            <input class="Input" type="text" placeholder="{{ __('Enter the required number of workers') }}"
                                name="need_workers" style="display: none" id="needWorkers">
                        </div>
                    </div>

                    <div class="col-12">
                        <button>{{ __("Next") }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection

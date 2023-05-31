@extends('frontend.layouts.app')

@section('pageTitle', __('My Account'))
@section('content')

    <section class="sngle_page">
        <div class="container">
            <div class="row">

                <ul class="nav nav-tabs navnav-tabs2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ session()->has('tab') == false || session()->get('tab') == 'account' ? 'active' : '' }}"
                            id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account"
                            aria-selected="true"><i class="fa-solid fa-circle-check"></i> {{ __('My Account') }} </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ session()->get('tab') == 'address' ? 'active' : '' }}" id="myaddress-tab"
                            data-toggle="tab" href="#myaddress" role="tab" aria-controls="myaddress"
                            aria-selected="true"> <i class="fa-solid fa-circle-check"></i> {{ __('My Addresses') }} </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ ((session()->get('tab') == 'wallet')) ? 'active' : '' }}" id="wallet-tab"
                            data-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="true">
                            <i class="fa-solid fa-circle-check"></i> {{ __('Wallet') }} </a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade {{ session()->has('tab') == false || session()->get('tab') == 'account' ? 'show active' : '' }}"
                        id="account" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-6 text-center">
                                <img src="{{ asset('build/frontend') }}/images/img3.svg" alt="">
                            </div>
                            <div class="col-6">
                                <div class="form_login">
                                    <h2>{{ __('Update Informations') }}</h2>
                                    <form method="POST" action="{{ route('front.profile.update') }}">
                                        @csrf
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/user.svg" alt="">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ __('Name') }}" value="{{ $data['info']['name'] }}">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/phone.svg"
                                                        alt=""></div>
                                            </div>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder=" 0501234679" value="{{ $data['info']['phone'] }}">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/user.svg" alt="">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="email"
                                                placeholder=" info@asghas.com" value="{{ $data['info']['email'] }}">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/map.svg" alt="">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder=" العنوان بالتفاصيل"
                                                value="{{ $data['info']['address'] }}" name="address">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/map.svg" alt="">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder=" العنوان الوطني"
                                                value="{{ $data['info']['address2'] }}" name="address2">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/map.svg"
                                                        alt=""></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder=" رابط العنوان الوطني"
                                                value="{{ $data['info']['address_link'] }}" name="address_link">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="{{ asset('build/frontend') }}/images/user.svg"
                                                        alt=""></div>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="{{ __('ID ') . ' : ' . $data['info']['number'] }}" readonly>
                                        </div>


                                        <button>{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade {{ session()->get('tab') == 'address' ? 'show active' : '' }}"
                        id="myaddress" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-6">
                                @foreach ($data['addresses'] as $address)
                                    <div class="detailsItem detailsItem2">
                                        <h2>{{ $address->city }}</h2>
                                        <li>{{ $address->district }}</li>
                                        <li>{{ $address->street }}</li>
                                        <li>{{ $address->description }}</li>
                                        <a href="{{ route('front.addresses.edit', $address->id) }}">
                                            <i class="fa fa-edit icon-edit text-success"></i>
                                        </a>
                                        <a href="{{ route('front.addresses.destroy', $address->id) }}">
                                            <i class="fa fa-trash icon-delete text-danger"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-6">
                                <div class="form_login">
                                    <h2> {{ __('Add Address') }} </h2>
                                    <form method="POST" action="{{ route('front.address.store') }}">
                                        @csrf
                                        <input class="Input" type="text" name="city"
                                            placeholder="{{ __('City') }}">
                                        @error('city')
                                            <span class="text-danger p-2">{{ $message }}</span>
                                        @enderror
                                        <input class="Input" type="text" name="district"
                                            placeholder="{{ __('District') }}">
                                        @error('district')
                                            <span class="text-danger p-2">{{ $message }}</span>
                                        @enderror
                                        <input class="Input" type="text" name="street"
                                            placeholder="{{ __('Street') }}">
                                        @error('street')
                                            <span class="text-danger p-2">{{ $message }}</span>
                                        @enderror
                                        <input class="Input" type="text" name="description"
                                            placeholder="{{ __('Detailed address') }}">
                                        <button>{{ __('Add') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ ((session()->get('tab') == 'wallet')) ? 'show active' : '' }}"
                        id="wallet" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <livewire:search-wallet />
                            <div class="col-4">
                                <div class="choseMoney">
                                  <h2>اختيار المبلغ</h2>
                                  <ul>
                                    <div class="form-check">
                                        <input class="form-check-input form-check-inputhid" type="radio" value=""  name="flexRadioDefault" id="flexRadioDefault1" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <li class="active">
                                            <h3> 50 <span>ريال</span></h3>
                                            <p>ضريبة القيمة المضافة 15.0 ريال</p>
                                            <div class="icon_mo_wal">
                                                <img src="{{ asset('build/frontend') }}/images/wallet.svg" alt="">
                                            </div>
                                            </li>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input form-check-inputhid" type="radio" value=""  name="flexRadioDefault" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <li >
                                            <h3> 100 <span>ريال</span></h3>
                                            <p>ضريبة القيمة المضافة 15.0 ريال</p>
                                            <div class="icon_mo_wal">
                                                <img src="{{ asset('build/frontend') }}/images/wallet.svg" alt="">
                                            </div>
                                            </li>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input form-check-inputhid" type="radio" value="" name="flexRadioDefault" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <li>
                                            <h3> 200 <span>ريال</span></h3>
                                            <p>ضريبة القيمة المضافة 15.0 ريال</p>
                                            <div class="icon_mo_wal">
                                                <img src="{{ asset('build/frontend') }}/images/wallet.svg" alt="">
                                            </div>
                                            </li>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                    <input class="form-check-input " type="radio" name="shipment_type" id="flexRadioDefault4" value="other">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            <li>
                                            <h3> مبلغ <span>اخر</span></h3>
                                            <p>ضريبة القيمة المضافة 15.0 ريال</p>
                                            <div class="icon_mo_wal">
                                                <img src="{{ asset('build/frontend') }}/images/wallet.svg" alt="">
                                            </div>
                                            </li>
                                        </label>

                                        <div class="col-12 mb-5">
                                            <input  class="Input" type="text" placeholder="{{ __('Other') }}"
                                                name="shipment_temperature_other" style="" id="otherTemp">
                                        </div>
                                    </div>

                                  </ul>
                                </div>
                              </div>
                            <div class="col-4">
                                <div class="form_login">
                                    <h2> {{ __("Add credit") }} </h2>
                                    <form>
                                        <input class="Input" type="text" placeholder="رقم البطاقة">
                                        <input class="Input" type="text" placeholder="اسم حامل البطاقة">
                                        <input class="Input" type="text" placeholder="شهر / سنة">
                                        <input class="Input" type="text" placeholder="رمز CVV">
                                        <button>اضف الان</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

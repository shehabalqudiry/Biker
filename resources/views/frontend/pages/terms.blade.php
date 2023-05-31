@extends('frontend.layouts.app')

@section('pageTitle', __('Terms and Conditions'))
@section('content')

  <section class="sngle_page">
    <div class="container container_log">
      <div class="accordion" id="accordionExample">
        @foreach ($data as $item)
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button {{ $loop->first ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $item->id }}"
              aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapseOne{{ $item->id }}">
              {{ $item->title }}
            </button>
          </h2>
          <div id="collapseOne{{ $item->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{ $item->content }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>



@endsection

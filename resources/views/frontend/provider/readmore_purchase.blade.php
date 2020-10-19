@extends('masters.frontmaster')

@section('title', __('Purchase Marketing'))
@section('main')

        <section class=" innerpage-banner">
            <img src="@if(isset($data[0]->image)){{asset('public/purchasemarketing/'.$data[0]->image)}} @endif" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text c-center">
                </div>
            </div>
        </section>
        <!-- Content -->
        <div id="content">
           <section class="get-body-sec row-am">
            <div class="container">
            @if(isset($data[0]->title))
              <h1 align="center">{{ $data[0]->title }}</h1>
              @endif
            @if(isset($data[0]->description))
              {{ $data[0]->description }}
              @endif
            </div>
            </section>
        </div>
        <!-- Content END -->
@endsection
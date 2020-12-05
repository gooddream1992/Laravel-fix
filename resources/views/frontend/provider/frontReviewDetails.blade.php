@extends('masters.frontmaster')

@section('title', __('Blog Details'))
@section('main')

<!-- Content -->
<div id="content">
    @if ($review)
    <section class="blogs-detail row-am">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-detail-box">
                        <div class="blog-detail-body">
                            <div class="blod-img mx-auto">
                                <div class="mx-auto" style="text-align:center">
                                    @php
                                        $profile_image = DB::table('profile_images')->where('escortId',$review->escort_id)->where('status','5')->first();
                                    @endphp
                                    @if ($profile_image->image)
                                        <img src="{{ asset('public/uploads/' . $profile_image->image) }}" class="w-100" style="height: 324px;width: auto !important;"/>
                                    @else 
                                        <img src="{{ asset('assets/frontend/images/nopic.jpg') }}" class="w-100" />
                                    @endif
                                </div>
                                <div class="text-center mt-5 pb-2" style="border-bottom: 1px solid #cbd5e0">
                                    from 
                                    <span class="h5 px-1">{{ $client->name }}</span>
                                    to
                                    <span class="h5 px-1">{{ $escort->name }}</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                {!! $review->testimonial !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <h1 class="text-center">Review doesnot exist!</h1>
    @endif
</div>
<!-- Content END -->
@endsection
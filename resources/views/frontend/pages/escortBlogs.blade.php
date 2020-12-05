@extends('masters.frontmaster')

@section('title', __('Profile Blogs'))

@section('main')
    <div class="container mx-auto pt-5 pb-3">
        <div class="sec-title">
            <h3>Blogs</h3>
        </div>

        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-4">
                <div class="my-blog-box" style="height: 250px;">
                    <div class="blog-img">
                        @if ($blog->imageurl)
                            <img src="{{ asset('public/client_library/upload/blog/' . $blog->imageurl) }}" class="w-100" />
                        @else 
                            <img src="{{ asset('public/client_library/upload/blog/blankphoto.png') }}" class="w-100" />
                        @endif
                    </div>
                    <div class="blog-overview">
                        <p class="post-date">{{ $blog->created_at }}</p>
                        <h5>{{ $blog->title }}</h5>
                        <a href="{{ route('multi.blog.details', $blog->id) }}" class="read-fblog">Read full blog »</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{ $blogs->links() }}
    </div>
@endsection
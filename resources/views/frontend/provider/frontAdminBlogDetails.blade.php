@extends('masters.frontmaster')

@section('title', __('Blog Details'))
@section('main')

<!-- Content -->
<div id="content">
    @if ($blog)
    <section class="blogs-detail row-am">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-detail-box">
                        <div class="blog-detail-head">
                            <h2>{{ $blog->title }}</h2>
                            <ul>
                                <li>by <span class="mx-1">{{ $creator->name }}</span></li>
                                <li>{{ $blog->created_at->format('jS F \\, Y') }}</li>
                            </ul>
                        </div>
                        <div class="blog-detail-body">
                            <div class="blod-img mx-auto mt-5">
                                @if ($blog->imageurl)
                                    <img src="{{ asset('public/uploads/' . $blog->imageurl) }}" class="w-100 rounded" />
                                @else 
                                    <img src="{{ asset('public/client_library/upload/blog/blankphoto.png') }}" class="w-100 rounded" />
                                @endif
                            </div>
                            <div class="blog-content mt-5">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Comments --}}
    <section class="comments mt-5">
        <div class="container">
            <div class="blog-detail-title">{{ $comments->count() }} Comments</div>
            @if ($comments->count() > 0)
                @foreach ($comments as $comment)
                <div class="w-100 mb-3 pt-3" style="border-top: 1px solid #e2e8f0">
                    <div class="d-flex justify-content-between px-3">
                        <div style="width: 8% !important">
                            @if ($comment->userImage)
                                <img src="{{ asset('public/uploads/' . $comment->userImage) }}" class="w-100 rounded">
                            @else
                                <img src="{{ asset('public/blankphoto.png') }}" class="w-100 rounded">
                            @endif
                        </div>
                        <div style="width: 92% !important" class="pl-5 py-2">
                            <div class="h5 text-uppercase">{{ $comment->userName ?? $comment->name }}</div>
                            <p class="text-secondary">{{ $comment->created_at }}</p>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>

    {{-- Comment Form --}}
    <section class="contact-form-wraper mt-5">
        <div class="container">

            @guest
            @else
            <div class="blog-detail-title">write a comment</div>
            @endguest
            <div class="contact-form-inner">
                @php $saved = explode(';', Cookie::get('blog_form')) ?? null @endphp
                <form method="POST" action="{{ route('admin.blog_comment.store', $blog->id) }}">
                    @csrf
                    @guest
                    @else
                    <div class="row">
                        <div class="ml-2 pl-1 pb-4">Post a comment as <strong class="pl-1">{{ Auth::user()->name }}</strong></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="message">
                                <textarea class="input textarea" name="comment" placeholder="Enter your comment here"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="btn btn-danger s-btn red-small" type="submit">POST COMMENT</button>
                            </div>
                        </div>
                        @endguest
                    </div>
                </form>
            </div>
        </div>
    </section>
    @else
    <h1 class="text-center">Blog doesnot exist!</h1>
    @endif
</div>
<!-- Content END -->
@endsection
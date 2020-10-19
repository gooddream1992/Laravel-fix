@extends('masters.frontmaster')

@section('title', __('Blog Details'))
@section('main')

<!-- Content -->
        <div id="content">

            <section class="blogs-detail row-am">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="blog-detail-box">

                            		 <?php $blogs2 =\App\Blog::all()->where('status', 2)->where('id', $id);?>
          @foreach($blogs2 as $blog2)
                                <div class="blog-detail-head">
                                    <h2>{{$blog2->title}}</h2>
                                    <ul>
                                        <li>by <span>@if($blog2->publishBy==0) None @else {{\App\User::find($blog2->publishBy)->name}} @endif</span></li>
                                        <li>{{$blog2->created_at}}</li>
                                    </ul>
                                </div>
                                @endforeach

                                 @foreach($blogs2 as $blog2)
                                <div class="blog-detail-body">
                                    <div class="blod-img">
                                        <img src="{{asset('public/uploads/'.$blog2->imageurl)}}" class="w-100" />
                                    </div>
                                    <div class="blog-content">
                                        {!! $blog2->description !!}

                                        
                                    </div>
                                </div>
                                   @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php $comments= \App\LikeComment::all();?>
            <section class="comments">
                <div class="container">
                    <div class="blog-detail-title">{{$comments->count()}} Comments</div>
                    <div class="row">
                        <div class="comments-wrap ">
                        	@foreach($comments as $commnt)
                            <div class=" col-sm-12 col-md-12 col-lg-12">
                                <div class="comment-one">
                                	 <?php $pfpic=\App\User::find($commnt->userId)->photo;?>
                                    <div class="comnt-image"><img src="{{asset('public/uploads/'.$pfpic)}}"></div>
                                    <div class="coment-data">
                                        <div class="person-name">@if($commnt->userId==0) None @else {{\App\User::find($commnt->userId)->name}} @endif</div>
                                        <div class="time">{{$commnt->updated_at->diffForHumans()}}</div>
                                        <p>{{$commnt->comments}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--single end-->
                            @endforeach
                           


                            
                        </div> <!--single end-->
                    </div>
                </div>
            </section>

           @if(Auth::check())
            <section class="contact-form-wraper">
                <div class="container">
                    <div class="blog-detail-title">write a comment</div>
                    <div class="contact-form-inner">
                        <form role="form" method="POST" action="{{url('like/comment/store')}}">
            {{ csrf_field() }}
              @foreach($blogs2 as $blog2)
             <input type="hidden" name="escortId" value="{{$blog2->publishBy}}">
             @endforeach
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <input type="hidden" name="likes" value="0">

                            <div class="row">
                                <div class="col-md-6 col-sm-12 nrow">

                                    <input type="text" class="input" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-sm-12 nrow">

                                    <input type="text" class="input" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="message">
                                        <textarea class="input textarea" name="comments" placeholder="Enter your comment here"></textarea>
                                    </div>
                                    <div>
                                        <div class="form-check selection">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Save my name, email, and website in this browser for the next time I comment.  </label>
                                        </div>

                                    </div>
                                    <div class="submit-btn">
                                      <button type="submit" class="red-small btn-block"> POST Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            @endif



        </div>
        <!-- Content END -->
@endsection
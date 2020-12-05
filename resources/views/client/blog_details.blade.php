@extends('client.master.layouts')
@section('title', 'Page Title')
@section('header_title', 'Blog Detail')
@section('home')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<style>
* {
  box-sizing: border-box;
}
.leftcolumn {   
  float: left;
  width: 100%;
  margin-left: 20px;
  margin-right: 20px;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  width: 100%;
  padding: 20px;
  align-self: flex-end;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   padding-left: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
<div class="col-md-9 right-content">

<div class="row">
  <div class="leftcolumn">
  	@foreach($blog_details as $blog)
    <div class="card">
      <h2>{{ $blog->title }}</h2>
      <?php 
      	$date = date('Y-m-d', strtotime($blog->created_at));
      ?>
      <h5>Author {{ $blog->name }}, {{ $date }}</h5>
      <div class="fakeimg" style="">
        @if(isset($blog->image))
      	<img src="{{ asset('public/client_library/upload/blog/'.$blog->image) }}" alt="" class="fakeimg" style="height:65%;">
        @else
        <img src="{{ asset('public/client_library/image/no_image_found.png')  }}" alt="" class="fakeimg" style="height:65%;">
        @endif
      <p>{!! $blog->description !!}</p>
    </div>
    <div class="row">
    <a href="{{ route('client.blog.edit',$blog->id) }}" class="btn btn-primary" style="width: 140px; align-content: center;">
        <img src="{{ asset('public/client_library/image/edit.png') }}" width="20" height="20">
          Edit Blog
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('client.blog.delete',$blog->id) }}" class="btn btn-primary" style="width: 140px; align-content: center;">
      <img src="{{ asset('public/client_library/image/delete.png') }}" width="20" height="20">
        Delete Blog
    </a>
  </div>
    @endforeach
  </div>

</div>
</div>

<!-- Content END -->
<script>
   ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
      console.error( error );
   });
</script>
@endsection
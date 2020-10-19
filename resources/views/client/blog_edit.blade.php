@extends('client.master.layouts')
@section('title', 'Page Title')
@section('header_title', 'Blog Edit')
@section('home')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form action="{{ route('client.blog.update') }}" method="post" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $blog_details->id }}">
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="form-group">
                  <label class="d-block">Title</label>
                  <input type="text" class="form-control" name="title" value="@if(isset($blog_details->title)){{ $blog_details->title }}@endif">
               </div>
               <div class="form-group">
                  <label class="d-block">Description</label> 
                  <textarea name="description" id="editor" style="height: 200px;">@if(isset($blog_details->description)){{ $blog_details->description }}@endif</textarea>
               </div>
               <div class="form-group">
                  <label class="d-block">Image</label>
                  <div class="custom-file gray-upload">
                     <input type="file" class="custom-file-input" id="customFile" name="imageurl">
                     <label class="custom-file-label" for="customFile"></label>
                     <br><br>
                     <input type="hidden" name="imageurl" value="@if(isset($blog_details->image)){{ $blog_details->image }}@endif">
                     @if(isset($blog_details->image))
                     <img src="{{ asset('public/client_library/upload/blog/'.$blog_details->image)  }}" alt="" style="width: 100px !important; height:100px !important; ">
                     @else
                     <img src="{{ asset('public/client_library/image/no_image_found.png')  }}" alt="" style="width: 100px !important; height:100px !important; ">
                     @endif
                  </div>
               </div>
            </div>
         </div><br><br>
         <div class="row">
            <div class="col-md-12">
               <input type="submit" name="submit" class="submit-btn">
            </div>
         </div>
      </form>
   </div>
   <div class="box">
      <div class="blog-list">
         <div class="row">
         </div>
      </div>
   </div>
</div>
</section>
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
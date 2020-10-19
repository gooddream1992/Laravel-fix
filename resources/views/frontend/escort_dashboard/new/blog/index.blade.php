@extends('masters.profileMaster')

@section('title', 'Escort - Blog')
@section('header_title', 'Blog')
@section('content')
<style>
   .ck-editor__editable p{
      height: 250px;
   }
</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form action="{{ route('escort.blog.store') }}" method="post" enctype="multipart/form-data">
           @csrf
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="form-group">
                  <label class="d-block">Title</label>
                  <input type="text" class="form-control" name="title">
               </div>
               <div class="form-group">
                  <label class="d-block">Description</label> 
                  <textarea name="description" id="editor"></textarea>
               </div>
               <div class="form-group">
                  <label class="d-block">Image</label>
                  <div class="custom-file gray-upload">
                     <input type="file" class="custom-file-input" id="customFile" name="imageurl">
                     <label class="custom-file-label" for="customFile"></label>
                  </div>
               </div>
            </div>
         </div>
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
            @foreach($blog as $blogs)
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     @if(isset($blogs->imageurl))
                     <img src="{{ asset('/public/client_library/upload/blog/'.$blogs->imageurl) }}" class="w-100" alt="blog-img">
                     @else
                     <img src="{{ asset('public/client_library/image/no_image_found.png')  }}" class="w-100" alt="blog-img">
                     @endif
                  </div>
                  <div class="blog-overview">
                     <?php
                        $date = date('Y-m-d', strtotime($blogs->created_at));
                        $out = strlen($blogs->description) > 50 ? substr($blogs->description,0,50).".." : $blogs->description;
                     ?>
                     <p class="post-date"><b>{{ $date }}</b></p>
                     <h5><?php echo $out; ?></h5>
                     <a href="{{ route('escort.blog.details',$blogs->id) }}" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
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
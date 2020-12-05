@extends('masters.profileMaster')

@section('title', 'Escort - Photos')

@section('content')

<style>
.remove-img-btn
{
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #f8060a;
    color: #fff;
    transform: translate(-50%,-50%);
    line-height: normal;
    height: 38px;
    width: 38px;
    text-align: center;
    line-height: 38px;
    border-radius: 4px;
    box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.8);
    display: none;
}
</style>

<form method="POST" action="{{ route('profile.photos.store', $id) }}" enctype="multipart/form-data" id="imageFormProfile">
    @csrf

    @include('partials._profileSteps')
    
    <div class="clearfix row">
        <div class="col-md-12">
            <div class="form-box">
                <div class="box-body">
                    <div class="gallery-grid-box">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#photo-gallery" onclick="setStatus(2)">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#slider" onclick="setStatus(1)">Slider</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#video" onclick="setStatus(3)">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#selfie-gallery" onclick="setStatus(4)">Selfie Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#thumbnail-gallery" onclick="setStatus('thumbnail')">Thumbnail Photo</a>
                            </li>
                        </ul>
    
<?php
    $user = \app\User::where('id','=',$id)->get();    
    // echo Auth::user()->roleStatus; exit;
?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            {{-- Gallery --}}
                            <div class="tab-pane  active" id="photo-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        
                                        <!-- Capture Verfication Image Show Below -->
                                        @if(Session::has('main_login_type') && Auth::user()->parent_id == '')
                                            @foreach ($user as $value) 
                                                @if(!empty($value->verification_photo))
                                                <div class="col-lg-12 col-md-12 gallery-img-box" style="padding-left: 40%;">
                                                    <a href="#">
                                                        <img src="{{ asset('public/verification/'.$value->verification_photo) }}">   
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        <!-- Capture Verfication Image Show Above -->

                                        @if (array_key_exists('gallery', $images))
                                            @foreach ($images['gallery'] as $image)
                                                <div class="col-lg-3 col-md-6 gallery-img-box">
                                                    <a href="{{ route('profile.photos.show', [$id, $image->id]) }}" >
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </a>
                                                     <a href="{{ route('profile.delete',[$id,$image->id,$image->image]) }}" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>                                                
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            
                            {{-- Slider --}}
                            <div class="tab-pane  fade" id="slider">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        @if (array_key_exists('slider', $images))
                                            @foreach ($images['slider'] as $image)
                                            <div class="gallery-img-box col-lg-3 col-md-6">
                                                <a href="{{ route('profile.photos.show', [$id, $image->id]) }}">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </a>
                                                    <a href="{{ route('profile.delete',[$id,$image->id,$image->image]) }}" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                                @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            {{-- Video --}}
                            <div class="tab-pane  fade" id="video">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                    @if (array_key_exists('video', $images))
                                        @foreach ($images['video'] as $image)
                                        <div class="gallery-img-box col-lg-3 col-md-6">
                                            <a class="" href="{{ route('profile.photos.show', [$id, $image->id]) }}">
                                                    {{-- <img src="/public/uploads/{{ $image->image }}" class="w-100" /> --}}
                                                    @php
                                                        $ext = pathinfo( asset('public/uploads/'.$image->image), PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if($ext == 'mp4' || $ext == 'webm')
                                                        <video width="358" height="268" controls>
                                                            <source src="{{ asset('public/uploads/'.$image->image) }}" type="video/mp4">
                                                        </video>
                                                    @else
                                                        <img src="{{asset('public/uploads/'.$image->image)}}" class="w-100">
                                                    @endif

                                                </a>
                                                    <a href="{{ route('profile.delete',[$id,$image->id,$image->image]) }}" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                        @endforeach
                                    @endif    
                                    </div>
                                </div>
                            </div>
    
                            {{-- Selfie --}}
                            <div class="tab-pane  fade" id="selfie-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        @if (array_key_exists('selfie', $images))
                                            @foreach ($images['selfie'] as $image)
                                                <div class="gallery-img-box col-lg-3 col-md-6">
                                                    <a href="{{ route('profile.photos.show', [$id, $image->id]) }}">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </a>
                                                    <a href="{{ route('profile.delete',[$id,$image->id,$image->image]) }}" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="tab-pane  fade" id="thumbnail-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="gallery-img-box">
                                                @if (array_key_exists('thumbnail', $images))
                                                    @foreach ($images['thumbnail'] as $image)
                                                    <input type="hidden" name="old_photo" value="{{ $image->image }}">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="status" id="status" value="2">

    <div class="d-flex mt-4">
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" id="customFile" name="uploaded_image[]" multiple="multiple">
            <label class="custom-file-label text-white" for="customFile"></label>
        </div>
        <!-- <button class="submit-btn px-3 py-0 ml-3">Upload Image</button> -->
    </div>
    <p style="color: red;padding: 18px 0px;display:none;" id="thumbnail_err">*Add Portrait side (best fit size 320 x 470 pixel)</p>
</form>

<script>
    function setStatus(status) {
        if(status=='thumbnail')
        {
            $("#thumbnail_err").show();
        }
        else
        {
            $("#thumbnail_err").hide();
        }
        if(status==3)
        {
            $("#customFile").attr('accept','video/*');
        }
        else{
            $("#customFile").attr('accept','');
        }
        $('#status').val(status);
    }

    $("#customFile").change(function(){
        $("#imageFormProfile").submit();
    });
</script>
@endsection
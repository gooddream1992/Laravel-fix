@extends('masters.profileMaster')

@section('title', 'Escort - Photos')

@section('content')
<form method="POST" action="{{ route('profile.photos.store', 2) }}" enctype="multipart/form-data">
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
    
                        <!-- Tab panes -->
                        <div class="tab-content">
    
                            {{-- Gallery --}}
                            <div class="tab-pane  active" id="photo-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        @if (array_key_exists('gallery', $images))
                                            @foreach ($images['gallery'] as $image)
                                                <a class="col-lg-3 col-md-6" href="{{ route('profile.photos.show', $image->id) }}">
                                                    <div class="gallery-img-box">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </div>
                                                </a>
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
                                                <a class="col-lg-3 col-md-6" href="{{ route('profile.photos.show', $image->id) }}">
                                                    <div class="gallery-img-box">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </div>
                                                </a>
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
                                            <a class="col-lg-3 col-md-6" href="{{ route('profile.photos.show', $image->id) }}">
                                                <div class="gallery-img-box">
                                                    <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                </div>
                                            </a>
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
                                                <a class="col-lg-3 col-md-6" href="{{ route('profile.photos.show', $image->id) }}">
                                                    <div class="gallery-img-box">
                                                        <img src="/public/uploads/{{ $image->image }}" class="w-100" />
                                                    </div>
                                                </a>
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
                                                <img src="/public/uploads/{{ $thumbnail->photo }}" class="w-100" />
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
            <input type="file" class="custom-file-input" id="customFile" name="uploaded_image">
            <label class="custom-file-label text-white" for="customFile"></label>
        </div>
        <button class="submit-btn px-3 py-0 ml-3">Upload Image</button>
    </div>
</form>

<script>
    function setStatus(status) {
        $('#status').val(status);
    }
</script>
@endsection
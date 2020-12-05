@extends('masters.profileMaster')

@section('title', 'Escort - Photos')

@section('content')
<div>
    <a href="{{ route('profile.photos.index', $id) }}" class="submit-btn px-3 py-2">
        <i class="icofont-double-left"></i>
        Go Back
    </a>
    
    <div class="gallery-img-box mt-5">
        <img src="/public/uploads/{{ $image->image }}" width="350px" />
    </div>
    
    <div class="mt-5 d-flex justify-content-between">
        <form class="d-flex" method="POST" action="{{ route('profile.photos.update', $image->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="custom-file" style="width: 300px">
                <input type="file" class="custom-file-input" id="customFile" name="uploaded_image">
                <label class="custom-file-label text-white" for="customFile"></label>
            </div>
        
            <button class="submit-btn px-3 py-0 ml-3" type="submit">Update Image</button>
        </form>

        <form method="POST" action="{{ route('profile.photos.delete', [$id, $image->id]) }}">
            @csrf
            <button class="submit-btn px-3 py-0" type="submit">Delete Image</button>
        </form>
    </div>
</div>
@endsection
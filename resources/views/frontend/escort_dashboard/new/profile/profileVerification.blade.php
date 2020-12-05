@extends('masters.profileMaster')

@section('title', 'Profile - Verification')
@section('content')
@include('partials._profileSteps')

<link rel="stylesheet" href="{{ asset('public/webcam/main.css') }}" type="text/css" media="all">
<script src="{{ asset('public/webcam/capture.js') }}"></script>

@if ($escort->request == '0' && !empty($escort->verification_photo))
    <div class="card custom-box-message bg-dark mx-auto mt-3">
        <div class="card-body d-flex justify-content-center align-items-center">
            <i class="icofont-check-circled text-success display-3 mx-2"></i> 
            <div class="h3 text-white">Your account is in process of verfication please wait for verify</div>
        </div>
    </div>
@elseif($escort->request == '1' && !empty($escort->verification_photo))
    <div class="card custom-box-message bg-dark mx-auto mt-3">
        <div class="card-body d-flex justify-content-center align-items-center">
            <i class="icofont-check-circled text-success display-3 mx-2"></i> 
            <div class="h3 text-white">Your account has been verified</div>
        </div>
    </div>
@else
    @if($escort->request == '2')
    <div class="card custom-box-message bg-dark mx-auto mt-3" >
        <div class="card-body d-flex justify-content-center align-items-center">
            <i class="icofont-close-circled text-danger display-3 mx-2"></i> 
            <div class="h3 text-white">Your account has been denied by admin. Please proceed with a new photo.</div>
        </div>
    </div>
    @endif
    <form class="pt-5 mt-5 " method="POST" action="{{ route('profile.verification.update', $escort->id) }}"  enctype="multipart/form-data">
       @csrf
       <div class="webcam"></div>
       <div class="d-flex justify-content-between align-items-center w-75 mx-auto">
          <div class="ml-5 mt-3">
             <table class="table table-borderless" style="color: white;">
                <tr>
                   <td>
                      <label class="d-block" style="color: white;">Take Snap</label>      
                   </td>
                   <td>
                      <label class="d-block" style="color: white;">Captured</label>      
                   </td>
                </tr>
                <tr>
                   <td>
                      <video id="video">Video stream not available.</video>
                      <canvas id="canvas"></canvas>
                   </td>
                   <td>
                      <img id="photo" alt="The screen capture will appear in this box.">
                      <input type="hidden" name="verification" id="verification">      
                   </td>
                </tr>
                <tr>
                   <td>
                      <button id="startbutton" type="button" class="btn btn-success">Take photo</button>                
                   </td>
                   <td>
                      <button class="btn btn-success" id="upload" type="submit">Upload</button>                 
                   </td>
                </tr>
             </table>
          </div>
       </div>
    </form>

    <h2 style="color: white; text-align: center;">OR</h2>

    <form method="POST" action="{{ route('profile.verification.update', $escort->id) }}" id="imageFormProfile" enctype="multipart/form-data">
       @csrf
       <div class="d-flex justify-content-between align-items-center w-75 mx-auto">
          <div class="ml-5 mt-3">
             <table class="table table-borderless" style="color: white;">
                <tr>
                   <td>
                      <label class="d-block btn btn-success" style="color: white;">
                      Browse Image
                      <input type="file" name="verification_self" id="customFiles" style="display: none;">
                      </label>
                   </td>
                </tr>
             </table>
          </div>
       </div>
    </form>
@endif
    <script>
$(document).ready(function() {
    $("#upload").on('click', function() {
        var imgsrc = $('#photo').attr('src');
        $("#verification").val(imgsrc);
    });
});
$("#customFiles").change(function() {
    $("#imageFormProfile").submit();
});
</script>
@endsection
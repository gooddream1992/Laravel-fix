@extends('masters.profileMaster')
@section('title', 'New Profiles')
@section('header_title', 'New Profiles')

@section('content')

<form>
    <div class="clearfix row">
        <div class="col-md-12 ">
            <div class="profile-list">
                <div class="row">
                    @foreach ($new_profiles as $profile_details)
                    @php                                          
                        $profile_images = \App\ProfileImage::where([
                            ['escortId','=',$profile_details->id],
                            ['status','=',5]
                        ])->get();
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <!-- <div class="profile-box" style="height:430px;width:315px"> -->
                        <!--<div class="profile-box" style="height:430px;">-->
                        <div class="profile-box">
                            <a href="{{ route('profile-guest',$profile_details->id) }}">
                                @foreach($profile_images as $value)
                                    @if(isset($value->image) && !empty($value->image) )
                                        <img class="w-100" src="{{asset('public/uploads/'.$value->image)}}">                                
                                    @else 
                                        <img class="w-100" src="{{asset('public/blankphoto.png')}}"> 
                                    @endif
                                @endforeach
                                <p>{{ $profile_details->name }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function () {
    $("#page_header_heading").html('New Profiles');
});
function unfriend(current_user_id, escort_id, escort_name)
{
    Swal.fire(
            {
                title: 'Are you sure? Do you want to unfriend "' + escort_name + '"',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) =>
    {
        if (result.isConfirmed)
        {
            Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    );
            $.ajax({
                type: "POST",
                url: "{{ route('client.unfriend') }}",
                data: {current_user_id: current_user_id, escort_id: escort_id, "_token": "{{ csrf_token() }}"},
                dataType: "JSON",
                success: function (response) {
                    if (response == '1')
                    {
                        location.reload();
                    }
                }
            });
        }
    })
}
</script>
@endsection
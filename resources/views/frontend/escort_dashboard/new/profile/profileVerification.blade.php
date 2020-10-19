@extends('masters.profileMaster')

@section('title', 'Profile - Verification')

@section('content')
    @include('partials._profileSteps')
    
    @if ($escort->activation == 1)
        <div class="card bg-dark mx-auto mt-3" style="width: 35%;">
            <div class="card-body d-flex justify-content-center align-items-center">
                <i class="icofont-check-circled text-success display-3 mx-2"></i> 
                <div class="h3 text-white text-center">Your account has been activated</div>
            </div>
        </div>
    @else 
    <div class="d-flex justify-content-between align-items-center w-75 mx-auto">
        <div class="gallery-img-box">
            <img src="/public/uploads/{{ $escort->photo }}" width="350px" />
        </div>

        <div class="ml-5 mt-3">
            <table class="table table-borderless">
                <tr>
                    <td style="width: 175px"><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Name</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $escort->name }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Age</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $escort->age }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Gender</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ ($escort->gender == 1) ? 'Male' : 'Female' }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Phone</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $escort->phone }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Email</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $escort->email }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">City</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $city->city }}</h1></td>
                </tr>

                <tr>
                    <td><h3 style="color: lightgray" class="mt-2 my-3 pl-3">Country</h3></td>
                    <td><h1 class="text-white my-2 pr-3">{{ $country->country }}</h1></td>
                </tr>
            </table>
        </div>
    </div>
    
    <form class="pt-5 mt-5" method="POST" action="{{ route('profile.verification.update', $escort->id) }}">
        @csrf 
        
        <div class="custom-control custom-checkbox text-center">
            <input type="checkbox" class="custom-control-input" id="terms_conditions" name="terms_conditions">
            <label class="custom-control-label text-white h5" for="terms_conditions">&nbsp; 
                By clicking this you acknowledge that your provided information is correct, 
                and you accept our Terms & Conditions and Privacy Policy.
            </label>
            <p class="text-white h6 mt-3">(Note: After activation your profile will be available and visible publicly.)</p>
        </div>

        <div class="d-flex justify-content-center w-100 mt-4">
            <button class="submit-btn mx-auto px-3">Activate my Account</button>
        </div>
    </form>
    @endif
@endsection
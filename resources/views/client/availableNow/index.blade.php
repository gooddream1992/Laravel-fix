@extends('client.master.layouts')
@section('title', 'Available Now')
@section('home')
<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form>
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="profile-list">

                  <div class="row">
                     @foreach ($user as $key => $value) 
                        @if(($value->gender == Auth::user()->interested_in_male && Auth::user()->interested_in_male != 0) || ($value->gender == Auth::user()->interested_in_female && Auth::user()->interested_in_female != 0) || ($value->gender == Auth::user()->interested_in_trans && Auth::user()->interested_in_trans != 0) || ($value->gender == Auth::user()->interested_in_gay && Auth::user()->interested_in_gay != 0))
                           <div class="col-lg-3 col-md-6">
                              <div class="profile-box">
                                 <a href="/profile/{{ $value->id }}">
                                    <img style="height: 322px;" class="w-100" src="{{ asset('public/uploads/'.$value->photo) }}">
                                    <p>{{ $value->name }}</p>
                                 </a>
                              </div>
                           </div>
                        @endif
                     @endforeach

                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
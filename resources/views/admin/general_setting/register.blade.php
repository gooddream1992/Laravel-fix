@extends('masters.master')

@section('main')

<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('user/store') }}">
                        @csrf




                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                               <select name="gender" class="form-control">
                                   <option value="1">Male</option>
                                   <option value="2">Female</option>
                                   <option value="3">Guy</option>
                               </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Status') }}</label>

                            <div class="col-md-6">
                               <select name="roleStatus" class="form-control">
                                   <option value="1">Admin</option>
                                   <option value="2">Escort</option>
                                   <option value="3">User</option>
                               </select>
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                        <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                      </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">

                          </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="city_id" id="selectCity">

                          </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                              <input type="text" name="code" class="form-control">
                            </div>
                        </div>











                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>


<script>
        function selectcountry(){
            $.ajax({
                url:"{{route('select_country')}}",
                method:'GET',
                data:{'country_id':$('#selectCountry').find(':selected').val()},
                success:function(data){
                    $('#stateSelect').text(' ');
                   for (var i = 0; i < data.states.length; i++) {
                       $('#stateSelect').append('<option value="'+data.states[i].id+'">'+data.states[i].state+'</option>');
                   }
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function selectstate(){
            $.ajax({
                url:"{{route('select_state')}}",
                method:'GET',
                data:{'state_id':$('#stateSelect').find(':selected').val()},
                success:function(data){
                     $('#selectCity').text(' ');
                    for (var k = 0; k < data.citys.length; k++) {
                        $('#selectCity').append('<option value="'+data.citys[k].id+'">'+data.citys[k].city+'</option>');
                    }
                },
                error:function(err){
                    console.log(err);
                }


            })
        }
    </script>
@endsection

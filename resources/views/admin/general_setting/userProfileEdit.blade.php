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
                <div class="card-header">{{ __('Profile Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('profile/update') }}">
                        @csrf


                       @foreach($users as $user)

                       <input type="hidden" name="id" value="{{$user->id}}">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>

                     
                      <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shift Status') }}</label>

                            <div class="col-md-6">
                               <select name="shift" class="form-control"  value="{{$user->shift}}">
                                   <option value="1">1st Shift</option>
                                   <option value="2">2nd Shift</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                               <textarea name="address" class="textarea">{{$user->address}}</textarea>
                            </div>
                        </div>


                        @endforeach


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
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
@endsection

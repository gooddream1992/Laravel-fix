@extends('masters.master')

@section('title', __('User List'))
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">User List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Activation') }}</th>
                
                <th>{{ __('Role') }}</th>
                <th>{{ __('Gender') }}</th>
                <th>{{ __('Phone No.') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   
                 <?php $i=1;?>
              @foreach($users as $user)
              <tr>
                <td>00{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td>@if($user->activation==1) <a href="" class="btn btn-success">Active</a> @else <a href="" class="btn btn-warning">Deactive</a> @endif</td>
                <td>@if($user->roleStatus==1) Admin @elseif($user->roleStatus==2) Escort @else User @endif</td>
                 <td>@if($user->gender==1) Male @elseif($user->gender==2) Female @else Guy @endif</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->country}}, {{$user->city}}, {{$user->suburb}}, {{$user->code}}</td>

               
                <td>
                  <a href="{{url('escort/modify/'.$user->id)}}" class="btn btn-xs btn-primary">Modify</a>
                  <a href="{{ route('user.list.delete',[$user->id,$user->name]) }}" class="btn btn-xs btn-danger">Delete</a>
                </td>
             
              
                
              </tr>
              @endforeach
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>
@endsection
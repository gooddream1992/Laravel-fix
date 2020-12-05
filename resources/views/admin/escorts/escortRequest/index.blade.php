@extends('masters.editormaster')
@section('title', __('Escort Profile Request List'))
@section('main')
<div class="content-wrapper">
    <section class="content-header">
       <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
             <div class="card-header">
                <h3 class="card-title FormTitle">Escort Profile Request List</h3>
             </div>
             <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                      <tr>
                         <th>ID No.</th>
                         <th>Name</th>
                         <th>Gender</th>
                         <th>Phone No.</th>
                         <th>Email Id</th>                        
                          <th>Request Status</th>
                         <th>Action</th>
                        
                      </tr>
                   </thead>
                   <tbody>
                        @php
                            $i = 1
                        @endphp
                       @foreach($user as $value)
                      <tr>
                         <td>
                             {{ $i++ }}
                        </td>
                         <td>
                             {{ $value->name }}
                        </td>
                         <td>
                            @if($value->gender == 1)
                                Male
                            @elseif($value->gender == 2)
                                Female
                            @elseif($value->gender == 3)
                                Trans gender
                            @elseif($value->gender == 4)
                                Gay
                            @endif
                        </td>
                        <td>
                            {{ $value->phone }}
                        </td>
                        <td>
                            {{ $value->email }}
                        </td>
                        <td>
                          @if($value->request == 1)
                            Accepted
                          @elseif($value->request == 2)
                            Deny
                          @else
                          Pending
                          @endif
                        </td>
                        <td>
                            <a href="{{ route('profile.stats.index', $value->id) }}" class="btn btn-xs btn-secondary">Check Profile</a>
                            <!-- <a href="{{ route('admin.escort.profile.request.accept',[$value->id,$value->name,1]) }}" class="btn btn-xs btn-success" @if($value->request == 1) style="display:none;" @endif>Accept</a>
                            <a href="{{ route('admin.escort.profile.request.accept',[$value->id,$value->name,2]) }}" class="btn btn-xs btn-warning" @if($value->request == 2) style="display:none;" @endif>Deny</a>                            
                             -->
                             <a href="{{ route('admin.escort.profile.request.accept',[$value->id,$value->name,1]) }}" class="btn btn-xs btn-success">Accept</a>
                            <a href="{{ route('admin.escort.profile.request.accept',[$value->id,$value->name,2]) }}" class="btn btn-xs btn-warning">Deny</a>                            
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
@extends('masters.master')
@section('title', 'Location')
@section('main')
<style>
  .pagination{
    float: right;
  }
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title FormTitle">Manage City</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
            </div>
            <div class="row">
               <div class="col-md-12">
                  <a href="{{ route('admin.location.stateadd',$id) }}" style="margin-bottom: 1%" class="btn btn-xs btn-warning">Add Bulk City</a>
                  <table class="table table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th>{{ __('ID No.') }}</th>
                           <th>{{ __('Country Id') }}</th>
                           <th>{{ __('City Name') }}</th>
                           <th>{{ __('Photo') }}</th>
                           <th>{{ __('Action') }}</th>
                        </tr>
                     </thead>
                     <tbody>
                     	@php
          						$i = 1
          						@endphp
                        @foreach($states as $state)
                        <tr>
                           <td>{{$i++}}</td>
                           <td>{{$state->country}}</td>
                           <td>{{$state->state}}</td>
                           <td>@if($state->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$state->image)}}" style="width: 30px;">@endif</td>
                           <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg-state{{$state->stateid }}">Modify</a>
                              <a href="{{url('state/delete/'.$state->stateid)}}" class="btn btn-xs btn-danger">Delete</a>
                              <a href="{{ route('admin.location.city',$state->stateid) }}" class="btn btn-xs btn-secondary">Manage Suburb</a>
                           </td>
                        </tr>
                        @endforeach
                  </table>
                  {{ $states->links() }}
               </div>
            </div>
            <!-- Modal Start================ -->
@foreach($states as $state)
<div class="modal fade" id="modal-lg-state{{$state->stateid}}">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header" style="background: #822d2d;">
            <h4 class="modal-title">Modify Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form role="form" method="POST" action="{{url('state/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
               <input type="hidden" name="id" value="{{$state->stateid}}">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('Country') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select name="country_id" class="form-control">
                                    @foreach($country as $value)
                                      <option value="{{ $value->id }}" @if($value->id == $state->country_id) Selected @endif >
                                        @if($value->id == $state->country_id) Current @endif {{ $value->country }}
                                      </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('City') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="state" class="form-control" value="{{$state->state}}">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="selct_2_alska">
                                 <input name="image" type="file" accept="image/*" value="{{$state->image}}">
                                 <img src="{{asset('public/uploads/'.$state->image)}}" style="width:200px;">
                                 <p class="help-block">{{ __('Upload City Thumbnail max 1mb') }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
         </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->
@endforeach
<!-- Modal Start================ -->

            <div class="row">
               <div class="col-lg-12">
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
               </div>
            </div>
         </div>
      </div>
</section>
</div>
@endsection
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
            <h3 class="card-title FormTitle">Location</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                  <form role="form" method="POST" action="{{url('country/store')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('Country') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="country">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-4">
                  <form role="form" method="POST" action="{{url('state/store')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('Country') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country}}</option>
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
                                 <input type="text" name="state">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="selct_2_alska">
                                 <input name="image" type="file" accept="image/*" value="0">
                                 <img src="{{asset('public/blankphoto.png')}}">
                                 <p class="help-block">{{ __('Upload City Thumbnail max 1mb') }}</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-4">
                  <form role="form" method="POST" action="{{url('city/store')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('City') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select class="form-control" name="state_id">
                                    <?php $states=\App\State::all();?>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->state}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('Suburb') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="city">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th>{{ __('ID No.') }}</th>
                           <th>{{ __('Country Name') }}</th>
                           {{-- <th>{{ __('Photo') }}</th> --}}
                           <th>{{ __('Action') }}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php ?>
                        @foreach($countries_table as $country)
                        <tr>
                           <td>{{$country->id}}</td>
                           <td>{{$country->country}}</td>
                           {{-- <td>@if($country->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$country->image)}}" style="width: 30px;">@endif</td> --}}
                           <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg{{$country->id }}">Modify</a>
                              <a href="{{url('country/delete/'.$country->id)}}" class="btn btn-xs btn-danger">Delete</a>
                              <a href="{{ route('admin.location.state',$country->id) }}" class="btn btn-xs btn-secondary">Manage Cities</a>
                           </td>
                        </tr>
                        @endforeach
                  </table>
                  {{ $countries_table->links() }}
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<!--========================== Modal  Start====================================================-->
<!-- Modal Start================ -->
@foreach($countries as $country)
<div class="modal fade" id="modal-lg{{$country->id}}">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header" style="background: #b00404;">
            <h4 class="modal-title">Modify Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form role="form" method="POST" action="{{url('country/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
               <input type="hidden" name="id" value="{{$country->id}}">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1">{{ __('Country') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="country" class="form-control" value="{{$country->country}}">
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
@endsection
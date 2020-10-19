@extends('masters.frontmaster')
@section('title', 'Profile Details')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
      
        <!-- /.card-header -->
        <div class="card-body">
<a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
  <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Rates</h1></div><hr>
                <form role="form" method="POST" action="{{url('profile/rate/store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  
                  
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1">{{ __('Escort') }}*</label>
                            </div>
                            <div class="selct_2_alska">
                              <select class="form-control" name="escortId">
                               <option value="@if(isset($profile_rates[0]->userid)) {{ $profile_rates[0]->userid }} @endif">@if(isset($profile_rates[0]->name)) {{ $profile_rates[0]->name }} @endif</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1">{{ __('Upload To') }}*</label>
                            </div>
                            <div class="selct_2_alska">
                              <select class="form-control" name="status">
                                <option value="1" @if(isset($profile_rates[0]->status) && $profile_rates[0]->status == 1) selected @endif>Rate(In Call)</option>
                                <option value="2" @if(isset($profile_rates[0]->status) && $profile_rates[0]->status == 2) selected @endif>Rate(Out Call)</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1">{{ __('Time') }}*</label>
                            </div>
                            <div class="selct_2_alska">
                              <select class="form-control" name="time">
                                <option value="12 Hours" @if(isset($profile_rates[0]->time) && $profile_rates[0]->time == "12 Hours") selected @endif >12 Hours</option>
                                <option value="4 Hours" @if(isset($profile_rates[0]->time) && $profile_rates[0]->time == "4 Hours") selected @endif >4 Hours</option>
                                <option value="3 Hours" @if(isset($profile_rates[0]->time) && $profile_rates[0]->time == "3 Hours") selected @endif >3 Hours</option>
                                <option value="2 Hours" @if(isset($profile_rates[0]->time) && $profile_rates[0]->time == "2 Hours") selected @endif >2 Hours</option>
                                <option value="1 Hours" @if(isset($profile_rates[0]->time) && $profile_rates[0]->time == "1 Hours") selected @endif >1 Hours</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1">{{ __('Price') }}*</label>
                            </div>
                            <div class="selct_2_alska">
                              <input type="text" name="price" placeholder="Dollar" class="form-control" value="@if(isset($profile_rates[0]->price)) {{ $profile_rates[0]->price }} @endif">
                            </div>
                          </div>
                        </div>
                        
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        
                        
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1">{{ __('Description') }}*</label>
                            </div>
                            <div class="selct_2_alska">
                              <textarea class="textarea" name="description">@if(isset($profile_rates[0]->description)) {{ $profile_rates[0]->description }} @endif</textarea>
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
                      
                    </div>
                  </div>
                  
                </form>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>{{ __('Escort') }}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Time') }}</th>
                      <th>{{ __('Price') }}</th>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>                      
                      <td>@if(isset($profile_rates[0]->name)) {{ $profile_rates[0]->name }} @endif</td>
                      <td>
                        @if(isset($profile_rates[0]->status))
                          {{ ($profile_rates[0]->status == 1) ? "Rate(In Call)" : "" }}
                          {{ ($profile_rates[0]->status == 2) ? "Rate(Out Call)" : "" }}
                        @endif
                    </td>
                      <td> @if(isset($profile_rates[0]->time)) {{ $profile_rates[0]->time }} @endif </td>
                      <td>@if(isset($profile_rates[0]->price)) {{ $profile_rates[0]->price }} @endif</td>
                      <td>@if(isset($profile_rates[0]->description)) {{ $profile_rates[0]->description }} @endif</td>
                      
                      @if(isset($profile_rates[0]->id))
                      <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfrates{{$profile_rates[0]->id }}">Modify</a> <a href="{{url('profile/rate/delete/'.$profile_rates[0]->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                      @endif
                    </tr>                    
                  </table>
                  <?php $pfrates =\App\ProfileRate::all()->where('escortId', Auth::user()->id);?>
                  <!--  ==================================Modal Start============================================= -->
                  @foreach($pfrates as $data3)
                  <div class="modal fade" id="modal-xl-pfrates{{$profile_rates[0]->id }}">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header" style="background: #b00404;">
                          <h4 class="modal-title">Modify Information</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form role="form" method="POST" action="{{url('profile/rate/update')}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="modal-body">
                            
                            <input type="hidden" name="id" value="{{$data3->id}}">
                            <div class="row">
                              
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Escort') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="escortId">
                                          <option value="{{$data3->escortId}}">Current {{\App\User::find($data3->escortId)->name}}</option>
                                          <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Upload To') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="status">
                                          <option value="{{$data3->status}}">Current @if($data3->status==1) Rate(In Call) @elseif($data3->status==2) Rate(Out Call) @else @endif</option>
                                          <option value="1">Rate(In Call)</option>
                                          <option value="2">Rate(Out Call)</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Time') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="time">
                                          <option value="{{$data3->time}}">{{$data3->time}} Hours</option>
                                          <option value="12 Hours">12 Hours</option>
                                          <option value="4 Hours">4 Hours</option>
                                          <option value="3 Hours">3 Hours</option>
                                          <option value="2 Hours">2 Hours</option>
                                          <option value="1 Hours">1 Hours</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Price') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <input type="text" name="price" value="{{$data3->price}}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Description') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <textarea class="form-control" name="description">{{$data3->description}}</textarea>
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
                  <!-- ==================================Modal============================================= -->


                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
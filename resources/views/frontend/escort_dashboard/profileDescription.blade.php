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
            <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Description</h1></div><hr>
            <form role="form" method="POST" action="{{url('profile/description/store')}}" enctype="multipart/form-data">
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
                             <option value="@if(isset($profile_descriptions[0]->userid)) {{ $profile_descriptions[0]->userid }} @endif">@if(isset($profile_descriptions[0]->name)) {{ $profile_descriptions[0]->name }} @endif</option>
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
                            <option value="1" @if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 1) selected @endif>About Me</option>
                            <option value="2" @if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 2) selected @endif>Service offer</option>
                            <option value="3" @if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 3) selected @endif>Domestic Tours</option>
                            <option value="4" @if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 4) selected @endif>International Tours</option>
                            <option value="5" @if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 5) selected @endif>Interests & Favourite Things</option>
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
                          <label class="FormLabel1">{{ __('Description') }}*</label>
                        </div>
                        <div class="selct_2_alska">
                          <textarea  class="form-control" name="description">@if(isset($profile_descriptions[0]->description)) {{ $profile_descriptions[0]->description }} @endif</textarea>
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
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $pfdescrs =\App\ProfileDescription::all()->where('escortId', Auth::user()->id);?>
                <?php $i=1;?>
                
                <tr>                  
                  <td>@if(isset($profile_descriptions[0]->name)) {{ $profile_descriptions[0]->name }} @endif</td>
                  <td>
                    @if(isset($profile_descriptions[0]->status))
                      {{ ($profile_descriptions[0]->status == 1) ? "About Me" : "" }}
                      {{ ($profile_descriptions[0]->status == 2) ? "Service offer" : "" }}
                      {{ ($profile_descriptions[0]->status == 3) ? "Domestic Tours" : "" }}
                      {{ ($profile_descriptions[0]->status == 4) ? "International Tours" : "" }}
                      {{ ($profile_descriptions[0]->status == 5) ? "Interests & Favourite Things" : "" }}
                    @endif
                  </td>
                  <td>@if(isset($profile_descriptions[0]->description)) {{ $profile_descriptions[0]->description }} @endif</td>
                  
                  
                  <td>
                    @if(isset($profile_descriptions[0]->id))
                    <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfdes{{ $profile_descriptions[0]->id }}">Modify</a>
                    <a href="{{url('profile/description/delete/'. $profile_descriptions[0]->id) }}" class="btn btn-xs btn-danger">Delete</a></td>
                     @endif 
                  
                  
                </tr>
                
              </table>
              <!--  ==================================Modal Start============================================= -->
              @foreach($pfdescrs as $data1)
              <div class="modal fade" id="modal-xl-pfdes{{ $profile_descriptions[0]->id }}">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header" style="background: #b00404;">
                      <h4 class="modal-title">Modify Information</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form role="form" method="POST" action="{{url('profile/description/update')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="modal-body">
                        
                        <input type="hidden" name="id" value="{{$data1->id}}">
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
                                      <option value="{{$data1->escortId}}">Current {{\App\User::find($data1->escortId)->name}}</option>
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
                                      <option value="{{$data1->status}}">Current @if($data1->status==1) About Me @elseif($data1->status==2) Service offer @elseif($data1->status==3) Domestic Tour @elseif($data1->status==4) International Tours @elseif($data1->status==5) Interests & Favourite Things @else None @endif </option>
                                      <option value="1">About Me</option>
                                      <option value="2">Service offer</option>
                                      <option value="3">Domestic Tours</option>
                                      <option value="4">International Tours</option>
                                      <option value="5">Interests & Favourite Things</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-lg-12">
                                <div class="selct_2_alska">
                                  <textarea class="textarea" name="description">{{$data1->description}}</textarea>
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
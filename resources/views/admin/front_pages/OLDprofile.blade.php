@extends('masters.editormaster')
@section('title', 'Profile Details')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Profile Details</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          





@if(Auth::user()->roleStatus==1)



          <div class="text-center btn btn-success"><h1>Profile Images</h1></div><hr>
          <form role="form" method="POST" action="{{url('profile/image/store')}}" enctype="multipart/form-data">
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
                          <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                          @foreach($escorts as $escort)
                          <option value="{{$escort->id}}">{{$escort->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;">
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
                          <option value="1">Slider</option>
                          <option value="2">Gallery</option>
                          <option value="3">Video </option>
                          <option value="4">Selfie Gallery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Image Url') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url">
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
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Picture') }}</th>
                <th>{{ __('Escort') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Url') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $pfimages =\App\ProfileImage::all();?>
              <?php $i=1;?>
              @foreach($pfimages as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif</td>
                <td>{{\App\User::find($data->escortId)->name}}</td>
                <td>@if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video Gallery @else Selfie Gallery @endif</td>
                <td>{{$data->url}}</td>
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="{{url('profile/image/delete/'.$data->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                
                
                
              </tr>
              @endforeach
              
            </table>
            <!--  ==================================Modal Start============================================= -->
            @foreach($pfimages as $data)
            <div class="modal fade" id="modal-xl{{$data->id}}">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background: #b00404;">
                    <h4 class="modal-title">Modify Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="{{url('profile/image/update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      
                      <input type="hidden" name="id" value="{{$data->id}}">
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
                                    <option value="{{$data->escortId}}">Current {{\App\User::find($data->escortId)->name}}</option>
                                    <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                    @foreach($escorts as $escort)
                                    <option value="{{$escort->id}}">{{$escort->id}}{{$escort->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input name="image" type="file" accept="image/*" value="{{$data->image}}">
                                  @if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif
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
                                    <option value="{{$data->status}}">Current @if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video @elseif($data->status==4) Selfie Gallery @else None @endif </option>
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                    <option value="3">Video </option>
                                    <option value="4">Selfie Gallery</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Image Url') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="text" name="url"  value="{{$data->url}}">
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
            <div class="text-center btn btn-success"><h1>Profile Description</h1></div><hr>
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
                            <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                            @foreach($escorts as $escort)
                            <option value="{{$escort->id}}">{{$escort->name}}</option>
                            @endforeach
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
                            <option value="1">About Me</option>
                            <option value="2">Service offer</option>
                            <option value="3">Domestic Tours</option>
                            <option value="4">International Tours</option>
                            <option value="5">Interests & Favourite Things</option>
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
                          <textarea class="textarea" name="description"></textarea>
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
                  <th>{{ __('ID No.') }}</th>
                  <th>{{ __('Escort') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $pfdescrs =\App\ProfileDescription::all();?>
                <?php $i=1;?>
                @foreach($pfdescrs as $data1)
                <tr>
                  <td>00{{$i++}}</td>
                  
                  <td>{{\App\User::find($data1->escortId)->name}}</td>
                  <td>@if($data1->status==1) About Me @elseif($data1->status==2) Service offer @elseif($data1->status==3) Domestic Tour @elseif($data1->status==4) International Tours @elseif($data1->status==5) Interests & Favourite Things @else None @endif</td>
                  <td>{!! $data1->description !!}</td>
                  
                  
                  <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfdes{{$data1->id }}">Modify</a> <a href="{{url('profile/description/delete/'.$data1->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                  
                  
                  
                </tr>
                @endforeach
                
              </table>
              <!--  ==================================Modal Start============================================= -->
              @foreach($pfdescrs as $data1)
              <div class="modal fade" id="modal-xl-pfdes{{$data1->id}}">
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
                                      <?php $escorts1= \App\User::all()->where('roleStatus', 2);?>
                                      @foreach($escorts as $escort)
                                      <option value="{{$escort->id}}">{{$escort->name}}</option>
                                      @endforeach
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
              <div class="text-center btn btn-success"><h1>Profile List</h1></div><hr>
              <form role="form" method="POST" action="{{url('profile/list/store')}}" enctype="multipart/form-data">
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
                              <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                              @foreach($escorts as $escort)
                              <option value="{{$escort->id}}">{{$escort->name}}</option>
                              @endforeach
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
                              <option value="1">Service offer</option>
                              <option value="2">Rate(In Call)</option>
                              <option value="3">Rate(Out Call)</option>
                              <option value="4">Availability</option>
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
                            <textarea class="textarea" name="description"></textarea>
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
                    <th>{{ __('ID No.') }}</th>
                    <th>{{ __('Escort') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $pflist =\App\ProfileList::all();?>
                  <?php $i=1;?>
                  @foreach($pflist as $data2)
                  <tr>
                    <td>00{{$i++}}</td>
                    
                    <td>{{\App\User::find($data2->escortId)->name}}</td>
                    <td>@if($data2->status==1) Service offer @elseif($data2->status==2) Rate(In Call) @elseif($data2->status==3) Rate(Out Call) @elseif($data2->status==4) Availability @else None @endif </td>
                    <td>{!! $data2->description !!}</td>
                    
                    
                    <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pflist{{$data2->id }}">Modify</a><a href="{{url('profile/list/delete/'.$data2->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                    
                    
                    
                  </tr>
                  @endforeach
                  
                </table>
                <!--  ==================================Modal Start============================================= -->
                @foreach($pflist as $data2)
                <div class="modal fade" id="modal-xl-pflist{{$data2->id}}">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header" style="background: #b00404;">
                        <h4 class="modal-title">Modify Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" action="{{url('profile/list/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                          
                          <input type="hidden" name="id" value="{{$data2->id}}">
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
                                        <option value="{{$data2->escortId}}">Current {{\App\User::find($data2->escortId)->name}}</option>
                                        <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                        @foreach($escorts as $escort)
                                        <option value="{{$escort->id}}">{{$escort->name}}</option>
                                        @endforeach
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
                                        <option value="{{$data2->status}}">Current @if($data2->status==1) Service offer @elseif($data2->status==2) Rate(In Call) @elseif($data2->status==3) Rate(Out Call) @elseif($data2->status==4) Availability @else None @endif </option>
                                        <option value="1">Service offer</option>
                                        <option value="2">Rate(In Call)</option>
                                        <option value="3">Rate(Out Call)</option>
                                        <option value="4">Availability</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-lg-12">
                                  <div class="selct_2_alska">
                                    <textarea class="textarea" name="description">{{$data2->description}}</textarea>
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
                <div class="text-center btn btn-success"><h1>Profile Rates</h1></div><hr>
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
                                <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                @foreach($escorts as $escort)
                                <option value="{{$escort->id}}">{{$escort->name}}</option>
                                @endforeach
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
                              <input type="text" name="price" placeholder="Dollar">
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
                              <textarea class="textarea" name="description"></textarea>
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
                      <th>{{ __('ID No.') }}</th>
                      <th>{{ __('Escort') }}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Time') }}</th>
                      <th>{{ __('Price') }}</th>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $pfrates =\App\ProfileRate::all();?>
                    <?php $i=1;?>
                    @foreach($pfrates as $data3)
                    <tr>
                      <td>00{{$i++}}</td>
                      
                      <td>{{\App\User::find($data3->escortId)->name}}</td>
                      <td>@if($data3->status==1) Rate(In Call) @elseif($data3->status==2) Rate(Out Call) @else @endif</td>
                      <td>{{$data3->time}}</td>
                      <td>{{$data3->price}}</td>
                      <td>{!! $data3->description !!}</td>
                      
                      
                      <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfrates{{$data3->id }}">Modify</a> <a href="{{url('profile/rate/delete/'.$data3->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                      
                      
                      
                    </tr>
                    @endforeach
                    
                  </table>
                  <!--  ==================================Modal Start============================================= -->
                  @foreach($pfrates as $data3)
                  <div class="modal fade" id="modal-xl-pfrates{{$data3->id}}">
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
                                          <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                          @foreach($escorts as $escort)
                                          <option value="{{$escort->id}}">{{$escort->name}}</option>
                                          @endforeach
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
                  <div class="text-center btn btn-success"><h1>Profile Availability</h1></div><hr>
                  <form role="form" method="POST" action="{{url('profile/availability/store')}}" enctype="multipart/form-data">
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
                                  <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                  @foreach($escorts as $escort)
                                  <option value="{{$escort->id}}">{{$escort->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1">{{ __('Weekday') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="weekday">
                                  <option value="Saturday">Saturday</option>
                                  <option value="Sunday">Sunday</option>
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thirsday">Thirsday</option>
                                  <option value="Friday">Friday</option>
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
                                <label class="FormLabel1">{{ __('From') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="fromDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1">{{ __('Until') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="untilDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
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
                        <th>{{ __('ID No.') }}</th>
                        <th>{{ __('Escort') }}</th>
                        <th>{{ __('Weekday') }}</th>
                        <th>{{ __('From') }}</th>
                        <th>{{ __('Untill') }}</th>
                        <th>{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pfavails =\App\ProfileAvailability::all();?>
                      <?php $i=1;?>
                      @foreach($pfavails as $data3)
                      <tr>
                        <td>00{{$i++}}</td>
                        
                        <td>{{\App\User::find($data3->escortId)->name}}</td>
                        <td>{{$data3->weekday}}</td>
                        <td>{{$data3->fromDate}}</td>
                        <td>{{$data3->untilDate}}</td>
                        
                        
                        <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails{{$data3->id }}">Modify</a> <a href="{{url('profile/availability/delete/'.$data3->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                        
                        
                        
                      </tr>
                      @endforeach
                      
                    </table>
                    <!--  ==================================Modal Start============================================= -->
                    @foreach($pfavails as $data3)
                    <div class="modal fade" id="modal-xl-pfavails{{$data3->id}}">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #b00404;">
                            <h4 class="modal-title">Modify Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form role="form" method="POST" action="{{url('profile/availability/update')}}" enctype="multipart/form-data">
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
                                            <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                            @foreach($escorts as $escort)
                                            <option value="{{$escort->id}}">{{$escort->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Weekday') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="weekday">
                                            <option value="{{$data3->weekday}}">Current {{$data3->weekday}}</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thirsday">Thirsday</option>
                                            <option value="Friday">Friday</option>
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
                                          <label class="FormLabel1">{{ __('From') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="fromDate">
                                            <option value="{{$data3->fromDate}}">Current {{$data3->fromDate}} </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Until') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="untilDate">
                                            <option value="{{$data3->untilDate}}">Current {{$data3->untilDate}} </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
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
                    <div class="text-center btn btn-success"><h1>Profile Tours</h1></div><hr>
                    <form role="form" method="POST" action="{{url('profile/tour/store')}}" enctype="multipart/form-data">
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
                                    <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                    @foreach($escorts as $escort)
                                    <option value="{{$escort->id}}">{{$escort->name}}</option>
                                    @endforeach
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
                                    <option value="1">Domestic tours</option>
                                    <option value="2">International tours</option>
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
                                  <select class="form-control" name="city">
                                    <?php $states=\App\State::all();?>
                                    @foreach($states as $state)
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                    @endforeach
                                    
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
                                  <label class="FormLabel1">{{ __('Start Date') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="startDate">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('End Date') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="endDate">
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
                          <th>{{ __('ID No.') }}</th>
                          <th>{{ __('Escort') }}</th>
                          <th>{{ __('Status') }}</th>
                          <th>{{ __('City') }}</th>
                          <th>{{ __('Date') }}</th>
                          <th>{{ __('Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $pftours =\App\ProfileTour::all();?>
                        <?php $i=1;?>
                        @foreach($pftours as $data4)
                        <tr>
                          <td>00{{$i++}}</td>
                          
                          <td>{{\App\User::find($data4->escortId)->name}}</td>
                          <td>@if($data4->status==1) Domestic tours @elseif($data4->status==2) International tours @else @endif</td>
                          <td>{{$data4->city}}</td>
                          <td>{{$data4->startDate}} TO {{$data4->endDate}}</td>
                          
                          
                          <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pftours{{$data4->id }}">Modify</a> <a href="{{url('profile/tour/delete/'.$data4->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                          
                          
                          
                        </tr>
                        @endforeach
                        
                      </table>
                      <!--  ==================================Modal Start============================================= -->
                      @foreach($pftours as $data4)
                      <div class="modal fade" id="modal-xl-pftours{{$data4->id}}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" style="background: #b00404;">
                              <h4 class="modal-title">Modify Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form role="form" method="POST" action="{{url('profile/tour/update')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                
                                <input type="hidden" name="id" value="{{$data4->id}}">
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
                                              <option value="{{$data4->escortId}}">Current {{\App\User::find($data4->escortId)->name}}</option>
                                              <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                              @foreach($escorts as $escort)
                                              <option value="{{$escort->id}}">{{$escort->name}}</option>
                                              @endforeach
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
                                              <option value="{{$data4->status}}">Current @if($data4->status==1) Domestic tours @elseif($data4->status==2) International tours @else @endif</option>
                                              <option value="1">Domestic tours</option>
                                              <option value="2">International tours</option>
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
                                            <select class="form-control" name="city">
                                              <option value="{{$data4->city}}">{{$data4->city}}</option>
                                              <?php $states=\App\State::all();?>
                                              @foreach($states as $state)
                                              <option value="{{$state->state}}">{{$state->state}}</option>
                                              @endforeach
                                              
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
                                            <label class="FormLabel1">{{ __('Start Date') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="startDate" value="{{$data4->startDate}}">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('End Date') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="endDate" value="{{$data4->endDate}}">
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
                      <div class="text-center btn btn-success"><h1>Profile Blog</h1></div><hr>
                      <form role="form" method="POST" action="{{url('profile/blog/store')}}" enctype="multipart/form-data">
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
                                      <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                      @foreach($escorts as $escort)
                                      <option value="{{$escort->id}}">{{$escort->name}}</option>
                                      @endforeach
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
                                      <option value="1">Blog</option>
                                      <option value="2">Wishlist</option>
                                      <option value="3">testimonials </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Title') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="text" name="title">
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
                                    <label class="FormLabel1">{{ __('Image') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input name="image" type="file" accept="image/*" value="0">
                                    <img src="{{asset('public/blankphoto.png')}}" style="width: 30px;">
                                  </div>
                                </div>
                              </div>
                              
                              
                              <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Url') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="text" name="url">
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
                            <th>{{ __('ID No.') }}</th>
                            <th>{{ __('Escort') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $pfblogs =\App\ProfileBlog::all();?>
                          <?php $i=1;?>
                          @foreach($pfblogs as $data5)
                          <tr>
                            <td>00{{$i++}}</td>
                            
                            <td>{{\App\User::find($data5->escortId)->name}}</td>
                            <td>@if($data5->status==1) Blog @elseif($data5->status==2) Wishlist @elseif($data5->status==3) testimonials @else @endif</td>
                            <td>{{$data5->title}}</td>
                            <td>@if($data5->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data5->image)}}" style="width: 30px;">@endif</td>
                            <td>{{$data5->url}}</td>
                            
                            
                            <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfblogs{{$data5->id }}">Modify</a> <a href="{{url('profile/blog/delete/'.$data5->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                            
                            
                            
                          </tr>
                          @endforeach
                          
                        </table>
                        <!--  ==================================Modal Start============================================= -->
                        @foreach($pfblogs as $data5)
                        <div class="modal fade" id="modal-xl-pfblogs{{$data5->id}}">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header" style="background: #b00404;">
                                <h4 class="modal-title">Modify Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form role="form" method="POST" action="{{url('profile/blog/update')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                  
                                  <input type="hidden" name="id" value="{{$data5->id}}">
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
                                                <option value="{{$data5->escortId}}">Current {{\App\User::find($data5->escortId)->name}}</option>
                                                <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                                @foreach($escorts as $escort)
                                                <option value="{{$escort->id}}">{{$escort->name}}</option>
                                                @endforeach
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
                                                <option value="{{$data5->status}}">@if($data5->status==1) Blog @elseif($data5->status==2) Wishlist @elseif($data5->status==3) testimonials @else @endif</option>
                                                <option value="1">Blog</option>
                                                <option value="2">Wishlist</option>
                                                <option value="3">testimonials </option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                              <label class="FormLabel1">{{ __('Title') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input type="text" name="title" value="{{$data5->title}}">
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
                                              <label class="FormLabel1">{{ __('Image') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input name="image" type="file" accept="image/*" value="{{$data5->image}}">
                                              @if($data5->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data5->image)}}" style="width: 30px;">@endif
                                            </div>
                                          </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-12">
                                          <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                              <label class="FormLabel1">{{ __('Url') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input type="text" name="url" value="{{$data5->url}}">
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
                        





































@elseif(Auth::user()->roleStatus==2)



          <div class="text-center btn btn-success"><h1>Profile Images</h1></div><hr>
          <form role="form" method="POST" action="{{url('profile/image/store')}}" enctype="multipart/form-data">
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
                         <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;">
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
                          <option value="1">Slider</option>
                          <option value="2">Gallery</option>
                          <option value="3">Video </option>
                          <option value="4">Selfie Gallery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Image Url') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url">
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
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Picture') }}</th>
                <th>{{ __('Escort') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Url') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );?>
              <?php $i=1;?>
              @foreach($pfimages as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif</td>
                <td>{{\App\User::find($data->escortId)->name}}</td>
                <td>@if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video Gallery @else Selfie Gallery @endif</td>
                <td>{{$data->url}}</td>
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="{{url('profile/image/delete/'.$data->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                
                
                
              </tr>
              @endforeach
              
            </table>
            <!--  ==================================Modal Start============================================= -->
            @foreach($pfimages as $data)
            <div class="modal fade" id="modal-xl{{$data->id}}">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background: #b00404;">
                    <h4 class="modal-title">Modify Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="{{url('profile/image/update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      
                      <input type="hidden" name="id" value="{{$data->id}}">
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
                                    <option value="{{$data->escortId}}">Current {{\App\User::find($data->escortId)->name}}</option>
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input name="image" type="file" accept="image/*" value="{{$data->image}}">
                                  @if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif
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
                                    <option value="{{$data->status}}">Current @if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video @elseif($data->status==4) Selfie Gallery @else None @endif </option>
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                    <option value="3">Video </option>
                                    <option value="4">Selfie Gallery</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Image Url') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="text" name="url"  value="{{$data->url}}">
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
            <div class="text-center btn btn-success"><h1>Profile Description</h1></div><hr>
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
                             <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                            <option value="1">About Me</option>
                            <option value="2">Service offer</option>
                            <option value="3">Domestic Tours</option>
                            <option value="4">International Tours</option>
                            <option value="5">Interests & Favourite Things</option>
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
                          <textarea class="textarea" name="description"></textarea>
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
                  <th>{{ __('ID No.') }}</th>
                  <th>{{ __('Escort') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $pfdescrs =\App\ProfileDescription::all()->where('escortId', Auth::user()->id);?>
                <?php $i=1;?>
                @foreach($pfdescrs as $data1)
                <tr>
                  <td>00{{$i++}}</td>
                  
                  <td>{{\App\User::find($data1->escortId)->name}}</td>
                  <td>@if($data1->status==1) About Me @elseif($data1->status==2) Service offer @elseif($data1->status==3) Domestic Tour @elseif($data1->status==4) International Tours @elseif($data1->status==5) Interests & Favourite Things @else None @endif</td>
                  <td>{!! $data1->description !!}</td>
                  
                  
                  <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfdes{{$data1->id }}">Modify</a> <a href="{{url('profile/description/delete/'.$data1->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                  
                  
                  
                </tr>
                @endforeach
                
              </table>
              <!--  ==================================Modal Start============================================= -->
              @foreach($pfdescrs as $data1)
              <div class="modal fade" id="modal-xl-pfdes{{$data1->id}}">
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
              <div class="text-center btn btn-success"><h1>Profile List</h1></div><hr>
              <form role="form" method="POST" action="{{url('profile/list/store')}}" enctype="multipart/form-data">
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
                              <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                              <option value="1">Service offer</option>
                              <option value="2">Rate(In Call)</option>
                              <option value="3">Rate(Out Call)</option>
                              <option value="4">Availability</option>
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
                            <textarea class="textarea" name="description"></textarea>
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
                    <th>{{ __('ID No.') }}</th>
                    <th>{{ __('Escort') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $pflist =\App\ProfileList::all()->where('escortId', Auth::user()->id);?>
                  <?php $i=1;?>
                  @foreach($pflist as $data2)
                  <tr>
                    <td>00{{$i++}}</td>
                    
                    <td>{{\App\User::find($data2->escortId)->name}}</td>
                    <td>@if($data2->status==1) Service offer @elseif($data2->status==2) Rate(In Call) @elseif($data2->status==3) Rate(Out Call) @elseif($data2->status==4) Availability @else None @endif </td>
                    <td>{!! $data2->description !!}</td>
                    
                    
                    <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pflist{{$data2->id }}">Modify</a><a href="{{url('profile/list/delete/'.$data2->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                    
                    
                    
                  </tr>
                  @endforeach
                  
                </table>
                <!--  ==================================Modal Start============================================= -->
                @foreach($pflist as $data2)
                <div class="modal fade" id="modal-xl-pflist{{$data2->id}}">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header" style="background: #b00404;">
                        <h4 class="modal-title">Modify Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" action="{{url('profile/list/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                          
                          <input type="hidden" name="id" value="{{$data2->id}}">
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
                                        <option value="{{$data2->escortId}}">Current {{\App\User::find($data2->escortId)->name}}</option>
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
                                        <option value="{{$data2->status}}">Current @if($data2->status==1) Service offer @elseif($data2->status==2) Rate(In Call) @elseif($data2->status==3) Rate(Out Call) @elseif($data2->status==4) Availability @else None @endif </option>
                                        <option value="1">Service offer</option>
                                        <option value="2">Rate(In Call)</option>
                                        <option value="3">Rate(Out Call)</option>
                                        <option value="4">Availability</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-lg-12">
                                  <div class="selct_2_alska">
                                    <textarea class="textarea" name="description">{{$data2->description}}</textarea>
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
                <div class="text-center btn btn-success"><h1>Profile Rates</h1></div><hr>
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
                               <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                              <input type="text" name="price" placeholder="Dollar">
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
                              <textarea class="textarea" name="description"></textarea>
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
                      <th>{{ __('ID No.') }}</th>
                      <th>{{ __('Escort') }}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Time') }}</th>
                      <th>{{ __('Price') }}</th>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $pfrates =\App\ProfileRate::all()->where('escortId', Auth::user()->id);?>
                    <?php $i=1;?>
                    @foreach($pfrates as $data3)
                    <tr>
                      <td>00{{$i++}}</td>
                      
                      <td>{{\App\User::find($data3->escortId)->name}}</td>
                      <td>@if($data3->status==1) Rate(In Call) @elseif($data3->status==2) Rate(Out Call) @else @endif</td>
                      <td>{{$data3->time}}</td>
                      <td>{{$data3->price}}</td>
                      <td>{!! $data3->description !!}</td>
                      
                      
                      <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfrates{{$data3->id }}">Modify</a> <a href="{{url('profile/rate/delete/'.$data3->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                      
                      
                      
                    </tr>
                    @endforeach
                    
                  </table>
                  <!--  ==================================Modal Start============================================= -->
                  @foreach($pfrates as $data3)
                  <div class="modal fade" id="modal-xl-pfrates{{$data3->id}}">
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
                  <div class="text-center btn btn-success"><h1>Profile Availability</h1></div><hr>
                  <form role="form" method="POST" action="{{url('profile/availability/store')}}" enctype="multipart/form-data">
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
                                   <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1">{{ __('Weekday') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="weekday">
                                  <option value="Saturday">Saturday</option>
                                  <option value="Sunday">Sunday</option>
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thirsday">Thirsday</option>
                                  <option value="Friday">Friday</option>
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
                                <label class="FormLabel1">{{ __('From') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="fromDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1">{{ __('Until') }}*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="untilDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
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
                        <th>{{ __('ID No.') }}</th>
                        <th>{{ __('Escort') }}</th>
                        <th>{{ __('Weekday') }}</th>
                        <th>{{ __('From') }}</th>
                        <th>{{ __('Untill') }}</th>
                        <th>{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pfavails =\App\ProfileAvailability::all()->where('escortId', Auth::user()->id);?>
                      <?php $i=1;?>
                      @foreach($pfavails as $data3)
                      <tr>
                        <td>00{{$i++}}</td>
                        
                        <td>{{\App\User::find($data3->escortId)->name}}</td>
                        <td>{{$data3->weekday}}</td>
                        <td>{{$data3->fromDate}}</td>
                        <td>{{$data3->untilDate}}</td>
                        
                        
                        <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails{{$data3->id }}">Modify</a> <a href="{{url('profile/availability/delete/'.$data3->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                        
                        
                        
                      </tr>
                      @endforeach
                      
                    </table>
                    <!--  ==================================Modal Start============================================= -->
                    @foreach($pfavails as $data3)
                    <div class="modal fade" id="modal-xl-pfavails{{$data3->id}}">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #b00404;">
                            <h4 class="modal-title">Modify Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form role="form" method="POST" action="{{url('profile/availability/update')}}" enctype="multipart/form-data">
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
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Weekday') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="weekday">
                                            <option value="{{$data3->weekday}}">Current {{$data3->weekday}}</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thirsday">Thirsday</option>
                                            <option value="Friday">Friday</option>
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
                                          <label class="FormLabel1">{{ __('From') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="fromDate">
                                            <option value="{{$data3->fromDate}}">Current {{$data3->fromDate}} </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Until') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="untilDate">
                                            <option value="{{$data3->untilDate}}">Current {{$data3->untilDate}} </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
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
                    <div class="text-center btn btn-success"><h1>Profile Tours</h1></div><hr>
                    <form role="form" method="POST" action="{{url('profile/tour/store')}}" enctype="multipart/form-data">
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
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                                    <option value="1">Domestic tours</option>
                                    <option value="2">International tours</option>
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
                                  <select class="form-control" name="city">
                                    <?php $states=\App\State::all();?>
                                    @foreach($states as $state)
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                    @endforeach
                                    
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
                                  <label class="FormLabel1">{{ __('Start Date') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="startDate">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('End Date') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="endDate">
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
                          <th>{{ __('ID No.') }}</th>
                          <th>{{ __('Escort') }}</th>
                          <th>{{ __('Status') }}</th>
                          <th>{{ __('City') }}</th>
                          <th>{{ __('Date') }}</th>
                          <th>{{ __('Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $pftours =\App\ProfileTour::all()->where('escortId', Auth::user()->id);?>
                        <?php $i=1;?>
                        @foreach($pftours as $data4)
                        <tr>
                          <td>00{{$i++}}</td>
                          
                          <td>{{\App\User::find($data4->escortId)->name}}</td>
                          <td>@if($data4->status==1) Domestic tours @elseif($data4->status==2) International tours @else @endif</td>
                          <td>{{$data4->city}}</td>
                          <td>{{$data4->startDate}} TO {{$data4->endDate}}</td>
                          
                          
                          <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pftours{{$data4->id }}">Modify</a> <a href="{{url('profile/tour/delete/'.$data4->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                          
                          
                          
                        </tr>
                        @endforeach
                        
                      </table>
                      <!--  ==================================Modal Start============================================= -->
                      @foreach($pftours as $data4)
                      <div class="modal fade" id="modal-xl-pftours{{$data4->id}}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" style="background: #b00404;">
                              <h4 class="modal-title">Modify Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form role="form" method="POST" action="{{url('profile/tour/update')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                
                                <input type="hidden" name="id" value="{{$data4->id}}">
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
                                              <option value="{{$data4->escortId}}">Current {{\App\User::find($data4->escortId)->name}}</option>
                                              <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                          
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
                                              <option value="{{$data4->status}}">Current @if($data4->status==1) Domestic tours @elseif($data4->status==2) International tours @else @endif</option>
                                              <option value="1">Domestic tours</option>
                                              <option value="2">International tours</option>
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
                                            <select class="form-control" name="city">
                                              <option value="{{$data4->city}}">{{$data4->city}}</option>
                                              <?php $states=\App\State::all();?>
                                              @foreach($states as $state)
                                              <option value="{{$state->state}}">{{$state->state}}</option>
                                              @endforeach
                                              
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
                                            <label class="FormLabel1">{{ __('Start Date') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="startDate" value="{{$data4->startDate}}">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('End Date') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="endDate" value="{{$data4->endDate}}">
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
                      <div class="text-center btn btn-success"><h1>Profile Blog</h1></div><hr>
                      <form role="form" method="POST" action="{{url('profile/blog/store')}}" enctype="multipart/form-data">
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
                                     <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                                      <option value="1">Blog</option>
                                      <option value="2">Wishlist</option>
                                      <option value="3">testimonials </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Title') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="text" name="title">
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
                                    <label class="FormLabel1">{{ __('Image') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input name="image" type="file" accept="image/*" value="0">
                                    <img src="{{asset('public/blankphoto.png')}}" style="width: 30px;">
                                  </div>
                                </div>
                              </div>
                              
                              
                              <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Url') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="text" name="url">
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
                            <th>{{ __('ID No.') }}</th>
                            <th>{{ __('Escort') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $pfblogs =\App\ProfileBlog::all()->where('escortId', Auth::user()->id);?>
                          <?php $i=1;?>
                          @foreach($pfblogs as $data5)
                          <tr>
                            <td>00{{$i++}}</td>
                            
                            <td>{{\App\User::find($data5->escortId)->name}}</td>
                            <td>@if($data5->status==1) Blog @elseif($data5->status==2) Wishlist @elseif($data5->status==3) testimonials @else @endif</td>
                            <td>{{$data5->title}}</td>
                            <td>@if($data5->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data5->image)}}" style="width: 30px;">@endif</td>
                            <td>{{$data5->url}}</td>
                            
                            
                            <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfblogs{{$data5->id }}">Modify</a> <a href="{{url('profile/blog/delete/'.$data5->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                            
                            
                            
                          </tr>
                          @endforeach
                          
                        </table>
                        <!--  ==================================Modal Start============================================= -->
                        @foreach($pfblogs as $data5)
                        <div class="modal fade" id="modal-xl-pfblogs{{$data5->id}}">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header" style="background: #b00404;">
                                <h4 class="modal-title">Modify Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form role="form" method="POST" action="{{url('profile/blog/update')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                  
                                  <input type="hidden" name="id" value="{{$data5->id}}">
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
                                                <option value="{{$data5->escortId}}">Current {{\App\User::find($data5->escortId)->name}}</option>
                                                 <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
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
                                                <option value="{{$data5->status}}">@if($data5->status==1) Blog @elseif($data5->status==2) Wishlist @elseif($data5->status==3) testimonials @else @endif</option>
                                                <option value="1">Blog</option>
                                                <option value="2">Wishlist</option>
                                                <option value="3">testimonials </option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                              <label class="FormLabel1">{{ __('Title') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input type="text" name="title" value="{{$data5->title}}">
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
                                              <label class="FormLabel1">{{ __('Image') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input name="image" type="file" accept="image/*" value="{{$data5->image}}">
                                              @if($data5->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data5->image)}}" style="width: 30px;">@endif
                                            </div>
                                          </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-12">
                                          <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                              <label class="FormLabel1">{{ __('Url') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                              <input type="text" name="url" value="{{$data5->url}}">
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
                        



@else

@endif














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
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
              @php $i = 1 @endphp
              @foreach($pfimages as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif</td>
                <td>{{ $data->escortName }}</td> {{-- SMPEDIT 15-10-2020 --}}
                <td>@if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video Gallery @else Selfie Gallery @endif</td>
                <td>{{$data->url}}</td>
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="{{url('profile/image/delete/'.$data->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
                
                
                
              </tr>
              @endforeach
            </tbody>
              
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
                                    <option value="{{$data->escortId}}">Current {{ $data->escortName }}</option> {{-- SMPEDIT 15-10-2020 --}}
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
          


@endif














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
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
                            <?php // $escorts= \App\User::all()->where('roleStatus', 2);?>
                            @foreach($escorts as $escort)
                            <option value="{{$escort->id}}" @if(!empty($id) && $escorts_condition->id == $escort->id) selected @endif>{{$escort->name}}</option>
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
                            <option value="1" @if(!empty(@$id) && isset($pfdescrs[0]->status) == 1) selected @endif >About Me</option>
                            <option value="2" @if(!empty(@$id) && isset($pfdescrs[0]->status) == 2) selected @endif >Service offer</option>
                            <option value="3" @if(!empty(@$id) && isset($pfdescrs[0]->status) == 3) selected @endif >Domestic Tours</option>
                            <option value="4" @if(!empty(@$id) && isset($pfdescrs[0]->status) == 4) selected @endif >International Tours</option>
                            <option value="5" @if(!empty(@$id) && isset($pfdescrs[0]->status) == 5) selected @endif >Interests & Favourite Things</option>
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
                          <textarea class="textarea" name="description">@if(!empty($id) && isset($pfdescrs[0]->description)) {{ $pfdescrs[0]->description }}  @endif</textarea>
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
                <?php //$pfdescrs =\App\ProfileDescription::all();?>
                <?php
                    if(empty($pfdescrs->toArray())){
                         echo "<tr><td colspan='7' align='center'>NO DATA FOUND</td></tr>";
                    }
                $i=1;?>
                @foreach($pfdescrs as $data1)
                <tr>
                  <td>00{{$i++}}</td>
                  
                  <td>{{ $data1->escortName}}</td> {{-- SMPEDIT 15-10-2020 --}}
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
                                      <option value="{{$data1->escortId}}">Current {{ $data1->escortName }}</option> {{-- SMPEDIT 15-10-2020 --}}
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
              

































@elseif(Auth::user()->roleStatus==2)



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
             

@else

@endif














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
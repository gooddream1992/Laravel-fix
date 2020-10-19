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
                                <?php // $escorts= \App\User::all()->where('roleStatus', 2); ?>
                                @foreach($escorts as $escort)
                                <option value="{{$escort->id}}" @if(!empty($id) && @$escorts_condition->id == $escort->id) Selected @endif>{{$escort->name}}</option>
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
                                <option value="1" @if(!empty($id) && @$pfrates[0]->status == 1) Selected @endif >Rate(In Call)</option>
                                <option value="2" @if(!empty($id) && @$pfrates[0]->status == 2) Selected @endif >Rate(Out Call)</option>
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
                                <option value="12 Hours" @if(!empty($id) && @$pfrates[0]->time == "12 Hours") Selected @endif >12 Hours</option>
                                <option value="4 Hours" @if(!empty($id) && @$pfrates[0]->time == "4 Hours") Selected @endif >4 Hours</option>
                                <option value="3 Hours" @if(!empty($id) && @$pfrates[0]->time == "3 Hours") Selected @endif >3 Hours</option>
                                <option value="2 Hours" @if(!empty($id) && @$pfrates[0]->time == "2 Hours") Selected @endif >2 Hours</option>
                                <option value="1 Hours" @if(!empty($id) && @$pfrates[0]->time == "1 Hours") Selected @endif >1 Hours</option>
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
                              <input type="text" name="price" placeholder="Dollar" value="@if(!empty($id)) {{ @$pfrates[0]->price }} @endif">
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
                              <textarea class="textarea" name="description">@if(!empty($id)) {{ @$pfrates[0]->description }} @endif</textarea>
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
                    <?php 
                        /*$id_esort = empty($id) ? "Null" : $id;
                        if($id_esort == "Null"){ 
                            $pfrates =\App\ProfileRate::all();
                            }else{ 
                                $pfrates =\App\ProfileRate::get()->where('escortId','=',$id);
                                $pfratess = json_decode(json_encode($pfrates),true);
                                echo "<pre>";
                                print_r($pfrates->toArray());
                                exit;
                                if(empty($pfrates->toArray())){
                                     echo "<tr><td colspan='7' align='center'>NO DATA FOUND</td></tr>";
                                }
                        }*/ 
                    ?>
                    <?php
                        if(empty($pfrates->toArray())){
                                     echo "<tr><td colspan='7' align='center'>NO DATA FOUND</td></tr>";
                        }
                        $i=1;
                    ?>
                    @foreach($pfrates as $data3)
                    <tr>
                      <td>00{{$i++}}</td>
                      
                      <td>{{ $data3->escortName }}</td> {{-- SMPEDIT 15-10-2020 --}}
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
                                          <option value="{{$data3->escortId}}">Current {{ $data3->escortName }}</option> {{-- SMPEDIT 15-10-2020 --}}
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
































@elseif(Auth::user()->roleStatus==2)


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



@else

@endif














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
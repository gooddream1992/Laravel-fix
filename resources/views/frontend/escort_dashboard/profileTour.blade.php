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
          




@if(Auth::user()->roleStatus==2)

<a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
<div class="text-center btn btn-success" style="width: 100%"><h1>Profile Tours</h1></div><hr>
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
                                  <input type="date" name="startDate" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('End Date') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="endDate" class="form-control">
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



@else

@endif














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
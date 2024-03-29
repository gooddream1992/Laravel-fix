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
                  <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Availability</h1></div><hr>
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
                                   <option value="@if(isset($profile_availabilities[0]->userid)) {{ $profile_availabilities[0]->userid }} @endif">
                                    @if(isset($profile_availabilities[0]->name))
                                    {{ $profile_availabilities[0]->name }}
                                    @endif
                                  </option>
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
                                  <option value="Saturday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Saturday") @endif>Saturday</option>
                                  <option value="Sunday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Sunday") @endif>Sunday</option>
                                  <option value="Monday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Monday") @endif>Monday</option>
                                  <option value="Tuesday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Tuesday") @endif>Tuesday</option>
                                  <option value="Wednesday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Wednesday") @endif>Wednesday</option>
                                  <option value="Thirsday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Thirsday") @endif>Thirsday</option>
                                  <option value="Friday" @if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Friday") @endif>Friday</option>
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
                                  <option value="1:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "1:00 AM") selected @endif>1:00 AM</option>
                                  <option value="2:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "2:00 AM") selected @endif>2:00 AM</option>
                                  <option value="3:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "3:00 AM") selected @endif>3:00 AM</option>
                                  <option value="4:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "4:00 AM") selected @endif>4:00 AM</option>
                                  <option value="5:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "5:00 AM") selected @endif>5:00 AM</option>
                                  <option value="6:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "6:00 AM") selected @endif>6:00 AM</option>
                                  <option value="7:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "7:00 AM") selected @endif>7:00 AM</option>
                                  <option value="8:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "8:00 AM") selected @endif>8:00 AM</option>
                                  <option value="9:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "9:00 AM") selected @endif>9:00 AM</option>
                                  <option value="10:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "10:00 AM") selected @endif>10:00 AM</option>
                                  <option value="11:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "11:00 AM") selected @endif>11:00 AM</option>
                                  <option value="12:00 AM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "12:00 AM") selected @endif>12:00 AM</option>
                                  <option value="13:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "13:00 PM") selected @endif>13:00 PM</option>
                                  <option value="14:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "14:00 PM") selected @endif>14:00 PM</option>
                                  <option value="15:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "15:00 PM") selected @endif>15:00 PM</option>
                                  <option value="16:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "16:00 PM") selected @endif>16:00 PM</option>
                                  <option value="17:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "17:00 PM") selected @endif>17:00 PM</option>
                                  <option value="18:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "18:00 PM") selected @endif>18:00 PM</option>
                                  <option value="19:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "19:00 PM") selected @endif>19:00 PM</option>
                                  <option value="20:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "20:00 PM") selected @endif>20:00 PM</option>
                                  <option value="21:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "21:00 PM") selected @endif>21:00 PM</option>
                                  <option value="22:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "22:00 PM") selected @endif>22:00 PM</option>
                                  <option value="23:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "23:00 PM") selected @endif>23:00 PM</option>
                                  <option value="24:00 PM" @if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "24:00 PM") selected @endif>24:00 PM</option>
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
                                  <option value="1:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "1:00 AM") selected @endif>1:00 AM</option>
                                  <option value="2:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "2:00 AM") selected @endif>2:00 AM</option>
                                  <option value="3:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "3:00 AM") selected @endif>3:00 AM</option>
                                  <option value="4:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "4:00 AM") selected @endif>4:00 AM</option>
                                  <option value="5:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "5:00 AM") selected @endif>5:00 AM</option>
                                  <option value="6:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "6:00 AM") selected @endif>6:00 AM</option>
                                  <option value="7:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "7:00 AM") selected @endif>7:00 AM</option>
                                  <option value="8:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "8:00 AM") selected @endif>8:00 AM</option>
                                  <option value="9:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "9:00 AM") selected @endif>9:00 AM</option>
                                  <option value="10:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "10:00 AM") selected @endif>10:00 AM</option>
                                  <option value="11:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "11:00 AM") selected @endif>11:00 AM</option>
                                  <option value="12:00 AM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "12:00 AM") selected @endif>12:00 AM</option>
                                  <option value="13:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "13:00 PM") selected @endif>13:00 PM</option>
                                  <option value="14:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "14:00 PM") selected @endif>14:00 PM</option>
                                  <option value="15:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "15:00 PM") selected @endif>15:00 PM</option>
                                  <option value="16:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "16:00 PM") selected @endif>16:00 PM</option>
                                  <option value="17:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "17:00 PM") selected @endif>17:00 PM</option>
                                  <option value="18:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "18:00 PM") selected @endif>18:00 PM</option>
                                  <option value="19:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "19:00 PM") selected @endif>19:00 PM</option>
                                  <option value="20:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "20:00 PM") selected @endif>20:00 PM</option>
                                  <option value="21:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "21:00 PM") selected @endif>21:00 PM</option>
                                  <option value="22:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "22:00 PM") selected @endif>22:00 PM</option>
                                  <option value="23:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "23:00 PM") selected @endif>23:00 PM</option>
                                  <option value="24:00 PM" @if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "24:00 PM") selected @endif>24:00 PM</option>
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
                        <th>{{ __('Escort') }}</th>
                        <th>{{ __('Weekday') }}</th>
                        <th>{{ __('From') }}</th>
                        <th>{{ __('Untill') }}</th>
                        <th>{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td>@if(isset($profile_availabilities[0]->name)){{ $profile_availabilities[0]->name }}@endif</td>
                        <td>@if(isset($profile_availabilities[0]->weekday)) {{ $profile_availabilities[0]->weekday }} @endif</td>
                        <td>@if(isset($profile_availabilities[0]->fromDate)) {{ $profile_availabilities[0]->fromDate }} @endif</td>
                        <td>@if(isset($profile_availabilities[0]->untilDate)){{ $profile_availabilities[0]->untilDate }} @endif</td>
                        
                        
                        <td>
                          @if(isset($profile_availabilities[0]->id))
                          <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails{{$profile_availabilities[0]->id }}">Modify</a>
                          <a href="{{url('profile/availability/delete/'.$profile_availabilities[0]->id)}}" class="btn btn-xs btn-danger">Delete</a>
                          @endif
                        </td>
                        
                        
                        
                      </tr>
                      
                    </table>
                    <?php $pfavails =\App\ProfileAvailability::all()->where('escortId', Auth::user()->id);?>
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

                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection
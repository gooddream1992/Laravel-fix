@extends('masters.frontmaster')
@section('title', 'Profile Details')
@section('main')

<style type="text/css">
.table, div{color:white;}
/*Modal Section*/
.modal-dialog{max-width:none;}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        
        <!-- /.card-header -->
        <div class="card-body">
          



@if(Auth::user()->roleStatus==2)

<a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
                      <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Blog</h1></div><hr>
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
                                    <input type="text" name="title" class="form-control">
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
                                    <input type="text" name="url" class="form-control">
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
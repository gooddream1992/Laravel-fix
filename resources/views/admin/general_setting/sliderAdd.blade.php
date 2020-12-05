@extends('masters.master')
@section('title', 'New Escort')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">New Escort</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="{{url('slider/store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider" type="file" accept="image/*" value="0" >
                        <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;">
                        <p class="help-block">{{ __('Upload Slider1 Image max 1mb') }}</p>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider1" type="file" accept="image/*" value="0" >
                        <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;">
                        <p class="help-block">{{ __('Upload Slider2 Image max 1mb') }}</p>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider2" type="file" accept="image/*" value="0" >
                        <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;">
                        <p class="help-block">{{ __('Upload Slider3 Image max 1mb') }}</p>
                    </div>
                  </div>
                 

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Category') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="category">
                        <option value="1">Home</option>
                        <option value="2">Explore Cities</option>
                        <option value="3">Terms & Condition</option>
                        <option value="4">Business Etiquette</option>
                        <option value="5">Our Story</option>
                        <option value="6">FAQ</option>
                        <option value="7">Client Membership</option>
                        <option value="8">Blog</option>
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

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Description') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="description"></textarea>
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




<div class="row">
              
              <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Slider1') }}</th>
                <th>{{ __('Slider2') }}</th>
                <th>{{ __('Slider3') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $sliders =\App\Slider::all();?>
             
              @foreach($sliders as $slider)
              <tr>
                <td>{{$slider->id}}</td>
                <td>
                  @if($slider->category==1)
                    Home
                  @elseif($slider->category==2)
                    Explore Cities
                  @elseif($slider->category==3)
                    Terms & Condition
                  @elseif($slider->category==4)
                    Business Etiquette
                  @elseif($slider->category==5)
                    Our Story
                  @elseif($slider->category==6)
                    FAQ
                  @elseif($slider->category==7)
                    Client Membership
                  @elseif($slider->category==8)
                    Blog
                  @else
                  @endif
                </td>
                <td>{{$slider->title}}</td>
                <td>{{$slider->description}}</td>
                <td>@if($slider->slider==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$slider->slider)}}" style="width: 30px;">@endif</td>
                <td>@if($slider->slider1==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$slider->slider1)}}" style="width: 30px;">@endif</td>
                <td>@if($slider->slider2==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$slider->slider2)}}" style="width: 30px;">@endif</td>
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$slider->id }}">Modify</a> <a href="{{url('slider/delete/'.$slider->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>
              </div>











            </div>
            
          
          
        </div>
        
      </div>
    </section>
  </div>






<!-- Modal Start================ -->
        @foreach($sliders as $slider)
  <div class="modal fade" id="modal-xl{{$slider->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('slider/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$slider->id}}">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider" type="file" accept="image/*" value="{{$slider->slider}}" >
                        @if($slider->slider==NULL) <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;"> @else <img src="{{asset('public/uploads/'.$slider->slider)}}" style="width:100%;"> @endif
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                         <input name="slider1" type="file" accept="image/*" value="{{$slider->slider1}}" >
                        @if($slider->slider1==NULL) <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;"> @else <img src="{{asset('public/uploads/'.$slider->slider1)}}" style="width:100%;"> @endif
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <input name="slider2" type="file" accept="image/*" value="{{$slider->slider2}}" >
                        @if($slider->slider2==NULL) <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;height:100px;"> @else <img src="{{asset('public/uploads/'.$slider->slider2)}}" style="width:100%;"> @endif
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Category') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="category">
                        <option value="{{$slider->category}}">Current @if($slider->category==1) Home @elseif($slider->category==2) Explore Cities @elseif($slider->category==3) @elseif($slider->category==3) Terms & Condition @elseif($slider->category==4)  Business Etiquette @elseif($slider->category==5) Our Story @elseif($slider->category==6) FAQ @elseif($slider->category==7) Client Membership @else @endif</option>
                        <option value="1">Home</option>
                        <option value="2">Explore Cities</option>
                        <option value="3">Terms & Condition</option>
                        <option value="4">Business Etiquette</option>
                        <option value="5">Our Story</option>
                        <option value="6">FAQ</option>
                        <option value="7">Client Membership</option>
                        <option value="8">Blog</option>
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
                       <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Description') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="description">{{$slider->description}}</textarea>
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
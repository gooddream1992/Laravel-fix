@extends('masters.master')
@section('title', 'Header and Footer')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Header and Footer</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
      <div class="row">
              
              <div class="col-md-12">
                <table id="example" class="table table-striped table-responsive table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Header Logo') }}</th>
                <th>{{ __('Footer Logo') }}</th>
                <th>{{ __('Facebook') }}</th>
                <th>{{ __('Youtube') }}</th>
                <th>{{ __('Tweeter') }}</th>
                <th>{{ __('Linkedin') }}</th>
                <th>{{ __('Instagram') }}</th>
                <th>{{ __('Footer Title') }}</th>
                <th>{{ __('Footer Info') }}</th>
                <th>{{ __('Copyrights') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $headerfooters =\App\HeaderFooter::all();?>
             
              @foreach($headerfooters as $hedfoot)
              <tr>
                <td>{{$hedfoot->id}}</td>
                <td>@if($hedfoot->headerLogo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->headerLogo)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->footerLogo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->footerLogo)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->facebook==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->facebook)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->youtube==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->youtube)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->linkedin==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->linkedin)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->instagram==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->instagram)}}" style="width: 30px;">@endif</td>

                <td>@if($hedfoot->tweeter==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->tweeter)}}" style="width: 30px;">@endif</td>

                <td>{{$hedfoot->footerTitle}}</td>
                <td>{{$hedfoot->footerInfo}}</td>
                <td>{{$hedfoot->copyrights}}</td>

                <td>
                  <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$hedfoot->id }}">Modify</a> 
                  {{-- <a href="{{url('header/footer/delete/'.$hedfoot->id)}}" class="btn btn-xs btn-danger">Delete</a> --}}
                </td>
             
              
                
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
        @foreach($headerfooters as $hedfoot)
  <div class="modal fade" id="modal-xl{{$hedfoot->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('header/footer/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$hedfoot->id}}">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Header Logo') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="headerLogo" type="file" accept="image/*" value="{{$hedfoot->headerLogo}}" >
                        @if($hedfoot->headerLogo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->headerLogo)}}" style="width: 30px;">@endif
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Footer Logo') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="footerLogo" type="file" accept="image/*" value="{{$hedfoot->footerLogo}}" >
                       @if($hedfoot->footerLogo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->footerLogo)}}" style="width: 30px;">@endif
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Facebook') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="facebook" type="file" accept="image/*" value="{{$hedfoot->facebook}}" >
                         @if($hedfoot->facebook==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->facebook)}}" style="width: 30px;">@endif
                        <input name="facebookurl" type="text" value="{{$hedfoot->facebookurl}}" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Youtube') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="youtube" type="file" accept="image/*" value="{{$hedfoot->youtube}}" >
                        @if($hedfoot->youtube==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->youtube)}}" style="width: 30px;">@endif
                        <input name="youtubeurl" type="text" value="{{$hedfoot->youtubeurl}}" class="form-control">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Linked In') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="linkedin" type="file" accept="image/*" value="{{$hedfoot->linkedin}}" >
                        @if($hedfoot->linkedin==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->linkedin)}}" style="width: 30px;">@endif
                        <input name="linkedinurl" type="text" value="{{$hedfoot->linkedinurl}}" class="form-control">
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
                        <label class="FormLabel1">{{ __('Tweeter') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="tweeter" type="file" accept="image/*" value="{{$hedfoot->tweeter}}" >
                         @if($hedfoot->tweeter==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->tweeter)}}" style="width: 30px;">@endif
                        <input name="tweeterurl" type="text" value="{{$hedfoot->tweeterurl}}" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Instagram') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="instagram" type="file" accept="image/*" value="{{$hedfoot->instagram}}" >
                         @if($hedfoot->instagram==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$hedfoot->instagram)}}" style="width: 30px;">@endif
                        <input name="instagramurl" type="text" value="{{$hedfoot->instagramurl}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Footer Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="footerTitle" value="{{$hedfoot->footerTitle}}" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Copyrights Info') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="form-control" name="copyrights">{{$hedfoot->copyrights}}</textarea>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Footer Info') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="footerInfo">{{$hedfoot->footerInfo}}</textarea>
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
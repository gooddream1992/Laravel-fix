@extends('masters.editormaster')
@section('title', 'FAQ')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">FAQ</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>FAQ</h1></div><hr>
    
          <form role="form" method="POST" action="{{url('admin/faq/store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Image') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="0">
                      <img src="{{asset('public/blankphoto.png')}}" style="width: 100%;">
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
                        <label class="FormLabel1">{{ __('Upload To') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="1">Top Section 01</option>
                          <option value="2">Bottom Section 02</option>
                          <option value="3">Contact Section 03</option>
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
                <th>{{ __('Picture') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $faqs =\App\Faq::all();?>
                 <?php $i=1;?>
              @foreach($faqs as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data->imageurl==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->imageurl)}}" style="width: 30px;">@endif</td>
                <td>{{$data->title}}</td>
                <td>Section {{$data->status}}</td>
                <td>{!! $data->description !!}</td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="{{url('admin/faq/delete/'.$data->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>



 <div class="text-center btn btn-success"><h1>FAQ Question</h1></div><hr>
    
          <form role="form" method="POST" action="{{url('admin/faq/question/store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  



                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Question') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="question"></textarea>
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
                        <label class="FormLabel1">{{ __('Answer') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="textarea" name="answer"></textarea>
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
                          <option value="1">Left Side</option>
                          <option value="2">Right Side</option>
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
                <th>{{ __('Status') }}</th>
                <th>{{ __('Question') }}</th>
                 <th>{{ __('Answer') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $faqqs =\App\FaqQuestion::all();?>
                 <?php $i=1;?>
              @foreach($faqqs as $data1)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data1->status==1) Left @elseif($data1->status==2) Right @else @endif</td>
                <th>{{$data1->question}}</th>
                <td>{!! $data1->answer !!}</td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg{{$data1->id }}">Modify</a> <a href="{{url('admin/faq/question/delete/'.$data1->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>





















        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>















  <!-- Modal Start================ -->
         @foreach($faqs as $data)
  <div class="modal fade" id="modal-xl{{$data->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('admin/faq/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon Image') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="{{$data->imageurl}}">
                        <img src="{{asset('public/uploads/'.$data->imageurl)}}" style="width:100%;">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" class="form-control" value="{{$data->title}}">
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
                        <textarea class="textarea" name="description">{{$data->description}}</textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Upload To') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status"  value="{{$data->status}}">
                          <option value="{{$data->status}}">Current Section {{$data->status}}</option>
                          <option value="1">Top Section 01</option>
                          <option value="2">Bottom Section 02</option>
                          <option value="3">Contact Section 03</option>
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














  <!-- Modal Start================ -->
    @foreach($faqqs as $data1)
  <div class="modal fade" id="modal-lg{{$data1->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('admin/faq/question/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$data1->id}}">
            <div class="row">
              
             
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Question') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="question">{{$data1->question}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Answer') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="answer">{{$data1->answer}}</textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Upload To') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status"  value="{{$data1->status}}">
                          <option value="{{$data1->status}}">Current @if($data1->status==1) Left @elseif($data1->status==2) Right @else @endif</option>
                           <option value="1">Left</option>
                          <option value="2">Right</option>
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







  
@endsection
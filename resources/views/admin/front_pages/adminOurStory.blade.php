@extends('masters.editormaster')
@section('title', 'Our Story')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Our Story</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Our Story</h1></div><hr>
    
          <form role="form" method="POST" action="{{url('admin/our/story/store')}}" enctype="multipart/form-data">
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




                  <div class="col-lg-6">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title">
                      </div>
                    </div>
                  </div>
                 
                  <div class="col-lg-6" id="button-lable" style="display: none;">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Button Lable') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="lable">
                      </div>
                    </div>
                  </div>



                 <div class="col-lg-6" id="Signature" style="display: none;">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Signature') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="signature">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6" id="designation" style="display: none;">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Designation') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="designation">
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
                        <select class="form-control" name="status" id="status">
                          <option value="">Section</option>
                          <option value="1">Section 01</option>
                          <option value="2">Section 02</option>
                          <option value="3">Section 03</option>
                          <option value="4">Section 04</option>
                          <option value="5">Section 05</option>
                          <option value="6">Section 06</option>
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



<script>
  $(document).ready(function(){
      $("#status").on('change',function(){
          if(this.value == 1)
          {
            $("#Signature").show();
            $("#designation").show();
            $("#button-lable").show();
          }else if(this.value == 4){
            $("#button-lable").show();
            $("#Signature").hide();
            $("#designation").hide();
          }
          else{
            $("#Signature").hide();
            $("#designation").hide();
            $("#button-lable").hide();
          }
      });
  });
</script>


 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Picture') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Signature') }}</th>
                <th>{{ __('Designation') }}</th>
                <th>{{ __('Button Lable') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $stories =\App\OurStory::all();?>
                 <?php $i=1;?>
              @foreach($stories as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>@if($data->imageurl==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->imageurl)}}" style="width: 30px;">@endif</td>
                <td>{{$data->title}}</td>
                <td>Section {{$data->status}}</td>
                <td>{{$data->signature}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->lable}}</td>
                <td>{!! $data->description !!}</td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="{{url('admin/our/story/delete/'.$data->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>

        





















        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>









  <!-- Modal Start================ -->
        @foreach($stories as $data)
  <div class="modal fade" id="modal-xl{{$data->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('admin/our/story/update')}}" enctype="multipart/form-data">
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

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Button Lable') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="lable" class="form-control" value="{{$data->lable}}">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Signature') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="signature" class="form-control" value="{{$data->signature}}">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Designation') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="designation" class="form-control" value="{{$data->designation}}">
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
                          <option value="1">Section 01</option>
                          <option value="2">Section 02</option>
                          <option value="3">Section 03</option>
                          <option value="4">Section 04</option>
                          <option value="5">Section 05</option>
                          <option value="6">Section 06</option>
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
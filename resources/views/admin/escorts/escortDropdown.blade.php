@extends('masters.master')
@section('title', 'Escort Dropdown')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Escort Dropdown</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Escort Dropdown</h1></div><hr>
    
          <form role="form" method="POST" action="{{url('escort/dropdown/store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Dropdown Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="dropdownTitle">
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
                          <option value="1">Eyes</option>
                          <option value="2">Body Shape</option>
                          <option value="3">Sexuality </option>
                          <option value="4">Nationality </option>
                          <option value="5">Hair </option>
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
                <th>{{ __('Title') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $dropdowns =\App\EscortDropdown::all();?>
                 <?php $i=1;?>
              @foreach($dropdowns as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>{{$data->dropdownTitle}}</td>
                <td>@if($data->status==1) Eyes @elseif($data->status==2) Body Shape @elseif($data->status==3) Sexuality @elseif($data->status==4) Nationality @elseif($data->status==5) Hair @else None  @endif</td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$data->id }}">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>

        

 









        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>









  <!-- Modal Start================ -->
       @foreach($dropdowns as $data)
  <div class="modal fade" id="modal-xl{{$data->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('escort/dropdown/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Dropdown Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="dropdownTitle" class="form-control" value="{{$data->dropdownTitle}}">
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
                          <option value="{{$data->status}}">Current @if($data->status==1) Eyes @elseif($data->status==2) Body Shape @elseif($data->status==3) Sexuality @elseif($data->status==4) Nationality @elseif($data->status==5) Hair @else None  @endif</option>
                         <option value="1">Eyes</option>
                          <option value="2">Body Shape</option>
                          <option value="3">Sexuality </option>
                          <option value="4">Nationality </option>
                          <option value="5">Hair </option>
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
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
          


        
 <div class="text-center btn btn-success"><h1>Assigned Service Offer</h1></div><hr>
<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Escort') }}</th>
                <th>{{ __('Service') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1;?>
              @foreach($servicesassigns as $servicass)
              <tr>
                <td>00{{$i++}}</td>
                {{-- SMPEDIT 15-10-2020 --}}
                <td>{{$servicass->escortName }}</td> 
                <td>
                    <input type="checkbox" name="">
                    {{ implode(', ', explode(';T;', $servicass->service)) }}
                </td>
                {{-- / SMPEDIT 15-10-2020 END --}}
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-servicass{{$servicass->id }}">Modify</a> <a href="{{url('service/offer/assign/delete/'.$servicass->id)}}" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>











        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>














<!-- Modal Start================ -->
      @foreach($servicesassigns as $servicass)
  <div class="modal fade" id="modal-xl-servicass{{$servicass->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Assign Updatate Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('service/offer/assign/update')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
            <input type="hidden" name="id" value="{{$servicass->id}}">
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

                           <option value="{{$servicass->escortId}}">Current @if($servicass->escortId==NULL) None @else {{ $servicass->escortName }} @endif</option> {{-- SMPEDTI 15-10-2020 --}}

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
                        <label class="FormLabel1">{{ __('Offer') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        
                        <input type="checkbox" name="service" value="{{$servicass->service}}" checked> {{$servicass->service}} <br>
                      
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
@extends('masters.frontmaster')
@section('title', __('Index'))
@section('main')
<div class="content-wrapper">

   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
               <div class="text-center btn btn-success" style="width: 100%">
                  <h3>
                      Assign Information
                  </h3>
               </div>
               <hr>
        <form role="form" method="POST" action="{{url('service/offer/assign/store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
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
                         <?php 
                         	/*$services=\App\ServiceOffer::all();*/
                         ?>
                        @foreach($services as $servic)
                        <input type="checkbox" name="service[]" value="{{$servic->service}}" @foreach($services_update as $value) @if($value->service == $servic->service) checked @endif @endforeach > {{$servic->service}} <br>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Assign Confirm</button>
            </div>
          </form>
  <!-- Gallert End's Here -->
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
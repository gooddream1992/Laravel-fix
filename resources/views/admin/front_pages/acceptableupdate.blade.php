@extends('masters.editormaster')
@section('title', 'Acceptable Usage')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Acceptable Usage</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
          <div class="text-center btn btn-success"><h1>Acceptable Usage</h1></div><hr>
          
          <form role="form" method="POST" action="{{ route('admin.acceptable.edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <input type="hidden" name="id" value="{{ $acceptable->id }}">
            
            <div class="row">
              
              <div class="col-md-12">
                <div class="row">                 
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Acceptable Usage') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="acceptable">{{ $acceptable->acceptable }}</textarea>
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
          </div>
          
          
          
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection
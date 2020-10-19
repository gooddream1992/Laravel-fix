@extends('masters.editormaster')
@section('title', 'Privacy Statement')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Terms</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
          <div class="text-center btn btn-success"><h1>Privacy Statement</h1></div><hr>
          
         <!--  <form role="form" method="POST" action="{{ route('admin.privacyadd') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            
            
            <div class="row">
              
              <div class="col-md-12">
                <div class="row">
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
              <div class="col-md-12">
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
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            
          </form> -->
           <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @foreach($privacy_statement as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>{{ $data->titile }}</td>
                <td>{!! $data->description !!}</td>
                
                
                <td><a href="{{ route('admin.privacyupdate',$data->id) }}" class="btn btn-xs btn-primary">Modify</a>
                  <a href="{{ route('admin.privacydelete',$data->id) }}" class="btn btn-xs btn-danger">Delete</a>  </td>
              </tr>
              @endforeach
              
            </table>
          </div>
          
          
          
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection
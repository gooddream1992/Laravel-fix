@extends('masters.editormaster')
@section('title', 'Local Resources')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Local Resources</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Local Resources</h1></div><br><br>
          <a href="{{ route('local.resources.admin.view') }}" class="btn btn-danger">View Local Resources</a>
          <hr>
          <form role="form" method="POST" action="{{ route('local.resources.admin.update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
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
                        <input type="hidden" name="imageurl" value="@if(isset($data->image)) {{ $data->image }} @endif">
                      <img src="@if(isset($data->image)) {{ asset('public/localresources') }}/{{ $data->image }} @endif" style="width: 30px;">
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="@if(isset($data->title)) {{ $data->title }} @endif">
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
                        <label class="FormLabel1">{{ __('Name') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="name" class="form-control" value="@if(isset($data->name)) {{ $data->name }} @endif">
                      </div>
                    </div>
                  </div>  

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Section') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="section">
                        <option value="">Section</option>
                         <option value="healthcare" @if(isset($data->section) && $data->section == "healthcare") selected @endif>Healthcare</option>
                         <option value="Legal Advice"  @if(isset($data->section) && $data->section == "Legal Advice") selected @endif>Mentors</option>
                         <!-- <option value="Legal Advice"  @if(isset($data->section) && $data->section == "Legal Advice") selected @endif>Legal Advice</option> -->
                         <option value="Photographers" @if(isset($data->section) && $data->section == "Photographers") selected @endif>Photographers</option>
                       </select>
                      </div>
                    </div>
                  </div>
                     <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Suburb') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="city_id" id="city_id" class="form-control">
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
 <script>
  $(document).ready(function(){
    src = "{{ route('suburb') }}";
            $("#city_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        type : 'POST',
                        dataType: "json",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            query : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
           
            });
  });
</script>

@endsection
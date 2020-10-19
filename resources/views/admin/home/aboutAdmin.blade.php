@extends('masters.editormaster')
@section('title', 'Home Page')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Home Page</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          





<div class="text-center btn btn-success"><h1>About</h1></div><hr>
          <form role="form" method="POST" action="{{url('about/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}


             <?php $abouts= \App\About::all();?>
            @foreach($abouts as $abt)
            <input type="hidden" name="id" value="{{$abt->id}}">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title Head') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="{{$abt->titleHead}}">
                      </div>
                    </div>
                  </div>

              <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Intro') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea">{{$abt->intro}}</textarea>
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
                        <label class="FormLabel1">{{ __('Descritption') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea">{{$abt->description}}</textarea>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            @endforeach
          </form>






        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>
@endsection
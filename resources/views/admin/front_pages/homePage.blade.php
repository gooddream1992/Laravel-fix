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
          


          <div class="text-center btn btn-success"><h1>Independent Escort</h1></div><hr>
          <form role="form" method="POST" action="{{url('independent/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <?php $indpnts= \App\Independent::all();?>
            @foreach($indpnts as $indpnt)
            <input type="hidden" name="id" value="{{$indpnt->id}}">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon Image') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon" type="file" accept="image/*" value="0">
                       @if($indpnt->icon==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$indpnt->icon)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Background') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgimage" type="file" accept="image/*" value="0">
                       @if($indpnt->bgimage==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:100%;"> @else <img src="{{asset('public/uploads/'.$indpnt->bgimage)}}" style="width: 100%;">@endif
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
                        <label class="FormLabel1">{{ __('Title Head') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="topHead" value="{{$indpnt->topHead}}" >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="{{$indpnt->title}}" >
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Descritption') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea">{{$indpnt->description}}</textarea>
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
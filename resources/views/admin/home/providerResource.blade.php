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
          




<div class="text-center btn btn-success"><h1>Service provider resources</h1></div><hr>
          <form role="form" method="POST" action="{{url('provider/resource/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

             <?php $provresrcs= \App\ProviderResource::all();?>
            @foreach($provresrcs as $resourc)
            <input type="hidden" name="id" value="{{$resourc->id}}"> 

            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title Head') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="{{$resourc->titleHead}}">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Intro') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea">{{$resourc->intro}}</textarea>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Trafficking Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title1" value="{{$resourc->title1}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Trafficking Icon') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon1" type="file" accept="image/*" value="0">
                        @if($resourc->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$resourc->icon1)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Resources Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title2" value="{{$resourc->title2}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Resources Icon') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon2" type="file" accept="image/*" value="0">
                       @if($resourc->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$resourc->icon2)}}" style="width: 100%;">@endif
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
                        <label class="FormLabel1">{{ __('Purchase Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title3" value="{{$resourc->title3}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Purchase Icon') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon3" type="file" accept="image/*" value="0">
                        @if($resourc->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$resourc->icon3)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Become Escort Title') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title4" value="{{$resourc->title4}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Become Escort Icon') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon4" type="file" accept="image/*" value="0">
                       @if($resourc->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$resourc->icon4)}}" style="width: 100%;">@endif
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
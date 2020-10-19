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
          






          <div class="text-center btn btn-success"><h1>A Platform Built for Professionals</h1></div><hr>
          <form role="form" method="POST" action="{{url('professional/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <?php $professionals= \App\Professional::all();?>
            @foreach($professionals as $professonal)
            <input type="hidden" name="id" value="{{$professonal->id}}"> 
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Title Head') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="{{$professonal->titleHead}}">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Intro') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea">{{$professonal->intro}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Background Top') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgTop" type="file" accept="image/*" value="0">
                        @if($professonal->bgTop==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->bgTop)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Background Bottom') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgBottom" type="file" accept="image/*" value="0">
                        @if($professonal->bgBottom==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->bgBottom)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title1') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title1"  value="{{$professonal->title1}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon1') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon1" type="file" accept="image/*" value="0">
                         @if($professonal->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon1)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title2') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title2"  value="{{$professonal->title2}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon2') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon2" type="file" accept="image/*" value="0">
                        @if($professonal->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon2)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title3') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title3"  value="{{$professonal->title3}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon3') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon3" type="file" accept="image/*" value="0">
                       @if($professonal->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon3)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title4') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title4"  value="{{$professonal->title4}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon4') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon4" type="file" accept="image/*" value="0">
                        @if($professonal->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon4)}}" style="width: 100%;">@endif
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
                        <label class="FormLabel1">{{ __(' Title5') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title5"  value="{{$professonal->title5}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon5') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon5" type="file" accept="image/*" value="0">
                       @if($professonal->icon5==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon5)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title6') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title6"  value="{{$professonal->title6}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon6') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon6" type="file" accept="image/*" value="0">
                        @if($professonal->icon6==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon6)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title7') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title7"  value="{{$professonal->title7}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon7') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon7" type="file" accept="image/*" value="0">
                        @if($professonal->icon7==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon7)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title8') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title8"  value="{{$professonal->title8}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon8') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon8" type="file" accept="image/*" value="0">
                        @if($professonal->icon8==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon8)}}" style="width: 100%;">@endif
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __(' Title9') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title9"  value="{{$professonal->title9}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Icon9') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon9" type="file" accept="image/*" value="0">
                       @if($professonal->icon9==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 100%;"> @else <img src="{{asset('public/uploads/'.$professonal->icon9)}}" style="width: 100%;">@endif
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
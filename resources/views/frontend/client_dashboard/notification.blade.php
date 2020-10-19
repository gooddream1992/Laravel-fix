@extends('masters.frontmaster')
@section('title', __('Become Escort'))
@section('main')
<style type="text/css">

.fas{font-size: 3em;
color: #f8060a;}
h1{background:#f8060a;width: 100%;padding:10px;color: white; }
.Feature_Item{border:1px solid red;margin:5px;padding: 10px;}
.Feature_Item:hover{border:1px solid gray;margin:5px;padding: 10px;background: #f7f7f7;}
/*Modal Section*/
.modal-dialog{max-width:none;}
</style>
<!-- Content Header (Page header) -->
<a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
<center><h1>Following All Favourite Escorts</h1></center>
<section class="content-header">
  <div class="container-fluid">
    
    <div class="row mb-2">
      <div class="col-lg-12">
        
        <div class="Feature_main mt-3">
          <div class="row">
          
            <?php $follows=\App\Follow::all()->where('custId', Auth::user()->id)->where('status', 1);?>
            @foreach($follows as $follow)
            <?php
            $photo=\App\User::find($follow->escortId)->photo;
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="Feature_Item elevation-1 text-center">
                <a class="FI_Link d-block" href="{{url('profile/'.$follow->escortId)}}">
                  @if($photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height: 50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.$photo)}}" style="width:50px;height: 50px;border-radius: 50%;">@endif
                  
                  <h3>{{\App\User::find($follow->escortId)->name}}</h3>
                </a>
              </div>
            </div>
            @endforeach
            
            
            
          </div>
        </div>
      </div>
    </div>
    
    </div><!-- /.container-fluid -->
  </section>
  @endsection
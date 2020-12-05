@extends('masters.master')
@section('title', 'Social Media')
@section('main')
<style>
.pagination{
float: right;
}
</style>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Social Media</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-borderless">
            <form method="post" action="{{ route('admin.social.media.update') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="@if(isset($socail[0]->id)) {{ $socail[0]->id }} @endif">
              <tr>
                <td>
                  <input type="file" name="icon" id="icon">
                  <br>
                  <b>Icon Size Should be 64x64</b>
                  @if(isset($socail[0]->icon))
                    <input type="hidden" value="{{ $socail[0]->icon }}" name="icon">
                    <img src="{{ asset('public/icon/'.$socail[0]->icon) }}" alt="" width="50" height="50" title="{{ $socail[0]->socail_media_url }}">
                    @endif
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="social_url" class="form-control" placeholder="Social Media" value="@if(isset($socail[0]->socail_media_url)) {{ $socail[0]->socail_media_url }} @endif">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Save" class="btn btn-success" id="submit">                      
                </td>
              </tr>                    
            </form>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function(){
    $("#submit").on('click',function(){
      var imgWidth = $('#icon').width();
      var imgHeight = $('#icon').height();
      if(imgWidth > 64 || imgHeight > 64){
      alert('Your Icon is too big, it must be less than 64x64');
    });
  }
  });
  </Script>
@endsection
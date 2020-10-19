@extends('masters.frontmaster')
@section('title', __('Copy Right'))
@section('main')

 
        <!-- Content -->
<section class="ask-forum-sec" style="background-color: white;">
    <div id="content" class="container">
        @foreach($copyright as $value)
           <p><?php echo $value->copyright; ?></p>
        @endforeach
    </div>
</section>
 
@endsection
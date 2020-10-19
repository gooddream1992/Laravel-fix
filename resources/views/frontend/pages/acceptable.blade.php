@extends('masters.frontmaster')
@section('title', __('Acceptable Usage'))
@section('main')

 
        <!-- Content -->
<section class="ask-forum-sec" style="background-color: white;">
    <div id="content" class="container">
        @foreach($acceptable as $value)
           <p><?php echo $value->acceptable; ?></p>
        @endforeach
    </div>
</section>
 
@endsection
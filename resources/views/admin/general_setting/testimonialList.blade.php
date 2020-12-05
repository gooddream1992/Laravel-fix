@extends('masters.master')

@section('title', __('User List'))
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Testimonial List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Client Name') }}</th>
                <th>{{ __('Escort Name') }}</th>
                
                <th>{{ __('Testimonial') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
				   <?php $testimonials =\App\Testimonial::join('users as client','testimonials.client_id','client.id')
														   ->join('users as escort','testimonials.escort_id','escort.id')
														   ->select('client.name as client_name','escort.name as escort_name','testimonials.*')
														   ->where('testimonials.status','=','0')
														   ->get();?>
                 <?php $i=1;?>
              @foreach($testimonials as $testimonial)
              <tr>
                <td>00{{$i++}}</td>
                <td>{{$testimonial->client_name}}</td>
                <td>{{$testimonial->escort_name}}</td>
                <td style="word-break: break-word;">{!! $testimonial->testimonial !!}</td>
               
                <td>
					<a href="{{route('testimonial.approve',$testimonial->id)}}" class="btn btn-xs btn-primary">
						Approve
					</a> 
					<a href="{{route('testimonial.reject',$testimonial->id)}}" class="btn btn-xs btn-danger">
						Reject
					</a>
				</td>
             
              
                
              </tr>
              @endforeach
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>
@endsection
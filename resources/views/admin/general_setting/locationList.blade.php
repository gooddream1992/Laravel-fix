@extends('masters.master')
@section('title', 'Location')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Location</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
            
            <div class="row">
              
              <div class="col-md-4">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Country Name') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $countries =\App\Country::all();?>
             
              @foreach($countries as $country)
              <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->country}}</td>
                <td><a href="" class="btn btn-xs btn-primary">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>
              </div>

               <div class="col-md-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Country Name') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $countries =\App\Country::all();?>
             
              @foreach($countries as $country)
              <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->country}}</td>
                <td><a href="" class="btn btn-xs btn-primary">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>
              </div>

            <div class="col-md-4">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Country Name') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                   <?php $countries =\App\Country::all();?>
             
              @foreach($countries as $country)
              <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->country}}</td>
                <td><a href="" class="btn btn-xs btn-primary">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              @endforeach
                
              </table>
              </div>



            </div>
            
       
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection
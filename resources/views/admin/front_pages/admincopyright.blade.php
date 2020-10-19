@extends('masters.editormaster')
@section('title', 'Copy Right')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Terms</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
          <div class="text-center btn btn-success"><h1>Copy Right</h1></div><hr>
           <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Copy Right') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @foreach($copy as $data)
              <tr>
                <td>00{{$i++}}</td>
                <td>{{ $data->copyright }}</td>               
                
                <td><a href="{{ route('admin.copy.update',$data->id) }}" class="btn btn-xs btn-primary">Modify</a>
                  <!-- <a href="{{ route('admin.privacydelete',$data->id) }}" class="btn btn-xs btn-danger">Delete</a>  </td> -->
              </tr>
              @endforeach
              
            </table>
          </div>
          
          
          
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection
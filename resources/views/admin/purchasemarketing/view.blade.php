@extends('masters.editormaster')
@section('title', 'Purchase Marketing Blog')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Purchase Marketing Blog</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Purchase Marketing Blog</h1></div><br><br>
          <a href="{{ route('purchase.marketing.admin') }}" class="btn btn-danger">Add Purchase Marketing Blog</a>
          <hr>
          <table class="table">
            <tr>
              <td>
                <strong><b>#ID</b></strong>
              </td>
              <td>
                <strong><b>Title</b></strong>
              </td>
              <td>
                <strong>
                  <b>
                    Description
                  </b>
                </strong>
              </td>
              <td>
                <strong>
                  <b>
                    Image
                  </b>
                </strong>
              </td>
              <td>
                <strong>
                  <b>
                    Action
                  </b>
                </strong>
              </td>
            </tr>
            <?php $i = 1; ?>
            @foreach($data as $value)
            <tr>
              <td>
                {{ $i++ }}
              </td>
              <td>
                {{ $value->title }}
              </td>
              <td>
                {{ $value->description }}
              </td>
              <td>
                <img src="{{ asset('public/purchasemarketing') }}/{{ $value->image }}" width="50" height="50">
              </td>
              <td>
                <a href="{{ route('purchase.marketing.admin.delete',$value->id) }}" class="btn btn-xs btn-danger">Delete</a>
                <a href="{{ route('purchase.marketing.admin.edit',$value->id) }}" class="btn btn-xs btn-primary">Modify</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        
        
        
        
      </div>

    </div>
  </section>
</div>

@endsection
@extends('masters.editormaster')
@section('title', 'FAQ Escort Client')
@section('main')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title FormTitle">FAQ Escort Client</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="text-center btn btn-success">
                  <h1>FAQ Escort Client</h1>
               </div>
               <div class="right" style="float: right;">
                  <a href="{{ route('faq.client.escort') }}" class="btn btn-warning">Add FAQ Escort Client</a>
                 
               </div>
               <hr>
              <table class="table">
                 <tr>
                    <td style="background-color: #696969; color: white;"><b><strong>Question</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Answer</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Escort/Client</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Created At</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Updated At</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Action</strong></b></td>
                 </tr>
                 @foreach($data as $value)
                  <tr>
                     <td>
                        {{ $value->question }}
                     </td>
                     <td style="width: 300px;">
                        <?php echo $value->answer; ?>
                     </td>
                     <td>
                        @if($value->roleType == 2)
                        Escort
                        @else
                        Client
                        @endif
                     </td>
                     <td>
                        {{ $value->created_at }}
                     </td>
                     <td>
                        {{ $value->updated_at }}
                     </td>
                     <td>
                        <a href="{{ route('faq.client.escort.delete',$value->id) }}" class="btn btn-xs btn-danger">Delete</a>
                        <a href="{{ route('faq.client.escort.edit',$value->id) }}" class="btn btn-xs btn-primary">Modify</a>
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
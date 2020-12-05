@extends('masters.editormaster')
@section('title', 'Manage SEO City')
@section('main')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title FormTitle">Manage SEO City</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="text-center btn btn-success">
                  <h1>Manage SEO City</h1>
               </div>
               <hr>
               @foreach($city as $value)
               <form role="form" method="POST" action="{{ route('admin.seo.city.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $id }}">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Country') }}*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <input type="text" class="form-control" name="country" value="{{ $value->country }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                    <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('City') }}*</label>
                                    </div>
                                    <div class="selct_2_alska">
                                        <input type="text" class="form-control" name="city" value="{{ $value->city }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                    <div class="select_2_alska2">
                                        <label class="FormLabel1">{{ __('Gender') }}*</label>
                                    </div>
                                    <div class="selct_2_alska">
                                        <select name="gender" class="form-control">
                                            <option value="">Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Trans Gender</option>
                                            <option value="4">Gay</option>
                                        </select>
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
                                    <label class="FormLabel1">{{ __('Description') }}*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <textarea class="textarea" name="description"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                 </div>
                                 <div class="selct_2_alska">
                                    <input type="submit" class="btn btn-success" value="Save">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               @endforeach
               <table class="table">
                   <tr>
                       <td>#ID</td>
                       <td>Country</td>
                       <td>City</td>
                       <td>Gender</td>
                       <td>Description</td>
                       <td>Action</td>
                   </tr>
                   @php 
                   $i = 1
                   @endphp
                   @foreach($seoList as $value)
                   <tr>
                       <td>
                           {{ $i++ }}
                       </td>
                       <td>
                           {{ $value->country }}
                       </td>
                       <td>
                           {{ $value->city }}
                       </td>
                       <td>
                            @if($value->gender == 1)
                                Male
                            @elseif($value->gender == 2)
                                Female
                            @elseif($value->gender == 3)
                                Trans Gender
                            @elseif($value->gender == 4)
                                Gay
                            @endif
                       </td>
                       <td>
                           {!! $value->description !!}
                       </td>
                       <td>
                           <a href="{{ route('admin.seo.city.edit',$value->id) }}" class="btn btn-xs btn-primary">Modify</a>
                           <a href="{{ route('admin.seo.city.delete',$value->id) }}" class="btn btn-xs btn-danger">Delete</a>
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
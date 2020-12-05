@extends('masters.editormaster')
@section('title', 'Manage SEO City')
@section('main')
<style>
   .note-editable{
      height: 500px;
   }
</style>
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
               
               @if(empty($seoList->toArray()))
                <form role="form" method="POST" action="{{ route('admin.seo.city.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="city" value="{{ $city }}">
                    <input type="hidden" name="cityid" value="{{ $id }}">
                    <input type="hidden" name="gender" value="{{ $gender }}">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska2">
                                      <label class="FormLabel1">{{ __('Country') }}*</label>
                                   </div>
                                   <div class="selct_2_alska">
                                       <label>
                                          @foreach($countries as $country)
                                              {{ $country->country }}
                                          @endforeach
                                      </label>
                                   </div>
                                </div>
                             </div>
                             <div class="col-lg-12">
                                  <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('City') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                          <label>
                                            @foreach($cities as $states)
                                              {{ $states->state }}
                                            @endforeach
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Gender') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                          <label>
                                              @if($gender == 1)
                                                  Male
                                              @elseif($gender == 2)
                                                  Female
                                              @elseif($gender == 3)
                                                  Trans Gender
                                              @elseif($gender == 4)
                                                  Gay
                                              @endif
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                       <div class="col-md-12">
                          <div class="row">
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska21">
                                      <label class="FormLabel1">{{ __('Description') }}*</label>
                                   </div>
                                   <div class="selct_2_alskas">
                                      <textarea class="textarea" name="description"></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska2">
                                   </div>
                                   <div class="selct_2_alskas">
                                      <input type="submit" class="btn btn-success" value="Save">
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </form>
               @else
                 @foreach($seoList as $value)
                 <form role="form" method="POST" action="{{ route('admin.seo.city.update',$id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="city" value="{{ $city }}">
                    <input type="hidden" name="cityid" value="{{ $value->cityId }}">
                    <input type="hidden" name="gender" value="{{ $value->gender }}">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska2">
                                      <label class="FormLabel1">{{ __('Country') }}*</label>
                                   </div>
                                   <div class="selct_2_alska">
                                       <label>{{ $value->country }}</label>
                                   </div>
                                </div>
                             </div>
                             <div class="col-lg-12">
                                  <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('City') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                          <label>{{ $value->city }}</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                          <label class="FormLabel1">{{ __('Gender') }}*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                          <label>
                                              @if($value->gender == 1)
                                                  Male
                                              @elseif($value->gender == 2)
                                                  Female
                                              @elseif($value->gender == 3)
                                                  Trans Gender
                                              @elseif($value->gender == 4)
                                                  Gay
                                              @endif
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                       <div class="col-md-12">
                          <div class="row">
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska21">
                                      <label class="FormLabel1">{{ __('Description') }}*</label>
                                   </div>
                                   <div class="selct_2_alskas">
                                      <textarea class="textarea" name="description">{{ $value->description }}</textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="col-lg-12">
                                <div class="form-group sip_mt">
                                   <div class="select_2_alska2">
                                   </div>
                                   <div class="selct_2_alskas">
                                      <input type="submit" class="btn btn-success" value="Save">
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </form>
                 @endforeach
                 @endif
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
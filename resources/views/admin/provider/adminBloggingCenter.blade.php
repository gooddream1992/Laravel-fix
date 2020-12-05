@extends('masters.editormaster')
@section('title', 'News & Blog')
@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title FormTitle">Admin Blogging Center</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="text-center btn btn-success">
                        <h1>Admin Blogging Center</h1>
                    </div>
                    <hr>
                    <form role="form" method="POST" action="{{ route('admin.blogging.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Image') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                                <input name="imageurl" type="file" accept="image/*" value="0">
                                                <img src="{{ asset('public/blankphoto.png') }}" style="width: 30px;">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Title') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                                <input type="text" name="title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Publication') }}*</label>
                                            </div>
                                            <div class="selct_2_alska"> 
                                                <select class="form-control" name="publicationStatus">
                                                    <option value="1">Publish</option>
                                                    <option value="0">Unpublish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Country') }}</label>
                                            </div>
                                            <div class="selct_2_alska"> 
                                                <select class="form-control" name="country_id" onchange="getCities()" id="selectCountry">
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('City') }}</label>
                                            </div>
                                            <div class="selct_2_alska"> 
                                                <select class="form-control" name="state_id" id="citySelect">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Gender') }}</label>
                                            </div>
                                            <div class="selct_2_alska">
                                                <select class="form-control" name="gender">
                                                    <option></option>
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


                                    <!-- <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                            <div class="select_2_alska2">
                                                <label class="FormLabel1">{{ __('Upload To') }}*</label>
                                            </div>
                                            <div class="selct_2_alska">
                                                <select class="form-control" name="status">
                                                    <option value="1">Section 01</option>
                                                    <option value="2">Section 02</option>
                                                    <option value="3">Multi-Page Section 03</option>
                                                    <option value="4">Multi-Page Section 04</option>
                                                    <option value="5">Multi-Page Section 05</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->



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








                    @if(Auth::user()->roleStatus==1)

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('ID No.') }}</th>
                                <th>{{ __('Picture') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Publish By') }}</th>
                                <th>{{ __('Publication') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('Gender') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $blogs =\App\Blog::where('publishBy', 1)->get();?>
                            <?php $i=1;?>
                            @foreach($blogs as $data)
                            <tr>
                                <td>00{{$i++}}</td>
                                <td>@if($data->imageurl==NULL)<img src="{{asset('public/blankphoto.png')}}"
                                        style="width: 30px;"> @else <img
                                        src="{{asset('public/uploads/'.$data->imageurl)}}" style="width: 30px;">@endif
                                </td>
                                <td>{{$data->title}}</td>
                                <td>Section {{$data->status}}</td>
                                <td>@if($data->publishBy==0 or $data->publishBy==NULL) None @else
                                    {{\App\User::find($data->publishBy)->name}} @endif</td>
                                <td>@if($data->publicationStatus==1)Publish @else Unpublish @endif</td>
                                <td>
                                    @if ($data->country_id)
                                        {{ \App\Country::find($data->country_id)->country }}
                                    @endif
                                </td>

                                <td>
                                    @if ($data->state_id)
                                        {{ \App\State::find($data->state_id)->state }}
                                    @endif
                                </td>

                                <td>
                                    @if ($data->gender)
                                    {{ $data->gender == 1 ? 'Male' : '' }}
                                    {{ $data->gender == 2 ? 'Female' : '' }}
                                    {{ $data->gender == 3 ? 'Trans Gender' : '' }}
                                    {{ $data->gender == 4 ? 'Gay' : '' }}
                                    @endif
                                </td>
                                <td>{!! $data->description !!}</td>


                                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal"
                                        onclick="getCities2({{ $data->state_id ?? 'false' }}, {{ $data->id }})"
                                        data-target="#modal-xl{{$data->id }}">Modify</a> <a
                                        href="{{ route('admin.blogging.delete', $data->id) }}"
                                        class="btn btn-xs btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>





<!-- Modal Start================ -->
@foreach($blogs as $data)
<div class="modal fade" id="modal-xl{{$data->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #b00404;">
                <h4 class="modal-title">Modify Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>





            <form role="form" method="POST" action="{{ route('admin.blogging.update', $data->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Icon Image') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                            <input name="imageurl" type="file" accept="image/*"
                                                value="{{$data->imageurl}}">
                                            <img src="{{asset('public/uploads/'.$data->imageurl)}}" style="width:100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Title') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                            <input type="text" name="title" class="form-control"
                                                value="{{$data->title}}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Publication') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                            <select class="form-control" name="publicationStatus">
                                                <option value="{{$data->publicationStatus}}">Current
                                                    @if($data->publicationStatus==1)Publish @else Unpublish @endif
                                                </option>
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Country') }}</label>
                                        </div>
                                        <div class="selct_2_alska"> 
                                            <select class="form-control" name="country_id" onchange="getCities2({{ $data->state_id ?? 'false' }}, {{ $data->id }})" 
                                                id="selectCountry{{ $data->id }}">
                                                <option></option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ ($data->country_id == $country->id) ? 'selected' : '' }}>
                                                        {{ $country->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('City') }}</label>
                                        </div>
                                        <div class="selct_2_alska"> 
                                            <select class="form-control" name="state_id" id="citySelect{{ $data->id }}">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Gender') }}</label>
                                        </div>
                                        <div class="selct_2_alska">
                                            <select class="form-control" name="gender">
                                                <option></option>
                                                <option value="1" {{ (!empty($data->gender) && $data->gender == 1) ? 'selected' : '' }}>Male</option>
                                                <option value="2" {{ (!empty($data->gender) && $data->gender == 2) ? 'selected' : '' }}>Female</option>
                                                <option value="3" {{ (!empty($data->gender) && $data->gender == 3) ? 'selected' : '' }}>Trans Gender</option>
                                                <option value="4" {{ (!empty($data->gender) && $data->gender == 4) ? 'selected' : '' }}>Gay</option>
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
                                            <textarea class="textarea"
                                                name="description">{{$data->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Upload To') }}*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                            <select class="form-control" name="status" value="{{$data->status}}">
                                                <option value="{{$data->status}}">Current Section {{$data->status}}
                                                </option>
                                                <option value="1">Section 01</option>
                                                <option value="2">Section 02</option>
                                                <option value="3">Multi-Page Section 03</option>
                                                <option value="4">Multi-Page Section 04</option>
                                                <option value="5">Multi-Page Section 05</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>





                            </div>

                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>




        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->
@endforeach
@endsection
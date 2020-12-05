@extends('masters.master')
@section('title', 'Deny Reason')
@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title FormTitle">Deny Reason</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('admin.escort.profile.request.deny.reason') }}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="name" value="{{ $name }}">
                    {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <label class="FormLabel1">{{ __('Reason') }}*</label>
                                        </div>
                                        <textarea class="form-control" name="reason"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                            <br>
                                        </div>
                                        <br>
                                        <div class="selct_2_alska" style="float: left;">
                                            <input type="submit" class="btn btn-success" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
  @endsection
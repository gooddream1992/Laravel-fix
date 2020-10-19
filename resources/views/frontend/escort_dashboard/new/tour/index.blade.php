@extends('masters.profileMaster')
@section('title', 'Escort - Tours')
@section('header_title', 'Tours')
@section('content')
<style>
	label, h3{
		color: white;
	}	
</style>
@error('domestic_description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <div class="clearfix row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="form-box tour-detail-fields">
                    <div class="box-header">
                        <h3 >DOMESTIC TOURS</h3>
                    </div>
                    <div class="box-body">
                        <div class="row main-row">
                            <?php $description = array();
                                $tour_ChekeboxId = 123456; 
                            ?>
                        	@foreach($profile_tours as $tour_value)
                        	@if($tour_value->status == "1")
                                <div class="col-lg-12">
                                    <div class="tours-fields-row">
                                        <div class="form-group">
                                            <label >City</label>

                                            <select class="form-control" name="domestic_city[]">
                                                @foreach($city as $value)
                                                <option>{{ $value->city }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label >From</label>
                                            <div class="custom-date-picker">
                                                <input class="form-control" type="date" name="domestic_from[]" value="{{ $tour_value->startDate }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >To</label>
                                            <div class="custom-date-picker">
                                                <input class="form-control" name="domestic_to[]" value="{{ $tour_value->endDate }}" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Fully Booked</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-<?php echo $num = ($tour_ChekeboxId++)+1; ?>" name="domestic_booked[]" @if($tour_value->booked == 1) checked @endif>
                                                <label class="custom-control-label" for="check-<?php echo $num; ?>">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block" >Delete</label>
                                            <a href="{{ route('escort.tour.delete',$tour_value->id) }}" class="btn delete-dash-button"><i class="icofont-trash"></i></a>
                                            <!-- <button class="btn delete-dash-button"><i class="icofont-trash"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                               <?php $description['description'] = $tour_value->description; ?>
                            @endif
                            @endforeach
                            
                			<!-- Add More Fields in html Code Start's Here  -->
                			<form action="{{ route('escort.tour.store') }}" method="post" class="w-100">
        					@csrf
		                	<div id="newRow" class="col-lg-12"></div>
			                <!-- <div class="col-lg-12">
			                    <div class="form-group" style="display: none;" id="description-hide">
			                        <label>Description</label>
			                        <textarea class="form-control" name="domestic_description_two"></textarea>
			                    </div>
			                </div> -->
			                
			            	<!-- Add More Fields in html Code End's Here  -->            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" name="domestic_description"> @if(isset($description['description'])) {{ $description['description'] }} @endif</textarea>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-2">
                	<div class="col-lg-12">
                    <button class="submit-btn" style="display: none;" type="submit">Submit</button>
                    </form>
                    &nbsp;
                    &nbsp;
                    <button id="addRow" type="button" class="btn btn-success dash-button">Add Row <i class="icofont-plus"></i></button>
                </div>    
                </div>
            </div>
            <div class="col-lg-12 col-md-12 mt-4">
                <div class="form-box tour-detail-fields">
                    <div class="box-header">
                        <h3>INTERNATIONAL TOURS</h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <?php $description2 = array(); ?>
                        	@foreach($profile_tours as $tour_value)
                        	@if($tour_value->status == "2")
                            <div class="col-lg-12">
                                <div class="tours-fields-row">
                                    <div class="form-group">
                                        <label>City</label>
                                      <select class="form-control" name="domestic_city[]">
                                                @foreach($city as $value)
                                                <option>{{ $value->city }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>From</label>
                                        <div class="custom-date-picker">
                                            <input class="form-control" value="{{ $tour_value->startDate }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>To</label>
                                        <div class="custom-date-picker">
                                            <input class="form-control" value="{{ $tour_value->endDate }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fully Booked</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check-<?php echo $tour_value->id+2; ?>" @if($tour_value->booked == 1) checked @endif>
                                            <label class="custom-control-label" for="check-<?php echo $tour_value->id+2; ?>">&nbsp;</label>
                                        </div>
                                    </div>
                                  <!--   <div class="form-group">
                                        <label class="d-block">Edit</label>
                                        <button class="btn edit-dash-button"><i class="icofont-ui-edit"></i></button>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="d-block">Delete</label>
                                        <a href="{{ route('escort.tour.delete',$tour_value->id) }}" class="btn delete-dash-button"><i class="icofont-trash"></i></a>
                                        <!-- <button class="btn delete-dash-button"><i class="icofont-trash"></i></button> -->
                                    </div>
                                </div>
                            </div>
                            <?php $description2['description'] = $tour_value->description; ?>
                            @endif
                            @endforeach
                            <!-- Add More Fields in html Code Start's Here  -->
                			<form action="{{ route('escort.tour.store') }}" method="post" class="w-100">
        					@csrf
		                	<div id="newRow-internation" class="col-lg-12" ></div>
			                <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" name="domestic_description">@if(isset($description2['description'])) {{ $description2['description'] }} @endif</textarea>
                                </div>
                            </div>
			                
			            	<!-- Add More Fields in html Code End's Here  -->            
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="submit-btn submit-inter" style="display: none;" type="submit">Submit</button>
                        </form>
                    &nbsp;
                    &nbsp;
                    <button id="addRow_internation" type="button" class="btn btn-success dash-button">Add Row <i class="icofont-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
        /*$("#addRow").click(function(){
            $('.submit-btn').show();
            $('#description-hide').show();
            var check_key = Math.random();
                var html = '<div class="tours-fields-row copy-column">';
					html += '<div class="form-group">';
					html += '<label>City</label>';
					html += '<select class="form-control" name="domestic_city[]">';
					html += '@foreach($city as $value)';
					html += '<option>{{ $value->city }}</option>';
					html += '@endforeach';
					html += '</select>';
					html += '</div>';
					html += '<div class="form-group">';
					html += '<label>From</label>';
					html += '<div class="custom-date-picker">';
					html += '<input class="form-control" type="date" name="domestic_from[]">';
					html += '</div>';
					html += '</div>';
					html += '<div class="form-group">';
					html += '<label>To</label>';
					html += '<div class="custom-date-picker">';
					html += '<input class="form-control" name="domestic_to[]" type="date">';
					html += '</div>';
					html += '</div>';
					html += '<div class="form-group">';
					html += '<label>Fully Booked</label>';
					html += '<div class="custom-control custom-checkbox">';
					html += '<input type="checkbox" class="custom-control-input" id="check-'+check_key+'" name="domestic_booked_two[]" value="1">';
					html += '<label class="custom-control-label" for="check-'+check_key+'">&nbsp;</label>';
					html += '</div>';
					html += '</div>';
					html += '<div class="form-group">';
					html += '<label class="d-block">Remove Row</label>';
					html += '<button id="removeRow" type="button" class="btn btn-warning dash-button"><i class="icofont-ui-remove"></i></button>';
					html += '</div>';
					html += '</div>';
                $('#newRow').append(html);
            });            
            $(document).on('click', '#removeRow', function () {
                $('.submit-btn').hide();
                
          
                $(this).closest('.copy-column').remove();
            }); */
	$(document).ready(function() {
	    var addButton = $('#addRow');
	    var check_key = Math.random();
	    var maxField = 10;
	    var wrapper = $('#newRow');
	    var x = 0;	    
	    $(addButton).click(function() {
	        $('#description-hide').show();
	        $('.submit-btn').show();

	        if (x < maxField) {
	        	x++;
                var jj = (x++)+1
				var html = '<div class="tours-fields-row copy-column">';
				html += '<input type="hidden" name="status" value="1">';
				html += '<div class="form-group">';
				html += '<label>City *</label>';
				html += '<select class="form-control" name="domestic_city[]">';
				html += '@foreach($city as $value)';
				html += '<option>{{ $value->city }}</option>';
				html += '@endforeach';
				html += '</select>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>From *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" type="date" name="domestic_from[]">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>To *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" name="domestic_to[]" type="date">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>Fully Booked</label>';
				html += '<div class="custom-control custom-checkbox">';
				html += '<input type="checkbox" class="custom-control-input" id="check-'+jj+'" name="domestic_booked_two[]" value="1">';
				html += '<label class="custom-control-label" for="check-'+jj+'">&nbsp;</label>';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label class="d-block">Remove Row</label>';
				html += '<button id="removeRow" type="button" class="btn btn-warning dash-button"><i class="icofont-ui-remove"></i></button>';
				html += '</div>';
				html += '</div>';
	            
	            $(wrapper).append(html);
	        }
	    });
	    $('#newRow').on('click', '#removeRow', function(e) {
	        e.preventDefault();
	        $(this).closest('.copy-column').remove();
	        x--;
	        if (x == 0) {
	            $('#description-hide').hide();
	            $('.submit-btn').hide();
	        }
	    });
	});

	$(document).ready(function() {
	    var addButton = $('#addRow_internation');
	    var check_key = Math.random();
	    var maxField = 10;
	    var wrapper = $('#newRow-internation');
	    var x = 0;
	    $(addButton).click(function() {
	        $('#domestic_description_inter').show();
	        $('.submit-inter').show();
	        if (x < maxField) {
	            x++;
				var html = '<div class="tours-fields-row copy-column_international">';
				html += '<input type="hidden" name="status" value="2">';
				html += '<div class="form-group">';
				html += '<label>City *</label>';
				html += '<select class="form-control" name="domestic_city[]">';
				html += '@foreach($city as $value)';
				html += '<option>{{ $value->city }}</option>';
				html += '@endforeach';
				html += '</select>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>From *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" type="date" name="domestic_from[]">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>To *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" name="domestic_to[]" type="date">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>Fully Booked</label>';
				html += '<div class="custom-control custom-checkbox">';
				html += '<input type="checkbox" class="custom-control-input" id="check-'+x+'" name="domestic_booked_two[]" value="1">';
				html += '<label class="custom-control-label" for="check-'+x+'">&nbsp;</label>';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label class="d-block">Remove Row</label>';
				html += '<button id="removeRowinternational" type="button" class="btn btn-warning dash-button"><i class="icofont-ui-remove"></i></button>';
				html += '</div>';
				html += '</div>';
	            $(wrapper).append(html);
	        }
	    });

	    $('#newRow-internation').on('click', '#removeRowinternational', function(e) {
	        e.preventDefault();
	        $(this).closest('.copy-column_international').remove();
	        x--;
	        if (x == 0) {
	           $('#domestic_description_inter').hide();
	            $('.submit-inter').hide();
	        }
	    });
	});
</script>
@endsection
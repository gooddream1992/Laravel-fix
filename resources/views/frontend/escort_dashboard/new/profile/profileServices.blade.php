@extends('masters.profileMaster')

@section('title', 'Escort - Services')

@section('content')
<form method="POST" action="{{ route('profile.services.update') }}">
    @csrf

    @include('partials._profileSteps')

    <div class="clearfix row">
        <div class="col-md-12 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Avaialability</h3>
                </div>
                <div class="box-body">
                    <div class="table-step3-wishlist availability-table table-responsive">
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Weekly</th>
                                    <th scope="col">Avail 24hrs</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Descriptions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($week_days as $week_day)
                                <tr>
                                    <td data-label="Weekly">{{ Str::ucfirst($week_day) }}</td>
                                    <td data-label="Avail 24hrs">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input weekday-check-field" id="check-{{ $week_day }}" 
                                                name="availability[{{ $week_day }}][available24]" onchange="toggleFields('{{ $week_day }}')"
                                                {{ (!empty($availability[$week_day]->available24) && $availability[$week_day]->available24) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="check-{{ $week_day }}">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td data-label="From">
                                        <div class="form-group mb-0 custom-time-pick">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="text" class="form-control {{ $week_day . '-field' }}"
                                                        name="availability[{{ $week_day }}][from]"
                                                        value="{{ !empty($availability[$week_day]->fromDate) ? $availability[$week_day]->fromDate : '' }}"/>
                                                </div>
                                                <select class="form-control {{ $week_day . '-field' }}" name="availability[{{ $week_day }}][from_indicator]">
                                                    <option value="AM" 
                                                        {{ (!empty($availability[$week_day]->fromIndicator) && $availability[$week_day]->fromIndicator == 'AM') 
                                                            ? 'selected' : '' }}>
                                                            AM
                                                    </option>

                                                    <option value="PM" 
                                                        {{ (!empty($availability[$week_day]->fromIndicator) && $availability[$week_day]->fromIndicator == 'PM') 
                                                            ? 'selected' : '' }}>
                                                            PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="To">
                                        <div class="form-group mb-0 custom-time-pick">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="text" class="form-control {{ $week_day . '-field' }}"
                                                        name="availability[{{ $week_day }}][until]"
                                                        value="{{ !empty($availability[$week_day]->untilDate) ? $availability[$week_day]->untilDate : '' }}" />
                                                </div>
                                                <select class="form-control {{ $week_day . '-field' }}" name="availability[{{ $week_day }}][until_indicator]">
                                                    <option value="AM" 
                                                        {{ (!empty($availability[$week_day]->untilIndicator) && $availability[$week_day]->untilIndicator == 'AM') 
                                                            ? 'selected' : '' }}>
                                                            AM
                                                    </option>

                                                    <option value="PM" 
                                                        {{ (!empty($availability[$week_day]->untilIndicator) && $availability[$week_day]->untilIndicator == 'PM') 
                                                            ? 'selected' : '' }}>
                                                            PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description">
                                        <div class="custom-desc-box">
                                            <input type="text" class="form-control"
                                                name="availability[{{ $week_day }}][description]"
                                                value="{{ !empty($availability[$week_day]->description) ? $availability[$week_day]->description : '' }}" />
                                        </div>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>SERVICE I OFFER</h3>
                </div>
                <div class="box-body">
                    <ul class="list-check-grid">
                        @foreach ($services_available as $index => $service)
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check-{{ $index + 1 }}" 
                                    name="services_selected[{{ $service->service }}]" 
                                    {{ $services_offered->contains($service->service) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="check-{{ $index + 1 }}">&nbsp; {{ $service->service }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="keywords-tag-area mt-2">
                        <label>Create your own service keywords</label>
                        <div class="form-group">
                            <input type="text" name="service_tags" data-role="tagsinput" class="form-control" 
                                placeholder="Service keywords as tags" 
                                value="{{ !empty($service_tags) ? $service_tags : '' }}">
                            <textarea class="form-control mt-1" placeholder="Descriptions" name="tags_description">{{ $tags_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>Rates</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        {{-- In Call --}}
                        <div class="col-lg-6 col-md-6 mb-4">
                            <h4>In Call</h4>

                            <div id="in_call_wrapper">
                                @if (array_key_exists('in_call', $rates))
                                    @foreach ($rates['in_call'] as $index => $rate)
                                    <div class="row justify-content-between mt-4 in_call_fields" id="in_call_field_{{ $index }}">
                                        <input type="hidden" name="rates[in_call][{{ $index }}][id]" value="{{ $rate->id }}">
                                        <input type="hidden" name="rates[in_call][{{ $index }}][status]" value="{{ $rate->status }}">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Hours</label>
                                                <input type="number" class="form-control" name="rates[in_call][{{ $index }}][hours]"
                                                    value="{{ !empty($rate->hours) ? $rate->hours : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group d-flex align-items-end">
                                                <div>
                                                    <label class="text-white">Rate $</label>
                                                    <input type="number" name="rates[in_call][{{ $index }}][price]" class="form-control" placeholder="0"
                                                        value="{{ !empty($rate->price) ? $rate->price : '' }}">
                                                </div>

                                                <button class="btn remove-btn ml-3" type="button" 
                                                    onclick="removeFields('in_call', 'in_call_field_{{ $index }}')">
                                                        <i class="icofont-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group custom-desc-box">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="rates[in_call][{{ $index }}][description]"
                                                    value="{{ !empty($rate->description) ? $rate->description : '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else 
                                <div class="row justify-content-between mt-4 in_call_fields" id="in_call_field_0">
                                    <input type="hidden" name="rates[in_call][0][status]" value="1">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Hours</label>
                                            <input type="number" class="form-control" name="rates[in_call][0][hours]">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group d-flex align-items-end">
                                            <div>
                                                <label class="text-white">Rate $</label>
                                                <input type="number" name="rates[in_call][0][price]" class="form-control" placeholder="0">
                                            </div>
                
                                            <button class="btn remove-btn ml-3" type="button" 
                                                onclick="removeFields('in_call', 'in_call_field_0')">
                                                    <i class="icofont-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group custom-desc-box">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="rates[in_call][0][description]">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn-add-field" type="button" onclick="addFields('in_call', 1)">Add More</button>
                                </div>
                            </div>
                        </div> {{-- / In Call End --}}

                        {{-- Out Call --}}
                        <div class="col-lg-6 col-md-6 mb-4">
                            <h4>Out Call</h4>

                            <div  id="out_call_wrapper">
                                @if (array_key_exists('out_call', $rates))
                                    @foreach ($rates['out_call'] as $index => $rate)
                                    <div class="row justify-content-between mt-4 out_call_fields" id="out_call_field_{{ $index }}">
                                        <input type="hidden" name="rates[out_call][{{ $index }}][id]" value="{{ $rate->id }}">
                                        <input type="hidden" name="rates[out_call][{{ $index }}][status]" value="{{ $rate->status }}">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Hours</label>
                                                <input type="number" class="form-control" name="rates[out_call][{{ $index }}][hours]"
                                                    value="{{ !empty($rate->hours) ? $rate->hours : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group d-flex align-items-end">
                                                <div>
                                                    <label class="text-white">Rate $</label>
                                                    <input type="number" name="rates[out_call][{{ $index }}][price]" class="form-control" placeholder="0"
                                                        value="{{ !empty($rate->price) ? $rate->price : '' }}">
                                                </div>

                                                <button class="btn remove-btn ml-3" type="button" 
                                                    onclick="removeFields('out_call', 'out_call_field_{{ $index }}')">
                                                        <i class="icofont-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group custom-desc-box">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="rates[out_call][{{ $index }}][description]"
                                                    value="{{ !empty($rate->description) ? $rate->description : '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="row justify-content-between mt-4 out_call_fields" id="out_call_field_0">
                                    <input type="hidden" name="rates[out_call][0][status]" value="2">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Hours</label>
                                            <input type="number" class="form-control" name="rates[out_call][0][hours]">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group d-flex align-items-end">
                                            <div>
                                                <label class="text-white">Rate $</label>
                                                <input type="number" name="rates[out_call][0][price]" class="form-control" placeholder="0">
                                            </div>
                
                                            <button class="btn remove-btn ml-3" type="button" 
                                                onclick="removeFields('out_call', 'out_call_field_0')">
                                                    <i class="icofont-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group custom-desc-box">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="rates[out_call][0][description]">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn-add-field" type="button" onclick="addFields('out_call', 2)">Add More</button>
                                </div>
                            </div>
                        </div> {{-- / Out Call End --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="submit-btn" type="submit">Submit</button>
        </div>
    </div>
</form>

<script>
    function addFields(callType, status) {
        var index = $(`.${callType}_fields`).length;

        var item = $(`
            <div class="row justify-content-between mt-4 ${callType}_fields" id="${callType}_field_${index}">
                <input type="hidden" name="rates[${callType}][${index}][status]" value="${status}">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Hours</label>
                        <input type="number" class="form-control" name="rates[${callType}][${index}][hours]">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group d-flex align-items-end">
                        <div>
                            <label class="text-white">Rate $</label>
                            <input type="number" name="rates[${callType}][${index}][price]" class="form-control" placeholder="0">
                        </div>

                        <button class="btn remove-btn ml-3" type="button" 
                            onclick="removeFields('${callType}', '${callType}_field_${index}')">
                                <i class="icofont-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group custom-desc-box">
                        <label>Description</label>
                        <input type="text" class="form-control" name="rates[${callType}][${index}][description]">
                    </div>
                </div>
            </div>
        `)

        $(`#${callType}_wrapper`).append(item);
    }

    function removeFields(callType, id) {
        if ($(`.${callType}_fields`).length == 1) {
            var item = $(`
                <div class="row justify-content-between mt-4 ${callType}_fields" id="${callType}_field_0">
                    <input type="hidden" name="rates[${callType}][0][status]" value="${status}">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Hours</label>
                            <input type="number" class="form-control" name="rates[${callType}][0][hours]">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group d-flex align-items-end">
                            <div>
                                <label class="text-white">Rate $</label>
                                <input type="number" name="rates[${callType}][0][price]" class="form-control" placeholder="0">
                            </div>

                            <button class="btn remove-btn ml-3" type="button" 
                                onclick="removeFields('${callType}', '${callType}_field_0')">
                                    <i class="icofont-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group custom-desc-box">
                            <label>Description</label>
                            <input type="text" class="form-control" name="rates[${callType}][0][description]">
                        </div>
                    </div>
                </div>
            `)

            $(`#${callType}_wrapper`).append(item);
        }

        $(`#${id}`).remove();
    }
</script>
@endsection

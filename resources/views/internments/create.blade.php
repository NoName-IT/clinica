@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/internments') }}">@lang('general.internments')</a></li>
                        <li class="active">@lang('general.create_internment')</li>
                    </ol>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/internments') }}">
                        {{ csrf_field() }}
                        <div class="row">
                             <input id="internment" type="text" name="internment" value="internment" hidden>

                            <div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">@lang('patient.first_name')</label>

                                <div class="col-md-8">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-2 control-label">@lang('patient.last_name')</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6 form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                <label for="town" class="col-md-4 control-label">@lang('patient.town')</label>

                                <div class="col-md-8">
                                   
                                    <input id="town_text" placeholder="@lang('general.find_town')" class="form-control" name="town_text" type="text" value="{{ old('town_text') }}">

                                    <input id="town" placeholder="" name="town" type="text" value="{{ old('town') }}" hidden>


                                    @if ($errors->has('birth_town'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_town') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 form-group{{ $errors->has('birth_town') ? ' has-error' : '' }}">
                                <label for="birth_town" class="col-md-4 control-label">@lang('patient.birth_town')</label>

                                <div class="col-md-8">
                                   
                                    <input id="birth_town_text" placeholder="@lang('general.find_town')" class="form-control" name="birth_town_text" type="text" value="{{ old('birth_town_text') }}">

                                    <input id="birth_town" placeholder="" name="birth_town" type="text" value="{{ old('birth_town') }}" hidden>


                                    @if ($errors->has('birth_town'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_town') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label for="birth_date" class="col-md-4 control-label">@lang('patient.birth_date')</label>

                            <div class="col-md-6">

                                <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') }}">

                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 form-group{{ $errors->has('birth_time') ? ' has-error' : '' }}">
                            <label for="birth_time" class="col-md-4 control-label">@lang('patient.birth_time')</label>

                            <div class="col-md-6">

                                <input id="birth_time" type="text" class="form-control" name="birth_time" value="{{ old('birth_time') }}">

                                @if ($errors->has('birth_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-3 form-group{{ $errors->has('civil_status') ? ' has-error' : '' }}">
                            <label for="civil_status" class="col-md-6 control-label">@lang('patient.civil_status')</label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="civil_status">

                                    @foreach($civil_statuses as $civil_status)

                                        <option value="{{ $civil_status->id }}"

                                        @if (old('civil_status') == $civil_status->id)
                                                selected
                                        @endif

                                        >{{ $civil_status->name }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('civil_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('civil_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3 form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                            <label for="blood_type" class="col-md-6 control-label">@lang('patient.blood_type')</label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="blood_type">

                                    @foreach($blood_types as $blood_type)

                                        <option value="{{ $blood_type->id }}"

                                        @if (old('blood_type') == $blood_type->id)
                                                selected
                                        @endif


                                        >{{ $blood_type->name }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('blood_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   

                        <div class="col-md-3 form-group{{ $errors->has('dni_type') ? ' has-error' : '' }}">
                            <label for="dni_type" class="col-md-6 control-label">@lang('patient.dni_type')</label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="dni_type">

                                    @foreach($dni_types as $dni_type)

                                        <option value="{{ $dni_type->id }}"

                                        @if (old('dni_type') == $dni_type->id)
                                                selected
                                        @endif

                                        >{{ $dni_type->name }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('dni_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-md-3 control-label">@lang('patient.dni')</label>

                                <div class="col-md-8">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}">

                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                <label for="street_address" class="col-md-4 control-label">@lang('patient.street_address')</label>

                                <div class="col-md-8">
                                    <input id="street_address" type="text" class="form-control" name="street_address" value="{{ old('street_address') }}">

                                    @if ($errors->has('street_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-6 form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">@lang('patient.phone')</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group{{ $errors->has('dni_copy') ? ' has-error' : '' }}">
                                <label for="dni_copy" class="col-md-6 control-label">@lang('patient.dni_copy')</label>

                                <div class="col-md-6">
                                    <input id="dni_copy" type="checkbox" class="form-control" name="dni_copy" value="1"
                                    @if (!is_null(old('dni_copy')))
                                        checked    
                                    @endif

                                    >

                                    @if ($errors->has('dni_copy'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni_copy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-6 form-group{{ $errors->has('medical_insurance_copy') ? ' has-error' : '' }}">
                                <label for="medical_insurance_copy" class="col-md-4 control-label">@lang('patient.medical_insurance_copy')</label>

                                <div class="col-md-6">
                                    <input id="medical_insurance_copy" type="checkbox" class="form-control" name="medical_insurance_copy" value="1"

                                    @if (!is_null(old('medical_insurance_copy')))
                                        checked    
                                    @endif
                                    >

                                    @if ($errors->has('medical_insurance_copy'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medical_insurance_copy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group{{ $errors->has('medical_insurance') ? ' has-error' : '' }}">
                            <label for="medical_insurance" class="col-md-4 control-label">@lang('patient.medical_insurance')</label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="medical_insurance" data-live-search="true">

                                    <option value=""

                                    @if (is_null(old('medical_insurance')))
                                        selected    
                                    @endif

                                    >@lang('patient.has_no')</option>

                                    @foreach($medical_insurances as $medical_insurance)

                                        <option value="{{ $medical_insurance->id }}"

                                         @if (old('medical_insurance') == $medical_insurance->id)
                                                selected
                                        @endif

                                        >{{ $medical_insurance->name }} - {{ $medical_insurance->affiliate_type }} - {{ $medical_insurance->module }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('medical_insurance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_insurance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 form-group{{ $errors->has('coinsurance') ? ' has-error' : '' }}">
                            <label for="coinsurance" class="col-md-2 control-label">@lang('patient.coinsurance')</label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="coinsurance" data-live-search="true">

                                    <option value=""

                                    @if (is_null(old('coinsurance')))
                                        selected    
                                    @endif
                                    >@lang('patient.has_no')</option>

                                    @foreach($coinsurances as $coinsurance)

                                        <option value="{{ $coinsurance->id }}"

                                        @if (old('coinsurance') == $coinsurance->id)
                                                selected
                                        @endif

                                        >{{ $coinsurance->name }} - {{ $coinsurance->affiliate_type }} - {{ $coinsurance->module }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('coinsurance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coinsurance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <a  class="btn btn-warning" href="{{ URL::previous() }}"> <i class="fa fa-btn fa-undo" ></i> @lang('general.cancel_button')</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('internment.create_patient')
                                </button>
                              

                            </div>
                        </div>

                    </form>





                </div>
            </div>
        </div>
    </div>
</div>

@endsection
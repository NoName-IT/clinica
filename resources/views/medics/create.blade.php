@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/medics') }}">@lang('general.medics')</a></li>
                        <li class="active">@lang('general.create_medic')</li>
                    </ol>
                </div>

                <div class="panel-body">

                   	<form class="form-horizontal" role="form" method="POST" action="{{ url('/medics') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">@lang('medic.first_name')</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">@lang('medic.last_name')</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                            <label for="blood_type" class="col-md-4 control-label">@lang('medic.blood_type')</label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="blood_type">

                                    @foreach($blood_types as $blood_type)

                                        <option value="{{ $blood_type->id }}"
                                        {{ (old("blood_type->id") == $blood_type->id ? "selected":"") }}
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

                        <div class="form-group{{ $errors->has('medic_type') ? ' has-error' : '' }}">
                            <label for="medic_type" class="col-md-4 control-label">@lang('medic.medic_type')</label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="medic_type">

                                    @foreach($medic_types as $medic_type)

                                        <option value="{{ $medic_type->id }}"
                                        {{ (old("medic_type->id") == $medic_type->id ? "selected":"") }}
                                        >{{ $medic_type->name }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('medic_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medic_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cuit') ? ' has-error' : '' }}">
                                <label for="cuit" class="col-md-4 control-label">@lang('medic.cuit')</label>

                                <div class="col-md-4">
                                    <input id="cuit" type="text" class="form-control" name="cuit" value="{{ old('cuit') }}">

                                    @if ($errors->has('cuit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cuit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                         <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-md-4 control-label">@lang('medic.dni')</label>

                                <div class="col-md-4">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}">

                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                         <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                                <label for="license" class="col-md-4 control-label">@lang('medic.license')</label>

                                <div class="col-md-4">
                                    <input id="license" type="text" class="form-control" name="license" value="{{ old('license') }}">

                                    @if ($errors->has('license'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('license') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                <label for="street_address" class="col-md-4 control-label">@lang('medic.street_address')</label>

                                <div class="col-md-4">
                                    <input id="street_address" type="text" class="form-control" name="street_address" value="{{ old('street_address') }}">

                                    @if ($errors->has('street_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('general.create_medic')
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

@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/internments') }}">@lang('general.internments')</a></li>
                        @if ( $isMinor)
                            <li class="active">@lang('witness.witness')</li>
                        @else
                            @if ( $testigo_1 && !$testigo_2)
                                <li class="active">@lang('witness.witness_1')</li>
                            @else
                                <li class="active">@lang('witness.witness_2')</li>
                            @endif
                        @endif
                    </ol>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('internments/witness') }}">

                        {{ csrf_field() }}
<!--                        @if ( $isMinor)
                            <label for="isMinor" class="col-md-3 control-label">@lang('witness.witness')</label>
                        @else
                            @if ( $testigo_1 && !$testigo_2)
                                <label for="isMinor" class="col-md-3 control-label">@lang('witness.witness_1')</label>
                            @else
                                <label for="isMinor" class="col-md-3 control-label">@lang('witness.witness_2')</label>
                            @endif
                        @endif
 !-->  
                        <input id="internment_id" type="text"  name="internment_id" value="{{ $internment_id }}" hidden="">
                        <input id="responsible" type="text"  name="responsible" value="{{ $isMinor ? 1 :  0 }}" hidden="">
                        <input id="testigo_1" type="text"  name="testigo_1" value="{{ $testigo_1 ? 1 :  0 }}" hidden="">
                        <input id="testigo_2" type="text"  name="testigo_2" value="{{ $testigo_2 ? 1 :  0 }}" hidden="">
                        
                        <div class="row">
                            <div class="row">
                                <div class="col-md-4 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                        <label for="dni" class="col-md-3 control-label">@lang('witness.dni')</label>

                                        <div class="col-md-8">
                                            <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}">

                                            @if ($errors->has('dni'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('dni') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-3 form-group{{ $errors->has('dni_type') ? ' has-error' : '' }}">
                                    <label for="dni_type" class="col-md-6 control-label">@lang('witness.dni_type')</label>

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
                            </div>      
                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="col-md-4 control-label">@lang('witness.first_name')</label>

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
                                    <label for="last_name" class="col-md-2 control-label">@lang('witness.last_name')</label>

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

                        
                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                <label for="birth_date" class="col-md-4 control-label">@lang('witness.birth_date')</label>

                                <div class="col-md-6">

                                    <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') }}">

                                    @if ($errors->has('birth_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                    <label for="street_address" class="col-md-4 control-label">@lang('witness.street_address')</label>

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
                                    <label for="phone" class="col-md-4 control-label">@lang('witness.phone')</label>

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

                            <div class="col-md-6 form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
                                <label for="relationship" class="col-md-2 control-label">@lang('witness.relationship')</label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="relationship" data-live-search="true">

                                        <option value=""

                                        @if (is_null(old('relationship')))
                                            selected    
                                        @endif
                                        >@lang('witness.has_no')</option>

                                        @foreach( $relationships as $relationship)

                                            <option value="{{ $relationship->id }}"

                                            @if (old('relationship') == $relationship->id)
                                                    selected
                                            @endif

                                            >{{ $relationship->name }}</option>
                                        
                                        @endforeach
                                    </select> 

                                    @if ($errors->has('relationship'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('relationship') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <br>

                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a  class="btn btn-warning" href="{{ URL::previous() }}"> <i class="fa fa-btn fa-undo" ></i> @lang('witness.goback')</a>
                             @if ( $isMinor )  
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('witness.create_witnesses')
                                </button>
                            @elseif ( !$testigo_2)
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('witness.create_witnesses')
                                </button> 
                                <button type="submit" id="complete" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('witness.complete_witnesses')
                                </button> 
                            @else             
                                <button type="submit" id="complete" onclick="complete()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('witness.complete_witnesses')
                                </button> 
                            @endif
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
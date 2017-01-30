@extends('layouts.app')



<br>

<br>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/internments') }}">@lang('general.internments')</a></li>
                        <li class="active">@lang('internment.complete')</li>
                    </ol>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('internments/confirm') }}">

                        {{ csrf_field() }}

                        <input id="internment_id" type="text"  name="internment_id" value="{{ $internment->id }}" hidden="">
                        
                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="diagnostic" class="col-md-4 control-label">@lang('internment.diagnostic')</label>

                                    <div class="col-md-8">
                                        <input id="diagnostic" type="text" class="form-control" name="diagnostic" value="{{ $internment->diagnostic }}">

                                        @if ($errors->has('diagnostic'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('diagnostic') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="diagnostic_2" class="col-md-4 control-label">@lang('internment.diagnostic_2')</label>

                                    <div class="col-md-8">
                                        <input id="diagnostic_2" type="text" class="form-control" name="diagnostic_2" value="{{ $internment->diagnostic_2 }}">

                                        @if ($errors->has('diagnostic_2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('diagnostic_2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="initial_date" class="col-md-4 control-label">@lang('internment.initial_date')</label>

                                    <div class="col-md-8">
                                        <input id="initial_date" type="text" class="form-control" name="initial_date" value="{{ $internment->initial_date }}">

                                        @if ($errors->has('initial_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('initial_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="final_date" class="col-md-4 control-label">@lang('internment.final_date')</label>

                                    <div class="col-md-8">
                                        <input id="final_date" type="text" class="form-control" name="final_date" value="{{ $internment->final_date }}">

                                        @if ($errors->has('final_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('final_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                    <label for="room" class="col-md-2 control-label">@lang('internment.room')</label>

                                    <div class="col-md-1">
                                        <input id="room" type="number" class="form-control" name="room" value="{{ $internment->room }}">

                                        @if ($errors->has('room'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('room') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>                        
                            </div>           
                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('medic') ? ' has-error' : '' }}">
                                    <label for="medic" class="col-md-4 control-label">@lang('internment.medic')</label>

                                    <div class="col-md-6">

                                        <select class="form-control selectpicker show-tick" name="medic">

                                            @foreach($medics as $medic)

                                                <option value="{{ $medic->id }}" 
                                                        @if ($internmentMedicId != null )
                                                            @if ( $medic->id == $internmentMedicId->id )
                                                                selected
                                                            @endif
                                                        @endif
                                                    >{{ $medic->full_name }}
                                                </option>
                                            
                                            @endforeach
                                        </select> 

                                        @if ($errors->has('medic'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('medic') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 form-group{{ $errors->has('psychologist') ? ' has-error' : '' }}">
                                    <label for="psychologist" class="col-md-4 control-label">@lang('internment.psychologist')</label>

                                    <div class="col-md-6">

                                        <select class="form-control selectpicker show-tick" name="psychologist">

                                            @foreach($psychologists as $psychologist)

                                                <option value="{{ $psychologist->id }}" 
                                                    @if ($internmentPsychologistId != null)
                                                        @if ($psychologist->id == $internmentPsychologistId->id)
                                                            selected
                                                        @endif
                                                    @endif
                                                    >{{ $psychologist->full_name }}
                                                </option>
                                            
                                            @endforeach
                                        </select> 

                                        @if ($errors->has('psychologist'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('psychologist') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                    <div class="row">

                            <div class="col-md-6 form-group{{ $errors->has('discharge_type') ? ' has-error' : '' }}">
                                <label for="discharge_type" class="col-md-4 control-label">@lang('internment.discharge_type')</label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="discharge_type">

                                        @foreach($discharge_types as $discharge_type)

                                            <option value="{{ $discharge_type->id }}"

                                            @if ($internment->discharge_type == $discharge_type->id)
                                                    selected
                                            @endif

                                            >{{ $discharge_type->name }}</option>
                                        
                                        @endforeach
                                    </select> 

                                    @if ($errors->has('discharge_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discharge_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <br>                   
                    </div>
                            
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="complaint" class="col-md-4 control-label">@lang('internment.complaint')</label>
                                    <div class="col-md-6">
                                        <input type="file" name="datafile" size="40">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="complaint_high" class="col-md-4 control-label">@lang('internment.complaint_high')</label>
                                    <div class="col-md-6">
                                        <input type="file" name="datafile" size="40">
                                    </div>                          
                                </div>
                                <div class="col-md-6 ">

                                </div>
                            </div>        
                            <br>                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a  class="btn btn-warning" href="{{ URL::previous() }}"> <i class="fa fa-btn fa-undo" ></i> @lang('internment.goback')</a>
                          
                                <button type="submit" id="complete" onclick="complete()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('internment.update')
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
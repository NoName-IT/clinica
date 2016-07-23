@extends('layouts.app')

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

                        <input id="internment_id" type="text"  name="internment_id" value="{{ $internment_id }}" hidden="">
                        
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('diagnostic') ? ' has-error' : '' }}">
                                    <label for="diagnostic" class="col-md-4 control-label">@lang('internment.diagnostic')</label>

                                    <div class="col-md-8">
                                        <input id="diagnostic" type="text" class="form-control" name="diagnostic" value="{{ old('$internment->diagnostic') }}">

                                        @if ($errors->has('diagnostic'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('$internment->diagnostic') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                    <label for="rootm" class="col-md-2 control-label">@lang('internment.room')</label>

                                    <div class="col-md-8">
                                        <input id="room" type="text" class="form-control" name="room" value="{{ old('room') }}">

                                        @if ($errors->has('room'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('room') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group{{ $errors->has('clinic_history') ? ' has-error' : '' }}">
                                <label for="clinic_history" class="col-md-4 control-label">@lang('internment.clinic_history')</label>
                                <div class="col-md-6">

                                    <input id="clinic_history" type="text" class="form-control" name="clinic_history" value="{{ old('clinic_history') }}">

                                    @if ($errors->has('clinic_history'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('clinic_history') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('medic') ? ' has-error' : '' }}">
                                <label for="medic" class="col-md-6 control-label">@lang('internment.medic')</label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="medic">

                                        @foreach($medics as $medic)

                                            <option value="{{ $medic->id }}"

                                            @if (old('medic') == $medic->id)
                                                    selected
                                            @endif

                                            >{{ $medic->full_name }}</option>
                                        
                                        @endforeach
                                    </select> 

                                    @if ($errors->has('medic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        	</div>

                        <br>

                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a  class="btn btn-warning" href="{{ URL::previous() }}"> <i class="fa fa-btn fa-undo" ></i> @lang('internment.goback')</a>
                          
                                <button type="submit" id="complete" onclick="complete()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('internment.complete')
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
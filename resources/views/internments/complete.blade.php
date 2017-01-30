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
                    @include('flash::message')
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('internments/confirm') }}">

                        {{ csrf_field() }}

                        <input id="internment_id" type="text"  name="internment_id" value="{{ $internment->id }}" hidden="">
                        
                        <div class="row">
                                    <div class="col-md-4 form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="col-md-6 control-label">@lang('internment.order_number')</label>
                                            <div class="col-md-8">
                                                <input id="order" type="text" class="form-control" readonly name="order" value="{{ $internment->order }}">
                                                @if ($errors->has('order'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('order') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>

                                    <div class="col-md-4 form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="col-md-6 control-label">@lang('internment.clinic_history')</label>
                                            <div class="col-md-8">
                                                <input id="order" type="text" class="form-control" readonly name="order" value="{{ $internment->patient->clinic_history }}">
                                                @if ($errors->has('order'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('order') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                        </div>
                        <div class="row">
                                    <div class="col-md-4 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-6 control-label">@lang('internment.patient_full_name')</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" readonly name="name" value="{{ $internment->patient->full_name }}">
                                                @if ($errors->has('order'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>

                                    <div class="col-md-4 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                            <label for="dni" class="col-md-6 control-label">@lang('general.dni')</label>
                                            <div class="col-md-8">
                                                <input id="dni" type="text" class="form-control" readonly name="dni" value="{{ $internment->patient->dni }}">
                                                @if ($errors->has('dni'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('dni') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
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
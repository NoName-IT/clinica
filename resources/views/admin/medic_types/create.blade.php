@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/admin/medic_types') }}">@lang('general.medic_types')</a></li>
                        <li class="active">@lang('general.create_medic_type')</li>
                    </ol>
                </div>

                <div class="panel-body">
                    

                	<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/medic_types') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('medic.type')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('general.create_medic_type')
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

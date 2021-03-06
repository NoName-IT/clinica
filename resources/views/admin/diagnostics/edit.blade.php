@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/admin/relationships') }}">@lang('general.relationships')</a></li>
                        <li class="active">@lang('general.edit_relationship')</li>
                    </ol>
                </div>

                <div class="panel-body">
                    

                	<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.relationships.update', $relationship) }}">

                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('medic.type')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $relationship->name }}">

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
                                    <i class="fa fa-btn fa-user"></i> @lang('general.edit_relationship')
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

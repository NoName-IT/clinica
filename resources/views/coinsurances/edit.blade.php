@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="{{ url('/coinsurances') }}">@lang('general.coinsurances')</a></li>
                        <li class="active">@lang('general.edit_coinsurance')</li>
                    </ol>
                </div>

                <div class="panel-body">

                   	<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('coinsurances.update', $coinsurance) }}">

                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">@lang('coinsurance.name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $coinsurance->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('affiliate_type') ? ' has-error' : '' }}">
                            <label for="affiliate_type" class="col-md-4 control-label">@lang('coinsurance.affiliate_type')</label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="affiliate_type">

                                    @foreach($affiliate_types as $affiliate_type)

                                        <option value="{{ $affiliate_type }}"
                                        {{ ($coinsurance->affiliate_type == $affiliate_type ? "selected":"") }}
                                        >{{ $affiliate_type }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('affiliate_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('affiliate_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                            <label for="module" class="col-md-4 control-label">@lang('coinsurance.module')</label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="module">

                                    @foreach($modules as $module)

                                        <option value="{{ $module }}"
                                        {{ ($coinsurance->module == $module ? "selected":"") }}
                                        >{{ $module }}</option>
                                    
                                    @endforeach
                                </select> 

                                @if ($errors->has('module'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('module') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('available_days') ? ' has-error' : '' }}">
                                <label for="available_days" class="col-md-4 control-label">@lang('coinsurance.available_days')</label>

                                <div class="col-md-2">
                                    <input id="available_days" type="text" class="form-control" name="available_days" value="{{ $coinsurance->available_days }}">

                                    @if ($errors->has('available_days'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('available_days') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                         <div class="form-group{{ $errors->has('renovation_days') ? ' has-error' : '' }}">
                                <label for="renovation_days" class="col-md-4 control-label">@lang('coinsurance.renovation_days')</label>

                                <div class="col-md-2">
                                    <input id="renovation_days" type="text" class="form-control" name="renovation_days" value="{{ $coinsurance->renovation_days }}">

                                    @if ($errors->has('renovation_days'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('renovation_days') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('price_per_day') ? ' has-error' : '' }}">
                                <label for="price_per_day" class="col-md-4 control-label">@lang('coinsurance.price_per_day')</label>

                                <div class="col-md-2">
                                    <input id="price_per_day" type="text" class="form-control" name="price_per_day" value="{{ $coinsurance->price_per_day }}">

                                    @if ($errors->has('price_per_day'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price_per_day') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('coverage') ? ' has-error' : '' }}">
                                <label for="coverage" class="col-md-4 control-label">@lang('coinsurance.coverage')</label>

                                <div class="col-md-2">
                                    <input id="coverage" type="text" class="form-control" name="coverage" value="{{ $coinsurance->coverage }}">

                                    @if ($errors->has('coverage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coverage') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('iva') ? ' has-error' : '' }}">
                                <label for="iva" class="col-md-4 control-label">@lang('coinsurance.iva')</label>

                                <div class="col-md-2">
                                    <input id="iva" type="text" class="form-control" name="iva" value="{{ $coinsurance->iva }}">

                                    @if ($errors->has('iva'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('iva') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> @lang('general.edit_coinsurance')
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

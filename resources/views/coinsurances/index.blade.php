@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.coinsurances')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                     <a href="{{ url('/coinsurances/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_coinsurance')
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('coinsurance.name')</th>
                            <th>@lang('coinsurance.affiliate_type')</th>
                            <th>@lang('coinsurance.module')</th>
                            <th>@lang('coinsurance.available_days')</th>
                            <th>@lang('coinsurance.renovation_days')</th>
                            <th>@lang('coinsurance.price_per_day')</th>
                            <th>@lang('coinsurance.coverage')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($coinsurances as $coinsurance)
                                <tr data-id="{{ $coinsurance->id }}">
                                    <td>{{ $coinsurance->name }}</td>
                                    <td>{{ $coinsurance->affiliate_type }}</td>
                                    <td>{{ $coinsurance->module }}</td>
                                    <td>{{ $coinsurance->available_days }}</td>
                                    <td>{{ $coinsurance->renovation_days }}</td>
                                    <td>{{ $coinsurance->price_per_day }}</td>
                                    <td>{{ $coinsurance->coverage }}</td>

                                    <td>
                                        <a href="{{ route('coinsurances.edit',$coinsurance->id) }}" class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                     {!! $coinsurances->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/coinsurances/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection

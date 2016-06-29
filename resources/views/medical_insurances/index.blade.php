@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.medical_insurances')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                     <a href="{{ url('/medical_insurances/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_medical_insurance')
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('medical_insurance.name')</th>
                            <th>@lang('medical_insurance.affiliate_type')</th>
                            <th>@lang('medical_insurance.module')</th>
                            <th>@lang('medical_insurance.available_days')</th>
                            <th>@lang('medical_insurance.renovation_days')</th>
                            <th>@lang('medical_insurance.price_per_day')</th>
                            <th>@lang('medical_insurance.coverage')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($medical_insurances as $medical_insurance)
                                <tr data-id="{{ $medical_insurance->id }}">
                                    <td>{{ $medical_insurance->name }}</td>
                                    <td>{{ $medical_insurance->affiliate_type }}</td>
                                    <td>{{ $medical_insurance->module }}</td>
                                    <td>{{ $medical_insurance->available_days }}</td>
                                    <td>{{ $medical_insurance->renovation_days }}</td>
                                    <td>{{ $medical_insurance->price_per_day }}</td>
                                    <td>{{ $medical_insurance->coverage }}</td>

                                    <td>
                                        <a href="{{ route('medical_insurances.edit',$medical_insurance->id) }}" class="btn btn-warning">
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

                    
                     {!! $medical_insurances->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/medical_insurances/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection

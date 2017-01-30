@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.patients')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                     <a href="{{ url('/patients/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_patient')
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('general.full_name')</th>
                            <th>@lang('general.dni')</th>
                            <th>@lang('general.birth_date')</th>
                            <th>@lang('general.age')</th>
                            <th>@lang('general.clinic_history')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($patients as $patient)
                                <tr data-id="{{ $patient->id }}">
                                    <td>{{ $patient->full_name }}</td>
                                    <td>{{ $patient->dni }}</td>
                                    <td>{{ $patient->birth_date }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->clinic_history}}</td>


                                    <td>
                                        <a href="{{ route('patients.edit',$patient->id) }}" class="btn btn-warning">
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

                    
                     {!! $patients->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/patients/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection

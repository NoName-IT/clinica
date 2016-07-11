@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.internments')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                     <a href="{{ url('/internments/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_internment')
                        </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('internment.patient_full_name')</th>
                            <th>@lang('internment.diagnostic')</th>
                            <th>@lang('internment.room')</th>
                            <th>@lang('internment.clinic_history')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($internments as $internment)
                                <tr data-id="{{ $internment->id }}">
                                    <td>{{ $internment->patient->full_name }}</td>
                                    <td>{{ str_limit($internment->diagnostic, $limit = 20, $end = '...') }}</td>
                                    <td>{{ $internment->room }}</td>
                                    <td>{{ $internment->clinic_history }}</td>
                                    <td>
                                        <a href="{{ route('internments.edit',$internment->id) }}" class="btn btn-warning">
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

                    
                     {!! $internments->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/internments/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.medics')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                     <a href="{{ url('/medics/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_medic')
                        </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('medic.first_name')</th>
                            <th>@lang('medic.last_name')</th>
                            <th>@lang('medic.medic_type')</th>
                            <th>@lang('medic.cuit')</th>
                            <th>@lang('medic.dni')</th>
                            <th>@lang('medic.license')</th>
                            <th>@lang('medic.phone')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($medics as $medic)
                                <tr data-id="{{ $medic->id }}">
                                    <td>{{ $medic->first_name }}</td>
                                    <td>{{ $medic->last_name }}</td>
                                    <td>{{ $medic->medic_type->name }}</td>
                                    <td>{{ $medic->cuit }}</td>
                                    <td>{{ $medic->dni }}</td>
                                    <td>{{ $medic->license }}</td>
                                    <td>{{ $medic->phone }}</td>

                                    <td>
                                        <a href="{{ route('medics.edit',$medic->id) }}" class="btn btn-warning">
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

                    
                     {!! $medics->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/medics/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection

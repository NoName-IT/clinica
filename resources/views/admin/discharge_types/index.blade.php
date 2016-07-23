@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('layouts.topbar')
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <div class='ajax-message'>
                    </div>

                    <a href="{{ url('/admin/discharge_types/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_discharge_type')
                    </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('medic.id')</th>
                            <th>@lang('medic.type')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($discharge_types as $discharge_type)
                                <tr data-id="{{ $discharge_type->id }}">
                                    <td>{{ $discharge_type->id }}</td>
                                    <td>{{ $discharge_type->name }}</td>

                                    <td>
                                        <a href="{{ route('admin.discharge_types.edit',$discharge_type->id) }}" class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger" disabled>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                     {!! $discharge_types->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

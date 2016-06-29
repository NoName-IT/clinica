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

                    <a href="{{ url('/admin/dni_types/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_dni_type')
                    </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('medic.id')</th>
                            <th>@lang('medic.type')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($dni_types as $dni_type)
                                <tr data-id="{{ $dni_type->id }}">
                                    <td>{{ $dni_type->id }}</td>
                                    <td>{{ $dni_type->name }}</td>

                                    <td>
                                        <a href="{{ route('admin.dni_types.edit',$dni_type->id) }}" class="btn btn-warning">
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

                    
                     {!! $dni_types->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

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

                    <a href="{{ url('/admin/blood_types/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_blood_type')
                    </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('medic.id')</th>
                            <th>@lang('medic.type')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($blood_types as $blood_type)
                                <tr data-id="{{ $blood_type->id }}">
                                    <td>{{ $blood_type->id }}</td>
                                    <td>{{ $blood_type->name }}</td>

                                    <td>
                                        <a href="{{ route('admin.blood_types.edit',$blood_type->id) }}" class="btn btn-warning">
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

                    
                     {!! $blood_types->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

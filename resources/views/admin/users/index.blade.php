@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active">@lang('general.users')</li>
                    </ol>
                </div>

                <div class="panel-body">

                     @include('flash::message')

                     <a href="{{ url('/admin/users/create') }}" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_user')
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('general.id')</th>
                            <th>@lang('general.name')</th>
                            <th>@lang('general.email')</th>
                            <th>@lang('general.actions')</th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a> 
                                        <a href="" class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                     {!! $users->render() !!}
                   
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

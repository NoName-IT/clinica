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

                <div class="panel-body" >

                     @include('flash::message')

                    <div class='ajax-message'>
                    </div>


                    <a href="{{ url('/admin/users/create') }}" class="btn btn-success">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> @lang('general.create_user')
                    </a>

                    <div class="users">
                    
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
                                    <tr data-id="{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-warning">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            @if (Auth::user()->id == $user->id)
                                                <a href="#!" class="btn btn-danger" disabled>
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            @endif

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
</div>

 <form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ url('/admin/users/:MY_ID') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
</form>



@endsection

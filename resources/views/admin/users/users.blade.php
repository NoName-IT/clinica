

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
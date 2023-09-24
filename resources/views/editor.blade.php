@extends('layouts.app')
<link href="{{ asset('css/styles.scss') }}" rel="stylesheet">


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as editor!') }}
                </div>
            </div>
        </div>
    </div>

    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
              
                    <td>
                        @if($user->id == $auth_id)
                            @if($user->status == 'Active')
                                <a href="{{ route('deactivate', ['id' => $user->id]) }}">Deactivate</a>
                            @else
                                <a href="{{ route('activate', ['id' => $user->id]) }}">Activate</a>
                            @endif
                        @else
                            @if($user->status == 'Active')
                                <a href="{{ route('deactivate', ['id' => $user->id]) }}" class="disabled-link">Deactivate</a>
                            @else
                                <a href="{{ route('activate', ['id' => $user->id]) }}" class="disabled-link">Activate</a>
                            @endif
                        @endif
                    </td>


                    <td>
                        @if($user->id == $auth_id)
                            <form method="POST" action="{{ route('delete', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="sub">Delete</button>
                            </form>
                            @else
                            <button disabled>Delete</button>

                        @endif
                    </td>


           
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@extends('layouts.app')

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

                    {{ __('You are logged in as admin!') }}
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
                        @if($user->status == 'Active')
                            <a href="{{ route('deactivate', ['id' => $user->id]) }}">Deactivate</a>
                        @else
                            <a href="{{ route('activate', ['id' => $user->id]) }}">Activate</a>
                        @endif
                    </td>

                    <td>
                        <form method="POST" action="{{ route('delete', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>


           
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

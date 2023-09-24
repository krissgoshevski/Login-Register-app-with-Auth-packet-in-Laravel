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

                    {{ __('You are logged in as regular user!') }}
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
                                <p>Active</p>
                            @else
                                <p>Inactive</p>
                            @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

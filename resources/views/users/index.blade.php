@extends('template')

@section('content')
    <h1>Users</h1>
    <br>
    <a href="{{route('admin.users.create')}}" class="btn btn-primary">New User</a>
    <br><br>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is Admin</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->is_admin ? "Yes": "No"}}</td>
                <td>
                    <a href="{{ route('admin.users.show', ['id'=>$user->id]) }}">Show</a> |
                    <a href="{{ route('admin.users.edit', ['id'=>$user->id]) }}">Edit</a> |
                    <a href="{{ route('admin.users.destroy', ['id'=>$user->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $users->render() !!}
@endsection
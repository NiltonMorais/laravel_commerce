@extends('template')

@section('content')
    <h1>Create User</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'admin.users.store']) !!}
        @include('users._form')
        <div class="form-group">
            {!! Form::submit('Add User', ['class'=>'btn btn-primary ']) !!}
            <a href="{{ route('admin.users.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection
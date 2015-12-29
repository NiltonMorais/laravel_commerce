@extends('template')

@section('content')
    <h1>Edit User: {{ $user->name }}</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['admin.users.update', $user->id], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_admin', 'Admin:') !!}
        {!! Form::checkbox('is_admin',null , $user->is_admin ? true : false) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save User', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('admin.users.index') }}" class='btn btn-default '>Back</a>
    </div>
    {!! Form::close() !!}

@endsection
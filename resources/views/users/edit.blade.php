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

    {!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method' => 'put']) !!}
        @include('users._form')
        <div class="form-group">
            {!! Form::label('is_admin', 'Admin:') !!}
            {!! Form::checkbox('is_admin') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save User', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('admin.users.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection
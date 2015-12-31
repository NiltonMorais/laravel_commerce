@extends('template')

@section('content')
    <h1>Edit Order: {{ $order->id }}</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($order, ['route'=>['admin.users.update', $order->id], 'method' => 'put']) !!}
        @include('users._form')
        <div class="form-group">
            {!! Form::submit('Save Order', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('admin.users.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection
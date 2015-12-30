@extends('template')

@section('content')
    <h1>Create Product</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'admin.products.store']) !!}
        @include('products._form')
        <div class="form-group">
            {!! Form::submit('Add Products', ['class'=>'btn btn-primary ']) !!}
            <a href="{{ route('admin.products.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection
@extends('template')

@section('content')
    <h1>Edit Category: {{ $category->name }}</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($category, ['route'=>['admin.categories.update', $category->id], 'method' => 'put']) !!}
        @include('categories._form')
        <div class="form-group">
            {!! Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('admin.categories.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection
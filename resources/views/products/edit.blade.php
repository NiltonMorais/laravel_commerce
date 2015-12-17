@extends('template')

@section('content')
    <h1>Edit Product: {{ $product->name }}</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['admin.products.update', $product->id], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('featured', 'Featured:') !!}
        {!! Form::checkbox('featured',null , $product->featured ? true : false) !!}
    </div>
    <div class="form-group">
        {!! Form::label('recommend', 'Recommend:') !!}
        {!! Form::checkbox('recommend',null, $product->recommend ? true : false) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('admin.products.index') }}" class='btn btn-default '>Back</a>
    </div>
    {!! Form::close() !!}

@endsection
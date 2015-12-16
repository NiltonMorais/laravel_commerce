@extends('template')

@section('content')
    <h1>Show Category: {{ $category->name }}</h1>
    <br>

    <p><b>Name:</b> {{$category->name}}</p>
    <p><b>Description:</b> {{$category->description}}</p>

    <br>
    <a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}" class='btn btn-primary '>Edit</a>
    <a href="{{ route('admin.categories.destroy', ['id'=>$category->id]) }}" class='btn btn-danger '>Delete</a>
    <a href="{{ route('admin.categories.index') }}" class='btn btn-default '>Back</a>


@endsection
@extends('template')

@section('content')
    <h1>Show Product: {{ $product->name }}</h1>
    <br>

    <p><b>Category:</b> {{$product->category->name}}</p>
    <p><b>Name:</b> {{$product->name}}</p>
    <p><b>Description:</b> {{$product->description}}</p>
    <p><b>Price:</b> {{$product->price}}</p>
    <p><b>Featured:</b> {{$product->featured ? "Yes" : "No"}}</p>
    <p><b>Recommend:</b> {{$product->recommend ? "Yes" : "No"}}</p>
    <p><b>Tags:</b> {{$product->tag_list }}</p>

    <br>
    <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}" class='btn btn-primary '>Edit</a>
    <a href="{{ route('admin.products.images.index', ['id'=>$product->id]) }}" class="btn btn-info">Images</a>
    <a href="{{ route('admin.products.destroy', ['id'=>$product->id]) }}" class='btn btn-danger '>Delete</a>
    <a href="{{ route('admin.products.index') }}" class='btn btn-default '>Back</a>


@endsection
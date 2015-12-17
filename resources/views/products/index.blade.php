@extends('template')

@section('content')
    <h1>Products</h1>
    <br>
    <a href="{{route('admin.products.create')}}" class="btn btn-primary">New Product</a>
    <br><br>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Featured</th>
            <th>Recommend</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->featured ? 'Yes' : "No"}}</td>
                <td>{{$product->recommend ? 'Yes' : "No"}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <a href="{{ route('admin.products.show', ['id'=>$product->id]) }}">Show</a> |
                    <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}">Edit</a> |
                    <a href="{{ route('admin.products.destroy', ['id'=>$product->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->render() !!}
@endsection
@extends('template')

@section('content')
    <h1>Images of {{ $product->name }}</h1>
    <br>
    <a href="{{route('admin.products.images.create', ['id'=>$product->id])}}" class="btn btn-primary">New Image</a>
    <br><br>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Extension</th>
            <th>Action</th>
        </tr>
        @foreach($product->images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td>
                    <img src="{{ url('uploads/'.$image->id.".".$image->extension) }}" width="80">
                </td>
                <td>{{$image->extension}}</td>
                <td>
                    <a href="{{ route('admin.products.images.destroy', ['id'=>$image->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>

@endsection
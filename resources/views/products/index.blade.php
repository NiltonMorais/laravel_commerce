@extends('template')

@section('content')
    <h1>Products</h1>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
@endsection
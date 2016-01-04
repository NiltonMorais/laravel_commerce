@extends('template')

@section('content')
    <h1>Show Order: {{ $order->id }}</h1>
    <br>

    <p><b>User:</b> {{$order->user->name}}</p>
    <p><b>Valor:</b> {{$order->total}}</p>
    <p><b>Status:</b> {{$order->status ? "Aprovado" : "Pendente"}}</p>
    <p><b>Itens:</b><p>
        <table class="table">
            <tr>
                <td>#ID</td>
                <td>Nome</td>
                <td>Qtd</td>
                <td>Valor unitário</td>
            </tr>
            @foreach($order->items as $item)
            <tr>
                <td><a href="{{ route('admin.products.show',['id'=>$item->product->id]) }}">{{ $item->product->id }}</a></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->qtd }}</td>
                <td>{{ $item->price }}</td>
            </tr>
            @endforeach
        </table>

    <br>
    <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class='btn btn-primary '>Edit</a>
    <a href="{{ route('admin.orders.index') }}" class='btn btn-default '>Back</a>


@endsection
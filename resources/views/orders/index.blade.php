@extends('template')

@section('content')
    <h1>Orders</h1>
    <br>

    <table class="table">
        <tr>
            <th>#ID</th>
            <th>User</th>
            <th>Itens</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td><a href="{{ route('admin.users.show', ['id'=>$order->user->id]) }}">{{$order->user->name}}</a></td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$order->total}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <a href="{{ route('admin.orders.show', ['id'=>$order->id]) }}">Show</a> |
                    <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $orders->render() !!}
@endsection
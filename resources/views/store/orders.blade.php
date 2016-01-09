@extends('store.store')


@section('content')


    <div class="col-sm-9 padding-right">
            <h3>Meus pedidos</h3>

        <table class="table">
            <tbody>
            <tr>
                <th>Código da Transação</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Meio de pagamento</th>
            </tr>

            @foreach($orders as $order)
                <tr>
                    <td>{{$order->transaction_code}}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td>{{$order->status->name}}</td>
                    <td>{{$order->paymentType->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
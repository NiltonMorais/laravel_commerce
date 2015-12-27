@extends('store.store')


@if(isset($cart))
    @section('categories')
        @include('store.partial.categories')
    @stop
@endif


@section('content')


    <div class="col-sm-9 padding-right">

        @if(isset($cart))
            <h3>Carrinho de compras vazio</h3>
        @else
            <h3>Pedido realizado com sucesso!</h3>
            <p>O pedido #{{ $order->id }}, foi realizado com sucesso!</p>
        @endif
    </div>
@stop
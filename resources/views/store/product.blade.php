@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')


    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt=""/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" width="200">
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                                <a href="#"><img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" alt="" width="80"></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>
                    <p>
                        @foreach($product->tags as $tag)
                            <a href="{{ route('store.tag', ['id'=>$tag->id]) }}" class="label label-primary">{{ $tag->name }}</a>
                        @endforeach
                    </p>
                                <span>
                                    <span>R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                                        <a href="{{ route('store.cart.add', ['id'=>$product->id]) }}" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@stop
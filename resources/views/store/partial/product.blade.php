@foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">

                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.".".$product->images->first()->extension) }}" alt="" width="200"/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                    @endif

                    <h2>R$ {{ $product->price }}</h2>
                    <p>{{ $product->name }}</p>
                    <a href="{{ route('store.product',['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="{{ route('store.cart.add', ['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{ $product->price }}</h2>
                        <p>{{ $product->name }}</p>
                        <a href="{{ route('store.product',['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="{{ route('store.cart.add', ['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
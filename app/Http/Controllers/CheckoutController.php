<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){
            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]);

            foreach($cart->all() as $k=>$item){
                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'],2,".", ""), $item['qtd']));
            }

            $cart->clear();

            event(new CheckoutEvent());

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::all();

        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);

    }

}

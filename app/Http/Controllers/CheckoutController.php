<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){
            $order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]);

            foreach($cart->all() as $k=>$item){
                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            $cart->clear();

            return view('store.checkout', compact('order'));
        }

        $categories = Category::all();

        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);

    }
}

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
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Requests\PreApprovals\Request;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, CheckoutService $checkoutService)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){
            $checkout = $checkoutService->createCheckoutBuilder();

            foreach($cart->all() as $k=>$item){
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'],2,".", ""), $item['qtd']));
            }

            event(new CheckoutEvent());

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::all();

        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);

    }

    public function end(\Illuminate\Http\Request $request, Locator $service, Order $orderModel)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }

        $cart = Session::get('cart');

        $transaction_code = $request->get('transaction_id');
        $transaction = $service->getByCode($transaction_code);

        $status = $transaction->getDetails()->getStatus();
        $payment_type = $transaction->getPayment()->getPaymentMethod()->getType();
        $netAmount = $transaction->getPayment()->getNetAmount();

        $order = $orderModel->create([
            'user_id'=>Auth::user()->id,
            'total'=>$cart->getTotal(),
            'status_id'=>$status,
            'transaction_code'=>$transaction_code,
            'payment_type_id'=>$payment_type,
            'netAmount'=>$netAmount,
        ]);

        foreach($cart->all() as $k=>$item){
            $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
        }


        $cart->clear();


        return redirect()->route('account.orders');
    }


}

<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('orders.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['is_admin'] = $request->get('is_admin') ? true : false;
        $this->orderModel->find($id)->update($input);
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->orderModel->find($id)->delete();
        return redirect()->route('admin.orders.index');
    }
}

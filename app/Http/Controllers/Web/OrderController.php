<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function viewOrder()
    {
        $orders = Order::where('user_id', Auth::user()->id ?? '')->get();

        return view('website.orders.dashboard', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->find($id);
        //  dd($order->total);

        $order_products = OrderProduct::where('order_id', $order->id)
            ->with(['product', 'order'])->orderBy('id', 'DESC')->get();



        return view('website.orders.show', compact('order', 'order_products'));
    }
}

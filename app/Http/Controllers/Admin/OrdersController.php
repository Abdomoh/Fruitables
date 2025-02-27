<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\session;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
        return view('dashboard.orders.index', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function updateStatusOrder($id)
    {
        $order = Order::find($id);
        if ($order->status == 'panding') {
            $order->status = 'completed';
        } else {
            $order->status = 'panding';
        }
        $order->update([$order]);
        session::flash('updateStatusOrder', ' تم  تغير حالة الطلب بنجاح');
        return back();
    }



    public function show(string $id)
    {

        $order = Order::with('user', 'orderProducts')->find($id);
        //return $order;
        $subtotal = $order->sum('total');
        return view('dashboard.orders.show', (['order' => $order, 'subtotal' => number_format($subtotal, 2)]));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Web;



use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cartproducts = Cart::with(['product'])->AuthUser()->orderBy('created_at', 'desc')->get();

        return view('website.checkout.checkout', compact('cartproducts'));
    }

    public function placeOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'payment_method' => 'required',
            'address' => 'required',
            'phone' => 'required|starts_with:0|digits:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $cart = Cart::with('product')->AuthUser()->orderBy('created_at', 'desc')->get();
        //dd($cart);
        if ($cart->count() > 0) {
            $order = new Order();
            $order->payment_method = $request->payment_method;
            $order->notes_order = $request->notes_order;
            $order->user_id = Auth::user()->id;

            $order->save();

            $items = Cart::with('product')->AuthUser()->get();
            foreach ($items as $key => $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'user_id' => Auth::user()->id ?? ''
                ]);
            }
            $orderProduct = OrderProduct::where('order_id', $order->id)
                ->select(OrderProduct::raw('sum(quantity * price) as total'))->first();
            $order->total = $orderProduct->total;
            $order->save();
            if (empty(Auth::user()->adress)) {
                $user = User::where('id', Auth::user()->id ?? '')->first();
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->email = $request->email;
                $user->update();
            }
            session::flash('success', __('main.add_to_cart_success'));
            return back();
        } else {
            session::flash(' warning', 'غير موجود بالعربة  ');
            return back();
        }
    }
}

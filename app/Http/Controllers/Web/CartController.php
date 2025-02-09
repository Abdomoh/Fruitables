<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class CartController extends Controller
{
    public function addProductToCart(CartRequest $request)
    {

        $validator = $request->validated();
        $input = $request->all();
        $user_id = Auth::user()->id ?? 'None';
        if (Cart::AuthUser()->where('product_id', $input['product_id'])->count() > 0) {
            session::flash('warning', __('main.already_to_cart_success'));
            return back();
        } else {

            $cart = Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $user_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request['price'] * $request['quantity'],
            ]);
            $cart->save();
            session::flash('success', __('main.add_to_cart_success'));
            return back();
        }
    }
    public function viewCartProduct()
    {

        $cartProducts = Cart::with('product')->AuthUser()->latest()->get();
        return view('website.cart.cart', compact('cartProducts'));
    }

    public function updateProductInCart(Request $request, $id)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $cart = Cart::find($id);

        $cart->total = $cart->price * $input['quantity'];

        if (!$cart) {
            session::flash('warning', __('main.not_found_cart'));
            return back();
        } else {

            $cart = $cart->update($input);
            session::flash('info', __('main.update_cart'));
            return back();
        }
    }

    public function removeProductInCart($id)
    {
        $product = Cart::AuthUser()->where('product_id', $id)->first();
        if (!$product) {
            session::flash(' warning', __('main.not_found_cart'));
            return back();
        }
        $deleted = $product->delete();
        if ($deleted) {
            session::flash('error', __('main.remove_to_cart'));
            return back();
        }
    }
}

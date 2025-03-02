<?php
namespace App\Http\Controllers\Web;
use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class PaymentController extends Controller
{
    public function stripe($total)
    {
        return view('website.payment.stripe', compact('total'));
    }
    public function stripeStore(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from abdalmaged ",
        ]);
        try {
            DB::beginTransaction();
            $order = new Order();
            $order->payment_method = 1;
            $order->order_notes = $request->order_notes;
            $order->order_no = 'ORD-' . Str::random(8);
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
            // Clear the cart after successful order
            $this->clearUserCart();
            DB::commit();
            // Update user address if empty
            $this->updateUserAddress($request);
            
            session::flash('success', __('main.add_to_order_success'));
            return to_route('cart-product');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('success',__('main.payment_success'));
            return redirect('cart-product');
        }
    }
    private function clearUserCart()
    {
        $removeCart = Cart::AuthUser()->get();
        foreach ($removeCart as $key => $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
    }
    private function updateUserAddress($request)
    {
        $user = Auth::user();
        if (empty($user->address)) {
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
            ]);
        }
    }
}

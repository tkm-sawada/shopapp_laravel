<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\User;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;

        $totalPrice = 0;
        $quantities = array();
        foreach($products as $product){
            $totalPrice += $product->price * $product->pivot->quantity;

            $quantities[$product->id] = Stock::where('product_id', $product->id)->sum('quantity');
            if($quantities[$product->id] > 9){
                $quantities[$product->id] = 9;
            }
        }

        return view('user.cart', compact('products', 'totalPrice', 'quantities'));
    }
    
    public function add(Request $request)
    {
        $itemInCart = Cart::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
        if( $itemInCart ){
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();
        }else{
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }     
        
        return redirect()->route('user.cart.index');
    }
    
    public function update(Request $request, $id)
    {
        $itemInCart = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if( $itemInCart ){
            $itemInCart->quantity = $request->selectQuantity;
            $itemInCart->save();
        }     
        
        return redirect()->route('user.cart.index')
            ->with(['message' => '数量を更新しました。', 'status' => 'info']);
    }
    
    public function delete($id)
    {
        Cart::where('product_id', $id)->where('user_id', Auth::id())->delete();
        
        return redirect()->route('user.cart.index');
    }
    
    public function checkout()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;

        $lineItems = array();
        foreach($products as $product){
            $quantity = Stock::where('product_id', $product->id)->sum('quantity');
            //在庫が足りているか確認
            if($product->pivot->quantity > $quantity){
                return redirect()->route('user.cart.index');
            }else{
                //在庫が足りていたら先に在庫減らす
                Stock::create([
                    'product_id' => $product->id,
                    'type' => \Constant::PRODUCT_LIST['reduce'],
                    'quantity' => $product->pivot->quantity * -1,
                ]);

                //Stripe用のlineitem作成
                $lineItem = [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $product->name,
                            'description' => $product->information,
                        ],
                        'unit_amount' => $product->price,
                    ],
                    // 'name' => $product->name,
                    // 'description' => $product->information,
                    // 'amount' => $product->price,
                    // 'currency' => 'jpy',
                    'quantity' => $product->pivot->quantity,
                ];
                array_push($lineItems, $lineItem);
            }
        }

        // https://stripe.com/docs/checkout/quickstart
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [$lineItems],
              'mode' => 'payment',
              'success_url' => route('user.cart.success'),
              'cancel_url' => route('user.cart.cancel'),
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');
        
        return view('user.checkout', compact('session', 'publicKey'));
    }

    public function success()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('user.items.index');
    }

    public function cancel()
    {
        $user = User::findOrFail(Auth::id());
        foreach($user->products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->quantity,
            ]);
        }

        return redirect()->route('user.items.index');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class CartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.cart.mycart_view');
    }

    public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    public function RemoveCartProduct($id){
        Cart::remove($id);
        return response()->json(['success' => 'Product Removed from Cart.']);
    }

    public function Cartincrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    }

    public function Cartdecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('decrement');
    }

    public function CheckoutCreate(){
        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal'));

            }else{
                $notification = array(
                    'message' => 'Add Product to Cart.',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'You need to Login.',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }
}

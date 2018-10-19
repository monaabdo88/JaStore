<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index() {
        return view('front.cart.index');
    }

    public function store(Request $request) {
        $dubal = Cart::search(function($cartItem,$rowId) use($request){
            return $cartItem->id === $request->id;
        });
        if(! empty($dubal)){
            return redirect()->back()->with('msg','Item is already in your cart');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect()->back()->with('msg','Item has been added to cart');

    }
    public function destroy($id){
        Cart::remove($id);
        return redirect()->back()->with('msg','Item has been removed from cart');
    }
    public function saveLater($id){
        $dubal = Cart::instance('saveForLater')->search(function($cartItem,$rowId) use($id){
            return $cartItem->id === $id;
        });
        if(! empty($dubal)){
            return redirect()->back()->with('msg','Item is already in your save later list');
        }
        $item = Cart::get($id);
        Cart::remove($id);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->back()->with('msg','Item has been saved for later');

    }
}

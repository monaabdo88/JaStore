<?php

namespace App\Http\Controllers\Front;

use Cartalyst\Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class CheckoutController extends Controller
{
    public function index(){
        return view('front.checkout.index');
    }
    public function store(Request $request){
        $contents = Cart::instance('default')->content()->map(function ($item){
            return $item->name.' '.$item->qty;
        })->values()->toJson();
        try{
            $stripe = Stripe::make('sk_test_hS23tTOs10LHsrm05LxvYrS6');
            $charge= $stripe->charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Some Text',
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count()
                ]
            ]);
            Cart::instance('default')->destroy();
            return redirect()->back()->with('msg','Success Thank you');
        }catch(Exception $exc){

        }
    }
}

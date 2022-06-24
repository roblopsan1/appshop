<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    //
    public function store(Request $request)
    {
        $cartDetail=new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id=$request->product_id; 
        $cartDetail->quantity =$request->quantity;
        $cartDetail -> save();

        $notification='El producto se ha agregado al carrito de compras correctamente';
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
        $cartDetail=CartDetail::find($request->cart_detail_id);
        if ($cartDetail->card_id == auth()->user()->cart_id )
          $cartDetail -> delete();

        $notification='El producto se ha eliminado del carrito de compras correctamente';
        return back()->with(compact('notification'));
    }
}

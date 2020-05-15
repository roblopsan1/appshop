<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class CartController extends Controller
{
    //
    public function update(){
        $cart=auth()->user()->cart;
        $cart->status='Pending';
        $cart->save();

        $notification="Tu pedido se ha registado correctamente. En breve te contactaremos vía e-mail";
        return back()->with(compact('notification'));
    }
}

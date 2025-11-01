<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index(Request $request) {
        $cartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
        $goodCart = [];
        $total = 0;
        foreach ($cartTable as $cartItem) {
            $book = DB::table('books')->select('title', 'price', 'qty')->where('id', $cartItem->bid)->first();
            $total += $cartItem->qty * $book->price;
            array_push(
                $goodCart,
                (object) [
                    'id' => $cartItem->id,
                    'title' => $book->title,
                    'price' => $book->price,
                    'qty' => $cartItem->qty,
                    'limit' => $book->qty
                ]
            );
        }
        return view('createOrder', ['cart' => $goodCart, 'total' => $total]);
    }

    public function createOrder(Request $requst) {
        if (Hash::check($request->get('password'), $request->user()->password)) {
            $orderTable = DB::table('orders');
            $userCartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
            foreach ($userCartTable as $cartItem) {
                $orderTable->insert(['uid' => $cartItem->uid, 'bid' => $cartItem->bid, 'qty' => $cartItem->qty]);
            }
            DB::table('cart')->where('uid', $request->user()->id)->delete();
            return response()->json(['message' => 'good']);
        } else {
            return response()->json(['message' => 'err']);
        }
    }
}

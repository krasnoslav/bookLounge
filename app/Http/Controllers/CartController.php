<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request) {
        $cartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
        $goodCart = [];
        foreach ($cartTable as $cartItem) {
            $book = DB::table('books')->select('title', 'price', 'qty')->where('id', $cartItem->bid)->first();
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
        return view('cart', ['cart' => $goodCart]);
    }

    public function addToCart(Request $request) {
        $cartTable = DB::table('cart');
        $itemInCart = $cartTable->where('uid', $request->user()->id)->where('bid', $request->id);

        $book = DB::table('books')->where('id', $request->id)->first();

        if (is_null($itemInCart->first())) {
            $cartTable->insert(['uid' => $request->user()->id, 'bid' => $request->id, 'qty' => 1]);
        } elseif ($book->qty > $itemInCart->first()->qty) {
            $itemInCart->update(['qty' => $itemInCart->first()->qty + 1]);
        } else {
            return xml_error_string('err');
        }
    }

    public function changeQty(Request $request) {
        $book = DB::table('cart')->where('uid', $request->user()->id)->where('id', $request->id);
        if ($request->param == 'incr') {
            $book->update(['qty' => $book->first()->qty + 1]);
        }
        if ($request->param == 'decr' && $book->first()->qty > 1) {
            $book->update(['qty' => $book->first()->qty - 1]);
        } elseif ($request->param == 'decr' && $book->first()->qty == 1) {
            $book->delete();
        }
    }
}

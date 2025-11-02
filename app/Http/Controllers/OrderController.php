<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function createOrder(Request $request) {
        if (Hash::check($request->get('password'), $request->user()->password)) {
            $orderTable = DB::table('orders');
            $userCartTable = DB::table('cart')->where('uid', $request->user()->id)->get();

            $orderNumber = Str::random(8); // Рандомный номер заказа
            $checkOrderNumber = $orderTable->where('number', $orderNumber)->get()->groupBy(['number', 'uid'])->all();
            $orderNumber = $checkOrderNumber > 0 ? Str::random(8) : $orderNumber;

            foreach ($userCartTable as $cartItem) {
                $orderTable->insert(['uid' => $cartItem->uid, 'bid' => $cartItem->bid, 'qty' => $cartItem->qty, 'number' => $orderNumber]);
            }
            DB::table('cart')->where('uid', $request->user()->id)->delete();
            return response()->json(['message' => 'good']);
        } else {
            return response()->json(['message' => 'err']);
        }
    }

    public function getOrders(Request $request) {
        $goodOrders = [];
        $filter = $request->query('filter');
        if ($filter = 'new') {
            $ordersTable = DB::table('orders')->where('status', 'Новый');
        }
        elseif ($filter = 'confirmed') {
            $ordersTable = DB::table('orders')->where('status', 'Подтвержден');
        }
        elseif ($filter = 'canceled') {
            $ordersTable = DB::table('orders')->where('status', 'Отменен');
        } else {
            $ordersTable = DB::table('orders');
        }
        $ordersTable = $ordersTable->get()->groupBy(['number']);

        foreach ($ordersTable as $order) {
            $openedOrder = $order->all();
            $userName = DB::table('users')->where('id', $openedOrder[0]->uid)->select('name', 'surname')->first();
            $date = $openedOrder[0]->created_at;
            $orderNumber = $openedOrder[0]->number;
            $orderStatus = $openedOrder[0]->status;

            $totalPrice = 0;
            $totalQty = 0;
            $books = [];

            foreach ($openedOrder as $orderItem) {
                $book = DB::table('books')->where('id', $orderItem->bid)->first();
                $totalPrice += $book->price * $orderItem->qty;
                $totalQty += $orderItem->qty;
                
                array_push(
                    $books,
                    (object) [
                        'title' => $book->title,
                        'price' => $book->price,
                        'qty' => $orderItem->qty,
                    ]
                );
            }
            array_push(
                $goodOrders,
                (object) [
                    'name' => $userName->name . ' ' . $userName->surname,
                    'number' => $orderNumber,
                    'books' => $books,
                    'date' => $date,
                    'totalPrice' => $totalPrice,
                    'totalQty' => $totalQty,
                    'status' => $orderStatus,
                ]
            );
        }
        return view('admin.orders', ['orders' => $goodOrders]);
    }

    public function editOrderStatus(Request $request) {
        $action = $request->action;
        $orderNumber = $request->number;
        $order = DB::table('orders')->where('number', $orderNumber);

        if ($action == 'confirm') {
            $order->update(['status' => 'Подтвержден']);
        }
        elseif ($action == 'cancel') {
            $order->update(['status' => 'Отменен']);
        } else {
            return abort(404);
        }
        return redirect()->route('admin.orders');
    }
}

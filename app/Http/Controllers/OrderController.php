<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder()
    {
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống!');
        }
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total = array_sum(array_column($cart, 'price'));
        $order->save();
        foreach ($cart as $productId => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }
        session()->forget('cart');
        return redirect()->route('orders.show', $order->id)->with('success', 'Đơn hàng của bạn đã được đặt!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $cart = session()->get('cart', []);
    if(isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
}

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function updateCart(Request $request, $ProductID)
    {
        $cart = session()->get('cart');
        if(isset($cart[$ProductID])) {
            $cart[$ProductID]['Quantity'] = $request->Quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Cập nhật số lượng thành công!');
    }
    
    public function removeFromCart($ProductID)
    {
        $cart = session()->get('cart');
        if(isset($cart[$ProductID])) {
            unset($cart[$ProductID]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
    }
    public function add(Request $request, $ProductID)
    {
        $product = Product::findOrFail($ProductID);

        if (!$product) {
            return redirect()->back()->with('error', 'Lỗi');
        }
        $cart = session()->get('cart', []);
        $cart = session()->get('cart', []);
        if (isset($cart[$ProductID])) {
            $cart[$ProductID]['Quantity']++;
        } else {
            $cart[$ProductID] = [
                "Name" => $product->Name,
                "Price" => $product->Price,
                "Img" => $product->Img,
                "Quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'sản phẩm đã thêm vào to giỏ hàng!');
    }
}

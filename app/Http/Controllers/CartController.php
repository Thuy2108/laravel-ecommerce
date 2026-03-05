<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index(Request $request)
    {
        $cartItems = $request->session()->get('cart.products', []);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cartItems', 'total'));
    }

    // Thêm sản phẩm vào giỏ
    public function addToCart(Request $request, $id)
    {
        $product = ProductModel::where('product_id', $id)->firstOrFail();

        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart.products', []);

        if (isset($cart[$id])) {
            // Nếu đã có sản phẩm trong giỏ → tăng số lượng
            $cart[$id]['quantity'] += 1;
        } else {
            // Nếu chưa có → thêm mới
            $cart[$id] = [
                'id' => $product->product_id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_img ?? null,
                'quantity' => 1
            ];
        }

        // Lưu giỏ hàng vào session
        $request->session()->put('cart.products', $cart);

        // Header chỉ hiển thị số sản phẩm khác nhau
        $cartCount = count($cart);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
        ]);
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart.products', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart.products', $cart);
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ!');
    }
}

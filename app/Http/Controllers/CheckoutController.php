<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    // Xử lý khi bấm nút Thanh toán
    public function process(Request $request)
    {
        $cart = session('cart', []);
    
        $products = $cart['products'] ?? [];
    
        if (empty($products)) {
            return redirect('/cart')->with('error', 'Giỏ hàng trống');
        }
    
        // Tạo order
        $order = Order::create([
            'order_date' => now(),
            'order_customer' => 'admin',
            'order_status' => 1,
            'order_note' => 'Đơn hàng từ giỏ hàng'
        ]);
    
        // Lưu chi tiết đơn hàng
        foreach ($products as $item) {
            OrderDetail::create([
                'order_id' => $order->order_id,
                'order_product_id' => $item['id'],           // đúng key của cart
                'order_product_quantity' => $item['quantity'],
                'order_product_price' => $item['price'],
            ]);
        }
    
    
        // Chuyển sang trang thanh toán
        return redirect()->route('checkout', $order->order_id);
    }
    

    // Hiển thị trang thanh toán
    public function checkout($order_id)
    {
        $order = Order::with('details')->findOrFail($order_id);

        $total = 0;
        foreach ($order->details as $item) {
            $total += $item->order_product_quantity * $item->order_product_price;
        }

        return view('checkout', compact('order', 'total'));
    }
    public function confirm($order_id)
        {
            $order = Order::findOrFail($order_id);
            $order->order_status = 2;
            $order->save();
            // Xóa giỏ hàng
            session()->forget('cart');
            return redirect()->route('checkout', $order_id)
                            ->with('success', 'Thanh toán thành công!');
        }
}

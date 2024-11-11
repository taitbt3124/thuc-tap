<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hàm hiển thị danh sách đơn hàng
    public function index()
    {
        // Lấy tất cả đơn hàng từ database
        $orders = Order::with('customer')->paginate(10); // Sử dụng phân trang để tối ưu hóa khi có nhiều đơn hàng

        // Trả về view và truyền dữ liệu đơn hàng
        return view('orders.index', compact('orders'));
    }
    public function create(Request $request)
    {
        $product = Product::find($request->product_id);
        return view('orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->total = $request->total;
        $order->save();

        // Thêm sản phẩm vào đơn hàng
        foreach ($request->products as $product_id => $quantity) {
            $product = Product::find($product_id);
            $order->items()->create([
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }

        return redirect()->route('orders.show', $order);
    }

    public function show($id)
    {
        $order = Order::with('items.product')->find($id);
        return view('orders.show', compact('order'));
    }

}

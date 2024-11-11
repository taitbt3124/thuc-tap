<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Tính tổng giá trị của giỏ hàng
        $total = $this->getTotal();

        // Truyền giỏ hàng và tổng vào view
        return view('cart.index', compact('cart', 'total'));
    }

    // Phương thức thêm sản phẩm vào giỏ hàng
    public function add(Product $product, Request $request)
    {
        // Kiểm tra xem giỏ hàng đã có trong session chưa
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$product->id])) {
            // Nếu có thì tăng số lượng sản phẩm lên
            $cart[$product->id]['quantity']++;
        } else {
            // Nếu chưa có thì thêm mới vào giỏ hàng
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image, // Nếu có trường image
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        // Quay lại trang trước đó
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function getTotal()
    {
        $total = 0;
        foreach (session()->get('cart', []) as $product) {
            $total += $product['price'] * $product['quantity'];
        }
        return $total;
    }

}

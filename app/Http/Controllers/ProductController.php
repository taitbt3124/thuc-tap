<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $products->paginate(12);

        return view('products.index', compact('products'));
    }

    // Phương thức show hiển thị chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Trả về view với sản phẩm đã tìm thấy
        return view('products.show', compact('product'));
    }

}

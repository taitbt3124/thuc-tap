<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Bỏ qua middleware 'auth' cho route home nếu cần
        $this->middleware('auth')->except('index');  // Chỉ áp dụng middleware auth cho các route khác
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $products->paginate(12);

        return view('products.index', compact('products'));
    }
}

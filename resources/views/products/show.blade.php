@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        
        <div class="product-details">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>Giá: {{ number_format($product->price, 0, ',', '.') }} VND</h3>
                    <p><strong>Mô tả:</strong> {{ $product->description }}</p>
                    <p><strong>Kho hàng:</strong> {{ $product->stock }} sản phẩm</p>
                    <p><strong>Trạng thái:</strong> 
                        @if($product->status == 'available')
                            Có sẵn
                        @else
                            Hết hàng
                        @endif
                    </p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </form>

                </div>
            </div>
        </div>
        
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách sản phẩm</a>
    </div>
@endsection

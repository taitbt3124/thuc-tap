@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="cart-container">
        <h1>Giỏ hàng của bạn</h1>

        @if(session()->has('cart') && count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $productId => $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="50">
                            </td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ number_format($product['price'], 0, ',', '.') }} VND</td>
                            <td>{{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-total">
                <p><strong>Tổng cộng: </strong> {{ number_format($total, 0, ',', '.') }} VND</p>
                {{-- <a href="{{ route('checkout') }}" class="btn btn-success">Thanh toán</a> --}}
            </div>
        @else
            <p>Giỏ hàng của bạn đang trống!</p>
        @endif
    </div>
@endsection

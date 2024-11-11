@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="product-list">
        <h1>Danh Sách Sản Phẩm</h1>

        <!-- Khu vực tìm kiếm và lọc sản phẩm -->
        <form action="{{ route('products.index') }}" method="GET" class="search-filter-form mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ request()->query('search') }}">
                <select name="category" class="form-select">
                    <option value="">Tất cả danh mục</option>
                    <!-- Các tùy chọn danh mục -->
                    {{-- @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->query('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach --}}
                </select>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Danh sách sản phẩm -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>{{ number_format($product->price, 0, ',', '.') }} VND</strong></p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Phân trang sản phẩm -->
        <div class="pagination mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

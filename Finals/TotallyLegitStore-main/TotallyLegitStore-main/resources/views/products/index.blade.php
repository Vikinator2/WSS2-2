@extends('layouts.app')

@section('title', 'Totally Legit Store')

@section('content')
<div class="container">
    <!-- store EXPO Header -->
    <div class="expo-header text-center">
        <div class="container">
            <h1 class="display-3 fw-bold text-white mb-3">Totally Legit Store</h1>
            <p class="lead text-white mb-4">A Legit store with Legit Products</p>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <span class="featured-badge">Limited Stock</span>
                </div>
                <div class="col-auto">
                    <span class="featured-badge">Worldwide Shipping</span>
                </div>
                <div class="col-auto">
                    <span class="featured-badge">Officialish merch</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping Cart Alert Area -->
    <div id="cart-alert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
        <strong>Added to Cart!</strong> <span id="cart-message"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>



    <!-- All Products -->
    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-white mb-4">All Merchandise</h2>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="category-badge text-white">{{ $product->category }}</span>
                                @if($product->stock < 10)
                                <span class="badge bg-danger text-white">Low Stock!</span>
                                @endif
                            </div>
                            <h5 class="card-title text-white">{{ $product->name }}</h5>
                            <p class="card-text text-white-50">{{ Str::limit($product->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="price-tag text-white">₱{{ number_format($product->price, 2) }}</div>
                                <small class="text-white-50">
                                    <i class="fas fa-box"></i> {{ $product->stock }} available
                                </small>
                            </div>
                            <div class="d-grid mt-3">
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-store w-100">
                                        <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple form submission for add to cart
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            const cartAlert = document.getElementById('cart-alert');
            const cartMessage = document.getElementById('cart-message');
            cartMessage.textContent = 'Product added to your cart!';
            cartAlert.classList.remove('d-none');
            
            // Submit the form
            this.submit();
            
            // Auto-hide alert after 5 seconds
            setTimeout(function() {
                cartAlert.classList.add('d-none');
            }, 5000);
        });
    });
    
    // Auto-dismiss alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert.classList.contains('show')) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });
});
</script>
@endsection
@endsection
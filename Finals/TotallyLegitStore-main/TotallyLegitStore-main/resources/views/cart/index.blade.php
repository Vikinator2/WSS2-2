@extends('layouts.app')

@section('title', 'Shopping Cart - store EXPO 2025')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="store-card p-4 text-center">
                <h1 class="display-4 text-store-teal mb-2">Shopping Cart</h1>
                <p class="lead text-store-muted">Your store EXPO 2025 Merchandise</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8 mb-4">
            <div class="store-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-store-light mb-0">
                        <i class="fas fa-shopping-cart me-2"></i>Cart Items
                    </h3>
                    <span class="badge bg-store-teal fs-6">
                        {{ array_sum(array_column($cart, 'quantity')) }} items
                    </span>
                </div>

                @if(count($cart) > 0)
                    @foreach($cart as $id => $item)
                    <div class="cart-item store-card p-3 mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="cart-item-image bg-store-teal rounded d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px;">
                                    @switch($item['category'])
                                        @case('Lightsticks') @break
                                        @case('Apparel') @break
                                        @case('Posters') @break
                                        @case('Accessories') @break
                                        @case('Stationery') @break
                                        @default
                                    @endswitch
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-store-light mb-1">{{ $item['name'] }}</h5>
                                <small class="text-store-muted">{{ $item['category'] }}</small>
                            </div>
                            <div class="col-md-2">
                                <span class="price-tag">₱{{ number_format($item['price'], 2) }}</span>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" 
                                               min="1" max="10" class="form-control">
                                        <button type="submit" class="btn btn-outline-store">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <small class="text-store-muted">
                                    Subtotal: ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Clear Cart Button -->
                    <div class="text-end mt-4">
                        <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" 
                                    onclick="return confirm('Clear entire cart?')">
                                <i class="fas fa-broom me-2"></i>Clear Cart
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x text-store-muted mb-3"></i>
                        <h4 class="text-store-teal">Your cart is empty</h4>
                        <p class="text-store-muted">Start shopping for amazing store EXPO merchandise!</p>
                        <a href="{{ route('store') }}" class="btn btn-store mt-2">
                            <i class="fas fa-store me-2"></i>Continue Shopping
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="store-card p-4">
                <h3 class="text-store-light mb-4">
                    <i class="fas fa-receipt me-2"></i>Order Summary
                </h3>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-store-muted">Subtotal:</span>
                        <span class="text-store-light">₱{{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-store-muted">Shipping:</span>
                        <span class="text-store-light">₱150.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-store-muted">Tax (12%):</span>
                        <span class="text-store-light">₱{{ number_format($total * 0.12, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong class="text-store-light">Total:</strong>
                        <strong class="text-store-teal fs-5">
                            ₱{{ number_format($total + 150 + ($total * 0.12), 2) }}
                        </strong>
                    </div>
                </div>

                @if(count($cart) > 0)
                <div class="d-grid gap-2">
                    <button class="btn btn-store btn-lg" id="checkout-btn">
                        <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                    </button>
                    <a href="{{ route('store') }}" class="btn btn-outline-store">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
                @endif

                <!-- Security Badges -->
                <div class="mt-4 text-center">
                    <div class="row">
                        <div class="col-4">
                            <i class="fas fa-shield-alt text-success fs-4"></i>
                            <small class="d-block text-store-muted">Secure</small>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-shipping-fast text-info fs-4"></i>
                            <small class="d-block text-store-muted">Fast Delivery</small>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-undo text-warning fs-4"></i>
                            <small class="d-block text-store-muted">Easy Returns</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Products -->
            <div class="store-card p-4 mt-4">
                <h5 class="text-store-light mb-3">You Might Also Like</h5>
                @php
                    $featuredProducts = [
                        ['name' => 'iPohne 15 Pro Max Ultra', 'price' => 2140, 'emoji' => ''],
                        ['name' => 'Nikie Air Max 360', 'price' => 3000, 'emoji' => ''],
                        ['name' => 'Rolex Submariner', 'price' => 650, 'emoji' => ''],
                    ];
                @endphp
                @foreach($featuredProducts as $product)
                <div class="d-flex align-items-center mb-3 p-2 rounded" style="background: rgba(255,255,255,0.05);">
                    <div class="me-3">
                        <div class="bg-store-teal rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 40px; height: 40px;">
                            {{ $product['emoji'] }}
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <small class="text-store-light d-block">{{ $product['name'] }}</small>
                        <small class="text-store-teal">₱{{ number_format($product['price'], 2) }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Checkout button
    var checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            alert('Checkout Successful!\\nThank you for your order!\\nThis is a demo store.');
        });
    }
    
    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            try {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            } catch (e) {
                // If Bootstrap alert fails, just hide it
                alert.style.display = 'none';
            }
        });
    }, 5000);
});
</script>
@endsection
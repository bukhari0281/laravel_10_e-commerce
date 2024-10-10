<div class="sidebar" id="sidebar">
    <h3 class="mb-4 text-white">Dashboard</h3>
    <nav class="nav flex-column">
        <a class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a class="nav-link {{ Route::currentRouteName() === 'product.index' ? 'active' : '' }}" href="{{ route('product.index') }}"><i class="bi bi-box"></i> Product</a>
        <a class="nav-link {{ Route::currentRouteName() === 'transaction.index' ? 'active' : '' }}" href="#"><i class="bi bi-cart"></i> Transaction</a>
        <a class="nav-link {{ Route::currentRouteName() === 'user.index' ? 'active' : '' }}" href="#"><i class="bi bi-person"></i> User</a>
    </nav>
</div>
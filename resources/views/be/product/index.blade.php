@extends('be.utils.app')
@section('content')
<button class="btn btn-dark mb-3" id="sidebarToggle">Toggle Sidebar</button>
<div class="glassmorphism">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product List</h2>
        <a class="btn btn-primary" href="{{ route('product.create') }}">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Is Active</th>
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @forelse ($products as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ Str::limit($item->description, 30) }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <input type="checkbox" class="toggle-active" data-toggle="toggle" data-style="ios" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm" {{ $item->is_active ? 'checked' : '' }} data-product-id="{{ $item->id }}">
                        </td>
                        <td>{{ $item->tags }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No data available in table <span class="text-danger"></td>
                    </tr>
                    <?php $i++ ?>
                @endforelse 
            </tbody>
        </table>
    </div>
</div> 
{{ $products->links() }}

@endsection



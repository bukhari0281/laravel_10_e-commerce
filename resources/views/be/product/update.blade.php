@extends('be.utils.app')
@section('content')
<button class="btn btn-dark mb-3" id="sidebarToggle">Toggle Sidebar</button>
<div class="glassmorphism">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Product</h2> 
    </div> 
    <!-- Add Product Modal -->
    <form method="POST" action="{{ route('product.store') }}">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1">
            <label class="form-check-label" for="is_active">Is Active</label>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" name="tags" id="tags">
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Product</button> 
    </form>
</div> 

@endsection



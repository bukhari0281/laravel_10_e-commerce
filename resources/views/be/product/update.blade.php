@extends('be.utils.app')
@section('title', 'Update Product')

@section('content')
<button class="btn btn-dark mb-3" id="sidebarToggle">Toggle Sidebar</button>
<div class="glassmorphism">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Product</h2> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> 
    <!-- Add Product Modal -->
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" type="text" name="description" id="description" rows="3" value="{{ $product->description }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Image (Upload Multiple)</label>
            <small class="text-white" style="--bs-text-opacity: .5;">Supported formats: JPG, JPEG, PNG. Max size: 1MB per image.</small>
            @foreach ($product->galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset('storage/gallery/' . $gallery->url) }}" alt="{{ $product->name }}" width="100">
                </div>
            @endforeach 
            <input type="file" name="url[]" id="url" class="form-control" multiple>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active?</label>
            <select class="form-select" name="is_active" id="is_active" aria-label="Default select example">
                <option value="1" @if ($product->is_active) selected @endif>Active</option>
                <option value="0" @if (!$product->is_active) selected @endif>Inactive</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" name="tags" id="tags" value="{{ $product->tags }}">
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Product</button> 
    </form>
</div> 

<script>
    const checkbox = document.getElementById('is_active');
    const checkboxValue = checkbox.value;
    console.log(checkboxValue);
</script>

@endsection



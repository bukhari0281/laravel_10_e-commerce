@extends('be.utils.app')
@section('title', 'Create Product')

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
            <textarea class="form-control" type="text" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Image (Upload Multiple)</label>
            <input type="file" name="url[]" id="url" class="form-control" multiple>
            <small class="text-white" style="--bs-text-opacity: .5;">Supported formats: JPG, JPEG, PNG. Max size: 1MB per image.</small>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active?</label>
            <select class="form-select" name="is_active" id="is_active" aria-label="Default select example" >
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" name="tags" id="tags">
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



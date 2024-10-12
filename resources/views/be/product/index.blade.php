@extends('be.utils.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('title', 'Product')

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
        <table class="table table-dark table-striped" id="datatable">
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
                        @if ($item->is_active == 0)
                            <td><span class="badge bg-danger">Inactive</span></td>
                        @else
                            <td><span class="badge bg-success">Active</span></td>
                        @endif 
                        <td>{{ $item->tags }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('product.edit', $item->id) }}" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" title="Delete">
                                <i class="bi bi-trash"></i>
                            </a>
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

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        })
    </script>
@endpush

@endsection



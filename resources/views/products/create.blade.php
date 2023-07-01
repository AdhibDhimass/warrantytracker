@extends('layout.master')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" class="form-control" id="product_code" name="product_code" required>
        </div>
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="warranty_start_date">Warranty Start Date</label>
            <input type="date" class="form-control" id="warranty_start_date" name="warranty_start_date">
        </div>
        <div class="form-group">
            <label for="warranty_end_date">Warranty End Date</label>
            <input type="date" class="form-control" id="warranty_end_date" name="warranty_end_date">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
@endsection

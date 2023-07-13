@extends('layout.master')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_code">Kode Produk</label>
            <input type="text" class="form-control" id="product_code" name="product_code" value="{{ generateUniqueProductCode() }}" readonly>
        </div>
        <div class="form-group">
            <label for="product_name">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="warranty_start_date">Tanggal Mulai Garansi</label>
            <input type="date" class="form-control" id="warranty_start_date" name="warranty_start_date">
        </div>
        <div class="form-group">
            <label for="warranty_end_date">Tanggal Selesai Garansi</label>
            <input type="date" class="form-control" id="warranty_end_date" name="warranty_end_date">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Kembali Ke List Produk</a>
@endsection

@php
    function generateUniqueProductCode()
    {
        $code = '';
        $characters = '0123456789';
        $length = 8;

        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[random_int(0, strlen($characters) - 1)];
            }
        } while (isCodeExists($code));

        return $code;
    }

    function isCodeExists($code)
    {
        // Check if the code already exists in the database
        $existingProduct = App\Models\Product::where('product_code', $code)->first();

        return $existingProduct !== null;
    }
@endphp

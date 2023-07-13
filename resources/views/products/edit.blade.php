@extends('layout.master')

@section('title')
    Edit Product
@endsection

@section('sub-title')
    Edit Product
@endsection

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_code">Kode Produk</label>
            <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $product->product_code }}">
        </div>

        <div class="form-group">
            <label for="product_name">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="warranty_start_date">Tanggal Mulai Garansi</label>
            <input type="date" class="form-control" id="warranty_start_date" name="warranty_start_date" value="{{ $product->warranty_start_date }}">
        </div>

        <div class="form-group">
            <label for="warranty_end_date">Tanggal Selesai Garansi</label>
            <input type="date" class="form-control" id="warranty_end_date" name="warranty_end_date" value="{{ $product->warranty_end_date }}">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Kembali Ke List Produk</a>
@endsection

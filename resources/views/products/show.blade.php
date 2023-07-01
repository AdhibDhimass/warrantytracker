@extends('layout.master')

@section('title')
        Halaman Produk
@endsection

@section('sub-title')
        Produk
@endsection
@section('content')

<h1>Detail Product</h1>

<table class="table">
    <tr>
        <th>Kode Produk</th>
        <td>{{ $product->product_code }}</td>
    </tr>
    <tr>
        <th>Nama Produk</th>
        <td>{{ $product->product_name }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{{ $product->description }}</td>
    </tr>
    <tr>
        <th>Tanggal Mulai Garansi</th>
        <td>{{ $product->warranty_start_date }}</td>
    </tr>
    <tr>
        <th>Tanggal Selesai Garansi</th>
        <td>{{ $product->warranty_end_date }}</td>
    </tr>
    <tr>
        <th>Status Garansi</th>
        <td>{{ $warrantyStatus }}</td>
    </tr>
</table>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
@endsection

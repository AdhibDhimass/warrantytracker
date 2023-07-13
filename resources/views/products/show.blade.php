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
            <td>
                @if ($product->warranty_status == 'active')
                    <span style="background-color: green; color: white;">{{ $product->warranty_status }}</span>
                @elseif ($product->warranty_status == 'expired')
                    <span style="background-color: red; color: white;">{{ $product->warranty_status }}</span>
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali Ke List Produk</a>

@endsection

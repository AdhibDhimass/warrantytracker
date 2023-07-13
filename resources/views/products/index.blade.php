@extends('layout.master')

@section('title', 'Product List')

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#product-table').DataTable({
            columnDefs: [{
                targets: [1, 2, 3, 4],
                searchable: false
            }]
        });

        // Menampilkan notifikasi sukses selama 3 detik
        @if (session('success'))
            $('.alert-success').fadeIn().delay(1000).fadeOut();
        @endif
    });
</script>
@endpush

@push('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<style>
    .bg-green {
        background-color: green;
        color: white;
    }

    .bg-red {
        background-color: red;
        color: white;
    }
</style>
@endpush

@section('content')
    <h1>List Product</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    @if (session('success'))
        <div class="alert alert-success" style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <table class="table" id="product-table">
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Status Garansi</th>
                <th>Masa Garansi</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($warrantyStatus[$product->id]['status'] == 'active')
                            <span class="badge bg-green">{{ $warrantyStatus[$product->id]['status'] }}</span>
                        @elseif ($warrantyStatus[$product->id]['status'] == 'expired')
                            <span class="badge bg-red">{{ $warrantyStatus[$product->id]['status'] }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($warrantyStatus[$product->id]['status'] == 'active')
                            {{ $warrantyStatus[$product->id]['remainingDays'] }} hari
                        @elseif ($warrantyStatus[$product->id]['status'] == 'expired')
                            0 hari
                        @endif
                    </td>
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus produk ini?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection




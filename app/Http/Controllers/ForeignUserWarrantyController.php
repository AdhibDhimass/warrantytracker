<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ForeignUserWarrantyController extends Controller
{
    public function index()
    {
        return view('foreign-user.warranty-landing');
    }

    public function search(Request $request)
    {
        $productCode = $request->input('product_code');

        // Cari produk berdasarkan kode produk
        $product = Product::where('product_code', $productCode)->first();

        if ($product) {
            // Produk ditemukan, tampilkan detail garansi
            return view('foreign-user.warranty-details', compact('product'));
        } else {
            // Produk tidak ditemukan
            return view('foreign-user.warranty-not-found', compact('productCode'));
        }
    }
}

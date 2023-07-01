<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Melakukan pencarian berdasarkan kode product
        $products = Product::where('product_code', 'like', '%'.$query.'%')->get();

        $today = Carbon::today();

        foreach ($products as $product) {
            $warranty_start_date = Carbon::parse($product->warranty_start_date);
            $warranty_end_date = Carbon::parse($product->warranty_end_date);

            if ($today->between($warranty_start_date, $warranty_end_date, true)) {
                $remainingTime = $today->diff($warranty_end_date);
                $remainingDays = $remainingTime->days;
                $remainingHours = $remainingTime->h;
                $product->warranty_status = 'aktif (Sisa waktu: ' . $remainingDays . ' hari ' . $remainingHours . ' jam)';
            } else {
                $product->warranty_status = 'expired';
            }
        }

        return response()->json($products);
    }

}

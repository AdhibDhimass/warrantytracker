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

    $products = Product::where('product_code',  $query)->get();

    foreach ($products as $product) {
        $product->warranty_start_date = Carbon::parse($product->warranty_start_date)->format('Y-m-d');
        $product->warranty_end_date = Carbon::parse($product->warranty_end_date)->format('Y-m-d');
        $product->remainingDays = $this->calculateRemainingDays($product->warranty_end_date);
        $product->warrantyStatus = $this->getWarrantyStatus($product->warranty_end_date);
    }

    return response()->json($products);
}

private function calculateRemainingDays($endDate)
{
    $currentDate = Carbon::now();
    $end = Carbon::parse($endDate);
    $diffInDays = $currentDate->diffInDays($end, false);

    return $diffInDays > 0 ? $diffInDays : 0;
}

private function getWarrantyStatus($endDate)
{
    $currentDate = Carbon::now();
    $end = Carbon::parse($endDate);

    if ($currentDate->greaterThanOrEqualTo($end)) {
        return 'expired';
    }

    return 'active';
}
}

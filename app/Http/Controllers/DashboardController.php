<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        $productCount = count($products);

        $productData = [];

        foreach ($products as $product) {
            $warrantyData = $this->getWarrantyStatus($product);
            $productData[] = [
                'product' => $product,
                'warrantyStatus' => $warrantyData['status'],
                'remainingDays' => $warrantyData['remainingDays'],
            ];
        }

        $activeProductCount = count(array_filter($productData, function($item) {
            return $item['warrantyStatus'] === 'active';
        }));

        $expiredProductCount = count(array_filter($productData, function($item) {
            return $item['warrantyStatus'] === 'expired';
        }));

        return view('dashboard', compact('productCount', 'activeProductCount', 'expiredProductCount', 'productData'));
    }



    private function getWarrantyStatus(Product $product)
    {
        $today = Carbon::now();
        $warrantyStatus = '';
        $remainingDays = null;

        if ($today >= $product->warranty_start_date && $today <= $product->warranty_end_date) {
            $warrantyStatus = 'active';
            $remainingTime = $today->diff($product->warranty_end_date);
            $remainingDays = $remainingTime->days;
        } else {
            $warrantyStatus = 'expired';
            $remainingDays = 0;
        }

        return [
            'status' => $warrantyStatus,
            'remainingDays' => $remainingDays,
        ];
    }
}

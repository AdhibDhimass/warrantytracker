<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $warrantyStatus = [];
        foreach ($products as $product) {
            $warrantyStatus[$product->id] = $this->getWarrantyStatus($product);
        }

        return view('products.index', compact('products', 'warrantyStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'warranty_start_date' => 'nullable|date',
            'warranty_end_date' => 'nullable|date',
        ]);

        $product = new Product();
        $product->product_code = $validatedData['product_code'];
        $product->product_name = $validatedData['product_name'];
        $product->description = $validatedData['description'];
        $product->warranty_start_date = $validatedData['warranty_start_date'];
        $product->warranty_end_date = $validatedData['warranty_end_date'];

        // Set warranty status based on current date
        $today = now()->toDateString();
        if ($product->warranty_end_date && $product->warranty_end_date >= $today) {
            $product->warranty_status = 'active';
        } else {
            $product->warranty_status = 'expired';
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $warrantyStatus = $this->getWarrantyStatus($product);
        return view('products.show', compact('product', 'warrantyStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    private function getWarrantyStatus(Product $product)
    {
        $today = Carbon::now();
        $warrantyStatus = '';
        if ($today >= $product->warranty_start_date && $today <= $product->warranty_end_date) {
            $warrantyStatus = 'active';
            $remainingTime = $today->diff($product->warranty_end_date);
            $remainingDays = $remainingTime->days;
            $remainingHours = $remainingTime->h;
            $warrantyStatus .= ' (Time Remaining: ' . $remainingDays . ' hari ' . $remainingHours . ' jam)';
        } else {
            $warrantyStatus = 'expired';
        }
        return $warrantyStatus;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    


}

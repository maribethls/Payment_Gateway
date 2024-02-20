<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProducRatingController extends Controller
{
    public function index()
    {
        // Fetch products with their ratings
        $products = Product::with('ratings')->get();

        // Pass products to the view
        return view('backend.banner.index', compact('products'));
    }
}

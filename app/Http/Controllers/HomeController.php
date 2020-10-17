<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product->limit(8)->orderBy('id', 'desc')->get();
        //dd($products);
        return view('welcome', compact('products'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();
        return view('single', compact('product'));
    }
}

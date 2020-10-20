<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;

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
        $stores = Store::limit(3)->orderBy('id', 'desc')->get();
        return view('welcome', compact('products', 'stores'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();
        //dd($product);
        return view('single', compact('product'));
    }
}

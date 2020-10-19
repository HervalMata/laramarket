<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * @var Store
     */
    private $store;
    /**
     * @var Product
     */
    private $product;

    /**
     * StoreController constructor.
     * @param Store $store
     * @param Product $product
     */
    public function __construct(Store $store, Product $product)
    {
        $this->store = $store;
        $this->product = $product;
    }

    public function index($slug)
    {
        $store = $this->store->whereSlug($slug)->first();
        $products = $this->product->where('store_id', $store->id)->limit(8)->get();
        return view('store', compact('store', 'products'));
    }
}

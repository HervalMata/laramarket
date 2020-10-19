<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Product
     */
    private $product;

    /**
     * CategoryController constructor.
     * @param Category $category
     * @param Product $product
     */
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index($slug)
    {
        $category = $this->category->whereSlug($slug)->first();
        //dd($category);
        //$categoryId = $category->attributes->id;
        //dd($categoryId);
        $products = $this->product->where('category_id', $category->id)->limit(8)->get();
        return view('category', compact('category', 'products'));
    }
}

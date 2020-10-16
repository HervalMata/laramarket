<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Traits\UploadTrait;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use UploadTrait;

    /**
     * @var Product
     */
    private $product;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $stores = Store::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        return view('admin.products.create', compact('stores', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }
        flash('Produto criado com sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product
     * @return Response
     */
    public function edit($product)
    {
        $product = Product::findOrFail($product);
        $categories = Category::all(['id', 'name']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param $product
     * @return Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = Product::find($product);
        $product->update($data);
        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }
        flash('Produto atualizado com sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $product
     * @return Response
     */
    public function destroy($product)
    {
        $product = Store::find($product);
        $product->delete();
        flash('Produto removido com sucesso')->success();
        return redirect()->route('admin.products.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryController constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $this->category->create($data);
        flash('Categoria criada com sucesso.')->success();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $category
     * @return Response
     */
    public function edit($category)
    {
        $category = $this->category->findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $category
     *
     * @return Response
     */
    public function update(CategoryRequest $request, $category)
    {
        $data = $request->all();
        $this->category->find($category);
        $category->update($data);
        flash('Categoria atualizada com sucesso.')->success();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $category
     * @return Response
     */
    public function destroy($category)
    {
        $this->category->find($category);
        $category->delete();
        flash('Categoria removida com sucesso.')->success();
        return redirect()->route('admin.categories.index');
    }
}
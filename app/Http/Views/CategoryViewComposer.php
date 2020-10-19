<?php


namespace App\Http\Views;


use App\Models\Category;

class CategoryViewComposer
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryViewComposer constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose($view)
    {
        return $view->with('categories', $this->category->limit(4)->get(['name', 'slug']));
    }
}

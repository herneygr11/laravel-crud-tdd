<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct() {
        //
    }

    public function index()
    {
        $categories = Category::all();

        return view('views.categories.index', compact("categories"));
    }

    public function createCategory()
    {
        return view('views.categories.create');
    }

    public function saveCategory(RequestCategory $request): RedirectResponse
    {
        if (Category::create($request->all())) {
            return redirect()->route("categories.index");
        }
    }

}

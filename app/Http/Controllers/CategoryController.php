<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct() {
        //
    }

    public function index()
    {
        //
    }

    public function createCategory()
    {
        //
    }

    public function saveCategory(RequestCategory $request): RedirectResponse
    {
        if (Category::create($request->all())) {
            return redirect()->route("categories.index");
        }
    }

}

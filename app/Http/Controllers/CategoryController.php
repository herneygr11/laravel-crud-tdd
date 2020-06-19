<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function saveCategory(Request $request): RedirectResponse
    {
        if (Category::create($request->all())) {
            return redirect()->route("categories.index");
        }
    }

}

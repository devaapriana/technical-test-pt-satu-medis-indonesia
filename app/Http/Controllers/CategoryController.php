<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CategoryCreateRequest $request)
    {
        $dataValidated = $request->validated();
        $category = Category::create([
            "name" => $dataValidated['name']
        ]);

        return response()->json([
            'message' => 'Category create successfully',
            'data' => [$category]
        ]);
    }

    public function index()
    {
        $categories = Category::paginate(5);
        return response()->json([
            "message" => "Get data categories successfully",
            "data" => [$categories]
        ]);
    }
}

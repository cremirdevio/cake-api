<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Store;

use App\Helpers\CollectionHelper;
use App\Search\ProductSearch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $categories = Category::all();
        return response()->json($categories) ;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $slug = Str::slug($request->name);

        $category = Category::create(array_merge($request->all(), ['slug' => $slug]));
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $category = Category::findorFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $slug = Str::slug($request->name);

        $category = Category::findorFail($id);
        $category->update(array_merge($request->all(), ['slug' => $slug]));
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $category = Category::findorFail($id);
        $category->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function products(Request $request, $slug)
    {
        // Apply filtering to categories here
        $products = ProductSearch::apply($request, Category::where('slug', $slug)->firstOrFail()->products);
        // Pass the product through the Collection helper class for paginating collections
        $products = CollectionHelper::paginate($products, 2);
        return response()->json($products->appends($request->all()));
    }
}

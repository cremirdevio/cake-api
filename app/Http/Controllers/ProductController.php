<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Helpers\CollectionHelper;
use App\Search\ProductSearch;
use Illuminate\Support\Str;

class ProductController extends Controller
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

    public function index(Request $request)
    {

        // Apply filtering to categories here
        $products = ProductSearch::apply($request, Product::all());
        $products = CollectionHelper::paginate($products, 2);
        // $products = Product::where('price', '>' , 20)->paginate();
        return response()->json($products->appends($request->all()));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'details' => 'string|nullable',
            'price' => 'required|numerical',
            'description' => 'required|string',
            'extras' => 'string',
            'quantity' => 'numerical|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $slug = Str::slug($request->name);

        $product = Product::create(array_merge($request->all(), ['slug' => $slug]));
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $product = Product::findorFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string',
            'details' => 'string|nullable',
            'price' => 'numerical',
            'description' => 'required|string',
            'extras' => 'string',
            'quantity' => 'numerical|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findorFail($id);
        $product->update($request->all());
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $product = Product::findorFail($id);
        $product->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

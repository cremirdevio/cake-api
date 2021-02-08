<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ReviewController extends Controller
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

    public function index($product) 
    {
        $reviews = Product::findorFail($product)->reviews;
        return response()->json($reviews) ;
    }

    public function store(Request $request, $product)
    {   
        $this->validate($request, [

        ]);
        $review = Review::create($request->all());
        Product::findorFail($product)->reviews()->save($review);
        return response()->json($review, Response::HTTP_CREATED);
    }

    // This mostly won't be of use.
    public function show($id)
    {
        $review = Review::findorFail($id);
        return response()->json($review);
    }

    public function update(Request $request, $product, $id)
    {
        $this->validate($request, [

        ]);

        $review = Review::findorFail($id);
        $review->update($request->all());
        return response()->json($review, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $review = Review::findorFail($id);
        $review->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

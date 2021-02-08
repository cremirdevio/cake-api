<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Search\ProductSearch;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        //
    }

    public function filter(Request $request)
    {
        return ProductSearch::apply($request);
    }

}

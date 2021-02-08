<?php

namespace App\Http\Controllers;

use App\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
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
        $coupons = Coupon::all();
        return response()->json($coupons) ;
    }

    public function create(Request $request)
    {
        // Create new coupon
        return response()->json($coupon);
    }

    public function show($id)
    {
        $coupon = Coupon::find($id);
        return response()->json($coupon);
    }

    public function update()
    {
        // Update coupon
        return response()->json($coupon, 201);
    }

    public function delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return response()->json('Coupon deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
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
        $stores = Store::paginate();
        return response()->json($stores) ;
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $store = Store::create($request->all());
        return response()->json($store, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $store = Store::findorFail($id);
        return response()->json($store);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

        ]);

        $store = Store::findorFail($id);
        $store->update($request->all());
        return response()->json($store, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $store = Store::findorFail($id);
        $store->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

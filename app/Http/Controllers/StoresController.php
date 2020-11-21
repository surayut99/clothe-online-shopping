<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        return view('store.index',[
            'stores' => $stores,
        ]);
        // $store = Store::where('store_id', "=", Auth::user()->id)->get();
        // $primary_type = DB::table('product_types')->select('product_primary_type')->distinct()->get();
        // $secondary_type = ProductType::all();
        // $products = Product::where('store_id', "=", $store[0]->store_id)->get();

        // return view('store.index',[
        //     'products' => $products,
        //     'stores' => $store[0],
        //     'product_type' => $primary_type,
        //     'secondary_types' => $secondary_type
        // ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store;
        $store->store_name = $request->input('storeName');
        $store->store_description = $request->input('storeDes');
        $store->user_id = Auth::user()->id;
        $store->save();

        $owner = new Owner;
        $owner->user_id = Auth::user()->id;
        $owner->save();
        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::where('store_id', '=', $id)->first();
        $products = DB::table('products')->where('store_id','=', $id)->get();

        return view('store.show',[
            'store' => $store,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = DB::table('stores')->where('store_id','=',$id);
        // print_r($store->user_id);
        // if($store->user_id!=Auth::user()->id){
        //     return view('store.index');
        // }
        // return view('store.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        return view('product.product-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

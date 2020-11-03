<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Store;
use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('store_id', "=", Auth::user()->id)->get();
        $primary_type = DB::table('product_types')->select('product_primary_type')->distinct()->get();
        $secondary_type = ProductType::all();
        $products = Product::where('store_id', "=", $store[0]->store_id)->get();

        return view('product.product-list',[
            'products' => $products,
            'stores' => $store[0],
            'product_type' => $primary_type,
            'secondary_types' => $secondary_type
        ]);
    }

    public function productDetail($id)
    {
        $product = Product::where('product_id','=',$id)->get()[0];
        
        // $products = Product::all();
        return view('product.product_detail',[
            'products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product = new Product;
         $product->product_name = $request->input('productName');
         $product->product_description = $request->input('productDes');
         $product->product_img_path = 'storage/pictures/ecommerce.png';
//        $request->image->storeAs('images', $request->input('myfile'));


         $product->product_primary_type = $request->get('primeProdType');
         $product->product_secondary_type = $request->get('secondProdType');
         $product->color = $request->input('color');
         $product->size = $request->input('size');
         $product->qty = $request->input('qty');
         $product->price = $request->input('price');
         $store = Store::where('user_id', '=', Auth::user()->id)->get();
         $product->store_id = $store[0]->store_id;
         $product->save();
         return redirect()->route('product_list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('store_id','=', $id)->get();
        $store = Store::where('store_id', '=', $id)->get();

        return view('product.product-list',[
            'products' => $products,
            'stores' => $store,
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

        $store = Store::where('store_id', "=", Auth::user()->id)->get();
        $products = Product::where('product_id','=',$id)->get()[0];
        $primary_type = DB::table('product_types')->select('product_primary_type')->distinct()->get();
        $secondary_type = ProductType::all();
        return view('product.edit-product',[
            'products' => $products,
            'stores' => $store,
            'product_type' => $primary_type,
            'secondary_types' => $secondary_type
        ]);
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
        Product::where('product_id','=',$id)->update([
            'product_name' => $request->input('productName'),
            'product_description' => $request->input('productDes'),
            'product_primary_type' => $request->get('primeProdType'),
            'product_secondary_type' => $request->get('secondProdType'),
            'color' => $request->get('color'),
            'size' => $request->get('size'),
            'qty' => $request->get('qty'),
            'price' => $request->get('price'),
        ]);
        // $product = Product::where('product_id', '=', $id)->get();
        // $product->product_name = $request->input('productName');
        // $product->product_description = $request->input('productDes');
        // $product->product_primary_type = $request->get('primeProdType');
        // $product->product_secondary_type = $request->get('secondProdType');
        // $product->color = $request->input('color');
        // $product->size = $request->input('size');
        // $product->qty = $id;
        // $product->price = $request->input('price');
        // $store = Store::where('user_id', '=', Auth::user()->id)->get();
        // $product->store_id = $store[0]->store_id;
        // $product->save();
        return redirect()->route('product_list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('product_id', '=', $id)->delete();
        return redirect()->route('product_list.index');
    }

//    public function editProduct(){
//        $store = Store::where('store_id', "=", Auth::user()->id)->get();
//        $products = Product::where('store_id','=',$store[0]->store_id)->get();
//        return view('product.edit-product',[
//            'products'=>$products,
//        ]);
//    }
}

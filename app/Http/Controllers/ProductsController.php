<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Store;
use App\Models\User;
use App\Rules\ImgFile;
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
    public function index(){
        $products = DB::table('products')->get();
        return view('product.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_type = DB::table('product_types')->select('product_primary_type')
                        ->distinct()->get()->pluck('product_primary_type')->toArray();
        $secondary_type = $this->getSecondary($primary_type[0]);

        return view('product.add_product',[
            'product_type' => $primary_type,
            'secondary_type' => $secondary_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'productName' => 'required',
            'productDes' => 'required',
            'color' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'inpImg' => 'required'
        ]);

        if (!$request->file('inpImg')) {
            return back()
                ->with('error',"กรุณาใส่รูปสินค้า");
        }
            $product = new Product;
        $product->product_name = $request->input('productName');
        $product->product_description = $request->input('productDes');
        $product->product_img_path = 'storage/pictures/ecommerce.png';
        $product->product_primary_type = $request->get('primeProdType');
        $product->product_secondary_type = $request->get('secondProdType');
        $product->color = $request->input('color');
        $product->size = $request->input('size');
        $product->qty = $request->input('qty');
        $product->price = $request->input('price');
        $store = Store::where('user_id', '=', Auth::user()->id)->get();
        $product->store_id = $store[0]->store_id;
        $product->save();



        $img = $request->file('inpImg');
        $filename = $product->id . "." . $img->getClientOriginalExtension();
        $path = 'storage/pictures/products';
        $img->move($path, $filename);


        DB::table('products')->where('product_id','=', $product->id)->update([
            'product_img_path' => $path . "/" . $filename,
        ]);

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('product_id','=',$id)->first();
        $store = Store::where('store_id', '=', $product->store_id)->first();

        return view('product.show',[
            'product' => $product,
            'store' => $store,
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
        $product = Product::where('product_id','=',$id)->first();
        $primary_type = DB::table('product_types')->select('product_primary_type')->distinct()->get();
        $secondary_type = ProductType::all();
        return view('product.edit-product',[
            'product' => $product,
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
        return redirect()->route('products.index');
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
        return redirect()->route('products.index');
    }

//    public function editProduct(){
//        $store = Store::where('store_id', "=", Auth::user()->id)->get();
//        $products = Product::where('store_id','=',$store[0]->store_id)->get();
//        return view('product.edit-product',[
//            'products'=>$products,
//        ]);
//    }
    public function getSecondary($prime){
        $secondary = DB::table('product_types')->where('product_primary_type', '=', $prime)
                        ->select('product_secondary_type')->get()
                        ->pluck('product_secondary_type')->toArray();
        return $secondary;
    }

    public function getMaxQty($id){
        return DB::table('products')->where('product_id', "=", $id)
        ->select('qty')->get()
        ->pluck('qty')->toArray()[0];
    }

    public function productsInStore($id){
        $products = DB::table('products')->where('store_id','=',$id)->get();
        return view("product.manage-products",[
            'products' => $products
        ]);
    }
}
